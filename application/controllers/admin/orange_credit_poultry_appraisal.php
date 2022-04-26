
	<?php
	
	/*
	* =======================================================================
	* FILE NAME:        orange_credit_poultry_appraisal.php
	* DATE CREATED:  	26-04-2022
	* FOR TABLE:  		orange_credit_poultry_appraisal
	* PRODUCED BY:		HEZECOM UltimateSpeed PHP CODE GENERATOR
	* AUTHOR:			Hezecom (http://hezecom.com) info@hezecom.net
	* =======================================================================
	*/
	
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	
	include(APP_FOLDER.'/models/objects/orange_credit_poultry_appraisal.php');
	
	class orange_credit_poultry_appraisal_controller {
	public $orange_credit_poultry_appraisal_model;
	
	public function __construct()  
    {  
        $result = $this->orange_credit_poultry_appraisal_model = new orange_credit_poultry_appraisal_model();
    } 
	
	public function invoke_orange_credit_poultry_appraisal()
	{
	
	//SELECT ALL //////////////////////////////////	
	if(get('do')=='viewall'){
	if(PAGINATION_TYPE=='Normal'){
	$result = $this->orange_credit_poultry_appraisal_model->SelectAll(RECORD_PER_PAGE);
	//Accept get url  e.g (index.php?id=1&cat=2...)
	$paging = pagination($this->orange_credit_poultry_appraisal_model->CountRow(),RECORD_PER_PAGE,''.H_ADMIN.'&view=orange_credit_poultry_appraisal&do=viewall');
	}else{
	$result = $this->orange_credit_poultry_appraisal_model->SelectAll();	
	}
	include(APP_FOLDER.'/views/admin/orange_credit_poultry_appraisal/View.php');
	}
	
	
	//EXPORT ////////////////////////////////////////////////////	
	if(get('do')=='export'){
	$result = $this->orange_credit_poultry_appraisal_model->SelectAll();
	include(APP_FOLDER.'/views/admin/orange_credit_poultry_appraisal/Export.php');
	}
	
	//Expeort2
	elseif(get('do')=='export2'){
	$rows = $this->orange_credit_poultry_appraisal_model->SelectOne(get('id'));
	include(APP_FOLDER.'/views/admin/orange_credit_poultry_appraisal/Export2.php');
	}
	
	//ADD //////////////////////////////////////////////////
	elseif(get('do')=='add'){
	if(post('button')){
	//validation example - uncomment to make use of it.
	/*if (post('fieldname')==''){
		$errors[] = 'A value is required!';
	}else{
	*/		 
	$this->orange_credit_poultry_appraisal_model->Insert(post('poultry_farm_name'),post('poultry_farm_address'),post('poultry_farm_management_style'),post('poultry_farm_produce_type'),post('poultry_farm_total'),post('poultry_farm_revenue_cycle'),post('poultry_farm_revenue'),post('poultry_farm_profit_margin'),post('poultry_farm_date_created'),post('poultry_farm_date_mordified'),post('user_id'),post('id'));
	send_to(''.H_ADMIN.'&view=orange_credit_poultry_appraisal&do=viewall&msg=add');
	}
	//} //uncomment for validation
	include(APP_FOLDER.'/views/admin/orange_credit_poultry_appraisal/Add.php');
	}
	
	//UPDATE ////////////////////////////////////////////////
	elseif(get('do')=='update'){
	if(post('button')){
	//validation example - uncomment to make use of it.
	/*if (post('fieldname')==''){
		$errors[] = 'A value is required!';
	}else{
	*/	 
	$this->orange_credit_poultry_appraisal_model->Update(post('poultry_farm_name'),post('poultry_farm_address'),post('poultry_farm_management_style'),post('poultry_farm_produce_type'),post('poultry_farm_total'),post('poultry_farm_revenue_cycle'),post('poultry_farm_revenue'),post('poultry_farm_profit_margin'),post('poultry_farm_date_created'),post('poultry_farm_date_mordified'),post('user_id'),post('id'));
	send_to(''.H_ADMIN.'&view=orange_credit_poultry_appraisal&id='.get('id').'&do=details&msg=update');
	//} //uncomment for validation
	}
	$rows = $this->orange_credit_poultry_appraisal_model->SelectOne(get('id'));
	include(APP_FOLDER.'/views/admin/orange_credit_poultry_appraisal/Update.php');
	}
	
	//DETAILS //////////////////////////////////////////////
	elseif(get('do')=='details'){
	$rows = $this->orange_credit_poultry_appraisal_model->SelectOne(get('id'));
	include(APP_FOLDER.'/views/admin/orange_credit_poultry_appraisal/Details.php');
	}
	
	//DELETE /////////////////////////////////////////////////
	elseif(get('do')=='delete'){
	$dfile=get('dfile');
		if(get('id') and $dfile==''){
	$del = $this->orange_credit_poultry_appraisal_model->Delete(get('id'),''.H_ADMIN.'&view=orange_credit_poultry_appraisal&do=viewall&msg=delete');
	}
	elseif(get('id') and $dfile!='' and get('fdel')==''){
	delete_files(UPLOAD_PATH.get('dfile'));
	delete_files(THUMB_PATH.get('dfile'));
	$del = $this->orange_credit_poultry_appraisal_model->Delete(get('id'),''.H_ADMIN.'&view=orange_credit_poultry_appraisal&do=viewall&msg=delete');
	}
	elseif(get('id') and $dfile!='' and get('fdel')!=''){
	delete_files(UPLOAD_PATH.get('dfile'));
	delete_files(THUMB_PATH.get('dfile'));
	send_to(''.H_ADMIN.'&view=orange_credit_poultry_appraisal&id='.get('id').'&do=update&msg=delete');
	}
	}
	}//end invoke
	}//end class
	?>
	