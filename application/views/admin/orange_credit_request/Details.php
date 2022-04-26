
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Details.php
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_request
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			Simillustra (http://simillustra.com) info@simillustra.com
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	?>
	
	<div class="row">
    <div class="col-xs-12">
    <div class="box">
    <div class="box-header">
    <h3 class="box-title">Orange Credit Request</h3>
   <ul class="nav pull-right">
				
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_request&do=viewall" class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_VIEWALL;?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK;?></a>
	
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_request&do=add" class="btn btn-default btn-xs tip" title="<?php echo LANG_TIP_ADD;?>"><i class="fa fa-plus"></i> <?php echo LANG_ADD;?></a>
	
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_request&id=<?php echo $rows->id;?>&do=update" title="<?php echo LANG_TIP_UPDATE;?> Record" class="btn btn-default btn-xs tip"><i class="fa fa-edit"></i> <?php echo LANG_UPDATE;?></a>
		
	<a href="<?php echo H_ADMIN_MAIN;?>&view=orange_credit_request&id=<?php echo $rows->id;?>&do=export2&hexport=yes&etype=word" title="<?php echo LANG_TIP_WORD;?>" class="btn btn-default btn-xs tip"><i class="fa fa-file-o"></i> <?php echo LANG_WORD;?></a>
	
	<a href="<?php echo H_ADMIN_MAIN;?>&view=orange_credit_request&id=<?php echo $rows->id;?>&do=export2&hexport=yes&etype=printer" title="<?php echo LANG_TIP_PRINT;?>" target="_blank" class="btn btn-default btn-xs tip"><i class="fa fa-print"></i> <?php echo LANG_PRINT;?></a>
	
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_request&id=<?php echo $rows->id;?>&do=delete&dfile=" title="<?php echo LANG_TIP_DELETE_ALL;?>" class="btn btn-default btn-xs tip" data-confirm="<?php echo LANG_DELETE_AUTH;?>"><i class="fa fa-trash-o"></i> <?php echo LANG_DELETE;?></a>
	</ul>
	
	 </div><!-- /.box-header -->
   <div class="box-body">
	<table data-page="false" class="table table-striped table-bordered">
	 <tbody>
		  	
	<tr>
	<th>Credit Request Type</th><td><?php echo $rows->credit_request_type;?></td>
	</tr>
		
	<tr>
	<th>Credit Request Beneficary</th><td><?php echo $rows->credit_request_beneficary;?></td>
	</tr>
		
	<tr>
	<th>Credit Request Beneficary School</th><td><?php echo $rows->credit_request_beneficary_school;?></td>
	</tr>
		
	<tr>
	<th>Credit Request Annual School Fees</th><td><?php echo $rows->credit_request_annual_school_fees;?></td>
	</tr>
		
	<tr>
	<th>Credit Request Monthly Contribution</th><td><?php echo $rows->credit_request_monthly_contribution;?></td>
	</tr>
		
	<tr>
	<th>Credit Request Charge</th><td><?php echo $rows->credit_request_charge;?></td>
	</tr>
		
	<tr>
	<th>Credit Request Status</th><td><?php echo $rows->credit_request_status;?></td>
	</tr>
		
	<tr>
	<th>Credit Request Activated</th><td><?php echo $rows->credit_request_activated;?></td>
	</tr>
		
	<tr>
	<th>Credit Request Transction Code</th><td><?php echo $rows->credit_request_transction_code;?></td>
	</tr>
		
	<tr>
	<th>Credit Request Approved By</th><td><?php echo $rows->credit_request_approved_by;?></td>
	</tr>
		
	<tr>
	<th>Credit Request ApprovedAt</th><td><?php echo $rows->credit_request_approvedAt;?></td>
	</tr>
		
	<tr>
	<th>Credit Request Date CreatedAt</th><td><?php echo $rows->credit_request_date_createdAt;?></td>
	</tr>
		
	<tr>
	<th>Credit Request Date ModifiedAt</th><td><?php echo $rows->credit_request_date_modifiedAt;?></td>
	</tr>
		
	<tr>
	<th>User Id</th><td><?php echo $rows->user_id;?></td>
	</tr>
	</tbody>
	</table>
	 </div><!-- /.box-body -->
  </div><!-- /.box -->
  </div><!-- /.col -->
  </div><!-- /.row -->
	