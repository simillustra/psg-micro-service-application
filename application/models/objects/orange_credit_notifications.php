<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_notifications_model
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_notifications
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once(APP_FOLDER . '/models/classes/class_orange_credit_notifications.php');

class orange_credit_notifications_model
{
    private $orange_credit_notifications_table = "orange_credit_notifications";
    // SELECT ALL

    /**
     * @param $query
     * @param null $limit
     * @return array|false
     */
    public function SelectAll($query, $limit = null)
    {
        if ($query['user_role'] == 5) {
            $bind = array(
                ":user_id" => $query['user_id'],
                ":range_start" => $query['range_start'],
                ":range_limit" => $query['range_end']);

            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credit_notifications_table,
                    " `reciever`=:user_id AND DATE(date) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d') LIMIT {$startpg} , {$limit}",
                    $bind);
            } else {
                return HDB::hus()->Hselect($this->orange_credit_notifications_table,
                    " `reciever`=:user_id  AND DATE(date) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                    $bind);
            }
        } else {
            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credit_notifications_table . " ORDER BY id DESC LIMIT {$startpg} , {$limit}");
            } else {
                return HDB::hus()->Hselect($this->orange_credit_notifications_table. " ORDER BY id DESC");
            }
        }
    }

    //Select Count for Pagination

    /**
     * @param $query
     * @return mixed
     */
    public function CountRow($query)
    {
        if ($query['user_role'] == 5) {
            $bind = array(
                ":user_id" => $query['user_id'],
                ":range_start" => $query['range_start'],
                ":range_limit" => $query['range_end']);
            return HDB::hus()->Hcount($this->orange_credit_notifications_table,
                "reciever=:user_id  AND DATE(date) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                $bind);
        } else {
            return HDB::hus()->Hcount($this->orange_credit_notifications_table);
        }
    }


    // SELECT ONE

    /**
     * @param $id
     * @return false|mixed
     */
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credit_notifications_table, "id=:id", $bind);
    }

    // QUICK SEARCH

    /**
     * @param $qstring
     * @param $limit
     * @param $where
     * @return array|false
     */
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect($this->orange_credit_notifications_table, "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE

    /**
     * @param $redirect_to
     */
    public function TruncateTable($redirect_to)
    {
        //$sql = HDB::hus()->prepare("TRUNCATE orange_credit_notifications");
        //$sql->execute();
        send_to($redirect_to);
    }

    // DELETE

    /**
     * @param $id
     * @param $redirect_to
     */
    public function Delete($id, $redirect_to)
    {
        //$bind = array(":id" => $id);
        //HDB::hus()->Hdelete("orange_credit_notifications", "id=:id", $bind);
        send_to($redirect_to);
    }

    /**
     * @param $reciever
     * @param $subject
     * @param $type
     * @param $sms_message
     * @param $email_message
     * @param $status
     * @param $date
     */
    public function Insert($reciever, $subject, $type, $sms_message, $email_message,
                           $status, $date)
    {

        $values = array(array(
            'reciever' => $reciever,
            'subject' => $subject,
            'type' => $type,
            'sms_message' => $sms_message,
            'email_message' => $email_message,
            'status' => $status,
            'emailsent' => 1,
            'date' => $date));
        HDB::hus()->Hinsert($this->orange_credit_notifications_table, $values);
    }

    // UPDATE

    /**
     * @param $reciever
     * @param $subject
     * @param $type
     * @param $sms_message
     * @param $email_message
     * @param $status
     * @param $date
     * @param $id
     */
    public function Update($reciever, $subject, $type, $sms_message, $email_message,
                           $status, $date, $id)
    {
        $sql = "reciever =:reciever,subject =:subject,type =:type,sms_message =:sms_message,email_message =:email_message,status =:status,date =:date WHERE id = :id ";
        $data = array(
            ':reciever' => $reciever,
            ':subject' => $subject,
            ':type' => $type,
            ':sms_message' => $sms_message,
            ':email_message' => $email_message,
            ':status' => $status,
            ':date' => $date,
            ':id' => $id);
        HDB::hus()->Hupdate($this->orange_credit_notifications_table, $sql, $data);

    }

    public function successful_registration_notice($params)
    {
        $captionInput = json_decode($params);
        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Congratulations, your wallet have been activated with ORANGE-CREDIT.";
        $sms_message .= "Acc No:";
        $sms_message .= "Pw:";

        $email_message = "";
        $status = "unsent";
        $date = date("Y-m-d H:i:s");


        $values = array(array(
            'reciever' => $captionInput->id,
            'subject' => $captionInput->subject,
            'type' => $captionInput->type,
            'sms_message' => $sms_message,
            'email_message' => $email_message,
            'status' => $status,
            'emailsent' => 1,
            'date' => $date));
        HDB::hus()->Hinsert($this->orange_credit_notifications_table, $values);
    }

    public function credited_wallet_notice($params)
    {
        $captionInput = json_decode($params);

        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Txn: credit\r\n";
        $sms_message .= "Acct:" . $captionInput->account . "\r\n";
        $sms_message .= "Amt:" . $captionInput->amount . " Des:trf:senderid(" . substr_replace($captionInput->sender, str_repeat("*", 8), 0, 9). ")" . "\r\n";
        $sms_message .= "Date: " . $captionInput->date . "\r\n";
        $sms_message .= "Bal: " . $captionInput->balance;


        $email_message = "Txn: credit\r\n";
        $email_message .= "Acct:" . $captionInput->account . "\r\n";
        $email_message .= "Amt:" . $captionInput->amount . " Des:trf:senderid(" . substr_replace($captionInput->sender, str_repeat("*", 8), 0, 9) . ")" . "\r\n";
        $email_message .= "Date: " . $captionInput->date . "\r\n";
        $email_message .= "Bal: " . $captionInput->balance;

        $status = "unsent";
        $date = date("Y-m-d H:i:s");

        $values = array(array(
            'reciever' => $captionInput->id,
            'subject' => $captionInput->subject,
            'type' => $captionInput->type,
            'sms_message' => $sms_message,
            'email_message' => $email_message,
            'status' => $status,
            'emailsent' => 1,
            'date' => $date));
        HDB::hus()->Hinsert($this->orange_credit_notifications_table, $values);
    }

    public function debit_wallet_notice($params)
    {
        $captionInput = json_decode($params);

        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Txn: debit \r\n";
        $sms_message .= "Acct: " . $captionInput->account . "\r\n";
        $sms_message .= "Amt: " . $captionInput->amount . "Des: trf:recieverid(" . substr_replace($captionInput->receiver, str_repeat("*", 8), 0, 9) . ")" . "\r\n";
        $sms_message .= "Date: " . $captionInput->date . "\r\n";
        $sms_message .= "Bal: " . $captionInput->balance;


        $email_message = "Txn: debit" . "\r\n";
        $email_message .= "Acct: " . $captionInput->account . "\r\n";
        $email_message .= "Amt: " . $captionInput->amount . "Des: trf:recieverid(" . substr_replace($captionInput->receiver, str_repeat("*", 8), 0, 9). ")" . "\r\n";
        $email_message .= "Date: " . $captionInput->date . "\r\n";
        $email_message .= "Bal: " . $captionInput->balance;

        $status = "unsent";
        $date = date("Y-m-d H:i:s");

        $values = array(array(
            'reciever' => $captionInput->id,
            'subject' => $captionInput->subject,
            'type' => $captionInput->type,
            'sms_message' => $sms_message,
            'email_message' => $email_message,
            'status' => $status,
            'emailsent' => 1,
            'date' => $date));


        HDB::hus()->Hinsert($this->orange_credit_notifications_table, $values);
    }

    public function approved_loan_notice($params)
    {
        $captionInput = json_decode($params);

        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Loan Approved \r\n";
        $sms_message .= "Loan Amt: " . $captionInput->loan_amount ."\r\n";
        $sms_message .= "Monthly payment: " . $captionInput->monthly . "\r\n";
        $sms_message .= "Total payment: " . $captionInput->total_loan_payment;
        $sms_message .= "Repayment Starts: " . $captionInput->contribution_starts . "\r\n";
        $sms_message .= "Your WALLET shall be credited shortly.";

        $email_message = "Loan Request Approved \r\n";
        $email_message .= "Loan Amt: " . $captionInput->loan_amount ."\r\n";
        $email_message .= "Monthly payment: " . $captionInput->monthly . "\r\n";
        $email_message .= "Total payment: " . $captionInput->total_loan_payment;
        $email_message .= "Repayment Starts: " . $captionInput->contribution_starts . "\r\n";
        $email_message .= "Your WALLET shall be credited shortly.";

        $status = "unsent";
        $date = date("Y-m-d H:i:s");

        $values = array(array(
            'reciever' => $captionInput->id,
            'subject' => $captionInput->subject,
            'type' => $captionInput->type,
            'sms_message' => $sms_message,
            'email_message' => $email_message,
            'status' => $status,
            'emailsent' => 1,
            'date' => $date));
        HDB::hus()->Hinsert($this->orange_credit_notifications_table, $values);
    }

    public function loan_status_notice($params)
    {
        $captionInput = json_decode($params);
        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Hello your loan request of N" . $captionInput->loan_amount . " naira has been DECLINED. Please review the comment or Our contact our Support team.";
        $email_message = "Hello " . $captionInput->fullname . " your loan request of N" . $captionInput->loan_amount . " naira has been DECLINED. Please review the comment or Our contact our Support team.";

        $status = "unsent";
        $date = date("Y-m-d H:i:s");

        $values = array(array(
            'reciever' => $captionInput->id,
            'subject' => $captionInput->subject,
            'type' => $captionInput->type,
            'sms_message' => $sms_message,
            'email_message' => $email_message,
            'status' => $status,
            'emailsent' => 1,
            'date' => $date));
        HDB::hus()->Hinsert($this->orange_credit_notifications_table, $values);
    }

    public function repayment_schedule_notice($params)
    {
        $captionInput = json_decode($params);

        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Loan amt: " . $captionInput->loan_amount . "\r\n";
        $sms_message .= "Tenor: " . $captionInput->loan_tenor . "\r\n";
        $sms_message .= "Monthly repayment amt: " . $captionInput->repayment_amount . "\r\n";
        $sms_message .= "Repayment dates: " . $captionInput->repayment_dates;

        $email_message = "Loan amt: " . $captionInput->loan_amount . "\r\n";
        $email_message .= "Tenor: " . $captionInput->loan_tenor . "\r\n";
        $email_message .= "Monthly repayment amt: " . $captionInput->repayment_amount . "\r\n";
        $email_message .= "Repayment dates: " . $captionInput->repayment_dates;

        $status = "unsent";
        $date = date("Y-m-d H:i:s");

        $values = array(array(
            'reciever' => $captionInput->id,
            'subject' => $captionInput->subject,
            'type' => $captionInput->type,
            'sms_message' => $sms_message,
            'email_message' => $email_message,
            'status' => $status,
            'emailsent' => 1,
            'date' => $date));
        HDB::hus()->Hinsert($this->orange_credit_notifications_table, $values);
    }

    public function successful_repayment_notice($params)
    {
        $captionInput = json_decode($params);
        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Congratulations you have successfully repaid your loan.";
        $email_message = "Congratulations" . $captionInput->fullname . ", you have successfully repaid your loan.";

        $status = "unsent";
        $date = date("Y-m-d H:i:s");

        $values = array(array(
            'reciever' => $captionInput->id,
            'subject' => $captionInput->subject,
            'type' => $captionInput->type,
            'sms_message' => $sms_message,
            'email_message' => $email_message,
            'status' => $status,
            'emailsent' => 1,
            'date' => $date));
        HDB::hus()->Hinsert($this->orange_credit_notifications_table, $values);
    }

    public function loan_eligibility_notice($params)
    {
        $captionInput = json_decode($params);

        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Hello, You are now eligible to access a loan amount of N" . $captionInput->amount . "from OrangeCredit. Login or contact an Orange Credit agent near you.";
        $email_message = "Dear " . $captionInput->fullname . ", you are now eligible to access a loan amount of N" . $captionInput->amount . " from OrangeCredit. Login or contact an Orange Credit agent near you.";

        $status = "unsent";
        $date = date("Y-m-d H:i:s");

        $values = array(array(
            'reciever' => $captionInput->id,
            'subject' => $captionInput->subject,
            'type' => $captionInput->type,
            'sms_message' => $sms_message,
            'email_message' => $email_message,
            'status' => $status,
            'emailsent' => 1,
            'date' => $date));
        HDB::hus()->Hinsert($this->orange_credit_notifications_table, $values);
    }

    public function loan_application_successful($params)
    {
        $captionInput = json_decode($params);

        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Your loan application of N" . $captionInput->loan_amount . " was successful and under review, please allow 24-48hrs for processing. Thank you";
        $email_message = "Dear " . $captionInput->fullname . ", your loan application of N " . $captionInput->loan_amount . " was successful and under review, please allow 24-48hrs for processing. Thank you";
        $status = "unsent";
        $date = date("Y-m-d H:i:s");

        $values = array(array(
            'reciever' => $captionInput->id,
            'subject' => $captionInput->subject,
            'type' => $captionInput->type,
            'sms_message' => $sms_message,
            'email_message' => $email_message,
            'status' => $status,
            'emailsent' => 1,
            'date' => $date));
        HDB::hus()->Hinsert($this->orange_credit_notifications_table, $values);
    }

    public function user_kyc_added($params)
    {
        $captionInput = json_decode($params);

        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Your KYC has being added and awaiting approval\r\n";
        $sms_message .= "Please allow 24 - 48 hours for verification and approval.\r\n";
        $sms_message .= "If you have stayed longer, please contact Us.";

        $email_message = "Hi ".$captionInput->fullname." Your KYC has being added and awaiting approval\r\n";
        $email_message .= "Please allow 24 - 48 hours for verification and approval.\r\n";
        $email_message .= "If you have stayed longer, please contact Us.";

        $status = "unsent";
        $date = date("Y-m-d H:i:s");

        $values = array(array(
            'reciever' => $captionInput->id,
            'subject' => $captionInput->subject,
            'type' => $captionInput->type,
            'sms_message' => $sms_message,
            'email_message' => $email_message,
            'status' => $status,
            'emailsent' => 1,
            'date' => $date));
        HDB::hus()->Hinsert($this->orange_credit_notifications_table, $values);
    }

    public function user_kyc_approved($params)
    {
        $captionInput = json_decode($params);

        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Your KYC has being approved\r\n";
        $sms_message .= "You are now eligible to apply and access ORANGE-CREDIT loans.\r\n";
        $sms_message .= "Login now and start saving";

        $email_message = "Hi ".$captionInput->fullname." Your KYC has being approved\r\n";
        $email_message .= "You are now eligible to apply and access ORANGE-CREDIT loans.\r\n";
        $email_message .= "Login now and start saving";

        $status = "unsent";
        $date = date("Y-m-d H:i:s");

        $values = array(array(
            'reciever' => $captionInput->id,
            'subject' => $captionInput->subject,
            'type' => $captionInput->type,
            'sms_message' => $sms_message,
            'email_message' => $email_message,
            'status' => $status,
            'emailsent' => 1,
            'date' => $date));
        HDB::hus()->Hinsert($this->orange_credit_notifications_table, $values);
    }

    public function user_kyc_declined($params)
    {
        $captionInput = json_decode($params);

        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Your KYC form entry has being declined.\r\n";
        $sms_message .= "Please review again to be eligible to apply and access ORANGE-CREDIT loans.\r\n";
        $sms_message .= "Login now and review, thanks";

        $email_message = "Hi ".$captionInput->fullname." Your KYC form entry has being declined.\r\n";
        $email_message .= "Please review again to be eligible to apply and access ORANGE-CREDIT loans.\r\n";
        $email_message .= "Login now and review, thanks";

        $status = "unsent";
        $date = date("Y-m-d H:i:s");

        $values = array(array(
            'reciever' => $captionInput->id,
            'subject' => $captionInput->subject,
            'type' => $captionInput->type,
            'sms_message' => $sms_message,
            'email_message' => $email_message,
            'status' => $status,
            'emailsent' => 1,
            'date' => $date));
        HDB::hus()->Hinsert($this->orange_credit_notifications_table, $values);
    }

    public function business_information_added($params)
    {
        $captionInput = json_decode($params);

        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Your business information has being added successfully,";
        $sms_message .= "and its currently being reviewed.\r\n";
        $sms_message .= "This is to help us serve you better";

        $email_message = "Hi ".$captionInput->fullname." Your business information has being added successfully,";
        $email_message .= "and its currently being reviewed.\r\n";
        $email_message .= "This is to help us serve you better";

        $status = "unsent";
        $date = date("Y-m-d H:i:s");

        $values = array(array(
            'reciever' => $captionInput->id,
            'subject' => $captionInput->subject,
            'type' => $captionInput->type,
            'sms_message' => $sms_message,
            'email_message' => $email_message,
            'status' => $status,
            'emailsent' => 1,
            'date' => $date));
        HDB::hus()->Hinsert($this->orange_credit_notifications_table, $values);
    }


} // end class


?>
	
	