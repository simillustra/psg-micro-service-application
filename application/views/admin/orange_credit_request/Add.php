
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Add.php
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_request
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	?>
	
	 
	 <form action="<?php echo H_ADMIN_MAIN.'&view=orange_credit_request&do=addpro';?>" method="post" name="hezecomform" id="hezecomform" enctype="multipart/form-data">
	<div class="col-12">
	<ul class="nav pull-right" style="margin-top:5px;">
	  <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i class="fa fa-floppy-o"></i> <?php echo LANG_CREATE_RECORD;?></label>
	 <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_CREATE_RECORD;?>" />
	 	 
	  <a href="<?php echo H_ADMIN;?>&view=orange_credit_request&do=viewall" class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL;?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK;?></a>
	</ul>
	<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <?php echo LANG_CREATE_NEW;?> Orange Credit Request</h3></div>
  <div class="panel-body">
	
	 <div class="output"></div>
	  
	<div class="form-group">
    <label class="control-label" for="credit_request_type">Credit Request Type</label>
	<input id="credit_request_type" name="credit_request_type" type="text" maxlength="100"  value="" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="credit_request_beneficary">Credit Request Beneficary</label>
	<input id="credit_request_beneficary" name="credit_request_beneficary" type="text" maxlength="100"  value="" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="credit_request_beneficary_school">Credit Request Beneficary School</label>
	<input id="credit_request_beneficary_school" name="credit_request_beneficary_school" type="text" maxlength="100"  value="" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="credit_request_annual_school_fees">Credit Request Annual School Fees</label>
	<input id="credit_request_annual_school_fees" name="credit_request_annual_school_fees" type="text" maxlength="100"  value="" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="credit_request_monthly_contribution">Credit Request Monthly Contribution</label>
	<input id="credit_request_monthly_contribution" name="credit_request_monthly_contribution" type="text" maxlength="100"  value="" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="credit_request_charge">Credit Request Charge</label>
	<input id="credit_request_charge" name="credit_request_charge" type="text" maxlength="100"  value="" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="credit_request_status">Credit Request Status</label>
	<input id="credit_request_status" name="credit_request_status" type="text" maxlength="100"  value="" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="credit_request_activated">Credit Request Activated</label>
	<input id="credit_request_activated" name="credit_request_activated" type="text" maxlength="100"  value="" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="credit_request_transction_code">Credit Request Transction Code</label>
	<input id="credit_request_transction_code" name="credit_request_transction_code" type="text" maxlength="100"  value="" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="credit_request_approved_by">Credit Request Approved By</label>
	<input id="credit_request_approved_by" name="credit_request_approved_by" type="text" maxlength="100"  value="" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="credit_request_approvedAt">Credit Request ApprovedAt</label>
	<input name="credit_request_approvedAt" class="datepicker form-control styler" type="text" maxlength="100" value="<?php echo date('Y-m-d');?>" />
	</div>

	<div class="form-group">
    <label class="control-label" for="credit_request_date_createdAt">Credit Request Date CreatedAt</label>
	<input name="credit_request_date_createdAt" class="datepicker form-control styler" type="text" maxlength="100" value="<?php echo date('Y-m-d');?>" />
	</div>

	<div class="form-group">
    <label class="control-label" for="credit_request_date_modifiedAt">Credit Request Date ModifiedAt</label>
	<input name="credit_request_date_modifiedAt" class="datepicker form-control styler" type="text" maxlength="100" value="<?php echo date('Y-m-d');?>" />
	</div>

	<div class="form-group">
    <label class="control-label" for="user_id">User Id</label>
	<input id="user_id" name="user_id" type="text" maxlength="11"  value="" class="form-control styler" />
	</div>

	 <div class="output"></div>
	  </div>
	   <div class="panel-footer" style="border-bottom:solid 2px #CCC;"> 
     <label for="hButton" class="btn btn-info" style="color:#FFF;"><i class="fa fa-floppy-o"></i> <?php echo LANG_CREATE_RECORD;?></label>
	 <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_CREATE_RECORD;?>" />
	 	 </div>
	 	 
	  
	
 </div><!--/col-12-->
	
	</form>
	 