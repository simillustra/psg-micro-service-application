
	<?php
	
	/*
	* =======================================================================
	* FILE NAME:        orange_credit_messages.php
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_messages
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* =======================================================================
	*/
	
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	
	include(APP_FOLDER.'/models/objects/orange_credit_messages.php');
	
	class orange_credit_messages_controller {
	public $orange_credit_messages_model;
	
	public function __construct()  
    {  
        $this->orange_credit_messages_model = new orange_credit_messages_model();
    } 
	
	public function invoke_orange_credit_messages()
	{
	
	//SELECT ALL //////////////////////////////////	
	if(get('do')=='viewall'){
	if(PAGINATION_TYPE=='Normal'){
	$result = $this->orange_credit_messages_model->SelectAll(RECORD_PER_PAGE);
	//Accept get url  e.g (index.php?id=1&cat=2...)
	$paging = pagination($this->orange_credit_messages_model->CountRow(),RECORD_PER_PAGE,''.H_ADMIN.'&view=orange_credit_messages&do=viewall');
	}else{
	$result = $this->orange_credit_messages_model->SelectAll();	
	}
	include(APP_FOLDER.'/views/admin/orange_credit_messages/View.php');
	}
	
	
	//EXPORT ////////////////////////////////////////////////////	
	if(get('do')=='export'){
	$result = $this->orange_credit_messages_model->SelectAll();
	include(APP_FOLDER.'/views/admin/orange_credit_messages/Export.php');
	}
	
	//Expeort2
	elseif(get('do')=='export2'){
	$rows = $this->orange_credit_messages_model->SelectOne(get('id'));
	$upld = $this->orange_credit_messages_model->SelectAllFiles(get('id'));
	include(APP_FOLDER.'/views/admin/orange_credit_messages/Export2.php');
	}
	//SEARCH SUGGEST ////////////////////////////////////////////////////	
	elseif(get('do')=='autosearch'){
	$qstring = post('qstring');
	if(strlen($qstring) >0) {
	$autosearch = $this->orange_credit_messages_model->AutoSearch(trim($qstring),10,'user_to');
	echo' <div class=widget><ul class="list-group">';
	foreach ($autosearch as $srow) {
	echo '<span class="searchheading"><a href="'.H_ADMIN.'&view=orange_credit_messages&id='.$srow->id.'&do=details"><li class="list-group-item">'. $srow->user_to.'</li></a>
	</span>';
	}
	echo '</ul></div>';
	}
	}
	
	
	//ADD //////////////////////////////////////////////////
	elseif(get('do')=='add'){
	include(APP_FOLDER.'/views/admin/orange_credit_messages/Add.php');
	}
	
	//ADD PROCESS //////////////////////////////////////////////////
	elseif(get('do')=='addpro'){
	if($_POST){
	//form validation
	if (post('user_to')==''){
	json_error('The field user to cannot be empty!');
	}
	elseif (post('user_from')==''){
	json_error('The field user from cannot be empty!');
	}
	elseif (post('subject')==''){
	json_error('The field subject cannot be empty!');
	}
	elseif (post('message')==''){
	json_error('The field message cannot be empty!');
	}
	elseif (post('respond')==''){
	json_error('The field respond cannot be empty!');
	}
	elseif (post('sender_open')==''){
	json_error('The field sender open cannot be empty!');
	}
	elseif (post('receiver_open')==''){
	json_error('The field receiver open cannot be empty!');
	}
	elseif (post('sender_delete')==''){
	json_error('The field sender delete cannot be empty!');
	}
	elseif (post('receiver_delete')==''){
	json_error('The field receiver delete cannot be empty!');
	}
	else{
	$this->orange_credit_messages_model->Insert(post('user_to'),post('user_from'),post('subject'),post('message'),post('respond'),post('sender_open'),post('receiver_open'),post('sender_delete'),post('receiver_delete'));
	json_send(''.H_ADMIN.'&view=orange_credit_messages&do=viewall&msg=add');
	json_success('Process Completed');
	}
	}
	}
	
	//UPDATE //////////////////////////////////////////////////
	elseif(get('do')=='update'){$rows = $this->orange_credit_messages_model->SelectOne(get('id'));
	$upld = $this->orange_credit_messages_model->SelectAllFiles(get('id'));
	include(APP_FOLDER.'/views/admin/orange_credit_messages/Update.php');
	}
	
	//UPDATE PROCESS //////////////////////////////////////////////////
	elseif(get('do')=='updatepro'){
	if($_POST){
	//form validation
	if (post('id')==''){
	json_error('The field id cannot be empty!');
	}
	elseif (post('user_to')==''){
	json_error('The field user to cannot be empty!');
	}
	elseif (post('user_from')==''){
	json_error('The field user from cannot be empty!');
	}
	elseif (post('subject')==''){
	json_error('The field subject cannot be empty!');
	}
	elseif (post('message')==''){
	json_error('The field message cannot be empty!');
	}
	elseif (post('respond')==''){
	json_error('The field respond cannot be empty!');
	}
	elseif (post('sender_open')==''){
	json_error('The field sender open cannot be empty!');
	}
	elseif (post('receiver_open')==''){
	json_error('The field receiver open cannot be empty!');
	}
	elseif (post('sender_delete')==''){
	json_error('The field sender delete cannot be empty!');
	}
	elseif (post('receiver_delete')==''){
	json_error('The field receiver delete cannot be empty!');
	}
	else{
	$this->orange_credit_messages_model->Update(post('user_to'),post('user_from'),post('subject'),post('message'),post('respond'),post('sender_open'),post('receiver_open'),post('sender_delete'),post('receiver_delete'),post('id'));
	json_send(''.H_ADMIN.'&view=orange_credit_messages&id='.post('id').'&do=details&msg=update');
	json_success('Process Completed');
	}
	}
	}
	
	//DETAILS //////////////////////////////////////////////
	elseif(get('do')=='details'){
	$rows = $this->orange_credit_messages_model->SelectOne(get('id'));
	$upld = $this->orange_credit_messages_model->SelectAllFiles(get('id'));
	include(APP_FOLDER.'/views/admin/orange_credit_messages/Details.php');
	}
	
	//TRUNCATE ///////////////////////////////////////////////
	elseif(get('do')=='truncate'){
	$this->orange_credit_messages_model->TruncateTable(''.H_ADMIN.'&view=orange_credit_messages&do=viewall&msg=truncate');
	include(APP_FOLDER.'/views/admin/orange_credit_messages/View.php');
	}
	
	//DELETE /////////////////////////////////////////////////
	elseif(get('do')=='delete'){
	$dfile=get('dfile');
	
	//FLES FROM NEW TABLE
	if(get('id') and get('dfile')=='' and get('fdel')=='' and get('onedel')==''){
	$rowfile = $this->orange_credit_messages_model->SelectAllFiles(get('id'));
	foreach($rowfile as $drows)
	{
	delete_files(UPLOAD_PATH.$drows->gfile);
	delete_files(THUMB_PATH.$drows->gfile);
	}
	$this->orange_credit_messages_model->DeleteFile(get('id'));
	$this->orange_credit_messages_model->Delete(get('id'),''.H_ADMIN.'&view=orange_credit_messages&do=viewall&msg=delete');
	}
	
	elseif(get('id') and get('fid') and get('fdel')=='' and get('onedel') and  get('dfile')!=''){
	delete_files(UPLOAD_PATH.get('dfile'));
	delete_files(THUMB_PATH.get('dfile'));
	$this->orange_credit_messages_model->DeleteFileOne(get('fid'));
	send_to(''.H_ADMIN.'&view=orange_credit_messages&id='.get('id').'&do=details&dmsg=delete');	
	}
	elseif(get('id') and $dfile!='' and get('fdel')==''){
	delete_files(UPLOAD_PATH.get('dfile'));
	delete_files(THUMB_PATH.get('dfile'));
	$del = $this->orange_credit_messages_model->Delete(get('id'),''.H_ADMIN.'&view=orange_credit_messages&do=viewall&msg=delete');
	}
	elseif(get('id') and $dfile!='' and get('fdel')!=''){
	delete_files(UPLOAD_PATH.get('dfile'));
	delete_files(THUMB_PATH.get('dfile'));
	send_to(''.H_ADMIN.'&view=orange_credit_messages&id='.get('id').'&do=update&msg=delete');
	}
	}
	}//end invoke
	}//end class
	?>
	