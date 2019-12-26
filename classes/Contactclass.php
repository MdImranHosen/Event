<?php
/**
 * Contactclass
 */
class Contactclass extends Mainclass
{
	
	public function getContactMessage($name,$email,$subject,$message){

		$name     = $this->fm->validation($name);
		$email    = $this->fm->validation($email);
		$subject  = $this->fm->validation($subject);
		$message  = $this->fm->validation($message);
        
        $name     = mysqli_real_escape_string($this->db->link, $name);
        $email    = mysqli_real_escape_string($this->db->link, $email);
        $subject  = mysqli_real_escape_string($this->db->link, $subject);
        $message  = mysqli_real_escape_string($this->db->link, $message);

        $email    = filter_var($email, FILTER_SANITIZE_EMAIL);

       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        	$msg = '<div class="alert alert-danger" role="alert">
                  Invalid Email.
                 </div>';
           return $msg;
        } else{
          $sql = "INSERT INTO contacts(name,email,subject,message) VALUES('$name','$email','$subject','$message')";
          $insert = $this->db->insert($sql);
          if ($insert) {
          	$msg = '<div class="alert alert-success">Message Send Successfully!</div>';
          	return $msg;
          }else{
          	$msg = '<div class="alert alert-danger" role="alert">
                  Something went wrong.
                 </div>';
           return $msg;
          }
        }
	}

	public function getContactMessageshow(){

		$sql = "SELECT * FROM contacts";
		$result = $this->db->select($sql);
		return $result;
	}
	
}