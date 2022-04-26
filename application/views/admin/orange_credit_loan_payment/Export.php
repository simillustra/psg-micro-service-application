
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Export.php
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_loan_payment
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
	<strong>'.LANG_REPORT_TABLE.'</strong> Orange Credit Loan Payment</p>';
	$excel.='<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
	<tr>
      <th>Payment Date</th>
      <th>Paid Amount</th>
      <th>Principle Amount</th>
      <th>Interest Amount</th>
      <th>Balance</th>
      <th>Userid</th>
      <th>Loan Id</th>
  </tr>
  ';
	foreach($result as $rows)
			{
	$excel.='<tr>
	<td>'.$rows->payment_date.'</td>
	<td>'.$rows->paid_amount.'</td>
	<td>'.$rows->principle_amount.'</td>
	<td>'.$rows->interest_amount.'</td>
	<td>'.$rows->balance.'</td>
	<td>'.$rows->userid.'</td>
	<td>'.$rows->loan_id.'</td>
	</tr>';
	}
	$excel.='</table>';
	$filename1= 'orange_credit_loan_payment_'.date('Y-m-d').'.doc';
	$filename2= 'orange_credit_loan_payment_'.date('Y-m-d').'.xls';
	$pdf_output= 'orange_credit_loan_payment_'.date('Y-m-d').'.pdf';
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