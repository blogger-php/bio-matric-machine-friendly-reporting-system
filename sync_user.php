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
    
      <!-- <h3>Add <span class="semi-bold">Roster</span></h3> -->
    </div>


    <form method="POST" action="">
      <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            
            <div class="grid-body no-border">
                <div class="form-group">     
                   
                  <?php

                   
                    $query = "SELECT * FROM USERINFO ";
                    $result = odbc_exec($connection,$query);

                    while ($row = odbc_fetch_array($result)) 
                    {
                      $user_name = $row['Name'];
                      $badge_number = $row['Badgenumber'];

                      $query_insert = "INSERT INTO userinfo (user_name,badge_number) 
                                      VALUES ('".$user_name."','".$badge_number."')";
                      mysql_query($query_insert);
                    }
                    
                  ?>

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