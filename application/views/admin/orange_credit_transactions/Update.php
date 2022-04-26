
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Update.php
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_transactions
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	?>
	
	 
	 <form action="<?php echo H_ADMIN_MAIN.'&view=orange_credit_transactions&do=updatepro';?>" method="post" name="hezecomform" id="hezecomform" enctype="multipart/form-data">
	<div class="col-12">
	<ul class="nav pull-right" style="margin-top:5px;">
	  <label for="hButton" class="btn btn-info btn-sm" style="color:#FFF;"><i class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD;?></label>
	 <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_UPDATE_RECORD;?>" />
	 	 
	  <a href="<?php echo H_ADMIN;?>&view=orange_credit_transactions&id=<?php echo $rows->id;?>&do=details" title="View Details" class="btn btn-default btn-sm tip"><i class="fa fa-th-list"></i> <?php echo LANG_DETAILS;?></a>
	
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_transactions&id=<?php echo $rows->id;?>&do=delete&dfile=" title="<?php echo LANG_TIP_DELETE;?>" class="btn btn-default btn-sm tip" data-confirm="<?php echo LANG_DELETE_AUTH;?>"><i class="fa fa-trash-o"></i> <?php echo LANG_DELETE;?></a>
	
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_transactions&do=viewall" class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL;?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK;?></a>
	</ul>
	<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <?php echo LANG_UPDATE;?> Orange Credit Transactions</h3></div>
  <div class="panel-body">
	
	 <div class="output"></div>
	  
	<input type="hidden" name="id" value="<?php echo $rows->id;?>">
	<div class="form-group">
    <label class="control-label" for="transactionid">Transactionid</label>
	<input id="transactionid" name="transactionid" type="text" maxlength="100"  value="<?php echo $rows->transactionid;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="sender_id">Sender Id</label>
	<input id="sender_id" name="sender_id" type="text" maxlength="11"  value="<?php echo $rows->sender_id;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="sender_account">Sender Account</label>
	<input id="sender_account" name="sender_account" type="text" maxlength="100"  value="<?php echo $rows->sender_account;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="receiver_id">Receiver Id</label>
	<input id="receiver_id" name="receiver_id" type="text" maxlength="11"  value="<?php echo $rows->receiver_id;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="receiver_account">Receiver Account</label>
	<input id="receiver_account" name="receiver_account" type="text" maxlength="100"  value="<?php echo $rows->receiver_account;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="payment_method">Payment Method</label>
	<input id="payment_method" name="payment_method" type="text" maxlength="100"  value="<?php echo $rows->payment_method;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="amount">Amount</label>
	<input id="amount" name="amount" type="text" maxlength="100"  value="<?php echo $rows->amount;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="payment_status">Payment Status</label>
	<input id="payment_status" name="payment_status" type="text" maxlength="100"  value="<?php echo $rows->payment_status;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="transaction_type">Transaction Type</label>
	<input id="transaction_type" name="transaction_type" type="text" maxlength="100"  value="<?php echo $rows->transaction_type;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="payment_date">Payment Date</label>
	<input name="payment_date" class="datepicker form-control styler" type="text" maxlength="100" value="<?php echo $rows->payment_date;?>" />
	</div>

	 <div class="output"></div>
	  </div>
	   <div class="panel-footer" style="border-bottom:solid 2px #CCC;"> 
     <label for="hButton" class="btn btn-info" style="color:#FFF;"><i class="fa fa-floppy-o"></i> <?php echo LANG_UPDATE_RECORD;?></label>
	 <input type="submit" name="button" id="hButton" class="hidden" value="<?php echo LANG_UPDATE_RECORD;?>" />
	 	 </div>
	 	 
	  
	
 </div><!--/col-12-->
	
	</form>
	 