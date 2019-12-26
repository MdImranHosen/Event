<?php


 include "../classes/Mainclass.php";
 Session::checkSession();
//date_default_timezone_set('Asia/Dhaka');
date_default_timezone_set('UTC');
set_time_limit(0);
 if (class_exists('Adminclass')) {
 	  $event = new Adminclass();
	$event_id;

if(isset($_GET["eventid"])){

$event_id=$_GET["eventid"];

		$filename = "particpents".$event_id.".xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");

  $sep = "\t"; // tabbed character

	  
echo  "ID".$sep."NAME_ENG".$sep."NAME_BAN".$sep."FATHERS_NAME".$sep."MOTHERS_NAME".$sep."SESSION".$sep."REG_NO".$sep."HALL".$sep."DEPARTMENT".$sep."MOBILE_NO".$sep."PAEMENANT_ADDRESS".$sep."PAEMENANT_DISTRICT".$sep."TRX_UID".$sep."T_SHIRT_SIZE".$sep."PAYMENT_STATUS";
 print("\n");

 	  if (method_exists($event, 'getAllPerticpents')) {
 	  	 
		              $result = $event->getAllPerticpents($event_id);

					 if($result){
	 
	  while($row= $result->fetch_assoc()) {
	  	     $schema_insert = "";

	  	  $schema_insert.=$row["id"].$sep;
	  	  $schema_insert.=$row["name_eng"].$sep;
	  	  $schema_insert.=$row["name_ban"].$sep;
	  	  $schema_insert.=$row["fathers_name"].$sep;
	  	  $schema_insert.=$row["mothers_name"].$sep;
	  	  $schema_insert.=$row["session"].$sep;
	  	  $schema_insert.=$row["reg_number"].$sep;
	  	  $schema_insert.=$row["halls"].$sep;
	  	  $schema_insert.=$row["department"].$sep;
	  	  $schema_insert.=$row["mobile_number"].$sep;
	  	  $schema_insert.=$row["parmenant_address"].$sep; 
		  $schema_insert.=$row["permanent_district"].$sep;
	  	  $schema_insert.=$row["trx_id_number"].$sep;
	  	  $schema_insert.=$row["t_shirt_size"].$sep;
	  	  $schema_insert.=$row["payment_status"].$sep;

	     $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
	
	  }}  
					  
		 
		 
		 }
		 
		 }
		 }

?>