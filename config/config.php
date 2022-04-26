<?php
/*
SIMILLUSTRA  PHP CODE GENERATOR
Author: SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
COPYRIGHT 2013 ALL RIGHTS RESERVED
Configuration File
FILE NAME config.php

You must have purchased a valid license from CodeCanyon.com in order to have
access this file.

You may only use this file according to the respective licensing terms
you agreed to when purchasing this item.
*/


$path = dirname(__FILE__);
$npath = str_replace('\\', '/', $path);
$npath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $npath);
$absolutep = str_replace('config', '', $npath);

define('APP_MODE', 'PROD');
//Get Heroku ClearDB connection information
$DATABASE_SERVER = APP_MODE == 'DEV' ? 'localhost' : "psg-database-2.c25mdhmpiy39.us-east-1.rds.amazonaws.com";
$DATABASE_USERNAME = APP_MODE == 'DEV' ? 'root' : "psgAdmin2022";
$DATABASE_PASSWORD = APP_MODE == 'DEV' ? '' : "S!m14526%&%";
$DATABASE_NAME = APP_MODE == 'DEV' ? 'asfa' : "psgDatabaseServer";

$DATABASE_PORT = 3306;

define('LOCALHOST', $DATABASE_SERVER);
define('DB_USERNAME', $DATABASE_USERNAME);
define('DB_PASSWORD', $DATABASE_PASSWORD);
define('DB_NAME', $DATABASE_NAME);
define('DB_PORT', $DATABASE_PORT);

define('DB_TYPE', 'mysql');
define('H_TITLE', 'POULTRY SERVICE GROUP');
//PAYSTACK CONFIG
define('STORE_STATUS', 'development');
define('BUSINESS_PLAN_FEE', 500);
define('PAYMENT_PREFERENCE', 'RAVE_FLUTTERWAVE');
define('PAYSTACK_TEST_KEY', 'pk_test_762c22ff81145e4e3e4ae2836c152e54b6974277');
define('PAYSTACK_LIVE_KEY', 'pk_live_2e6d4b2f18aec178d8b67d07a50431af1debbd34');
define('PAYSTACK_SECRET_KEY', 'sk_live_19d25a54910484d8ccd1af565c97bc32e5de78d3');
define('PAYSTACK_SUB_ACCOUNT', 'ACCT_r2s71qmsbjtdrbd');

define('RAVE_FLUTTER_TEST_KEY', 'FLWPUBK_TEST-cb47c543d5bccadb474fd064757101b3-X');
define('RAVE_FLUTTER_TEST_SECRET_KEY', 'FLWSECK_TEST-be2f0869f753f5ca70ecbd2467d8ae3f-X');
define('RAVE_FLUTTER_TEST_ENCRYPTION_KEY', 'FLWSECK_TEST75c950eb73d1');
define('RAVE_FLUTTER_LIVE_KEY', 'FLWPUBK-65a1510df45b00b030011859d60834fa-X');
define('RAVE_FLUTTER_SECRET_KEY', 'FLWSECK-07c683464a701e26e70b6c8c1a2efb54-X');
define('RAVE_FLUTTER_ENCRYPTION_KEY', '07c683464a707f21e0d51ae8');
define('RAVE_FLUTTER_SUB_ACCOUNT', '');


define('AFRICAN_TALKING_API_KEY', '04b380a069dce50d8bb1246f923194b7d0207d28dc80d33f8fff451f34ca933e');
define('AFRICAN_TALKING_USERNAME', 'ORANGECREDIT');
define('AFRICAN_TALKING_SENDER_ID', 'ORANGECREDT');

define('AFRICAN_TALKING_LIVE_URL', 'https://api.africastalking.com/version1/messaging');
define('AFRICAN_TALKING_SANDBOX', 'https://api.sandbox.africastalking.com/version1/messaging');

define('ORANGE_CREDIT_PASSWORD_HASH', '*&ABCDEFGHIJKLMNOPQRSTUVWXYZ@#$%&abcdefghijklmnopqrstuvwxyz0123456789"');

define('H_ADMIN_ACCOUNT', '10012345678');
define('H_ADMIN_ACCOUNT_NAME', 'PSG LIMITED');
define('H_ADMIN_ACCOUNT_ID', 100001);

define('PAGINATION_TYPE', 'Normal');//Normal|Jquery

define('RECORD_PER_PAGE', '20');

define('BIG_IMAGE_WIDTH', '640');
define('THUMB_IMAGE_WIDTH', '240');

//Admin Login Info
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'sim14526');
define('ADMIN_ACCOUNT_NUMBER', '2349039881774');
//Upload Directory
define('UPLOAD_FOLDER', 'public/uploads/');
define('THUMB_FOLDER', 'public/uploads/thumbs/');
$base = str_replace('config', '', dirname(__FILE__) . DIRECTORY_SEPARATOR . '/');
define('UPLOAD_PATH', $base . UPLOAD_FOLDER);
define('THUMB_PATH', $base . THUMB_FOLDER);
define('NO_IMAGE', 'public/themes/default/images/user_avatar.png');

define('VALID_DIR', 1);
define('APP_PATH', $base);
define('APP_FOLDER', APP_PATH . 'application');
define('DEFAULT_THEME', 'public/themes/default');
define('H_THEME', DEFAULT_THEME);
define('H_ADMIN', 'index.php?pg=admin');
define('H_LOGIN', 'index.php?pg=login');
define('H_CLIENT', 'index.php?pg=public');
define('H_ADMIN_MAIN', 'main.php?pg=admin');
define('H_CLIENT_MAIN', 'main.php?pg=public');

//Backup Dir 
define('H_BACKUP_DIR', 'public/backups/');
define('H_EDITOR_FILES', $absolutep . 'public/uploads/editor');

//Multiple File Upload
define('UPLOAD_TABLE', 'hfiles');
define('FILE_ID', 'fid');
define('RELATE_ID', 'relateid');
define('H_FILE', 'gfile');
define('H_DATE', 'gdate');

//System Access
define('H_SYSTEM_ACCESS', 'system_users');
define('H_USER_SESSION', 'hezecom_users');
?>