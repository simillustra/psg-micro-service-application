<?php
/*
* =======================================================================
* FILE NAME:        Export.php
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
$excel .= '<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
	<tr>
      <th>Loan Name</th>
      <th>Prefix</th>
      <th>Maximum Amount</th>
      <th>Minimum Amount</th>
      <th>Loan Tenure</th>
      <th>Activation Charge</th>
      <th>Interest</th>
      <th>Status</th>
      <th>CreatedAt</th>
      <th>ModifiedAt</th>
      <th>User Id</th>
  </tr>
  ';
foreach ($result as $rows) {
    $excel .= '<tr>
	<td>' . $rows->loan_name . '</td>
	<td>' . $rows->prefix . '</td>
	<td>' . $rows->maximum_amount . '</td>
	<td>' . $rows->minimum_amount . '</td>
	<td>' . $rows->loan_tenure . '</td>
	<td>' . $rows->activation_charge . '</td>
	<td>' . $rows->interest . '</td>
	<td>' . $rows->status . '</td>
	<td>' . $rows->createdAt . '</td>
	<td>' . $rows->modifiedAt . '</td>
	<td>' . $rows->user_id . '</td>
	</tr>';
}
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
} elseif ($etype == 'PDF') {
    HezecomPDF($excel, $pdf_output);
}
?>