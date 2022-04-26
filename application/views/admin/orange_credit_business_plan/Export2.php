<?php
/*
* =======================================================================
* FILE NAME:        Export2.php
* DATE CREATED:  	01-04-2020
* FOR TABLE:  		orange_credit_business_plan
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			Simillustra (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
?>
<?php
$etype = get('etype');
$excel = '
	<p style="font-family:arial; font-size:18px;" align="left">
	<strong style="font-family:arial;">' . LANG_REPORT_TITLE . '</strong><br>' . LANG_REPORT_SUB_TITLE . '<br>
	<strong>' . LANG_REPORT_TABLE . '</strong> Orange Credit Business Plan</p>';
$excel .= '
	<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
    <tr>
	<td>Business Name</td>
	<td>' . $rows->business_name . '</td>
  	</tr>
    <tr>
	<td>Business Address</td>
	<td>' . $rows->business_address . '</td>
  	</tr>
    <tr>
	<td>Business Manager</td>
	<td>' . $rows->business_manager . '</td>
  	</tr>
    <tr>
	<td>Business Type</td>
	<td>' . $rows->business_type . '</td>
  	</tr>
    <tr>
	<td>Business Market Demand</td>
	<td>' . $rows->business_market_demand . '</td>
  	</tr>
    <tr>
	<td>Business Sales Frequency</td>
	<td>' . $rows->business_sales_frequency . '</td>
  	</tr>
    <tr>
	<td>Business Monthly Revenue</td>
	<td>' . $rows->business_monthly_revenue . '</td>
  	</tr>
    <tr>
	<td>Business Investment</td>
	<td>' . $rows->business_investment . '</td>
  	</tr>
    <tr>
	<td>Business Investment Duration</td>
	<td>' . $rows->business_investment_duration . '</td>
  	</tr>
    <tr>
	<td>Business Estimated Profit Margin</td>
	<td>' . $rows->business_estimated_profit_margin . '</td>
  	</tr>
    <tr>
	<td>Business Expected Monthly Sales</td>
	<td>' . $rows->business_expected_monthly_sales . '</td>
  	</tr>
    <tr>
	<td>Business Code</td>
	<td>' . $rows->business_coupon_code . '</td>
  	</tr>
    <tr>
	<td>Business Plan Status</td>
	<td>' . $rows->business_plan_status . '</td>
  	</tr>
    <tr>
	<td>Business Date Applied</td>
	<td>' . $rows->business_date_applied . '</td>
  	</tr>
    <tr>
	<td>Business Date Approved</td>
	<td>' . $rows->business_date_approved . '</td>
  	</tr>
    <tr>
	<td>Business Owner</td>
	<td>' . $rows->business_plan_user . '</td>
  	</tr>';
$excel .= '</table>';

$filename1 = 'orange_credit_business_plan_' . date('Y-m-d') . '.doc';
$filename2 = 'orange_credit_business_plan_' . date('Y-m-d') . '.xls';
$pdf_output = 'orange_credit_business_plan_' . date('Y-m-d') . '.pdf';
if ($etype == 'word') {
    header("Content-type: application/msword");
    header("Content-Disposition: attachment; filename=$filename1");
    header("Pragma: no-cache");
    header("Expires: 0");
    print $excel;
} elseif ($etype == 'excel') {
    header("Content-type: application/msexcel");
    header("Content-Disposition: attachment; filename=$filename2");
    header("Pragma: no-cache");
    header("Expires: 0");
    print $excel;
} elseif ($etype == 'printer') {
    print'<title>' . H_TITLE . '</title>
	<script type="text/javascript">
	window.onload = function () {
		window.print();
	}
	</script>
	';
    print $excel;
}
	