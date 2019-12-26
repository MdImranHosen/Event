<?php include "inc/header.php"; ?>
<?php 

  if ((Session::get('admin_type') != 1) || (Session::get('admin_ck') != 'event_admin')) {
    Session::destroy();
    header("Location:login.php");
  }

  if (Session::get('event_id')) {
    $eventId = Session::get('event_id');
  } else {
    Session::destroy();
    header("Location:login.php");
  }
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Token Generator Modal -->

<div id="generateTokenModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong> Generate Event Token</strong></h4>
        <div id="msg_message"></div>
      </div>
      <div class="modal-body">
         <form id="token_form" class="form-horizontal" method="POST" action="tokengenerator.php" enctype="multipart/form-data">
              <input type="hidden" name="eventID" id="eventID" value ="">
             <input type="hidden" name="eventName" id="eventName" value ="">
             
        <div id="err_token_label" class="form-group has-feedback">
          <label class="control-label col-sm-2" for="token_label"> Token Label <span style="color:red;font-size: 20px;">*</span></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="token_label" id="token_label" placeholder="Token Label">
            <div id="err_token_label_msg"></div>
          </div>
        </div>
        <div id="err_token_number" class="form-group has-feedback">
          <label class="control-label col-sm-2" for="token_number"> Number of Token <span style="color:red;font-size: 20px;">*</span></label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="token_number" onkeypress="return isNumberKey(event)" name="token_number" placeholder=" Number of Token">
            <div id="err_token_number_msg"></div>
          </div>
        </div>
        <div id="err_token_color" class="form-group has-feedback">
          <label class="control-label col-sm-2" for="token_color"> Token Colour <span style="color:red;font-size: 20px;">*</span></label>
          <div class="col-sm-10">
          <input type="color" class="form-control" name="token_color" id="token_color" value="#FF3C77">
            <div id="err_token_color_msg"></div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="save_token_data" class="btn btn-success btn-lg"> Generate Token </button>
          </div>
        </div>
      </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Token Generator Modal -->

  <?php include "inc/header_bottom.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->
<!--SideBar Start-->
  <?php include "inc/sidebar.php"; ?>
<!--SideBar End-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Admin Panel</li>
      </ol>
    </section>
    <div class="clearfix"></div>
    <hr/>

 <div class="container-fluid">
    <?php #include "inc/topbar.php"; ?>
 </div>

      <div class="clearfix"></div>
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-users"></i>

              <h3 class="box-title"> Event </h3>
            </div>
            <div class="box-body">
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th> NO </th>
                  <th> Event Name </th>
                  <th> Moto </th>
                  <th> Logo </th>
                  <th> Reg. Start Date </th>
                  <th> Reg. End Date </th>
                  <th> Payable Amount </th>
                  <th> Create Date </th>
                  <th> Participants List </th>
                  <td>Participants</td>
                  <th> Token </th>
                </tr>
                </thead>
                <tbody>
                 <?php 

                  if (class_exists('EventClass')) {
                    $event = new EventClass();
                    if (method_exists($event, 'getEventByIdData')) {
                      if (!empty($eventId)) {

                      $result = $event->getEventByIdData($eventId);
                      if ($result) {
                        $i = 0;
                        while ($rows = $result->fetch_assoc()) {
                          $i++;
                 ?>
                 <tr>
                   <td><?php echo $i; ?></td>
                   <td><?php echo $rows['name']; ?></td>
                   <td><?php echo $rows['moto']; ?></td>
                   <td><img src="../event_file/images/<?php echo $rows['logo']; ?>" width="100" height="auto"></td>
                   <td><?php echo $rows['event_date']; ?></td>
                   <td><?php echo $rows['reg_start_date']; ?></td>
                   <td><?php echo $rows['payable_amout']; ?></td>
                   <td><?php echo $rows['reg_end_date']; ?></td>
                   <td>
                       <a href="perticpents_list.php?event_id=<?php echo $rows['id']; ?>" class="btn btn-success"> Perticpents List </a>
                   </td>
                   <td><a class="btn btn-info" href="export_perticpents.php?eventid=<?php echo $rows['id']; ?>"> Participants <?php
                     if (method_exists($event, 'countPerticpents')) {
                     $totalPerticpents  = $event->countPerticpents($rows['id']);
                    echo '( '.$totalPerticpents.' )';
                     }
                    ?></a></td>

                   <td>
                      <button type="button" class="btn btn-success onclick_gen_token" onclick="tokengeneratemodalshow('<?php echo $rows['id'];?>')"
                        title="Generate Token" data-eventid="<?php echo $rows['id']; ?>"><i class="fa fa-cogs"></i></button></td>
                 </tr>
                <?php  } } } } } ?>
                </tbody>
              </table>
            </div>
          </div>

        </section>
        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"; ?>
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

    $('#token_form').on('submit', function(tok) {

      var token_label   = $('#token_label').val();
      var token_number  = $('#token_number').val();
      var token_color   = $('#token_color').val();
      
      
      if (token_label == "" && token_number == "" && token_color == "") {

        $('#err_token_label').addClass('has-error');
        $('#err_token_number').addClass('has-error');
        $('#err_token_color').addClass('has-error');
                  
        $('#err_token_label').html("<div class='text-red'> Token Label Field must not be Empty!</div>");
        $('#err_token_number').html("<div class='text-red'> Token Number Field must not be Empty!</div>");
        $('#err_token_color').html("<div class='text-red'> Token Colour must not be Empty! </div>");

          return false;
        } else if(err_token_label == ""){

        $('#err_token_label').addClass('has-error');
        $('#err_token_label_msg').html("<div class='text-red'> Token Label Field must not be Empty!</div>");
          return false;

        }  else if(err_token_number == "") {

        $('#err_token_number').addClass('has-error');
        $('#err_token_number_msg').html("<div class='text-red'> Token Number Field must not be Empty!</div>");
        
        return false;

        } else if(err_token_color == "") {

         $('#err_token_color').addClass('has-error');
         $('#err_token_color_msg').html("<div class='text-red'> Token Colour Field must not be Empty!</div>");

         return false;
       } else{

            var token_data = new TokenData();

            form_data.append('token_label', token_label);
            form_data.append('token_number', token_number);
            form_data.append('token_color', token_color);

            tok.preventDefault();
            $.ajax({
               type: "post",
               url: "tokengenerator.php",
               data: token_data,
               processData: false,
               cache: false,
               contentType: false,
               success: function(token_data){
                 $('#msg_message').html(token_data);
               }
            });
            return false;
       }

    });
  });
  
  function tokengeneratemodalshow(eventid){
            $('#eventID').val(eventid);
            $('#generateTokenModal').modal('show');
  }
</script>
