<?php 
  require 'db/conn_mysql.php';
  require 'function.php';
  check_session();

  $family_id = $_REQUEST['roster_family_id'];
  $query = "SELECT *
            FROM assign_roster_family
            WHERE roster_family_id=".$family_id;
 
  $result = mysql_query($query);
  $checked =array();
  while($row = mysql_fetch_array($result))
  {
    $checked[] = $row['roster_id']; 
  }
//print_r($checked);exit;
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

    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
          <button data-dismiss="modal" class="close" type="button"></button>
           <h3>Widget Settings</h3>

      </div>
      <div class="modal-body">Widget settings form goes here</div>
    </div>
    <div class="clearfix"></div>

    <div class="content">
    <ul class="breadcrumb"></ul>
    <div class="row">
      <div class="col-md-12">
        <form action="assign_roster_family_hdl.php" method="POST">
          <div class="span12">
            <div class="grid simple ">
              <div class="grid-title">
                <h3>Assign - <span class="semi-bold">Rosters a Family</span></h3>
              </div>
              <div class="grid-body ">
                <input type="hidden" name="family_id" value="<?php echo $family_id; ?>" />
                <table class="table table-striped table-flip-scroll cf">
                  <thead class="cf">
                    <tr>
                      <th><i class="fa fa-check" style="font-size: 15px" aria-hidden="true"></i></th>
                      <th>Id</th>
                      <th>name</th>
                      <th>time In</th>                      
                      <th>time out</th>
                      <th>days</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                      $sql = "SELECT * FROM roster";
                      $result = mysql_query($sql);
                      while($row = mysql_fetch_array($result))
                      {
                        $roster_id = $row['id']; 
                    ?>
                    <tr>
                      <td>
                          
                          <input type="checkbox" name="checkbox[]" <?php if($checked){ foreach($checked as $val){ if($val == $roster_id){echo "checked"; }}} ?>
                            value="<?php echo $row['id']; ?>" />
                      </td>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['time_in']; ?></td>
                      <td><?php echo $row['time_out']; ?></td>
                      <td><?php echo count(explode(',',$row['days'])); ?></td>
                    </tr>

                    <?php
                      }
                    ?>  

                  </tbody>
              </table>
             <input type="submit" name="submit" style="margin-top: 10px;" class="btn btn-success btn-cons" />
            </form>
          </div>  
        </div>      
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
    <div class="content sm-gutter">
    <div class="page-title">
    </div>
  </div>
</div>

<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
    
<?php require 'includes/js.php'; ?>

<script type="text/javascript">
  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
  });
</script>
</body>
</html>
