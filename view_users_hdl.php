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
  <h3>View - <span class="semi-bold">User</span></h3>
</div>
<div class="row">
  <div class="col-md-12">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4>Table <span class="semi-bold">Styles</span></h4>
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
              <table class="table table-hover table-condensed">
                <thead style="border: 1px solid #e8edf1">
                  <tr>
                    <th style="border: 1px solid #e8edf1">Id</th>
                    <th style="border: 1px solid #e8edf1;">User Name</th>
                    <th style="width: 33%;border: 1px solid #e8edf1">Action</th>
                    <th style="border: 1px solid #e8edf1">Id</th>
                    <th style="border: 1px solid #e8edf1">User Name</th>
                    <th style="width: 33%;border: 1px solid #e8edf1">Action</th>
                    <th style="border: 1px solid #e8edf1">Id</th>
                    <th style="border: 1px solid #e8edf1">User Name</th>
                    <th style="width: 33%;border: 1px solid #e8edf1">Action</th>
                  </tr>
                </thead>
                <?php
                $i = 0;
                  $sql = "SELECT * FROM userinfo";
                  $result = mysql_query($sql,$conn);
                  while($row = mysql_fetch_array($result,MYSQL_ASSOC))
                  {
                    $id = $row["user_id"];
                    $user_name = $row["user_name"];

                    if($i%3 == 0)
                    {
                    ?>
                    <tr>
                      <input type="hidden" name="roster_id" value="<?php echo $roster_id; ?>" />
                      <td style="border: 1px solid #e8edf1"><?php echo $id; ?></td>
                      <td style="border: 1px solid #e8edf1"><?php echo $user_name; ?></td>
                      <td style="border: 1px solid #e8edf1">
                        <a href="view_attendance_log.php?user_id=<?php echo $id; ?>" >
                          <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <a href="edit_user.php?user_id=<?php echo $id; ?>" >
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <a data-href="delete_user.php?user_id=<?php echo $id; ?>" href="#" style="cursor: pointer;" data-toggle="modal" data-target="#confirm-delete" >
                          <i class="fa fa-trash" aria-hidden="true" ></i>
                        </a>
                      </td>
                    <?php
                      }
                      else
                      {
                      ?>  
                        <input type="hidden" name="roster_id" value="<?php echo $roster_id; ?>" />
                        <td style="border: 1px solid #e8edf1"><?php echo $id; ?></td>
                        <td style="border: 1px solid #e8edf1"><?php echo $user_name; ?></td>
                        <td style="border: 1px solid #e8edf1">
                          <a href="view_attendance_log.php?user_id=<?php echo $id; ?>" >
                            <i class="fa fa-eye" style="font-size:12px" aria-hidden="true"></i>
                          </a>
                          <a href="edit_user.php?user_id=<?php echo $id; ?>" >
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                          </a>
                          <a data-href="delete_user.php?user_id=<?php echo $id; ?>" href="#" style="cursor: pointer;" data-toggle="modal" data-target="#confirm-delete" >
                            <i class="fa fa-trash" aria-hidden="true"></i>
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
  </div>