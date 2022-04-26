
	<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_organisation_model
* DATE CREATED:  	15-04-2020
* FOR TABLE:  		orange_credit_organisation
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			Simillustra (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER .
    '/models/classes/class_orange_credit_organisation.php');

class orange_credit_organisation_model
{

    private $orange_credit_organisation_table = "orange_credit_organisation";
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
                return HDB::hus()->Hselect($this->orange_credit_organisation_table,
                    " `userid`=:user_id AND DATE(organisation_createdAt) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d') LIMIT {$startpg} , {$limit}",
                    $bind);
            } else {
                return HDB::hus()->Hselect($this->orange_credit_organisation_table,
                    " `userid`=:user_id  AND DATE(organisation_createdAt) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                    $bind);
            }
        } else {
            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credit_organisation_table . " LIMIT {$startpg} , {$limit}");
            } else {
                return HDB::hus()->Hselect($this->orange_credit_organisation_table);
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
            return HDB::hus()->Hcount($this->orange_credit_organisation_table,
                "userid=:user_id  AND DATE(organisation_createdAt) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                $bind);
        } else {
            return HDB::hus()->Hcount($this->orange_credit_organisation_table);
        }
    }
    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credit_organisation_table, "id=:id", $bind);
    }
    
    // Get List
    public function showList($userid)
    {
        $bind = array(":userid" => $userid);
        return HDB::hus()->Hselect($this->orange_credit_organisation_table,
            "`userid`=:userid AND `organisation_status`='APPROVED' OR `organisation_status`='PENDING' ", $bind);
    }


    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect($this->orange_credit_organisation_table, "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        $sql = HDB::hus()->prepare("TRUNCATE ".$this->orange_credit_organisation_table);
        $sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        $bind = array(":id" => $id);
        HDB::hus()->Hdelete($this->orange_credit_organisation_table, "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($organisation_name, $organisation_address, $organisation_phone,
        $organisation_email, $organisation_bank_name, $organisation_account_number, $organisation_status,
        $organisation_createdAt, $organisation_modifiedAt, $userid)
    {
        $newupload = new UploadControl;
        $uploadname = $newupload->ImageUplaodResize('organisation_logo',
            THUMB_IMAGE_WIDTH, BIG_IMAGE_WIDTH, UPLOAD_PATH, THUMB_PATH, 90);
        if ($uploadname == '') {
            $values = array(array(
                    'organisation_name' => $organisation_name,
                    'organisation_address' => $organisation_address,
                    'organisation_phone' => $organisation_phone,
                    'organisation_email' => $organisation_email,
                    'organisation_bank_name' => $organisation_bank_name,
                    'organisation_account_number' => $organisation_account_number,
                    'organisation_status' => $organisation_status,
                    'organisation_createdAt' => $organisation_createdAt,
                    'organisation_modifiedAt' => $organisation_modifiedAt,
                    'userid' => $userid));
        } else {
            $values = array(array(
                    'organisation_logo' => $uploadname,
                    'organisation_name' => $organisation_name,
                    'organisation_address' => $organisation_address,
                    'organisation_phone' => $organisation_phone,
                    'organisation_email' => $organisation_email,
                    'organisation_bank_name' => $organisation_bank_name,
                    'organisation_account_number' => $organisation_account_number,
                    'organisation_status' => $organisation_status,
                    'organisation_createdAt' => $organisation_createdAt,
                    'organisation_modifiedAt' => $organisation_modifiedAt,
                    'userid' => $userid));
        }
        HDB::hus()->Hinsert($this->orange_credit_organisation_table, $values);
    }

    // UPDATE
    public function Update($organisation_name, $organisation_address, $organisation_phone,
        $organisation_email, $organisation_bank_name, $organisation_account_number, $organisation_status,
        $organisation_createdAt, $organisation_modifiedAt, $userid, $id)
    {
        $newupload = new UploadControl;
        $uploadname = $newupload->ImageUplaodResize('organisation_logo',
            THUMB_IMAGE_WIDTH, BIG_IMAGE_WIDTH, UPLOAD_PATH, THUMB_PATH, 90);
        if ($uploadname == '') {
            $sql = "  organisation_name =:organisation_name,organisation_address =:organisation_address,organisation_phone =:organisation_phone,organisation_email =:organisation_email,organisation_bank_name =:organisation_bank_name,organisation_account_number =:organisation_account_number,organisation_status =:organisation_status,organisation_createdAt =:organisation_createdAt,organisation_modifiedAt =:organisation_modifiedAt,userid =:userid WHERE id = :id ";
            $data = array(
                ':organisation_name' => $organisation_name,
                ':organisation_address' => $organisation_address,
                ':organisation_phone' => $organisation_phone,
                ':organisation_email' => $organisation_email,
                ':organisation_bank_name' => $organisation_bank_name,
                ':organisation_account_number' => $organisation_account_number,
                ':organisation_status' => $organisation_status,
                ':organisation_createdAt' => $organisation_createdAt,
                ':organisation_modifiedAt' => $organisation_modifiedAt,
                ':userid' => $userid,
                ':id' => $id);
        } else {
            $sql = "  organisation_logo=:organisation_logo,organisation_name =:organisation_name,organisation_address =:organisation_address,organisation_phone =:organisation_phone,organisation_email =:organisation_email,organisation_bank_name =:organisation_bank_name,organisation_account_number =:organisation_account_number,organisation_status =:organisation_status,organisation_createdAt =:organisation_createdAt,organisation_modifiedAt =:organisation_modifiedAt,userid =:userid WHERE id = :id ";
            $data = array(
                ':organisation_logo' => $uploadname,
                ':organisation_name' => $organisation_name,
                ':organisation_address' => $organisation_address,
                ':organisation_phone' => $organisation_phone,
                ':organisation_email' => $organisation_email,
                ':organisation_bank_name' => $organisation_bank_name,
                ':organisation_account_number' => $organisation_account_number,
                ':organisation_status' => $organisation_status,
                ':organisation_createdAt' => $organisation_createdAt,
                ':organisation_modifiedAt' => $organisation_modifiedAt,
                ':userid' => $userid,
                ':id' => $id);
        }
        HDB::hus()->Hupdate($this->orange_credit_organisation_table, $sql, $data);

    }


} // end class


?>
	
	