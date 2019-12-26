<?php
  include "../../classes/Mainclass.php";
 Session::checkSession();

 if (class_exists('EventClass')) {
 	  $event = new EventClass();

 	  if (method_exists($event, 'deleteEventById')) {
 	  	 
 	  	 $event_id     = $_POST['event_id'];
 	  	 $msg = $event->deleteEventById($event_id);
 	  }
 }
