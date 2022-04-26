<?php

/*
* =======================================================================
* FILE NAME:        orange_credit_request.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_request
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/

if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');

include(APP_FOLDER . '/models/objects/orange_credit_request.php');

class orange_credit_request_controller
{
    public $orange_credit_request_model;

    public function __construct()
    {
        $this->orange_credit_request_model = new orange_credit_request_model();
    }

    public function invoke_orange_credit_request()
    {

        //SELECT ALL //////////////////////////////////
        if (get('do') == 'viewall') {
            if (PAGINATION_TYPE == 'Normal') {
                $result = $this->orange_credit_request_model->SelectAll(RECORD_PER_PAGE);
                //Accept get url  e.g (index.php?id=1&cat=2...)
                $paging = pagination($this->orange_credit_request_model->CountRow(), RECORD_PER_PAGE, '' . H_ADMIN . '&view=orange_credit_request&do=viewall');
            } else {
                $result = $this->orange_credit_request_model->SelectAll();
            }
            include(APP_FOLDER . '/views/admin/orange_credit_request/View.php');
        }


        //EXPORT ////////////////////////////////////////////////////
        if (get('do') == 'export') {
            $result = $this->orange_credit_request_model->SelectAll();
            include(APP_FOLDER . '/views/admin/orange_credit_request/Export.php');
        } //Expeort2
        elseif (get('do') == 'export2') {
            $rows = $this->orange_credit_request_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_request/Export2.php');
        } //SEARCH SUGGEST ////////////////////////////////////////////////////
        elseif (get('do') == 'autosearch') {
            $qstring = post('qstring');
            if (strlen($qstring) > 0) {
                $autosearch = $this->orange_credit_request_model->AutoSearch(trim($qstring), 10, 'credit_request_type');
                echo ' <div class=widget><ul class="list-group">';
                foreach ($autosearch as $srow) {
                    echo '<span class="searchheading"><a href="' . H_ADMIN . '&view=orange_credit_request&id=' . $srow->id . '&do=details"><li class="list-group-item">' . $srow->credit_request_type . '</li></a>
	</span>';
                }
                echo '</ul></div>';
            }
        } //ADD //////////////////////////////////////////////////
        elseif (get('do') == 'add') {
            include(APP_FOLDER . '/views/admin/orange_credit_request/Add.php');
        } //ADD PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'addpro') {
            if ($_POST) {
                //form validation
                if (post('credit_request_type') == '') {
                    json_error('The field credit request type cannot be empty!');
                } elseif (post('credit_request_beneficary') == '') {
                    json_error('The field credit request beneficary cannot be empty!');
                } elseif (post('credit_request_beneficary_school') == '') {
                    json_error('The field credit request beneficary school cannot be empty!');
                } elseif (post('credit_request_annual_school_fees') == '') {
                    json_error('The field credit request annual school fees cannot be empty!');
                } elseif (post('credit_request_monthly_contribution') == '') {
                    json_error('The field credit request monthly contribution cannot be empty!');
                } elseif (post('credit_request_charge') == '') {
                    json_error('The field credit request charge cannot be empty!');
                } elseif (post('credit_request_status') == '') {
                    json_error('The field credit request status cannot be empty!');
                } elseif (post('credit_request_activated') == '') {
                    json_error('The field credit request activated cannot be empty!');
                } elseif (post('credit_request_transction_code') == '') {
                    json_error('The field credit request transction code cannot be empty!');
                } elseif (post('credit_request_approved_by') == '') {
                    json_error('The field credit request approved by cannot be empty!');
                } elseif (post('credit_request_approvedAt') == '') {
                    json_error('The field credit request approvedAt cannot be empty!');
                } elseif (post('credit_request_date_createdAt') == '') {
                    json_error('The field credit request date createdAt cannot be empty!');
                } elseif (post('credit_request_date_modifiedAt') == '') {
                    json_error('The field credit request date modifiedAt cannot be empty!');
                } elseif (post('user_id') == '') {
                    json_error('The field user id cannot be empty!');
                } else {
                    $this->orange_credit_request_model->Insert(post('credit_request_type'), post('credit_request_beneficary'), post('credit_request_beneficary_school'), post('credit_request_annual_school_fees'), post('credit_request_monthly_contribution'), post('credit_request_charge'), post('credit_request_status'), post('credit_request_activated'), post('credit_request_transction_code'), post('credit_request_approved_by'), post('credit_request_approvedAt'), post('credit_request_date_createdAt'), post('credit_request_date_modifiedAt'), post('user_id'));
                    json_send('' . H_ADMIN . '&view=orange_credit_request&do=viewall&msg=add');
                    json_success('Process Completed');
                }
            }
        } //UPDATE //////////////////////////////////////////////////
        elseif (get('do') == 'update') {
            $rows = $this->orange_credit_request_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_request/Update.php');
        } //UPDATE PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'updatepro') {
            if ($_POST) {
                //form validation
                if (post('id') == '') {
                    json_error('The field id cannot be empty!');
                } elseif (post('credit_request_type') == '') {
                    json_error('The field credit request type cannot be empty!');
                } elseif (post('credit_request_beneficary') == '') {
                    json_error('The field credit request beneficary cannot be empty!');
                } elseif (post('credit_request_beneficary_school') == '') {
                    json_error('The field credit request beneficary school cannot be empty!');
                } elseif (post('credit_request_annual_school_fees') == '') {
                    json_error('The field credit request annual school fees cannot be empty!');
                } elseif (post('credit_request_monthly_contribution') == '') {
                    json_error('The field credit request monthly contribution cannot be empty!');
                } elseif (post('credit_request_charge') == '') {
                    json_error('The field credit request charge cannot be empty!');
                } elseif (post('credit_request_status') == '') {
                    json_error('The field credit request status cannot be empty!');
                } elseif (post('credit_request_activated') == '') {
                    json_error('The field credit request activated cannot be empty!');
                } elseif (post('credit_request_transction_code') == '') {
                    json_error('The field credit request transction code cannot be empty!');
                } elseif (post('credit_request_approved_by') == '') {
                    json_error('The field credit request approved by cannot be empty!');
                } elseif (post('credit_request_approvedAt') == '') {
                    json_error('The field credit request approvedAt cannot be empty!');
                } elseif (post('credit_request_date_createdAt') == '') {
                    json_error('The field credit request date createdAt cannot be empty!');
                } elseif (post('credit_request_date_modifiedAt') == '') {
                    json_error('The field credit request date modifiedAt cannot be empty!');
                } elseif (post('user_id') == '') {
                    json_error('The field user id cannot be empty!');
                } else {
                    $this->orange_credit_request_model->Update(post('credit_request_type'), post('credit_request_beneficary'), post('credit_request_beneficary_school'), post('credit_request_annual_school_fees'), post('credit_request_monthly_contribution'), post('credit_request_charge'), post('credit_request_status'), post('credit_request_activated'), post('credit_request_transction_code'), post('credit_request_approved_by'), post('credit_request_approvedAt'), post('credit_request_date_createdAt'), post('credit_request_date_modifiedAt'), post('user_id'), post('id'));
                    json_send('' . H_ADMIN . '&view=orange_credit_request&id=' . post('id') . '&do=details&msg=update');
                    json_success('Process Completed');
                }
            }
        } //DETAILS //////////////////////////////////////////////
        elseif (get('do') == 'details') {
            $rows = $this->orange_credit_request_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_request/Details.php');
        } //TRUNCATE ///////////////////////////////////////////////
        elseif (get('do') == 'truncate') {
            $this->orange_credit_request_model->TruncateTable('' . H_ADMIN . '&view=orange_credit_request&do=viewall&msg=truncate');
            include(APP_FOLDER . '/views/admin/orange_credit_request/View.php');
        } //DELETE /////////////////////////////////////////////////
        elseif (get('do') == 'delete') {
            $dfile = get('dfile');
            if (get('id') and $dfile == '') {
                $del = $this->orange_credit_request_model->Delete(get('id'), '' . H_ADMIN . '&view=orange_credit_request&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') == '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                $del = $this->orange_credit_request_model->Delete(get('id'), '' . H_ADMIN . '&view=orange_credit_request&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') != '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                send_to('' . H_ADMIN . '&view=orange_credit_request&id=' . get('id') . '&do=update&msg=delete');
            }
        }
    }//end invoke
}//end class
?>
	