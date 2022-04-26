
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Export2.php
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_request
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			Simillustra (http://simillustra.com) info@simillustra.com
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	?>
	<?php
	$etype=get('etype');
	$excel='
	<p style="font-family:arial; font-size:18px;" align="left">
	<strong style="font-family:arial;">'.LANG_REPORT_TITLE.'</strong><br>'.LANG_REPORT_SUB_TITLE.'<br>
	<strong>'.LANG_REPORT_TABLE.'</strong> Orange Credit Request</p>';
	$excel.='
	<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
    <tr>
	<td>Credit Request Type</td>
	<td>'.$rows->credit_request_type.'</td>
  	</tr>
    <tr>
	<td>Credit Request Beneficary</td>
	<td>'.$rows->credit_request_beneficary.'</td>
  	</tr>
    <tr>
	<td>Credit Request Beneficary School</td>
	<td>'.$rows->credit_request_beneficary_school.'</td>
  	</tr>
    <tr>
	<td>Credit Request Annual School Fees</td>
	<td>'.$rows->credit_request_annual_school_fees.'</td>
  	</tr>
    <tr>
	<td>Credit Request Monthly Contribution</td>
	<td>'.$rows->credit_request_monthly_contribution.'</td>
  	</tr>
    <tr>
	<td>Credit Request Charge</td>
	<td>'.$rows->credit_request_charge.'</td>
  	</tr>
    <tr>
	<td>Credit Request Status</td>
	<td>'.$rows->credit_request_status.'</td>
  	</tr>
    <tr>
	<td>Credit Request Activated</td>
	<td>'.$rows->credit_request_activated.'</td>
  	</tr>
    <tr>
	<td>Credit Request Transction Code</td>
	<td>'.$rows->credit_request_transction_code.'</td>
  	</tr>
    <tr>
	<td>Credit Request Approved By</td>
	<td>'.$rows->credit_request_approved_by.'</td>
  	</tr>
    <tr>
	<td>Credit Request ApprovedAt</td>
	<td>'.$rows->credit_request_approvedAt.'</td>
  	</tr>
    <tr>
	<td>Credit Request Date CreatedAt</td>
	<td>'.$rows->credit_request_date_createdAt.'</td>
  	</tr>
    <tr>
	<td>Credit Request Date ModifiedAt</td>
	<td>'.$rows->credit_request_date_modifiedAt.'</td>
  	</tr>
    <tr>
	<td>User Id</td>
	<td>'.$rows->user_id.'</td>
  	</tr>';
   $excel.='</table>';
	
	$filename1= 'orange_credit_request_'.date('Y-m-d').'.doc';
	$filename2= 'orange_credit_request_'.date('Y-m-d').'.xls';
	$pdf_output= 'orange_credit_request_'.date('Y-m-d').'.pdf';
	if ($etype == 'word') {
	header("Content-type: application/msword");
	header("Content-Disposition: attachment; filename=$filename1");
	header("Pragma: no-cache");
	header("Expires: 0");
	print $excel;
	}
	elseif ($etype == 'excel') {
	header("Content-type: application/msexcel");
	header("Content-Disposition: attachment; filename=$filename2");
	header("Pragma: no-cache");
	header("Expires: 0");
	print $excel;
	}
	elseif ($etype == 'printer') {
	print'<title>'.H_TITLE.'</title>
	<script type="text/javascript">
	window.onload = function () {
		window.print();
	}
	</script>
	';
	print $excel;
	}
	