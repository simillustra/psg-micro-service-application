
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Export2.php
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_notifications
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
	<strong>'.LANG_REPORT_TABLE.'</strong> Orange Credit Notifications</p>';
	$excel.='
	<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
    <tr>
	<td>Reciever</td>
	<td>'.$rows->reciever.'</td>
  	</tr>
    <tr>
	<td>Subject</td>
	<td>'.$rows->subject.'</td>
  	</tr>
    <tr>
	<td>Type</td>
	<td>'.$rows->type.'</td>
  	</tr>
    <tr>
	<td>Sms Message</td>
	<td>'.$rows->sms_message.'</td>
  	</tr>
    <tr>
	<td>Email Message</td>
	<td>'.$rows->email_message.'</td>
  	</tr>
    <tr>
	<td>Status</td>
	<td>'.$rows->status.'</td>
  	</tr>
    <tr>
	<td>Date</td>
	<td>'.$rows->date.'</td>
  	</tr>';
   $excel.='</table>';
	
	$filename1= 'orange_credit_notifications_'.date('Y-m-d').'.doc';
	$filename2= 'orange_credit_notifications_'.date('Y-m-d').'.xls';
	$pdf_output= 'orange_credit_notifications_'.date('Y-m-d').'.pdf';
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
	