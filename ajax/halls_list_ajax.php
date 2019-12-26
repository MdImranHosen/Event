<?php
include '../classes/Mainclass.php';

if (class_exists('EventClass')) {
	$obj = new EventClass();
	if (method_exists($obj, 'getHallsList')) {
	 	$data = $obj->getHallsList();
	}
	
}


