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

              <h3 class="box-title"> Perticpents List </h3>
              <!-- tools box -->
             <!-- <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>-->
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th> NO </th>
                  <th>Event Name</th>
                  <th> Name </th>
                  <th> Mobile Number </th>
                  <th> T-shirt size </th>
                  <th> Gender </th>
                  <th> Department </th>
                  <th> Halls </th>
                  <th> Photo </th>
                  <th> Action </th>
                </tr>
                </thead>
                <tbody>
                 <?php 

                  if (class_exists('EventClass')) {
                    $event = new EventClass();
                    if (method_exists($event, 'getEventPerticcpentsAll')) {
                      $result = $event->getEventPerticcpentsAll();
                      if ($result) {
                        $i = 0;
                        while ($rows = $result->fetch_assoc()) {
                          $i++;
                 ?>
                 <tr>
                   <td><?php echo $i; ?></td>
                   <td><?php echo $rows['event_name']; ?></td>
                   <td><?php echo $rows['name_eng']; ?></td>
                   <td><?php echo $rows['mobile_number']; ?></td>
                   <td><?php echo $rows['t_shirt_size']; ?></td>
                   <td><?php echo $rows['gender']; ?></td>
                   <td><?php echo $rows['department']; ?></td>
                   <td><?php echo $rows['halls']; ?></td>
                   <td><img src="../event_student/images/<?php echo $rows['id']; ?>/<?php echo $rows['photo']; ?>" width="100" height="auto"></td>
                   <td><a class="btn btn-info" href="perticpent_details.php?perticpentId=<?php echo $rows['id']; ?>"> <i class="fa fa-eye"></i> View </a></td>
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
