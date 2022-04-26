
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Export.php
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_messages
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
	<strong>'.LANG_REPORT_TABLE.'</strong> Orange Credit Messages</p>';
	$excel.='<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
	<tr>
      <th>User To</th>
      <th>User From</th>
      <th>Subject</th>
      <th>Message</th>
      <th>Attachment</th>
      <th>Respond</th>
      <th>Sender Open</th>
      <th>Receiver Open</th>
      <th>Sender Delete</th>
      <th>Receiver Delete</th>
  </tr>
  ';
	foreach($result as $rows)
			{
	$excel.='<tr>
	<td>'.$rows->user_to.'</td>
	<td>'.$rows->user_from.'</td>
	<td>'.$rows->subject.'</td>
	<td>'.$rows->message.'</td>
	<td>'.$rows->attachment.'</td>
	<td>'.$rows->respond.'</td>
	<td>'.$rows->sender_open.'</td>
	<td>'.$rows->receiver_open.'</td>
	<td>'.$rows->sender_delete.'</td>
	<td>'.$rows->receiver_delete.'</td>
	</tr>';
	}
	$excel.='</table>';
	$filename1= 'orange_credit_messages_'.date('Y-m-d').'.doc';
	$filename2= 'orange_credit_messages_'.date('Y-m-d').'.xls';
	$pdf_output= 'orange_credit_messages_'.date('Y-m-d').'.pdf';
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