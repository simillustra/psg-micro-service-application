<?php
/*
SIMILLUSTRA  PHP CODE GENERATOR
Author: Simillustra Limited (http://simillustra.com) info@simillustra.com
COPYRIGHT 2014 ALL RIGHTS RESERVED

You must have purchased a valid license from CodeCanyon.com in order to have
access this file.

You may only use this file according to the respective licensing terms
you agreed to when purchasing this item.
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

class admin_users_model
{

    public $userid;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $email;
    public $phone;
    public $password;
    public $membership;
    public $user_status;
    public $user_position;
    public $user_avarta;
    public $access_level;
    public $date_created;

    private $bank_table = "mt_banks";
    private $orange_credits_accounts_table = 'orange_credits_accounts';
    private $orange_credit_zones_table = "orange_credit_zones";
    private $orange_credit_branches_table = "orange_credit_branches";
    private $orange_credits_applications_table = "orange_credits_applications_table";
    private $orange_credit_payment_history_table = "orange_credit_payment_history";
    private $orange_credit_business_plan_table = "orange_credit_business_plan";
    private $orange_credit_transactions = "orange_credit_transactions";
    private $orange_credit_micro_loan_request_table = "orange_credit_micro_loan_request";
    private $orange_credit_kyc_table = "orange_credit_kyc";
    private $orange_credit_notifications_table = "orange_credit_notifications";

    //Constructor
    public function __construct()
    {
        $this->userid = isset($userid);
        $this->first_name = isset($first_name);
        $this->middle_name = isset($middle_name);
        $this->last_name = isset($last_name);
        $this->email = isset($email);
        $this->phone = isset($phone);
        $this->password = isset($password);
        $this->membership = isset($membership);
        $this->user_status = isset($user_status);
        $this->user_position = isset($user_position);
        $this->user_avarta = isset($user_avarta);
        $this->date_created = isset($date_created);
    }

    // SELECT ALL
    public function SelectAll($limit = null)
    {
        if ($limit) {
            $startpg = pageparam($limit);
            return HDB::hus()->Hselect(H_SYSTEM_ACCESS . " LIMIT {$startpg} , {$limit}");
        } else {
            return HDB::hus()->Hselect(H_SYSTEM_ACCESS . " category");
        }
    }

    //Select Count for Pagination
    public function CountRow()
    {
        return HDB::hus()->Hcount(H_SYSTEM_ACCESS);
    }

    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone(H_SYSTEM_ACCESS, "userid=:id", $bind);
    }

    // SELECT Staff Members
    public function selectBroadCast_Recipients($id)
    {
        if ($id === 'all') {
            return HDB::hus()->Hselect(H_SYSTEM_ACCESS," "," ","first_name, last_name, phone");
        } else {
            $bind = array(":id" => (int)$id);
            return HDB::hus()->Hselect(H_SYSTEM_ACCESS, "user_position=:id", $bind, "first_name, last_name, phone");
        }
    }

    // SELECT ONE
    public function SelectUserID($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone(H_SYSTEM_ACCESS, "username=:id", $bind);
    }

    // CHECK APPROVALS
    public function checkApprovedKYC($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credit_kyc_table, "userid=:id", $bind);
    }


    // DELETE
    public function Delete($id, $redirect_to)
    {
        $bind = array(":id" => $id);
        HDB::hus()->Hdelete(H_SYSTEM_ACCESS, " userid=:id", $bind);
        send_to($redirect_to);
    }

    /**
     * @param $params
     */

    public function successful_registration_notice($params)
    {
        $captionInput = json_decode($params);
        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Dear " . $captionInput->fullname . " congratulations, your wallet have been activated with ORANGE-CREDIT.\r\n";
        $sms_message .= "Acc No:" . $captionInput->account . "\r\n";
        $sms_message .= "Pw: " . $captionInput->password . "\r\n";
        $sms_message .= "Start Saving today\r\n";


        $email_message = "Dear " . $captionInput->fullname . " congratulations, your wallet have been activated with ORANGE-CREDIT.\r\n";
        $email_message .= "Acc No:" . $captionInput->account . "\r\n";
        $email_message .= "Pw: " . $captionInput->password . "\r\n";
        $email_message .= "Start Saving today";

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


    public function getting_started_information($params)
    {
        $captionInput = json_decode($params);
        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Hi " . $captionInput->fullname . " Welcome to ORANGE-CREDIT.\r\n";
        $sms_message .= "To qualify for loan access, you must:\r\n";
        $sms_message .= "(1) Fill your KYC form:\r\n";
        $sms_message .= "(2) Fill your business Info form\r\n";
        $sms_message .= "(3) Start funding your Account\r\n";
        $sms_message .= "Our Team is here to assist you\r\n";

        $email_message = "Hi " . $captionInput->fullname . " Welcome to ORANGE-CREDIT.\r\n";
        $email_message .= "To qualify for loan access, you must:\r\n";
        $email_message .= "(1) Fill your KYC form:\r\n";
        $email_message .= "(2) Fill your business Info form\r\n";
        $email_message .= "(3) Start funding your Account\r\n";
        $email_message .= "Our Team is here to assist you\r\n";

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


    /**
     * @param $first_name
     * @param $middle_name
     * @param $last_name
     * @param $email
     * @param $phone
     * @param $password
     * @param $membership
     * @param $user_status
     * @param $user_position
     * @param $referral_code
     * @param $referral_id
     * @param $date_created
     * @return string
     */

    public function singUpInsert($first_name, $middle_name, $last_name, $email, $phone, $password, $membership,
                                 $user_status, $user_position, $referral_code, $referral_id, $date_created)
    {

        $values = array(array(
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone,
            'password' => $password,
            'membership' => $membership,
            'user_status' => $user_status,
            'user_position' => $user_position,
            'referral_code' => $referral_code,
            'referral_id' => $referral_id,
            'date_created' => $date_created));

        HDB::hus()->Hinsert(H_SYSTEM_ACCESS, $values);
        return HDB::hus()->lastInsertId();
    }

    // INSERT
    public function Insert($first_name, $middle_name, $last_name, $email, $phone, $password, $membership,
                           $user_status, $user_position, $referral_code, $referral_id, $user_branch, $zone_coverage, $date_created)
    {
        $new_upload = new UploadControl();
        $upload_name = $new_upload->ImageUplaodResize('user_avarta', THUMB_IMAGE_WIDTH,
            BIG_IMAGE_WIDTH, UPLOAD_PATH, THUMB_PATH, 90);
        if ($upload_name == '') {
            $values = array(array(
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone' => (int)$phone,
                'password' => $password,
                'membership' => $membership,
                'user_status' => $user_status,
                'user_position' => $user_position,
                'referral_code' => $referral_code,
                'referral_id' => $referral_id,
                'user_branch' => $user_branch,
                'user_zone' => $zone_coverage,
                'date_created' => $date_created));
        } else {
            $values = array(array(
                'user_avarta' => $upload_name,
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone' => (int)$phone,
                'password' => $password,
                'membership' => $membership,
                'user_status' => $user_status,
                'user_position' => $user_position,
                'referral_code' => $referral_code,
                'referral_id' => $referral_id,
                'user_branch' => $user_branch,
                'user_zone' => $zone_coverage,
                'date_created' => $date_created));
        }
        HDB::hus()->Hinsert(H_SYSTEM_ACCESS, $values);
        return HDB::hus()->lastInsertId();
    }


    // UPDATE
    public function Update($first_name, $middle_name, $last_name, $email, $phone, $membership, $user_status, $user_position,
                           $user_branch, $zone_coverage, $date, $id)
    {
        $new_upload = new UploadControl();
        $upload_name = $new_upload->ImageUplaodResize('user_avarta', THUMB_IMAGE_WIDTH,
            BIG_IMAGE_WIDTH, UPLOAD_PATH, THUMB_PATH, 90);
        if ($upload_name == '') {
            $sql = " UPDATE " . H_SYSTEM_ACCESS . " SET  first_name ='$first_name', middle_name ='$middle_name',
                          last_name ='$last_name', email ='$email',
                          phone ='$phone',
                          membership ='$membership',
                          user_status ='$user_status',
                          user_position ='$user_position',
                          user_branch ='$user_branch',
                          user_zone ='$zone_coverage',
                          last_updated ='$date' 
                      WHERE userid = :id ";
        } else {
            $sql = " UPDATE " . H_SYSTEM_ACCESS . " SET  user_avarta='$upload_name',
                          first_name ='$first_name',
                          middle_name ='$middle_name',
                          last_name ='$last_name',
                          email ='$email',
                          phone ='$phone',
                          membership ='$membership',
                          user_status ='$user_status',
                          user_position ='$user_position',
                          user_branch ='$user_branch',
                          user_zone ='$zone_coverage',
                          last_updated ='$date' 
                       WHERE userid = :id ";
        }
        $stmt = HDB::hus()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    // UPDATE
    public function UpdatePassword($password, $date, $id)
    {
        $sql = " UPDATE " . H_SYSTEM_ACCESS . " SET  password ='$password', last_updated ='$date' WHERE email = :email ";
        $stmt = HDB::hus()->prepare($sql);
        $stmt->bindParam(':email', $id);
        try {
            if ($stmt->execute()) {
                ;
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // LAST LOGIN
    public function UpdateLastLogin($date, $ip, $id)
    {
        $sql = " UPDATE " . H_SYSTEM_ACCESS . " SET  last_login_date ='$date', last_login_ip ='$ip' 
                 WHERE userid = :id ";

        $stmt = HDB::hus()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    // UPDATE EXEMPT
    public function UpdateExempt($name, $email, $phone, $date, $id)
    {
        $new_upload = new UploadControl;
        $upload_name = $new_upload->ImageUplaodResize('user_avarta', THUMB_IMAGE_WIDTH,
            BIG_IMAGE_WIDTH, UPLOAD_PATH, THUMB_PATH, 90);
        if ($upload_name == '') {
            $sql = " UPDATE " . H_SYSTEM_ACCESS . " SET  name ='$name',
                          email ='$email',
                          phone ='$phone',
                          last_updated ='$date' 
                     WHERE userid = :id ";
        } else {
            $sql = " UPDATE " . H_SYSTEM_ACCESS . " SET  user_avarta='$upload_name',
                          name ='$name',
                          email ='$email',
                          phone ='$phone' ,
                          last_updated ='$date' 
                    WHERE userid = :id ";
        }
        try {
            $stmt = HDB::hus()->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }


    //LOGIN
    public function HezeLogin($params, $password, $table)
    {

        $query = HDB::hus()->prepare("SELECT `userid`,`password`,`phone`, `first_name`, `email`, `user_position`, `membership`  FROM `$table` WHERE `email` = ? OR `phone`= ? ");
        $query->bindValue(1, $params);
        $query->bindValue(2, $params);

        try {
            $query->execute();
            $data = $query->fetch();
            $my_password = $data['password'];
            $username = $data['email'];
            $first_name = $data['first_name'];
            $userid = $data['userid'];
            $user_position = $data['user_position'];
            $account_number = $data['phone'];

            $hash = hezecom_crypt($password);
            if ($hash == hezecom_crypt($password, $my_password)) {
                // TODO : add query of permission based on $data['membership']

                $array_name = array(
                    'userid' => $userid,
                    'username' => $username,
                    'first_name' => $first_name,
                    'roles_perm' => $user_position,
                    'user_position' => $user_position,
                    'account_number' => $account_number
                );
                return $array_name;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }


    // STAFF LOGIN
    public function staffLogin($username, $password, $table)
    {

        $query = HDB::hus()->prepare("SELECT `id`,`password`, `email`, `department`, `role`, `bank_id`,`branch_id`,`name`,`permission`,`user_position`  
                                          FROM `$table` 
                                          WHERE `email` = ?");
        $query->bindValue(1, $username);

        try {
            $query->execute();
            $data = $query->fetch();
            $my_password = $data['password'];


            $hash = hezecom_crypt($password);
            if ($hash == hezecom_crypt($password, $my_password)) {
                // TODO : add query of permission based on $data['membership']

                //foreach($data as $rows){
                $array_name = array(
                    'userid' => $data['id'],
                    'username' => $data['email'],
                    'role' => $data['role'],
                    'bid' => $data['bank_id'],
                    'bbid' => $data['branch_id'],
                    'department' => $data['department'],
                    'perms' => $data['permission'],
                    'user_position' => $data['user_position']);

                // }

                return $array_name;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    // USER LOGIN
    public function userLogin($username, $password, $table)
    {

        $query = HDB::hus()->prepare("SELECT `id`,`password`, `email`, `department`, `role`,`bank_id`,`branch_id`,`name`,`permission`  
                                          FROM `$table` 
                                          WHERE `email` = ?");
        $query->bindValue(1, $username);

        try {
            $query->execute();
            $data = $query->fetch();
            $my_password = $data['password'];


//            $hash = hezecom_crypt($password);
            if (hezecom_crypt($password, $my_password)) {
                // TODO : add query of permission based on $data['membership']

                //foreach($data as $rows){
                $array_name = array(
                    'userid' => $data['id'],
                    'username' => $data['username'],
                    'role' => $data['role'],
                    'bid' => $data['bank_id'],
                    'bbid' => $data['branch_id'],
                    'department' => $data['department'],
                    'perms' => $data['permission']);

                // }

                return $array_name;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    //USER CHECK
    public function user_exist_checker($param, $action, $table)
    {
        if ($action === 'phone') {
            $query = HDB::hus()->prepare("SELECT COUNT(`phone`) FROM `$table` WHERE `phone`= ? ");
            $query->bindValue(1, $param);
        } elseif ($action === 'email') {
            $query = HDB::hus()->prepare("SELECT COUNT(`email`) FROM `$table` WHERE `email`= ?");
            $query->bindValue(1, $param);
        } else {
            $query = HDB::hus()->prepare("SELECT COUNT(`phone`) FROM `$table` WHERE `phone`= ? OR `email`= ?");
            $query->bindValue(1, $param);
            $query->bindValue(2, $param);
        }


        try {
            $query->execute();
            $rows = $query->fetchColumn();

            if ($rows == 1) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }


    public function account_activation($param, $table)
    {
        $query = HDB::hus()->prepare("SELECT COUNT(`phone`) FROM `$table` WHERE `phone`= ? OR `email`= ?");

        $query->bindValue(1, $param);
        $query->bindValue(2, $param);

        try {
            $query->execute();
            $rows = $query->fetchColumn();

            if ($rows == 1) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    //CHANGE PASSWORD
    public function current_password($password, $table, $field, $value)
    {
        $query = HDB::hus()->prepare("SELECT `password` FROM `$table` WHERE `$field` = ?");
        $query->bindValue(1, $value);
        try {
            $query->execute();
            $data = $query->fetch();
            $my_password = $data['password'];
            $hash = hezecom_crypt($password);
            if ($hash == hezecom_crypt($password, $my_password)) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    //UserID
    function UserID()
    {
        $id = $_SESSION['H_USER_SESSION'];
        $stmt = HDB::hus()->prepare("SELECT `userid` FROM " . H_SYSTEM_ACCESS .
            " WHERE `email`=:id OR `phone`=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row->userid;
    }

    // UPDATE EXEMPT
    public function generate_referral_code()
    {
        if (isset($_SESSION['H_USER_SESSION'])) {
            $id = $_SESSION['H_USER_SESSION'];
            $referral_code = 'OCR' . random_str('nozero', 8);

            $sql = " UPDATE " . H_SYSTEM_ACCESS . " SET  referral_code='$referral_code'
                    WHERE `phone` = :id OR `email`=:id";

            try {
                $stmt = HDB::hus()->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return $referral_code;
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
            }
        }
    }

    //get refferal code
    function get_referal_code()
    {
        if (isset($_SESSION['H_USER_SESSION'])) {
            $id = $_SESSION['H_USER_SESSION'];
            $stmt = HDB::hus()->prepare("SELECT `referral_code` FROM " . H_SYSTEM_ACCESS .
                " WHERE `phone`=:id OR `email`=:id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_OBJ);
            return $row->referral_code !== null ? $row->referral_code : $this->
            generate_referral_code();
        }
    }


    //access level

    public function logged_in_protect($login)
    {
        if ($this->logged_in_user() === false) {
            //send_to($login);
            exit();
        }
    }

    //Login Checker

    public function logged_in_user()
    {
        return (isset($_SESSION['H_USER_SESSION']) and $this->UserAccess()->user_status ==
            1) ? true : false;
    }

    function UserAccess()
    {
        if (isset($_SESSION['H_USER_SESSION'])) {
            $id = $_SESSION['H_USER_SESSION'];

            $stmt = HDB::hus()->prepare("SELECT * FROM " . H_SYSTEM_ACCESS . " WHERE `phone`=:id OR `email`=:id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
    }

    //logout

    public function log_out_access($url)
    {
        if ($this->logged_in_user() === true) {
            unset($_SESSION['H_USER_SESSION']);
            session_destroy();
            send_to($url);
            exit();
        }
    }

    //RETRIEVE PASSWORD
    public function LostPassword($table, $username)
    {
        $query = HDB::hus()->prepare("SELECT `email` FROM `$table` WHERE `email` = ? OR `phone` =? ");
        $query->bindValue(1, $username);
        $query->bindValue(2, $username);
        try {
            $query->execute();
            $data = $query->fetch();
            $email = $data['email'];
            if ($email == $username) {
                return $email;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $stmt = HDB::hus()->prepare("SELECT * FROM " . H_SYSTEM_ACCESS . " WHERE $where LIKE :svalue LIMIT $limit");
        $stmt->bindValue(':svalue', "%{$qstring}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Create User Account on Signup
     */
    // INSERT
    public function createUserAccount($acct_number, $user_id, $acct_status, $acct_opendate,
                                      $account_type, $account_balance, $account_point_balance, $createdAt, $modifiedAt)
    {

        $values = array(array(
            'acct_number' => $acct_number,
            'user_id' => $user_id,
            'acct_status' => $acct_status,
            'acct_opendate' => $acct_opendate,
            'account_type' => $account_type,
            'account_balance' => $account_balance,
            'account_point_balance' => $account_point_balance,
            'createdAt' => $createdAt,
            'modifiedAt' => $modifiedAt));
        HDB::hus()->Hinsert($this->orange_credits_accounts_table, $values);
    }

    public function get_bank($user_id)
    {

        $query = HDB::hus()->prepare("SELECT `id`  FROM `mt_banks` WHERE `created_by` = ? LIMIT 1");
        $query->bindValue(1, $user_id);

        try {
            $query->execute();
            $data = $query->fetch(PDO::FETCH_ASSOC);

            if ($query->rowCount() > 0) {
                // TODO : add query of permission based on $data['membership']
                return $id = $data['id'];
            } else {
                return false;
            }

        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    public function getCount($user_id, $table_type)
    {

        switch ($table_type) {
            case "accounts":
                if ($_SESSION['H_USER_SESSION_POSITION'] == 5) {
                    $bind = array(
                        ":user_id" => $user_id,
                        ":range_start" => date('Y-01-01'),
                        ":range_limit" => date('Y-m-d'));
                    $number_of_counts = HDB::hus()->Hcount($this->orange_credits_accounts_table,
                        "user_id=:user_id  AND DATE(createdAt) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                        $bind);
                } else {
                    $number_of_counts = HDB::hus()->Hcount($this->orange_credits_accounts_table);
                }
                echo $number_of_counts > 0 ? $number_of_counts : 'No Account Setup';
                break;
            case "transactions":
                if ($_SESSION['H_USER_SESSION_POSITION'] == 5) {
                    $bind = array(
                        ":sender_id" => $user_id,
                        ":range_start" => date('Y-01-01'),
                        ":range_limit" => date('Y-m-d'));
                    $number_of_counts = HDB::hus()->Hcount($this->orange_credit_transactions,
                        "sender_id=:sender_id OR `receiver_id`=:sender_id AND DATE(payment_date) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                        $bind);
                } else {
                    $number_of_counts = HDB::hus()->Hcount($this->orange_credit_transactions);
                }

                echo $number_of_counts > 0 ? $number_of_counts : 'No Transactions Available';
                break;
            case "business":
                if ($_SESSION['H_USER_SESSION_POSITION'] == 5) {
                    $bind = array(
                        ":user_id" => $user_id,
                        ":range_start" => date('Y-01-01'),
                        ":range_limit" => date('Y-m-d'));
                    $number_of_counts = HDB::hus()->Hcount($this->orange_credit_business_plan_table,
                        "business_plan_user=:user_id  AND DATE(business_date_applied) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                        $bind);
                } else {
                    $number_of_counts = HDB::hus()->Hcount($this->orange_credit_business_plan_table);
                }

                echo $number_of_counts > 0 ? $number_of_counts : 'No business plans available.';
                break;
            case "repayments":
                if ($_SESSION['H_USER_SESSION_POSITION'] == 5) {
                    $bind = array(
                        ":user_id" => $user_id,
                        ":range_start" => date('Y-01-01'),
                        ":range_limit" => date('Y-m-d'));
                    $number_of_counts = HDB::hus()->Hcount($this->orange_credit_payment_history_table,
                        "user_id=:user_id  AND DATE(charged_day) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                        $bind);
                } else {
                    $number_of_counts = HDB::hus()->Hcount($this->orange_credit_payment_history_table);
                }

                echo $number_of_counts > 0 ? $number_of_counts : 'No Loan repayment(s) information available';
                break;
            case "requests":
                if ($_SESSION['H_USER_SESSION_POSITION'] == 5) {
                    $bind = array(
                        ":user_id" => $user_id,
                        ":range_start" => date('Y-01-01'),
                        ":range_limit" => date('Y-m-d'));
                    $number_of_counts = HDB::hus()->Hcount($this->orange_credit_micro_loan_request_table,
                        "user_id=:user_id  AND DATE(request_date) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                        $bind);
                } else {
                    $number_of_counts = HDB::hus()->Hcount($this->orange_credit_micro_loan_request_table);
                }
                echo $number_of_counts > 0 ? $number_of_counts : 'No Credit requested.';

                break;
            case "payment-history":
                echo "Module Not Activated yet!";
                break;
            case "referrals":
                $bind = array(
                    ":referral_id" => $this->generate_referral_code(),
                    ":range_start" => date('Y-01-01'),
                    ":range_limit" => date('Y-m-d'));
                $number_of_counts = HDB::hus()->Hcount(H_SYSTEM_ACCESS,
                    "referral_id=:referral_id  AND DATE(date_created) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                    $bind);
                echo $number_of_counts > 0 ? $number_of_counts : 'No referals yet!';

                break;

            case "applications":
                if ($_SESSION['H_USER_SESSION_POSITION'] == 5) {
                    $bind = array(
                        ":sponsor_id" => $user_id,
                        ":range_start" => date('Y-01-01'),
                        ":range_limit" => date('Y-m-d'));
                    $number_of_counts = HDB::hus()->Hcount($this->orange_credits_applications_table,
                        "sponsor_id=:sponsor_id  AND DATE(createdAt) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                        $bind);

                } else {
                    $number_of_counts = HDB::hus()->Hcount($this->orange_credits_applications_table);
                }

                echo $number_of_counts > 0 ? $number_of_counts : 'No Application(s) available';
                break;
            case "users":
                $bind = array(
                    ":user_position" => 5,
                    ":range_start" => date('Y-01-01'),
                    ":range_limit" => date('Y-m-d'));
                $number_of_counts = HDB::hus()->Hcount(H_SYSTEM_ACCESS,
                    "user_position=:user_position AND DATE(date_created) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                    $bind);
                echo $number_of_counts > 0 ? $number_of_counts : 'No User available';
                break;
            case "memos":
                echo "Module Not Activated yet!";
                break;
            case "staff":
                $bind = array(
                    ":user_position" => 4,
                    ":range_start" => date('Y-01-01'),
                    ":range_limit" => date('Y-m-d'));
                $number_of_counts = HDB::hus()->Hcount(H_SYSTEM_ACCESS,
                    "user_position=:user_position AND DATE(date_created) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                    $bind);
                echo $number_of_counts > 0 ? $number_of_counts : 'No Staff or Agents available';
                break;

            default:
                echo "Module Not Activated yet!";
                break;


        }

    }

    public function getLatestAccount()
    {
        $query = HDB::hus()->prepare("SELECT `userid`,`first_name`,`last_name`,`date_created`,`user_avarta` FROM `" .
            H_SYSTEM_ACCESS . "` 
                                          WHERE `user_position` = ?
                                          ORDER BY `date_created` DESC, `last_name` ASC LIMIT 0 , 20");
        $query->bindValue(1, 5);

        try {
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_OBJ);

            if ($data) {
                return $data;
            } else {
                return [];
            }

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getLatestCreditRequest()
    {
        $query = HDB::hus()->prepare("SELECT `userid`,`name`,`username`,`date_created`,`user_avarta` FROM `" .
            H_SYSTEM_ACCESS . "` 
                                          WHERE `user_position` = ?
                                          ORDER BY `date_created` DESC, `name` ASC LIMIT 0 , 20");
        $query->bindValue(1, 5);

        try {
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_OBJ);

            if ($data) {
                return $data;
            } else {
                return [];
            }

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Get List

    /**
     * @param $zone_user
     * @return array|bool
     */
    public function showZoneList($zone_user)
    {
        $bind = array(":zone_user" => $zone_user);
        return HDB::hus()->Hselect($this->orange_credit_zones_table,
            "`zone_user`=:zone_user AND `zone_status`='ACTIVE'", $bind);
    }

    // Get List

    /**
     * @param $contact_person
     * @return array|bool
     */
    public function showBranchList($contact_person)
    {
        $bind = array(":contact_person" => $contact_person);
        return HDB::hus()->Hselect($this->orange_credit_branches_table,
            "`contact_person`=:contact_person OR `parent_id`=:contact_person", $bind);
    }

    /**
     * @param $acct_number
     * @param $user_id
     * @param $acct_status
     * @param $acct_opendate
     * @param $account_type
     * @param $account_balance
     * @param $account_point_balance
     * @param $createdAt
     * @param $modifiedAt
     */

    public function createWalletAccount($acct_number, $user_id, $acct_status, $acct_opendate, $account_type,
                                        $account_balance, $account_point_balance, $createdAt, $modifiedAt)
    {

        $values = array(array(
            'acct_number' => $acct_number,
            'user_id' => $user_id,
            'acct_status' => $acct_status,
            'acct_opendate' => $acct_opendate,
            'account_type' => $account_type,
            'account_balance' => $account_balance,
            'account_point_balance' => $account_point_balance,
            'createdAt' => $createdAt,
            'modifiedAt' => $modifiedAt));
        HDB::hus()->Hinsert($this->orange_credits_accounts_table, $values);
    }


} // end class


?>
	
	
	
	