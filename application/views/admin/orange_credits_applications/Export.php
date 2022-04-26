<?php
/*
* =======================================================================
* FILE NAME:        Export.php
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credits_applications
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
	<strong>' . LANG_REPORT_TABLE . '</strong> Orange Credits Applications</p>';
$excel .= '<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
	<tr>
      <th>Activation Code</th>
      <th>Request Beneficary</th>
      <th>Request Type</th>
      <th>Customer Id</th>
      <th>Amount Requested</th>
      <th>Amount Approved</th>
      <th>Activation Charge</th>
      <th>Monthly Repayment</th>
      <th>Total Repayment</th>
      <th>Total Interest</th>
      <th>Application Status</th>
      <th>CreatedAt</th>
      <th>Charge Account Every</th>
      <th>Monthly Repayment Starts</th>
      <th>Monthly Repayment Ends</th>
      <th>Comments</th>
      <th>Approved By</th>
      <th>ApprovedAt</th>
      <th>Has Standing Order</th>
      <th>Standing Order Id</th>
  </tr>
  ';
foreach ($result as $rows) {
    $excel .= '<tr>
	<td>' . $rows->activation_code . '</td>
	<td>' .  $rows->last_name ." ".$rows->middle_name ." ". $rows->first_name . '</td>
	<td>' . $rows->loan_name . '</td>
	<td>' . $rows->sponsor_id . '</td>
	<td>' . $rows->amount_requested . '</td>
	<td>' . $rows->amount_approved . '</td>
	<td>' . $rows->activation_charge . '</td>
	<td>' . $rows->monthly_repayment . '</td>
	<td>' . $rows->total_repayment . '</td>
	<td>' . $rows->total_interest . '</td>
	<td>' . $rows->application_status . '</td>
	<td>' . $rows->createdAt . '</td>
	<td>' . $rows->charge_account_every . '</td>
	<td>' . $rows->monthly_repayment_starts . '</td>
	<td>' . $rows->monthly_repayment_ends . '</td>
	<td>' . $rows->comments . '</td>
	<td>' . $rows->approved_by . '</td>
	<td>' . $rows->approvedAt . '</td>
	<td>' . $rows->has_standing_order . '</td>
	<td>' . $rows->standing_order_id . '</td>
	</tr>';
}
$excel .= '</table>';
$filename1 = 'orange_credits_applications_' . date('Y-m-d') . '.doc';
$filename2 = 'orange_credits_applications_' . date('Y-m-d') . '.xls';
$pdf_output = 'orange_credits_applications_' . date('Y-m-d') . '.pdf';
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