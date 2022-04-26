
	<?php
	
	/*
	* =======================================================================
	* FILE NAME:        orange_credit_loan_status.php
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_loan_status
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* =======================================================================
	*/
	
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	
	include(APP_FOLDER.'/models/objects/orange_credit_loan_status.php');
	
	class orange_credit_loan_status_controller {
	public $orange_credit_loan_status_model;
	
	public function __construct()  
    {  
        $this->orange_credit_loan_status_model = new orange_credit_loan_status_model();
    } 
	
	public function invoke_orange_credit_loan_status()
	{
	
	//SELECT ALL //////////////////////////////////	
	if(get('do')=='viewall'){
	if(PAGINATION_TYPE=='Normal'){
	$result = $this->orange_credit_loan_status_model->SelectAll(RECORD_PER_PAGE);
	//Accept get url  e.g (index.php?id=1&cat=2...)
	$paging = pagination($this->orange_credit_loan_status_model->CountRow(),RECORD_PER_PAGE,''.H_ADMIN.'&view=orange_credit_loan_status&do=viewall');
	}else{
	$result = $this->orange_credit_loan_status_model->SelectAll();	
	}
	include(APP_FOLDER.'/views/admin/orange_credit_loan_status/View.php');
	}
	
	
	//EXPORT ////////////////////////////////////////////////////	
	if(get('do')=='export'){
	$result = $this->orange_credit_loan_status_model->SelectAll();
	include(APP_FOLDER.'/views/admin/orange_credit_loan_status/Export.php');
	}
	
	//Expeort2
	elseif(get('do')=='export2'){
	$rows = $this->orange_credit_loan_status_model->SelectOne(get('loanstatus_id'));
	include(APP_FOLDER.'/views/admin/orange_credit_loan_status/Export2.php');
	}
	//SEARCH SUGGEST ////////////////////////////////////////////////////	
	elseif(get('do')=='autosearch'){
	$qstring = post('qstring');
	if(strlen($qstring) >0) {
	$autosearch = $this->orange_credit_loan_status_model->AutoSearch(trim($qstring),10,'loanstatus_status');
	echo' <div class=widget><ul class="list-group">';
	foreach ($autosearch as $srow) {
	echo '<span class="searchheading"><a href="'.H_ADMIN.'&view=orange_credit_loan_status&loanstatus_id='.$srow->loanstatus_id.'&do=details"><li class="list-group-item">'. $srow->loanstatus_status.'</li></a>
	</span>';
	}
	echo '</ul></div>';
	}
	}
	
	
	//ADD //////////////////////////////////////////////////
	elseif(get('do')=='add'){
	include(APP_FOLDER.'/views/admin/orange_credit_loan_status/Add.php');
	}
	
	//ADD PROCESS //////////////////////////////////////////////////
	elseif(get('do')=='addpro'){
	if($_POST){
	//form validation
	if (post('loanstatus_status')==''){
	json_error('The field loanstatus status cannot be empty!');
	}
	elseif (post('loanstatus_short')==''){
	json_error('The field loanstatus short cannot be empty!');
	}
	else{
	$this->orange_credit_loan_status_model->Insert(post('loanstatus_status'),post('loanstatus_short'));
	json_send(''.H_ADMIN.'&view=orange_credit_loan_status&do=viewall&msg=add');
	json_success('Process Completed');
	}
	}
	}
	
	//UPDATE //////////////////////////////////////////////////
	elseif(get('do')=='update'){$rows = $this->orange_credit_loan_status_model->SelectOne(get('loanstatus_id'));
	include(APP_FOLDER.'/views/admin/orange_credit_loan_status/Update.php');
	}
	
	//UPDATE PROCESS //////////////////////////////////////////////////
	elseif(get('do')=='updatepro'){
	if($_POST){
	//form validation
	if (post('loanstatus_id')==''){
	json_error('The field loanstatus_id cannot be empty!');
	}
	elseif (post('loanstatus_status')==''){
	json_error('The field loanstatus status cannot be empty!');
	}
	elseif (post('loanstatus_short')==''){
	json_error('The field loanstatus short cannot be empty!');
	}
	else{
	$this->orange_credit_loan_status_model->Update(post('loanstatus_status'),post('loanstatus_short'),post('loanstatus_id'));
	json_send(''.H_ADMIN.'&view=orange_credit_loan_status&loanstatus_id='.post('loanstatus_id').'&do=details&msg=update');
	json_success('Process Completed');
	}
	}
	}
	
	//DETAILS //////////////////////////////////////////////
	elseif(get('do')=='details'){
	$rows = $this->orange_credit_loan_status_model->SelectOne(get('loanstatus_id'));
	include(APP_FOLDER.'/views/admin/orange_credit_loan_status/Details.php');
	}
	
	//TRUNCATE ///////////////////////////////////////////////
	elseif(get('do')=='truncate'){
	$this->orange_credit_loan_status_model->TruncateTable(''.H_ADMIN.'&view=orange_credit_loan_status&do=viewall&msg=truncate');
	include(APP_FOLDER.'/views/admin/orange_credit_loan_status/View.php');
	}
	
	//DELETE /////////////////////////////////////////////////
	elseif(get('do')=='delete'){
	$dfile=get('dfile');
		if(get('loanstatus_id') and $dfile==''){
	$del = $this->orange_credit_loan_status_model->Delete(get('loanstatus_id'),''.H_ADMIN.'&view=orange_credit_loan_status&do=viewall&msg=delete');
	}
	elseif(get('loanstatus_id') and $dfile!='' and get('fdel')==''){
	delete_files(UPLOAD_PATH.get('dfile'));
	delete_files(THUMB_PATH.get('dfile'));
	$del = $this->orange_credit_loan_status_model->Delete(get('loanstatus_id'),''.H_ADMIN.'&view=orange_credit_loan_status&do=viewall&msg=delete');
	}
	elseif(get('loanstatus_id') and $dfile!='' and get('fdel')!=''){
	delete_files(UPLOAD_PATH.get('dfile'));
	delete_files(THUMB_PATH.get('dfile'));
	send_to(''.H_ADMIN.'&view=orange_credit_loan_status&loanstatus_id='.get('loanstatus_id').'&do=update&msg=delete');
	}
	}
	}//end invoke
	}//end class
	?>
	