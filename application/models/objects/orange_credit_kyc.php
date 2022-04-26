<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_kyc_model
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_kyc
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once(APP_FOLDER . '/models/classes/class_orange_credit_kyc.php');

class orange_credit_kyc_model
{
    private $orange_credit_kyc_table = "orange_credit_kyc";

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
                return HDB::hus()->Hselect($this->orange_credit_kyc_table,
                    " `userid`=:user_id AND DATE(date_created) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d') LIMIT {$startpg} , {$limit}",
                    $bind);
            } else {
                return HDB::hus()->Hselect($this->orange_credit_kyc_table,
                    " `userid`=:user_id  AND DATE(date_created) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                    $bind);
            }
        } else {
            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credit_kyc_table . " LIMIT {$startpg} , {$limit}");
            } else {
                return HDB::hus()->Hselect($this->orange_credit_kyc_table);
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
            return HDB::hus()->Hcount($this->orange_credit_kyc_table,
                "userid=:user_id  AND DATE(date_created) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                $bind);
        } else {
            return HDB::hus()->Hcount($this->orange_credit_kyc_table);
        }
    }


    public function getSelectAll($query, $limit = null)
    {
        if ($query['user_role'] == 5) {
            if ($limit) {
                $startpg = pageparam($limit);
                $sql = HDB::hus()->prepare("SELECT
                                          orange_credit_kyc.*,
                                          orange_credit_countries.`name` AS country,
                                          orange_credit_city.`name` AS city,
                                          orange_credit_regions.`name` AS state
                                        FROM
                                          orange_credit_kyc,
                                          orange_credit_countries,
                                          orange_credit_city,
                                          orange_credit_regions
                                        WHERE orange_credit_kyc.`customer_state` = orange_credit_regions.`id`
                                          AND orange_credit_kyc.`customer_city` = orange_credit_city.`id`
                                          AND orange_credit_kyc.`customer_country` = orange_credit_countries.`id` 
                                          AND orange_credit_kyc.`userid`=:user_id  
                                          AND DATE(orange_credit_kyc.date_created) 
                                          BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') 
                                          AND DATE_FORMAT(:range_limit, '%Y/%m/%d')
                                          LIMIT {$startpg} , {$limit}
                                          ");
                $sql->bindParam(':user_id', $query['user_id'], PDO::PARAM_INT);
                $sql->bindParam(':range_start', $query['range_start'], PDO::PARAM_STR);
                $sql->bindParam(':range_limit', $query['range_end'], PDO::PARAM_STR);
                $sql->execute();
                return $sql->fetchAll(PDO::FETCH_OBJ);
            } else {
                $sql = HDB::hus()->prepare("SELECT
                                          orange_credit_kyc.*,
                                          orange_credit_countries.`name` AS country,
                                          orange_credit_city.`name` AS city,
                                          orange_credit_regions.`name` AS state
                                        FROM
                                          orange_credit_kyc,
                                          orange_credit_countries,
                                          orange_credit_city,
                                          orange_credit_regions
                                        WHERE orange_credit_kyc.`customer_state` = orange_credit_regions.`id`
                                          AND orange_credit_kyc.`customer_city` = orange_credit_city.`id`
                                          AND orange_credit_kyc.`customer_country` = orange_credit_countries.`id` 
                                          AND orange_credit_kyc.`userid`=:user_id  
                                          AND DATE(orange_credit_kyc.date_created) 
                                          BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') 
                                          AND DATE_FORMAT(:range_limit, '%Y/%m/%d')
                                          ");
                $sql->bindParam(':user_id', $query['user_id'], PDO::PARAM_INT);
                $sql->bindParam(':range_start', $query['range_start'], PDO::PARAM_STR);
                $sql->bindParam(':range_limit', $query['range_end'], PDO::PARAM_STR);

                $sql->execute();
                return $sql->fetchAll(PDO::FETCH_OBJ);


            }
        } else {
            if ($limit) {
                $startpg = pageparam($limit);
                $sql = HDB::hus()->prepare("SELECT
                                          orange_credit_kyc.*,
                                          orange_credit_countries.`name` AS country,
                                          orange_credit_city.`name` AS city,
                                          orange_credit_regions.`name` AS state
                                        FROM
                                          orange_credit_kyc,
                                          orange_credit_countries,
                                          orange_credit_city,
                                          orange_credit_regions
                                        WHERE orange_credit_kyc.`customer_state` = orange_credit_regions.`id`
                                          AND orange_credit_kyc.`customer_city` = orange_credit_city.`id`
                                          AND orange_credit_kyc.`customer_country` = orange_credit_countries.`id`
                                          AND DATE(orange_credit_kyc.date_created) 
                                          BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') 
                                          AND DATE_FORMAT(:range_limit, '%Y/%m/%d')
                                          LIMIT {$startpg} , {$limit}
                                          ");
                $sql->bindParam(':range_start', $query['range_start'], PDO::PARAM_STR);
                $sql->bindParam(':range_limit', $query['range_end'], PDO::PARAM_STR);
                $sql->execute();
                return $sql->fetchAll(PDO::FETCH_OBJ);
            } else {
                $sql = HDB::hus()->prepare("SELECT
                                          orange_credit_kyc.*,
                                          orange_credit_countries.`name` AS country,
                                          orange_credit_city.`name` AS city,
                                          orange_credit_regions.`name` AS state
                                        FROM
                                          orange_credit_kyc,
                                          orange_credit_countries,
                                          orange_credit_city,
                                          orange_credit_regions
                                        WHERE orange_credit_kyc.`customer_state` = orange_credit_regions.`id`
                                          AND orange_credit_kyc.`customer_city` = orange_credit_city.`id`
                                          AND orange_credit_kyc.`customer_country` = orange_credit_countries.`id` 
                                          AND DATE(orange_credit_kyc.date_created) 
                                          BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') 
                                          AND DATE_FORMAT(:range_limit, '%Y/%m/%d')
                                          ");

                $sql->bindParam(':range_start', $query['range_start'], PDO::PARAM_STR);
                $sql->bindParam(':range_limit', $query['range_end'], PDO::PARAM_STR);

                $sql->execute();
                return $sql->fetchAll(PDO::FETCH_OBJ);
            }
        }
    }


    // SELECT ONE
    public function SelectOne($id)
    {
      $sql = HDB::hus()->prepare("SELECT
                                          orange_credit_kyc.*,
                                          orange_credit_countries.`name` AS country,
                                          orange_credit_city.`name` AS city,
                                          orange_credit_regions.`name` AS state
                                        FROM
                                          orange_credit_kyc,
                                          orange_credit_countries,
                                          orange_credit_city,
                                          orange_credit_regions
                                        WHERE orange_credit_kyc.`customer_state` = orange_credit_regions.`id`
                                          AND orange_credit_kyc.`customer_city` = orange_credit_city.`id`
                                          AND orange_credit_kyc.`customer_country` = orange_credit_countries.`id` 
                                          AND orange_credit_kyc.`id`=:id                                          
                                          ");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }

   // CHECK APPROVALS
    public function checkApprovedKYC($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credit_kyc_table, "userid=:id", $bind);
    }

    // SELECT FILES
    public function SelectAllFiles($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hselect("hfiles", "relateid=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect($this->orange_credit_kyc_table, "$where LIKE :svalue LIMIT $limit",
            $bind);
    }


    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
//        $sql = HDB::hus()->prepare("TRUNCATE " . $this->orange_credit_kyc_table);
//        $sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        //$bind = array(":id" => $id);
        // HDB::hus()->Hdelete($this->orange_credit_kyc_table, "id=:id", $bind);
        send_to($redirect_to);
    }

    // DELETE FILES
    public function DeleteFile($id)
    {
        //$bind = array(":id" => $id);
        //HDB::hus()->Hdelete("hfiles", "relateid=:id", $bind);

    }

    // DELETE ONE
    public function DeleteFileOne($id)
    {
        //$bind = array(":id" => $id);
        //HDB::hus()->Hdelete("hfiles", "fid=:id", $bind);

    }

    // INSERT
    public function Insert($customer_fullname, $customer_date_of_birth, $customer_gender,
                           $customer_identity_type, $customer_contact_address, $customer_country, $customer_state,
                           $customer_city, $customer_employment_status, $customer_occupation, $customer_monthly_income,
                           $customer_bvn_number, $customer_bank_name, $customer_bank_account, $customer_ec1_fullname,
                           $customer_ec1_phone, $customer_ec1_identity_type, $customer_ec1_id_number, $customer_ec2_fullname,
                           $customer_ec2_phone, $customer_ec2_identity_type, $customer_ec2_id_number, $kyc_updated,
                           $kyc_status, $date_created, $userid)
    {
        $newupload = new UploadControl();
        $customer_passport_photo = $newupload->ImageUplaodResize('customer_passport_photo',
            THUMB_IMAGE_WIDTH, BIG_IMAGE_WIDTH, UPLOAD_PATH, THUMB_PATH, 90);
        $customer_identity_card = $newupload->ImageUplaodResize('customer_identity_card',
            THUMB_IMAGE_WIDTH, BIG_IMAGE_WIDTH, UPLOAD_PATH, THUMB_PATH, 90);
        $customer_ec1_card = $newupload->ImageUplaodResize('customer_ec1_card',
            THUMB_IMAGE_WIDTH, BIG_IMAGE_WIDTH, UPLOAD_PATH, THUMB_PATH, 90);
        $customer_ec2_card= $newupload->ImageUplaodResize('customer_ec2_card',
            THUMB_IMAGE_WIDTH, BIG_IMAGE_WIDTH, UPLOAD_PATH, THUMB_PATH, 90);

        if ($customer_passport_photo == '') {
            $values = array(array(
                'customer_fullname' => $customer_fullname,
                'customer_date_of_birth' => $customer_date_of_birth,
                'customer_gender' => $customer_gender,
                'customer_identity_type' => $customer_identity_type,
                'customer_contact_address' => $customer_contact_address,
                'customer_country' => $customer_country,
                'customer_state' => $customer_state,
                'customer_city' => $customer_city,
                'customer_employment_status' => $customer_employment_status,
                'customer_occupation' => $customer_occupation,
                'customer_monthly_income' => $customer_monthly_income,
                'customer_bvn_number' => $customer_bvn_number,
                'customer_bank_name' => $customer_bank_name,
                'customer_bank_account' => $customer_bank_account,
                'customer_ec1_fullname' => $customer_ec1_fullname,
                'customer_ec1_phone' => $customer_ec1_phone,
                'customer_ec1_identity_type' => $customer_ec1_identity_type,
                'customer_ec1_id_number' => $customer_ec1_id_number,
                'customer_ec2_fullname' => $customer_ec2_fullname,
                'customer_ec2_phone' => $customer_ec2_phone,
                'customer_ec2_identity_type' => $customer_ec2_identity_type,
                'customer_ec2_id_number' => $customer_ec2_id_number,
                'kyc_updated' => $kyc_updated,
                'kyc_status' => $kyc_status,
                'date_created' => $date_created,
                'userid' => $userid));
        } else {
            $values = array(array(
                'customer_passport_photo' => $customer_passport_photo,
                'customer_identity_card' => $customer_identity_card,
                'customer_ec1_card' => $customer_ec1_card,
                'customer_ec2_card' => $customer_ec2_card,
                'customer_fullname' => $customer_fullname,
                'customer_date_of_birth' => $customer_date_of_birth,
                'customer_gender' => $customer_gender,
                'customer_identity_type' => $customer_identity_type,
                'customer_contact_address' => $customer_contact_address,
                'customer_country' => $customer_country,
                'customer_state' => $customer_state,
                'customer_city' => $customer_city,
                'customer_employment_status' => $customer_employment_status,
                'customer_occupation' => $customer_occupation,
                'customer_monthly_income' => $customer_monthly_income,
                'customer_bvn_number' => $customer_bvn_number,
                'customer_bank_name' => $customer_bank_name,
                'customer_bank_account' => $customer_bank_account,
                'customer_ec1_fullname' => $customer_ec1_fullname,
                'customer_ec1_phone' => $customer_ec1_phone,
                'customer_ec1_identity_type' => $customer_ec1_identity_type,
                'customer_ec1_id_number' => $customer_ec1_id_number,
                'customer_ec2_fullname' => $customer_ec2_fullname,
                'customer_ec2_phone' => $customer_ec2_phone,
                'customer_ec2_identity_type' => $customer_ec2_identity_type,
                'customer_ec2_id_number' => $customer_ec2_id_number,
                'kyc_updated' => $kyc_updated,
                'kyc_status' => $kyc_status,
                'date_created' => $date_created,
                'userid' => $userid));
        }
        HDB::hus()->Hinsert($this->orange_credit_kyc_table, $values);
    }

    // UPDATE
    public function Update($customer_fullname, $customer_date_of_birth, $customer_gender,
                           $customer_identity_type, $customer_contact_address, $customer_country, $customer_state,
                           $customer_city, $customer_employment_status, $customer_occupation, $customer_monthly_income,
                           $customer_bvn_number, $customer_bank_name, $customer_bank_account, $customer_ec1_fullname,
                           $customer_ec1_phone, $customer_ec1_identity_type, $customer_ec1_id_number, $customer_ec2_fullname,
                           $customer_ec2_phone, $customer_ec2_identity_type, $customer_ec2_id_number, $kyc_updated,
                           $kyc_status, $date_created, $userid, $id)
    {
        $newupload = new UploadControl();
        $customer_passport_photo = $newupload->ImageUplaodResize('customer_passport_photo',
            THUMB_IMAGE_WIDTH, BIG_IMAGE_WIDTH, UPLOAD_PATH, THUMB_PATH, 90);
        $customer_identity_card = $newupload->ImageUplaodResize('customer_identity_card',
            THUMB_IMAGE_WIDTH, BIG_IMAGE_WIDTH, UPLOAD_PATH, THUMB_PATH, 90);
        $customer_ec1_card = $newupload->ImageUplaodResize('customer_ec1_card',
            THUMB_IMAGE_WIDTH, BIG_IMAGE_WIDTH, UPLOAD_PATH, THUMB_PATH, 90);
        $customer_ec2_card= $newupload->ImageUplaodResize('customer_ec2_card',
            THUMB_IMAGE_WIDTH, BIG_IMAGE_WIDTH, UPLOAD_PATH, THUMB_PATH, 90);

        if ($customer_passport_photo == '') {
            $sql = "  customer_fullname =:customer_fullname,customer_date_of_birth =:customer_date_of_birth,customer_gender =:customer_gender,customer_identity_type =:customer_identity_type,customer_contact_address =:customer_contact_address,customer_country=:customer_country,customer_state=:customer_state,customer_city=:customer_city,customer_employment_status =:customer_employment_status,customer_occupation =:customer_occupation,customer_monthly_income =:customer_monthly_income,customer_bvn_number =:customer_bvn_number,customer_bank_name =:customer_bank_name,customer_bank_account =:customer_bank_account,customer_ec1_fullname =:customer_ec1_fullname,customer_ec1_phone =:customer_ec1_phone,customer_ec1_identity_type =:customer_ec1_identity_type,customer_ec1_id_number =:customer_ec1_id_number,customer_ec2_fullname =:customer_ec2_fullname,customer_ec2_phone =:customer_ec2_phone,customer_ec2_identity_type =:customer_ec2_identity_type,customer_ec2_id_number =:customer_ec2_id_number,kyc_updated =:kyc_updated,kyc_status =:kyc_status,date_created =:date_created,userid =:userid WHERE id = :id ";
            $data = array(
                ':customer_fullname' => $customer_fullname,
                ':customer_date_of_birth' => $customer_date_of_birth,
                ':customer_gender' => $customer_gender,
                ':customer_identity_type' => $customer_identity_type,
                ':customer_contact_address' => $customer_contact_address,
                ':customer_country' => $customer_country,
                ':customer_state' => $customer_state,
                ':customer_city' => $customer_city,
                ':customer_employment_status' => $customer_employment_status,
                ':customer_occupation' => $customer_occupation,
                ':customer_monthly_income' => $customer_monthly_income,
                ':customer_bvn_number' => $customer_bvn_number,
                ':customer_bank_name' => $customer_bank_name,
                ':customer_bank_account' => $customer_bank_account,
                ':customer_ec1_fullname' => $customer_ec1_fullname,
                ':customer_ec1_phone' => $customer_ec1_phone,
                ':customer_ec1_identity_type' => $customer_ec1_identity_type,
                ':customer_ec1_id_number' => $customer_ec1_id_number,
                ':customer_ec2_fullname' => $customer_ec2_fullname,
                ':customer_ec2_phone' => $customer_ec2_phone,
                ':customer_ec2_identity_type' => $customer_ec2_identity_type,
                ':customer_ec2_id_number' => $customer_ec2_id_number,
                ':kyc_updated' => $kyc_updated,
                ':kyc_status' => $kyc_status,
                ':date_created' => $date_created,
                ':userid' => $userid,
                ':id' => $id);
        } else {
            $sql = "  customer_passport_photo=:customer_passport_photo,
                        customer_identity_card=:customer_identity_card,
                        customer_ec1_card=:customer_ec1_card,
                        customer_ec2_card=:customer_ec2_card,
                        customer_fullname =:customer_fullname,
                        customer_date_of_birth =:customer_date_of_birth,customer_gender =:customer_gender,customer_identity_type =:customer_identity_type,customer_contact_address =:customer_contact_address,customer_country=:customer_country,customer_state=:customer_state,customer_city=:customer_city,customer_employment_status =:customer_employment_status,customer_occupation =:customer_occupation,customer_monthly_income =:customer_monthly_income,customer_bvn_number =:customer_bvn_number,customer_bank_name =:customer_bank_name,customer_bank_account =:customer_bank_account,customer_ec1_fullname =:customer_ec1_fullname,customer_ec1_phone =:customer_ec1_phone,customer_ec1_identity_type =:customer_ec1_identity_type,customer_ec1_id_number =:customer_ec1_id_number,customer_ec2_fullname =:customer_ec2_fullname,customer_ec2_phone =:customer_ec2_phone,customer_ec2_identity_type =:customer_ec2_identity_type,customer_ec2_id_number =:customer_ec2_id_number,kyc_updated =:kyc_updated,kyc_status =:kyc_status,date_created =:date_created,userid =:userid WHERE id = :id ";
            $data = array(
                ':customer_passport_photo' => $customer_passport_photo,
                ':customer_identity_card' => $customer_identity_card,
                ':customer_ec1_card' => $customer_ec1_card,
                ':customer_ec2_card' => $customer_ec2_card,
                ':customer_fullname' => $customer_fullname,
                ':customer_date_of_birth' => $customer_date_of_birth,
                ':customer_gender' => $customer_gender,
                ':customer_identity_type' => $customer_identity_type,
                ':customer_contact_address' => $customer_contact_address,
                ':customer_country' => $customer_country,
                ':customer_state' => $customer_state,
                ':customer_city' => $customer_city,
                ':customer_employment_status' => $customer_employment_status,
                ':customer_occupation' => $customer_occupation,
                ':customer_monthly_income' => $customer_monthly_income,
                ':customer_bvn_number' => $customer_bvn_number,
                ':customer_bank_name' => $customer_bank_name,
                ':customer_bank_account' => $customer_bank_account,
                ':customer_ec1_fullname' => $customer_ec1_fullname,
                ':customer_ec1_phone' => $customer_ec1_phone,
                ':customer_ec1_identity_type' => $customer_ec1_identity_type,
                ':customer_ec1_id_number' => $customer_ec1_id_number,
                ':customer_ec2_fullname' => $customer_ec2_fullname,
                ':customer_ec2_phone' => $customer_ec2_phone,
                ':customer_ec2_identity_type' => $customer_ec2_identity_type,
                ':customer_ec2_id_number' => $customer_ec2_id_number,
                ':kyc_updated' => $kyc_updated,
                ':kyc_status' => $kyc_status,
                ':date_created' => $date_created,
                ':userid' => $userid,
                ':id' => $id);
        }
        HDB::hus()->Hupdate($this->orange_credit_kyc_table, $sql, $data);

    }

} // end class


?>
	
	