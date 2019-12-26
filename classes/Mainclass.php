<?php 
$filepath = realpath(dirname(__FILE__));								
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>
<?php 
 class Mainclass{
 	
 	protected $db;
 	protected $fm;
	public function __construct(){

	 $this->db = new Database();
     $this->fm = new Format();
	}
      public function url(){
            return sprintf(
                "%s://%s%s",
                isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
                $_SERVER['SERVER_NAME'],
                $_SERVER['REQUEST_URI']
            );
      }

  public function get_client_ip() {
          $ipaddress = '';
          if (isset($_SERVER['HTTP_CLIENT_IP']))
              $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
          else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
              $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
          else if(isset($_SERVER['HTTP_X_FORWARDED']))
              $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
          else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
              $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
          else if(isset($_SERVER['HTTP_FORWARDED']))
              $ipaddress = $_SERVER['HTTP_FORWARDED'];
          else if(isset($_SERVER['REMOTE_ADDR']))
              $ipaddress = $_SERVER['REMOTE_ADDR'];
          else
              $ipaddress = 'UNKNOWN';
          return $ipaddress;
      }

}

include_once "Contactclass.php";
include_once "Adminclass.php";
include_once "EventClass.php";
