
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Export.php
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
	$excel.='<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
	<tr>
      <th>Loan Type</th>
      <th>Business Type</th>
      <th>Monthly Revenue</th>
      <th>Loan Request Amount</th>
      <th>Loan Repayment Amount</th>
      <th>Loan Tenure</th>
      <th>Loan Interest</th>
      <th>Activation Fee</th>
      <th>Request Date</th>
      <th>Loan Status</th>
      <th>Userid</th>
  </tr>
  ';
	foreach($result as $rows)
			{
	$excel.='<tr>
	<td>'.$rows->loan_type.'</td>
	<td>'.$rows->business_type.'</td>
	<td>'.$rows->monthly_revenue.'</td>
	<td>'.$rows->loan_request_amount.'</td>
	<td>'.$rows->loan_repayment_amount.'</td>
	<td>'.$rows->loan_tenure.'</td>
	<td>'.$rows->loan_interest.'</td>
	<td>'.$rows->activation_fee.'</td>
	<td>'.$rows->request_date.'</td>
	<td>'.$rows->loan_status.'</td>
	<td>'.$rows->userid.'</td>
	</tr>';
	}
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
	elseif ($etype == 'PDF') {
	HezecomPDF($excel, $pdf_output);
	}
	?>