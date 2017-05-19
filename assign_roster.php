<?php 
  require 'db/conn_mysql.php';
  require 'function.php';
  check_session();
 
  $roster_id = $_REQUEST['roster_id'];
  $query = "SELECT *
            FROM assign_roster 
            WHERE roster_id=$roster_id";
 
  $result = mysql_query($query,$conn);
  $checked =array();
  while($row = mysql_fetch_array($result))
  {
    $checked[] = $row['user_id'];
    
  }
  //print_r(array_unique($checked));exit;
?>

<!DOCTYPE html>
<html>
<head>
<title>Attendace</title>
<?php require 'includes/meta.php'; ?>
    
<?php require 'includes/css.php'; ?>
<style type="text/css">
  table > thead >tr {

  }
</style>
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

    <div class="clearfix"></div>
    <div class="content">
      <form method="POST" action="assign_roster_hdl.php">
        <div class="col-md-12">
          <div class="row-fluid">
            <div class="grid simple ">
              <div class="grid-title">
                <h3>Select users to add them in - <span class="semi-bold">Roster</span></h3>
              </div>
              <div class="grid-body ">
                <input type="submit" name="submit" style="float:right;" class="btn btn-success btn-cons" />
                <table class="table" id="example">
                  <thead>
                    <tr>
                      <th style="border: 1px solid #dddddd">
                        <i class="fa fa-check-square" aria-hidden="true"></i>
                      </th>
                      <th style="border: 1px solid #dddddd">Id</th>
                      <th style="border: 1px solid #dddddd">User Name</th>
                      <th style="border: 1px solid #dddddd">
                        <i class="fa fa-check-square" aria-hidden="true"></i>
                      </th>
                      <th style="border: 1px solid #dddddd">Id</th>
                      <th style="border: 1px solid #dddddd">User Name</th>
                      <th style="border: 1px solid #dddddd">
                        <i class="fa fa-check-square" aria-hidden="true"></i>
                      </th>
                      <th style="border: 1px solid #dddddd">Id</th>
                      <th style="border: 1px solid #dddddd">User Name</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                    
                    $sql = "SELECT * FROM userinfo";
                    $result = mysql_query($sql);
                    //print_r($sql);exit();
                    $i = 0;
                    if(!$result ) 
                    {
                      die('Could not get data: ' . mysql_error());
                    }
                    while($row = mysql_fetch_array($result))
                    {
                      $user_id = $row['user_id'];
                      
                    
                      if($i%3 == 0)
                      {
                      ?>
                      <input type="hidden" name="roster_id" value="<?php echo $roster_id; ?>" />
                      <tr>
                        <td style="border: 1px solid #dddddd">
                          <input name="checkbox[]" type="checkbox" <?php if($checked){ foreach($checked as $val){ if($val == $user_id){echo "checked"; }}} ?>
                            value="<?php echo $user_id; ?>"
                          />
                        </td>
                        <td style="border: 1px solid #dddddd"><?php echo $user_id; ?></td>
                        <td style="border: 1px solid #dddddd"><?php echo $row['user_name']; ?></td>
                      <?php
                        }
                        else
                        {
                        ?> 
                          <td style="border: 1px solid #dddddd">
                          <input name="checkbox[]" type="checkbox" <?php if($checked){ foreach($checked as $val){ if($val == $user_id){echo "checked"; }}} ?>
                              value="<?php echo $user_id; ?>"
                          />
                          </td>
                          <td style="border: 1px solid #dddddd"><?php echo $user_id; ?></td>
                          <td style="border: 1px solid #dddddd"><?php echo $row['user_name']; ?></td>
                        <?php
                        }
                      $i++;
                    }
                  ?>
                  </tbody>
                </table>
                  <input type="submit" name="submit" style="margin-top: 10px;" class="btn btn-success btn-cons" />
              </div>
            </div>
          </div>
        </div>  
      </div>
    </form>  
      <!-- <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="#">1</a>
        <a class="active" href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">&raquo;</a>
      </div> -->

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
</html>
