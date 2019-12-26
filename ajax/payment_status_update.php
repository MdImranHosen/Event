<?php
include '../classes/Mainclass.php';

if (class_exists('EventClass')) {
	$event = new EventClass();

	if (method_exists($event, 'userEventPaymentStatusUpdate')) {

          $paymentID = $_POST['paymentID'];
          $userID    = $_POST['userID'];
          
		$msg = $event->userEventPaymentStatusUpdate($paymentID,$userID);
   }
}
