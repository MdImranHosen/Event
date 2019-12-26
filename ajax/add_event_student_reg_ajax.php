<?php
include '../classes/Mainclass.php';

if (class_exists('EventClass')) {
	$event = new EventClass();

	if (method_exists($event, 'addEventStudentReg')) {

          $event_id          = $_POST['event_id'];
          $name_english      = $_POST['name_english'];
          $name_bangle       = $_POST['name_bangle'];
          $mobile_number     = $_POST['mobile_number'];
          $fathers_name      = $_POST['fathers_name'];
          $mothers_name      = $_POST['mothers_name'];
          $session           = $_POST['session'];
          $reg_number        = $_POST['reg_number'];
          $halls             = $_POST['halls'];
          $department        = $_POST['department'];
          $parmenant_address  = $_POST['parmenant_address'];
          $permanent_district = $_POST['permanent_district'];
          $t_shirt_size       = $_POST['t_shirt_size'];
          $NID                = $_POST['NID'];
          $gender             = $_POST['gender'];
          $blood_group        = $_POST['blood_group'];
          $email_address      = $_POST['email_address'];
          $trx_id_number      = $_POST['trx_id_number'];
          $photo              = $_FILES['photo'];
          
		  
		//  echo $t_shirt_size ."#".$parmenant_address;
		$msg = $event->addEventStudentReg($event_id,$name_english,$name_bangle,$mobile_number,$fathers_name,$mothers_name,$session,$reg_number,$halls,$department,$parmenant_address,$permanent_district,$NID,$gender,$blood_group,$email_address,$trx_id_number,$t_shirt_size,$photo);
   }
}
