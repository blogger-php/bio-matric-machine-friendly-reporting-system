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
    <h3>Edit - <span class="semi-bold">User</span></h3>
  </div>
  <!-- BEGIN TIMEPICKER/COLORPICKER CONTROLS-->

  <?php

    $user_id = $_REQUEST['user_id'];
    
    $sql = "SELECT * FROM userinfo WHERE user_id=".$user_id;
    $result = mysql_query($sql,$conn);
    //print_r($sql);exit();
    if(!$result ) 
    {
      die('Could not get data: ' . mysql_error());
    }
    else
    {
      $row_user = mysql_fetch_array($result);
    ?>
  <form method="POST" action="edit_user_hdl.php">
    <div class="row">
      <div class="col-md-12">
        <div class="grid simple">
          
          <div class="grid-body no-border">
              <div class="form-group">     
                <div class="controls">

                <input type="hidden" value="<?php echo $row_user['user_id']; ?>" name="user_id">

                  <div class="col-md-3">
                  </div>

                  <div class="input-group col-md-6">

                    <input type="text" value="<?php echo $row_user['first_name']; ?>" class="form-control" id="txt_first_name" name="txt_first_name" placeholder="First Name" style="margin-top: 20px;" />

                    <input type="text" value="<?php echo $row_user['last_name']; ?>" class="form-control" id="txt_last_name" name="txt_last_name" placeholder="Last Name" style="margin-top: 10px;" />

                    <input type="text" value="<?php echo $row_user['user_name']; ?>" class="form-control" id="txt_user_name" name="txt_user_name" placeholder="User Name" style="margin-top: 10px;" />

                    <input type="text" value="<?php echo $row_user['job_title']; ?>" class="form-control" id="txt_user_job_title" name="txt_user_job_title" placeholder="Job Title" style="margin-top: 10px;" />

                    <input type="text" value="<?php echo $row_user['badge_number']; ?>" class="form-control" id="txt_user_badge" name="txt_user_badge"  style="margin-top: 10px;" />


                    <select name="txt_user_roster" style="width:100%;margin-top: 10px;">
                      <optgroup label="Roster List">
                        <option value="">None</option>
                        <?php 
                          $query = "SELECT * FROM roster";
                          $result = mysql_query($query);

                          while($row = mysql_fetch_array($result)) 
                          {
                          ?>
                            <option value="<?php echo $row['id']; ?>" 
                              <?php if( $row['id'] == $row_user['roster'] ) 
                                {
                                  echo 'selected="selected"';
                                } 
                              ?>
                            >
                              <?php echo $row['name']; ?>    
                            </option>
                          <?php
                          }
                        ?>
                      </optgroup>
                    </select>

                    <select name="txt_user_department" style="width:100%;margin-top: 10px;">
                      <optgroup label="Departments List">
                        <option value="">None</option>
                        <?php 
                          $query = "SELECT * FROM departments";
                          $result = mysql_query($query);

                          while($row = mysql_fetch_array($result)) 
                          {
                          ?>
                            <option value="<?php echo $row['id']; ?>" 
                              <?php if( $row['id'] == $row_user['department'] ) 
                                {
                                  echo 'selected="selected"';
                                } 
                              ?>
                            >
                              <?php echo $row['name']; ?>    
                            </option>
                          <?php
                          }
                        ?>
                      </optgroup>
                    </select>  

                    <input type="submit" name="submit" class="btn btn-success btn-cons" style="margin-top:23px;display: inline-block;" />

                  </div>

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