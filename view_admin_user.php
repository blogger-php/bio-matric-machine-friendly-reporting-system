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
                <a href="add_admin_user.php" class="btn btn-danger" style="float: right;margin-top: 14px" >Add User</a>
                <h3>View - <span class="semi-bold">Admin | User</span></h3>
              </div>
              <div class="grid-body ">
                <table class="table table-striped table-flip-scroll cf">
                  <thead class="cf">
                    <tr>
                      <th>
                      <div class="checkbox check-default ">
                        <input id="checkbox1" type="checkbox" value="1" class="checkall">
                        <label for="checkbox1"></label>
                      </div>
                      </th>
                      <th>Id</th>
                      <th>username</th>
                      <th>designation</th>
                      <th>type</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                      $sql = "SELECT * FROM users";
                      $result = mysql_query($sql);
                      while($row = mysql_fetch_array($result))
                      {
                    ?>
                    <tr>
                      <td>
                        <div class="checkbox check-default">
                          <input id="checkbox2" type="checkbox" value="1">
                          <label for="checkbox2"></label>
                        </div>
                      </td>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['designation']; ?></td>
                      <td>
                      <?php if($row['account_type'] == 1){echo "Super Admin";}
                            if($row['account_type'] == 2){echo "Admin";}
                            if($row['account_type'] == 3){echo "User";} ?>
                      </td>
                      <td>
                        <!-- <a href="view_attendance_log.php?user_id=<?php //echo $id; ?>" >
                          <i class="fa fa-eye" style="font-size:12px" aria-hidden="true"></i>
                        </a> -->
                        <a href="edit_admin_user.php?user_id=<?php echo $row['id']; ?>" >
                          <i style="font-size: 22px;" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <a data-href="delete_admin_user.php?user_id=<?php echo $row['id']; ?>" href="#" style="cursor: pointer;" data-toggle="modal" data-target="#confirm-delete" >
                          <i style="margin-left: 5px;font-size: 22px;" class="fa fa-trash" aria-hidden="true"></i>
                        </a>

                        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel"><strong>Confirm Delete</strong></h4>
                                </div>
                            
                                <div class="modal-body">
                                    <p>You are about to delete this record.</p>
                                    <p>Do you want to proceed?</p>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-danger btn-ok">Delete</a>
                                </div>
                              </div>
                          </div>
                        </div>


                      </td>
                    </tr>

                    <?php
                      }
                    ?>  

                  </tbody>
              </table>
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
