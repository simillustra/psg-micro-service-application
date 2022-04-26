<?php
/*
* =======================================================================
* FILE NAME:        Export2.php
* DATE CREATED:  	18-12-2020
* FOR TABLE:  		orange_credit_standing_orders
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
	<strong>' . LANG_REPORT_TABLE . '</strong> Orange Credit Standing Orders</p>';
$excel .= '
	<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
    <tr>
	<td>Payee Id</td>
	<td>' . $rows->payee_id . '</td>
  	</tr>
    <tr>
	<td>Payee Name</td>
	<td>' . $rows->payee_name . '</td>
  	</tr>
    <tr>
	<td>Payee Account Number</td>
	<td>' . $rows->payee_account_number . '</td>
  	</tr>
    <tr>
	<td>Total Amount</td>
	<td>' . $rows->total_amount . '</td>
  	</tr>
    <tr>
	<td>Deductable Amount</td>
	<td>' . $rows->deductable_amount . '</td>
  	</tr>
    <tr>
	<td>Recieving Account</td>
	<td>' . $rows->recieving_account . '</td>
  	</tr>
    <tr>
	<td>Number Of Payment</td>
	<td>' . $rows->number_of_payment . '</td>
  	</tr>
    <tr>
	<td>Order Status</td>
	<td>' . $rows->order_status . '</td>
  	</tr>
    <tr>
	<td>Payment Frequency</td>
	<td>' . $rows->payment_frequency . '</td>
  	</tr>
    <tr>
	<td>Starting Date</td>
	<td>' . $rows->starting_date . '</td>
  	</tr>
    <tr>
	<td>Next Payment Date</td>
	<td>' . $rows->next_payment_date . '</td>
  	</tr>
    <tr>
	<td>Ending Date</td>
	<td>' . $rows->ending_date . '</td>
  	</tr>
    <tr>
	<td>AuthorizedBy</td>
	<td>' . $rows->authorizedBy . '</td>
  	</tr>
    <tr>
	<td>Reference</td>
	<td>' . $rows->reference . '</td>
  	</tr>
    <tr>
	<td>CreatedAt</td>
	<td>' . $rows->createdAt . '</td>
  	</tr>';
$excel .= '</table>';

$filename1 = 'orange_credit_standing_orders_' . date('Y-m-d') . '.doc';
$filename2 = 'orange_credit_standing_orders_' . date('Y-m-d') . '.xls';
$pdf_output = 'orange_credit_standing_orders_' . date('Y-m-d') . '.pdf';
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
	