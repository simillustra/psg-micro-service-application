<?php

/*
* =======================================================================
* FILE NAME:        orange_credit_business_plan.php
* DATE CREATED:  	01-04-2020
* FOR TABLE:  		orange_credit_business_plan
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/

if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include(APP_FOLDER . '/models/objects/orange_credit_business_plan.php');
include(APP_FOLDER . '/models/objects/orange_credit_coupons.php');
include_once('libraries/system_users.php');
include(APP_FOLDER . '/models/objects/orange_credit_kyc.php');
include(APP_FOLDER . '/models/objects/orange_credit_notifications.php');

class orange_credit_business_plan_controller
{
    public $orange_credit_business_plan_model;
    public $orange_credit_coupons_model;
    public $orange_credit_users_model;
    public $orange_credit_kyc_model;
    public $orange_credit_notifications_model;

    public function __construct()
    {
        $this->orange_credit_business_plan_model = new orange_credit_business_plan_model();
        $this->orange_credit_coupons_model = new orange_credit_coupons_model();
        $this->orange_credit_users_model = new admin_users_model();
        $this->orange_credit_kyc_model = new orange_credit_kyc_model();
        $this->orange_credit_notifications_model = new orange_credit_notifications_model();
    }

    public function invoke_orange_credit_business_plan()
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
                $result = $this->orange_credit_business_plan_model->SelectAll($query_keys, RECORD_PER_PAGE);
                //Accept get url  e.g (index.php?id=1&cat=2...)
                $paging = pagination($this->orange_credit_business_plan_model->CountRow($query_keys),
                    RECORD_PER_PAGE, '' . H_ADMIN . '&view=orange_credit_business_plan&do=viewall&bid=' . $user_id . '&range_start=' . $range_start . '&range_end=' . $range_end);
            } else {
                $result = $this->orange_credit_business_plan_model->SelectAll($query_keys);
            }
            $number_of_entry = $this->orange_credit_business_plan_model->CountRow($query_keys);
            include(APP_FOLDER . '/views/admin/orange_credit_business_plan/View.php');
        }


        //EXPORT ////////////////////////////////////////////////////
        if (get('do') == 'export') {
            $result = $this->orange_credit_business_plan_model->SelectAll($query_keys);
            include(APP_FOLDER . '/views/admin/orange_credit_business_plan/Export.php');
        } //Expeort2
        elseif (get('do') == 'export2') {
            $rows = $this->orange_credit_business_plan_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_business_plan/Export2.php');
        } //SEARCH SUGGEST ////////////////////////////////////////////////////
        elseif (get('do') == 'autosearch') {
            $qstring = post('qstring');
            if (strlen($qstring) > 0) {
                $autosearch = $this->orange_credit_business_plan_model->AutoSearch(trim($qstring),
                    10, 'business_name');
                echo ' <div class=widget><ul class="list-group">';
                foreach ($autosearch as $srow) {
                    echo '<span class="searchheading"><a href="' . H_ADMIN .
                        '&view=orange_credit_business_plan&id=' . $srow->id .
                        '&do=details"><li class="list-group-item">' . $srow->business_name . '</li></a>
	</span>';
                }
                echo '</ul></div>';
            }
        } //ADD //////////////////////////////////////////////////
        elseif (get('do') == 'add') {
            $number_of_entry = $this->orange_credit_business_plan_model->CountRow($query_keys);
            $kyc_approval = $this->orange_credit_kyc_model->checkApprovedKYC($user_id);
            if (!empty($kyc_approval) && $kyc_approval->kyc_status == 'APPROVED') {
                if ($number_of_entry == false && $number_of_entry == 0) {
                    include(APP_FOLDER . '/views/admin/orange_credit_business_plan/Add.php');
                } else {
                    json_send('' . H_ADMIN . '&view=orange_credit_kyc&do=viewall&msg=kyc' . '&bid=' .
                        $_SESSION['H_USER_SESSION_ID']);
                    json_notice('You can only edit your business information and not add');
                }
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
                if (post('business_plan_title') == '') {
                    json_error('The field business plan title cannot be empty!');
                } elseif (post('business_name') == '') {
                    json_error('The field business name cannot be empty!');
                } elseif (post('business_address') == '') {
                    json_error('The field business address cannot be empty!');
                } elseif (post('business_manager') == '') {
                    json_error('The field business manager cannot be empty!');
                } elseif (post('business_type') == '') {
                    json_error('The field business type cannot be empty!');
                } elseif (post('business_market_demand') == '') {
                    json_error('The field business market demand cannot be empty!');
                } elseif (post('business_sales_frequency') == '') {
                    json_error('The field business sales frequency cannot be empty!');
                } elseif (post('business_monthly_revenue') == '') {
                    json_error('The field business monthly revenue cannot be empty!');
                } elseif (post('business_investment') == '') {
                    json_error('The field business investment cannot be empty!');
                } elseif (post('business_investment_duration') == '') {
                    json_error('The field business investment duration cannot be empty!');
                } elseif (post('business_estimated_profit_margin') == '') {
                    json_error('The field business estimated profit margin cannot be empty!');
                } elseif (post('business_expected_monthly_sales') == '') {
                    json_error('The field business expected monthly sales cannot be empty!');
                } elseif (post('business_coupon_code') == '') {
                    json_error('The field business coupon code cannot be empty!');
                } elseif (post('business_plan_status') == '') {
                    json_error('The field business plan status cannot be empty!');
                } elseif (post('business_date_applied') == '') {
                    json_error('The field business date applied cannot be empty!');
                } elseif (post('business_date_approved') == '') {
                    json_error('The field business date approved cannot be empty!');
                } elseif (post('business_plan_user') == '') {
                    json_error('The field business plan user cannot be empty!');
                } else {
                    $this->orange_credit_business_plan_model->Insert(post('business_plan_title'), post('business_name'), post('business_address'),
                        post('business_manager'), post('business_type'), post('business_market_demand'),
                        post('business_sales_frequency'), post('business_monthly_revenue'), post('business_investment'),
                        post('business_investment_duration'), post('business_estimated_profit_margin'),
                        post('business_expected_monthly_sales'), post('business_coupon_code'), post('business_plan_status'),
                        post('business_date_applied'), post('business_date_approved'), post('business_plan_user'));


                    $userInfo = $this->orange_credit_users_model->SelectOne(post('business_plan_user'));
                    // KYC added notification
                    $arr = array('id' => (int)$userInfo->phone,
                        'fullname' => $userInfo->first_name . ' ' . $userInfo->last_name,
                        'subject' => "Business Plan added",
                        'date' => date("Y-m-d H:i:s"),
                        'type' => "sms");
                    $senderParams = json_encode($arr);

                    $this->orange_credit_notifications_model->business_information_added($senderParams);


                    json_send('' . H_ADMIN . '&view=orange_credit_business_plan&do=viewall&msg=add');
                    json_success('Process Completed');
                }
            }
        } //UPDATE //////////////////////////////////////////////////
        elseif (get('do') == 'update') {
            $rows = $this->orange_credit_business_plan_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_business_plan/Update.php');
        } //UPDATE PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'updatepro') {
            if ($_POST) {
                //form validation
                if (post('id') == '') {
                    json_error('The field id cannot be empty!');
                } elseif (post('business_plan_title') == '') {
                    json_error('The field business plan title cannot be empty!');
                } elseif (post('business_name') == '') {
                    json_error('The field business name cannot be empty!');
                } elseif (post('business_address') == '') {
                    json_error('The field business address cannot be empty!');
                } elseif (post('business_manager') == '') {
                    json_error('The field business manager cannot be empty!');
                } elseif (post('business_type') == '') {
                    json_error('The field business type cannot be empty!');
                } elseif (post('business_market_demand') == '') {
                    json_error('The field business market demand cannot be empty!');
                } elseif (post('business_sales_frequency') == '') {
                    json_error('The field business sales frequency cannot be empty!');
                } elseif (post('business_monthly_revenue') == '') {
                    json_error('The field business monthly revenue cannot be empty!');
                } elseif (post('business_investment') == '') {
                    json_error('The field business investment cannot be empty!');
                } elseif (post('business_investment_duration') == '') {
                    json_error('The field business investment duration cannot be empty!');
                } elseif (post('business_estimated_profit_margin') == '') {
                    json_error('The field business estimated profit margin cannot be empty!');
                } elseif (post('business_expected_monthly_sales') == '') {
                    json_error('The field business expected monthly sales cannot be empty!');
                } elseif (post('business_coupon_code') == '') {
                    json_error('The field business coupon code cannot be empty!');
                } elseif (post('business_plan_status') == '') {
                    json_error('The field business plan status cannot be empty!');
                } elseif (post('business_date_applied') == '') {
                    json_error('The field business date applied cannot be empty!');
                } elseif (post('business_date_approved') == '') {
                    json_error('The field business date approved cannot be empty!');
                } elseif (post('business_plan_user') == '') {
                    json_error('The field business plan user cannot be empty!');
                } else {
                    $this->orange_credit_business_plan_model->Update(post('business_plan_title'), post('business_name'), post('business_address'),
                        post('business_manager'), post('business_type'), post('business_market_demand'),
                        post('business_sales_frequency'), post('business_monthly_revenue'), post('business_investment'),
                        post('business_investment_duration'), post('business_estimated_profit_margin'),
                        post('business_expected_monthly_sales'), post('business_coupon_code'), post('business_plan_status'),
                        post('business_date_applied'), post('business_date_approved'), post('business_plan_user'),
                        post('id'));
                    json_send('' . H_ADMIN . '&view=orange_credit_business_plan&id=' . post('id') .
                        '&do=details&msg=update');
                    json_success('Process Completed');
                }
            }
        } //DETAILS //////////////////////////////////////////////
        elseif (get('do') == 'details') {
            $rows = $this->orange_credit_business_plan_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_business_plan/Details.php');
        } //TRUNCATE ///////////////////////////////////////////////
        elseif (get('do') == 'truncate') {
            $this->orange_credit_business_plan_model->TruncateTable('' . H_ADMIN .
                '&view=orange_credit_business_plan&do=viewall&msg=truncate');
            include(APP_FOLDER . '/views/admin/orange_credit_business_plan/View.php');
        } //DELETE /////////////////////////////////////////////////
        elseif (get('do') == 'delete') {
            $dfile = get('dfile');
            if (get('id') and $dfile == '') {
                $del = $this->orange_credit_business_plan_model->Delete(get('id'), '' . H_ADMIN .
                    '&view=orange_credit_business_plan&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') == '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                $del = $this->orange_credit_business_plan_model->Delete(get('id'), '' . H_ADMIN .
                    '&view=orange_credit_business_plan&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') != '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                send_to('' . H_ADMIN . '&view=orange_credit_business_plan&id=' . get('id') .
                    '&do=update&msg=delete');
            }
        }
    } //end invoke
} //end class

?>
	