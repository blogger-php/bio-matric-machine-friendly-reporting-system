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

  <form id="target" method="POST" id="myform"><!-- change_password_hdl.php -->
    <div class="row">
      <div class="col-md-12">
        <div class="grid simple">
          <div class="grid-title" >
            <h3>Change - <span class="semi-bold">Password</span></h3>
          </div>
          <div class="grid-body">
              <div class="form-group">     
                <div class="controls">
                  <div class="col-md-3">
                  </div>
                  <div class="input-group col-md-6">
                  
                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Type your current password" required="required" />

                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Type your new password" style="margin-top: 10px;" required="required" />

                    <input type="password" class="form-control" id="new_password_confirm" name="new_password_confirm" placeholder="Retype your new password" style="margin-top: 10px;" />

                    <input name="submit" id="submit" value="Change" style="margin-top: 10px;float:left;" class="btn btn-info" />

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

<script type="text/javascript">
  $( "#submit" ).click(function() {

    var current_password = $("#current_password").val();
    var new_password = $("#new_password").val();
    var confirm = $("#new_password_confirm").val();
    
      if (new_password != confirm) 
      {
        $("#new_password").notify(
          "Password is not matching. Try again!", 
          { position:"right" }
        );
      }
      else 
      {

        $.ajax({
          type: "POST",
          url: "change_password_hdl.php",
          data: {new_password:new_password,current_password:current_password},
          success: function(msg)
          {
            if(msg == "success")
            {
              // $.notify("Password changed successfully :)", {
              //   className: "#3A87AD",
              //   position:"right"
              // });
              $.notify("Password changed successfully :)","success");
              $(":password").val("");
            }
            else
            {
              $("#current_password").notify(
                "Incorrect password :(", 
                { position:"right" }
              );
            }
          }

        });

      }
    
  });
  
</script>
</body>
</html>