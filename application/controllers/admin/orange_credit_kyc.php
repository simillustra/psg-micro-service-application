<?php

/*
* =======================================================================
* FILE NAME:        orange_credit_kyc.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_kyc
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/

if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include(APP_FOLDER . '/models/objects/orange_credit_kyc.php');
include(APP_FOLDER . '/models/objects/orange_credit_countries.php');
include(APP_FOLDER . '/models/objects/orange_credit_regions.php');
include(APP_FOLDER . '/models/objects/orange_credit_cities.php');
include(APP_FOLDER . '/models/objects/orange_credit_notifications.php');
include_once('libraries/system_users.php');

class orange_credit_kyc_controller
{
    public $orange_credit_kyc_model;
    public $orange_credit_users_model;
    public $orange_credit_notifications_model;
    public $orange_credit_countries_model;
    public $orange_credit_regions_model;
    public $orange_credit_cities_model;


    public function __construct()
    {
        $this->orange_credit_kyc_model = new orange_credit_kyc_model();
        $this->orange_credit_users_model = new admin_users_model();
        $this->orange_credit_countries_model = new orange_credit_countries_model();
        $this->orange_credit_regions_model = new orange_credit_regions_model();
        $this->orange_credit_cities_model = new orange_credit_cities_model();
        $this->orange_credit_notifications_model = new orange_credit_notifications_model();
    }

    public function invoke_orange_credit_kyc()
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
                $result = $this->orange_credit_kyc_model->getSelectAll($query_keys, RECORD_PER_PAGE);
                //Accept get url  e.g (index.php?id=1&cat=2...)
                $paging = pagination($this->orange_credit_kyc_model->CountRow($query_keys),
                    RECORD_PER_PAGE, '' . H_ADMIN . '&view=orange_credit_kyc&do=viewall&bid=' . $user_id .
                    '&range_start=' . $range_start . '&range_end=' . $range_end);
            } else {

                $result = $this->orange_credit_kyc_model->getSelectAll($query_keys);
            }
            $number_of_entry = $this->orange_credit_kyc_model->CountRow($query_keys);
            include(APP_FOLDER . '/views/admin/orange_credit_kyc/View.php');
        }


        //EXPORT ////////////////////////////////////////////////////
        if (get('do') == 'export') {
            $result = $this->orange_credit_kyc_model->getSelectAll($query_keys);
            include(APP_FOLDER . '/views/admin/orange_credit_kyc/Export.php');
        } //Expeort2
        elseif (get('do') == 'export2') {
            $rows = $this->orange_credit_kyc_model->SelectOne(get('id'));
            $upld = $this->orange_credit_kyc_model->SelectAllFiles(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_kyc/Export2.php');
        } //SEARCH SUGGEST ////////////////////////////////////////////////////
        elseif (get('do') == 'autosearch') {
            $qstring = post('qstring');
            if (strlen($qstring) > 0) {
                $autosearch = $this->orange_credit_kyc_model->AutoSearch(trim($qstring), 10,'customer_fullname');
                echo '<div class=widget><ul class="list-group">';
                foreach ($autosearch as $srow) {
                    echo '<span class="searchheading">
                         <a href="' . H_ADMIN .'&view=orange_credit_kyc&id=' . $srow->id .'&do=details">
                         <li class="list-group-item">' . $srow->customer_fullname .
                        '</li></a> </span>';
                    }
                echo '</ul></div>';
            }
        } //ADD //////////////////////////////////////////////////
        elseif (get('do') == 'add') {
            $beneficary_types = $this->orange_credit_users_model->SelectOne($_SESSION['H_USER_SESSION_ID']);
            $country_array = $this->orange_credit_countries_model->SelectAll();
            include(APP_FOLDER . '/views/admin/orange_credit_kyc/Add.php');
        } //ADD PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'addpro') {
            if ($_POST) {
                //form validation
                if (post('customer_fullname') == '') {
                    json_error('The field customer fullname cannot be empty!');
                } elseif (post('customer_date_of_birth') == '') {
                    json_error('The field customer date of birth cannot be empty!');
                } elseif (post('customer_gender') == '') {
                    json_error('The field customer gender cannot be empty!');
                } elseif (post('customer_identity_type') == '') {
                    json_error('The field customer identity type cannot be empty!');
                } elseif (post('customer_contact_address') == '') {
                    json_error('The field customer contact address cannot be empty!');
                } elseif (post('customer_employment_status') == '') {
                    json_error('The field customer employment status cannot be empty!');
                } elseif (post('customer_occupation') == '') {
                    json_error('The field customer occupation cannot be empty!');
                } elseif (post('customer_monthly_income') == '') {
                    json_error('The field customer monthly income cannot be empty!');
                } elseif (post('customer_bvn_number') == '') {
                    json_error('The field customer bvn number cannot be empty!');
                } elseif (post('customer_bank_name') == '') {
                    json_error('The field customer bank name cannot be empty!');
                } elseif (post('customer_bank_account') == '') {
                    json_error('The field customer bank account cannot be empty!');
                } elseif (post('customer_ec1_fullname') == '') {
                    json_error('The field customer ec1 fullname cannot be empty!');
                } elseif (post('customer_ec1_phone') == '') {
                    json_error('The field customer ec1 phone cannot be empty!');
                } elseif (post('customer_ec1_identity_type') == '') {
                    json_error('The field customer ec1 identity type cannot be empty!');
                } elseif (post('customer_ec1_id_number') == '') {
                    json_error('The field customer ec1 id number cannot be empty!');
                } elseif (post('customer_ec2_fullname') == '') {
                    json_error('The field customer ec2 fullname cannot be empty!');
                } elseif (post('customer_ec2_phone') == '') {
                    json_error('The field customer ec2 phone cannot be empty!');
                } elseif (post('customer_ec2_identity_type') == '') {
                    json_error('The field customer ec2 identity type cannot be empty!');
                } elseif (post('customer_ec2_id_number') == '') {
                    json_error('The field customer ec2 id number cannot be empty!');
                } elseif (post('kyc_updated') == '') {
                    json_error('The field kyc updated cannot be empty!');
                } elseif (post('kyc_status') == '') {
                    json_error('The field kyc status cannot be empty!');
                } elseif (post('date_created') == '') {
                    json_error('The field date created cannot be empty!');
                } elseif (post('userid') == '') {
                    json_error('The field userid cannot be empty!');
                } else {
                    $this->orange_credit_kyc_model->Insert(post('customer_fullname'), post('customer_date_of_birth'),
                        post('customer_gender'), post('customer_identity_type'), post('customer_contact_address'), post('customer_country'), post('customer_state'), post('customer_city'),
                        post('customer_employment_status'), post('customer_occupation'), post('customer_monthly_income'),
                        post('customer_bvn_number'), post('customer_bank_name'), post('customer_bank_account'),
                        post('customer_ec1_fullname'), post('customer_ec1_phone'), post('customer_ec1_identity_type'),
                        post('customer_ec1_id_number'), post('customer_ec2_fullname'), post('customer_ec2_phone'),
                        post('customer_ec2_identity_type'), post('customer_ec2_id_number'), post('kyc_updated'),
                        post('kyc_status'), post('date_created'), post('userid'));

                    // KYC added notification
                    $arr = array('id' => (int)$_SESSION['H_USER_ACCOUNT_NUMBER'],
                        'fullname' => post('customer_fullname'),
                        'subject' => "KYC added",
                        'date' => date("Y-m-d H:i:s"),
                        'type' => "sms");
                    $senderParams = json_encode($arr);

                    $this->orange_credit_notifications_model->user_kyc_added($senderParams);

                    json_send('' . H_ADMIN . '&view=orange_credit_kyc&do=viewall&msg=add');
                    json_success('Process Completed');
                }
            }
        } //UPDATE //////////////////////////////////////////////////
        elseif (get('do') == 'update') {
            $rows = $this->orange_credit_kyc_model->SelectOne(get('id'));
            $upld = $this->orange_credit_kyc_model->SelectAllFiles(get('id'));
            $country_array = $this->orange_credit_countries_model->SelectAll();
            $select_states = $this->orange_credit_regions_model->customSelectAll($rows->customer_country);
            $select_city = $this->orange_credit_cities_model->customSelectAll($rows->customer_state, $rows->customer_country);
            include(APP_FOLDER . '/views/admin/orange_credit_kyc/Update.php');
        } //UPDATE PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'updatepro') {
            if ($_POST) {
                //form validation
                if (post('id') == '') {
                    json_error('The field id cannot be empty!');
                } elseif (post('customer_fullname') == '') {
                    json_error('The field customer fullname cannot be empty!');
                } elseif (post('customer_date_of_birth') == '') {
                    json_error('The field customer date of birth cannot be empty!');
                } elseif (post('customer_gender') == '') {
                    json_error('The field customer gender cannot be empty!');
                } elseif (post('customer_identity_type') == '') {
                    json_error('The field customer identity type cannot be empty!');
                } elseif (post('customer_contact_address') == '') {
                    json_error('The field customer contact address cannot be empty!');
                } elseif (post('customer_employment_status') == '') {
                    json_error('The field customer employment status cannot be empty!');
                } elseif (post('customer_occupation') == '') {
                    json_error('The field customer occupation cannot be empty!');
                } elseif (post('customer_monthly_income') == '') {
                    json_error('The field customer monthly income cannot be empty!');
                } elseif (post('customer_bvn_number') == '') {
                    json_error('The field customer bvn number cannot be empty!');
                } elseif (post('customer_bank_name') == '') {
                    json_error('The field customer bank name cannot be empty!');
                } elseif (post('customer_bank_account') == '') {
                    json_error('The field customer bank account cannot be empty!');
                } elseif (post('customer_ec1_fullname') == '') {
                    json_error('The field customer ec1 fullname cannot be empty!');
                } elseif (post('customer_ec1_phone') == '') {
                    json_error('The field customer ec1 phone cannot be empty!');
                } elseif (post('customer_ec1_identity_type') == '') {
                    json_error('The field customer ec1 identity type cannot be empty!');
                } elseif (post('customer_ec1_id_number') == '') {
                    json_error('The field customer ec1 id number cannot be empty!');
                } elseif (post('customer_ec2_fullname') == '') {
                    json_error('The field customer ec2 fullname cannot be empty!');
                } elseif (post('customer_ec2_phone') == '') {
                    json_error('The field customer ec2 phone cannot be empty!');
                } elseif (post('customer_ec2_identity_type') == '') {
                    json_error('The field customer ec2 identity type cannot be empty!');
                } elseif (post('customer_ec2_id_number') == '') {
                    json_error('The field customer ec2 id number cannot be empty!');
                } elseif (post('kyc_updated') == '') {
                    json_error('The field kyc updated cannot be empty!');
                } elseif (post('kyc_status') == '') {
                    json_error('The field kyc status cannot be empty!');
                } elseif (post('date_created') == '') {
                    json_error('The field date created cannot be empty!');
                } elseif (post('userid') == '') {
                    json_error('The field userid cannot be empty!');
                } else {
                    $this->orange_credit_kyc_model->Update(post('customer_fullname'), post('customer_date_of_birth'),
                        post('customer_gender'), post('customer_identity_type'), post('customer_contact_address'), post('customer_country'), post('customer_state'), post('customer_city'),
                        post('customer_employment_status'), post('customer_occupation'), post('customer_monthly_income'),
                        post('customer_bvn_number'), post('customer_bank_name'), post('customer_bank_account'),
                        post('customer_ec1_fullname'), post('customer_ec1_phone'), post('customer_ec1_identity_type'),
                        post('customer_ec1_id_number'), post('customer_ec2_fullname'), post('customer_ec2_phone'),
                        post('customer_ec2_identity_type'), post('customer_ec2_id_number'), post('kyc_updated'),
                        post('kyc_status'), post('date_created'), post('userid'), post('id'));

                    $userInfo = $this->orange_credit_users_model->SelectOne(post('userid'));
                    if (post('kyc_status') === 'APPROVED') {
                        // KYC added notification
                        $arr = array('id' => (int)$userInfo->phone,
                            'fullname' => post('customer_fullname'),
                            'subject' => "KYC Entry Approved",
                            'date' => date("Y-m-d H:i:s"),
                            'type' => "sms");
                        $senderParams = json_encode($arr);

                        $this->orange_credit_notifications_model->user_kyc_approved($senderParams);
                    }

                    if (post('kyc_status') === 'DECLINED') {
                        // KYC added notification
                        $arr = array('id' => (int)$userInfo->phone,
                            'fullname' => post('customer_fullname'),
                            'subject' => "KYC Entry Declined",
                            'date' => date("Y-m-d H:i:s"),
                            'type' => "sms");
                        $senderParams = json_encode($arr);

                        $this->orange_credit_notifications_model->user_kyc_declined($senderParams);
                    }


                    json_send('' . H_ADMIN . '&view=orange_credit_kyc&id=' . post('id') .
                        '&do=details&msg=update');
                    json_success('Process Completed');
                }
            }
        } //DETAILS //////////////////////////////////////////////
        elseif (get('do') == 'details') {
            $rows = $this->orange_credit_kyc_model->SelectOne(get('id'));
            $upld = $this->orange_credit_kyc_model->SelectAllFiles(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credit_kyc/Details.php');
        } //TRUNCATE ///////////////////////////////////////////////
        elseif (get('do') == 'truncate') {
            $this->orange_credit_kyc_model->TruncateTable('' . H_ADMIN .
                '&view=orange_credit_kyc&do=viewall&msg=truncate');
            include(APP_FOLDER . '/views/admin/orange_credit_kyc/View.php');
        } //DELETE /////////////////////////////////////////////////
        elseif (get('do') == 'delete') {
            $dfile = get('dfile');

            //FLES FROM NEW TABLE
            if (get('id') and get('dfile') == '' and get('fdel') == '' and get('onedel') ==
                '') {
                $rowfile = $this->orange_credit_kyc_model->SelectAllFiles(get('id'));
                foreach ($rowfile as $drows) {
                    delete_files(UPLOAD_PATH . $drows->gfile);
                    delete_files(THUMB_PATH . $drows->gfile);
                }
                $this->orange_credit_kyc_model->DeleteFile(get('id'));
                $this->orange_credit_kyc_model->Delete(get('id'), '' . H_ADMIN .
                    '&view=orange_credit_kyc&do=viewall&msg=delete');
            } elseif (get('id') and get('fid') and get('fdel') == '' and get('onedel') and
                get('dfile') != '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                $this->orange_credit_kyc_model->DeleteFileOne(get('fid'));
                send_to('' . H_ADMIN . '&view=orange_credit_kyc&id=' . get('id') .
                    '&do=details&dmsg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') == '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                $del = $this->orange_credit_kyc_model->Delete(get('id'), '' . H_ADMIN .
                    '&view=orange_credit_kyc&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') != '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                send_to('' . H_ADMIN . '&view=orange_credit_kyc&id=' . get('id') .
                    '&do=update&msg=delete');
            }
        }
    } //end invoke
} //end class


?>
	