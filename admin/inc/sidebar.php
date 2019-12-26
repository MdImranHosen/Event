  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo Session::get('name'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php
         $path = $_SERVER['SCRIPT_FILENAME'];
         $currentpage = basename($path, '.php');
       ?>

      <ul class="sidebar-menu" data-widget="tree">
       <li class="header">MAIN NAVIGATION</li>

       <?php  if ((Session::get('admin_type') == 2) && (Session::get('admin_ck') == 'emain_admin')) { ?>

       <li <?php if ($currentpage == 'index') { echo 'class="active"'; } ?> >
          <a href="index.php"><i class="fa fa-dashboard"></i> <span> Dashboard</span></a>
        </li>
        
        <li <?php if ($currentpage == 'event_list') { echo 'class="active"';} ?> >
         <a href="event_list.php"><i class="fa fa-users"></i><span> Event List </span></a>
        </li>

        <li <?php if ($currentpage == 'admin') { echo 'class="active"';} ?>>
         <a href="admin.php"><i class="fa fa-user"></i><span> Admin Account </span></a>
        </li>
      <?php } else if ((Session::get('admin_type') == 1) && (Session::get('admin_ck') == 'event_admin')) { ?>

        <li <?php if ($currentpage == 'event') { echo 'class="active"'; } ?> >
         <a href="event.php"><i class="fa fa-list"></i><span> Event </span></a>
        </li>

      <?php } ?>
    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>