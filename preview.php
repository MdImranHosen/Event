 <?php 
 
 include 'inc/header.php';

 ?>
 <?php 
 $id;
 $eventID;
   if (isset($_GET['action'])) {
      $id = $_GET['action'];
      $eventID = $_GET['eventID'];
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
     #profile_pic{overflow: hidden;border-radius: 50%;width: 35%;cursor: pointer;}
	@media only screen and (max-width: 600px) {
       .du_logod{}
	   .du_logod img{width: 100%}
	   .file_cooser_style{padding:6px;width:219px;}
	}
</style>

  	<div class="container"><!-- style="border: 2px solid #ddd;padding: 0 15px;" -->
    

	<div class="row">
      <nav class="navbar navbar-info bg-info">
     	<div class="col-lg-4 text-center">
     		<a href="index.php"><img src="img/event.png" class="img-thumbnail" height="auto" width="45%"></a>
     	</div>
     	<div class="col-lg-8">
     		<!--h1 class="text-center text-white"> DU Event </h1-->
     	</div>
       </nav>
     </div>
     <div class="clearfix"></div>


   <div class="card">
     <div class="card-header">
      <h3 class="card-title"> Preview </h3>
    </div>
    <div class="card-body">
      <?php

        if (class_exists('EventClass')) {
           $event = new EventClass();

           if (method_exists($event, 'getEventPreview')) {
             $data = $event->getEventPreview($id);
             if ($data) {
               while ($rows = $data->fetch_assoc()) {

               $es_id = $rows['id'];

                $imagefile = "event_student/images/".$es_id."/".$rows['photo'];
                  if (file_exists($imagefile)) {
                  	$imagefile;
                  } else {
                    $imagefile = "event_student/images/user.png";
                  }
                 
            ?>
            <table class="table table-bordered table-hover">
              <tbody>
                <tr>
                   <td colspan="2">
                    <div class='preview_image'><div id='image_preview'><img src="<?php echo $imagefile; ?>" id='profile_pic' style="height: 200px;width: auto;"></div></div></td>
                </tr>
                <tr>
                  <td width="50%"><strong> Name English: </strong><?php echo $rows['name_eng']; ?></td>
                  <td width="50%"><strong> Name Bangla: </strong><?php echo $rows['name_ban']; ?></td>
                </tr>
                <tr>
                  <td width="50%"><strong> Fathers Name: </strong><?php echo $rows['fathers_name']; ?></td>
                  <td width="50%"><strong> Mothers Name: </strong><?php echo $rows['mothers_name']; ?></td>
                </tr>
                <tr>
                  <td width="50%"><strong> Session: </strong><?php echo $rows['session']; ?></td>
                  <td width="50%"><strong> Registration Number: </strong><?php echo $rows['reg_number']; ?></td>
                </tr>
                <tr>
                  <td width="50%"><strong> Halls: </strong><?php echo $rows['halls']; ?></td>
                  <td width="50%"><strong> Department: </strong><?php echo $rows['department']; ?></td>
                </tr>
                <tr>
                  <td width="50%"><strong> Mobile Number: </strong><?php echo $rows['mobile_number']; ?></td>
                  <td width="50%"><strong> Parmenant Address: </strong><?php echo $rows['parmenant_address']; ?></td>
                </tr>
                <tr>
                  <td width="50%"><strong> Parmenant District: </strong><?php echo $rows['permanent_district']; ?></td>
                  <td width="50%"><strong> Trx ID: </strong><?php echo $rows['trx_id_number']; ?></td>
                </tr>
                <tr>
                  <td width="50%"><strong> Gender: </strong><?php echo $rows['gender']; ?></td>
                  <td width="50%"><strong> T-Shirt Size: </strong><?php echo $rows['t_shirt_size']; ?></td>
                </tr>
                <tr>
                  <td width="50%"><strong> NID: </strong><?php echo $rows['NID']; ?></td>
                   <td width="50%"><strong> Blood Group: </strong><?php echo $rows['blood_group']; ?></td>
                  
                </tr>
                <tr>
                  <td colspan="2"><a> <button class="btn btn-info btn-block" id="bKash_button" >Confirm Registration </button></a></td>
                </tr>
              </tbody>
            </table>
            <?php
               }
             }
           }
        }
      ?>
    </div>
 </div>

    <div class="row btn-info" style="min-height: 100px;margin-top: 20px;">
    	<div class="col-lg-6 du_event_footer_left">
    		<!-- <div id="check_data"> Check </div> -->
    		<p class="text-left"><b> Develop by </b><a target="_blank" href="http://github.com/MdImranHosen"> Md Imran Hosen </a></p>
    	</div>
    	<div class="col-lg-6 du_event_footer_left">
    		<p><strong> Copyright &copy; <?php echo date("Y"); ?> <a target="_blank" href="http://github.com/MdImranHosen"> www.github.com/MdImranHosen </a>.</strong> All rights
		    reserved.</p>
    	</div>
    </div>
   </div>
<?php include 'inc/footer.php'; ?>
<script src="https://scripts.sandbox.bka.sh/versions/1.1.0-beta/checkout/bKash-checkout-sandbox.js"></script>
<script type="text/javascript">
	var data = JSON.stringify(false);

	var xhr = new XMLHttpRequest();
	xhr.withCredentials = true;

	xhr.addEventListener("readystatechange", function () {
	  if (this.readyState === this.DONE) {
	    console.log(this.responseText);
	  }
	});

	xhr.open("POST", "https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/token/grant");
	xhr.setRequestHeader("username", "username");
	xhr.setRequestHeader("password", "password");

	xhr.send(data);


</script>
<script type="text/javascript">
var payment_url="";

/*	$(document).ready(function() {
	
      $('#bKash_button').on('click', function(){
	  
	  
         var paymentID = "KLRKA581575782709536";
         var userID    = <?php #echo $id; ?>

         $.ajax({
             type: "POST",
             url: "ajax/payment_status_update.php",
             data: {paymentID:paymentID,userID:userID},
             success: function(data){
             	$('#message').html(data);
             	window.location.href='print.php?action=<?php #echo $id; ?>';
             }
         });

	 
		 
      });
	});*/

$(document).ready(function() {
	
      $('#bKash_button').on('click', function() {
             	
        window.location.href='print.php?action=<?php echo $id; ?>';
		 
      });
	});
	
	
	function load_payment_details(event_id){
	
	//paymentFrame
	
	   // $.ajax({
             // type: "GET",
             // url: "nagad_payment_int.php",
             // data: {paymentID:paymentID,userID:userID},
             // success: function(data){
             	// //$('#message').html(data);
             	// alert(data);
             // }
         // });
  $.ajax({
        type: "GET",
        url: 'nagad_payment_int.php?eventid='+event_id,
        data:{},
     
        crossDomain:true,
        success: function(data, status, xhr) {
             			 var n = data.includes("callBackUrl");

			 
 
if(n){

	var myObj = JSON.parse(data); 
		  
	   $('#nagad_payment').prop('disabled', false);
        payment_url=myObj.callBackUrl;
	   

}else{

alert("Invalid Info");
}
		
	   }
    });
		 
	
	}
	
	function showPayment_frame(){
	
	
	  //$("#nagad_paynmentmodel").show();
	  
window.location.href=payment_url;

	}
	
	
</script>