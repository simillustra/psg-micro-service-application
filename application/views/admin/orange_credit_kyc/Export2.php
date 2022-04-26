<?php
/*
* =======================================================================
* FILE NAME:        Export2.php
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
$excel .= '
	<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
    <tr>
	<td>Customer Fullname</td>
	<td>' . $rows->customer_fullname . '</td>
  	</tr>
    <tr>
	<td>Customer Date Of Birth</td>
	<td>' . $rows->customer_date_of_birth . '</td>
  	</tr>
    <tr>
	<td>Customer Gender</td>
	<td>' . $rows->customer_gender . '</td>
  	</tr>
    <tr>
	<td>Customer Passport Photo</td>
	<td>' . $rows->customer_passport_photo . '</td>
  	</tr>
    <tr>
	<td>Customer Identity Type</td>
	<td>' . $rows->customer_identity_type . '</td>
  	</tr>
    <tr>
	<td>Customer Identity Card</td>
	<td>' . $rows->customer_identity_card . '</td>
  	</tr>
    <tr>
	<td>Customer Contact Address</td>
	<td>' . $rows->customer_contact_address . '</td>
  	</tr>
     <tr>
                        <td>Customer Country</td>
                        <td>' . $rows->country . '</td>
                    </tr>
                    <tr>
                        <td>Customer State</td>
                        <td>' . $rows->state . '</td>
                    </tr>
                    <tr>
                        <td>Customer City</td>
                        <td>' . $rows->city . '</td>
                    </tr>

                    <tr>
    <tr>
	<td>Customer Employment Status</td>
	<td>' . $rows->customer_employment_status . '</td>
  	</tr>
    <tr>
	<td>Customer Occupation</td>
	<td>' . $rows->customer_occupation . '</td>
  	</tr>
    <tr>
	<td>Customer Monthly Income</td>
	<td>' . $rows->customer_monthly_income . '</td>
  	</tr>
    <tr>
	<td>Customer Bvn Number</td>
	<td>' . $rows->customer_bvn_number . '</td>
  	</tr>
    <tr>
	<td>Customer Bank Name</td>
	<td>' . $rows->customer_bank_name . '</td>
  	</tr>
    <tr>
	<td>Customer Bank Account</td>
	<td>' . $rows->customer_bank_account . '</td>
  	</tr>
    <tr>
	<td>Customer Guarantor 1Fullname</td>
	<td>' . $rows->customer_ec1_fullname . '</td>
  	</tr>
    <tr>
	<td>Customer Guarantor 1 Phone</td>
	<td>' . $rows->customer_ec1_phone . '</td>
  	</tr>
    <tr>
	<td>Customer Guarantor 1 Identity Type</td>
	<td>' . $rows->customer_ec1_identity_type . '</td>
  	</tr>
    <tr>
	<td>Customer Guarantor 1 Id Number</td>
	<td>' . $rows->customer_ec1_id_number . '</td>
  	</tr>
    <tr>
	<td>Customer Guarantor 1 Card</td>
	<td>' . $rows->customer_ec1_card . '</td>
  	</tr>
    <tr>
	<td>Customer Guarantor 2 Fullname</td>
	<td>' . $rows->customer_ec2_fullname . '</td>
  	</tr>
    <tr>
	<td>Customer Guarantor 2 Phone</td>
	<td>' . $rows->customer_ec2_phone . '</td>
  	</tr>
    <tr>
	<td>Customer Guarantor 2 Identity Type</td>
	<td>' . $rows->customer_ec2_identity_type . '</td>
  	</tr>
    <tr>
	<td>Customer Guarantor 2 Id Number</td>
	<td>' . $rows->customer_ec2_id_number . '</td>
  	</tr>
    <tr>
	<td>Customer Guarantor 2 Card</td>
	<td>' . $rows->customer_ec2_card . '</td>
  	</tr>   
    <tr>
	<td>Kyc Status</td>
	<td>' . $rows->kyc_status . '</td>
  	</tr>
    <tr>
	<td>Date Created</td>
	<td>' . $rows->date_created . '</td>
  	</tr>';
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
}
	