
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Export.php
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
	$excel.='<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
	<tr>
      <th>Credit Request Type</th>
      <th>Credit Request Beneficary</th>
      <th>Credit Request Beneficary School</th>
      <th>Credit Request Annual School Fees</th>
      <th>Credit Request Monthly Contribution</th>
      <th>Credit Request Charge</th>
      <th>Credit Request Status</th>
      <th>Credit Request Activated</th>
      <th>Credit Request Transction Code</th>
      <th>Credit Request Approved By</th>
      <th>Credit Request ApprovedAt</th>
      <th>Credit Request Date CreatedAt</th>
      <th>Credit Request Date ModifiedAt</th>
      <th>User Id</th>
  </tr>
  ';
	foreach($result as $rows)
			{
	$excel.='<tr>
	<td>'.$rows->credit_request_type.'</td>
	<td>'.$rows->credit_request_beneficary.'</td>
	<td>'.$rows->credit_request_beneficary_school.'</td>
	<td>'.$rows->credit_request_annual_school_fees.'</td>
	<td>'.$rows->credit_request_monthly_contribution.'</td>
	<td>'.$rows->credit_request_charge.'</td>
	<td>'.$rows->credit_request_status.'</td>
	<td>'.$rows->credit_request_activated.'</td>
	<td>'.$rows->credit_request_transction_code.'</td>
	<td>'.$rows->credit_request_approved_by.'</td>
	<td>'.$rows->credit_request_approvedAt.'</td>
	<td>'.$rows->credit_request_date_createdAt.'</td>
	<td>'.$rows->credit_request_date_modifiedAt.'</td>
	<td>'.$rows->user_id.'</td>
	</tr>';
	}
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
	elseif ($etype == 'PDF') {
	HezecomPDF($excel, $pdf_output);
	}
	?>