<?php
/*
* =======================================================================
* FILE NAME:        Export2.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_loan_payment
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
	<strong>' . LANG_REPORT_TABLE . '</strong> PSG Loan Payment</p>';
$excel .= '
	<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
    <tr>
	<td>Payment Date</td>
	<td>' . $rows->payment_date . '</td>
  	</tr>
    <tr>
	<td>Paid Amount</td>
	<td>' . $rows->paid_amount . '</td>
  	</tr>
    <tr>
	<td>Principle Amount</td>
	<td>' . $rows->principle_amount . '</td>
  	</tr>
    <tr>
	<td>Interest Amount</td>
	<td>' . $rows->interest_amount . '</td>
  	</tr>
    <tr>
	<td>Balance</td>
	<td>' . $rows->balance . '</td>
  	</tr>
    <tr>
	<td>Userid</td>
	<td>' . $rows->userid . '</td>
  	</tr>
    <tr>
	<td>Loan Id</td>
	<td>' . $rows->loan_id . '</td>
  	</tr>';
$excel .= '</table>';

$filename1 = 'orange_credit_loan_payment_' . date('Y-m-d') . '.doc';
$filename2 = 'orange_credit_loan_payment_' . date('Y-m-d') . '.xls';
$pdf_output = 'orange_credit_loan_payment_' . date('Y-m-d') . '.pdf';
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
	