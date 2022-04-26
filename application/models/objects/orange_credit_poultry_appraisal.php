
	<?php
	/*
	* =======================================================================
	* CLASSNAME:        orange_credit_poultry_appraisal_model
	* DATE CREATED:  	26-04-2022
	* FOR TABLE:  		orange_credit_poultry_appraisal
	* PRODUCED BY:		HEZECOM UltimateSpeed PHP CODE GENERATOR
	* AUTHOR:			Hezecom (http://hezecom.com) info@hezecom.net
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	
	include_once(APP_FOLDER.'/models/classes/class_orange_credit_poultry_appraisal.php');
	
	class orange_credit_poultry_appraisal_model{
	
	// SELECT ALL
	public function SelectAll($limit=null)
	{
	$dbc = new dboptions();
	if($limit){
	$startpg = pageparam($limit);
	$record = $dbc->rawSelect ("SELECT * FROM orange_credit_poultry_appraisal LIMIT {$startpg} , {$limit}");
	}else{
	$record = $dbc->rawSelect ("SELECT * FROM orange_credit_poultry_appraisal");	
	}
	return $record->fetchAll(PDO::FETCH_OBJ);
	}
	
	//Select Count for Pagination
	public function CountRow()
	{
	$dbc = new dboptions();
	return $dbc->SelectCount('SELECT COUNT(*) as num FROM orange_credit_poultry_appraisal');
	}
	
	// SELECT ONE
	public function SelectOne($id)
	{
	$db=DB::getInstance();
    $sql = "SELECT * FROM orange_credit_poultry_appraisal WHERE id=:id";
	$stmt=$db->prepare($sql);
	$stmt->bindParam(':id',$id, PDO::PARAM_INT);
	$stmt->execute();
	return $stmt->fetch(PDO::FETCH_OBJ);
	}
	
	// TRUNCATE TABLE
	public function TruncateTable($redirect_to)
	{
	$db=DB::getInstance();
   	$sql=$db->prepare("TRUNCATE orange_credit_poultry_appraisal");
	$sql->execute();
	send_to($redirect_to);
	}
	
	// DELETE
	public function Delete($id,$redirect_to)
	{
	$dbc = new dboptions();
	$dbc->dbDelete('orange_credit_poultry_appraisal', 'id',$id);
	send_to($redirect_to);
	}
	
	// INSERT
	public function Insert($poultry_farm_name,$poultry_farm_address,$poultry_farm_management_style,$poultry_farm_produce_type,$poultry_farm_total,$poultry_farm_revenue_cycle,$poultry_farm_revenue,$poultry_farm_profit_margin,$poultry_farm_date_created,$poultry_farm_date_mordified,$user_id)
	{
	$dbc=new dboptions();

	
	$values = array(array( 'poultry_farm_name'=>$poultry_farm_name,'poultry_farm_address'=>$poultry_farm_address,'poultry_farm_management_style'=>$poultry_farm_management_style,'poultry_farm_produce_type'=>$poultry_farm_produce_type,'poultry_farm_total'=>$poultry_farm_total,'poultry_farm_revenue_cycle'=>$poultry_farm_revenue_cycle,'poultry_farm_revenue'=>$poultry_farm_revenue,'poultry_farm_profit_margin'=>$poultry_farm_profit_margin,'poultry_farm_date_created'=>$poultry_farm_date_created,'poultry_farm_date_mordified'=>$poultry_farm_date_mordified,'user_id'=>$user_id ));
	$dbc->dbInsert('orange_credit_poultry_appraisal', $values);
	}
	
	// UPDATE
	public function Update($poultry_farm_name,$poultry_farm_address,$poultry_farm_management_style,$poultry_farm_produce_type,$poultry_farm_total,$poultry_farm_revenue_cycle,$poultry_farm_revenue,$poultry_farm_profit_margin,$poultry_farm_date_created,$poultry_farm_date_mordified,$user_id,$id)
	{
	$db=DB::getInstance();
	$sql = " UPDATE orange_credit_poultry_appraisal SET  poultry_farm_name =:poultry_farm_name,poultry_farm_address =:poultry_farm_address,poultry_farm_management_style =:poultry_farm_management_style,poultry_farm_produce_type =:poultry_farm_produce_type,poultry_farm_total =:poultry_farm_total,poultry_farm_revenue_cycle =:poultry_farm_revenue_cycle,poultry_farm_revenue =:poultry_farm_revenue,poultry_farm_profit_margin =:poultry_farm_profit_margin,poultry_farm_date_created =:poultry_farm_date_created,poultry_farm_date_mordified =:poultry_farm_date_mordified,user_id =:user_id WHERE id = :id ";
	$data = array(':poultry_farm_name'=>$poultry_farm_name,':poultry_farm_address'=>$poultry_farm_address,':poultry_farm_management_style'=>$poultry_farm_management_style,':poultry_farm_produce_type'=>$poultry_farm_produce_type,':poultry_farm_total'=>$poultry_farm_total,':poultry_farm_revenue_cycle'=>$poultry_farm_revenue_cycle,':poultry_farm_revenue'=>$poultry_farm_revenue,':poultry_farm_profit_margin'=>$poultry_farm_profit_margin,':poultry_farm_date_created'=>$poultry_farm_date_created,':poultry_farm_date_mordified'=>$poultry_farm_date_mordified,':user_id'=>$user_id,':id'=>$id);
	$stmt=$db->prepare($sql);
	$stmt->execute($data);
	
	}
	
	
	} // end class
	
	?>
	
	