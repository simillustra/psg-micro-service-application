<?php
/*
* =======================================================================
* FILE NAME:        Export.php
* DATE CREATED:  	07-03-2020
* FOR TABLE:  		orange_credit_kyc
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
	<strong>' . LANG_REPORT_TABLE . '</strong> Orange Credit Kyc</p>';
$excel .= '<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
	<tr>
      <th>Customer Fullname</th>
      <th>Customer Date Of Birth</th>
      <th>Customer Gender</th>
      <th>Customer Passport Photo</th>
      <th>Customer Identity Type</th>
      <th>Customer Identity Card</th>
      <th>Customer Contact Address</th>
        <th>Customer Country</th>
        <th>Customer State</th>
         <th>Customer City</th>
      <th>Customer Employment Status</th>
      <th>Customer Occupation</th>
      <th>Customer Monthly Income</th>
      <th>Customer Bvn Number</th>
      <th>Customer Bank Name</th>
      <th>Customer Bank Account</th>
      <th>Customer Guarantor 1 Fullname</th>
      <th>Customer Guarantor 1 Phone</th>
      <th>Customer Guarantor 1 Identity Type</th>
      <th>Customer Guarantor 1 Id Number</th>
      <th>Customer Guarantor 1 Card</th>
      <th>Customer Guarantor 2 Fullname</th>
      <th>Customer Guarantor 2 Phone</th>
      <th>Customer Guarantor 2 Identity Type</th>
      <th>Customer Guarantor 2 Id Number</th>
      <th>Customer Guarantor 2 Card</th>
      <th>Kyc Status</th>
      <th>Date Created</th>
    
  </tr>
  ';
foreach ($result as $rows) {
    $excel .= '<tr>
	<td>' . $rows->customer_fullname . '</td>
	<td>' . $rows->customer_date_of_birth . '</td>
	<td>' . $rows->customer_gender . '</td>
	<td>' . $rows->customer_passport_photo . '</td>
	<td>' . $rows->customer_identity_type . '</td>
	<td>' . $rows->customer_identity_card . '</td>
	<td>' . $rows->customer_contact_address . '</td>
     <td>' . $rows->country . '</td>
     <td>' . $rows->state . '</td>
     <td>' . $rows->city . '</td>
	<td>' . $rows->customer_employment_status . '</td>
	<td>' . $rows->customer_occupation . '</td>
	<td>' . $rows->customer_monthly_income . '</td>
	<td>' . $rows->customer_bvn_number . '</td>
	<td>' . $rows->customer_bank_name . '</td>
	<td>' . $rows->customer_bank_account . '</td>
	<td>' . $rows->customer_ec1_fullname . '</td>
	<td>' . $rows->customer_ec1_phone . '</td>
	<td>' . $rows->customer_ec1_identity_type . '</td>
	<td>' . $rows->customer_ec1_id_number . '</td>
	<td>' . $rows->customer_ec1_card . '</td>
	<td>' . $rows->customer_ec2_fullname . '</td>
	<td>' . $rows->customer_ec2_phone . '</td>
	<td>' . $rows->customer_ec2_identity_type . '</td>
	<td>' . $rows->customer_ec2_id_number . '</td>
	<td>' . $rows->customer_ec2_card . '</td>
	<td>' . $rows->kyc_updated . '</td>
	<td>' . $rows->kyc_status . '</td>
	<td>' . $rows->date_created . '</td>
	</tr>';
}
$excel .= '</table>';
$filename1 = 'orange_credit_kyc_' . date('Y-m-d') . '.doc';
$filename2 = 'orange_credit_kyc_' . date('Y-m-d') . '.xls';
$pdf_output = 'orange_credit_kyc_' . date('Y-m-d') . '.pdf';
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