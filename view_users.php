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

    <?php require 'db/conn_mysql.php'; ?> 
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
    <div class="page-title">
      <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <?php 
            if(isset($_REQUEST['edit_user']))
            {
            ?>
              <div style="text-align: center;" class="alert alert-success" role="alert">
                <strong>User </strong> update successfully!
              </div>
            <?php 
            }
            if(isset($_REQUEST['delete_user']))
            {
            ?>
              <div style="text-align: center;" class="alert alert-danger" role="alert">
                <h5><strong>User </strong> is deleted!</h5>
              </div>
            <?php 
            } 
          ?>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
          <div class="span12">
            <div class="grid simple ">
              <div class="grid-title">
                <h3>View - <span class="semi-bold">User</span></h3>
              </div>
              <div class="grid-body ">
                <table class="table-condensed">
                  <thead style="border: 1px solid #dddddd">
                    <tr>
                      <th style="border: 1px solid #dddddd">Id</th>
                      <th style="border: 1px solid #dddddd;">User Name</th>
                      <th style="width: 33%;border: 1px solid #dddddd">Action</th>
                      <th style="border: 1px solid #dddddd">Id</th>
                      <th style="border: 1px solid #dddddd">User Name</th>
                      <th style="width: 33%;border: 1px solid #dddddd">Action</th>
                      <th style="border: 1px solid #dddddd">Id</th>
                      <th style="border: 1px solid #dddddd">User Name</th>
                      <th style="width: 33%;border: 1px solid #dddddd">Action</th>
                    </tr>
                  </thead>
                  <?php
                  $i = 0;
                    $sql = "SELECT * FROM userinfo";
                    $result = mysql_query($sql);
                    while($row = mysql_fetch_array($result))
                    {
                      $id = $row["user_id"];
                      $user_name = $row["user_name"];
                      $roster_id = $row["roster"];
                      if($i%3 == 0)
                      {
                      ?>
                      <tr>
                        <input type="hidden" name="roster_id" value="<?php echo $roster_id; ?>" />
                        <td style="border: 1px solid #dddddd"><?php echo $id; ?></td>
                        <td style="border: 1px solid #dddddd"><?php echo $user_name; ?></td>
                        <td style="border: 1px solid #dddddd">
                          <a href="rotation.php?user_id=<?php echo $id; ?>" >
                            <i class="fa fa-list-alt" style="font-size:14px" aria-hidden="true"></i>
                          </a>
                          <a href="edit_user.php?user_id=<?php echo $id; ?>" >
                            <i class="fa fa-pencil-square-o" style="font-size:14px" aria-hidden="true"></i>
                          </a>
                          <a data-href="delete_user.php?user_id=<?php echo $id; ?>" href="#" style="cursor: pointer;" data-toggle="modal" data-target="#confirm-delete" >
                            <i class="fa fa-trash" style="font-size:14px" aria-hidden="true" ></i>
                          </a>
                        </td>
                      <?php
                        }
                        else
                        {
                        ?>  
                          <input type="hidden" name="roster_id" value="<?php echo $roster_id; ?>" />
                          <td style="border: 1px solid #dddddd"><?php echo $id; ?></td>
                          <td style="border: 1px solid #dddddd"><?php echo $user_name; ?></td>
                          <td style="border: 1px solid #dddddd">
                            <a href="view_attendance_log.php?user_id=<?php echo $id; ?>" >
                              <i class="fa fa-list-alt" style="font-size:14px" aria-hidden="true"></i>
                            </a>
                            <a href="edit_user.php?user_id=<?php echo $id; ?>" >
                              <i class="fa fa-pencil-square-o" style="font-size:14px" aria-hidden="true"></i>
                            </a>
                            <a data-href="delete_user.php?user_id=<?php echo $id; ?>" href="#" style="cursor: pointer;" data-toggle="modal" data-target="#confirm-delete" >
                              <i class="fa fa-trash" style="font-size:14px" aria-hidden="true"></i>
                            </a>
                          </td>
                        <?php
                        }
                      $i++; 
                    }
                  ?>
                  </table>
                <div class="modal fade" id="confirm-delete" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel"><strong>Confirm Delete</strong></h4>
                      </div>
                  
                      <div class="modal-body">
                          <p>You are about to delete one record.</p>
                          <p>Do you want to proceed?</p>
                      </div>
                      
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <a class="btn btn-danger btn-ok">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>  
            </div>
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
