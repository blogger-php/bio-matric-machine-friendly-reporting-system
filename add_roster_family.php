<?php 

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



  <div class="content">
  <ul class="breadcrumb"></ul>
  <div class="page-title">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
      <?php 
        if(isset($_REQUEST['status']))
        {
        ?>
        <div class="alert alert-success" role="alert" style="text-align: center;">
          <h5><strong>Record</strong> added successfully!</h5>
        </div>
        <?php  
        } 
      ?>
    </div>
    <div class="col-md-3">
    </div>
    
  </div>

  
    
    
  <!-- BEGIN TIMEPICKER/COLORPICKER CONTROLS-->

  <form method="POST" action="add_roster_family_hdl.php">
    <div class="row">
      <div class="col-md-12">
        <div class="grid simple">
          <div class="grid-title" >
            <h3>Add <span class="semi-bold">Roster Family</span></h3>
          </div>
          <div class="grid-body">
              <div class="form-group">     
                <div class="controls">

                  <div class="input-group col-md-4">

                    <input type="text" style="margin-bottom:15px;" class="form-control" name="txt_roster_family_name" placeholder="Roster Family Name" required="required" />

                    <!-- <div class="input-group bootstrap-timepicker timepicker">
                      <input type="text" id="timepicker1" class="form-control input-small" 
                           name="txt_time_in" placeholder="Pick In-time" required="required" /><span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div> -->  
                    <input type="text" style="margin-bottom:15px;" class="form-control" name="days" placeholder="Total days" required="required" />

                  </div> 
                  <input type="submit" name="submit" class="btn btn-success btn-cons" />
                </div>
              </div>
              <div class="clearfix"></div>
          </div>
        </div>
    </div>
  </form>  
  <!-- END TIMEPICKER/COLORPICKER CONTROLS-->
</div> 



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
  $('#timepicker1').timepicker();
  $('#timepicker2').timepicker();
</script>

</body>
</html>