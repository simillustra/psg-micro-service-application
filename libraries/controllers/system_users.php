<?php

/**
 * Author: SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
 * COPYRIGHT 2014 ALL RIGHTS RESERVED
 */

if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

if (get('view') == 'hsys_users') {
    //Select
    if (get('do') == 'viewall') {
        if ($haccess->UserAccess()->user_position == 1) {
            $result = $haccess->SelectAll(RECORD_PER_PAGE);
            $paging = pagination($haccess->CountRow(), RECORD_PER_PAGE, '' . H_ADMIN .
                '&view=hsys_users&do=viewall');
            include('libraries/views/admin/View.php');
        } else {
            send_to('' . H_ADMIN . '&view=hsys_users2&do=details');
        }
    } //ADD //////////////////////////////////////////////////
    elseif (get('do') == 'add') {
        if ($haccess->UserAccess()->user_position == 1) {
            if (post('button')) {
                //validation
                if (post('first_name') == '') {
                    json_error('Your first name cannot be empty');
                } elseif ((strlen(post('first_name')) < 3)) {
                    json_error('Your last name is too short!');
                } elseif (post('last_name') == '') {
                    json_error('Your username cannot be empty');
                } elseif ((strlen(post('last_name')) < 3)) {
                    json_error('Your last name is too short!');
                } elseif (post('email') == '') {
                    json_error('Your email cannot be empty');
                } elseif (filter_var(post('email'), FILTER_VALIDATE_EMAIL) === false) {
                    json_error('Please enter a valid email address');
                } elseif ($haccess->user_exist_checker(post('email'), 'email', H_SYSTEM_ACCESS)
                    === true) {
                    json_error('This email already exists');
                } elseif (filter_var(post('phone'), FILTER_SANITIZE_NUMBER_INT === false)) {
                    json_error('Your phone number is not valid');
                } elseif ($haccess->user_exist_checker(post('phone'), 'phone', H_SYSTEM_ACCESS)
                    === true) {
                    json_error('This phone number already exists');
                }elseif (strlen(post('phone'))!== 13) {
                    json_error('Your phone number should be in this format 2348000000000');
                } elseif (!preg_match('/^[a-zA-Z]+[a-zA-Z0-9._]+$/', post('password'))) {
                    $errors[] = 'Please enter a password with only alphabets and numbers';
                } elseif (strlen(post('password')) < 6) {
                    $errors[] = 'Your password must be atleast 6 characters';
                } elseif (strlen(post('password')) > 30) {
                    $errors[] = 'Your password is too long';
                } elseif (post('password') != post('password2')) {
                    $errors[] = 'Your passwords are not the same.';
                } elseif (filter_var(post('email'), FILTER_VALIDATE_EMAIL) === false) {
                    $errors[] = 'Please enter a valid email address';
                } elseif (empty($errors) === true) {
                    $username = htmlentities(post('username'));
                    $password = hezecom_crypt(trim(post('password')));
                    $referral_code = 'OCR' . random_str('nozero', 8);
                    $referral_id = post('refferal') ? post('referral') : 'AdminCodeHere';

                    $user_branch = post('user_branch');
                    $user_zone = post('user_zone');
                    // Separate Array by " , "
                    $zone_coverage = implode(" , ", $user_zone);

                    $newUser = $haccess->Insert(post('first_name'), post('middle_name'), post('last_name'),
                        post('email'), post('phone'), $password, post('membership'), post('user_status'),
                        post('user_position'), $referral_code, $referral_id, $user_branch, $zone_coverage,
                        date('Y-m-d H:i:s'), $haccess->UserID());

                    $userAccount = $newUser;
                    //create Account
                    $acct_number = post('phone');
                    $user_id = $newUser;
                    $acct_status = 'active';
                    $account_type = 'wallet';
                    $acct_opendate = date('Y-m-d');
                    $account_balance = 0;
                    $account_point_balance = 0;
                    $createdAt = date('Y-m-d');
                    $modifiedAt = date('Y-m-d');
                    $haccess->createWalletAccount($acct_number, $user_id, $acct_status, $acct_opendate,
                        $account_type, $account_balance, $account_point_balance, $createdAt, $modifiedAt);


                    //Apply Notification sender
                    $arr = array('id' => (int)post('phone'),'fullname' => post('first_name') .' '. post('middle_name').' '.post('last_name'), 'account' => post('phone'), 'password'=>post('password'), 'balance' => 0.00, 'subject' => "Account Opened Successfully", 'date' => date("Y-m-d H:i:s"), 'type' => "sms");
                    $senderParams = json_encode($arr);
                    $haccess->successful_registration_notice($senderParams);

                    send_to('' . H_ADMIN . '&view=hsys_users&do=viewall&msg=add');
                }
            }

            $zone_list = $haccess->showZoneList($_SESSION['H_USER_SESSION_ID']);
            $organisation_list = $haccess->showBranchList($_SESSION['H_USER_SESSION_ID']);
            include('libraries/views/admin/Add.php');
        }
    } //UPDATE ////////////////////////////////////////////////
    elseif (get('do') == 'update') {
        if (post('button')) {

            if (filter_var(post('email'), FILTER_VALIDATE_EMAIL) === false) {
                $errors[] = 'Please enter a valid email address';
            } elseif (empty($errors) === true) {

                $zone_list = post('user_zone');
                // Separate Array by " , "
                $zone_coverage = implode(" , ", $zone_list);
                $haccess->Update(post('first_name'), post('middle_name'), post('last_name'),
                    post('email'), post('phone'), post('membership'), post('user_status'), post('user_position'),
                    post('user_branch'), $zone_coverage, date('Y-m-d'), post('userid'));
                send_to('' . H_ADMIN . '&view=hsys_users&userid=' . get('userid') .
                    '&do=details&msg=update');
            }
        }
        $rows = $haccess->SelectOne(get('userid'));
        $zone_coverage_list = explode(" , ", $rows->user_zone);
        $zone_list = $haccess->showZoneList($_SESSION['H_USER_SESSION_ID']);
        $organisation_list = $haccess->showBranchList($_SESSION['H_USER_SESSION_ID']);
        include('libraries/views/admin/Update.php');
    } //CHANGE PASSWORD
    elseif (get('do') == 'updatepwd') {
        if (post('button')) {

            if (post('password') == '') {
                $errors[] = 'Your password cannot be empty';
            } elseif (post('password') != '' and strlen(post('password')) < 6) {
                $errors[] = 'Your password must be atleast 6 characters';
            } elseif (strlen(post('password')) > 30) {
                $errors[] = 'Your password cannot be more than 30 characters long';
            } elseif (post('password') != post('password2')) {
                $errors[] = 'Your passwords are not the same.';
            } elseif (empty($errors) === true) {
                $password = hezecom_crypt(trim(post('password')));

                $haccess->UpdatePassword($password, date('Y-m-d'), post('userid'));
                send_to('' . H_ADMIN . '&view=hsys_users&userid=' . get('userid') .
                    '&do=details&msg=update');
            }
        }
        $rows = $haccess->SelectOne(get('userid'));
        include('libraries/views/admin/ChangePwd.php');
    } //Details
    elseif (get('do') == 'details') {
        $rows = $haccess->SelectOne(get('userid'));
        include('libraries/views/admin/Details.php');
    } //ADD //////////////////////////////////////////////////
    elseif (get('do') == 'signuppro') {

        if ($_POST) {
            // form validation
            if (post('first_name') == '') {
                json_error('Your first name cannot be empty');
            } elseif ((strlen(post('first_name')) < 3)) {
                json_error('Your last name is too short!');
            } elseif (post('last_name') == '') {
                json_error('Your username cannot be empty');
            } elseif ((strlen(post('last_name')) < 3)) {
                json_error('Your last name is too short!');
            } elseif (post('email') == '') {
                json_error('Your email cannot be empty');
            } elseif (filter_var(post('email'), FILTER_VALIDATE_EMAIL) === false) {
                json_error('Please enter a valid email address');
            } elseif ($haccess->user_exist_checker(post('email'), 'email', H_SYSTEM_ACCESS)
                === true) {
                json_error('This email already exists');
            } elseif (filter_var(post('phone'), FILTER_SANITIZE_NUMBER_INT === false)) {
                json_error('Your phone number is not valid');
            } elseif ($haccess->user_exist_checker(post('phone'), 'phone', H_SYSTEM_ACCESS)
                === true) {
                json_error('This phone number already exists');
            }  elseif (strlen(post('phone'))!== 13) {
                json_error('Your phone number should be in this format 2348000000000');
            }elseif (post('password') == '') {
                json_error('Your password cannot be empty');
            } elseif (strlen(post('password')) < 6) {
                json_error('Your password must be at least 6 characters');
            } elseif (!preg_match('/^[a-zA-Z]+[a-zA-Z0-9._]+$/', post('password'))) {
                json_error('Please enter a password with only alphabets and numbers');
            } elseif (strlen(post('password')) > 30) {
                json_error('Your password is too long');
            } elseif (post('password') != post('password2')) {
                json_error('Your passwords are not the same.');
            } else {
                $username = htmlentities(post('username'));
                $password = hezecom_crypt(trim(post('password')));
                $referral_code = 'OCR' . random_str('nozero', 8);
                $referral_id = post('referral') ? post('referral') : 'AdminCodeHere';
                $user_status = 1;
                $user_position = post('role') == 6 || post('role') == 5 ? post('role') : 5;
                $newUser = $haccess->singUpInsert(post('first_name'), post('middle_name'), post('last_name'),
                    post('email'), post('phone'), $password, post('membership'), $user_status, $user_position,
                    $referral_code, $referral_id, date('Y-m-d'), date('Y-m-d'), date('Y-m-d'));

                $userAccount = $newUser;
                //create Account
                $acct_number = post('phone');
                $user_id = $newUser;
                $acct_status = 'active';
                $account_type = 'wallet';
                $acct_opendate = date('Y-m-d');
                $account_balance = 0;
                $account_point_balance = 0;
                $createdAt = date('Y-m-d');
                $modifiedAt = date('Y-m-d');
                $haccess->createUserAccount($acct_number, $user_id, $acct_status, $acct_opendate,
                    $account_type, $account_balance, $account_point_balance, $createdAt, $modifiedAt);
                // login
                $login = $haccess->SelectOne($user_id);
                $_SESSION['H_USER_SESSION'] = $login->email;
                $_SESSION['H_USER_SESSION_ID'] = $login->userid;
                $_SESSION['H_USER_FULLNAME'] = $login->first_name . ' '. $login->last_name;
                $_SESSION['H_USER_ACCOUNT_NUMBER'] = $login->phone;
                $_SESSION['H_USER_SESSION_POSITION'] = $login->user_position;


                //Apply Notification sender
                $arr = array('id' =>post('phone'),'fullname' => post('first_name'), 'account' => post('phone'), 'password'=>post('password'), 'balance' => 0.00, 'subject' => "Account Opened Successfully", 'date' => date("Y-m-d H:i:s"), 'type' => "sms");
                $senderParams = json_encode($arr);
                $haccess->successful_registration_notice($senderParams);
                $haccess->getting_started_information($senderParams);

                $haccess->UpdateLastLogin(date('Y-m-d'), $_SERVER['REMOTE_ADDR'], $haccess->
                UserID());
                json_send(H_ADMIN);
                json_success('SignUp Successful');
                exit();
            }
        }

        //include('libraries/views/admin/login.php');
    } //LOGIN ////////////////////////////////////////////////
    elseif (get('do') == 'loginpro') {

        if ($_POST) {
            $username = trim(post('username'));
            $password = trim(post('password'));

            if (empty($username) === true || empty($password) === true) {
                json_error(LANG_ADMIN_INVALID_PASSWORD);
            } else {
                if ($haccess->user_exist_checker($username, 'both', H_SYSTEM_ACCESS) === false) {
                    json_error(LANG_ADMIN_INVALID_USERNAME);
                } else
                    if ($haccess->account_activation($username, H_SYSTEM_ACCESS) === false) {
                        json_error(LANG_ADMIN_INVALID_ACTIVATION);
                    } else {

                        $login = $haccess->HezeLogin($username, $password, H_SYSTEM_ACCESS);
                        if ($login === false) {
                            json_error(LANG_ADMIN_ERROR);
                        } else {
                            //$_SESSION['H_USER_SESSION'] = $login;
                            //$_SESSION[H_USER_ID] =

                            $_SESSION['H_USER_SESSION'] = $login['username'];
                            $_SESSION['H_USER_SESSION_ID'] = $login['userid'];
                            $_SESSION['H_USER_SESSION_ROLE'] = $login['roles_perm'];
                            $_SESSION['H_USER_SESSION_POSITION'] = $login['user_position'];
                            $_SESSION['H_USER_FULLNAME'] = $login['first_name'] .' '. $login['last_name'];
                            $_SESSION['H_USER_ACCOUNT_NUMBER'] = $login['account_number'];
                            //$_SESSION[H_USER_SESSION_REPORTS_TO] = $login['reports_to'];

                            $haccess->UpdateLastLogin(date('Y-m-d'), $_SERVER['REMOTE_ADDR'], $haccess->
                            UserID());
                            json_send(H_ADMIN);
                            json_success('Login in');
                            exit();
                        }
                    }
            }
        }
    } elseif (get('do') == 'contactpro') {

        if ($_POST) {
            // form validation
            if (post('name') == '') {
                json_error('Your full names cannot be empty');
            } elseif (post('email') == '') {
                json_error('Your email cannot be empty');
            } elseif (filter_var(post('email'), FILTER_VALIDATE_EMAIL) === false) {
                json_error('Please enter a valid email address');
            } elseif (IsInjected(post('email'))) {
                json_error('Bad email value!');
            } elseif (post('phone') == '') {
                json_error('Your phone cannot be empty');
            } elseif (filter_var(post('phone'), FILTER_SANITIZE_NUMBER_INT === false)) {
                json_error('Your phone number is not valid');
            } elseif (post('message') == '') {
                json_error('Your message cannot be empty');
            } elseif (strlen(post('message')) < 6) {
                json_error('Your message must be at least 6 characters');
            } else {

                $master_email = 'ygllc@outlook.com';
                $name = trim(post('name'));
                $visitor_email = trim(post('email'));
                $phone = trim(post('phone'));
                $message = trim(post('message'));

                $email_from = $master_email;
                $email_subject = "New Form submission";
                $email_body = "You have received a new message from the user $name.\n" .
                    "Here is the phone $phone and the message :\n  $message" . $to = $master_email;
                $headers = "From: $email_from \r\n";
                $headers .= "Reply-To: $visitor_email \r\n";
                $sent = mail($to, $email_subject, $email_body, $headers);
                if ($sent) {
                    echo '<script> cleartext(); </script>';
                }
                json_success('Email sent Successfully!');
                //exit();
                //header('Location: index.php?pg=login');
                //include('libraries/views/admin/login.php');
            }
        }


    } //logout
    elseif (get('do') == 'logout') {
        $haccess->log_out_access(H_LOGIN);
    } //Delete
    elseif (get('do') == 'delete') {
        $dfile = get('dfile');
        if (get('userid') and $dfile == '') {
            $del = $haccess->Delete(get('userid'), '' . H_ADMIN .
                '&view=hsys_users&do=viewall&msg=delete');
        } elseif (get('userid') and $dfile != '' and get('fdel') == '') {
            delete_files(UPLOAD_PATH . get('dfile'));
            delete_files(THUMB_PATH . get('dfile'));
            $del = $haccess->Delete(get('userid'), '' . H_ADMIN .
                '&view=hsys_users&do=viewall&msg=delete');
        } elseif (get('userid') and $dfile != '' and get('fdel') != '') {
            delete_files(UPLOAD_PATH . get('dfile'));
            delete_files(THUMB_PATH . get('dfile'));
            send_to('' . H_ADMIN . '&view=hsys_users&userid=' . get('userid') .
                '&do=update&msg=delete');
        }
    }
} //end get


//LIMITED ACCESS////////////////////////////////////////////
if (get('view') == 'hsys_users2') {
    //Select
    if (get('do') == 'viewall') {
        $result = $haccess->SelectAll(RECORD_PER_PAGE);
        $paging = pagination($haccess->CountRow(), RECORD_PER_PAGE, '' . H_ADMIN .
            '&view=hsys_users2&do=viewall');
        include('libraries/views/admin/View.php');
    } //UPDATE
    elseif (get('do') == 'update') {
        if (post('button')) {

            if (filter_var(post('email'), FILTER_VALIDATE_EMAIL) === false) {
                $errors[] = 'Please enter a valid email address';
            } elseif (empty($errors) === true) {

                $haccess->UpdateExempt(post('name'), post('email'), post('phone'), date('Y-m-d'),
                    $haccess->UserID());
                send_to('' . H_ADMIN . '&view=hsys_users2&do=details&msg=update');
            }
        }
        $rows = $haccess->SelectOne($haccess->UserID());
        //$mytable=$haccess->CustomShow();
        include('libraries/views/admin/Update2.php');
    } //CHANGE PASSWORD
    elseif (get('do') == 'updatepwd') {

        if (post('button')) {

            if (post('password') == '') {
                $errors[] = 'Your password cannot be empty';
            } elseif ($haccess->current_password(post('oldpassword'), H_SYSTEM_ACCESS,
                    'userid', $haccess->UserID()) === false) {
                $errors[] = 'Your old password is not correct!';
            } elseif (post('password') != '' and strlen(post('password')) < 5) {
                $errors[] = 'Your password must be atleast 5 characters';
            } elseif (strlen(post('password')) > 30) {
                $errors[] = 'Your password cannot be more than 30 characters long';
            } elseif (post('password') != post('password2')) {
                $errors[] = 'Your passwords are not the same.';
            } elseif (empty($errors) === true) {
                $password = hezecom_crypt(post('password'));

                $haccess->UpdatePassword($password, date('Y-m-d'), post('userid'));
                send_to('' . H_ADMIN . '&view=hsys_users2&do=details&msg=update');
            }
        }
        include('libraries/views/admin/ChangePwd2.php');
    } //Details
    elseif (get('do') == 'details') {
        $rows = $haccess->SelectOne($haccess->UserID());
        include('libraries/views/admin/Details2.php');
    }
} //SEARCH SUGGEST//////////////////////////////////////////////
elseif (get('do') == 'autosearch') {
    $qstring = post('qstring');
    if (strlen($qstring) > 0) {
        $autosearch = $haccess->AutoSearch(trim($qstring), 10, 'name');
        echo ' <div class="widget"><ul class="list-group">';
        foreach ($autosearch as $srow) {
            echo '<span class="searchheading">
	<a href="' . H_ADMIN . '&view=hsys_users&userid=' . $srow->userid .
                '&do=details"><li class="list-group-item">' . $srow->name . '</li></a>
	</span>';
        }
        echo '</ul></div>';
    }
}
?>
	