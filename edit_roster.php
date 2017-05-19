<?php

require 'db/conn_mysql.php';
require 'function.php';
check_session();  
  
  $id = $_GET['roster_id'];
  $query = "SELECT *FROM roster WHERE id=".$id;

  $result = mysql_query($query,$conn);
  $row = mysql_fetch_array($result);
  $group_name = $row['name'];
  $time_in = $row['time_in'];
  $time_out = $row['time_out'];
  $days = explode(',', $row['days']);
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
    <h3>Edit - <span class="semi-bold">Roster</span></h3>
  </div>
  <!-- BEGIN TIMEPICKER/COLORPICKER CONTROLS-->
  <?php

    $roster_id = $_REQUEST['roster_id'];
    
    $sql = "SELECT * FROM roster WHERE id=".$roster_id;
    $result = mysql_query($sql,$conn);
    //print_r($sql);exit();
    if(!$result ) 
    {
      die('Could not get data: ' . mysql_error());
    }
    else
    {
      $row = mysql_fetch_array($result,MYSQL_ASSOC);
    ?>
  <form method="POST" action="edit_roster_hdl.php">
    <div class="row">
      <div class="col-md-12">
        <div class="grid simple">
          
          <div class="grid-body no-border">
              <div class="form-group">     
                <div class="controls">

                  <input type="hidden" name="roster_id" value="<?php echo $id; ?>" />
                
                  <div class="input-group col-md-4">

                    <input type="text" value="<?php echo $row['name']; ?>" style="margin-bottom: 10px;" class="form-control" name=txt_group_name placeholder="Group Name">

                    <div class="input-group bootstrap-timepicker timepicker">
                      <input type="text" id="timepicker1" class="form-control input-small" 
                          value="<?php echo $row['time_in']; ?>" name="txt_time_in" placeholder="Pick In-time" required="required" /><span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>
                    <br>
                    <div class="input-group bootstrap-timepicker timepicker">
                      <input type="text" id="timepicker2" class="form-control input-small" 
                        value="<?php echo $row['time_out']; ?>" name="txt_time_out" placeholder="Pick Out-time" required="required" />
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    </div>
                    
                </div>

                  <div class="checkbox check-success">
                    <h4>Select Days</h4>
                    <input id="check1" type="checkbox" name="checkbox[]" value="monday" <?php foreach($days as $day){if($day=='monday') echo 'checked';} ?> />
                    <label for="check1">Monday</label>

                    <input id="check2" type="checkbox" name="checkbox[]" value="tuesday" <?php foreach($days as $day){if($day=='tuesday') echo 'checked';} ?> />
                    <label for="check2">Tuesday</label>

                    <input id="check3" type="checkbox" name="checkbox[]" value="wednesday" <?php foreach($days as $day){if($day=='wednesday') echo 'checked';} ?> />
                    <label for="check3">Wednesday</label>

                    <input id="check4" type="checkbox" name="checkbox[]" value="thursday" <?php foreach($days as $day){if($day=='thursday') echo 'checked';} ?> />
                    <label for="check4">Thurday</label>

                    <input id="check5" type="checkbox" name="checkbox[]" value="friday" <?php foreach($days as $day){if($day=='friday') echo 'checked';} ?> />
                    <label for="check5">Friday</label>

                    <input id="check6" type="checkbox" name="checkbox[]" value="saturday" <?php foreach($days as $day){if($day=='saturday') echo 'checked';} ?> />
                    <label for="check6">Saturday</label>

                    <input id="check7" type="checkbox" name="checkbox[]" value="sunday" <?php foreach($days as $day){if($day=='sunday') echo 'checked';} ?> />
                    <label for="check7">Sunday</label>
                  </div>

                  <input type="submit" name="submit" class="btn btn-success btn-cons" style="display: block;margin-top: 10px;" />
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

<script type="text/javascript">
  $('#timepicker1').timepicker();
  $('#timepicker2').timepicker();
</script>

</body>
</html>