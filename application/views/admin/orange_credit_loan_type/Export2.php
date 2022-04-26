<?php
/*
* =======================================================================
* FILE NAME:        Export2.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_loan_type
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
	<strong>' . LANG_REPORT_TABLE . '</strong> Orange Credit Loan Type</p>';
$excel .= '
	<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
    <tr>
	<td>Loan Name</td>
	<td>' . $rows->loan_name . '</td>
  	</tr>
    <tr>
	<td>Prefix</td>
	<td>' . $rows->prefix . '</td>
  	</tr>
    <tr>
	<td>Maximum Amount</td>
	<td>' . $rows->maximum_amount . '</td>
  	</tr>
    <tr>
	<td>Minimum Amount</td>
	<td>' . $rows->minimum_amount . '</td>
  	</tr>
    <tr>
	<td>Loan Tenure</td>
	<td>' . $rows->loan_tenure . '</td>
  	</tr>
    <tr>
	<td>Activation Charge</td>
	<td>' . $rows->activation_charge . '</td>
  	</tr>
    <tr>
	<td>Interest</td>
	<td>' . $rows->interest . '</td>
  	</tr>
    <tr>
	<td>Status</td>
	<td>' . $rows->status . '</td>
  	</tr>
    <tr>
	<td>CreatedAt</td>
	<td>' . $rows->createdAt . '</td>
  	</tr>
    <tr>
	<td>ModifiedAt</td>
	<td>' . $rows->modifiedAt . '</td>
  	</tr>
    <tr>
	<td>User Id</td>
	<td>' . $rows->user_id . '</td>
  	</tr>';
$excel .= '</table>';

$filename1 = 'orange_credit_loan_type_' . date('Y-m-d') . '.doc';
$filename2 = 'orange_credit_loan_type_' . date('Y-m-d') . '.xls';
$pdf_output = 'orange_credit_loan_type_' . date('Y-m-d') . '.pdf';
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
	