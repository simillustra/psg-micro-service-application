<?php

//if (!defined('VALID_DIR'))
// die('You are not allowed to execute this file directly');
/**
 * @author gencyolcu
 * @copyright 2017
 */
include('../config/config.php');
//include('./functions.php');

if (isset($_REQUEST["do"]) && isset($_REQUEST["key"])) {

    $action = $_REQUEST['do'];
    $id = isset($_REQUEST['key']);
    $tid = isset($_REQUEST['key2']);


    switch ($action) {

        case 'AssetPayBizPlan':

            try {
                // Decode JSON data to PHP object
                $obj = json_decode($_REQUEST['key']);
                $transaction_id = $obj->tid;
                $transaction_ref = $obj->trans_ref;
                $transaction_amount = $obj->amount;
                $transaction_desc = $obj->desc;
                $transaction_provider = $obj->provider;
                $transaction_status = 'PROCESSING';
                $transaction_date = date('Y-m-d');
                $transaction_user = $obj->user;
                $transaction_fullname = $obj->fullname;
                $transaction_user_account = $obj->account;

                $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
                    DB_USERNAME, DB_PASSWORD);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO `orange_credit_payments`(transaction_id,transaction_ref,transaction_amount,transaction_desc,transaction_provider,transaction_status,transaction_date,transaction_user) VALUES (?,?,?,?,?,?,?,?)";
                $stmt = $db->prepare($sql);
                $stmt->execute([$transaction_id, $transaction_ref, $transaction_amount, $transaction_desc,
                    $transaction_provider, $transaction_status, $transaction_date, $transaction_user]);

                if ($stmt->rowCount() > 0) {
                    //generate business coupon for business plan

                    $coupon_code = strtoupper(random_str('alphanum', 10));
                    $coupon_amount = $transaction_amount;
                    $coupon_trans_id = $transaction_id;
                    $coupon_payment_mode = 'ONLINE PAYMENT WITH ' . $transaction_provider;
                    $coupon_status = 'PROCESSING';
                    $coupon_date_added = date('Y-m-d');
                    $coupon_date_activated = date('Y-m-d');
                    $coupon_user = 1;
                    $coupon_account = ADMIN_ACCOUNT_NUMBER;
                    $redeemed_by = 0;

                    $sql2 = "INSERT INTO `orange_credit_coupons`(coupon_code,coupon_amount,coupon_trans_id,coupon_payment_mode,coupon_status,coupon_date_added,coupon_date_activated,coupon_user,coupon_account,coupon_redeemed_by) VALUES (?,?,?,?,?,?,?,?,?,?)";
                    $stmt2 = $db->prepare($sql2);
                    $stmt2->execute([$coupon_code, $coupon_amount, $coupon_trans_id, $coupon_payment_mode,
                        $coupon_status, $coupon_date_added, $coupon_date_activated, $coupon_user, $coupon_account, $redeemed_by]);

                    if ($stmt2->rowCount() > 0) {

                        //Notification
                        $arr = array(
                            'id' => (int)$transaction_user_account,
                            'fullname' => $transaction_fullname,
                            'coupon_code' => $coupon_code,
                            'amount' => $coupon_amount,
                            'subject' => "Coupon Code",
                            'date' => date("Y-m-d H:i:s"),
                            'type' => "sms");
                        $senderParams = json_encode($arr);

                        schedule_notification($senderParams);

                        $payment_response = array(
                            "message" => "Thank you for paying for your funding your account. your coupon code has been sent to your email and phone number. use it to complete your fund your account",
                            "status" => "success",
                            "title" => "Transaction successful");

                        echo json_encode($payment_response);

                    }
                } else {
                    $error_info = array(
                        "message" => "An Error occured while processing payment!",
                        "title" => "error"
                    );
                    echo json_encode($error_info);;
                }

                $sql = null; // doing this is mandatory for connection to get closed
                $db = null;
            } catch (PDOException $ex) {

                $error_info = array(
                    "message" => "An Error occurred!",
                    "title" => "error",
                    "payload" => $ex->getMessage());
                echo json_encode($error_info);;
            }
            break;

        case 'AssetGroupList':

            try {
                $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
                    DB_USERNAME, DB_PASSWORD);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $db->query("SELECT `id`,`asset_type_name`, `asset_depreciation`, `asset_group` FROM `add_asset_type` WHERE `asset_group`={$id}");

                // Display city dropdown based on country name
                if ($sql->rowCount() > 0) {
                    $response = $sql->fetchAll(PDO::FETCH_OBJ);
                    echo '<option value="NOCATEGORY" selected="selected">SELECT ASSET CLASS</option>';
                    foreach ($response as $value) {
                        echo '<option value="' . $value->id . '" data="' . $value->asset_depreciation .
                            '" groupid="' . $value->asset_group . '">' . $value->asset_type_name .
                            "</option>";
                    }
                    //echo '</select>';
                }

                $sql = null; // doing this is mandatory for connection to get closed
                $db = null;
            } catch (PDOException $ex) {
                echo "An Error occured!"; //user friendly message
                echo $ex->getMessage();
            }
            break;
        case 'AssetClassList':

            try {
                $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
                    DB_USERNAME, DB_PASSWORD);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $db->query("SELECT `id`,`asset_class_name`, `lifespan` FROM `add_asset_class` WHERE `asset_group`={$id} AND `asset_type`={$tid}");

                // Display city dropdown based on country name
                if ($sql->rowCount() > 0) {
                    $response = $sql->fetchAll(PDO::FETCH_OBJ);
                    echo '<option value="NOCLASS" selected="selected">SELECT ASSET CATEGORY</option>';
                    foreach ($response as $value) {
                        echo '<option value="' . $value->id . '" data="' . $value->asset_class_name .
                            '" lifespan="' . $value->lifespan . '">' . $value->asset_class_name .
                            "</option>";
                    }
                    //echo '</select>';
                }

                $sql = null; // doing this is mandatory for connection to get closed
                $db = null;
            } catch (PDOException $ex) {
                echo "An Error occured!"; //user friendly message
                echo $ex->getMessage();
            }
            break;
        case 'AccessControlList':

            if ($id == 3) {
                try {
                    $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
                        DB_USERNAME, DB_PASSWORD);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = $db->query("SELECT `ministry_name`, `ministry_code` FROM `add_ministry`");

                    // Display city dropdown based on country name
                    if ($sql->rowCount() > 0) {
                        $response = $sql->fetchAll(PDO::FETCH_OBJ);
                        echo '<option value="">SELECT MINISTRY</option>';
                        foreach ($response as $value) {
                            echo '<option value="' . $value->ministry_code . '" data="ministry">' . $value->
                                ministry_name . "</option>";
                        }
                        //echo '</select>';
                    }

                    $sql = null; // doing this is mandatory for connection to get closed
                    $db = null;
                } catch (PDOException $ex) {
                    echo "An Error occured!"; //user friendly message
                    echo $ex->getMessage();
                }

            } elseif ($id == 4) {
                try {
                    $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
                        DB_USERNAME, DB_PASSWORD);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = $db->query("SELECT `department_code`, `department_name` FROM `add_department`");

                    // Display city dropdown based on country name
                    if ($sql->rowCount() > 0) {
                        $response = $sql->fetchAll(PDO::FETCH_OBJ);
                        echo '<option value="">SELECT DEPARTMENT</option>';
                        foreach ($response as $value) {
                            echo '<option value="' . $value->department_code . '" data="department">' . $value->
                                department_name . "</option>";
                        }
                        //echo '</select>';
                    }

                    $sql = null; // doing this is mandatory for connection to get closed
                    $db = null;
                } catch (PDOException $ex) {
                    echo "An Error occured!"; //user friendly message
                    echo $ex->getMessage();
                }

            } elseif ($id == 5) {
                try {
                    $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
                        DB_USERNAME, DB_PASSWORD);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = $db->query("SELECT `id`,`ministry_name`, `ministry_code` FROM `add_ministry`");

                    // Display city dropdown based on country name
                    if ($sql->rowCount() > 0) {
                        $response = $sql->fetchAll(PDO::FETCH_OBJ);
                        echo '<option value="">SELECT MINISTRY AGENCY</option>';
                        foreach ($response as $value) {
                            echo '<option value="' . $value->ministry_code . '"data="' . $value->id . '">' .
                                $value->ministry_name . "</option>";
                        }
                        //echo '</select>';
                    }

                    $sql = null; // doing this is mandatory for connection to get closed
                    $db = null;
                } catch (PDOException $ex) {
                    echo "An Error occured!"; //user friendly message
                    echo $ex->getMessage();
                }


            }

            break;

        case 'AccessReportsTo':

            try {
                $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
                    DB_USERNAME, DB_PASSWORD);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $db->query("SELECT `ministry_id`,`agency_name`, `agency_code` FROM `add_agency` WHERE `ministry_id`={$id}");

                // Display city dropdown based on country name
                if ($sql->rowCount() > 0) {
                    $response = $sql->fetchAll(PDO::FETCH_OBJ);
                    echo '<option value="">SELECT MINISTRY AGENCY</option>';
                    foreach ($response as $value) {
                        echo '<option value="' . $value->agency_code . '"data="' . $value->ministry_id .
                            '">' . $value->agency_name . "</option>";
                    }
                    //echo '</select>';
                }

                $sql = null; // doing this is mandatory for connection to get closed
                $db = null;
            } catch (PDOException $ex) {
                echo "An Error occured!"; //user friendly message
                echo $ex->getMessage();
            }


            break;
        case 'AccessLoadStates':

            try {
                $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
                    DB_USERNAME, DB_PASSWORD);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $country_id = isset($_REQUEST['key']) ? $_REQUEST['key'] : 0;
                $stmt = $db->prepare("SELECT * FROM `orange_credit_regions` WHERE `country_id` = :country_id");
                $stmt->bindParam(':country_id', $country_id, PDO::PARAM_INT);
                $stmt->execute();
                $response = $stmt->fetchAll(PDO::FETCH_OBJ);
                // Display city dropdown based on country name
                if ($stmt->rowCount() > 0) {

                    echo '<option value="">SELECT STATES/REGION</option>';
                    foreach ($response as $value) {
                        echo '<option value="' . $value->id . '"data-country="' . $value->country_id .
                            '">' . $value->name . "</option>";
                    }

                } else {
                    echo '<option value="">MICRO LENDING APPLICATION ONLY SUPPORT NIGERIA REGIONS/STATES</option>';
                }

                $sql = null; // doing this is mandatory for connection to get closed
                $db = null;
            } catch (PDOException $ex) {
                echo "An Error occured!"; //user friendly message
                echo $ex->getMessage();
            }


            break;

        case 'AccessLoadCities':
            $id = isset($_REQUEST['key']) ? $_REQUEST['key'] : 0;
            $cid = isset($_REQUEST['cid']) ? $_REQUEST['cid'] : 0;

            try {
                $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
                    DB_USERNAME, DB_PASSWORD);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $db->query("SELECT * FROM `orange_credit_city` WHERE `region_id`={$id} AND `country_id`={$cid}");

                // Display city drop-down based on country name
                if ($sql->rowCount() > 0) {
                    $response = $sql->fetchAll(PDO::FETCH_OBJ);
                    echo '<option value="">SELECT CITIES</option>';
                    foreach ($response as $value) {
                        echo '<option value="' . $value->id . '"data-state="' . $value->region_id .
                            '" data-country="' . $value->country_id . '">' . $value->name . "</option>";
                    }
                    //echo '</select>';
                }

                $sql = null; // doing this is mandatory for connection to get closed
                $db = null;
            } catch (PDOException $ex) {
                echo "An Error occured!"; //user friendly message
                echo $ex->getMessage();
            }


            break;
        case 'AccessLoadCheckedZones':
            $id = isset($_REQUEST['key']) ? $_REQUEST['key'] : 0;
            $cid = isset($_REQUEST['cid']) ? $_REQUEST['cid'] : 0;

            try {
                $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
                    DB_USERNAME, DB_PASSWORD);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $db->query("SELECT * FROM `orange_credit_city` WHERE `region_id`={$id} AND `country_id`={$cid}");

                // Display city drop-down based on country name
                if ($sql->rowCount() > 0) {
                    $response = $sql->fetchAll(PDO::FETCH_OBJ);
                    echo '<option value="">SELECT CITIES</option>';
                    foreach ($response as $value) {
                        echo '<option value="' . $value->id . '"data="' . $value->region_id . '">' . $value->
                            name . "</option>";
                    }
                    //echo '</select>';
                }

                $sql = null; // doing this is mandatory for connection to get closed
                $db = null;
            } catch (PDOException $ex) {
                echo "An Error occured!"; //user friendly message
                echo $ex->getMessage();
            }


            break;
        case 'AccessLoadBranches':
            //$cid = $_REQUEST['cid'];

            try {
                $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
                    DB_USERNAME, DB_PASSWORD);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $db->query("SELECT `id`, `branch_name` FROM `mt_banks_branch` WHERE `bank_id`={$id}");

                // Display city drop-down based on country name
                if ($sql->rowCount() > 0) {
                    $response = $sql->fetchAll(PDO::FETCH_OBJ);
                    echo '<option value="">SELECT BRANCH</option>';
                    foreach ($response as $value) {
                        echo '<option value="' . $value->id . '">' . $value->branch_name . "</option>";
                    }
                    //echo '</select>';
                }

                $sql = null; // doing this is mandatory for connection to get closed
                $db = null;
            } catch (PDOException $ex) {
                echo "An Error occured!"; //user friendly message
                echo $ex->getMessage();
            }


            break;

        case 'AccessFundingAccount':
//            $bid = filter_var(trim($_REQUEST['key']), FILTER_SANITIZE_NUMBER_INT);
            $acct = filter_var(trim($_REQUEST['acct']), FILTER_SANITIZE_STRING);


            try {
                $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
                    DB_USERNAME, DB_PASSWORD);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $db->prepare("SELECT `userid`,`phone`, `first_name`, `middle_name`, `last_name`  FROM `system_users` 
                                    WHERE `phone`=:account_no AND `user_status`=1");


                $sql->bindParam(':account_no', $acct, PDO::PARAM_STR);
                $sql->execute();
                $response = $sql->fetch(PDO::FETCH_ASSOC);
                // Display city drop-down based on country name
                if ($sql->rowCount() > 0) {
                    //$response = $sql->fetchAll(PDO::FETCH_OBJ);

                    echo json_encode(array(
                        "message" => "This account is available.",
                        "id" => $response['userid'],
                        "account_number" => $response['phone'],
                        "first_name" => $response['first_name'],
                        "middle_name" => $response['middle_name'],
                        "last_name" => $response['last_name']));
                } else {
                    echo json_encode(array("message" => "Invalid beneficiary, This account is not found.",
                        "account_number" => $acct,
                        "first_name" => 'Account',
                        "middle_name" => 'Name',
                        "last_name" => 'Unknown',
                        "id" => 'Unknown'));
                }

                $sql = null; // doing this is mandatory for connection to get closed
                $db = null;
            } catch (PDOException $ex) {
                echo json_encode(array("message" => "An Error occurred while processing beneficiary Account Name!",
                    "account_number" => $acct,
                    "first_name" => null,
                    "middle_name" => null,
                    "last_name" => null,
                    "id" => null,
                    "error" => $ex->getMessage()
                ));
            }


            break;

        case 'VerifyPaymentToken':
            $bid = filter_var(trim($_REQUEST['key']), FILTER_SANITIZE_NUMBER_INT);
            $acct = filter_var(trim($_REQUEST['coupon_code']), FILTER_SANITIZE_STRING);


            try {
                $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
                    DB_USERNAME, DB_PASSWORD);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $db->prepare("SELECT `coupon_code`, `coupon_amount`, `coupon_payment_mode`, `coupon_user`, `coupon_account`  FROM `orange_credit_coupons` 
                                    WHERE `coupon_code`=:coupon_code
                                    AND `coupon_status`='PROCESSING'
                                    AND `coupon_redeemed_by`=0");


                $sql->bindParam(':coupon_code', $acct, PDO::PARAM_STR);
                $sql->execute();
                $response = $sql->fetch(PDO::FETCH_ASSOC);
                // Display city drop-down based on country name
                if ($sql->rowCount() > 0) {
                    //$response = $sql->fetchAll(PDO::FETCH_OBJ);

                    echo json_encode(array(
                        "message" => "This coupon code is available for usage.",
                        "coupon_code" => $response['coupon_code'],
                        "coupon_amount" => $response['coupon_amount'],
                        "coupon_desc" => $response['coupon_payment_mode'],
                        "coupon_user" => $response['coupon_user'],
                        "coupon_account" => $response['coupon_account']
                    ));
                } else {
                    echo json_encode(array("message" =>
                        "This coupon code is not found or Invalid or may have exhausted its usage, please contact coupon owner.",
                        "coupon_code" => $acct,
                        "coupon_amount" => null,
                        "coupon_desc" => null,
                        "coupon_user" => null,
                        "coupon_account" => null
                    ));
                }

                $sql = null; // doing this is mandatory for connection to get closed
                $db = null;
            } catch (PDOException $ex) {
                echo json_encode(array("message" =>
                    "An Error occurred while processing coupon!",
                    "coupon_code" => $acct,
                    "coupon_amount" => null,
                    "coupon_desc" => null,
                    "coupon_user" => null,
                    "coupon_account" => null,
                    "error" => $ex->getMessage()
                ));
            }

            break;
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

function schedule_notification($params)
{
    try {
        $captionInput = json_decode($params);

        $sms_message = "ORANGE-CREDIT SUPPORT\r\n";
        $sms_message .= "Txn: coupon \r\n";
        $sms_message .= "Coupon Code: " . $captionInput->coupon_code . "\r\n";
        $sms_message .= "Coupon Amount: " . $captionInput->amount . "\r\n";
        $sms_message .= "Date: " . $captionInput->date . "\r\n";


        $email_message = "Hello " . $captionInput->fullname . "\r\n";
        $email_message .= "Txn: coupon \r\n";
        $email_message .= "Coupon Code: " . $captionInput->coupon_code . "\r\n";
        $email_message .= "Coupon Amount: " . $captionInput->amount . "\r\n";
        $email_message .= "Date: " . $captionInput->date . "\r\n";


        $status = "unsent";
        $date = date("Y-m-d H:i:s");

        $db = new PDO("" . DB_TYPE . ":host=" . LOCALHOST . ";dbname=" . DB_NAME . "",
            DB_USERNAME, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO `orange_credit_notifications`(reciever,subject,type,sms_message,email_message,status,emailsent,date) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$captionInput->id, $captionInput->subject, $captionInput->type, $sms_message,
            $email_message, $status, 1, $date]);
        if ($stmt->rowCount() > 0) {
            return;
        }

        $sql = null; // doing this is mandatory for connection to get closed
        $db = null;

    } catch (PDOException $ex) {
        return;
    }
}

?>