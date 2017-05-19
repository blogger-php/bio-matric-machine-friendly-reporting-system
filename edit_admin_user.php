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
    
  </div>
  <!-- BEGIN TIMEPICKER/COLORPICKER CONTROLS-->

  <?php

    $id = $_REQUEST['user_id'];

    $sql = "SELECT * FROM users WHERE id=".$id;
    $result = mysql_query($sql,$conn);
    //print_r($sql);exit();
    if(!$result ) 
    {
      die('Could not get data: ' . mysql_error());
    }
    else
    {
      $row = mysql_fetch_array($result);
    ?>
  <form method="POST" action="edit_admin_user_hdl.php" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-12">
        <div class="grid simple">
          <div class="grid-title" >
          <a href="view_admin_user.php" class="btn btn-danger" style="float: right;margin-top: 10px" >Back</a>
            <h3>Edit - <span class="semi-bold">Admin | User</span></h3>
          </div>
          <div class="grid-body">
              <div class="form-group">     
                <div class="controls">
                  <div class="col-md-3">
                  </div>
                  <div class="input-group col-md-6">

                  <input type="hidden" name="id"  id="id" value="<?php echo $id; ?>" >

                    <input type="text" class="form-control" id="txt_first_name" name="txt_first_name" placeholder="First Name" required="required" value="<?php echo $row['firstname']; ?>" />

                    <input type="text" class="form-control" id="txt_last_name" name="txt_last_name" placeholder="Last Name" style="margin-top: 10px;" value="<?php echo $row['lastname']; ?>" required="required" />

                    <input type="text" class="form-control" id="txt_user_name" name="txt_user_name" placeholder="User Name" value="<?php echo $row['username']; ?>" style="margin-top: 10px;" required="required" />

                    <input type="text" class="form-control" id="txt_user_designation" name="txt_user_designation" value="<?php echo $row['designation']; ?>" placeholder="Designation" style="margin-top: 10px;" required="required" />

                    <input type="password" class="form-control" id="txt_user_password" name="txt_user_password" placeholder="Password" value="<?php echo $row['password']; ?>" style="margin-top: 10px;" required="required" />
                    
                    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" style="margin-top: 10px;padding: 5px;" required="required" />

                    <select name="txt_user_department" style="width:100%;margin-top: 10px;" required>
                      <optgroup label="Departments List">
                        <option value="">None</option>
                      <!-- <option selected="selected">Select Department</option> -->
                      <?php   
                        $query = "SELECT * FROM departments";
                        $result = mysql_query($query);

                        while($row_deptartment = mysql_fetch_array($result)) 
                        {
                        ?>    
                          <option value="<?php echo $row_deptartment['id']; ?>" 
                                  <?php if($row['department'] == $row_deptartment['id'])
                                        {
                                          echo 'selected="selected"';
                                        } 
                                  ?> 
                          >
                            <?php echo $row_deptartment['name']; ?>    
                          </option>
                          <?php
                        }
                      ?>
                      </optgroup>
                    </select>

                    <select name="txt_user_type" style="width:100%;margin-top: 10px;" required>
                      <optgroup label="Account Type">
                        <option value="">None</option>
                        <option value="1" <?php if($row['account_type'] == 1){echo 'selected="selected"';} ?>>
                            Super Admin</option>
                        <option value="2" <?php if($row['account_type'] == 2){echo 'selected="selected"';} ?>>
                            Admin</option>
                        <option value="3" <?php if($row['account_type'] == 3){echo 'selected="selected"';} ?>>
                            User</option>
                      </optgroup>  
                    </select>

                    <input type="submit" name="submit" style="margin-top: 10px;float: left;width: 100px" class="btn btn-primary" value="Update" />

                    <div class="col-md-3"> 
                    </div>
                </div>
              </div>  
          </div>
        </div>
    </div>
  </form>    
    <?php
    }
  ?>
  <!-- END TIMEPICKER/COLORPICKER CONTROLS-->
</div> 



<!-- ///////////////////////////////// -->

<div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content sm-gutter">
      <div class="page-title">
      </div>
    </div>
  </div>
</div>  
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
    
<?php require 'includes/js.php'; ?>

</body>
</html>