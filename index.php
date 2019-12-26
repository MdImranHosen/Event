<!-- 
Md Imran Hosen
Web Application Developer
www.github.com/MdImranHosen
www.fb.com/Md.ImranHosen.up
Dhaka, Bangladesh 
-->
 <?php include 'inc/header.php'; ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Program Segmentation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <ol>
          <li class="list-group"> ১. টি-শার্ট  </li>
          <li class="list-group"> ২. স্মরণিকা প্রকাশ </li>
          <li class="list-group"> ৩. রং উৎসব </li>
          <li class="list-group"> ৪. মধ্যাহ্নভোজ  </li>
          <li class="list-group"> ৫. রাতের খাবার </li>   
		  <li class="list-group"> ৬. কনসার্ট </li>

       </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--Model 2-->

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Concert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <ol>
          <li class="list-group"> 1.Warfaze </li>
          <li class="list-group"> 2.Avash </li>
          <li class="list-group"> 3.Kona</li>
          <li class="list-group"> 4.Campus Band  </li>
          <li class="list-group"> 5.Cultural Programme</li>   
       </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  	<div class="container"> <!-- style="border: 2px solid #ddd;padding: 0 15px;" -->
     <div class="row">
      <nav class="navbar navbar-info bg-info">
     	<div class="col-lg-4 text-center">
     		<a href="index.php"><img src="img/event.png" class="img-thumbnail" height="auto" width="45%"></a>
     	</div>
     	<div class="col-lg-8">
     		<h1 class="text-center text-white"></h1>
     	</div>
       </nav>
     </div>
     <div class="clearfix"></div>
     <?php
      if (class_exists('EventClass')) {
      	 $event = new EventClass();
      	 if (method_exists($event, 'getEventAllData')) {
      	 	$result = $event->getEventAllData();
      	 	if ($result) {
      	 		while ($rows = $result->fetch_assoc()) {
      ?>
    <div class="row du_event_list_style">
    	<div class="col-lg-2 text-center border_event_logo">
    		<img src="event_file/images/<?php echo $rows['logo']; ?>" class="img-thumbnail" height="auto" width="100%">
    	</div>
    	<div class="col-lg-8 du_event_list_body">
    		<h2><?php echo $rows['name']; ?></h2>
    		<p><?php echo $rows['moto']; ?></p>
    		<p><b> Last Date: <span class="badge badge-secondary"> <?php echo $rows['reg_end_date']; ?> </span></b></p>
			<h4 style="color: #373090"><b> Nagad Account No: 01900001111</span></b></h4>
			<table>
			<tr>
			<td><button type="button" class="btn btn-primary btn-block" style="margin-bottom: 5px;" data-toggle="modal" data-target="#exampleModal1">
  Concert 
</button></td>
			<td><button type="button" class="btn btn-info btn-block" style="margin-bottom: 5px;" data-toggle="modal" data-target="#exampleModal">
  Program Segmentation 
</button></td>
			
			</tr>
			</table>
    	</div>
    	<div class="col-lg-2 text-center align-middle du_event_apply_button_style">
       
    		<a href="event.php?eventid=<?php echo $rows['id']; ?>" class="btn btn-info btn-block"> Apply </a>
    	</div>
    </div>
   <?php  } } } } ?>
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