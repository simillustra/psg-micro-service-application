
	<?php

/*
* =======================================================================
* FILE NAME:        orange_credit_organisation.php
* DATE CREATED:  	15-04-2020
* FOR TABLE:  		orange_credit_organisation
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/

if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include (APP_FOLDER . '/models/objects/orange_credit_organisation.php');

class orange_credit_organisation_controller
{
    public $orange_credit_organisation_model;

    public function __construct()
    {
        $this->orange_credit_organisation_model = new orange_credit_organisation_model();
    }

    public function invoke_orange_credit_organisation()
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
                $result = $this->orange_credit_organisation_model->SelectAll($query_keys,
                    RECORD_PER_PAGE);
                //Accept get url  e.g (index.php?id=1&cat=2...)
                $paging = pagination($this->orange_credit_organisation_model->CountRow($query_keys),
                    RECORD_PER_PAGE, '' . H_ADMIN .
                    '&view=orange_credit_organisation&do=viewall&bid=' . $user_id . '&range_start=' .
                    $range_start . '&range_end=' . $range_end);
            } else {
                $result = $this->orange_credit_organisation_model->SelectAll($query_keys);
            }
            include (APP_FOLDER . '/views/admin/orange_credit_organisation/View.php');
        }


        //EXPORT ////////////////////////////////////////////////////
        if (get('do') == 'export') {
            $result = $this->orange_credit_organisation_model->SelectAll($query_keys);
            include (APP_FOLDER . '/views/admin/orange_credit_organisation/Export.php');
        }

        //Expeort2
        elseif (get('do') == 'export2') {
            $rows = $this->orange_credit_organisation_model->SelectOne(get('id'));
            include (APP_FOLDER . '/views/admin/orange_credit_organisation/Export2.php');
        }
        //SEARCH SUGGEST ////////////////////////////////////////////////////
        elseif (get('do') == 'autosearch') {
            $qstring = post('qstring');
            if (strlen($qstring) > 0) {
                $autosearch = $this->orange_credit_organisation_model->AutoSearch(trim($qstring),
                    10, 'organisation_name');
                echo ' <div class=widget><ul class="list-group">';
                foreach ($autosearch as $srow) {
                    echo '<span class="searchheading"><a href="' . H_ADMIN .
                        '&view=orange_credit_organisation&id=' . $srow->id .
                        '&do=details"><li class="list-group-item">' . $srow->organisation_name .
                        '</li></a>
	</span>';
                }
                echo '</ul></div>';
            }
        }


        //ADD //////////////////////////////////////////////////
        elseif (get('do') == 'add') {
            include (APP_FOLDER . '/views/admin/orange_credit_organisation/Add.php');
        }

        //ADD PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'addpro') {
            if ($_POST) {
                //form validation
                if (post('organisation_name') == '') {
                    json_error('The field organisation name cannot be empty!');
                } elseif (post('organisation_address') == '') {
                    json_error('The field organisation address cannot be empty!');
                } elseif (post('organisation_phone') == '') {
                    json_error('The field organisation phone cannot be empty!');
                } elseif (post('organisation_email') == '') {
                    json_error('The field organisation email cannot be empty!');
                } elseif (post('organisation_bank_name') == '') {
                    json_error('The field organisation bank name cannot be empty!');
                } elseif (post('organisation_account_number') == '') {
                    json_error('The field organisation account number cannot be empty!');
                } elseif (post('organisation_status') == '') {
                    json_error('The field organisation status cannot be empty!');
                } elseif (post('organisation_createdAt') == '') {
                    json_error('The field organisation createdAt cannot be empty!');
                } elseif (post('organisation_modifiedAt') == '') {
                    json_error('The field organisation modifiedAt cannot be empty!');
                } elseif (post('userid') == '') {
                    json_error('The field userid cannot be empty!');
                } else {
                    $this->orange_credit_organisation_model->Insert(post('organisation_name'), post
                        ('organisation_address'), post('organisation_phone'), post('organisation_email'),
                        post('organisation_bank_name'), post('organisation_account_number'), post('organisation_status'),
                        post('organisation_createdAt'), post('organisation_modifiedAt'), post('userid'));
                    json_send('' . H_ADMIN . '&view=orange_credit_organisation&do=viewall&msg=add');
                    json_success('Process Completed');
                }
            }
        }

        //UPDATE //////////////////////////////////////////////////
        elseif (get('do') == 'update') {
            $rows = $this->orange_credit_organisation_model->SelectOne(get('id'));
            include (APP_FOLDER . '/views/admin/orange_credit_organisation/Update.php');
        }

        //UPDATE PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'updatepro') {
            if ($_POST) {
                //form validation
                if (post('id') == '') {
                    json_error('The field id cannot be empty!');
                } elseif (post('organisation_name') == '') {
                    json_error('The field organisation name cannot be empty!');
                } elseif (post('organisation_address') == '') {
                    json_error('The field organisation address cannot be empty!');
                } elseif (post('organisation_phone') == '') {
                    json_error('The field organisation phone cannot be empty!');
                } elseif (post('organisation_email') == '') {
                    json_error('The field organisation email cannot be empty!');
                } elseif (post('organisation_bank_name') == '') {
                    json_error('The field organisation bank name cannot be empty!');
                } elseif (post('organisation_account_number') == '') {
                    json_error('The field organisation account number cannot be empty!');
                } elseif (post('organisation_status') == '') {
                    json_error('The field organisation status cannot be empty!');
                } elseif (post('organisation_createdAt') == '') {
                    json_error('The field organisation createdAt cannot be empty!');
                } elseif (post('organisation_modifiedAt') == '') {
                    json_error('The field organisation modifiedAt cannot be empty!');
                } elseif (post('userid') == '') {
                    json_error('The field userid cannot be empty!');
                } else {
                    $this->orange_credit_organisation_model->Update(post('organisation_name'), post
                        ('organisation_address'), post('organisation_phone'), post('organisation_email'),
                        post('organisation_bank_name'), post('organisation_account_number'), post('organisation_status'),
                        post('organisation_createdAt'), post('organisation_modifiedAt'), post('userid'),
                        post('id'));
                    json_send('' . H_ADMIN . '&view=orange_credit_organisation&id=' . post('id') .
                        '&do=details&msg=update');
                    json_success('Process Completed');
                }
            }
        }

        //DETAILS //////////////////////////////////////////////
        elseif (get('do') == 'details') {
            $rows = $this->orange_credit_organisation_model->SelectOne(get('id'));
            include (APP_FOLDER . '/views/admin/orange_credit_organisation/Details.php');
        }

        //TRUNCATE ///////////////////////////////////////////////
        elseif (get('do') == 'truncate') {
            $this->orange_credit_organisation_model->TruncateTable('' . H_ADMIN .
                '&view=orange_credit_organisation&do=viewall&msg=truncate');
            include (APP_FOLDER . '/views/admin/orange_credit_organisation/View.php');
        }

        //DELETE /////////////////////////////////////////////////
        elseif (get('do') == 'delete') {
            $dfile = get('dfile');
            if (get('id') and $dfile == '') {
                $del = $this->orange_credit_organisation_model->Delete(get('id'), '' . H_ADMIN .
                    '&view=orange_credit_organisation&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') == '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                $del = $this->orange_credit_organisation_model->Delete(get('id'), '' . H_ADMIN .
                    '&view=orange_credit_organisation&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') != '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                send_to('' . H_ADMIN . '&view=orange_credit_organisation&id=' . get('id') .
                    '&do=update&msg=delete');
            }
        }
    } //end invoke
} //end class


?>
	