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
      <?php 
        if(isset($_REQUEST['status_add']))
        {
        ?>
        <div class="alert alert-success" role="alert" style="text-align: center;">
          <h5><strong>User </strong> added successfully!</h5>
        </div>
        <?php  
        } 
      ?>
    </div>
    <div class="col-md-3">
    </div>
    
  </div>
  <!-- BEGIN TIMEPICKER/COLORPICKER CONTROLS-->

  <form method="POST" action="add_user_hdl.php">
    <div class="row">
      <div class="col-md-12">
        <div class="grid simple">
          <div class="grid-title" >
            <h3>Add - <span class="semi-bold">User</span></h3>
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

                    <input type="text" class="form-control" id="txt_user_job_title" name="txt_user_job_title" placeholder="Job Title" style="margin-top: 10px;" required="required" />

                    <input type="text" class="form-control" id="txt_user_badge" name="txt_user_badge" placeholder="Badge Name" style="margin-top: 10px;" required="required" />

                    <select name="txt_user_roster" style="width:100%;margin-top: 10px;" required>
                      <optgroup label="Roster List">
                        <option value="">None</option>
                      <!-- <option selected="selected">Select Roster</option> -->
                      <?php   
                        
                        $query_roster = "SELECT * FROM roster";
                        $result_roster = mysql_query($query_roster);

                        while($row_roster = mysql_fetch_array($result_roster)) 
                        {
                        ?>    
                          <option value="<?php echo $row_roster['id']; ?>"><?php echo $row_roster['name']; ?></option>
                          <?php
                        }
                      ?>
                      </optgroup>
                    </select>
                    
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
                    
                  <div class="col-md-3"> 
                    <input type="submit" name="submit" style="margin-top: 10px;" class="btn btn-success btn-cons" />
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