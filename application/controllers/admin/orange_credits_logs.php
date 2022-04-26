
	<?php
	
	/*
	* =======================================================================
	* FILE NAME:        orange_credits_logs.php
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credits_logs
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* =======================================================================
	*/
	
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	
	include(APP_FOLDER.'/models/objects/orange_credits_logs.php');
	
	class orange_credits_logs_controller {
	public $orange_credits_logs_model;
	
	public function __construct()  
    {  
        $this->orange_credits_logs_model = new orange_credits_logs_model();
    } 
	
	public function invoke_orange_credits_logs()
	{
	
	//SELECT ALL //////////////////////////////////	
	if(get('do')=='viewall'){
	if(PAGINATION_TYPE=='Normal'){
	$result = $this->orange_credits_logs_model->SelectAll(RECORD_PER_PAGE);
	//Accept get url  e.g (index.php?id=1&cat=2...)
	$paging = pagination($this->orange_credits_logs_model->CountRow(),RECORD_PER_PAGE,''.H_ADMIN.'&view=orange_credits_logs&do=viewall');
	}else{
	$result = $this->orange_credits_logs_model->SelectAll();	
	}
	include(APP_FOLDER.'/views/admin/orange_credits_logs/View.php');
	}
	
	
	//EXPORT ////////////////////////////////////////////////////	
	if(get('do')=='export'){
	$result = $this->orange_credits_logs_model->SelectAll();
	include(APP_FOLDER.'/views/admin/orange_credits_logs/Export.php');
	}
	
	//Expeort2
	elseif(get('do')=='export2'){
	$rows = $this->orange_credits_logs_model->SelectOne(get('id'));
	include(APP_FOLDER.'/views/admin/orange_credits_logs/Export2.php');
	}
	//SEARCH SUGGEST ////////////////////////////////////////////////////	
	elseif(get('do')=='autosearch'){
	$qstring = post('qstring');
	if(strlen($qstring) >0) {
	$autosearch = $this->orange_credits_logs_model->AutoSearch(trim($qstring),10,'action');
	echo' <div class=widget><ul class="list-group">';
	foreach ($autosearch as $srow) {
	echo '<span class="searchheading"><a href="'.H_ADMIN.'&view=orange_credits_logs&id='.$srow->id.'&do=details"><li class="list-group-item">'. $srow->action.'</li></a>
	</span>';
	}
	echo '</ul></div>';
	}
	}
	
	
	//ADD //////////////////////////////////////////////////
	elseif(get('do')=='add'){
	include(APP_FOLDER.'/views/admin/orange_credits_logs/Add.php');
	}
	
	//ADD PROCESS //////////////////////////////////////////////////
	elseif(get('do')=='addpro'){
	if($_POST){
	//form validation
	if (post('action')==''){
	json_error('The field action cannot be empty!');
	}
	elseif (post('ip_address')==''){
	json_error('The field ip address cannot be empty!');
	}
	elseif (post('created_by')==''){
	json_error('The field created by cannot be empty!');
	}
	elseif (post('createdAt')==''){
	json_error('The field createdAt cannot be empty!');
	}
	else{
	$this->orange_credits_logs_model->Insert(post('action'),post('ip_address'),post('created_by'),post('createdAt'));
	json_send(''.H_ADMIN.'&view=orange_credits_logs&do=viewall&msg=add');
	json_success('Process Completed');
	}
	}
	}
	
	//UPDATE //////////////////////////////////////////////////
	elseif(get('do')=='update'){$rows = $this->orange_credits_logs_model->SelectOne(get('id'));
	include(APP_FOLDER.'/views/admin/orange_credits_logs/Update.php');
	}
	
	//UPDATE PROCESS //////////////////////////////////////////////////
	elseif(get('do')=='updatepro'){
	if($_POST){
	//form validation
	if (post('id')==''){
	json_error('The field id cannot be empty!');
	}
	elseif (post('action')==''){
	json_error('The field action cannot be empty!');
	}
	elseif (post('ip_address')==''){
	json_error('The field ip address cannot be empty!');
	}
	elseif (post('created_by')==''){
	json_error('The field created by cannot be empty!');
	}
	elseif (post('createdAt')==''){
	json_error('The field createdAt cannot be empty!');
	}
	else{
	$this->orange_credits_logs_model->Update(post('action'),post('ip_address'),post('created_by'),post('createdAt'),post('id'));
	json_send(''.H_ADMIN.'&view=orange_credits_logs&id='.post('id').'&do=details&msg=update');
	json_success('Process Completed');
	}
	}
	}
	
	//DETAILS //////////////////////////////////////////////
	elseif(get('do')=='details'){
	$rows = $this->orange_credits_logs_model->SelectOne(get('id'));
	include(APP_FOLDER.'/views/admin/orange_credits_logs/Details.php');
	}
	
	//TRUNCATE ///////////////////////////////////////////////
	elseif(get('do')=='truncate'){
	$this->orange_credits_logs_model->TruncateTable(''.H_ADMIN.'&view=orange_credits_logs&do=viewall&msg=truncate');
	include(APP_FOLDER.'/views/admin/orange_credits_logs/View.php');
	}
	
	//DELETE /////////////////////////////////////////////////
	elseif(get('do')=='delete'){
	$dfile=get('dfile');
		if(get('id') and $dfile==''){
	$del = $this->orange_credits_logs_model->Delete(get('id'),''.H_ADMIN.'&view=orange_credits_logs&do=viewall&msg=delete');
	}
	elseif(get('id') and $dfile!='' and get('fdel')==''){
	delete_files(UPLOAD_PATH.get('dfile'));
	delete_files(THUMB_PATH.get('dfile'));
	$del = $this->orange_credits_logs_model->Delete(get('id'),''.H_ADMIN.'&view=orange_credits_logs&do=viewall&msg=delete');
	}
	elseif(get('id') and $dfile!='' and get('fdel')!=''){
	delete_files(UPLOAD_PATH.get('dfile'));
	delete_files(THUMB_PATH.get('dfile'));
	send_to(''.H_ADMIN.'&view=orange_credits_logs&id='.get('id').'&do=update&msg=delete');
	}
	}
	}//end invoke
	}//end class
	?>
	