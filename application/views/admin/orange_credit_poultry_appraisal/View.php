
	<?php
	/*
	* =======================================================================
	* FILE NAME:        View.php
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
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_poultry_appraisal&do=add" class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_ADD;?>"><i class="fa fa-plus"></i> <?php echo LANG_ADD;?></a>
	<a href="<?php echo H_ADMIN_MAIN;?>&view=orange_credit_poultry_appraisal&do=export&hexport=yes&etype=printer" target="_blank" class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_PRINT;?>"><i class="fa fa-print"></i> <?php echo LANG_PRINT;?></a>
	<a href="<?php echo H_ADMIN_MAIN;?>&view=orange_credit_poultry_appraisal&do=export&hexport=yes&etype=excel" class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_EXCEL;?>"><i class="fa fa-table"></i> <?php echo LANG_EXCEL;?></a>
	<a href="<?php echo H_ADMIN_MAIN;?>&view=orange_credit_poultry_appraisal&do=export&hexport=yes&etype=word" class="btn btn-default btn-sm tip" title="<?php echo LANG_TIP_WORD;?>"><i class="fa fa-file-o"></i> <?php echo LANG_WORD;?></a>
	</ul>
	
	<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-reorder"></i> Orange Credit Poultry Appraisal</h3></div>
  <div class="panel-body">
   <p>
	<input id="filter" class="input-sm" type="text" placeholder="<?php echo LANG_QUICK_SEARCH;?>"/>
	</p>
  </div>
	
	<table class="table table-bordered table-hover table-striped" data-filter="#filter" data-page-size="<?php echo RECORD_PER_PAGE;?>" data-page-previous-text="<?php echo LANG_PREVIOUS;?>" data-page-next-text="<?php echo LANG_NEXT;?>">
	<thead>
    <tr>
      <th>Poultry Farm Name</th>
	  <th data-hide="phone,tablet">Poultry Farm Address</th>
	  <th data-hide="phone,tablet">Poultry Farm Management Style</th>
	  <th data-hide="phone,tablet">Poultry Farm Produce Type</th>
	  <th data-hide="phone,tablet">Poultry Farm Total</th>
	  <th><?php echo LANG_ACTIONS;?></th>
	</tr>
  </thead>
  <tbody>
  
   <?php
	foreach($result as $rows)
			{
	?>
	<tr>
	<td><?php echo $rows->poultry_farm_name;?></td>
	<td><?php echo $rows->poultry_farm_address;?></td>
	<td><?php echo $rows->poultry_farm_management_style;?></td>
	<td><?php echo $rows->poultry_farm_produce_type;?></td>
	<td><?php echo $rows->poultry_farm_total;?></td>
	<td class="table-actions">
	 <div class="btn-group">
	 <a href="<?php echo H_ADMIN;?>&view=orange_credit_poultry_appraisal&id=<?php echo $rows->id;?>&do=details"  class="btn btn-info btn-xs"><span class="fa fa-search-plus tip" title="<?php echo LANG_TIP_DETAILS;?>"></span></a>
	<a href="<?php echo H_ADMIN;?>&view=orange_credit_poultry_appraisal&id=<?php echo $rows->id;?>&do=update" class="btn btn-primary btn-xs"><span class="fa fa-edit tip" title="<?php echo LANG_TIP_UPDATE;?>"></span></a>
	 <a href="<?php echo H_ADMIN;?>&view=orange_credit_poultry_appraisal&id=<?php echo $rows->id;?>&do=delete" class="btn btn-danger btn-xs" data-confirm="<?php echo LANG_DELETE_AUTH;?>"> <span class="fa fa-times tip" title="<?php echo LANG_TIP_DELETE;?>"></span></a>
	 </div>
	 </td>
    </tr>
	<?php }?>
  </tbody>
</table>
<div class="text-right"><ul class="pagination"><?php echo $paging;?></ul></div>
</div><br />
 </div><!--/col-12-->
 </div><!--/heze-table-->