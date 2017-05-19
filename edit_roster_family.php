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

    $id = $_REQUEST['roster_family_id'];

    $sql = "SELECT * FROM roster_family WHERE id=".$id;
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
  <form method="POST" action="edit_roster_family_hdl.php">
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

                    <input type="text" class="form-control" id="roster_family_name" name="roster_family_name" placeholder="First Name" required="required" value="<?php echo $row['family_name']; ?>" />

                    <input type="text" class="form-control" id="days" name="days" placeholder="Last Name" style="margin-top: 10px;" value="<?php echo $row['days']; ?>" required="required" />

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