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

  <form method="POST" action="add_roster_hdl.php">
    <div class="row">
      <div class="col-md-12">
        <div class="grid simple">
          <div class="grid-title" >
            <h3>Add <span class="semi-bold">Roster</span></h3>
          </div>
          <div class="grid-body">
              <div class="form-group">     
                <div class="controls">

                  <div class="input-group col-md-4">
                    <input type="text" style="margin-bottom:15px;" class="form-control" name=txt_group_name placeholder="Group Name" required="required" />

                    <div class="input-group bootstrap-timepicker timepicker">
                      <input type="text" id="timepicker1" class="form-control input-small" 
                           name="txt_time_in" placeholder="Pick In-time" required="required" /><span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>
                    <br>
                    <div class="input-group bootstrap-timepicker timepicker">
                      <input type="text" id="timepicker2" class="form-control input-small" 
                        name="txt_time_out" placeholder="Pick Out-time" required="required" />
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>
                  </div>  

                  <div class="checkbox check-success">
                    <h4>Select Days</h4>
                    <input id="check1" type="checkbox" name="checkbox[]" value="monday" />
                    <label for="check1">Monday</label>

                    <input id="check2" type="checkbox" name="checkbox[]" value="tuesday">
                    <label for="check2">Tuesday</label>

                    <input id="check3" type="checkbox" name="checkbox[]" value="wednesday">
                    <label for="check3">Wednesday</label>

                    <input id="check4" type="checkbox" name="checkbox[]" value="thursday">
                    <label for="check4">Thurday</label>

                    <input id="check5" type="checkbox" name="checkbox[]" value="friday">
                    <label for="check5">Friday</label>

                    <input id="check6" type="checkbox" name="checkbox[]" value="saturday">
                    <label for="check6">Saturday</label>

                    <input id="check7" type="checkbox" name="checkbox[]" value="sunday">
                    <label for="check7">Sunday</label>
                  </div>
                  <br>
                  <input type="submit" name="submit" class="btn btn-success btn-cons" style="margin-top: 20px;" />
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