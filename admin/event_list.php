<?php include "inc/header.php"; ?>
<?php 
 if ((Session::get('admin_type') != 2) || (Session::get('admin_ck') != 'emain_admin')) {
    Session::destroy();
    header("Location:login.php");
  }
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include "inc/header_bottom.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->
<!--SideBar Start-->
  <?php include "inc/sidebar.php"; ?>
<!--SideBar End-->
<style type="text/css">
  .invalid-feedback{color: red;display: none;}
</style>
<!-- Add Event Modal -->
<div id="addEventModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong> Add Event </strong></h4>
        <div id="msg_message"></div>
      </div>
      <div class="modal-body">
         <form id="event_form" class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
        <div id="err_event_name" class="form-group has-feedback">
          <label class="control-label col-sm-2" for="event_name"> Event Name <span style="color:red;font-size: 20px;">*</span></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="event_name" id="event_name" placeholder="Event Name">
            <div id="err_event_name_msg"></div>
          </div>
        </div>
        <div id="err_event_moto" class="form-group has-feedback">
          <label class="control-label col-sm-2" for="event_moto"> Event Moto <span style="color:red;font-size: 20px;">*</span></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="event_moto" name="event_moto" placeholder=" Event Moto">
            <div id="err_event_moto_msg"></div>
          </div>
        </div>
        <!-- <div id="err_description" class="form-group has-feedback">
          <label class="control-label col-sm-2" for="project_description"> Descripton <span style="color:red;font-size: 20px;">*</span></label>
          <div class="col-sm-10">
            <textarea name="project_description" id="project_description"></textarea>
            <div id="err_p_description"></div>
          </div>
        </div> -->
        <div id="err_event_logo" class="form-group has-feedback">
          <label class="control-label col-sm-2" for="event_logo"> Logo <span style="color:red;font-size: 20px;">*</span></label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="event_logo" name="event_logo" accept="image/*">
            <div id="err_event_logo_msg"></div>
          </div>
        </div>

        <div id="err_event_date" class="form-group has-feedback">
          <label class="control-label col-sm-2" for="event_date"> Event Date <span style="color:red;font-size: 20px;">*</span></label>
          <div class="col-sm-8 input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control" name="event_date" id="event_date">
            <div id="err_event_date_msg"></div>
          </div>
        </div>

        <div id="err_reg_start_date" class="form-group has-feedback">
          <label class="control-label col-sm-2" for="reg_start_date"> Reg. Start Date <span style="color:red;font-size: 20px;">*</span></label>
          <div class="col-sm-8 input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control" name="reg_start_date" id="reg_start_date">
            <div id="err_reg_start_date_msg"></div>
          </div>
        </div>
        <div id="err_reg_end_date" class="form-group has-feedback">
          <label class="control-label col-sm-2" for="reg_end_date"> Reg. End Date <span style="color:red;font-size: 20px;">*</span></label>
          <div class="col-sm-8 input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control" name="reg_end_date" id="reg_end_date">
            <div id="err_reg_end_date_msg"></div>
          </div>
        </div>       
        <div id="err_payable_amount" class="form-group has-feedback">
          <label class="control-label col-sm-2" for="payable_amount"> Payable Amount <span style="color:red;font-size: 20px;">*</span></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="payable_amount" name="payable_amount" placeholder="Payable Amount">
            <div id="err_payable_amount_msg"></div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="save_project_data" class="btn btn-success btn-lg"> Add Event </button>
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

<!-- Add Event Modal -->


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
            <input type="number" class="form-control" id="token_number" name="token_number" placeholder=" Number of Token">
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
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header" style="margin-bottom: 20px;">
              <i class="fa fa-list"></i>

              <h3 class="box-title">Event List</h3>
              <!-- tools box -->
             <div class="pull-right box-tools">
                <button type="button" class="btn btn-success btn-lg" data-target="#addEventModal" data-toggle="modal"
                        title="Add Event">
                  <i class="fa fa-plus"></i> Add Event</button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <div id="message_data"></div>
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
                  <th> Action </th>
                </tr>
                </thead>
                <tbody>
                 <?php 

                  if (class_exists('EventClass')) {
                    $event = new EventClass();
                    if (method_exists($event, 'getEventAllData')) {
                      $result = $event->getEventAllData();
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
                    <td>
                      <!-- <button type="button" class="btn btn-danger"><i class="fa fa-eye"></i></button> 
                      <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button> --> 
                      <button type="button" class="btn btn-warning onclick_del_event" data-eventid="<?php echo $rows['id']; ?>"><i class="fa fa-trash"></i></button></td>
                 </tr>
                <?php  } } } } ?>
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

<script>
  $(document).ready(function(){
     $(document).on('click', '.onclick_del_event', (function() {
         var event_id = $(this).data('eventid');

          $.ajax({
                type: "post",
                url: "ajax/event_del_ajax.php",
                data: {event_id:event_id},
                success: function(del){
                  $('#message_data').html(del);
                },
                error: function(err){
                  alert(err);
                }
          });

     }));
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $('#event_form').on('submit', function(e) {

      var event_name     = $('#event_name').val();
      var event_moto     = $('#event_moto').val();
      var event_date     = $('#event_date').val();
      var reg_start_date = $('#reg_start_date').val();
      var reg_end_date   = $('#reg_end_date').val();
      var payable_amount = $('#payable_amount').val();
      var event_logo     = $('#event_logo').prop('files')[0];
      
      
      if (event_name == "" && event_moto == "" && event_date == "" && reg_start_date == "" && reg_end_date == "" && payable_amount == "" && (document.getElementById("event_logo").files.length ==0)) {

        $('#err_event_name').addClass('has-error');
        $('#err_event_moto').addClass('has-error');
        $('#err_event_logo').addClass('has-error');
        $('#err_event_date').addClass('has-error');
        $('#err_reg_start_date').addClass('has-error');
        $('#err_reg_end_date').addClass('has-error');
        $('#err_payable_amount').addClass('has-error');
                  
        $('#err_event_name_msg').html("<div class='text-red'> Event Name Field must not be Empty!</div>");
        $('#err_event_moto_msg').html("<div class='text-red'> Event Moto Field must not be Empty!</div>");
        $('#err_event_logo_msg').html("<div class='text-red'> Event Logo must not be Empty! </div>");
        $('#err_event_date_msg').html("<div class='text-red'> Event Date Field must not be Empty!</div>");
        $('#err_reg_start_date_msg').html("<div class='text-red'> Registration Start Date must not be Empty! </div>");
        $('#err_reg_end_date_msg').html("<div class='text-red'> Registration End Date must not be Empty! </div>");
        $('#err_payable_amount_msg').html("<div class='text-red'> Payable Amount must not be Empty!</div>");

          return false;
        } else if(event_name == ""){

        $('#err_event_name').addClass('has-error');
        $('#err_event_name_msg').html("<div class='text-red'> Event Name Field must not be Empty!</div>");
          return false;

        }  else if(event_moto == "") {

        $('#err_event_moto').addClass('has-error');
        $('#err_event_moto_msg').html("<div class='text-red'> Event Moto Field must not be Empty!</div>");
        
        return false;

        } else if(document.getElementById("event_logo").files.length ==0){

         $('#err_event_logo').addClass('has-error');
         $('#err_event_logo_msg').html("<div class='text-red'> Event Logo must not be Empty! </div>");
         
         return false;
       } else if(event_date == "") {

         $('#err_event_date').addClass('has-error');
         $('#err_event_date_msg').html("<div class='text-red'> Event Date Field must not be Empty!</div>");

         return false;
       }  else if(reg_start_date == "") {

         $('#err_reg_start_date').addClass('has-error');
         $('#err_reg_start_date_msg').html("<div class='text-red'> Registration Start Date must not be Empty! </div>");
         return false;
       }  else if(reg_end_date == "") {
        
         $('#err_reg_end_date').addClass('has-error');
         $('#err_reg_end_date_msg').html("<div class='text-red'> Registration End Date must not be Empty! </div>");
         
         return false;
       }  else if(payable_amount == "") {
        
         $('#err_payable_amount').addClass('has-error');
         $('#err_payable_amount_msg').html("<div class='text-red'> Payable Amount must not be Empty!</div>");
         
         return false;
       } else{

            var form_data = new FormData();

            form_data.append('event_name', event_name);
            form_data.append('event_moto', event_moto);
            form_data.append('event_date', event_date);
            form_data.append('reg_start_date', reg_start_date);
            form_data.append('reg_end_date', reg_end_date);
            form_data.append('payable_amount', payable_amount);
            form_data.append('event_logo', event_logo);

            e.preventDefault();
            $.ajax({
               type: "post",
               url: "ajax/event_add_ajax.php",
               data: form_data,
               processData: false,
               cache: false,
               contentType: false,
               success: function(event_data){
                 $('#msg_message').html(event_data);
               }
            });
            return false;
       }

    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $('#token_form').on('submit', function(tok) {

      var token_label     = $('#token_label').val();
      var token_number     = $('#token_number').val();
      var token_color     = $('#token_color').val();
      
      
      if (token_label == "" && token_number == "" && token_color == ""){

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

