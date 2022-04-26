
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Export2.php
	* DATE CREATED:  	07-03-2020
	* FOR TABLE:  		orange_credit_micro_loan_request
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
	<strong>'.LANG_REPORT_TABLE.'</strong> Orange Credit Micro Loan Request</p>';
	$excel.='
	<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
    <tr>
	<td>Loan Type</td>
	<td>'.$rows->loan_type.'</td>
  	</tr>
    <tr>
	<td>Business Type</td>
	<td>'.$rows->business_type.'</td>
  	</tr>
    <tr>
	<td>Monthly Revenue</td>
	<td>'.$rows->monthly_revenue.'</td>
  	</tr>
    <tr>
	<td>Loan Request Amount</td>
	<td>'.$rows->loan_request_amount.'</td>
  	</tr>
    <tr>
	<td>Loan Repayment Amount</td>
	<td>'.$rows->loan_repayment_amount.'</td>
  	</tr>
    <tr>
	<td>Loan Tenure</td>
	<td>'.$rows->loan_tenure.'</td>
  	</tr>
    <tr>
	<td>Loan Interest</td>
	<td>'.$rows->loan_interest.'</td>
  	</tr>
    <tr>
	<td>Activation Fee</td>
	<td>'.$rows->activation_fee.'</td>
  	</tr>
    <tr>
	<td>Request Date</td>
	<td>'.$rows->request_date.'</td>
  	</tr>
    <tr>
	<td>Loan Status</td>
	<td>'.$rows->loan_status.'</td>
  	</tr>
    <tr>
	<td>Userid</td>
	<td>'.$rows->userid.'</td>
  	</tr>';
   $excel.='</table>';
	
	$filename1= 'orange_credit_micro_loan_request_'.date('Y-m-d').'.doc';
	$filename2= 'orange_credit_micro_loan_request_'.date('Y-m-d').'.xls';
	$pdf_output= 'orange_credit_micro_loan_request_'.date('Y-m-d').'.pdf';
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
	