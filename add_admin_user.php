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

  <form method="POST" action="add_admin_user_hdl.php" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-12">
        <div class="grid simple">
          <div class="grid-title" >
          <a href="view_admin_user.php" class="btn btn-danger" style="float: right;margin-top: 10px" >View Users</a>
            <h3>Add - <span class="semi-bold">Admin | User</span></h3>
          </div>
          <div class="grid-body">
              <div class="form-group">     
                <div class="controls">
                  <div class="col-md-3">
                  </div>
                  <div class="input-group col-md-6">

                    <input type="text" class="form-control" id="txt_first_name" name="txt_first_name" placeholder="First Name" required="required" />

                    <input type="text" class="form-control" id="txt_last_name" name="txt_last_name" placeholder="Last Name" style="margin-top: 10px;" required="required" />

                    <input type="text" class="form-control" id="txt_user_name" name="txt_user_name" placeholder="User Name" style="margin-top: 10px;" required="required" />

                    <input type="text" class="form-control" id="txt_user_designation" name="txt_user_designation" placeholder="Designation" style="margin-top: 10px;" required="required" />

                    <input type="text" class="form-control" id="txt_user_password" name="txt_user_password" placeholder="Password" style="margin-top: 10px;" required="required" />
                    
                    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" style="margin-top: 10px;padding: 5px;" required="required" />

                    <select name="txt_user_department" style="width:100%;margin-top: 10px;" required>
                      <optgroup label="Departments List">
                        <option value="">None</option>
                      <!-- <option selected="selected">Select Department</option> -->
                      <?php   
                        $query = "SELECT * FROM departments";
                        $result = mysql_query($query);

                        while($row = mysql_fetch_array($result)) 
                        {
                        ?>    
                          <option value="<?php echo $row['id']; ?>">
                            <?php echo $row['name']; ?>    
                          </option>
                          <?php
                        }
                      ?>
                      </optgroup>
                    </select>

                    <select name="txt_user_type" style="width:100%;margin-top: 10px;" required>
                      <optgroup label="Account Type">
                        <option value="">None</option>
                        <option value="1">
                            Super Admin</option>
                        <option value="2">
                            Admin</option>
                        <option value="3">
                            User</option>
                      </optgroup>  
                    </select>

                    <input type="submit" name="submit" style="margin-top: 10px;float: left;width: 100px" class="btn btn-primary" value="Add" />

                    <div class="col-md-3"> 
                    </div>
                </div>
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