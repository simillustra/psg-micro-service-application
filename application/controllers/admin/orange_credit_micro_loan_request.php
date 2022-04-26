<?php

/*
* =======================================================================
* FILE NAME:        orange_credit_micro_loan_request.php
* DATE CREATED:  	07-03-2020
* FOR TABLE:  		orange_credit_micro_loan_request
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/

if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include (APP_FOLDER . '/models/objects/orange_credit_micro_loan_request.php');
include (APP_FOLDER . '/models/objects/orange_credit_loan_type.php');
include (APP_FOLDER . '/models/objects/orange_credit_transactions.php');
include (APP_FOLDER . '/models/objects/orange_credits_applications.php');
include (APP_FOLDER . '/models/objects/orange_credit_business_plan.php');
include_once ('libraries/system_users.php');
include (APP_FOLDER . '/models/objects/orange_credit_kyc.php');
include(APP_FOLDER . '/models/objects/orange_credit_notifications.php');

class orange_credit_micro_loan_request_controller
{
    public $orange_credit_micro_loan_request_model;
    public $orange_credit_loan_type_model;
    public $orange_credits_applications_model;
    public $orange_credit_transactions_model;
    public $orange_credit_users_model;
    public $orange_credit_business_plan_model;
    public $orange_credit_kyc_model;
    public $orange_credit_notifications_model;

    public function __construct()
    {
        $this->orange_credit_micro_loan_request_model = new
            orange_credit_micro_loan_request_model();
        $this->orange_credit_loan_type_model = new orange_credit_loan_type_model();
        $this->orange_credit_transactions_model = new orange_credit_transactions_model();
        $this->orange_credits_applications_model = new orange_credits_applications_model();
        $this->orange_credit_business_plan_model = new orange_credit_business_plan_model();
        $this->orange_credit_users_model = new admin_users_model();
        $this->orange_credit_kyc_model = new orange_credit_kyc_model();
        $this->orange_credit_notifications_model = new orange_credit_notifications_model();
    }

    public function invoke_orange_credit_micro_loan_request()
    {

        $user_id = get('bid') ? get('bid') : $_SESSION['H_USER_SESSION_ID'];
        $user_role_id = (int)$_SESSION['H_USER_SESSION_POSITION'];
        $range_start = get('range_start') ? get('range_start') : date('2019-01-01');
        $range_end = get('range_end') ? get('range_end') : date('Y-m-d');

        $query_keys = array(
            'user_id' => $user_id,
            'user_role' => $user_role_id,
            'range_start' => $range_start,
            'range_end' => $range_end);


        //SELECT ALL //////////////////////////////////
        if (get('do') == 'viewall') {
            $kyc_approval = $this->orange_credit_kyc_model->checkApprovedKYC($user_id);
            if (PAGINATION_TYPE == 'Normal') {
                $result = $this->orange_credit_micro_loan_request_model->SelectAll($query_keys,
                    RECORD_PER_PAGE);
                //Accept get url  e.g (index.php?id=1&cat=2...)
                $paging = pagination($this->orange_credit_micro_loan_request_model->CountRow($query_keys),
                    RECORD_PER_PAGE, '' . H_ADMIN .
                    '&view=orange_credit_micro_loan_request&do=viewall&bid=' . $user_id .
                    '&range_start=' . $range_start . '&range_end=' . $range_end);
            } else {
                $result = $this->orange_credit_micro_loan_request_model->SelectAll($query_keys);
            }
            include (APP_FOLDER . '/views/admin/orange_credit_micro_loan_request/View.php');
        }


        //EXPORT ////////////////////////////////////////////////////
        if (get('do') == 'export') {
            $result = $this->orange_credit_micro_loan_request_model->SelectAll($query_keys);
            include (APP_FOLDER . '/views/admin/orange_credit_micro_loan_request/Export.php');
        } //Expeort2
        elseif (get('do') == 'export2') {
            $rows = $this->orange_credit_micro_loan_request_model->SelectOne(get('id'));
            include (APP_FOLDER .
                '/views/admin/orange_credit_micro_loan_request/Export2.php');
        } //SEARCH SUGGEST ////////////////////////////////////////////////////
        elseif (get('do') == 'autosearch') {
            $qstring = post('qstring');
            if (strlen($qstring) > 0) {
                $autosearch = $this->orange_credit_micro_loan_request_model->AutoSearch(trim($qstring),
                    10, 'loan_type');
                echo ' <div class=widget><ul class="list-group">';
                foreach ($autosearch as $srow) {
                    echo '<span class="searchheading"><a href="' . H_ADMIN .
                        '&view=orange_credit_micro_loan_request&id=' . $srow->id .
                        '&do=details"><li class="list-group-item">' . $srow->loan_type . '</li></a>
	</span>';
                }
                echo '</ul></div>';
            }
        } //ADD //////////////////////////////////////////////////
        elseif (get('do') == 'add') {
            $kyc_approval = $this->orange_credit_kyc_model->checkApprovedKYC($user_id);
            if (!empty($kyc_approval) && $kyc_approval->kyc_status == 'APPROVED') {
                $credit_request_types = $this->orange_credit_loan_type_model->SelectAll();
                $beneficary_types = $this->orange_credit_users_model->SelectOne($_SESSION['H_USER_SESSION_ID']);
                $business_plans = $this->orange_credit_business_plan_model->showList($_SESSION['H_USER_SESSION_ID']);
                include (APP_FOLDER . '/views/admin/orange_credit_micro_loan_request/Add.php');
            } elseif (!empty($kyc_approval) && $kyc_approval->kyc_status == 'PENDING') {
                json_send('' . H_ADMIN . '&view=orange_credit_kyc&do=viewall&msg=kyc' . '&bid=' .
                    $_SESSION['H_USER_SESSION_ID']);
                json_notice('Your KYC needs to be Approved to perform this operation');
            } else {
                json_send('' . H_ADMIN . '&view=orange_credit_kyc&do=add&msg=nokyc' . '&bid=' .
                    $_SESSION['H_USER_SESSION_ID']);
                json_notice('Your KYC needs to be filled to perform this operation');
            }
        } //ADD PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'addpro') {
            if ($_POST) {
                //form validation
                if (post('loan_type') == '') {
                    json_error('The field loan type cannot be empty!');
                } elseif (post('business_type') == '') {
                    json_error('The field business type cannot be empty!');
                } elseif (post('monthly_revenue') == '') {
                    json_error('The field monthly revenue cannot be empty!');
                } elseif (post('loan_request_amount') == '') {
                    json_error('The field loan request amount cannot be empty!');
                } elseif (post('loan_repayment_amount') == '') {
                    json_error('The field loan repayment amount cannot be empty!');
                } elseif (post('loan_tenure') == '') {
                    json_error('The field loan tenure cannot be empty!');
                } elseif (post('loan_interest') == '') {
                    json_error('The field loan interest cannot be empty!');
                } elseif (post('activation_fee') == '') {
                    json_error('The field activation fee cannot be empty!');
                } elseif (post('loan_request_deposit') == '') {
                    json_error('The field loan request deposit cannot be empty!');
                } elseif (post('request_date') == '') {
                    json_error('The field request date cannot be empty!');
                } elseif (post('loan_status') == '') {
                    json_error('The field loan status cannot be empty!');
                } elseif (post('userid') == '') {
                    json_error('The field userid cannot be empty!');
                } else {
                    $this->orange_credit_micro_loan_request_model->Insert(post('loan_type'), post('business_type'),
                        post('monthly_revenue'), post('loan_request_amount'), post('loan_repayment_amount'),
                        post('loan_tenure'), post('loan_interest'), post('activation_fee'), post('loan_request_deposit'),
                        post('request_date'), post('loan_status'), post('userid'));

                    $loanAmount = (float)trim(post('loan_request_amount'));
                    $loan_interest_rate = (float)trim(post('loan_interest'));
                    $numOfMonths =(int) trim(post('loan_tenure'));
                    
                    $total_interest = ($loanAmount * ($loan_interest_rate/100));
	                $monthlyPayment = (($loanAmount / $numOfMonths) + $total_interest);            
                                       
                    $totalMonthlyPayment = round($monthlyPayment, 2);
                    $totalRePayment = round(($totalMonthlyPayment * $numOfMonths), 2);
                    $totalInterest = round(($totalRePayment - $loanAmount), 2);

                    $todays_date = date("Y-m-d");
                    $monthly_contribution_starts = date('Y-m-d', strtotime("$todays_date + 34 days"));
                    $monthly_contribution_ends = date('Y-m-d', strtotime("$todays_date + 102 days"));
                    $pending_approval = date('Y-m-d', strtotime("$todays_date + 3 days"));
                    $charge_account_every = date("d") - 1;
                    $standing_order = random_str('num', 8);

                    //Create Application Entry

                    $this->orange_credits_applications_model->Insert(post('activation_code'), post('userid'),
                        post('loan_type'), post('userid'), post('loan_request_amount'), post('loan_request_amount'),
                        post('activation_fee'), $totalMonthlyPayment, $totalRePayment, $totalInterest,
                        'PROCESSING', post('request_date'), $charge_account_every, $monthly_contribution_starts,
                        $monthly_contribution_ends, 'APPLICATION ENTRY PENDING, AWAITING ACTION', 0, $pending_approval,
                        'FALSE', $standing_order);


                    // Account debited
                    $arr = array('id' => (int) $_SESSION['H_USER_ACCOUNT_NUMBER'],
                        'fullname' =>  $_SESSION['H_USER_FULLNAME'],
                        'loan_amount' => number_format((float)post('loan_request_amount'), 2, ",", "."),
                        'monthly' => number_format((float)$totalMonthlyPayment, 2, ",", "."),
                        'total_loan_payment'=>number_format((float)$totalRePayment, 2, ",", "."),
                        'contribution_starts' => $monthly_contribution_starts,
                        'subject' => "Loan Application Successful",
                        'date' => date("Y-m-d H:i:s"),
                        'type' => "sms");
                    $senderParams = json_encode($arr);

                    $this->orange_credit_notifications_model->loan_application_successful($senderParams);
                    json_send('' . H_ADMIN .
                        '&view=orange_credit_micro_loan_request&do=viewall&msg=add');
                    json_success('Process Completed');
                }
            }
        } //UPDATE //////////////////////////////////////////////////
        elseif (get('do') == 'update') {
            $rows = $this->orange_credit_micro_loan_request_model->SelectOne(get('id'));
            $beneficary_types = $this->orange_credit_users_model->SelectOne($_SESSION['H_USER_SESSION_ID']);
            $business_plans = $this->orange_credit_business_plan_model->showList($_SESSION['H_USER_SESSION_ID']);
            include (APP_FOLDER . '/views/admin/orange_credit_micro_loan_request/Update.php');
        } //UPDATE PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'updatepro') {
            if ($_POST) {
                //form validation
                if (post('id') == '') {
                    json_error('The field id cannot be empty!');
                } elseif (post('loan_type') == '') {
                    json_error('The field loan type cannot be empty!');
                } elseif (post('business_type') == '') {
                    json_error('The field business type cannot be empty!');
                } elseif (post('monthly_revenue') == '') {
                    json_error('The field monthly revenue cannot be empty!');
                } elseif (post('loan_request_amount') == '') {
                    json_error('The field loan request amount cannot be empty!');
                } elseif (post('loan_repayment_amount') == '') {
                    json_error('The field loan repayment amount cannot be empty!');
                } elseif (post('loan_tenure') == '') {
                    json_error('The field loan tenure cannot be empty!');
                } elseif (post('loan_interest') == '') {
                    json_error('The field loan interest cannot be empty!');
                } elseif (post('activation_fee') == '') {
                    json_error('The field activation fee cannot be empty!');
                } elseif (post('loan_request_deposit') == '') {
                    json_error('The field loan request deposit cannot be empty!');
                } elseif (post('request_date') == '') {
                    json_error('The field request date cannot be empty!');
                } elseif (post('loan_status') == '') {
                    json_error('The field loan status cannot be empty!');
                } elseif (post('userid') == '') {
                    json_error('The field userid cannot be empty!');
                } else {
                    $this->orange_credit_micro_loan_request_model->Update(post('loan_type'), post('business_type'),
                        post('monthly_revenue'), post('loan_request_amount'), post('loan_repayment_amount'),
                        post('loan_tenure'), post('loan_interest'), post('activation_fee'), post('loan_request_deposit'),
                        post('request_date'), post('loan_status'), post('userid'), post('id'));



                    json_send('' . H_ADMIN . '&view=orange_credit_micro_loan_request&id=' . post('id') .
                        '&do=details&msg=update');
                    json_success('Process Completed');
                }
            }
        } //DETAILS //////////////////////////////////////////////
        elseif (get('do') == 'details') {
            $rows = $this->orange_credit_micro_loan_request_model->SelectOne(get('id'));
            include (APP_FOLDER .
                '/views/admin/orange_credit_micro_loan_request/Details.php');
        } //TRUNCATE ///////////////////////////////////////////////
        elseif (get('do') == 'truncate') {
            $this->orange_credit_micro_loan_request_model->TruncateTable('' . H_ADMIN .
                '&view=orange_credit_micro_loan_request&do=viewall&msg=truncate');
            include (APP_FOLDER . '/views/admin/orange_credit_micro_loan_request/View.php');
        } //DELETE /////////////////////////////////////////////////
        elseif (get('do') == 'delete') {
            $dfile = get('dfile');
            if (get('id') and $dfile == '') {
                $del = $this->orange_credit_micro_loan_request_model->Delete(get('id'), '' .
                    H_ADMIN . '&view=orange_credit_micro_loan_request&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') == '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                $del = $this->orange_credit_micro_loan_request_model->Delete(get('id'), '' .
                    H_ADMIN . '&view=orange_credit_micro_loan_request&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') != '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                send_to('' . H_ADMIN . '&view=orange_credit_micro_loan_request&id=' . get('id') .
                    '&do=update&msg=delete');
            }
        }
    } //end invoke
} //end class



?>
	