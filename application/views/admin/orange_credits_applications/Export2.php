<?php
/*
* =======================================================================
* FILE NAME:        Export2.php
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
$excel .= '
	<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
    <tr>
	<td>Activation Code</td>
	<td>' . $rows->activation_code . '</td>
  	</tr>
    <tr>
	<td>Request Beneficary</td>
	<td>' . $rows->last_name ." ".$rows->middle_name ." ". $rows->first_name. '</td>
  	</tr>
    <tr>
	<td>Request Type</td>
	<td>' . $rows->loan_name . '</td>
  	</tr>
    <tr>
	<td>Customer Id</td>
	<td>' . $rows->sponsor_id . '</td>
  	</tr>
    <tr>
	<td>Amount Requested</td>
	<td>' . $rows->amount_requested . '</td>
  	</tr>
    <tr>
	<td>Amount Approved</td>
	<td>' . $rows->amount_approved . '</td>
  	</tr>
    <tr>
	<td>Activation Charge</td>
	<td>' . $rows->activation_charge . '</td>
  	</tr>
    <tr>
	<td>Monthly Repayment</td>
	<td>' . $rows->monthly_repayment . '</td>
  	</tr>
    <tr>
	<td>Total Repayment</td>
	<td>' . $rows->total_repayment . '</td>
  	</tr>
    <tr>
	<td>Total Interest</td>
	<td>' . $rows->total_interest . '</td>
  	</tr>
    <tr>
	<td>Application Status</td>
	<td>' . $rows->application_status . '</td>
  	</tr>
    <tr>
	<td>CreatedAt</td>
	<td>' . $rows->createdAt . '</td>
  	</tr>
    <tr>
	<td>Charge Account Every</td>
	<td>' . $rows->charge_account_every . '</td>
  	</tr>
    <tr>
	<td>Monthly Repayment Starts</td>
	<td>' . $rows->monthly_repayment_starts . '</td>
  	</tr>
    <tr>
	<td>Monthly Repayment Ends</td>
	<td>' . $rows->monthly_repayment_ends . '</td>
  	</tr>
    <tr>
	<td>Comments</td>
	<td>' . $rows->comments . '</td>
  	</tr>
    <tr>
	<td>Approved By</td>
	<td>' . $rows->approved_by . '</td>
  	</tr>
    <tr>
	<td>ApprovedAt</td>
	<td>' . $rows->approvedAt . '</td>
  	</tr>
    <tr>
	<td>Has Standing Order</td>
	<td>' . $rows->has_standing_order . '</td>
  	</tr>
    <tr>
	<td>Standing Order Id</td>
	<td>' . $rows->standing_order_id . '</td>
  	</tr>';
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
}
	