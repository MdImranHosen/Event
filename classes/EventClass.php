<?php
/**
 * EventClass 
 */
class EventClass extends Mainclass
{
	public function addEventData($event_name,$event_moto,$event_logo,$event_date,$reg_start_date,$reg_end_date,$payable_amount){

    		$event_name     = $this->fm->validation($event_name);
    		$event_moto     = $this->fm->validation($event_moto);
    		$event_date     = $this->fm->validation($event_date);
    		$reg_start_date = $this->fm->validation($reg_start_date);
    		$reg_end_date   = $this->fm->validation($reg_end_date);
    		$payable_amount = $this->fm->validation($payable_amount);
        
        $event_name     = mysqli_real_escape_string($this->db->link, $event_name);
        $event_moto     = mysqli_real_escape_string($this->db->link, $event_moto);
        #$event_logo     = mysqli_real_escape_string($this->db->link, $event_logo);
        $event_date     = mysqli_real_escape_string($this->db->link, $event_date);
        $reg_start_date = mysqli_real_escape_string($this->db->link, $reg_start_date);
        $reg_end_date   = mysqli_real_escape_string($this->db->link, $reg_end_date);
        $payable_amount = mysqli_real_escape_string($this->db->link, $payable_amount);

        try {

        $logo_name = $event_logo['name'];
        $logo_tem  = $event_logo['tmp_name'];
        $logo_size = $event_logo['size'];
        $logo_type = $event_logo['type'];

        $permitted = array('png', 'jpg', 'jpeg', 'gif');
		    $file_extension = strtolower(end(explode(".", $logo_name)));

        if (empty($event_name) || empty($event_moto) || empty($logo_name) || empty($event_date) || empty($reg_start_date) || empty($reg_end_date) || empty($payable_amount)) {
          echo '<div class="alert alert-danger"> Field Must not be Empty!</div>';
        } elseif ($logo_size > 500000) {
             
	      echo '<div class="alert alert-danger" role="alert">  Sorry, your file is too large. </div>';

         } elseif (in_array($file_extension, $permitted) === false) {
             
	      echo '<div class="alert alert-danger" role="alert"> You can uploads only:-'.implode(', ', $permitted).'</div>';

         } else {

         	$e_date = explode('/', $event_date);
         	$date_of_event = $e_date[1].'-'.$e_date[0].'-'.$e_date[2];

         	$s_date = explode('/', $reg_start_date);
         	$event_reg_sdate = $s_date[1].'-'.$s_date[0].'-'.$s_date[2];

         	$en_date = explode('/', $reg_end_date);
         	$event_reg_edate = $en_date[1].'-'.$en_date[0].'-'.$en_date[2];

         	$file_name = strtolower(preg_replace('/\s+/', '_', $logo_name));
        
	        $upload_path = "../../event_file/images/";
	        
	        if (!is_dir($upload_path)) {    // Direcatory checking
	          mkdir($upload_path, 0777, true);
	        }
	        
	         /*if (glob($upload_path."*")) {
	             
	             array_map('unlink', glob($upload_path."*"));
	             
	          }*/
	          
	          $image_path = $upload_path.$file_name;
            
            move_uploaded_file($logo_tem, $image_path); 
            
            $sql = "INSERT INTO event_list(name,moto,logo,event_date,reg_start_date,reg_end_date,payable_amout) VALUES('$event_name','$event_moto','$file_name','$date_of_event','$event_reg_sdate','$event_reg_edate','$payable_amount')";
            $insert = $this->db->insert($sql);
            if ($insert) {
            	echo '<div class="alert alert-success"> Event Created Successfully! </div>';
            } else{
            	echo '<div class="alert alert-danger"> Event not Created! </div>';
            }
         }
        	
        } catch (Exception $e) {
        	echo '<div class="alert alert-danger"> Something went wrong. </div>';
        }
	}

  public function getEventByIdData($eventId){
    
    try {

    $eventId = $this->fm->validation($eventId);
    $eventId = mysqli_real_escape_string($this->db->link, $eventId);

    $sql = "SELECT * FROM event_list WHERE id = '$eventId'";
    $result = $this->db->select($sql);
    return $result;
      
    } catch (Exception $e) {
      $msg = '<div class="alert alert-danger"> Something went wrong. </div>';
      return $msg;
    }
  }
	
 public function countPerticpents($id){
    $id = $this->fm->validation($id);
    $id = mysqli_real_escape_string($this->db->link, $id);

    $sql = "SELECT count(id) AS TOTAL_PARTICIPANTS FROM participants WHERE event_id = '$id'";
    $result = $this->db->select($sql);
    if ($result) {
      $trows = $result->fetch_assoc();
      $tparticipants = $trows['TOTAL_PARTICIPANTS'];
      return $tparticipants;
    }
  }

	public function getEventAllData(){
		$sql = "SELECT * FROM event_list WHERE status = 0 ORDER BY id DESC";
		$result = $this->db->select($sql);
		return $result;
	}
	
	public function getSingleEventInfo($eventID){
	
	$sql = "SELECT * FROM event_list WHERE  id='$eventID' ORDER BY id DESC";
		$result = $this->db->select($sql);
		return $result;
	
	}
	public function deleteEventById($event_id){
		$sql = "DELETE FROM event_list WHERE id = '$event_id'";
		$del = $this->db->delete($sql);
		if ($del) {
			echo '<div class="alert alert-success"> Event Deleted Successfully! </div>';
		} else{
			echo '<div class="alert alert-danger"> Event not Deleted! </div>';
		}
	}

	public function addEventStudentReg($event_id,$name_english,$name_bangle,$mobile_number,$fathers_name,$mothers_name,$session,$reg_number,$halls,$department,$parmenant_address,$permanent_district,$NID,$gender,$blood_group,$email_address,$trx_id_number,$t_shirt_size,$photo) {

      try {

      $event_id           = $this->fm->validation($event_id);
      $name_english       = $this->fm->validation($name_english);
      $name_bangle        = $this->fm->validation($name_bangle);
      $mobile_number      = $this->fm->validation($mobile_number);
      $fathers_name       = $this->fm->validation($fathers_name);
      $mothers_name       = $this->fm->validation($mothers_name);
      $session            = $this->fm->validation($session);
      $reg_number         = $this->fm->validation($reg_number);
      $halls              = $this->fm->validation($halls);
      $department         = $this->fm->validation($department);
      $parmenant_address  = $this->fm->validation($parmenant_address);
      $permanent_district = $this->fm->validation($permanent_district);
      $NID                = $this->fm->validation($NID);
      $gender             = $this->fm->validation($gender);
      $blood_group        = $this->fm->validation($blood_group);
      $email_address      = $this->fm->validation($email_address);
      $trx_id_number      = $this->fm->validation($trx_id_number);
      $t_shirt_size       = $this->fm->validation($t_shirt_size);
   
      $event_id           = mysqli_real_escape_string($this->db->link, $event_id);
      $name_english       = mysqli_real_escape_string($this->db->link, $name_english);
      $name_bangle        = mysqli_real_escape_string($this->db->link, $name_bangle);
      $mobile_number      = mysqli_real_escape_string($this->db->link, $mobile_number);
      $fathers_name       = mysqli_real_escape_string($this->db->link, $fathers_name);
      $mothers_name       = mysqli_real_escape_string($this->db->link, $mothers_name);
      $session            = mysqli_real_escape_string($this->db->link, $session);
      $reg_number         = mysqli_real_escape_string($this->db->link, $reg_number);
      $halls              = mysqli_real_escape_string($this->db->link, $halls);
      $department         = mysqli_real_escape_string($this->db->link, $department);
      $parmenant_address  = mysqli_real_escape_string($this->db->link, $parmenant_address);
      $permanent_district = mysqli_real_escape_string($this->db->link, $permanent_district);
      $NID                = mysqli_real_escape_string($this->db->link, $NID);
      $gender             = mysqli_real_escape_string($this->db->link, $gender);
      $blood_group        = mysqli_real_escape_string($this->db->link, $blood_group);
      $email_address      = mysqli_real_escape_string($this->db->link, $email_address);
      $trx_id_number      = mysqli_real_escape_string($this->db->link, $trx_id_number);
      $t_shirt_size       = mysqli_real_escape_string($this->db->link, $t_shirt_size);

      $image_name = $photo['name'];
	    $image_tem  = $photo['tmp_name'];
	    $image_size = $photo['size'];
	    $image_type = $photo['type'];

	    $permitted = array('png', 'jpg', 'jpeg', 'gif');
		
		$image_ext=explode(".", $image_name);
		
		$image_name_sizwe= sizeof($image_ext);
		
      $file_extension = strtolower($image_ext[$image_name_sizwe-1]);

      $imgdata = getimagesize($image_tem);
      $width   = $imgdata[0];
      $height  = $imgdata[1];

      if (empty($event_id) || empty($name_english) || empty($name_bangle) || empty($mobile_number) || empty($fathers_name) || empty($mothers_name) || empty($session) || empty($halls) || empty($department) || empty($parmenant_address) || empty($permanent_district) || empty($gender) || empty($blood_group) || empty($email_address) || empty($trx_id_number) || empty($t_shirt_size)) {
          echo '<div class="alert alert-danger">Error 202: Field Must not be Empty!</div>';
        } else if ($image_size > 1048576) {
             
	      echo '<div class="alert alert-danger" role="alert">Error 202:  Image size should be less than 1 MB. </div>';

         } else if (in_array($file_extension, $permitted) === false) {
             
	      echo '<div class="alert alert-danger" role="alert">Error 202: You can uploads only:-'.implode(', ', $permitted).'</div>';

         } else{

         $sqlck = "SELECT * FROM participants WHERE trx_id_number = '$trx_id_number'";
          $resultck = $this->db->select($sqlck);
          if ($resultck != false){
               echo '<div class="alert alert-danger" role="alert">
                  Error 202: This Trx ID <b>'.$trx_id_number.'</b> Already Exists.
                 </div>'; 
            } else {

            $file_name = strtolower(preg_replace('/\s+/', '_', $image_name));

            $sql = "INSERT INTO participants (event_id,name_eng,name_ban,fathers_name,mothers_name,session,reg_number,halls,department,mobile_number,parmenant_address,permanent_district,trx_id_number,t_shirt_size,NID,email_address,gender,blood_group,photo) VALUES ('$event_id','$name_english','$name_bangle','$fathers_name','$mothers_name','$session','$reg_number','$halls','$department','$mobile_number','$parmenant_address','$permanent_district','$trx_id_number','$t_shirt_size','$NID','$email_address','$gender','$blood_group','$file_name')";
            $insert = $this->db->insert($sql);

            if ($insert) {

            $last_id = mysqli_insert_id($this->db->link);
        
            $upload_path = "../event_student/images/".$last_id."/";
            
            if (!is_dir($upload_path)) {
              mkdir($upload_path, 0777, true);
            }

           $image_path = $upload_path.$file_name;
       
       
       if(move_uploaded_file($image_tem, $image_path)){
                    echo $last_id; //'<div class="alert alert-success"> Registration Successfully! </div>';

       }else{
       
              echo '<div class="alert-danger">Error 202:Image Upload Problem</div>';

       }
             
            } else{
              echo '<div class="alert-danger">Error 202:Something went wrong.</div>';
            }

            }
            
         }
      	
      } catch (Exception $e) {
      	echo '<div class="alert alert-danger">Error 202:Something went wrong.</div>';
      }
      

	}
	
	
	public function getEventPerticcpentsById($event_id) {
	   
	  try {
	      
	  $event_id = $this->fm->validation($event_id);
      $event_id  = mysqli_real_escape_string($this->db->link, $event_id);
      
      $sql = "SELECT * FROM participants WHERE event_id = '$event_id' ORDER BY id DESC";
      $result = $this->db->select($sql);
      return $result;
	      
	  } catch(Exception $e) {
	      return '<div class="alert alert-danger">Something went wrong.</div>';
	  }
	    
	}

  public function getEventPerticcpentsAll() {
     
    try {
              
      $sql = "SELECT participants.*, event_list.name AS event_name FROM participants JOIN event_list ON participants.event_id = event_list.id ORDER BY participants.id DESC";
      $result = $this->db->select($sql);
      return $result;
        
    } catch(Exception $e) {
        return '<div class="alert alert-danger">Something went wrong.</div>';
    }
      
  }
	
	public function getPerticpentById($perticpentId) {
	    
	    try {
	        
	      $perticpentId = $this->fm->validation($perticpentId);
          $perticpentId  = mysqli_real_escape_string($this->db->link, $perticpentId);
          
          $sql = "SELECT * FROM participants WHERE id = '$perticpentId'";
          $result = $this->db->select($sql);
          return $result;
	        
	    } catch(Exception $e){
	        return '<div class="alert alert-danger">Something went wrong.</div>';
	    }
	}

  

	//////////////////////////

	public function getHallsList() {
		$sql = "SELECT * FROM halls";
		$result = $this->db->select($sql);
		if ($result) {
            $hall_list = '<option value="" style="display:none;"> Select Halls </option>';
			while ($rows = $result->fetch_assoc()) {
				$hall_name = $rows['HALL_NAME'];

				$hall_list .= '<option value="'.$hall_name.'">'.$hall_name.'</option>';
			}

			echo $hall_list;
		}
	}

  public function getEventPreview($id){

    $id = $this->fm->validation($id);
    $id = mysqli_real_escape_string($this->db->link, $id);

    if(filter_var($id, FILTER_VALIDATE_INT)) {
       $sql =  "SELECT * FROM participants WHERE id = '$id'";
      $result = $this->db->select($sql);
      return $result;
    } else {
     return 'Invalid ID';
   }

  }

  public function userEventPaymentStatusUpdate($paymentID,$userID) {

    $paymentID = $this->fm->validation($paymentID);
    $userID    = $this->fm->validation($userID);
    $paymentID = mysqli_real_escape_string($this->db->link, $paymentID);
    $userID    = mysqli_real_escape_string($this->db->link, $userID);

   try {
      if(filter_var($userID, FILTER_VALIDATE_INT)) {
       $sql = "UPDATE participants SET trx_id_number ='$paymentID', payment_status = 1 WHERE id = '$userID'";
      $result = $this->db->update($sql);
      //echo '<div class="alert alert-success"> Payment Updated Successfully! </div>';
    } else {
   //  echo '<div class="alert alert-danger"> Invalid ID </div>';
   }
   } catch (Exception $e) {
    // echo '<div class="alert alert-danger">Something went wrong!</div>';
   }

  }
  
  	public function getDepartmentList() {
		$sql = "SELECT * FROM subjects";
		$result = $this->db->select($sql);
		if ($result) {
            $subjects_list = '<option value="" style="display:none;"> Select Subjects </option>';
			while ($rows = $result->fetch_assoc()) {
				$subjects_name = $rows['SUBJECT_TITLE'];

				$subjects_list .= '<option value="'.$subjects_name.'">'.$subjects_name.'</option>';
			}

			echo $subjects_list;
		}
	}

	
}