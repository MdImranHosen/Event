<?php
  include "../../classes/Mainclass.php";
 Session::checkSession();

 if (class_exists('EventClass')) {
 	  $event = new EventClass();

 	  if (method_exists($event, 'addEventData')) {
 	  	 
 	  	 $event_name     = $_POST['event_name'];
 	  	 $event_moto     = $_POST['event_moto'];
 	  	 $event_logo     = $_FILES['event_logo'];
 	  	 $event_date     = $_POST['event_date'];
 	  	 $reg_start_date = $_POST['reg_start_date'];
 	  	 $reg_end_date   = $_POST['reg_end_date'];
 	  	 $payable_amount = $_POST['payable_amount'];

 	  	 $msg = $event->addEventData($event_name,$event_moto,$event_logo,$event_date,$reg_start_date,$reg_end_date,$payable_amount);
 	  }
 }
