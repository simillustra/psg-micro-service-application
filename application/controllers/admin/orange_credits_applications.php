<?php

/*
* =======================================================================
* FILE NAME:        orange_credits_applications.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credits_applications
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/

if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');

include_once(APP_FOLDER . '/models/objects/orange_credits_applications.php');
include_once(APP_FOLDER . '/models/objects/orange_credit_kyc.php');
include_once(APP_FOLDER . '/models/objects/orange_credit_loan_type.php');
include_once(APP_FOLDER . '/models/objects/orange_credit_notifications.php');
include_once(APP_FOLDER . '/models/objects/orange_credit_standing_orders.php');
include_once(APP_FOLDER . '/models/objects/orange_credit_payment_history.php');
include_once('libraries/system_users.php');

class orange_credits_applications_controller
{
    public $orange_credits_applications_model;
    public $orange_credit_kyc_model;
    public $orange_credit_loan_type_model;
    public $orange_credit_notifications_model;
    public $orange_credit_users_model;
    public $orange_credit_standing_orders_model;
    public $orange_credit_payment_history_model;

    public function __construct()
    {
        $this->orange_credits_applications_model = new orange_credits_applications_model();
        $this->orange_credit_kyc_model = new orange_credit_kyc_model();
        $this->orange_credit_loan_type_model = new orange_credit_loan_type_model();
        $this->orange_credit_notifications_model = new orange_credit_notifications_model();
        $this->orange_credit_users_model = new admin_users_model();
        $this->orange_credit_standing_orders_model = new orange_credit_standing_orders_model();
        $this->orange_credit_payment_history_model = new orange_credit_payment_history_model();
    }

    public function invoke_orange_credits_applications()
    {
        $user_id = get('bid') ? get('bid') : $_SESSION['H_USER_SESSION_ID'];
        $user_role_id = (int)$_SESSION['H_USER_SESSION_POSITION'];
        $range_start = get('range_start') ? get('range_start') : date('2019-01-01');
        $range_end = get('range_end') ? get('range_end') : date('Y-m-d');

        $query_keys = array(
            'user_id' => $user_id,
            'user_role' => $user_role_id,
            'range_start' => $range_start,
            'range_end' => $range_end
        );

        //SELECT ALL //////////////////////////////////
        if (get('do') == 'viewall') {
            $kyc_approval = $this->orange_credit_kyc_model->checkApprovedKYC($user_id);
            if (PAGINATION_TYPE == 'Normal') {
                $result = $this->orange_credits_applications_model->SelectAll($query_keys, RECORD_PER_PAGE);
                //Accept get url  e.g (index.php?id=1&cat=2...)
                $paging = pagination($this->orange_credits_applications_model->CountRow($query_keys),
                    RECORD_PER_PAGE, '' . H_ADMIN . '&view=orange_credits_applications&do=viewall');
            } else {
                $result = $this->orange_credits_applications_model->SelectAll($query_keys);
            }
            include(APP_FOLDER . '/views/admin/orange_credits_applications/View.php');
        }


        //EXPORT ////////////////////////////////////////////////////
        if (get('do') == 'export') {
            $result = $this->orange_credits_applications_model->SelectAll($query_keys);
            include(APP_FOLDER . '/views/admin/orange_credits_applications/Export.php');
        } //Expeort2
        elseif (get('do') == 'export2') {
            $rows = $this->orange_credits_applications_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credits_applications/Export2.php');
        } //SEARCH SUGGEST ////////////////////////////////////////////////////
        elseif (get('do') == 'autosearch') {
            $qstring = post('qstring');
            if (strlen($qstring) > 0) {
                $autosearch = $this->orange_credits_applications_model->AutoSearch(trim($qstring), 10, 'activation_code');
                echo ' <div class=widget><ul class="list-group">';
                foreach ($autosearch as $srow) {
                    echo '<span class="searchheading"><a href="' . H_ADMIN . '&view=orange_credits_applications&id=' . $srow->id . '&do=details"><li class="list-group-item">' . $srow->activation_code . '</li></a>
	</span>';
                }
                echo '</ul></div>';
            }
        } //ADD //////////////////////////////////////////////////
        elseif (get('do') == 'add') {
            include(APP_FOLDER . '/views/admin/orange_credits_applications/Add.php');
        } //ADD PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'addpro') {
            if ($_POST) {
                //form validation
                if (post('activation_code') == '') {
                    json_error('The field activation code cannot be empty!');
                } elseif (post('request_beneficary') == '') {
                    json_error('The field request beneficary cannot be empty!');
                } elseif (post('request_type') == '') {
                    json_error('The field request type cannot be empty!');
                } elseif (post('sponsor_id') == '') {
                    json_error('The field sponsor id cannot be empty!');
                } elseif (post('amount_requested') == '') {
                    json_error('The field amount requested cannot be empty!');
                } elseif (post('amount_approved') == '') {
                    json_error('The field amount approved cannot be empty!');
                } elseif (post('activation_charge') == '') {
                    json_error('The field activation charge cannot be empty!');
                } elseif (post('monthly_repayment') == '') {
                    json_error('The field monthly repayment cannot be empty!');
                } elseif (post('total_repayment') == '') {
                    json_error('The field total repayment cannot be empty!');
                } elseif (post('total_interest') == '') {
                    json_error('The field total interest cannot be empty!');
                } elseif (post('application_status') == '') {
                    json_error('The field application status cannot be empty!');
                } elseif (post('createdAt') == '') {
                    json_error('The field createdAt cannot be empty!');
                } elseif (post('charge_account_every') == '') {
                    json_error('The field charge account every cannot be empty!');
                } elseif (post('monthly_repayment_starts') == '') {
                    json_error('The field monthly repayment starts cannot be empty!');
                } elseif (post('monthly_repayment_ends') == '') {
                    json_error('The field monthly repayment ends cannot be empty!');
                } elseif (post('comments') == '') {
                    json_error('The field comments cannot be empty!');
                } elseif (post('approved_by') == '') {
                    json_error('The field approved by cannot be empty!');
                } elseif (post('approvedAt') == '') {
                    json_error('The field approvedAt cannot be empty!');
                } elseif (post('has_standing_order') == '') {
                    json_error('The field has standing order cannot be empty!');
                } elseif (post('standing_order_id') == '') {
                    json_error('The field standing order id cannot be empty!');
                } else {
                    $this->orange_credits_applications_model->Insert(post('activation_code'), post('request_beneficary'), post('request_type'), post('sponsor_id'), post('amount_requested'), post('amount_approved'), post('activation_charge'), post('monthly_repayment'), post('total_repayment'), post('total_interest'), post('application_status'), post('createdAt'), post('charge_account_every'), post('monthly_repayment_starts'), post('monthly_repayment_ends'), post('comments'), post('approved_by'), post('approvedAt'), post('has_standing_order'), post('standing_order_id'));
                    json_send('' . H_ADMIN . '&view=orange_credits_applications&do=viewall&msg=add');
                    json_success('Process Completed');
                }
            }
        } //UPDATE //////////////////////////////////////////////////
        elseif (get('do') == 'update') {
            $rows = $this->orange_credits_applications_model->SelectOne(get('id'));
            $loan_types = $this->orange_credit_loan_type_model->SelectOne($rows->request_type);
            $beneficary_types = $this->orange_credit_users_model->SelectOne($rows->request_beneficary);
            include(APP_FOLDER . '/views/admin/orange_credits_applications/Update.php');
        } //UPDATE PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'updatepro') {
            if ($_POST) {
                //form validation
                if (post('id') == '') {
                    json_error('The field id cannot be empty!');
                } elseif (post('activation_code') == '') {
                    json_error('The field activation code cannot be empty!');
                } elseif (post('request_beneficary') == '') {
                    json_error('The field request beneficiary cannot be empty!');
                } elseif (post('request_type') == '') {
                    json_error('The field request type cannot be empty!');
                } elseif (post('sponsor_id') == '') {
                    json_error('The field sponsor id cannot be empty!');
                } elseif (post('amount_requested') == '') {
                    json_error('The field amount requested cannot be empty!');
                } elseif (post('amount_approved') == '') {
                    json_error('The field amount approved cannot be empty!');
                } elseif (post('activation_charge') == '') {
                    json_error('The field activation charge cannot be empty!');
                } elseif (post('monthly_repayment') == '') {
                    json_error('The field monthly repayment cannot be empty!');
                } elseif (post('total_repayment') == '') {
                    json_error('The field total repayment cannot be empty!');
                } elseif (post('total_interest') == '') {
                    json_error('The field total interest cannot be empty!');
                } elseif (post('application_status') == '') {
                    json_error('The field application status cannot be empty!');
                } elseif (post('createdAt') == '') {
                    json_error('The field createdAt cannot be empty!');
                } elseif (post('charge_account_every') == '') {
                    json_error('The field charge account every cannot be empty!');
                } elseif (post('monthly_repayment_starts') == '') {
                    json_error('The field monthly repayment starts cannot be empty!');
                } elseif (post('monthly_repayment_ends') == '') {
                    json_error('The field monthly repayment ends cannot be empty!');
                } elseif (post('comments') == '') {
                    json_error('The field comments cannot be empty!');
                } elseif (post('approved_by') == '') {
                    json_error('The field approved by cannot be empty!');
                } elseif (post('approvedAt') == '') {
                    json_error('The field approvedAt cannot be empty!');
                } elseif (post('has_standing_order') == '') {
                    json_error('The field has standing order cannot be empty!');
                } elseif (post('standing_order_id') == '') {
                    json_error('The field standing order id cannot be empty!');
                } else {

                    if (post('application_status') === 'APPROVED') {
                        $loanAmount = (float)trim(post('amount_approved'));
                        $loan_interest_rate = (float)trim(post('loan_interest'));
                        $numOfMonths = (int)trim(post('loan_tenure'));

                        $total_interest = ($loanAmount * ($loan_interest_rate / 100));
                        $monthlyPayment = (($loanAmount / $numOfMonths) + $total_interest);

                        $totalMonthlyPayment = round($monthlyPayment, 2);
                        $totalRePayment = round(($totalMonthlyPayment * $numOfMonths), 2);
                        $totalInterest = round(($totalRePayment - $loanAmount), 2);

                        $todays_date = date("Y-m-d");
                        $monthly_contribution_starts = date('Y-m-d', strtotime("$todays_date + 30 days"));
                        $monthly_contribution_next = date('Y-m-d', strtotime("$todays_date + 60 days"));
                        $monthly_contribution_ends = date('Y-m-d', strtotime("$todays_date + 90 days"));
                        $charge_account_every = date("d") - 1;

                        $_10_Percent_deductible = (float)($loanAmount * 0.1);

                        if ($this->orange_credit_standing_orders_model->deduct_down_payment(post('request_beneficary'), post('payee_account_number'), post('recieving_account'), $_10_Percent_deductible)) {

                            $this->orange_credits_applications_model->Update(
                                post('activation_code'),
                                post('request_beneficary'),
                                post('request_type'),
                                post('sponsor_id'),
                                post('amount_requested'),
                                post('amount_approved'),
                                post('activation_charge'),
                                $totalMonthlyPayment,
                                $totalRePayment,
                                $totalInterest,
                                post('application_status'),
                                post('createdAt'),
                                $charge_account_every,
                                $monthly_contribution_starts,
                                $monthly_contribution_ends,
                                post('comments'),
                                post('approved_by'),
                                post('approvedAt'),
                                "TRUE",
                                post('standing_order_id'),
                                post('id'));


                            $this->orange_credit_standing_orders_model->Insert(
                                post('request_beneficary'),
                                post('payee_name'),
                                post('payee_account_number'),
                                $totalRePayment,
                                $totalMonthlyPayment,
                                post('recieving_account'),
                                $numOfMonths,
                                1,
                                post('charge_account_every'),
                                $monthly_contribution_starts,
                                $monthly_contribution_next,
                                $monthly_contribution_ends,
                                post('approved_by'),
                                post('id'),
                                post('approvedAt'));

                            $days_cycle = 30;
                            $transaction_id = random_str('num', 8);
                            $standing_order_id = $this->orange_credit_standing_orders_model->lastInsertID();

                            for ($i = 1; $i <= $numOfMonths; $i++) {

                                $monthly_payment_debits = date('Y-m-d', strtotime("$todays_date + $days_cycle days"));

                                $this->orange_credit_payment_history_model->Insert(
                                    post('request_beneficary'),
                                    post('payee_account_number'),
                                    'WALLET PAYMENT',
                                    post('id'),
                                    $totalMonthlyPayment,
                                    'PENDING',
                                    $transaction_id,
                                    $standing_order_id ? $standing_order_id : post('standing_order_id'),
                                    $monthly_payment_debits
                                );

                                $days_cycle += 30;

                            }


                            // Loan Approval Notice
                            $arr = array('id' => (int)post('phone'),
                                'loan_amount' => number_format((float)post('amount_approved'), 2, ",", "."),
                                'monthly' => number_format((float)$totalMonthlyPayment, 2, ",", "."),
                                'total_loan_payment' => number_format((float)$totalRePayment, 2, ",", "."),
                                'contribution_starts' => $monthly_contribution_starts,
                                'subject' => "Loan Approved",
                                'date' => date("Y-m-d H:i:s"),
                                'type' => "sms");
                            $senderParams = json_encode($arr);

                            $this->orange_credit_notifications_model->approved_loan_notice($senderParams);
                        } else {

                            //json_send('' . H_ADMIN . '&view=orange_credits_applications&id=' . post('id') . '&do=details&msg=update');
                            json_error('Error Occured when making deductions');

                        }

                    } else {
                        $this->orange_credits_applications_model->Update(
                            post('activation_code'),
                            post('request_beneficary'),
                            post('request_type'),
                            post('sponsor_id'),
                            post('amount_requested'),
                            post('amount_approved'),
                            post('activation_charge'),
                            post('monthly_repayment'),
                            post('total_repayment'),
                            post('total_interest'),
                            post('application_status'),
                            post('createdAt'),
                            post('charge_account_every'),
                            post('monthly_repayment_starts'),
                            post('monthly_repayment_ends'),
                            post('comments'),
                            post('approved_by'),
                            post('approvedAt'),
                            post('has_standing_order'),
                            post('standing_order_id'),
                            post('id'));

                        if (post('application_status') === 'DECLINED') {
                            // Loan Approval Notice
                            $arr = array('id' => (int)post('phone'),
                                'loan_amount' => number_format((float)post('amount_requested'), 2, ",", "."),
                                'monthly' => number_format((float)post('monthly_repayment'), 2, ",", "."),
                                'fullname' => post('fullname'),
                                'subject' => "Loan Declined",
                                'date' => date("Y-m-d H:i:s"),
                                'type' => "sms");
                            $senderParams = json_encode($arr);

                            $this->orange_credit_notifications_model->loan_status_notice($senderParams);

                        }
                    }


                    json_send('' . H_ADMIN . '&view=orange_credits_applications&id=' . post('id') . '&do=details&msg=update');
                    json_success('Process Completed');
                }
            }
        } //DETAILS //////////////////////////////////////////////
        elseif (get('do') == 'details') {
            $rows = $this->orange_credits_applications_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credits_applications/Details.php');
        } //TRUNCATE ///////////////////////////////////////////////
        elseif (get('do') == 'truncate') {
            $this->orange_credits_applications_model->TruncateTable('' . H_ADMIN . '&view=orange_credits_applications&do=viewall&msg=truncate');
            include(APP_FOLDER . '/views/admin/orange_credits_applications/View.php');
        } //DELETE /////////////////////////////////////////////////
        elseif (get('do') == 'delete') {
            $dfile = get('dfile');
            if (get('id') and $dfile == '') {
                $del = $this->orange_credits_applications_model->Delete(get('id'), '' . H_ADMIN . '&view=orange_credits_applications&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') == '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                $del = $this->orange_credits_applications_model->Delete(get('id'), '' . H_ADMIN . '&view=orange_credits_applications&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') != '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                send_to('' . H_ADMIN . '&view=orange_credits_applications&id=' . get('id') . '&do=update&msg=delete');
            }
        }
    }//end invoke
}//end class
?>
	