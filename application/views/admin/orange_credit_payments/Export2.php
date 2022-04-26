
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Export2.php
	* DATE CREATED:  	01-04-2020
	* FOR TABLE:  		orange_credit_payments
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
	<strong>'.LANG_REPORT_TABLE.'</strong> Orange Credit Payments</p>';
	$excel.='
	<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
    <tr>
	<td>Transaction Id</td>
	<td>'.$rows->transaction_id.'</td>
  	</tr>
    <tr>
	<td>Transaction Amount</td>
	<td>'.$rows->transaction_amount.'</td>
  	</tr>
    <tr>
	<td>Transaction Desc</td>
	<td>'.$rows->transaction_desc.'</td>
  	</tr>
    <tr>
	<td>Transaction Provider</td>
	<td>'.$rows->transaction_provider.'</td>
  	</tr>
    <tr>
	<td>Transaction Status</td>
	<td>'.$rows->transaction_status.'</td>
  	</tr>
    <tr>
	<td>Transaction Date</td>
	<td>'.$rows->transaction_date.'</td>
  	</tr>
    <tr>
	<td>Transaction User</td>
	<td>'.$rows->transaction_user.'</td>
  	</tr>';
   $excel.='</table>';
	
	$filename1= 'orange_credit_payments_'.date('Y-m-d').'.doc';
	$filename2= 'orange_credit_payments_'.date('Y-m-d').'.xls';
	$pdf_output= 'orange_credit_payments_'.date('Y-m-d').'.pdf';
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
	