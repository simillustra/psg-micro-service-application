
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Export.php
	* DATE CREATED:  	01-04-2020
	* FOR TABLE:  		orange_credit_coupons
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
	<strong>'.LANG_REPORT_TABLE.'</strong> Orange Credit Coupons</p>';
	$excel.='<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
	<tr>
      <th>Coupon Code</th>
      <th>Coupon Amount</th>
      <th>Coupon Trans Id</th>
      <th>Coupon Payment Mode</th>
      <th>Coupon Status</th>
      <th>Coupon Date Added</th>
      <th>Coupon Date Activated</th>
      <th>Coupon User</th>
  </tr>
  ';
	foreach($result as $rows)
			{
	$excel.='<tr>
	<td>'.$rows->coupon_code.'</td>
	<td>'.$rows->coupon_amount.'</td>
	<td>'.$rows->coupon_trans_id.'</td>
	<td>'.$rows->coupon_payment_mode.'</td>
	<td>'.$rows->coupon_status.'</td>
	<td>'.$rows->coupon_date_added.'</td>
	<td>'.$rows->coupon_date_activated.'</td>
	<td>'.$rows->coupon_user.'</td>
	</tr>';
	}
	$excel.='</table>';
	$filename1= 'orange_credit_coupons_'.date('Y-m-d').'.doc';
	$filename2= 'orange_credit_coupons_'.date('Y-m-d').'.xls';
	$pdf_output= 'orange_credit_coupons_'.date('Y-m-d').'.pdf';
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