<?php
/*
* =======================================================================
* CLASSNAME:        orange_credits_accounts_model
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credits_accounts
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once(APP_FOLDER . '/models/classes/class_orange_credits_accounts.php');

class orange_credits_accounts_model
{

    private $orange_credits_accounts_table = "orange_credits_accounts";

    // SELECT ALL
    public function SelectAll($query, $limit = null)
    {
        if ($query['user_role'] == 5) {
            $bind = array(
                ":user_id" => $query['user_id'],
                ":range_start" => $query['range_start'],
                ":range_limit" => $query['range_end']);

            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credits_accounts_table,
                    " `user_id`=:user_id  AND DATE(createdAt) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d') LIMIT {$startpg} , {$limit}",
                    $bind);
            } else {
                return HDB::hus()->Hselect($this->orange_credits_accounts_table,
                    " `user_id`=:user_id  AND DATE(createdAt) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                    $bind);
            }
        } else {
            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credits_accounts_table . "  LIMIT {$startpg} , {$limit}");
            } else {
                return HDB::hus()->Hselect($this->orange_credits_accounts_table);
            }
        }
    }

    //Select Count for Pagination
    public function CountRow($query)
    {
        if ($query['user_role'] == 5) {
            $bind = array(
                ":user_id" => $query['user_id'],
                ":range_start" => $query['range_start'],
                ":range_limit" => $query['range_end']);
            return HDB::hus()->Hcount($this->orange_credits_accounts_table,
                "user_id=:user_id  AND DATE(createdAt) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                $bind);
        } else {
            return HDB::hus()->Hcount($this->orange_credits_accounts_table);
        }
    }


    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credits_accounts_table, "acct_number=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect($this->orange_credits_accounts_table, "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        //$sql = HDB::hus()->prepare("TRUNCATE " . $this->orange_credits_accounts_table);
        //$sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        //$bind = array(":id" => $id);
        //HDB::hus()->Hdelete($this->orange_credits_accounts_table, "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($acct_number, $user_id, $acct_status, $acct_opendate, $account_type,
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

    // UPDATE
    public function Update($acct_number, $user_id, $acct_status, $acct_opendate, $account_type,
                           $account_balance, $account_point_balance, $createdAt, $modifiedAt, $id)
    {
        $sql = "  acct_number =:acct_number,user_id =:user_id,acct_status =:acct_status,acct_opendate =:acct_opendate,account_type =:account_type,account_balance =:account_balance,account_point_balance =:account_point_balance,createdAt =:createdAt,modifiedAt =:modifiedAt WHERE id = :id ";
        $data = array(
            ':acct_number' => $acct_number,
            ':user_id' => $user_id,
            ':acct_status' => $acct_status,
            ':acct_opendate' => $acct_opendate,
            ':account_type' => $account_type,
            ':account_balance' => $account_balance,
            ':account_point_balance' => $account_point_balance,
            ':createdAt' => $createdAt,
            ':modifiedAt' => $modifiedAt,
            ':id' => $id);
        HDB::hus()->Hupdate($this->orange_credits_accounts_table, $sql, $data);

    }

    // Account Exist
    public function accountExist($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credits_accounts_table, "acct_number=:id", $bind);
    }

    // Account has Available funds

    /**
     * @param $acct_number
     * @param $amount_to_validate
     * @return bool|mixed
     */
    public function accountHasAvailableFunds($acct_number, $amount_to_validate)
    {
        $bind = array(":acct_number" => $acct_number,
            ':amount_to_validate' => $amount_to_validate,
        );
        return HDB::hus()->Hone($this->orange_credits_accounts_table, "acct_number=:acct_number AND account_balance >= :amount_to_validate ", $bind);
    }


// DebitAccount
    public function debitAccount($acct_number, $user_id, $amount_debit)
    {

        //check if user has that amount in account
        $sql = "account_balance = account_balance - :amount_debit WHERE acct_number =:acct_number AND user_id =:user_id ";
        $data = array(
            ':acct_number' => $acct_number,
            ':user_id' => $user_id,
            ':amount_debit' => $amount_debit);
        return HDB::hus()->Hupdate($this->orange_credits_accounts_table, $sql, $data);

    }

    // creditAccount
    public function creditAccount($account_receiver, $amount_credit)
    {

        //check if user has that amount in account
        $sql = "account_balance = account_balance + :amount_credit WHERE acct_number =:acct_number";
        $data = array(
            ':acct_number' => $account_receiver,
            ':amount_credit' => $amount_credit);
        return HDB::hus()->Hupdate($this->orange_credits_accounts_table, $sql, $data);

    }

    // creditAdminAccount
    public function creditAdminAccount($amount_to_credit)
    {

        //check if user has that amount in account
        $sql = "account_balance = account_balance + :amount_to_credit WHERE acct_number ='2349039881774' AND user_id=1";
        $data = array(':amount_to_credit' => $amount_to_credit);
        return HDB::hus()->Hupdate($this->orange_credits_accounts_table, $sql, $data);

    }


} // end class

?>
	
	