<?php
session_start();

if(isset($_SESSION["user_id"])) 
{
  header("Location: dashboard.php"); 
  exit;
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Webarch - Responsive Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top">
<div class="container">
  <div class="col-md-12">
    <div class="col-md-3">
    </div>
    <div class="col-md-6" style="margin-top: 60px;">
    <?php 
        if(isset($_REQUEST['wrong_credentials']))
        {
        ?>
        <div class="alert alert-danger" role="alert" style="text-align: center;" id="retry">
          <h5><strong>Bad </strong> Credantials</h5>
        </div>
        <?php  
        } 
        if(isset($_REQUEST['password_send']))
        {
        ?>
        <div class="alert alert-success" role="alert" style="text-align: center;" id="retry">
          <h5><strong>Password</strong> has been sent.</h5>
        </div>
        <?php  
        }
      ?>
    </div>
    <div class="col-md-53">
    </div>
  </div>
  <div class="row login-container column-seperation">  
        <div class="col-md-5 col-md-offset-1">
          <h2>Sign in to webarch</h2>
          <p>Use Facebook, Twitter or your email to sign in.<br>
            <a href="#">Sign up Now!</a> for a webarch account,It's free and always will be..</p>
          <br>

       <button class="btn btn-block btn-info col-md-8" type="button">
            <span class="pull-left"><i class="icon-facebook"></i></span>
            <span class="bold">Login with Facebook</span> </button>
       <button class="btn btn-block btn-success col-md-8" type="button">
            <span class="pull-left"><i class="icon-twitter"></i></span>
            <span class="bold">Login with Twitter</span>
        </button>
        </div>
        <div class="col-md-5 "> <br>
     <form id="login-form" class="login-form" action="index_hdl.php" method="post">
       <div class="row">
       <div class="form-group col-md-10">
              <label class="form-label">Username</label>
              <div class="controls">
          <div class="input-with-icon  right">                                       
            <i class=""></i>
            <input type="text" name="txt_username" id="txt_username"
              value="<?php if(isset($_COOKIE["user_name"])) {echo $_COOKIE["user_name"];} ?>" required 
              class="form-control">                                
          </div>
              </div>
            </div>
            </div>
        <div class="row">
            <div class="form-group col-md-10">
              <label class="form-label">Password</label>
              <span class="help"></span>
              <div class="controls">
          <div class="input-with-icon  right">                                       
            <i class=""></i>
            <input type="password" name="txt_password" id="txt_password" 
              value="<?php if(isset($_COOKIE["password"])) {echo $_COOKIE["password"];}?>" required 
              class="form-control" />                                 
          </div>
              </div>
            </div>
            </div>
          <div class="row">
            <div class="control-group  col-md-10">
              <div class="checkbox checkbox check-success"> 
                <a href="forget_password.php">Trouble login in?</a>&nbsp;&nbsp;
                <input type="checkbox" id="checkbox1" name="remember" value="1" 
                <?php if(isset($_COOKIE["user_name"])) { ?> checked <?php }?> />
                <label for="checkbox1">Keep me reminded </label>
              </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-10">
                <input type="submit" name="submit" class="btn btn-primary btn-cons pull-right" />
              </div>
            </div>
      </form>
    </div>
     
    
  </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/js/login.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<!-- END CORE TEMPLATE JS -->
<script type="text/javascript">

$(document).ready(function(){
    
    

    $("#retry").fadeOut(4000);

  });  

</script>
</body>
</html>