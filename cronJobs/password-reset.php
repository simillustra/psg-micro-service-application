<?php
require '../config/config.php';
require '../vendor/autoload.php';

use AfricasTalking\SDK\AfricasTalking;

// Initialize the SDK
$INIT_A_TALKING = new AfricasTalking(AFRICAN_TALKING_USERNAME, AFRICAN_TALKING_API_KEY);
//$INIT_A_TALKING = new AfricasTalking('sandbox', 'b469d68907e7a7b9dd5a099e4373088e82eae6a622dc7c4d96f4c804a8a7d0b8');

// Get the SMS service
$DO_SMS = $INIT_A_TALKING->sms();

function do_sms_update($password, $account_id)
{
    try {
        $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
            DB_USERNAME, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $db->prepare("UPDATE `system_users` SET `password`=:password WHERE `userid`=:id");

        $sql->bindParam(':password', $password, PDO::PARAM_STR);
        $sql->bindParam(':id', $account_id, PDO::PARAM_INT);
        $sql->execute();
        $sql = null; // doing this is mandatory for connection to get closed
        $db = null;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function random_str($type = 'alphanum', $length = 8)
{
    switch ($type) {
        case 'basic':
            return mt_rand();
            break;
        case 'alpha':
        case 'alphanum':
        case 'num':
        case 'nozero':
            $seedings = array();
            $seedings['alpha'] = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $seedings['alphanum'] =
                '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $seedings['num'] = '0123456789';
            $seedings['nozero'] = '123456789';

            $pool = $seedings[$type];

            $str = '';
            for ($i = 0; $i < $length; $i++) {
                $str .= substr($pool, mt_rand(0, strlen($pool) - 1), 1);
            }
            return $str;
            break;
        case 'unique':
        case 'md5':
            return md5(uniqid(mt_rand()));
            break;
    }
}


$db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
    DB_USERNAME, DB_PASSWORD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$bulk_sms_list = array();

$sql = $db->query("SELECT `userid`,`first_name`, `last_name`, `phone` FROM `system_users`");

// push them into bulk array
if ($sql->rowCount() > 0) {
    $response = $sql->fetchAll(PDO::FETCH_OBJ);
    foreach ($response as $value) {


        $password = 'newPaswordOne'; //random_str('alphanum', 8);
        $pepper = ORANGE_CREDIT_PASSWORD_HASH;
        $pwd_peppered = hash_hmac("sha256", $password, $pepper);
        $pwd_hashed = password_hash($pwd_peppered, PASSWORD_DEFAULT);

        do_sms_update($pwd_hashed, $value->userid);

        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Dear {$value->first_name} {$value->last_name}, Congratulations! Your wallet have been activated with ORANGE-CREDIT.\r\n";
        $sms_message .= "Acc No: {$value->phone}"."\r\n";
        $sms_message .= "Pw: " . $password ."\r\n";


        $sms = array(
            'to' => '+' . $value->phone,
            'username' => AFRICAN_TALKING_USERNAME, //"sandbox", //
            'message' => $sms_message,
            'id' => $value->userid
        );
        array_push($bulk_sms_list, $sms);
    }
}
$sql = null; // doing this is mandatory for connection to get closed
$db = null;

// Send SMS Service
foreach ($bulk_sms_list as $sms_value) {
    // Use the service
//    $result = $DO_SMS->send($sms_value);
//
//    $response = json_decode(json_encode($result));
//
//    if ($response->data->SMSMessageData->Recipients[0]->statusCode === 101) {
////        do_sms_update($sms_value['to'], $sms_value['id']);
//        echo 'sent to'.$sms_value['to'] .' '. $sms_value['id'];
//    }

}


//$str = json_encode($bulk_sms_list);
//echo $str;