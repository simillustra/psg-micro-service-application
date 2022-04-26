
	<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_messages_model
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_messages
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER . '/models/classes/class_orange_credit_messages.php');

class orange_credit_messages_model
{

    // SELECT ALL
    public function SelectAll($limit = null)
    {
        if ($limit) {
            $startpg = pageparam($limit);
            return HDB::hus()->Hselect("orange_credit_messages LIMIT {$startpg} , {$limit}");
        } else {
            return HDB::hus()->Hselect("orange_credit_messages");
        }
    }

    //Select Count for Pagination
    public function CountRow()
    {
        return HDB::hus()->Hcount("orange_credit_messages");
    }

    // SELECT FILES
    public function SelectAllFiles($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hselect("hfiles", "relateid=:id", $bind);
    }

    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone("orange_credit_messages", "id=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect("orange_credit_messages", "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        $sql = HDB::hus()->prepare("TRUNCATE orange_credit_messages");
        $sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        $bind = array(":id" => $id);
        HDB::hus()->Hdelete("orange_credit_messages", "id=:id", $bind);
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
    public function Insert($user_to, $user_from, $subject, $message, $respond, $sender_open,
        $receiver_open, $sender_delete, $receiver_delete)
    {
        $values = array(array(
                'user_to' => $user_to,
                'user_from' => $user_from,
                'subject' => $subject,
                'message' => $message,
                'respond' => $respond,
                'sender_open' => $sender_open,
                'receiver_open' => $receiver_open,
                'sender_delete' => $sender_delete,
                'receiver_delete' => $receiver_delete));
        HDB::hus()->Hinsert('orange_credit_messages', $values);
        if (HDB::hus()->lastInsertId()) {
            $newupload = new UploadControl;
            $uploadname = $newupload->MultiImageUplaodResize(HDB::hus()->lastInsertId(),
                THUMB_IMAGE_WIDTH, BIG_IMAGE_WIDTH, UPLOAD_PATH, THUMB_PATH, 90);
        }
    }

    // UPDATE
    public function Update($user_to, $user_from, $subject, $message, $respond, $sender_open,
        $receiver_open, $sender_delete, $receiver_delete, $id)
    {
        $sql = "  user_to =:user_to,user_from =:user_from,subject =:subject,message =:message,respond =:respond,sender_open =:sender_open,receiver_open =:receiver_open,sender_delete =:sender_delete,receiver_delete =:receiver_delete WHERE id = :id ";
        $data = array(
            ':user_to' => $user_to,
            ':user_from' => $user_from,
            ':subject' => $subject,
            ':message' => $message,
            ':respond' => $respond,
            ':sender_open' => $sender_open,
            ':receiver_open' => $receiver_open,
            ':sender_delete' => $sender_delete,
            ':receiver_delete' => $receiver_delete,
            ':id' => $id);
        HDB::hus()->Hupdate('orange_credit_messages', $sql, $data);
        $newupload = new UploadControl;
        $uploadname = $newupload->MultiImageUplaodResize(post('id'), THUMB_IMAGE_WIDTH,
            BIG_IMAGE_WIDTH, UPLOAD_PATH, THUMB_PATH, 90);

    }


} // end class


?>
	
	