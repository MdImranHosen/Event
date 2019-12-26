<?php include "inc/header.php"; ?>
<?php 
/* if ((Session::get('admin_type') != 2) || (Session::get('admin_ck') != 'emain_admin')) {
    Session::destroy();
    header("Location:login.php");
  }*/
  
  if(isset($_GET["perticpentId"])) {

    $perticpentId = $_GET["perticpentId"];
    
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
        <section class="col-lg-6 col-lg-offset-3 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header" style="margin-bottom: 20px;">
              <i class="fa fa-list"></i>

              <h3 class="box-title"> Perticpent Info </h3>
              <!-- tools box -->
             <div class="pull-right box-tools">
                 <button type="button" class="btn btn-danger" onclick="goBack()"> Go Back </button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <div id="message_data"></div>
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                </thead>
                <tbody>
                 <?php 

                  if (class_exists('EventClass')) {
                    $event = new EventClass();
                    if (method_exists($event, 'getPerticpentById')) {
                      $result = $event->getPerticpentById($perticpentId);
                      if ($result) {
                        $i = 0;
                        while ($rows = $result->fetch_assoc()) {
                          $i++;
                 ?>
                 
                 <tr>
                   <th>Photo</th>
                   <td><img src="../event_student/images/<?php echo $rows['id']; ?>/<?php echo $rows['photo']; ?>" width="150" height="auto"></td>
                 </tr>
                 <tr>
                     <th> Name English </th>
                     <td><?php echo $rows['name_eng']; ?></td>
                 </tr>
                 <tr>
                     <th>Name Bangla</th>
                     <td><?php echo $rows['name_ban']; ?></td>
                 </tr>
                 <tr>
                     <th>Fathers Name</th>
                     <td><?php echo $rows['fathers_name']; ?></td>
                 </tr>
                 <tr>
                     <th>Mothers Name</th>
                     <td><?php echo $rows['mothers_name']; ?></td>
                 </tr>
                 <tr>
                     <th>Session</th>
                     <td><?php echo $rows['session']; ?></td>
                 </tr>
                 <tr>
                     <th>Registration Number</th>
                     <td><?php echo $rows['reg_number']; ?></td>
                 </tr>
                 <tr>
                     <th>Halls</th>
                     <td><?php echo $rows['halls']; ?></td>
                 </tr>
                 <tr>
                     <th>Department</th>
                     <td><?php echo $rows['department']; ?></td>
                 </tr>
                 <tr>
                     <th>Mobile Number</th>
                     <td><?php echo $rows['mobile_number']; ?></td>
                 </tr>
                 <tr>
                     <th>Parment Address </th>
                     <td><?php echo $rows['parmenant_address']; ?></td>
                 </tr>
                 <tr>
                     <th>Permanent District </th>
                     <td><?php echo $rows['permanent_district']; ?></td>
                 </tr>
                 <tr>
                     <th>Trx ID Number </th>
                     <td><?php echo $rows['trx_id_number']; ?></td>
                 </tr>
                 <tr>
                     <th>T-shirt Size </th>
                     <td><?php echo $rows['t_shirt_size']; ?></td>
                 </tr>
                 <tr>
                     <th>NID</th>
                     <td><?php echo $rows['NID']; ?></td>
                 </tr>
                 <tr>
                     <th>Email Address</th>
                     <td><?php echo $rows['email_address']; ?></td>
                 </tr>
                 <tr>
                     <th>Gender</th>
                     <td><?php echo $rows['gender']; ?></td>
                 </tr>
                 <tr>
                     <th>Blood Group </th>
                     <td><?php echo $rows['blood_group']; ?></td>
                 </tr>
                 <tr>
                     <th>Create Date</th>
                     <td><?php echo $rows['create_date']; ?></td>
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
function goBack() {
  window.history.back();
}
</script>


