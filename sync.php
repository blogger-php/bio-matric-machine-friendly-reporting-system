<?php 
require 'db/conn_mysql.php';
require 'db/conn.php';
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
<?php require 'includes/js.php'; ?>
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

         

  <div class="content">
    <ul class="breadcrumb"></ul>
    <div class="page-title">
    <?php

      if (isset($_POST['submit'])) 
      {
        $from_date = sanitized_data($_POST['from_date']);
        $to_date = sanitized_data($_POST['to_date']);

        $query_check = "SELECT * FROM checkinout WHERE checktime 
                        BETWEEN '".date('Y-m-d',strtotime($from_date))."' 
                        AND '".date('Y-d-m',strtotime($to_date))."' ";
          $result_check = mysql_query($query_check);

          if (mysql_num_rows($result_check) > 0 ) 
          {
        ?>
              <div style="text-align: center;" class="alert alert-danger" role="alert">
                <h5><strong>Record </strong> Already Exists.</h5>
              </div>
              <a href="sync.php">Go back</a>
        <?php
            exit;
          }

        $query = "SELECT USERID,CHECKTIME FROM CHECKINOUT WHERE CHECKTIME 
                  BETWEEN #".$from_date."# AND #".$to_date."# ";
        $result = odbc_exec($connection,$query);

        while ($row = odbc_fetch_array($result)) 
        {

          $user_id = $row['USERID'];
          $checktime = $row['CHECKTIME'];
  
          $query_insert = "INSERT INTO checkinout (user_id,checktime) 
                            VALUES ('".$user_id."','".$checktime."')";
          mysql_query($query_insert);
        }

      }
  
    ?>
    </div>


    <form method="POST" action="">
      <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title" >
              <h3>Sync <span class="semi-bold">Attendance</span></h3>
            </div>
            <div class="grid-body">
                <div class="form-group">     
                  <div class="controls">
                    <div class="input-group col-md-4">
                      <p><strong>Note Format: </strong> 01-Mar-2000 (example) </p>
                      <input type="date" style="margin: 20px 0px 10px 0px;" class="form-control" name="from_date" required="required" />

                      <input type="date" style="margin: 10px 0px 10px 0px;" class="form-control" name="to_date" required="required" />
                    </div>
                  </div>  

                  <input type="submit" name="submit" class="btn btn-success btn-cons" style="margin-top: 10px;" value="Sync" />
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
      </div>
    </form>

  </div> 
</div>

<div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div> 


</body>
</html>