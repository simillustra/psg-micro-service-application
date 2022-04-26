
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Update.php
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_payment_history
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	?>
	
	 
	 <form action="<?php echo H_ADMIN_MAIN.'&view=orange_credit_payment_history&do=updatepro';?>" method="post" name="hezecomform" id="hezecomform" enctype="multipart/form-data">
	<div class="col-12">
	<ul class="nav pull-right" style="margin-top:5px;">
	  <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD;?></label>
	 <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_UPDATE_RECORD;?>" />
	 	 
	  <a href="<?php echo H_ADMIN;?>&view=orange_credit_payment_history&id=<?php echo $rows->id;?>&do=details" title="View Details" class="btn btn-default btn-sm tip"><i class="fa fa-th-list"></i> <?php echo LANG_DETAILS;?></a>
	
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_payment_history&id=<?php echo $rows->id;?>&do=delete&dfile=" title="<?php echo LANG_TIP_DELETE;?>" class="btn btn-default btn-sm tip" data-confirm="<?php echo LANG_DELETE_AUTH;?>"><i class="fa fa-trash-o"></i> <?php echo LANG_DELETE;?></a>
	
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_payment_history&do=viewall" class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL;?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK;?></a>
	</ul>
	<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <?php echo LANG_UPDATE;?> Orange Credit Payment History</h3></div>
  <div class="panel-body">
	
	 <div class="output"></div>
	  
	<input type="hidden" name="id" value="<?php echo $rows->id;?>">
	<div class="form-group">
    <label class="control-label" for="userid">Userid</label>
	<input id="userid" name="userid" type="text" maxlength="12"  value="<?php echo $rows->userid;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="account_id">Account Id</label>
	<input id="account_id" name="account_id" type="text" maxlength="50"  value="<?php echo $rows->account_id;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="payment_method">Payment Method</label>
	<input id="payment_method" name="payment_method" type="text" maxlength="50"  value="<?php echo $rows->payment_method;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="loan_id">Loan Id</label>
	<input id="loan_id" name="loan_id" type="text" maxlength="12"  value="<?php echo $rows->loan_id;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="amount">Amount</label>
	<input id="amount" name="amount" type="text" maxlength="12"  value="<?php echo $rows->amount;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="status">Status</label>
	<input id="status" name="status" type="text" maxlength="50"  value="<?php echo $rows->status;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="transaction_id">Transaction Id</label>
	<input id="transaction_id" name="transaction_id" type="text" maxlength="100"  value="<?php echo $rows->transaction_id;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="ref_id">Ref Id</label>
	<input id="ref_id" name="ref_id" type="text" maxlength="100"  value="<?php echo $rows->ref_id;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="charged_day">Charged Day</label>
	<input name="charged_day" class="datepicker form-control styler" type="text" maxlength="100" value="<?php echo $rows->charged_day;?>" />
	</div>

	 <div class="output"></div>
	  </div>
	   <div class="panel-footer" style="border-bottom:solid 2px #CCC;"> 
     <label for="hButton" class="btn btn-info" style="color:#FFF;"><i class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD;?></label>
	 <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_UPDATE_RECORD;?>" />
	 	 </div>
	 	 
	  
	
 </div><!--/col-12-->
	
	</form>
	 