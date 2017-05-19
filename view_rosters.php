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
    <div class="content">
      <ul class="breadcrumb"></ul>
      <div class="page-title">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <?php 
            if(isset($_REQUEST['roster_cannot']))
            {
            ?>
            <div class="alert alert-danger" role="alert">
              <h5><strong>Oh snap!</strong> Cannot delete roster when it has users,please first delete the user in this roster.</h5>
            </div>
            <?php  
            }
            if(isset($_REQUEST['id']))
            {
            ?>
              <div class="alert alert-info" role="alert">
                <h5><strong>Roster</strong> assign successfully!</h5>
              </div>
            <?php
            }
            if(isset($_REQUEST['update_id']))
            {
            ?>
              <div class="alert alert-success" role="alert">
                <strong>Record</strong> update successfully!
              </div>
            <?php 
            }
            if(isset($_REQUEST['delete_id']))
            {
            ?>
              <div class="alert alert-danger" role="alert">
                <h5><strong>Record</strong> is deleted!</h5>
              </div>
            <?php 
            } 
          ?>
        </div>
        <div class="col-md-3">
        </div>
      </div>
      <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h3>View - <span class="semi-bold">Roster Table</span></h3>
            </div>
            <div class="grid-body "> 
              <table class="table table-hover table-condensed" id="example">
                <thead>
                  <tr>
                    <th style="width:1%">Id</th>
                    <th style="width:18%">Group Name</th>
                    <th style="width:10%" data-hide="phone,tablet">Time In</th>
                    <th style="width:10%">Time out</th>
                    <th style="width:10%" data-hide="phone,tablet">Days</th>
                    <th style="width:22%" data-hide="phone,tablet">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                          
                  $query = "SELECT *FROM Roster";
                  $rs = mysql_query($query,$conn);

                  while( $row = mysql_fetch_array($rs))
                  {
                  ?>
                  <tr >
                    <td class="v-align-middle"><div class="checkbox check-default"><?php $roster_id = $row['id']; echo $roster_id; ?></div></td>
                    <td class="v-align-middle"><div class="checkbox check-default"><?php echo $row['name']; ?></div></td>
                    <td class="v-align-middle"><div class="checkbox check-default"><?php echo $row['time_in']; ?></div></td>
                    <td class="v-align-middle"><div class="checkbox check-default"><?php echo $row['time_out']; ?></div></td>
                    <td class="v-align-middle"><div class="checkbox check-default"><?php echo $row['days']; ?></div></td>
                    <td>
                      <a class="btn-cta-freequote" href="assign_roster.php?roster_id=<?php echo $roster_id; ?>" >
                      <i class="fa fa-plus" aria-hidden="true" style="padding: 0px 5px;font-size:17px;"></i>
                    </a>
                    <a name="delete_roster" id="delete_roster" href="edit_roster.php?roster_id=<?php echo $roster_id; ?>">
                      <i class="fa fa-pencil-square-o" style="padding: 0px 5px;font-size:17px;" aria-hidden="true"></i>
                    </a>

                    <a data-href="delete_roster.php?roster_id=<?php echo $roster_id; ?>" class="" href="#" style="cursor: pointer;" data-toggle="modal" data-target="#confirm-delete"  data-original-title="Delete" data-rel="tooltip"><i class="fa fa-times" style="padding: 0px 5px;font-size:17px; " aria-hidden="true"></i></a>

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

    <?php if (isset($_POSTdelete_roster)) {
      # code...
    } ?>

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

<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
    
<?php require 'includes/js.php'; ?>

</body>
<!-- <script type="text/javascript">
  $('#confirm-delete').click(function() {
    alert('asdasdsad');
  });
</script> -->
<script type="text/javascript">
  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
  });
</script>
</html>