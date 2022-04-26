
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Export2.php
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_transactions
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
	<strong>'.LANG_REPORT_TABLE.'</strong> Orange Credit Transactions</p>';
	$excel.='
	<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
    <tr>
	<td>Transactionid</td>
	<td>'.$rows->transactionid.'</td>
  	</tr>
    <tr>
	<td>Sender Id</td>
	<td>'.$rows->sender_id.'</td>
  	</tr>
    <tr>
	<td>Sender Account</td>
	<td>'.$rows->sender_account.'</td>
  	</tr>
    <tr>
	<td>Receiver Id</td>
	<td>'.$rows->receiver_id.'</td>
  	</tr>
    <tr>
	<td>Receiver Account</td>
	<td>'.$rows->receiver_account.'</td>
  	</tr>
    <tr>
	<td>Payment Method</td>
	<td>'.$rows->payment_method.'</td>
  	</tr>
    <tr>
	<td>Amount</td>
	<td>'.$rows->amount.'</td>
  	</tr>
    <tr>
	<td>Payment Status</td>
	<td>'.$rows->payment_status.'</td>
  	</tr>
    <tr>
	<td>Transaction Type</td>
	<td>'.$rows->transaction_type.'</td>
  	</tr>
    <tr>
	<td>Payment Date</td>
	<td>'.$rows->payment_date.'</td>
  	</tr>';
   $excel.='</table>';
	
	$filename1= 'orange_credit_transactions_'.date('Y-m-d').'.doc';
	$filename2= 'orange_credit_transactions_'.date('Y-m-d').'.xls';
	$pdf_output= 'orange_credit_transactions_'.date('Y-m-d').'.pdf';
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
	