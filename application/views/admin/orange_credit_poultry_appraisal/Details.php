
	<?php
	/*
	* =======================================================================
	* FILE NAME:        Details.php
	* DATE CREATED:  	26-04-2022
	* FOR TABLE:  		orange_credit_poultry_appraisal
	* PRODUCED BY:		HEZECOM UltimateSpeed PHP CODE GENERATOR
	* AUTHOR:			Hezecom (http://hezecom.com) info@hezecom.net
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	?>
	
	<div class="heze-table">
	<div class="col-lg-12">
	
	<ul class="nav nav-tabs pull-right">
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_poultry_appraisal&do=viewall" class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_VIEWALL;?>"><i class="fa fa-reply"></i> <?php echo LANG_GO_BACK;?></a>
	
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_poultry_appraisal&do=add" class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_ADD;?>"><i class="fa fa-plus"></i> <?php echo LANG_ADD;?></a>
	
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_poultry_appraisal&id=<?php echo $rows->id;?>&do=update" title="<?php echo LANG_TIP_UPDATE;?> Record" class="btn btn-default btn-sm tip"><i class="fa fa-edit"></i> <?php echo LANG_UPDATE;?></a>
	
	<a href="<?php echo H_ADMIN_MAIN;?>&view=orange_credit_poultry_appraisal&id=<?php echo $rows->id;?>&do=export2&hexport=yes&etype=word" title="<?php echo LANG_TIP_WORD;?>" class="btn btn-default btn-sm tip"><i class="fa fa-file-o"></i> <?php echo LANG_WORD;?></a>
	
	<a href="<?php echo H_ADMIN_MAIN;?>&view=orange_credit_poultry_appraisal&id=<?php echo $rows->id;?>&do=export2&hexport=yes&etype=printer" title="<?php echo LANG_TIP_PRINT;?>" target="_blank" class="btn btn-default btn-sm tip"><i class="fa fa-print"></i> <?php echo LANG_PRINT;?></a>
	
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_poultry_appraisal&id=<?php echo $rows->id;?>&do=delete&dfile=" title="<?php echo LANG_TIP_DELETE_ALL;?>" class="btn btn-default btn-sm tip" data-confirm="<?php echo LANG_DELETE_AUTH;?>"><i class="fa fa-trash-o"></i> <?php echo LANG_DELETE;?></a>
	</ul>
	
	<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> Orange Credit Poultry Appraisal <?php echo LANG_DETAILS;?></h3></div>
	<table class="table table-striped table-bordered" data-page-size="200">
	 <tbody>
		  	
	<tr>
	<th>Poultry Farm Name</th><td><?php echo $rows->poultry_farm_name;?></td>
	</tr>
		
	<tr>
	<th>Poultry Farm Address</th><td><?php echo $rows->poultry_farm_address;?></td>
	</tr>
		
	<tr>
	<th>Poultry Farm Management Style</th><td><?php echo $rows->poultry_farm_management_style;?></td>
	</tr>
		
	<tr>
	<th>Poultry Farm Produce Type</th><td><?php echo $rows->poultry_farm_produce_type;?></td>
	</tr>
		
	<tr>
	<th>Poultry Farm Total</th><td><?php echo $rows->poultry_farm_total;?></td>
	</tr>
		
	<tr>
	<th>Poultry Farm Revenue Cycle</th><td><?php echo $rows->poultry_farm_revenue_cycle;?></td>
	</tr>
		
	<tr>
	<th>Poultry Farm Revenue</th><td><?php echo $rows->poultry_farm_revenue;?></td>
	</tr>
		
	<tr>
	<th>Poultry Farm Profit Margin</th><td><?php echo $rows->poultry_farm_profit_margin;?></td>
	</tr>
		
	<tr>
	<th>Poultry Farm Date Created</th><td><?php echo $rows->poultry_farm_date_created;?></td>
	</tr>
		
	<tr>
	<th>Poultry Farm Date Mordified</th><td><?php echo $rows->poultry_farm_date_mordified;?></td>
	</tr>
		
	<tr>
	<th>User Id</th><td><?php echo $rows->user_id;?></td>
	</tr>
	</tbody>
	</table>
	</div>
 </div><!--/col-12-->
 </div><!--/heze-table-->
	