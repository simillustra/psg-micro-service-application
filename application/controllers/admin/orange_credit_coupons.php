<?php

/*
* =======================================================================
* FILE NAME:        orange_credit_coupons.php
* DATE CREATED:  	01-04-2020
* FOR TABLE:  		orange_credit_coupons
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/

if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include(APP_FOLDER . '/models/objects/orange_credit_coupons.php');
include(APP_FOLDER . '/models/objects/orange_credits_accounts.php');

class orange_credit_coupons_controller
{
    public $orange_credit_coupons_model;
    public $orange_credits_accounts_model;

    public function __construct()
    {
        $this->orange_credit_coupons_model = new orange_credit_coupons_model();
        $this->orange_credits_accounts_model = new orange_credits_accounts_model();
    }

    public function invoke_orange_credit_coupons()
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
            if (PAGINATION_TYPE == 'Normal') {
                $result = $this->orange_credit_coupons_model->SelectAll($query_keys,
                    RECORD_PER_PAGE);
                //Accept get url  e.g (index.php?id=1&cat=2...)
                $paging = pagination($this->orange_credit_coupons_model->CountRow($query_keys),
                    RECORD_PER_PAGE, '' . H_ADMIN . '&view=orange_credit_coupons&do=viewall&bid=' .
                    $user_id . '&range_start=' . $range_start . '&range_end=' . $range_end);
            } else {
                $result = $this->orange_credit_coupons_model->SelectAll($query_keys);
            }
            include(APP_FOLDER . '/views/admin/orange_credit_coupons/View.php');
        }


        //EXPORT ////////////////////////////////////////////////////
        if (get('do') == 'export') {
            $result = $this->orange_credit_coupons_model->SelectAll($query_keys);
            include(APP_FOLDER . '/views/admin/orange_credit_coupons/Export.php');
        } //Expeort2
        elseif (get('do') == 'export2') {
            $rows = $this->orange_credit_coupons_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_coupons/Export2.php');
        } //SEARCH SUGGEST ////////////////////////////////////////////////////
        elseif (get('do') == 'autosearch') {
            $qstring = post('qstring');
            if (strlen($qstring) > 0) {
                $autosearch = $this->orange_credit_coupons_model->AutoSearch(trim($qstring), 10,
                    'coupon_code');
                echo ' <div class=widget><ul class="list-group">';
                foreach ($autosearch as $srow) {
                    echo '<span class="searchheading"><a href="' . H_ADMIN .
                        '&view=orange_credit_coupons&id=' . $srow->id .
                        '&do=details"><li class="list-group-item">' . $srow->coupon_code . '</li></a>
	</span>';
                }
                echo '</ul></div>';
            }
        } //ADD //////////////////////////////////////////////////
        elseif (get('do') == 'add') {
            include(APP_FOLDER . '/views/admin/orange_credit_coupons/Add.php');
        } //ADD PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'addpro') {
            if ($_POST) {
                //form validation
                if (post('coupon_code') == '') {
                    json_error('The field coupon code cannot be empty!');
                } elseif (post('coupon_amount') == '') {
                    json_error('The field coupon amount cannot be empty!');
                } elseif ($this->orange_credits_accounts_model->accountHasAvailableFunds($_SESSION['H_USER_ACCOUNT_NUMBER'], floatval(post('coupon_amount'))) == false) {
                    json_error('We could not verify that you have sufficient funds for this transaction!');
                } elseif (post('coupon_trans_id') == '') {
                    json_error('The field coupon trans id cannot be empty!');
                } elseif (post('coupon_payment_mode') == '') {
                    json_error('The field coupon payment mode cannot be empty!');
                } elseif (post('coupon_status') == '') {
                    json_error('The field coupon status cannot be empty!');
                } elseif (post('coupon_date_added') == '') {
                    json_error('The field coupon date added cannot be empty!');
                } elseif (post('coupon_date_activated') == '') {
                    json_error('The field coupon date activated cannot be empty!');
                } elseif (post('coupon_user') == '') {
                    json_error('The field coupon user cannot be empty!');
                } else {

                   $this->orange_credit_coupons_model->Insert(post('coupon_code'), post('coupon_amount'),
                        post('coupon_trans_id'), post('coupon_payment_mode'), post('coupon_status'),
                        post('coupon_date_added'), post('coupon_date_activated'), post('coupon_user'), post('coupon_account'), 0);
                    json_send('' . H_ADMIN . '&view=orange_credit_coupons&do=viewall&msg=add');
                    json_success('Process Completed');
                }
            }
        } //UPDATE //////////////////////////////////////////////////
        elseif (get('do') == 'update') {
            $rows = $this->orange_credit_coupons_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_coupons/Update.php');
        } //UPDATE PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'updatepro') {
            if ($_POST) {
                //form validation
                if (post('id') == '') {
                    json_error('The field id cannot be empty!');
                } elseif (post('coupon_code') == '') {
                    json_error('The field coupon code cannot be empty!');
                } elseif (post('coupon_amount') == '') {
                    json_error('The field coupon amount cannot be empty!');
                } elseif (post('coupon_trans_id') == '') {
                    json_error('The field coupon trans id cannot be empty!');
                } elseif (post('coupon_payment_mode') == '') {
                    json_error('The field coupon payment mode cannot be empty!');
                } elseif (post('coupon_status') == '') {
                    json_error('The field coupon status cannot be empty!');
                } elseif (post('coupon_date_added') == '') {
                    json_error('The field coupon date added cannot be empty!');
                } elseif (post('coupon_date_activated') == '') {
                    json_error('The field coupon date activated cannot be empty!');
                } elseif (post('coupon_user') == '') {
                    json_error('The field coupon user cannot be empty!');
                } else {
                    $this->orange_credit_coupons_model->Update(post('coupon_code'), post('coupon_amount'),
                        post('coupon_trans_id'), post('coupon_payment_mode'), post('coupon_status'),
                        post('coupon_date_added'), post('coupon_date_activated'), post('coupon_user'), post('coupon_account'),
                        post('id'));
                    json_send('' . H_ADMIN . '&view=orange_credit_coupons&id=' . post('id') .
                        '&do=details&msg=update');
                    json_success('Process Completed');
                }
            }
        } //DETAILS //////////////////////////////////////////////
        elseif (get('do') == 'details') {
            $rows = $this->orange_credit_coupons_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_coupons/Details.php');
        } //TRUNCATE ///////////////////////////////////////////////
        elseif (get('do') == 'truncate') {
            $this->orange_credit_coupons_model->TruncateTable('' . H_ADMIN .
                '&view=orange_credit_coupons&do=viewall&msg=truncate');
            include(APP_FOLDER . '/views/admin/orange_credit_coupons/View.php');
        } //DELETE /////////////////////////////////////////////////
        elseif (get('do') == 'delete') {
            $dfile = get('dfile');
            if (get('id') and $dfile == '') {
                $del = $this->orange_credit_coupons_model->Delete(get('id'), '' . H_ADMIN .
                    '&view=orange_credit_coupons&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') == '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                $del = $this->orange_credit_coupons_model->Delete(get('id'), '' . H_ADMIN .
                    '&view=orange_credit_coupons&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') != '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                send_to('' . H_ADMIN . '&view=orange_credit_coupons&id=' . get('id') .
                    '&do=update&msg=delete');
            }
        }
    } //end invoke
} //end class


?>
	