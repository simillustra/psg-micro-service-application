
	<?php

/*
* =======================================================================
* FILE NAME:        orange_credit_payments.php
* DATE CREATED:  	01-04-2020
* FOR TABLE:  		orange_credit_payments
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/

if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include (APP_FOLDER . '/models/objects/orange_credit_payments.php');

class orange_credit_payments_controller
{
    public $orange_credit_payments_model;

    public function __construct()
    {
        $this->orange_credit_payments_model = new orange_credit_payments_model();
    }

    public function invoke_orange_credit_payments()
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
                $result = $this->orange_credit_payments_model->SelectAll($query_keys,RECORD_PER_PAGE);
                //Accept get url  e.g (index.php?id=1&cat=2...)
                $paging = pagination($this->orange_credit_payments_model->CountRow($query_keys),
                    RECORD_PER_PAGE, '' . H_ADMIN . '&view=orange_credit_payments&do=viewall&bid=' . $user_id . '&range_start=' . $range_start . '&range_end=' . $range_end);
            } else {
                $result = $this->orange_credit_payments_model->SelectAll($query_keys);
            }
            include (APP_FOLDER . '/views/admin/orange_credit_payments/View.php');
        }


        //EXPORT ////////////////////////////////////////////////////
        if (get('do') == 'export') {
            $result = $this->orange_credit_payments_model->SelectAll($query_keys);
            include (APP_FOLDER . '/views/admin/orange_credit_payments/Export.php');
        }

        //Expeort2
        elseif (get('do') == 'export2') {
            $rows = $this->orange_credit_payments_model->SelectOne(get('id'));
            include (APP_FOLDER . '/views/admin/orange_credit_payments/Export2.php');
        }
        //SEARCH SUGGEST ////////////////////////////////////////////////////
        elseif (get('do') == 'autosearch') {
            $qstring = post('qstring');
            if (strlen($qstring) > 0) {
                $autosearch = $this->orange_credit_payments_model->AutoSearch(trim($qstring), 10,
                    'transaction_id');
                echo ' <div class=widget><ul class="list-group">';
                foreach ($autosearch as $srow) {
                    echo '<span class="searchheading"><a href="' . H_ADMIN .
                        '&view=orange_credit_payments&id=' . $srow->id .
                        '&do=details"><li class="list-group-item">' . $srow->transaction_id . '</li></a>
	</span>';
                }
                echo '</ul></div>';
            }
        }


        //ADD //////////////////////////////////////////////////
        elseif (get('do') == 'add') {
            include (APP_FOLDER . '/views/admin/orange_credit_payments/Add.php');
        }

        //ADD PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'addpro') {
            if ($_POST) {
                //form validation
                if (post('transaction_id') == '') {
                    json_error('The field transaction id cannot be empty!');
                } elseif (post('transaction_amount') == '') {
                    json_error('The field transaction amount cannot be empty!');
                } elseif (post('transaction_desc') == '') {
                    json_error('The field transaction desc cannot be empty!');
                } elseif (post('transaction_provider') == '') {
                    json_error('The field transaction provider cannot be empty!');
                } elseif (post('transaction_status') == '') {
                    json_error('The field transaction status cannot be empty!');
                } elseif (post('transaction_date') == '') {
                    json_error('The field transaction date cannot be empty!');
                } elseif (post('transaction_user') == '') {
                    json_error('The field transaction user cannot be empty!');
                } else {
                    $this->orange_credit_payments_model->Insert(post('transaction_id'), post('transaction_amount'),
                        post('transaction_desc'), post('transaction_provider'), post('transaction_status'),
                        post('transaction_date'), post('transaction_user'));
                    json_send('' . H_ADMIN . '&view=orange_credit_payments&do=viewall&msg=add');
                    json_success('Process Completed');
                }
            }
        }

        //UPDATE //////////////////////////////////////////////////
        elseif (get('do') == 'update') {
            $rows = $this->orange_credit_payments_model->SelectOne(get('id'));
            include (APP_FOLDER . '/views/admin/orange_credit_payments/Update.php');
        }

        //UPDATE PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'updatepro') {
            if ($_POST) {
                //form validation
                if (post('id') == '') {
                    json_error('The field id cannot be empty!');
                } elseif (post('transaction_id') == '') {
                    json_error('The field transaction id cannot be empty!');
                } elseif (post('transaction_amount') == '') {
                    json_error('The field transaction amount cannot be empty!');
                } elseif (post('transaction_desc') == '') {
                    json_error('The field transaction desc cannot be empty!');
                } elseif (post('transaction_provider') == '') {
                    json_error('The field transaction provider cannot be empty!');
                } elseif (post('transaction_status') == '') {
                    json_error('The field transaction status cannot be empty!');
                } elseif (post('transaction_date') == '') {
                    json_error('The field transaction date cannot be empty!');
                } elseif (post('transaction_user') == '') {
                    json_error('The field transaction user cannot be empty!');
                } else {
                    $this->orange_credit_payments_model->Update(post('transaction_id'), post('transaction_amount'),
                        post('transaction_desc'), post('transaction_provider'), post('transaction_status'),
                        post('transaction_date'), post('transaction_user'), post('id'));
                    json_send('' . H_ADMIN . '&view=orange_credit_payments&id=' . post('id') .
                        '&do=details&msg=update');
                    json_success('Process Completed');
                }
            }
        }

        //DETAILS //////////////////////////////////////////////
        elseif (get('do') == 'details') {
            $rows = $this->orange_credit_payments_model->SelectOne(get('id'));
            include (APP_FOLDER . '/views/admin/orange_credit_payments/Details.php');
        }

        //TRUNCATE ///////////////////////////////////////////////
        elseif (get('do') == 'truncate') {
            $this->orange_credit_payments_model->TruncateTable('' . H_ADMIN .
                '&view=orange_credit_payments&do=viewall&msg=truncate');
            include (APP_FOLDER . '/views/admin/orange_credit_payments/View.php');
        }

        //DELETE /////////////////////////////////////////////////
        elseif (get('do') == 'delete') {
            $dfile = get('dfile');
            if (get('id') and $dfile == '') {
                $del = $this->orange_credit_payments_model->Delete(get('id'), '' . H_ADMIN .
                    '&view=orange_credit_payments&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') == '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                $del = $this->orange_credit_payments_model->Delete(get('id'), '' . H_ADMIN .
                    '&view=orange_credit_payments&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') != '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                send_to('' . H_ADMIN . '&view=orange_credit_payments&id=' . get('id') .
                    '&do=update&msg=delete');
            }
        }
    } //end invoke
} //end class

?>
	