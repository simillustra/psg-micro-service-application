<?php

/*
* =======================================================================
* FILE NAME:        orange_credits_accounts.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credits_accounts
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/

if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');

include(APP_FOLDER . '/models/objects/orange_credits_accounts.php');
include(APP_FOLDER . '/models/objects/orange_credit_transactions.php');
include(APP_FOLDER . '/models/objects/orange_credit_coupons.php');
include(APP_FOLDER . '/models/objects/orange_credit_kyc.php');
include(APP_FOLDER . '/models/objects/orange_credit_notifications.php');

class  orange_credits_accounts_controller
{
    public $orange_credits_accounts_model;
    public $orange_credit_transactions_model;
    public $orange_credit_coupons_model;
    public $orange_credit_kyc_model;
    public $orange_credit_notifications_model;

    public function __construct()
    {
        $this->orange_credits_accounts_model = new orange_credits_accounts_model();
        $this->orange_credit_transactions_model = new orange_credit_transactions_model();
        $this->orange_credit_coupons_model = new orange_credit_coupons_model();
        $this->orange_credit_kyc_model = new orange_credit_kyc_model();
        $this->orange_credit_notifications_model = new orange_credit_notifications_model();
    }

    public function invoke_orange_credits_accounts()
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
                $result = $this->orange_credits_accounts_model->SelectAll($query_keys, RECORD_PER_PAGE);
                //Accept get url  e.g (index.php?id=1&cat=2...)
                $paging = pagination($this->orange_credits_accounts_model->CountRow($query_keys),
                    RECORD_PER_PAGE, '' . H_ADMIN . '&view=orange_credits_accounts&do=viewall&bid=' . $user_id . '&range_start=' . $range_start . '&range_end=' . $range_end);
            } else {
                $result = $this->orange_credits_accounts_model->SelectAll($query_keys);
            }
            include(APP_FOLDER . '/views/admin/orange_credits_accounts/View.php');
        }


        //EXPORT ////////////////////////////////////////////////////
        if (get('do') == 'export') {
            $result = $this->orange_credits_accounts_model->SelectAll($query_keys);
            include(APP_FOLDER . '/views/admin/orange_credits_accounts/Export.php');
        } //Expeort2
        elseif (get('do') == 'export2') {
            $rows = $this->orange_credits_accounts_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credits_accounts/Export2.php');
        } //SEARCH SUGGEST ////////////////////////////////////////////////////
        elseif (get('do') == 'autosearch') {
            $qstring = post('qstring');
            if (strlen($qstring) > 0) {
                $autosearch = $this->orange_credits_accounts_model->AutoSearch(trim($qstring), 10, 'acct_number');
                echo ' <div class=widget><ul class="list-group">';
                foreach ($autosearch as $srow) {
                    echo '<span class="searchheading"><a href="' . H_ADMIN . '&view=orange_credits_accounts&id=' . $srow->id . '&do=details"><li class="list-group-item">' . $srow->acct_number . '</li></a>
	</span>';
                }
                echo '</ul></div>';
            }
        } //ADD //////////////////////////////////////////////////
        elseif (get('do') == 'fundAccount') {
            $rows = $this->orange_credits_accounts_model->SelectOne(get('account_number'));
//            if($rows == false){
//                json_send('' . H_ADMIN . '&view=orange_credits_accounts&id=' . post('acct_number') . '&do=viewall&msg=add');
//                json_success('Process Completed');
//            }
            include(APP_FOLDER . '/views/admin/orange_credits_accounts/Fund-Account.php');
        } //ADD PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'applyfunds') {
            if ($_POST) {
                //form validation
                if (post('coupon_token_account') == '') {
                    json_error('The error verifying token account please refresh page and try again!');
                } elseif (post('coupon_token_id') == '') {
                    json_error('error verifying payment id, please refresh page and try again!');
                } elseif ($this->orange_credit_coupons_model->couponIsActive(post('coupon_payment_token')) == false) {
                    json_error('The coupon / payment token has already being activated please try another');
                } elseif ($this->orange_credit_coupons_model->couponHasSaidValue(post('coupon_payment_token'), floatval(post('coupon_token_amount'))) == false) {
                    json_error('The coupon / payment token has an invalid amount value, please contact the owner');
                } elseif ($this->orange_credits_accounts_model->accountHasAvailableFunds(post('coupon_token_account'), (floatval(post('coupon_token_amount')) + floatval(post('transaction_charge')))) == false) {
                    json_error('We could not verify that coupon owner have sufficient funds for this transaction!');
                } elseif (post('transaction_desc') == '') {
                    json_error('Transaction description needed to complete transaction!');
                } else {

                    $todays_date = date("Y-m-d H:i:s");
                    $debit_user = $this->orange_credits_accounts_model->debitAccount(post('coupon_token_account'), post('coupon_token_id'), (floatval(post('coupon_token_amount')) + floatval(post('transaction_charge'))));

                    if ($debit_user != false) {
                        $credit_user = $this->orange_credits_accounts_model->creditAccount(post('acct_number'), floatval(post('coupon_token_amount')));
                        if ($credit_user != false) {
                            // credit Admin transaction charge
                            $credit_admin = $this->orange_credits_accounts_model->creditAdminAccount(floatval(post('transaction_charge')));
                            // Activate coupon
                            $this->orange_credit_coupons_model->setCouponActive(post('coupon_payment_token'), post('user_id'));

                            // Record CREDIT Transactions
                            $this->orange_credit_transactions_model->Insert(post('transactionid'), post('coupon_token_id'),
                                post('coupon_token_account'), post('user_id'), post('acct_number'), 'COUPON TOKEN PAYMENT',
                                post('coupon_token_amount'), 'APPROVED', 'CREDIT', $todays_date);

                            //ADMIN TRANSACTION
                            $this->orange_credit_transactions_model->Insert(post('transactionid'), post('coupon_token_id'),
                                post('coupon_token_account'), 1, ADMIN_ACCOUNT_NUMBER, 'COUPON TOKEN PAYMENT',
                                post('transaction_charge'), 'APPROVED', 'CREDIT', $todays_date);


                            //Apply Notification sender
                            $senderAccount = $this->orange_credits_accounts_model->SelectOne(post('coupon_token_account'));
                            // Account debited
                            $arr = array('id' => $senderAccount->acct_number,'account' => $senderAccount->acct_number, 'receiver' => post('receiver_account_number'), 'amount'=>number_format((floatval(post('coupon_token_amount')) + floatval(post('transaction_charge'))), 2, ",", "."), 'balance' => number_format((float)$senderAccount->account_balance, 2, ",", "."), 'subject' => "Debit Transaction Alert", 'date' => date("Y-m-d H:i:s"), 'type' => "sms");
                            $senderParams = json_encode($arr);
                            $this->orange_credit_notifications_model->debit_wallet_notice($senderParams);

                            //Apply Notification Receiver
                            $receiverAccount = $this->orange_credits_accounts_model->SelectOne(post('acct_number'));
                            $arr2 = array('id' => $receiverAccount->acct_number,'account' => $receiverAccount->acct_number, 'sender' => post('coupon_token_account'),'amount' =>number_format((floatval(post('coupon_token_amount'))) , 2, ",", "."), 'balance' => number_format($receiverAccount->account_balance, 2, ",", "."), 'subject' => "Credit Transaction Alert", 'date' => date("Y-m-d H:i:s"), 'type' => "sms");
                            $receiverParams = json_encode($arr2);
                            $this->orange_credit_notifications_model->credited_wallet_notice($receiverParams);




                            json_send('' . H_ADMIN . '&view=orange_credits_accounts&id=' . post('acct_number') . '&do=viewall&msg=add');
                            json_success('Process Completed');
                        }
                    } else {
                        json_error('Error processing transactions!');
                    }

                }
            }
        } //UPDATE //////////////////////////////////////////////////
        elseif (get('do') == 'transfer') {
            $rows = $this->orange_credits_accounts_model->SelectOne(get('account_number'));
            include(APP_FOLDER . '/views/admin/orange_credits_accounts/Transfer.php');
        } //UPDATE PROCESS //////////////////////////////////////////////////
        elseif (get('do') == 'updatepro') {
            if ($_POST) {
                //form validation
                if (post('receiver_account_number') == '') {
                    json_error('The field receiver account number cannot be empty!');
                } elseif ($this->orange_credits_accounts_model->accountExist(post('receiver_account_number')) == false) {
                    json_error('The receiver account number does not exist!');
                } elseif (post('acct_number') == '') {
                    json_error('The field acct number cannot be empty!');
                } elseif (post('amount_to_pay') == '') {
                    json_error('The field Amount to send or Transfer cannot be empty!');
                } elseif ((floatval(post('amount_to_pay')) + floatval(post('transaction_charge'))) >= floatval(post('account_credit_balance'))) {
                    json_error('Insufficient funds! please input a lower amount or fund your account to complete transactions. transaction must accommodate amount to transfer + N10 transaction fees');
                } elseif ($this->orange_credits_accounts_model->accountHasAvailableFunds(post('acct_number'), (floatval(post('amount_to_pay')) + floatval(post('transaction_charge')))) == false) {
                    json_error('We could not verify that you have sufficient funds for this transaction!');
                } elseif (post('transaction_desc') == '') {
                    json_error('The field transaction description cannot be empty!');
                } else {
                    $todays_date = date("Y-m-d H:i:s");
                    $debit_user = $this->orange_credits_accounts_model->debitAccount(post('acct_number'), post('user_id'), (floatval(post('amount_to_pay')) + floatval(post('transaction_charge'))));

                    if ($debit_user != false) {
                        $credit_user = $this->orange_credits_accounts_model->creditAccount(post('receiver_account_number'), floatval(post('amount_to_pay')));
                        if ($credit_user != false) {
                            $credit_admin = $this->orange_credits_accounts_model->creditAdminAccount(floatval(post('transaction_charge')));
                            $this->orange_credit_transactions_model->Insert(post('transactionid'), post('user_id'),
                                post('acct_number'), post('receiver_id'), post('receiver_account_number'), 'WALLET PAYMENT',
                                post('amount_to_pay'), 'APPROVED', 'DEBIT', $todays_date);
                            $this->orange_credit_transactions_model->Insert(post('transactionid'), post('user_id'),
                                post('acct_number'), 1, ADMIN_ACCOUNT_NUMBER, 'WALLET PAYMENT',
                                post('transaction_charge'), 'APPROVED', 'CREDIT', $todays_date);

                            //Apply Notification sender
                            $senderAccount = $this->orange_credits_accounts_model->SelectOne(post('acct_number'));
                            // Account debited
                            $arr = array('id' => (int)$senderAccount->acct_number,'account' => $senderAccount->acct_number, 'receiver' => post('receiver_account_number'), 'amount'=>number_format((floatval(post('amount_to_pay')) + floatval(post('transaction_charge'))), 2, ",", "."), 'balance' => number_format((float)$senderAccount->account_balance, 2, ",", "."), 'subject' => "Debit Transaction Alert", 'date' => date("Y-m-d H:i:s"), 'type' => "sms");
                            $senderParams = json_encode($arr);
                            $this->orange_credit_notifications_model->debit_wallet_notice($senderParams);

                            //Apply Notification Receiver
                            $receiverAccount = $this->orange_credits_accounts_model->SelectOne(post('receiver_account_number'));
                            $arr2 = array('id' => (int)$receiverAccount->acct_number,'account' => $receiverAccount->acct_number, 'sender' => post('account_number'),'amount' =>number_format((floatval(post('amount_to_pay'))) , 2, ",", "."), 'balance' => number_format($receiverAccount->account_balance, 2, ",", "."), 'subject' => "Credit Transaction Alert", 'date' => date("Y-m-d H:i:s"), 'type' => "sms");
                            $receiverParams = json_encode($arr2);
                            $this->orange_credit_notifications_model->credited_wallet_notice($receiverParams);


                            json_send('' . H_ADMIN . '&view=orange_credits_accounts&id=' . post('acct_number') . '&do=viewall&msg=add');
                            json_success('Process Completed');
                        }
                    } else {
                        json_error('Error processing transactions!');
                    }
                }
            }
        } //DETAILS //////////////////////////////////////////////
        elseif (get('do') == 'details') {
            $rows = $this->orange_credits_accounts_model->SelectOne(get('id'));
            include(APP_FOLDER . '/views/admin/orange_credits_accounts/Details.php');
        } //TRUNCATE ///////////////////////////////////////////////
        elseif (get('do') == 'truncate') {
            $this->orange_credits_accounts_model->TruncateTable('' . H_ADMIN . '&view=orange_credits_accounts&do=viewall&msg=truncate');
            include(APP_FOLDER . '/views/admin/orange_credits_accounts/View.php');
        } //DELETE /////////////////////////////////////////////////
        elseif (get('do') == 'delete') {
            $dfile = get('dfile');
            if (get('id') and $dfile == '') {
                $del = $this->orange_credits_accounts_model->Delete(get('id'), '' . H_ADMIN . '&view=orange_credits_accounts&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') == '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                $del = $this->orange_credits_accounts_model->Delete(get('id'), '' . H_ADMIN . '&view=orange_credits_accounts&do=viewall&msg=delete');
            } elseif (get('id') and $dfile != '' and get('fdel') != '') {
                delete_files(UPLOAD_PATH . get('dfile'));
                delete_files(THUMB_PATH . get('dfile'));
                send_to('' . H_ADMIN . '&view=orange_credits_accounts&id=' . get('id') . '&do=update&msg=delete');
            }
        }
    }//end invoke
}//end class
?>
	