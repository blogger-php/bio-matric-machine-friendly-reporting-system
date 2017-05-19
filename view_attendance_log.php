<?php 
  require 'db/conn_mysql.php';
  require 'function.php';
  check_session();
  ob_start();

  $user_id = $_GET['user_id'];

  if (isset($_POST["btn_submit"]))
  {
    $start_date = $_POST["txt_start_date"];
    $end_date = $_POST["txt_end_date"];
    
    $start = strtotime($start_date);
    $end = strtotime($end_date);
  }
  else
  {
    $start_date = date('Y-m-01');
    $end_date = date('Y-m-t');
    
    $start = strtotime($start_date);
    $end = strtotime($end_date);
  }
  
  // echo("<p>".$start."</p>");
  // echo("<p>".$end."</p>"); 
  //exit;

  //////////// Userinfo query
  $query_userinfo = "SELECT * FROM userinfo WHERE user_id =".$user_id;
  $result_userinfo = mysql_query($query_userinfo);
  if(!$result_userinfo) 
  {
    die('Could not get data: ' . mysql_error());
  }
  $userinfo_row = mysql_fetch_array($result_userinfo);

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
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">
      <div class="page-title">

          <?php
          //////////// Assign Roster query
          $query_assign_roster = "SELECT * FROM assign_roster WHERE user_id=".$user_id;
          $result_assign_roster = mysql_query($query_assign_roster);    
          $assign_roster_row = mysql_fetch_array($result_assign_roster);

          if($assign_roster_row > 0) 
          {
            $assign_roster_id = $assign_roster_row['roster_id'];
          }
          else
          {
            echo '<div class="alert alert-danger" role="alert">
                    <h4 style="text-align: center;"><strong>Please</strong>  Assign roster first.</h4>
                    <h5 style="text-align: center;"><strong>Redirecting</strong>  you there</h5>
                  </div>';
            //header("Location: view_rosters.php");
            header("refresh:2;url=view_rosters.php");
            exit;
          }
          ?>

        <h2>Attendance of - <span class="semi-bold"><?php echo ucwords($userinfo_row['user_name']); ?></span></h2>
        <div class="row">
          <div class="col-md-12">

            <div class="col-md-6">
              <h5><span class="semi-bold">User Information:  </span></h5> 
              <h5>User Id - <span class="semi-bold"><?php echo $userinfo_row['user_id']; ?></span></h5>  
              <h5>Badge Number - <span class="semi-bold"><?php echo $userinfo_row['badge_number']; ?></span>
              </h5>
              <h5>Department - <span class="semi-bold">
                <?php 
                  $department_query = "SELECT name FROM departments WHERE id=".$userinfo_row['department'];
                  $result = mysql_query($department_query);
                  
                  if($row = @mysql_fetch_array($result))
                  {
                    echo $row['name'];
                  }
                  else
                  {
                    echo "Department not assigned";
                  }
                ?></span>
              </h5>
              <h5>Job title - <span class="semi-bold">
              <?php 
                if(!empty($userinfo_row['job_title']))
                  {
                    echo $userinfo_row['job_title'];
                  }
                  else
                  {
                    echo "Job title not assigned";
                  } 
              ?></span>
              </h5> 
            </div>

            <div class="col-md-6">
              <h5><span class="semi-bold">Roster Information:  </span></h5>
              <h5>Roster Name - <span class="semi-bold">
                <?php 
                  $query_roster = "SELECT * FROM roster WHERE id=".$assign_roster_id;
                  $result_roster = mysql_query($query_roster);

                  if($roster_row = mysql_fetch_array($result_roster))
                  {
                    echo $roster_row['name'];
                  }
                  else
                  {
                    echo "This user had not assign any roster.";
                  } ?></span>
              </h5>
              <h5>Roster In Time - <span class="semi-bold"><?php echo $roster_row['time_in']; ?></span></h5>
              <h5>Roster Out Time - <span class="semi-bold"><?php echo $roster_row['time_out']; ?></span></h5>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="grid simple ">
              <div class="grid-title no-border">
                <div class="col-md-12">
                  <form method="POST" action="" >
                     <input type="date" name="txt_start_date" id="txt_start_date" class="form-control" 
                       style="margin: 10px 10px 20px 0px;" />
                      <input type="date" name="txt_end_date" id="txt_end_date" class="form-control" 
                       style="margin: 10px 10px 20px 0px;" />
                      <input type="submit" name="btn_submit" id="btn_submit" 
                        style="margin: 10px 10px 20px 0px;" class="btn btn-primary" />
                  </form>  
                </div>
              </div>
              <div class="grid-body no-border">
                <table class="table no-more-tables">
                  <thead>
                    <tr>
                      <!-- <th style="width:1%" >
                          <div class="checkbox check-default">
                            <input id="checkbox10" type="checkbox" value="1" class="checkall">
                            <label for="checkbox10"></label>
                          </div>
                      </th> -->
                      <th>Date</th>
                      <th>Time In</th>
                      <th>(Late In)</th>
                      <th>Time Out</th>
                      <th>(Late Out)</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $count = 0;
                      $first = 0;
                      $sencd = 0;
                      $third = 0;
                      $forth = 0;
                      while($start <= $end)
                      {
                        $count++;
                        $date_display = date('l, F d, Y', $start);
                        
                        $clause_day = date('d', $start);
                        $clause_month = date('m', $start);
                        $clause_year = date('Y', $start);
                        
                        $sql_min = "SELECT MIN(checktime) AS MINCHKTM FROM checkinout WHERE 
                                    user_id = ".$user_id."
                                    AND DAY(CHECKTIME) = ".$clause_day." 
                                    AND MONTH(CHECKTIME) = ".$clause_month." 
                                    AND YEAR(CHECKTIME) = ".$clause_year."
                                    ";
                        
                        $result = mysql_query($sql_min);

                          if (!$result)
                          {
                            ?>
                              <div style="text-align: center;" class="alert alert-danger" role="alert">
                                <h5><strong>Record </strong> Not Exists Between This.</h5>
                              </div>
                              <a href="sync.php">Go back</a>
                            <?php
                          }

                        $min_time = mysql_fetch_array($result);
                        

                        if(!empty($min_time[0]))
                        {
                          $time = new DateTime($min_time[0]);

                          $min_time = $time->format('H:i');
                        }

                        $sql_max = "SELECT MAX(checktime) AS MAXCHKTM FROM checkinout WHERE 
                                    user_id = ".$user_id."
                                    AND DAY(CHECKTIME) = ".$clause_day." 
                                    AND MONTH(CHECKTIME) = ".$clause_month." 
                                    AND YEAR(CHECKTIME) = ".$clause_year."
                                    ";
                        
                        $result = mysql_query($sql_max);
                        
                        $max_time = mysql_fetch_array($result);
                        
                        if(!empty($max_time[0]) == 'TRUE')
                        {
                          $time = new DateTime($max_time[0]);
                          $max_time = $time->format('H:i');
                        }
                        //echo date("H:i:s", strtotime($min_time+" + 3 hour"));
                        ?>
                        <tr>
                          <!-- ///////// Display Date ///////// -->
                          <td><?php echo $date_display ?></td>

                          <!-- ///////// Time In  /////////-->
                          <td>
                            <?php 
                              if(empty($min_time) || $min_time[0]==null)
                              {
                                echo "Absent";
                              }
                              else
                              {
                                echo $min_time;
                              } 
                            ?>
                          </td>
                          <!--  ///////////// Late In ////////////// -->
                          <td>
                            <?php 
                              if(empty($min_time) || $min_time[0]==null)
                              {
                                echo " ";
                              }
                              else
                              {
                                $late_in = (strtotime($min_time) - strtotime($roster_row['time_in']))/60;
                                if ($late_in > 0) 
                                {
                                  $late_in = abs($late_in)." minutes";
                                  echo $late_in;
                                }
                                else
                                {
                                  echo "On time";
                                  $late_in = 0;
                                }
                                
                              }
                            ?>
                          </td>
                          <!-- ////////// Time Out ////////////// -->
                          <td>
                            <?php 
                              if($max_time == $min_time)
                              { 
                                echo "NULL";
                              }
                              elseif (empty($max_time) || $max_time[0]==null) 
                              {
                                echo "Absent";
                              }
                              else
                              { 
                                echo $max_time;
                              }
                            ?>
                          </td>
                          <!-- ///////////// Late out ///////////////// -->
                          <td>
                            <?php 
                              if($max_time == $min_time)
                              { 
                                echo " ";
                              }
                              elseif (empty($max_time) || $max_time[0]==null) 
                              {
                                echo " ";
                              }
                              else
                              {
                                $late_out = (strtotime($max_time) - strtotime($roster_row['time_out']))/60;
                                if ($late_out > 0) 
                                {
                                  echo "On time";
                                  $late_out = 0;
                                }
                                else
                                {
                                  $late_out = abs($late_out)." minutes";
                                  echo $late_out;
                                }
                              }
                            ?>
                          </td>
                          <!-- ////////////  Total  ////////// -->
                          <td>
                            <?php

                              // if ( isset($late_in) && isset($late_out) ) 
                              // {
                                //echo ("<p>".$late_in."</p>");echo ("<p>".$late_out."</p>");
                                $total_late = @$late_in + @$late_out;
                                if(empty($min_time) || $min_time[0]==null)
                                {
                                  echo "Absent";
                                }
                                if ($total_late == 0) 
                                {
                                  echo " ";
                                }
                                else
                                {
                                  echo $total_late." minutes";
                                  $late_in = 0;
                                  $late_out = 0;
                                }
                              //}

                            ?>  
                          </td>

                        </tr>  
                      <?php
                          
                        $start = strtotime("+1 day", $start);
                        if($count == 7)
                        {
                          $first = $count;
                        }
                        if($count == 14)
                        {
                          $sencd = $count;
                        }
                        if($count == 21)
                        {
                          $third = $count;
                        }
                      }
                      echo $first."<br>";
                      echo $sencd."<br>";
                      echo $third;
                      ?>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>  

<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
    
<?php require 'includes/js.php'; ?>

</body>
</html>
