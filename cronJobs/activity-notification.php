<?php
$base = str_replace('cronJobs', '', dirname(__DIR__) . DIRECTORY_SEPARATOR);
require_once $base . '/config/config.php';
require_once $base . '/vendor/autoload.php';

use AfricasTalking\SDK\AfricasTalking;

// Initialize the SDK
$INIT_A_TALKING = new AfricasTalking(AFRICAN_TALKING_USERNAME, AFRICAN_TALKING_API_KEY);
$application = $INIT_A_TALKING->application();
$GET_BALANCE = $application->fetchApplicationData();
$show_response = $GET_BALANCE;
$balance = $show_response['data']->UserData->balance;
$isBalance = explode(' ', $balance);
if ((float)$isBalance[1] > 100) {


//$isOk = fix_payment_routine($show_response);


//$INIT_A_TALKING = new AfricasTalking('sandbox', 'b469d68907e7a7b9dd5a099e4373088e82eae6a622dc7c4d96f4c804a8a7d0b8');

// Get the SMS service
    $DO_SMS = $INIT_A_TALKING->sms();


    function do_sms_update($account, $account_id)
    {
        try {
            $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
                DB_USERNAME, DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $db->prepare("UPDATE `orange_credit_notifications` SET `status`='sent' WHERE `reciever`=:reciever AND `id`=:id");

            $sql->bindParam(':reciever', $account, PDO::PARAM_INT);
            $sql->bindParam(':id', $account_id, PDO::PARAM_INT);
            $sql->execute();
            $sql = null; // doing this is mandatory for connection to get closed
            $db = null;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
        DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $bulk_sms_list = array();

    $sql = $db->query("SELECT * FROM `orange_credit_notifications` WHERE `type`='sms' AND `status`='unsent' LIMIT 0 , 20");

// push them into bulk array
    if ($sql->rowCount() > 0) {
        $response = $sql->fetchAll(PDO::FETCH_OBJ);
        foreach ($response as $value) {

            $sms = array(
                'to' => '+' . str_ireplace('+', '', $value->reciever),
                'username' => AFRICAN_TALKING_USERNAME, //"sandbox", //
                'message' => $value->sms_message,
                'id' => $value->id
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
//        do_sms_update($sms_value['to'], $sms_value['id']);
//echo $base;
    }
}
echo $base . 'vendor/autoload.php';


