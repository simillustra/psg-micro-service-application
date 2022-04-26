<?php
/*
* =======================================================================
* FILE NAME:        Export.php
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
$excel .= '<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
	<tr>
      <th>Payee Id</th>
      <th>Payee Name</th>
      <th>Payee Account Number</th>
      <th>Total Amount</th>
      <th>Deductable Amount</th>
      <th>Recieving Account</th>
      <th>Number Of Payment</th>
      <th>Order Status</th>
      <th>Payment Frequency</th>
      <th>Starting Date</th>
      <th>Next Payment Date</th>
      <th>Ending Date</th>
      <th>AuthorizedBy</th>
      <th>Reference</th>
      <th>CreatedAt</th>
  </tr>
  ';
foreach ($result as $rows) {
    $excel .= '<tr>
	<td>' . $rows->payee_id . '</td>
	<td>' . $rows->payee_name . '</td>
	<td>' . $rows->payee_account_number . '</td>
	<td>' . $rows->total_amount . '</td>
	<td>' . $rows->deductable_amount . '</td>
	<td>' . $rows->recieving_account . '</td>
	<td>' . $rows->number_of_payment . '</td>
	<td>' . $rows->order_status . '</td>
	<td>' . $rows->payment_frequency . '</td>
	<td>' . $rows->starting_date . '</td>
	<td>' . $rows->next_payment_date . '</td>
	<td>' . $rows->ending_date . '</td>
	<td>' . $rows->authorizedBy . '</td>
	<td>' . $rows->reference . '</td>
	<td>' . $rows->createdAt . '</td>
	</tr>';
}
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
} elseif ($etype == 'PDF') {
    HezecomPDF($excel, $pdf_output);
}
?>