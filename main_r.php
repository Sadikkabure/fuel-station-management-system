<?php
session_start();
require __DIR__ . "/config/database.php";
if (!$_SESSION['maintenance']) {
  header("Location:mm_login.php");
  die();
}
require __DIR__ . "/config/database.php";
$user = $_SESSION['maintenance'];
$profile = mysqli_query($conn, "select * from maintenance_manager where maintenancemanager_id ='$user'");
$fetch = mysqli_fetch_array($profile);



?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Maintenance Manager</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/ionicons.min.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="mm_home.php" class="logo">
        <span class="logo-mini"><b>KBY</b></span>
        <span class="logo-lg"><b>KABURIYE & SONS NIG LTD</b></span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="images/admin.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs">
                  <?php echo "$fetch[email]"; ?>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="images/admin.jpg" class="img-circle" alt="User Image">
                  <p>
                    <?php echo "$fetch[surname]"; ?>
                    <small><b>Maintenance Manager</b></small>
                  </p>
                </li>
                <li class="user-body">
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="mm_home.php" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="mm_logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="images/admin.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Maintenance Manager </p>

            <a href="#">
              <?php echo "$fetch[maintenancemanager_id]"; ?> <i class="fa fa-circle text-success"></i> Online
            </a>
          </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i> <span> Maintenance Record</span>
              <span class="pull-right-container">
                <small class="fa fa-angle-left pull-right "></small>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="n_main.php"><i class="fa fa-user-plus"></i>Add New</a></li>
              <li><a href="main_r.php"><i class="fa fa-group"></i>Maintenance Report</a></li>
            </ul>
          </li>


          <li>
            <a href="mm_cpassword.php">
              <i class="fa fa-key"></i> <span>Change password</span>
              <span class="pull-right-container">

              </span>
            </a>
          </li>

          <li>
            <a href="mm_logout.php">
              <i class="fa fa-sign-out"></i> <span>Logout</span>
              <span class="pull-right-container">

              </span>
            </a>
          </li>
      </section>
    </aside>
    <div class="content-wrapper">
      <section class="content">
        <h2 align="center" style="color:black; font-family: monospace; "> Maintenance Report</h2>

        <div class="table-responsive">

          <table class="table table-bordered table-hover">
            <thead>
              <tr class="success">
                <th> Employee Name</th>
                <th> Problem </th>
                <th>Quantity</th>
                <th>Others</th>
                <th> Car Number</th>
                <th> Status </th>
                <th>Date</th>

              </tr>
            </thead>


            <?php
            require __DIR__ . "/config/database.php";
            $getRecords_string = "select * from maintenance where maintenancemanager_id = '$user' order by SN ";
            $getRecord = mysqli_query($conn, $getRecords_string);
            $num_of_record = mysqli_num_rows($getRecord);
            if ($num_of_record > 0) {
              while ($record = mysqli_fetch_array($getRecord)) {

                echo '<tr>';
                echo "<td class=''>$record[employee_name]</td>";
                echo "<td class=''>$record[problem]</td>";
                echo "<td class=''>$record[quantity]</td>";
                echo "<td class=''>$record[others]</td>";
                echo "<td class=''>$record[car_number]</td>";
                echo "<td class=''>$record[status]</td>";
                echo "<td class=''>$record[date]</td>";

                echo '</tr>';
              }
            } else {
              #die(mysql_error($conn));
              echo "<h4>Loading..........</h4>";
            }


            ?>


          </table>

        </div>





      </section>


    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">

      </div>
      <center> <strong>Copyright &copy; 2024 by PPMS</strong> All rights reserved.</center>
    </footer>

  </div>


  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.sparkline.min.js"></script>
  <script src="js/jquery.slimscroll.min.js"></script>
  <script src="js/adminlte.min.js"></script>
</body>

</html>