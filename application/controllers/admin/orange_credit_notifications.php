<?php

/*
* =======================================================================
* FILE NAME:        orange_credit_notifications.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_notifications
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/

if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');

include(APP_FOLDER . '/models/objects/orange_credit_notifications.php');
include_once('libraries/system_users.php');

class orange_credit_notifications_controller
{
    public $orange_credit_notifications_model;
    public $orange_credit_users_model;

    public function __construct()
    {
        $this->orange_credit_notifications_model = new orange_credit_notifications_model();
        $this->orange_credit_users_model = new admin_users_model();
    }

    public function invoke_orange_credit_notifications()
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
            if (PAGINATION_TYPE == 'Normal') {
                $result = $this->orange_credit_notifications_model->SelectAll($query_keys,RECORD_PER_PAGE);
                //Accept get url  e.g (index.php?id=1&cat=2...)
                $paging = pagination($this->orange_credit_notifications_model->CountRow($query_keys), RECORD_PER_PAGE, '' . H_ADMIN . '&view=orange_credit_notifications&do=viewall&bid=' . $user_id . '&range_start=' . $range_start . '&range_end=' . $range_end);
            } else {
                $result = $this->orange_credit_notifications_model->SelectAll($query_keys);
            }
            include(APP_FOLDER . '/views/admin/orange_credit_notifications/View.php');
        }


        //EXPORT ////////////////////////////////////////////////////
        if (get('do') == 'export') {
            $result = $this->orange_credit_notifications_model->SelectAll($query_keys);
            include(APP_FOLDER . '/views/admin/orange_credit_notifications/Export.php');
        } //Expeort2
        elseif (get('do') == 'export2') {
            $rows = $this->orange_credit_notifications_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_notifications/Export2.php');
        } //SEARCH SUGGEST ////////////////////////////////////////////////////
        elseif (get('do') == 'autosearch') {
            $qstring = post('qstring');
            if (strlen($qstring) > 0) {
                $autosearch = $this->orange_credit_notifications_model->AutoSearch(trim($qstring), 10, 'reciever');
                echo ' <div class=widget><ul class="list-group">';
                foreach ($autosearch as $srow) {
                    echo '<span class="searchheading"><a href="' . H_ADMIN . '&view=orange_credit_notifications&id=' . $srow->id . '&do=details"><li class="list-group-item">' . $srow->reciever . '</li></a>
	</span>';
                }
                echo '</ul></div>';
            }
        } //ADD //////////////////////////////////////////////////
        elseif (get('do') == 'add') {
            include(APP_FOLDER . '/views/admin/orange_credit_notifications/Add.php');
        } //ADD PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'addpro') {
            if ($_POST) {
                //form validation
                if (post('reciever') == '') {
                    json_error('The field reciever cannot be empty!');
                } elseif (post('subject') == '') {
                    json_error('The field subject cannot be empty!');
                } elseif (post('type') == '') {
                    json_error('The field type cannot be empty!');
                } elseif (post('sms_message') == '') {
                    json_error('The field sms message cannot be empty!');
                } elseif (post('status') == '') {
                    json_error('The field status cannot be empty!');
                } elseif (post('date') == '') {
                    json_error('The field date cannot be empty!');
                } else {

                    $broadcast_recipients = $this->orange_credit_users_model->selectBroadCast_Recipients(post('reciever'));

                    if ($broadcast_recipients) {
                        foreach ($broadcast_recipients as $recipient) {

                            $email_message = "Hello " . $recipient->first_name."\r\n";
                            $email_message .= (post('email_message') !== '') ? post('email_message') : "SMS Message sent to your phone. Please check it out";

                            $this->orange_credit_notifications_model->Insert(
                                $recipient->phone,
                                post('subject'),
                                post('type'),
                                post('sms_message'),
                                $email_message,
                                post('status'),
                                post('date'));

                        }
                        json_send('' . H_ADMIN . '&view=orange_credit_notifications&do=viewall&msg=add');
                        json_success('Process Completed');
                    } else{
                         json_error('Error sending bulk sms!');
                    }
                }
            }
        } //UPDATE //////////////////////////////////////////////////
        elseif (get('do') == 'update') {
            $rows = $this->orange_credit_notifications_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_notifications/Update.php');
        } //UPDATE PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'updatepro') {
            if ($_POST) {
                //form validation
                if (post('id') == '') {
                    json_error('The field id cannot be empty!');
                } elseif (post('reciever') == '') {
                    json_error('The field reciever cannot be empty!');
                } elseif (post('subject') == '') {
                    json_error('The field subject cannot be empty!');
                } elseif (post('type') == '') {
                    json_error('The field type cannot be empty!');
                } elseif (post('sms_message') == '') {
                    json_error('The field sms message cannot be empty!');
                } elseif (post('email_message') == '') {
                    json_error('The field email message cannot be empty!');
                } elseif (post('status') == '') {
                    json_error('The field status cannot be empty!');
                } elseif (post('date') == '') {
                    json_error('The field date cannot be empty!');
                } else {
                    $this->orange_credit_notifications_model->Update(post('reciever'), post('subject'), post('type'), post('sms_message'), post('email_message'), post('status'), post('date'), post('id'));
                    json_send('' . H_ADMIN . '&view=orange_credit_notifications&id=' . post('id') . '&do=details&msg=update');
                    json_success('Process Completed');
                }
            }
        } //DETAILS //////////////////////////////////////////////
        elseif (get('do') == 'details') {
            $rows = $this->orange_credit_notifications_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_notifications/Details.php');
        } //TRUNCATE ///////////////////////////////////////////////
        elseif (get('do') == 'truncate') {
            $this->orange_credit_notifications_model->TruncateTable('' . H_ADMIN . '&view=orange_credit_notifications&do=viewall&msg=truncate');
            include(APP_FOLDER . '/views/admin/orange_credit_notifications/View.php');
        } //DELETE /////////////////////////////////////////////////
        elseif (get('do') == 'delete') {
            $dfile = get('dfile');
            if (get('id') and $dfile == '') {
                $del = $this->orange_credit_notifications_model->Delete(get('id'), '' . H_ADMIN . '&view=orange_credit_notifications&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') == '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                $del = $this->orange_credit_notifications_model->Delete(get('id'), '' . H_ADMIN . '&view=orange_credit_notifications&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') != '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                send_to('' . H_ADMIN . '&view=orange_credit_notifications&id=' . get('id') . '&do=update&msg=delete');
            }
        }
    }//end invoke
}//end class
?>
	