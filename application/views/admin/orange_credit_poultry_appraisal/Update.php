
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Update.php
	* DATE CREATED:  	26-04-2022
	* FOR TABLE:  		orange_credit_poultry_appraisal
	* PRODUCED BY:		HEZECOM UltimateSpeed PHP CODE GENERATOR
	* AUTHOR:			Hezecom (http://hezecom.com) info@hezecom.net
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	?>
	
	<div class="heze-table">
	<div class="col-12">
	<ul class="nav nav-tabs pull-right">
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_poultry_appraisal&id=<?php echo $rows->id;?>&do=details" title="View Details" class="btn btn-default btn-sm tip"><i class="fa fa-th-list"></i> <?php echo LANG_DETAILS;?></a>
	
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_poultry_appraisal&id=<?php echo $rows->id;?>&do=delete&dfile=" title="<?php echo LANG_TIP_DELETE;?>" class="btn btn-default btn-sm tip" data-confirm="<?php echo LANG_DELETE_AUTH;?>"><i class="fa fa-trash-o"></i> <?php echo LANG_DELETE;?></a>
	
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_poultry_appraisal&do=viewall" class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL;?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK;?></a>
	</ul>
	<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> <?php echo LANG_UPDATE;?> Orange Credit Poultry Appraisal</h3></div>
  <div class="panel-body pformmargin">
	
	 
	 <p>
	 <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" name="hezecomform" id="hezecomform" enctype="multipart/form-data">
	
	<?php if(isset($errors))form_errors($errors);?>
	
	<input type="hidden" name="id" value="<?php echo $rows->id;?>">
	<div class="form-group">
    <label class="control-label" for="poultry_farm_name">Poultry Farm Name</label>
	<input id="poultry_farm_name" name="poultry_farm_name" type="text" maxlength="100"  value="<?php echo $rows->poultry_farm_name;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="poultry_farm_address">Poultry Farm Address</label>
	<input id="poultry_farm_address" name="poultry_farm_address" type="text" maxlength="255"  value="<?php echo $rows->poultry_farm_address;?>" class="form-control styler" />
	</div>

	<div class="form-group">
    <label class="control-label" for="poultry_farm_management_style">Poultry Farm Management Style</label>
	<select name="poultry_farm_management_style" id="poultry_farm_management_style" class=" form-control styler choz">
	<option value="<?php echo $rows->poultry_farm_management_style;?>"><?php echo $rows->poultry_farm_management_style;?></option><option value="SELF MANAGEMENT">SELF MANAGEMENT</option>
	<option value="EMPLOYEE MANAGEMENT">EMPLOYEE MANAGEMENT</option>
	<option value="FAMILY MANAGEMENT">FAMILY MANAGEMENT</option>
	</select>
	</div>

	<div class="form-group">
    <label class="control-label" for="poultry_farm_produce_type">Poultry Farm Produce Type</label>
	<select name="poultry_farm_produce_type" id="poultry_farm_produce_type" class=" form-control styler choz">
	<option value="<?php echo $rows->poultry_farm_produce_type;?>"><?php echo $rows->poultry_farm_produce_type;?></option><option value="LAYERS BIRDS">LAYERS BIRDS</option>
	<option value="BROILERS BIRDS">BROILERS BIRDS</option>
	<option value="NEOLAS BIRDS">NEOLAS BIRDS</option>
	<option value="ALL OF THE ABOVE">ALL OF THE ABOVE</option>
	<option value="OTHER POULTY BIRDS">OTHER POULTY BIRDS</option>
	</select>
	</div>

	<div class="form-group">
    <label class="control-label" for="poultry_farm_total">Poultry Farm Total</label>
	<select name="poultry_farm_total" id="poultry_farm_total" class=" form-control styler choz">
	<option value="<?php echo $rows->poultry_farm_total;?>"><?php echo $rows->poultry_farm_total;?></option><option value="BELOW 50 BIRDS">BELOW 50 BIRDS</option>
	<option value="BETWEEN 50 TO 100 BIRDS">BETWEEN 50 TO 100 BIRDS</option>
	<option value="BETWEEN 100 TO 250 BIRDS">BETWEEN 100 TO 250 BIRDS</option>
	<option value="BETWEEN 250 TO 500 BIRDS">BETWEEN 250 TO 500 BIRDS</option>
	<option value="BETWEEN 500 TO 1000 BIRDS">BETWEEN 500 TO 1000 BIRDS</option>
	<option value="ABOVE 1000 BIRDS">ABOVE 1000 BIRDS</option>
	</select>
	</div>

	<div class="form-group">
    <label class="control-label" for="poultry_farm_revenue_cycle">Poultry Farm Revenue Cycle</label>
	<select name="poultry_farm_revenue_cycle" id="poultry_farm_revenue_cycle" class=" form-control styler choz">
	<option value="<?php echo $rows->poultry_farm_revenue_cycle;?>"><?php echo $rows->poultry_farm_revenue_cycle;?></option><option value="DAILY REVENUE CYCLE">DAILY REVENUE CYCLE</option>
	<option value="WEEKLY REVENUE CYCLE">WEEKLY REVENUE CYCLE</option>
	<option value="MONTHLY REVENUE CYCLE">MONTHLY REVENUE CYCLE</option>
	<option value="QUARTERLY REVENUE CYCLE">QUARTERLY REVENUE CYCLE</option>
	<option value="YEARLY  REVENUE CYCLE">YEARLY  REVENUE CYCLE</option>
	<option value="BI-ANNUAL  REVENUE CYCLE">BI-ANNUAL  REVENUE CYCLE</option>
	</select>
	</div>

	<div class="form-group">
    <label class="control-label" for="poultry_farm_revenue">Poultry Farm Revenue</label>
	<select name="poultry_farm_revenue" id="poultry_farm_revenue" class=" form-control styler choz">
	<option value="<?php echo $rows->poultry_farm_revenue;?>"><?php echo $rows->poultry_farm_revenue;?></option><option value="BETWEEN N50K AND 250K">BETWEEN N50K AND 250K</option>
	<option value="BETWEEN N250K AND N500K">BETWEEN N250K AND N500K</option>
	<option value="BETWEEN N500K AND N1MILLION">BETWEEN N500K AND N1MILLION</option>
	<option value="ABOVE N1MILLION">ABOVE N1MILLION</option>
	</select>
	</div>

	<div class="form-group">
    <label class="control-label" for="poultry_farm_profit_margin">Poultry Farm Profit Margin</label>
	<select name="poultry_farm_profit_margin" id="poultry_farm_profit_margin" class=" form-control styler choz">
	<option value="<?php echo $rows->poultry_farm_profit_margin;?>"><?php echo $rows->poultry_farm_profit_margin;?></option><option value="BELOW 10%">BELOW 10%</option>
	<option value="BETWEEN 10-15%">BETWEEN 10-15%</option>
	<option value="BETWEEN 16-25%">BETWEEN 16-25%</option>
	<option value="BETWEEN 26-50%">BETWEEN 26-50%</option>
	<option value="ABOVE 50%">ABOVE 50%</option>
	</select>
	</div>

	<div class="form-group">
    <label class="control-label" for="poultry_farm_date_created">Poultry Farm Date Created</label>
	<input name="poultry_farm_date_created" class="datepicker form-control styler" type="text" maxlength="255" value="<?php echo $rows->poultry_farm_date_created;?>" />
	</div>

	<div class="form-group">
    <label class="control-label" for="poultry_farm_date_mordified">Poultry Farm Date Mordified</label>
	<input name="poultry_farm_date_mordified" class="datepicker form-control styler" type="text" maxlength="255" value="<?php echo $rows->poultry_farm_date_mordified;?>" />
	</div>

	<div class="form-group">
    <label class="control-label" for="user_id">User Id</label>
	<input id="user_id" name="user_id" type="text" maxlength="20"  value="<?php echo $rows->user_id;?>" class="form-control styler" />
	</div>

	 <div class="controls">
	 <div class="col-md-2" style="padding:0;">
	 <input type="submit" name="button" id="hButton" class="btn btn-primary btn-lg" value="<?php echo LANG_UPDATE_RECORD;?>" />
	 </div>
	 <div class="col-md-3" style="padding:0;">
	 <div id="output"></div>
	 </div>
	 </div>
	  
	</form>
	</p>
	 
	
	</div>
 </div><!--/col-12-->
 </div><!--/heze-table-->
	