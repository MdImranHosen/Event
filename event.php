 <?php 
 
 include 'inc/header.php';
 
 ?>
<?php

  if (class_exists('EventClass')) {
  	 $event = new EventClass();
	}
?>

<style type="text/css">
	.file_cooser_style{padding:6px;}
	.preview_image{text-align: center;
		font-weight: bold;
		background-color:
		transparent;
		overflow: auto;
		top: 10px;
		width: 94%;
		height: auto;
		margin-left: auto;
		margin-right: auto;
     }
     #profile_pic{overflow: hidden;border-radius: 50%;width: 42%;cursor: pointer;}
	@media only screen and (max-width: 600px) {
       .du_logod{}
	   .du_logod img{width: 100%}
	   .file_cooser_style{padding:6px;width:219px;}
	}
</style>

  	<div class="container"> <!-- style="border: 2px solid #ddd;padding: 0 15px;" -->

     <!--div class="row">
      <nav class="navbar navbar-info bg-info">
     	<div class="col-lg-4 text-center">
     		<a href="index.php"><img src="img/event.png" class="img-thumbnail" height="auto" width="45%"></a>
     	</div>
     	<div class="col-lg-8">
     		<h1 class="text-center text-white"></h1>
     	</div>
       </nav>
     </div-->

     <div class="clearfix"></div>
 <div class="card">
 <?php
 $name;
 $moto;
 $logo;
 $event_date;
 $reg_start_date;
 $reg_end_date;
 $payable_amout;
 
 $event_id=$_GET["eventid"];
 if(!empty($event_id)){
 
  	 if (method_exists($event, 'getSingleEventInfo')) {
      	 	$result = $event->getSingleEventInfo($event_id);
			
			if ($result) {
      	 		while ($rows = $result->fetch_assoc()) {
				
				 $name=$rows["name"];
				 $moto=$rows["moto"];
				 $logo=$rows["logo"];
				 $event_date=$rows["event_date"];
				 $reg_start_date=$rows["reg_start_date"];
				 $reg_end_date=$rows["reg_end_date"];
				 $payable_amout=$rows["payable_amout"];
				
				}
				}
			
			}
	 } else{
	 
	 
	 
	 
	 }
 
 
 ?>
 <table width="100%">
 <tr>
 
 <td width="10%">
 <img src="event_file/images/<?php echo $logo;?>" class="img-thumbnail" height="auto" width="100%">
 </td>
 <td>
 <h2><?php echo $name;?></h2> 
 <p><?php echo $moto;?></p>
 
 </td>
 
 </tr>
 </table>
 
 </div>
   <div class="card">
     <div class="card-header">
      <h3 class="card-title" id="message_insert"> Registration Form </h3>
    </div>
    <div id='message'></div>
    <div class="card-body">
  <form id="student_registration_for_event" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="event_id" id="event_id" value="<?php if(!empty($event_id)) { echo $event_id; } ?>">
  <div class="form-row justify-content-md-center" style="border-bottom: 2px solid #ddd;padding-bottom: 20px;margin-bottom: 15px;">
    <div class="col-md-6">
      <div class='preview_image'>
	    <div id='image_preview'><img src="event_student/images/user.png" title='Profile Picture is Required' id='profile_pic'></div>
	    <input type='file' id='photo' class='file_cooser_style' style='display:none;' accept='image/*'>
	    </div>
     <center> <p class="text-red">Image size should be less than 1 MB</p></center>
      <div id="err_photos"></div>
    </div>
  </div>
  <div class='clearfix'></div>
  <div class="form-row">
  	 <div class="form-group col-md-6">
      <label for="name_english"> Name (English) <span class="text-red"> * </span> </label>
      <input type="text" class="form-control" name="name_english" id="name_english">
      <div id="err_name_eng"></div>
    </div>
    <div class="form-group col-md-6">
      <label for="name_bangle"> Name (Bangla) <span class="text-red">*</span> </label>
      <input type="text" class="form-control" name="name_bangle" id="name_bangle">
      <div id="err_name_bng"></div>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="fathers_name"> Father’s Name <span class="text-red">*</span> </label>
      <input type="text" class="form-control" name="fathers_name" id="fathers_name">
      <div id="err_fathers_name"></div>
    </div>
    <div class="form-group col-md-6">
      <label for="mothers_name"> Mother’s Name <span class="text-red">*</span> </label>
      <input type="text" class="form-control" name="mothers_name" id="mothers_name">
      <div id="err_mothers_name"></div>
    </div>
  </div>

  <div class="form-row">
  	<div class="form-group col-md-6">
      <label for="mobile_number"> Mobile Number <span class="text-red">*</span> </label>
      <input type="text" class="form-control" name="mobile_number" id="mobile_number" onkeypress="return isNumberKey(event)">
      <div id="err_mobile_number"></div>
    </div>
    <div class="form-group col-md-6">
      <label for="session"> Session <span class="text-red">*</span> </label>
      <select class="form-control" style="cursor: pointer;" name="session" id="session">
      	<option value="" style="display: none;">Select Session</option>
      	<option value="2013-2014" selected>2013-2014</option>
      </select>
      <div id="err_session"></div>
    </div>
  </div>

  <div class="form-row">
  	<div class="form-group col-md-6">
      <label for="reg_number"> Registration number </label>
      <input type="text" class="form-control" name="reg_number" id="reg_number">
      <div id="err_reg_number"></div>
    </div>
    <div class="form-group col-md-6">
      <label for="halls"> Hall <span class="text-red">*</span> </label>
       <select class="form-control" name="halls" id="halls"></select>
      <div id="err_halls"></div>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="department"> Department <span class="text-red">*</span> </label>
      <input type="text" class="form-control" name="department" id="department">
      <div id="err_department"></div>
    </div>
    <div class="form-group col-md-6">
      <label for="t_shirt_size"> T-Shirt Size <span class="text-red">*</span> </label>
      <select class="form-control" style="cursor: pointer;" name="t_shirt_size" id="t_shirt_size">
      	 <option value="" style="display: none;"> Select T-Shirt Size </option>
         <option value="M-Size">M-Size</option>
      	 <option value="L-Size"> L-Size </option>
      	 <option value="XL-Size"> XL-Size </option>
      	 <option value="XXL-Size"> XXL-Size </option>
      </select>
      <div id="err_t_shirt_size"></div>
    </div>
  </div>

 <div class="form-row">
    
    <div class="form-group col-md-6">
      <label for="parmenant_address"> Permanent Address <span class="text-red">*</span> </label>
      <input type="text" class="form-control" name="parmenant_address" id="parmenant_address">
      <div id="err_parmenant_address"></div>
    </div>
	  <div class="form-group col-md-6">
      <label for="permanent_district"> Permanent District <span class="text-red">*</span> </label>
      <select class="form-control" style="cursor: pointer;" name="permanent_district" id="permanent_district">
      	 <option value="" style="display: none;"> Select District </option>
      	    <option value='Barguna'>Barguna</option>
<option value='Bagerhat'>Bagerhat</option>
<option value='Bandarban'>Bandarban</option>
<option value='Barisal'>Barisal</option>
<option value='Bhola'>Bhola</option>
<option value='Bogra'>Bogra</option>
<option value='Brammonbaria'>Brammonbaria</option>
<option value='Chandpur'>Chandpur</option>
<option value='Chittagong '>Chittagong </option>
<option value='Chuadanga'>Chuadanga</option>
<option value='Comilla'>Comilla</option>
<option value="Cox's Bazar">Cox's Bazar</option>
<option value='Dhaka'>Dhaka</option>
<option value='Dinajpur'>Dinajpur</option>
<option value='Faridpur'>Faridpur</option>
<option value='Feni'>Feni</option>
<option value='Gaibandha'>Gaibandha</option>
<option value='Ghazipur'>Ghazipur</option>
<option value='Gopalganj'>Gopalganj</option>
<option value='Habiganj'>Habiganj</option>
<option value='Jaipurhat'>Jaipurhat</option>
<option value='Jamalpur'>Jamalpur</option>
<option value='Jessore'>Jessore</option>
<option value='Jhalokathi'>Jhalokathi</option>
<option value='Jhenaidah'>Jhenaidah</option>
<option value='Khagrachhari'>Khagrachhari</option>
<option value='Khulna'>Khulna</option>
<option value='Kishoreganj'>Kishoreganj</option>
<option value='Kurigram'>Kurigram</option>
<option value='Kushtia'>Kushtia</option>
<option value='Laksmipur'>Laksmipur</option>
<option value='Lalmonirhat'>Lalmonirhat</option>
<option value='Madaripur'>Madaripur</option>
<option value='Magura'>Magura</option>
<option value='Manikganj'>Manikganj</option>
<option value='Meherpur'>Meherpur</option>
<option value='Moulvibazar'>Moulvibazar</option>
<option value='Munshiganj'>Munshiganj</option>
<option value='Mymensingh'>Mymensingh</option>
<option value='Naogaon'>Naogaon</option>
<option value='Narail'>Narail</option>
<option value='Narayanganj'>Narayanganj</option>
<option value='Natore'>Natore</option>
<option value='Nawabganj'>Nawabganj</option>
<option value='Netrokona'>Netrokona</option>
<option value='Nilphamari'>Nilphamari</option>
<option value='Noakhali'>Noakhali</option>
<option value='Norshingdi'>Norshingdi</option>
<option value='Pabna'>Pabna</option>
<option value='Panchagarh'>Panchagarh</option>
<option value='Patuakhali'>Patuakhali</option>
<option value='Pirojpur'>Pirojpur</option>
<option value='Rajbari'>Rajbari</option>
<option value='Rajshahi'>Rajshahi</option>
<option value='Rangamati'>Rangamati</option>
<option value='Rangpur'>Rangpur</option>
<option value='Satkhira'>Satkhira</option>
<option value='Shariatpur'>Shariatpur</option>
<option value='Sherpur'>Sherpur</option>
<option value='Sirajganj'>Sirajganj</option>
<option value='Sunamganj'>Sunamganj</option>
<option value='Sylhet.'>Sylhet.</option>
<option value='Tangail'>Tangail</option>
<option value='Thakurgaon'>Thakurgaon</option>

      </select>
      <div id="err_permanent_district"></div>
    </div>
    

  </div>

  <div class="form-row">
  	 <div class="form-group col-md-6">
      <label for="gender"> Gender <span class="text-red">*</span> </label>
      <select class="form-control" style="cursor: pointer;" name="gender" id="gender">
      	 <option value="" style="display: none;"> Select Gender </option>
      	 <option value="Male"> Male</option>
      	 <option value="Female"> Female</option>
   
      </select>
      <div id="err_gender"></div>
    </div>
	    <div class="form-group col-md-6">
      <label for="blood_group"> Blood Group <span class="text-red">*</span> </label>
      <select class="form-control" style="cursor: pointer;" name="blood_group" id="blood_group">
      	 <option value="" style="display: none;"> Select Blood Group </option>
      	 <option value="A+"> A+</option>
      	 <option value="O+"> O+ </option>
      	 <option value="B+"> B+ </option>
      	 <option value="AB+"> AB+ </option>
      	 <option value="A-"> A- </option>
      	 <option value="O-"> O- </option>
      	 <option value="B-"> B- </option>
      	 <option value="AB-"> AB- </option>
      </select>
      <div id="err_blood_group"></div>
    </div>
  </div>

  <div class="form-row">
     <div class="form-group col-md-6">
      <label for="email_address"> Email <span class="text-red">*</span> </label>
      <input type="text" class="form-control" name="email_address" id="email_address">
      <div id="err_email"></div>
    </div>
      <div class="form-group col-md-6">
      <label for="trx_id_number"> Nagad Transaction ID <span class="text-red">*</span> </label>
      <input type="text" class="form-control" name="trx_id_number" id="trx_id_number">
      <div id="err_trx_id"></div>
    </div>
  </div>
    <div class="form-row">
	 <div class="form-group col-md-6">
      <label for="NID"> NID(Optinal) <span class="text-red"></span> </label>
      <input type="text" class="form-control" name="NID" id="NID">
      <div id="err_nid"></div>
    </div>
  </div>
 
  <button type="submit" name="submit" class="btn btn-primary btn-block" id='update_button'> Save and Preview <img style='display:none;' id='loading_signup' src='event_student/images/ajax-loader.gif' height='20px'></button>
 </form>
    </div>
 </div>

    <div class="row " style="min-height: 100px;margin-top: 20px;  background-color: #fefbd8;">
    	<div class="col-lg-6 du_event_footer_left">
    		<!-- <div id="check_data"> Check </div> -->
    		<p class="text-left"><b> Develop by </b><a target="_blank" href="http://github.com/MdImranHosen"> Md Imran Hosen </a></p>
    	</div>
    	<div class="col-lg-6 du_event_footer_left" style="margin-bottom:20px;">
    	     		<a href="index.php"><img src="img/event.png" class="img-thumbnail" height="auto" width="45%"></a>

    	</div>
    </div>
   </div>
<?php include 'inc/footer.php'; ?>

<script type="text/javascript">

  $(document).ready(function() {

     $('#student_registration_for_event').on('submit', function(e) {

        var event_id          = $('#event_id').val();
        var name_english      = $('#name_english').val();
        var name_bangle       = $('#name_bangle').val();
        var mobile_number     = $('#mobile_number').val();
        var fathers_name      = $('#fathers_name').val(); 
        var mothers_name      = $('#mothers_name').val();
        var session           = $('#session').val();
        var reg_number        = $('#reg_number').val();
        var halls             = $('#halls').val();
        var department        = $('#department').val();
        var parmenant_address = $('#parmenant_address').val();
        var permanent_district = $('#permanent_district').val();
        var t_shirt_size      = $('#t_shirt_size').val();
        var NID               = $('#NID').val();
        var gender            = $('#gender').val();
        var blood_group       = $('#blood_group').val();
        var email_address     = $('#email_address').val();
        var trx_id_number     = $('#trx_id_number').val();

        var photo  = $('#photo').prop('files')[0];

        if (name_english == ""  && name_bangle == "" && mobile_number == "" && fathers_name == "" && mothers_name == "" && reg_number == "" && halls == "" && department == "" && parmenant_address == "" && permanent_district == "" && t_shirt_size == "" && gender == "" && blood_group == "" && email_address == "" && trx_id_number == "" && (document.getElementById("photo").files.length ==0)) {


          $('#err_name_eng').html("<div class='text-red'> Name Field must not be Empty!</div>");
          $('#err_name_bng').html("<div class='text-red'> Name Field must not be Empty!</div>");
          $('#err_mobile_number').html("<div class='text-red'> Mobile Number must not be Empty!</div>");
          $('#err_fathers_name').html("<div class='text-red'> Fathers Name Field must not be Empty!</div>");
          $('#err_mothers_name').html("<div class='text-red'>Mother’s Name Field must not be Empty!</div>");
          $('#err_halls').html("<div class='text-red'> Halls Field must not be Empty!</div>");
          $('#err_department').html("<div class='text-red'> Department Field must not be Empty!</div>");
          $('#err_parmenant_address').html("<div class='text-red'> Parmenant Address Field must not be Empty!</div>");
          $('#err_permanent_district').html("<div class='text-red'> Permanent District Field must not be Empty!</div>");
          $('#err_t_shirt_size').html("<div class='text-red'> T-Shirt Field must not be Empty!</div>");
          $('#err_gender').html("<div class='text-red'> Gender Field must not be Empty!</div>");
          $('#err_blood_group').html("<div class='text-red'> Blood Group Field must not be Empty!</div>");
          $('#err_trx_id').html("<div class='text-red'> Trx ID Field must not be Empty!</div>");
          $('#err_email').html("<div class='text-red'> Email Address Field must not be Empty!</div>");
          $('#err_photos').html("<div class='text-red'> Photo Field must not be Empty!</div>");

          return false;

        } else if(name_english == ""){
           $('#err_name_eng').html("<div class='text-red'> Name Field must not be Empty!</div>");
           return false;
        } else if (name_bangle == "") {
          $('#err_name_bng').html("<div class='text-red'> Name Field must not be Empty!</div>");
          return false;
        } else if (mobile_number == "") {
          $('#err_mobile_number').html("<div class='text-red'> Mobile Number must not be Empty!</div>");
          return false;
        } else if (mobile_number.length > 15) {
          $('#err_mobile_number').html("<div class='text-red'> Mobile Number is too long!</div>");
          return false;
        }  else if (fathers_name == "") {
          $('#err_fathers_name').html("<div class='text-red'> Fathers Name Field must not be Empty!</div>");
          return false;
        } else if (session == "") {
          $('#err_mothers_name').html("<div class='text-red'>Mother’s Name Field must not be Empty!</div>");
          return false;
        } else if (halls == "") {
          $('#err_halls').html("<div class='text-red'> Halls Field must not be Empty!</div>");
          return false;
        } else if (department == "") {
          $('#err_department').html("<div class='text-red'> Department Field must not be Empty!</div>");
          return false;
        } else if (parmenant_address == "") {
          $('#err_parmenant_address').html("<div class='text-red'> Parmenant Address Field must not be Empty!</div>");
          return false;
        } else if (permanent_district == "") {
          $('#err_permanent_district').html("<div class='text-red'> Permanent District Field must not be Empty!</div>");
          return false;
        } else if (t_shirt_size == "") { 
          $('#err_t_shirt_size').html("<div class='text-red'> T-Shirt Field must not be Empty!</div>");
          return false;
        } else if (gender == "") { 
          $('#err_gender').html("<div class='text-red'> Gender Field must not be Empty!</div>");
          return false;
        } else if (blood_group == "") {
          $('#err_blood_group').html("<div class='text-red'> Blood Group Field must not be Empty!</div>");
          return false;
        } else if (email_address == "") {
          $('#err_email').html("<div class='text-red'> Email Address Field must not be Empty!</div>");
          return false;
        } else if (trx_id_number == "") {
          $('#err_trx_id').html("<div class='text-red'> Trx ID Field must not be Empty!</div>");
          return false;
        } else if (document.getElementById("photo").files.length ==0) {
          $('#err_photos').html("<div class='text-red'> Photo Field must not be Empty!</div>");
          return false;
        } else{

            $('#loading_signup').show();
            $('#update_button').prop("disabled",true);
        	var form_data = new FormData();

            form_data.append('event_id', event_id);
            form_data.append('name_english', name_english);
            form_data.append('name_bangle', name_bangle);
            form_data.append('mobile_number', mobile_number);
            form_data.append('fathers_name', fathers_name);
            form_data.append('mothers_name', mothers_name);
            form_data.append('session', session);
            form_data.append('reg_number', reg_number);
            form_data.append('halls', halls);
            form_data.append('department', department);
            form_data.append('parmenant_address', parmenant_address);
            form_data.append('permanent_district', permanent_district);
            form_data.append('t_shirt_size', t_shirt_size);
            form_data.append('NID', NID);
            form_data.append('gender', gender);
            form_data.append('blood_group', blood_group);
            form_data.append('email_address', email_address);
            form_data.append('trx_id_number', trx_id_number);
            form_data.append('photo', photo);
            

            e.preventDefault();

          $.ajax({
                 type: "POST",
                 url: "ajax/add_event_student_reg_ajax.php",
				 enctype: 'multipart/form-data',
                data: form_data,
                 processData: false,
                 cache: false,
                 contentType: false,
                 success: function(data){
                  $('#message_insert').html(data);
                  $('#loading_signup').hide();
                  $('#update_button').prop("disabled",false);
				          var n = data.includes("Error 202");

				  if(!n){
				  
				                     window.location.href='preview.php?action='+data+'&eventID=<?php echo $event_id;?>';

				  }
                 },
                 error: function(err) {
                 	alert(err);
                 }
          });
          return false;
        }

     });
  });
</script>

<script type="text/javascript">
	function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
   // return true;
}
</script>

<script type="text/javascript">
	$(document).ready(function(){

          $.ajax({
            type: "GET",
            url: "ajax/halls_list_ajax.php",
            success: function(hall_list){
            	$('#halls').html(hall_list);
            }
          });

        $('#profile_pic').on('click',(function(){
	      $('#photo').click();
		}));


		$(function() {
		$("#photo").change(function() {
		$("#message").empty(); // To remove the previous error message
		var file = this.files[0];
		var imagefile = file.type;
		var match= ["image/jpeg","image/png","image/jpg"];
		if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
		{
		$('#profile_pic').attr('src','+event_student/images/user.png+');
		$("#message").html("<p class='alert alert-danger'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span class='alert alert-danger'>Only jpeg, jpg and png Images type allowed</span>");
		return false;
		}
		else
		{
		var reader = new FileReader();
		reader.onload = imageIsLoaded;
		reader.readAsDataURL(this.files[0]);
		}
		});
		});
      
		function imageIsLoaded(e) {
		$("#photo").css("color","green");
		$('#image_preview').css("display", "block");
		$('#profile_pic').attr('src', e.target.result);
		$('#profile_pic').attr('width', '150px');
		$('#profile_pic').attr('height', 'auto');
		};

	});
</script>