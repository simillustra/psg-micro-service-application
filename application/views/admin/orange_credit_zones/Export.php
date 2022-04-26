
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Export.php
	* DATE CREATED:  	15-04-2020
	* FOR TABLE:  		orange_credit_zones
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
	<strong>'.LANG_REPORT_TABLE.'</strong> Orange Credit Zones</p>';
	$excel.='<table border="1" cellspacing="0" width="100%" style="font-family:arial; font-size:14px;" cellpadding="5">
	<tr>
      <th>Zone Name</th>
      <th>Zone Coverage</th>
      <th>Zone Status</th>
      <th>Zone City</th>
      <th>Zone State</th>
      <th>Zone Country</th>
      <th>Zone CreatedAt</th>
      <th>Zone ModifiedAt</th>
      <th>Zone User</th>
  </tr>
  ';
	foreach($result as $rows)
			{
	$excel.='<tr>
	<td>'.$rows->zone_name.'</td>
	<td>'.$rows->zone_coverage.'</td>
	<td>'.$rows->zone_status.'</td>
	<td>'.$rows->zone_city.'</td>
	<td>'.$rows->zone_state.'</td>
	<td>'.$rows->zone_country.'</td>
	<td>'.$rows->zone_createdAt.'</td>
	<td>'.$rows->zone_modifiedAt.'</td>
	<td>'.$rows->zone_user.'</td>
	</tr>';
	}
	$excel.='</table>';
	$filename1= 'orange_credit_zones_'.date('Y-m-d').'.doc';
	$filename2= 'orange_credit_zones_'.date('Y-m-d').'.xls';
	$pdf_output= 'orange_credit_zones_'.date('Y-m-d').'.pdf';
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