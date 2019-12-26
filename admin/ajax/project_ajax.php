<?php
  include "../../classes/Mainclass.php";
 Session::checkSession();

 if (class_exists('ProjectClass')) {
 	  echo "OK Right Now";
 } else{
 	echo "Something went wrong";
 }
