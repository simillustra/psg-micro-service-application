<?php
/*
* =======================================================================
* FILE NAME:        main.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credits_logs
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			Simillustra (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

//hfiles
if (get('view') == 'hfiles') {
    include (APP_FOLDER . '/controllers/admin/hfiles.php');
    $orange_credits_logs_controller = new hfiles_controller();
    $orange_credits_logs_controller->invoke_hfiles();
}
//orange_credit_branches
if (get('view') == 'orange_credit_branches') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_branches.php');
    $orange_credits_logs_controller = new orange_credit_branches_controller();
    $orange_credits_logs_controller->invoke_orange_credit_branches();
}
//orange_credit_business_plan
if (get('view') == 'orange_credit_business_plan') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_business_plan.php');
    $orange_credits_logs_controller = new orange_credit_business_plan_controller();
    $orange_credits_logs_controller->invoke_orange_credit_business_plan();
}

//orange_credit_poultry_appraisal
if (get('view') == 'orange_credit_poultry_appraisal') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_poultry_appraisal.php');
    $_controller = new orange_credit_poultry_appraisal_controller();
    $_controller->invoke_orange_credit_poultry_appraisal();
}

//orange_credit_coupons
if (get('view') == 'orange_credit_coupons') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_coupons.php');
    $orange_credits_logs_controller = new orange_credit_coupons_controller();
    $orange_credits_logs_controller->invoke_orange_credit_coupons();
}
//orange_credit_cities
if (get('view') == 'orange_credit_cities') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_cities.php');
    $orange_credits_logs_controller = new orange_credit_cities_controller();
    $orange_credits_logs_controller->invoke_orange_credit_cities();
}
//orange_credit_countries
if (get('view') == 'orange_credit_countries') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_countries.php');
    $orange_credits_logs_controller = new orange_credit_countries_controller();
    $orange_credits_logs_controller->invoke_orange_credit_countries();
}
//orange_credit_fees
if (get('view') == 'orange_credit_fees') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_fees.php');
    $orange_credits_logs_controller = new orange_credit_fees_controller();
    $orange_credits_logs_controller->invoke_orange_credit_fees();
}
//orange_credit_kyc
if (get('view') == 'orange_credit_kyc') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_kyc.php');
    $orange_credits_logs_controller = new orange_credit_kyc_controller();
    $orange_credits_logs_controller->invoke_orange_credit_kyc();
}
//orange_credit_loan_payment
if (get('view') == 'orange_credit_loan_payment') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_loan_payment.php');
    $orange_credits_logs_controller = new orange_credit_loan_payment_controller();
    $orange_credits_logs_controller->invoke_orange_credit_loan_payment();
}
//orange_credit_loan_status
if (get('view') == 'orange_credit_loan_status') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_loan_status.php');
    $orange_credits_logs_controller = new orange_credit_loan_status_controller();
    $orange_credits_logs_controller->invoke_orange_credit_loan_status();
}
//orange_credit_loan_type
if (get('view') == 'orange_credit_loan_type') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_loan_type.php');
    $orange_credits_logs_controller = new orange_credit_loan_type_controller();
    $orange_credits_logs_controller->invoke_orange_credit_loan_type();
}
//orange_credit_messages
if (get('view') == 'orange_credit_messages') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_messages.php');
    $orange_credits_logs_controller = new orange_credit_messages_controller();
    $orange_credits_logs_controller->invoke_orange_credit_messages();
}
//orange_credit_micro_loan_request
if (get('view') == 'orange_credit_micro_loan_request') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_micro_loan_request.php');
    $orange_credits_logs_controller = new
        orange_credit_micro_loan_request_controller();
    $orange_credits_logs_controller->invoke_orange_credit_micro_loan_request();
}
//orange_credit_notifications
if (get('view') == 'orange_credit_notifications') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_notifications.php');
    $orange_credits_logs_controller = new orange_credit_notifications_controller();
    $orange_credits_logs_controller->invoke_orange_credit_notifications();
}
//orange_credit_organisation
if (get('view') == 'orange_credit_organisation') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_organisation.php');
    $orange_credits_logs_controller = new orange_credit_organisation_controller();
    $orange_credits_logs_controller->invoke_orange_credit_organisation();
}
//orange_credit_payment_history
if (get('view') == 'orange_credit_payment_history') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_payment_history.php');
    $orange_credits_logs_controller = new orange_credit_payment_history_controller();
    $orange_credits_logs_controller->invoke_orange_credit_payment_history();
}
//orange_credit_payments
if (get('view') == 'orange_credit_payments') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_payments.php');
    $orange_credits_logs_controller = new orange_credit_payments_controller();
    $orange_credits_logs_controller->invoke_orange_credit_payments();
}
//orange_credit_regions
if (get('view') == 'orange_credit_regions') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_regions.php');
    $orange_credits_logs_controller = new orange_credit_regions_controller();
    $orange_credits_logs_controller->invoke_orange_credit_regions();
}
//orange_credit_request
if (get('view') == 'orange_credit_request') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_request.php');
    $orange_credits_logs_controller = new orange_credit_request_controller();
    $orange_credits_logs_controller->invoke_orange_credit_request();
}
//orange_credit_transactions
if (get('view') == 'orange_credit_transactions') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_transactions.php');
    $orange_credits_logs_controller = new orange_credit_transactions_controller();
    $orange_credits_logs_controller->invoke_orange_credit_transactions();
}
//orange_credit_zones
if (get('view') == 'orange_credit_zones') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_zones.php');
    $orange_credits_logs_controller = new orange_credit_zones_controller();
    $orange_credits_logs_controller->invoke_orange_credit_zones();
}
//orange_credits_accounts
if (get('view') == 'orange_credits_accounts') {
    include (APP_FOLDER . '/controllers/admin/orange_credits_accounts.php');
    $orange_credits_logs_controller = new orange_credits_accounts_controller();
    $orange_credits_logs_controller->invoke_orange_credits_accounts();
}
//orange_credits_applications
if (get('view') == 'orange_credits_applications') {
    include (APP_FOLDER . '/controllers/admin/orange_credits_applications.php');
    $orange_credits_logs_controller = new orange_credits_applications_controller();
    $orange_credits_logs_controller->invoke_orange_credits_applications();
}
//orange_credits_logs
if (get('view') == 'orange_credits_logs') {
    include (APP_FOLDER . '/controllers/admin/orange_credits_logs.php');
    $orange_credits_logs_controller = new orange_credits_logs_controller();
    $orange_credits_logs_controller->invoke_orange_credits_logs();
}
//orange_credit_standing_orders
if (get('view') == 'orange_credit_standing_orders') {
    include (APP_FOLDER . '/controllers/admin/orange_credit_standing_orders.php');
    $orange_credit_standing_orders_controller = new
        orange_credit_standing_orders_controller();
    $orange_credit_standing_orders_controller->invoke_orange_credit_standing_orders();
}
//system_users
if (get('view') == 'system_users') {
    include (APP_FOLDER . '/controllers/admin/system_users.php');
    $orange_credits_logs_controller = new system_users_controller();
    $orange_credits_logs_controller->invoke_system_users();
}
?>