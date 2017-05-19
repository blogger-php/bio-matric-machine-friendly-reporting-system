<?php 
require 'db/conn_mysql.php';
require 'function.php';
check_session();  
?>
<!DOCTYPE html>
<html>
<head>

<title>Attendace</title>
<?php require 'includes/meta.php'; ?>
    
<?php require 'includes/css.php'; ?>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="">

<?php require 'includes/header.php'; ?>

<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
  
  <?php require 'includes/left_nav.php'; ?>
    

  <?php require'includes/footer.php'; ?>

  <!-- END SIDEBAR -->
  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

    
<!-- ///////////////////////////////// -->
<div class="content">
  <ul class="breadcrumb"></ul>
  <div class="page-title">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        
    </div>
    <div class="col-md-3">
    </div>
  </div>
  <!-- BEGIN TIMEPICKER/COLORPICKER CONTROLS-->

  <form method="POST" action="profile_hdl.php" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-12">
        <div class="grid simple">
          <div class=" tiles white col-md-12 no-padding">
            <div class="tiles green cover-pic-wrapper">           
              <div class="overlayer bottom-right">
                <div class="overlayer-wrapper">
                    <div class="padding-10 hidden-xs">                  
                      
                    </div>
                  </div>
              </div>
            <img src="assets/img/cover_pic.png" alt="">
            </div>
            <div class="tiles white">
        
              <div class="row">
                <div class="col-md-2 col-sm-2" >
                  <div class="user-profile-pic">  
                    <img width="69" height="69" data-src-retina="images/<?php echo $_SESSION["user_image"]; ?>" data-src="images/<?php echo $_SESSION["user_image"]; ?>" src="images/<?php echo $_SESSION["user_image"]; ?>" alt="images/logo.png">
                  </div>
                </div>
                <div class="col-md-9 user-description-box  col-sm-9">
                  <h4 class="semi-bold no-margin"><?php  ?></h4>
                  <h6 class="no-margin"><?php ?></h6>

                    <div class="col-md-6">
                      <input class="form-control" type="text" id="txt_first_name" name="txt_first_name" placeholder="First Name" value="<?php echo ucwords($_SESSION["firstname"]); ?>" required="required" style="margin-top: 15px;width: 100%" />
                    </div>    
                    <div class="col-md-6">
                      <input class="form-control" type="text" id="txt_last_name" name="txt_last_name" placeholder="Last Name" style="margin-top: 15px;width: 100%" value="<?php echo ucwords($_SESSION["lastname"]); ?>" required="required" />
                    </div>

                    <div class="col-md-1">
                    </div>
                    <div class="col-md-8">
                        <input class="form-control" type="text" id="txt_user_designation" name="txt_user_designation" placeholder="Designation" value="<?php echo ucwords($_SESSION["designation"]); ?>" style="margin-top: 10px;width: 100%" required="required" />

                        <select name="txt_user_department" style="width:100%;margin-top: 10px;background: #ffffff" required>
                          <optgroup label="Departments List">
                            <option value="">None</option>
                          <!-- <option selected="selected">Select Department</option> -->
                          <?php   
                            $query = "SELECT * FROM departments";
                            $result = mysql_query($query);

                            while($row = mysql_fetch_array($result)) 
                            {
                            ?>    
                              <option value="<?php echo $row['id']; ?>"
                                <?php 
                                  if($_SESSION["department"]==$row['id'])
                                  { 
                                    echo 'selected="selected"';
                                  } ?> >
                                <?php
                                echo $row['name'];
                                ?>    
                              </option>
                              <?php
                            }
                          ?>
                          </optgroup>
                        </select>

                        <select <?php if($_SESSION['account_type']==2 || $_SESSION['account_type']==3){echo 'disabled="disabled"';} ?> name="txt_user_type" style="width:100%;margin-top: 10px;background: #ffffff" required>
                          <optgroup label="Account Type">
                            <option value="">None</option>
                            <option value="1"<?php if($_SESSION["account_type"]==1)
                                                    { echo 'selected="selected"'; } ?> >
                                Super Admin</option>
                            <option value="2"<?php if($_SESSION["account_type"]==2)
                                                    { echo 'selected="selected"'; } ?> >
                                Admin</option>
                            <option value="3" <?php if($_SESSION["account_type"]==3)
                                                    { echo 'selected="selected"'; } ?> >
                                User</option>
                          </optgroup>  
                        </select>

                        <input type="file" style="width:100%;margin-top: 10px;background: #ffffff" name="fileToUpload" id="fileToUpload" />
                        
                        <input type="submit" name="submit" style="margin-top: 10px" class="btn btn-success btn-cons" />

                    </div>
                    <div class="col-md-1">
                    </div>
                </div> 
                <div class="clearfix"></div>        
              </div>
          </div>
        </div>
      </div>
  </form>  
  <!-- END TIMEPICKER/COLORPICKER CONTROLS-->
</div> 



<!-- ///////////////////////////////// -->


<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
    
<?php require 'includes/js.php'; ?>

</body>
</html>