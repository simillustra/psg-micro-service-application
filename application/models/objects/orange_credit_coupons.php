<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_coupons_model
* DATE CREATED:  	01-04-2020
* FOR TABLE:  		orange_credit_coupons
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER . '/models/classes/class_orange_credit_coupons.php');

class orange_credit_coupons_model
{
    private $orange_credit_coupons_table = "orange_credit_coupons";

    // SELECT ALL

    /**
     * @param $query
     * @param null $limit
     * @return array|bool
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
                return HDB::hus()->Hselect($this->orange_credit_coupons_table,
                    " `coupon_user`=:user_id OR `coupon_redeemed_by`=:user_id  AND DATE(coupon_date_added) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d') LIMIT {$startpg} , {$limit}",
                    $bind);
            } else {
                return HDB::hus()->Hselect($this->orange_credit_coupons_table,
                    " `coupon_user`=:user_id  AND DATE(date_created) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                    $bind);
            }
        } else {
            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credit_coupons_table . " LIMIT {$startpg} , {$limit}");
            } else {
                return HDB::hus()->Hselect($this->orange_credit_coupons_table);
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
            return HDB::hus()->Hcount($this->orange_credit_coupons_table,
                "coupon_user=:user_id  AND DATE(coupon_date_added) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                $bind);
        } else {
            return HDB::hus()->Hcount($this->orange_credit_coupons_table);
        }
    }

    // SELECT ONE

    /**
     * @param $id
     * @return bool|mixed
     */
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credit_coupons_table, "id=:id", $bind);
    }

    // SELECT ONE

    /**
     * @param $id
     * @param $id
     * @return bool|mixed
     */
    public function couponIsActive($id)
    {
        $bind = array(":coupon_code" => $id, ":coupon_status" => "PROCESSING");
        return HDB::hus()->Hone($this->orange_credit_coupons_table,
            "coupon_code=:coupon_code AND coupon_status=:coupon_status AND coupon_redeemed_by=0", $bind);
    }

    /**
     * @param $coupon_code
     * @param $coupon_amount
     * @return bool|mixed
     */

    public function couponHasSaidValue($coupon_code, $coupon_amount)
    {
        $bind = array(":coupon_code" => $coupon_code,":coupon_amount"=>$coupon_amount, ":coupon_status" => "PROCESSING");
        return HDB::hus()->Hone($this->orange_credit_coupons_table,
            "coupon_code=:coupon_code AND coupon_amount=:coupon_amount AND coupon_status=:coupon_status AND coupon_redeemed_by=0", $bind);
    }

     /**
     * @param $id
     * @param $userid
     * @return bool|int
     * @description SET COUPON ACTIVE
     */
    public function setCouponActive($id, $userid)
    {
        $data = array(":coupon_code" => $id, ":coupon_status" => "ACTIVE", ":coupon_redeemed_by" => $userid);
        $sql = "coupon_status=:coupon_status, coupon_redeemed_by=:coupon_redeemed_by WHERE coupon_code=:coupon_code AND coupon_status='PROCESSING'";
        return HDB::hus()->Hupdate($this->orange_credit_coupons_table, $sql, $data);
    }


    /**
     * @param $id
     * @param $userid
     * @return bool|int
     * @description SET COUPON BLOCK
     */
    public function setCouponBlock($id, $userid)
    {
        $data = array(":coupon_code" => $id, ":coupon_status" => "BLOCKED", ":coupon_redeemed_by" => $userid);
        $sql = "coupon_status=:coupon_status, coupon_redeemed_by=:coupon_redeemed_by WHERE coupon_code=:coupon_code AND coupon_status='PROCESSING'";
        return HDB::hus()->Hupdate($this->orange_credit_coupons_table, $sql, $data);
    }

    // QUICK SEARCH

    /**
     * @param $qstring
     * @param $limit
     * @param $where
     * @return array|bool
     */
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect($this->orange_credit_coupons_table, "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        //$sql = HDB::hus()->prepare("TRUNCATE orange_credit_coupons");
        // $sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        // $bind = array(":id" => $id);
        //HDB::hus()->Hdelete($this->orange_credit_coupons_table, "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT

    /**
     * @param $coupon_code
     * @param $coupon_amount
     * @param $coupon_trans_id
     * @param $coupon_payment_mode
     * @param $coupon_status
     * @param $coupon_date_added
     * @param $coupon_date_activated
     * @param $coupon_user
     * @param $coupon_account
     * @param $coupon_redeemed_by
     */

    public function Insert($coupon_code, $coupon_amount, $coupon_trans_id, $coupon_payment_mode,
        $coupon_status, $coupon_date_added, $coupon_date_activated, $coupon_user,$coupon_account,$coupon_redeemed_by)
    {

        $values = array(array(
                'coupon_code' => $coupon_code,
                'coupon_amount' => (float)$coupon_amount,
                'coupon_trans_id' => $coupon_trans_id,
                'coupon_payment_mode' => $coupon_payment_mode,
                'coupon_status' => $coupon_status,
                'coupon_date_added' => $coupon_date_added,
                'coupon_date_activated' => $coupon_date_activated,
                'coupon_user' => $coupon_user,
                'coupon_account'=>$coupon_account,
                'coupon_redeemed_by'=> $coupon_redeemed_by
            ));
        HDB::hus()->Hinsert($this->orange_credit_coupons_table, $values);
    }

    // UPDATE

    /**
     * @param $coupon_code
     * @param $coupon_amount
     * @param $coupon_trans_id
     * @param $coupon_payment_mode
     * @param $coupon_status
     * @param $coupon_date_added
     * @param $coupon_date_activated
     * @param $coupon_user
     * @param $id
     */
    public function Update($coupon_code, $coupon_amount, $coupon_trans_id, $coupon_payment_mode,
        $coupon_status, $coupon_date_added, $coupon_date_activated, $coupon_user,$coupon_account, $id)
    {
        $sql = "  coupon_code =:coupon_code,coupon_amount =:coupon_amount,coupon_trans_id =:coupon_trans_id,coupon_payment_mode =:coupon_payment_mode,coupon_status =:coupon_status,coupon_date_added =:coupon_date_added,coupon_date_activated =:coupon_date_activated,coupon_user =:coupon_user , coupon_account=:coupon_account WHERE id = :id ";
        $data = array(
            ':coupon_code' => $coupon_code,
            ':coupon_amount' => $coupon_amount,
            ':coupon_trans_id' => $coupon_trans_id,
            ':coupon_payment_mode' => $coupon_payment_mode,
            ':coupon_status' => $coupon_status,
            ':coupon_date_added' => $coupon_date_added,
            ':coupon_date_activated' => $coupon_date_activated,
            ':coupon_user' => $coupon_user,
            ':coupon_account' => $coupon_account,
            ':id' => $id);
        HDB::hus()->Hupdate($this->orange_credit_coupons_table, $sql, $data);

    }


} // end class




?>
	
	