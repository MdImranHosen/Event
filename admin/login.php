<?php
  include "../classes/Mainclass.php";
  Session::checkLogin();
?>
<?php

try {

if (class_exists('Adminclass')) {
    
  $al = new Adminclass();

  if (is_object($al)) {

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_admin'])) {

      $admin_email  = $_POST['email'];
      $admin_pass   = $_POST['password'];
      $admin_type   = $_POST['admin_type'];
      $admin_event  = $_POST['admin_event'];

      if (empty($admin_email) || empty($admin_pass) || empty($admin_type)) {
          $login_mas = '<div class="alert alert-warning" role="alert">
                    Field Must not be Empty!
                   </div>';
      } else{

        if ($admin_type == 1) {

          if (empty($admin_event)) {
            $login_mas = '<div class="alert alert-warning" role="alert">
                    Event Field Must not be Empty!
                   </div>';
          } else {
            $login_mas = $al->admin_eventcheck($admin_email,$admin_pass,$admin_type,$admin_event);
          }
          
        } else if ($admin_type == 2) {
          $login_mas = $al->admin_loginchak($admin_email,$admin_pass,$admin_type);
        }
        
      }
   }

   }
  }
  
} catch (Exception $e) {
  $login_mas = "<div class='alert alert-warning'>Something went Wrong.</div>";
}



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="http://dua7c.com/du_result/images/dulogo.png">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">

    .ligin_bottom_bt{display: none;}
    .espacebottom{margin-bottom: 5px;}
    .signin_title{display: none;}
    .captcha_input_style{width: 150px;padding: 5px;border: 1px solid #ccc;margin-left: 5px;}
    @media(max-width:360px ){
      .ligin_bottom_bt{display: block;}
      .ligin_bottom_bta{display: none;}
      .signin_title_up{display: none;}
      .signin_title{display: block;}
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a target="_blank" href="#"><b>Admin</b>Panel</a>
  </div>
  <!-- /.login-logo -->
    <div class="login-box-body">
    <p class="login-box-msg">
     <?php  if (isset($login_mas)) { echo $login_mas; ?>
       <script type="text/javascript">
        setTimeout(function(){
          window.location.href='login.php';
        },2000)
       </script>
     <?php } else{ ?>
      <h4 align="center" class="btn btn-lg btn-success btn-block btn-flat signin_title_up">Sign in to start your session</h4>
      <h5 align="center" class="btn btn-md btn-success btn-block btn-flat signin_title">Sign in to start your session</h5>
      <?php } ?>
    </p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select class="form-control" name="admin_type" id="admin_type">
          <option value="" style="display: none;"> Select Admin Type </option>
          <option value="1" data-toggle="collapse" data-target=".eventAdmin:not(.in)"> Event Type </option>
          <option value="2" data-toggle="collapse" data-target=".eventAdmin.in"> Admin </option>
        </select>
      </div>
      <div class="form-group has-feedback eventAdmin collapse">
        <select class="form-control" name="admin_event" id="admin_event">
          <option value="" style="display: none;"> Select Event Type </option>
             <?php 
                  if (class_exists('EventClass')) {
                      $event = new EventClass();
                      if (method_exists($event, 'getEventAllData')) {
                         $result = $event->getEventAllData();
                      if ($result) {
                        while ($rows = $result->fetch_assoc()) {
                 ?>
            <option value="<?php echo $rows['id']; ?>"> <?php echo $rows['name']; ?> </option>
              <?php  } } } } ?>
        </select>
      </div>
      
      <div class="row ligin_bottom_bta">
        <!-- /.col -->
        <div class="col-xs-8 col-xs-offset-2">
          <button type="submit" name="login_admin" onclick="return validate();" class="btn btn-danger btn-block">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
      <div class="row ligin_bottom_bt">
        <div class="col-xs-12">
           <button type="submit" name="login_admin" onclick="return validate();" class="btn btn-danger btn-block espacebottom">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <hr>
    <p style="padding-top: 20px;padding-bottom: 0px;margin-bottom: 0px;" align="center"> Copyright &copy; <?php echo date("Y"); ?> <a target="_blank" href="http://github.com/MdImranHosen">  Md Imran Hosen </a></p>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- Md Imran Hosen www.github.com/MdImranHosen -->
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>