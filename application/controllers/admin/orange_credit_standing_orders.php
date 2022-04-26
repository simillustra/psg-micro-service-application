<?php

/*
* =======================================================================
* FILE NAME:        orange_credit_standing_orders.php
* DATE CREATED:  	18-12-2020
* FOR TABLE:  		orange_credit_standing_orders
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/

if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');

include(APP_FOLDER . '/models/objects/orange_credit_standing_orders.php');

class orange_credit_standing_orders_controller
{
    public $orange_credit_standing_orders_model;

    public function __construct()
    {
        $this->orange_credit_standing_orders_model = new orange_credit_standing_orders_model();
    }

    public function invoke_orange_credit_standing_orders()
    {

        //SELECT ALL //////////////////////////////////
        if (get('do') == 'viewall') {
            if (PAGINATION_TYPE == 'Normal') {
                $result = $this->orange_credit_standing_orders_model->SelectAll(RECORD_PER_PAGE);
                //Accept get url  e.g (index.php?id=1&cat=2...)
                $paging = pagination($this->orange_credit_standing_orders_model->CountRow(), RECORD_PER_PAGE, '' . H_ADMIN . '&view=orange_credit_standing_orders&do=viewall');
            } else {
                $result = $this->orange_credit_standing_orders_model->SelectAll();
            }
            include(APP_FOLDER . '/views/admin/orange_credit_standing_orders/View.php');
        }


        //EXPORT ////////////////////////////////////////////////////
        if (get('do') == 'export') {
            $result = $this->orange_credit_standing_orders_model->SelectAll();
            include(APP_FOLDER . '/views/admin/orange_credit_standing_orders/Export.php');
        } //Expeort2
        elseif (get('do') == 'export2') {
            $rows = $this->orange_credit_standing_orders_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_standing_orders/Export2.php');
        } //SEARCH SUGGEST ////////////////////////////////////////////////////
        elseif (get('do') == 'autosearch') {
            $qstring = post('qstring');
            if (strlen($qstring) > 0) {
                $autosearch = $this->orange_credit_standing_orders_model->AutoSearch(trim($qstring), 10, 'payee_id');
                echo ' <div class=widget><ul class="list-group">';
                foreach ($autosearch as $srow) {
                    echo '<span class="searchheading"><a href="' . H_ADMIN . '&view=orange_credit_standing_orders&id=' . $srow->id . '&do=details"><li class="list-group-item">' . $srow->payee_id . '</li></a>
	</span>';
                }
                echo '</ul></div>';
            }
        } //ADD //////////////////////////////////////////////////
        elseif (get('do') == 'add') {
            include(APP_FOLDER . '/views/admin/orange_credit_standing_orders/Add.php');
        } //ADD PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'addpro') {
            if ($_POST) {
                //form validation
                if (post('payee_id') == '') {
                    json_error('The field payee id cannot be empty!');
                } elseif (post('payee_name') == '') {
                    json_error('The field payee name cannot be empty!');
                } elseif (post('payee_account_number') == '') {
                    json_error('The field payee account number cannot be empty!');
                } elseif (post('total_amount') == '') {
                    json_error('The field total amount cannot be empty!');
                } elseif (post('deductable_amount') == '') {
                    json_error('The field deductable amount cannot be empty!');
                } elseif (post('recieving_account') == '') {
                    json_error('The field recieving account cannot be empty!');
                } elseif (post('number_of_payment') == '') {
                    json_error('The field number of payment cannot be empty!');
                } elseif (post('order_status') == '') {
                    json_error('The field order status cannot be empty!');
                } elseif (post('payment_frequency') == '') {
                    json_error('The field payment frequency cannot be empty!');
                } elseif (post('starting_date') == '') {
                    json_error('The field starting date cannot be empty!');
                } elseif (post('next_payment_date') == '') {
                    json_error('The field next payment date cannot be empty!');
                } elseif (post('ending_date') == '') {
                    json_error('The field ending date cannot be empty!');
                } elseif (post('authorizedBy') == '') {
                    json_error('The field authorizedBy cannot be empty!');
                } elseif (post('reference') == '') {
                    json_error('The field reference cannot be empty!');
                } elseif (post('createdAt') == '') {
                    json_error('The field createdAt cannot be empty!');
                } else {
                    $this->orange_credit_standing_orders_model->Insert(post('payee_id'), post('payee_name'), post('payee_account_number'), post('total_amount'), post('deductable_amount'), post('recieving_account'), post('number_of_payment'), post('order_status'), post('payment_frequency'), post('starting_date'), post('next_payment_date'), post('ending_date'), post('authorizedBy'), post('reference'), post('createdAt'));
                    json_send('' . H_ADMIN . '&view=orange_credit_standing_orders&do=viewall&msg=add');
                    json_success('Process Completed');
                }
            }
        } //UPDATE //////////////////////////////////////////////////
        elseif (get('do') == 'update') {
            $rows = $this->orange_credit_standing_orders_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_standing_orders/Update.php');
        } //UPDATE PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'updatepro') {
            if ($_POST) {
                //form validation
                if (post('id') == '') {
                    json_error('The field id cannot be empty!');
                } elseif (post('payee_id') == '') {
                    json_error('The field payee id cannot be empty!');
                } elseif (post('payee_name') == '') {
                    json_error('The field payee name cannot be empty!');
                } elseif (post('payee_account_number') == '') {
                    json_error('The field payee account number cannot be empty!');
                } elseif (post('total_amount') == '') {
                    json_error('The field total amount cannot be empty!');
                } elseif (post('deductable_amount') == '') {
                    json_error('The field deductable amount cannot be empty!');
                } elseif (post('recieving_account') == '') {
                    json_error('The field recieving account cannot be empty!');
                } elseif (post('number_of_payment') == '') {
                    json_error('The field number of payment cannot be empty!');
                } elseif (post('order_status') == '') {
                    json_error('The field order status cannot be empty!');
                } elseif (post('payment_frequency') == '') {
                    json_error('The field payment frequency cannot be empty!');
                } elseif (post('starting_date') == '') {
                    json_error('The field starting date cannot be empty!');
                } elseif (post('next_payment_date') == '') {
                    json_error('The field next payment date cannot be empty!');
                } elseif (post('ending_date') == '') {
                    json_error('The field ending date cannot be empty!');
                } elseif (post('authorizedBy') == '') {
                    json_error('The field authorizedBy cannot be empty!');
                } elseif (post('reference') == '') {
                    json_error('The field reference cannot be empty!');
                } elseif (post('createdAt') == '') {
                    json_error('The field createdAt cannot be empty!');
                } else {
                    $this->orange_credit_standing_orders_model->Update(post('payee_id'), post('payee_name'), post('payee_account_number'), post('total_amount'), post('deductable_amount'), post('recieving_account'), post('number_of_payment'), post('order_status'), post('payment_frequency'), post('starting_date'), post('next_payment_date'), post('ending_date'), post('authorizedBy'), post('reference'), post('createdAt'), post('id'));
                    json_send('' . H_ADMIN . '&view=orange_credit_standing_orders&id=' . post('id') . '&do=details&msg=update');
                    json_success('Process Completed');
                }
            }
        } //DETAILS //////////////////////////////////////////////
        elseif (get('do') == 'details') {
            $rows = $this->orange_credit_standing_orders_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_standing_orders/Details.php');
        } //TRUNCATE ///////////////////////////////////////////////
        elseif (get('do') == 'truncate') {
            $this->orange_credit_standing_orders_model->TruncateTable('' . H_ADMIN . '&view=orange_credit_standing_orders&do=viewall&msg=truncate');
            include(APP_FOLDER . '/views/admin/orange_credit_standing_orders/View.php');
        } //DELETE /////////////////////////////////////////////////
        elseif (get('do') == 'delete') {
            $dfile = get('dfile');
            if (get('id') and $dfile == '') {
                $del = $this->orange_credit_standing_orders_model->Delete(get('id'), '' . H_ADMIN . '&view=orange_credit_standing_orders&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') == '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                $del = $this->orange_credit_standing_orders_model->Delete(get('id'), '' . H_ADMIN . '&view=orange_credit_standing_orders&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') != '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                send_to('' . H_ADMIN . '&view=orange_credit_standing_orders&id=' . get('id') . '&do=update&msg=delete');
            }
        }
    }//end invoke
}//end class
?>
	