<?php

/*
* =======================================================================
* FILE NAME:        orange_credit_loan_type.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_loan_type
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/

if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');

include(APP_FOLDER . '/models/objects/orange_credit_loan_type.php');

class orange_credit_loan_type_controller
{
    public $orange_credit_loan_type_model;

    public function __construct()
    {
        $this->orange_credit_loan_type_model = new orange_credit_loan_type_model();
    }

    public function invoke_orange_credit_loan_type()
    {

        //SELECT ALL //////////////////////////////////
        if (get('do') == 'viewall') {
            if (PAGINATION_TYPE == 'Normal') {
                $result = $this->orange_credit_loan_type_model->SelectAll(RECORD_PER_PAGE);
                //Accept get url  e.g (index.php?id=1&cat=2...)
                $paging = pagination($this->orange_credit_loan_type_model->CountRow(), RECORD_PER_PAGE, '' . H_ADMIN . '&view=orange_credit_loan_type&do=viewall');
            } else {
                $result = $this->orange_credit_loan_type_model->SelectAll();
            }
            include(APP_FOLDER . '/views/admin/orange_credit_loan_type/View.php');
        }


        //EXPORT ////////////////////////////////////////////////////
        if (get('do') == 'export') {
            $result = $this->orange_credit_loan_type_model->SelectAll();
            include(APP_FOLDER . '/views/admin/orange_credit_loan_type/Export.php');
        } //Expeort2
        elseif (get('do') == 'export2') {
            $rows = $this->orange_credit_loan_type_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_loan_type/Export2.php');
        } //SEARCH SUGGEST ////////////////////////////////////////////////////
        elseif (get('do') == 'autosearch') {
            $qstring = post('qstring');
            if (strlen($qstring) > 0) {
                $autosearch = $this->orange_credit_loan_type_model->AutoSearch(trim($qstring), 10, 'loan_name');
                echo ' <div class=widget><ul class="list-group">';
                foreach ($autosearch as $srow) {
                    echo '<span class="searchheading"><a href="' . H_ADMIN . '&view=orange_credit_loan_type&id=' . $srow->id . '&do=details"><li class="list-group-item">' . $srow->loan_name . '</li></a>
	</span>';
                }
                echo '</ul></div>';
            }
        } //ADD //////////////////////////////////////////////////
        elseif (get('do') == 'add') {
            include(APP_FOLDER . '/views/admin/orange_credit_loan_type/Add.php');
        } //ADD PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'addpro') {
            if ($_POST) {
                //form validation
                if (post('loan_name') == '') {
                    json_error('The field loan name cannot be empty!');
                } elseif (post('prefix') == '') {
                    json_error('The field prefix cannot be empty!');
                } elseif (post('maximum_amount') == '') {
                    json_error('The field maximum amount cannot be empty!');
                } elseif (post('minimum_amount') == '') {
                    json_error('The field minimum amount cannot be empty!');
                } elseif (post('loan_tenure') == '') {
                    json_error('The field loan tenure cannot be empty!');
                } elseif (post('activation_charge') == '') {
                    json_error('The field activation charge cannot be empty!');
                } elseif (post('interest') == '') {
                    json_error('The field interest cannot be empty!');
                } elseif (post('status') == '') {
                    json_error('The field status cannot be empty!');
                } elseif (post('createdAt') == '') {
                    json_error('The field createdAt cannot be empty!');
                } elseif (post('modifiedAt') == '') {
                    json_error('The field modifiedAt cannot be empty!');
                } elseif (post('user_id') == '') {
                    json_error('The field user id cannot be empty!');
                } else {
                    $this->orange_credit_loan_type_model->Insert(post('loan_name'), post('prefix'), post('maximum_amount'), post('minimum_amount'), post('loan_tenure'), post('activation_charge'), post('interest'), post('status'), post('createdAt'), post('modifiedAt'), post('user_id'));
                    json_send('' . H_ADMIN . '&view=orange_credit_loan_type&do=viewall&msg=add');
                    json_success('Process Completed');
                }
            }
        } //UPDATE //////////////////////////////////////////////////
        elseif (get('do') == 'update') {
            $rows = $this->orange_credit_loan_type_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_loan_type/Update.php');
        } //UPDATE PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'updatepro') {
            if ($_POST) {
                //form validation
                if (post('id') == '') {
                    json_error('The field id cannot be empty!');
                } elseif (post('loan_name') == '') {
                    json_error('The field loan name cannot be empty!');
                } elseif (post('prefix') == '') {
                    json_error('The field prefix cannot be empty!');
                } elseif (post('maximum_amount') == '') {
                    json_error('The field maximum amount cannot be empty!');
                } elseif (post('minimum_amount') == '') {
                    json_error('The field minimum amount cannot be empty!');
                } elseif (post('loan_tenure') == '') {
                    json_error('The field loan tenure cannot be empty!');
                } elseif (post('activation_charge') == '') {
                    json_error('The field activation charge cannot be empty!');
                } elseif (post('interest') == '') {
                    json_error('The field interest cannot be empty!');
                } elseif (post('status') == '') {
                    json_error('The field status cannot be empty!');
                } elseif (post('createdAt') == '') {
                    json_error('The field createdAt cannot be empty!');
                } elseif (post('modifiedAt') == '') {
                    json_error('The field modifiedAt cannot be empty!');
                } elseif (post('user_id') == '') {
                    json_error('The field user id cannot be empty!');
                } else {
                    $this->orange_credit_loan_type_model->Update(post('loan_name'), post('prefix'), post('maximum_amount'), post('minimum_amount'), post('loan_tenure'), post('activation_charge'), post('interest'), post('status'), post('createdAt'), post('modifiedAt'), post('user_id'), post('id'));
                    json_send('' . H_ADMIN . '&view=orange_credit_loan_type&id=' . post('id') . '&do=details&msg=update');
                    json_success('Process Completed');
                }
            }
        } //DETAILS //////////////////////////////////////////////
        elseif (get('do') == 'details') {
            $rows = $this->orange_credit_loan_type_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_loan_type/Details.php');
        } //TRUNCATE ///////////////////////////////////////////////
        elseif (get('do') == 'truncate') {
            $this->orange_credit_loan_type_model->TruncateTable('' . H_ADMIN . '&view=orange_credit_loan_type&do=viewall&msg=truncate');
            include(APP_FOLDER . '/views/admin/orange_credit_loan_type/View.php');
        } //DELETE /////////////////////////////////////////////////
        elseif (get('do') == 'delete') {
            $dfile = get('dfile');
            if (get('id') and $dfile == '') {
                $del = $this->orange_credit_loan_type_model->Delete(get('id'), '' . H_ADMIN . '&view=orange_credit_loan_type&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') == '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                $del = $this->orange_credit_loan_type_model->Delete(get('id'), '' . H_ADMIN . '&view=orange_credit_loan_type&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') != '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                send_to('' . H_ADMIN . '&view=orange_credit_loan_type&id=' . get('id') . '&do=update&msg=delete');
            }
        }
    }//end invoke
}//end class
?>
	