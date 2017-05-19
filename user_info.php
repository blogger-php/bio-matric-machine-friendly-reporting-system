<?php 
  include("db/conn.php");
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

  echo("<p>".$start."</p>");
  echo("<p>".$end."</p>");

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Attendace</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="rapper">
      <header>
        <div class="container">
          <div class="row">
          <div class="col-md-2">
            
          </div>
          <div class="col-md-10">
            <h1><?php echo 'ID Number <b>'.$user_id.'</b> Detail'; ?></h1>
            <hr>
            <div class="input">
              <form action="" method="post">
                <input type="text" name="txt_start_date" id="txt_start_date" class="form-control" 
                        value="" placeholder="<?php echo $start_date; ?>" />
                <input type="text" name="txt_end_date" id="txt_end_date" class="form-control" 
                        value="" placeholder="<?php echo $end_date; ?>" />
                <input type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary" />
              </form>
              
            </div>

            <div class="user_info">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Emp_name</th>
                      <th>Badge_num</th>
                      <!-- <th><a href="#">Action</a></th> -->
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php
                  $sql = "SELECT * FROM USERINFO WHERE USERID=".$user_id;
                  $rs = odbc_exec($conn, $sql);
                    while(odbc_fetch_array($rs))
                    {

                  ?>
                  <tr>
                    <td><?php echo odbc_result($rs,'name'); ?></td>
                    <td><?php echo odbc_result($rs,'BADGENUMBER'); ?></td>
                    <td><?php//echo odbc_result($rs, 'BADGENUMBER'); ?></td>
                    <td><?php//echo odbc_result($rs, 'BADGENUMBER'); ?></td>
                  </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div><!-- end of user_info -->

            <div class="inout">
              <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>In_time</th>
                    <th>Out_time</th>
                    <!-- <th><a href="#">Action</a></th> -->
                  </tr>
                </thead>
                <tbody>
                <?php


          

          while($start <= $end)
          {
            $date_display = date('l, F d, Y', $start);
            
            $clause_day = date('d', $start);
            $clause_month = date('m', $start);
            $clause_year = date('Y', $start);
            
            $sql_min  = "SELECT MIN(checktime) AS MINCHKTM FROM checkinout WHERE 
            USERID = ".$user_id."
            AND DAY(CHECKTIME) = ".$clause_day." 
            AND MONTH(CHECKTIME) = ".$clause_month." 
            AND YEAR(CHECKTIME) = ".$clause_year."
            ";
            //echo("<p>".$sql_min."</p>");

            $result = odbc_exec($conn, $sql_min);

            $min_time = odbc_result($result, 'MINCHKTM');
            
            $sql_max  = "SELECT MAX(checktime) AS MAXCHKTM FROM checkinout WHERE 
            USERID = ".$user_id."
            AND DAY(CHECKTIME) = ".$clause_day." 
            AND MONTH(CHECKTIME) = ".$clause_month." 
            AND YEAR(CHECKTIME) = ".$clause_year."
            ";
            //echo("<p>".$sql_max."</p>");

            $result = odbc_exec($conn, $sql_max);

            odbc_fetch_row($result);
            
            $max_time = odbc_result($result, 'MAXCHKTM');

            echo "<p>" . $date_display . " - " . $min_time . " - " . $max_time . "</p>";
              
            $start = strtotime("+1 day", $start);
          }
          ?>
                </tbody>
              </table>
            </div><!-- end of inout ->
          </div>
          </div>
        </div>
      </header>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
