<?php
session_start();
require __DIR__ . "/config/database.php";
if (!$_SESSION['maintenance']) {
  header("Location:mm_login.php");
  die();
}
require __DIR__ . "/config/database.php";
$user = $_SESSION['maintenance'];
$profile = mysqli_query($conn, "select * from maintenance_manager where maintenancemanager_id='$user'");
$fetch = mysqli_fetch_array($profile);

$query = "select * from employees";
$employees = mysqli_query($conn, $query);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


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
      <a href="mm_login_home.php" class="logo">
        <span class="logo-mini"><b>KBY</b></span>
        <span class="logo-lg"><b>Kaburiye & sons NIG LTD</b></span>
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
                <span class="hidden-xs"><?php echo "$fetch[email]"; ?></span>
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
                    <a href="mm_login_home.php" class="btn btn-default btn-flat">Profile</a>
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

            <a href="#"> <?php echo "$fetch[maintenancemanager_id]"; ?> <i class="fa fa-circle text-success"></i> Online </a>
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
        <h2 align="center" style="color:#009933;"> Add Maintenance Record</h2>


        <?php
        if (isset($_POST['register'])) {
          $mid = mysqli_real_escape_string($conn, $_POST['mid']);
          $ename = mysqli_real_escape_string($conn, $_POST['ename']);
          $date = mysqli_real_escape_string($conn, $_POST['date']);
          $cn = mysqli_real_escape_string($conn, $_POST['cn']);
          $problem = mysqli_real_escape_string($conn, $_POST['problem']);
          $quantity = mysqli_real_escape_string($conn, $_POST['qty']);
          $others = mysqli_real_escape_string($conn, $_POST['others']);
          $status = mysqli_real_escape_string($conn, $_POST['status']);

          $sql = "Insert into maintenance(
  employee_name,
   date,
  maintenancemanager_id,
  car_number,
  problem,
  quantity,
  others,
  status
  )
VALUES('$ename',
  '$date',
  '$mid',
  '$cn',
  '$problem',
  '$quantity',
  '$others',
  '$status')";

          if (mysqli_query($conn, $sql)) {

            $message = "Maintenance Record added Successfully...";
          } else {
            #die(mysqli_error($conn));
            echo "ERROR: Review  the details  ";
          }


          mysqli_close($conn);
        }

        ?>

        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

          <h3 style="color:#F00;"> <?php if (isset($message)) echo $message; ?></h3>


          <div class="form-group">
            <label class="control-label col-sm-2" for="MMID"> Manager ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="mid" readonly required value="<?php echo "$fetch[maintenancemanager_id]"; ?>">
            </div>
          </div>



          <div class="form-group">
            <label class="control-label col-sm-2" for="Employee Name">Employee Name</label>
            <div class="col-sm-10">
              <select name="ename" class="form-control" required>
                <?php

                while ($empl = mysqli_fetch_array($employees, MYSQLI_ASSOC)):;
                ?>

                  <option value="<?php echo $empl["surname"]; ?>">

                    <?php echo $empl["surname"];
                    ?>
                  </option>

                <?php
                endwhile;
                ?>
              </select>
            </div>
          </div>



          <div class="form-group">
            <label class="control-label col-sm-2" for="problem">Problem</label>
            <div class="col-sm-10">

              <select name="problem" class="form-control" required>

                <option disabled> ---Select---</option>
                <option value="Tires"> Tires</option>
                <option value="Engine">Engine</option>
                <option value="Engine Oil">Engine Oil</option>
                <option value="Driving Shaft">Driving Shaft</option>
                <option value="Pump">Pump</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="log">Others</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="others" required placeholder="Others">
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-2" for="log">Quantity</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="qty" required placeholder="Quantity">
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-2" for="othername">Car Number</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="cn" required placeholder="Car Number">
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-2" for="status">Status</label>
            <div class="col-sm-10">

              <select name="status" class="form-control" required>

                <option value="Good"> Good</option>
                <option value="Bad">Bad</option>
                <option value="In-Maintenance">In-Maintenance</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="othername">Date</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="date" required placeholder="Date">
            </div>
          </div>






          <center> <input type="submit" class="btn btn-success" value=" Add " name="register"></center>




        </form>


      </section>


    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">

      </div>
      <center> <strong>Copyright &copy; 2022 by PPMS</strong> All rights reserved.</center>
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