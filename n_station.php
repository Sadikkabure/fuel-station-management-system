<?php
require __DIR__ . "/config/database.php";
session_start();

if (!$_SESSION['data']) {
  header("Location:admin.php");
  die();
}
$user = $_SESSION['data'];
$profile = mysqli_query($conn, "select * from admin where email='$user'");
$fetch = mysqli_fetch_array($profile);


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
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
      <a href="admin_dashboard.php" class="logo">
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
                    <?php echo "$fetch[email]"; ?>
                    <small><b>ADMIN</b></small>
                  </p>
                </li>
                <li class="user-body">
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="admin_dashboard.php" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="alogout.php" class="btn btn-default btn-flat">Sign out</a>
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
            <p>Administrator</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
          <li class=" treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>Admin</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
      <li><a href="admin_dashboard.php"><i class="fa fa-user"></i>admin_dashboard</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-group"></i> <span> Station Manager</span>
              <span class="pull-right-container">
                <small class="fa fa-angle-left pull-right "></small>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="sm_regform.php"><i class="fa fa-user-plus"></i>Add New</a></li>
              <li><a href="profile_sm.php"><i class="fa fa-group"></i>Profile</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-group"></i> <span>Maintenance Manager</span>
              <span class="pull-right-container">
                <small class="fa fa-angle-left pull-right "></small>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="mm_regform.php"><i class="fa fa-user-plus"></i>Add New</a></li>
              <li><a href="profile_mm.php"><i class="fa fa-group"></i>Profile</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-truck"></i> <span>Tankers</span>
              <span class="pull-right-container">
                <small class="fa fa-angle-left pull-right "></small>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="new_tanker.php"><i class="fa fa-truck"></i>New</a></li>
              <li><a href="e_tanker.php"><i class="fa fa-truck"></i>Existing</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-filter"></i> <span>Station</span>
              <span class="pull-right-container">
                <small class="fa fa-angle-left pull-right "></small>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="n_station.php"><i class="fa fa-filter"></i>Add New</a></li>
              <li><a href="e_station.php"><i class="fa fa-filter"></i>Existing</a></li>
            </ul>
          </li>



          <li class="treeview">
            <a href="#">
              <i class="fa fa-group"></i> <span>Employees</span>
              <span class="pull-right-container">
                <small class="fa fa-angle-left pull-right "></small>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="add_employee.php"><i class="fa fa-user-plus"></i>Add New</a></li>
              <li><a href="profile_employes.php"><i class="fa fa-files-o"></i>Employees List</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i> <span> Sales Report</span>
              <span class="pull-right-container">
                <small class="fa fa-angle-left pull-right "></small>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="s_report.php"><i class="fa fa-files-o"></i>Petrol Report</a></li>
              <li><a href="g_report.php"><i class="fa fa-files-o"></i>Gas Report</a></li>

            </ul>
          </li>

          <li>

          <li>
            <a href="m_report.php">
              <i class="fa fa-files-o"></i> <span>Maintenance Report</span>
              <span class="pull-right-container">

              </span>
            </a>
          </li>
          <li>


          <li>
            <a href="expenses_report.php">
              <i class="fa fa-money"></i> <span>Expenses Reports</span>
              <span class="pull-right-container">

              </span>
            </a>
          </li>


          <li>

          <li>
            <a href="alogout.php">
              <i class="fa fa-sign-out"></i> <span>Logout</span>
              <span class="pull-right-container">

              </span>
            </a>
          </li>
      </section>
    </aside>
    <div class="content-wrapper">
      <section class="content">
        <h2 align="center" style="color:black;"> Add New Station</h2>


        <?php
        if (isset($_POST['register'])) {
          $t_number = mysqli_real_escape_string($conn, $_POST['tnumber']);
          $s_name = mysqli_real_escape_string($conn, $_POST['sname']);
          $d_name = mysqli_real_escape_string($conn, $_POST['dname']);
          $e_id = mysqli_real_escape_string($conn, $_POST['eid']);
          $gas = mysqli_real_escape_string($conn, $_POST['gas']);
          $sc = mysqli_real_escape_string($conn, $_POST['sc']);
          $trn_date = date("Y-m-d H:i:s");

          $sql = "Insert into stations(
  station_id,
  station_name,
  address,
  petrol_price,
  gas_price,
  station_category,
  trn_date)

VALUES(
  '$t_number',
  '$s_name',
  '$d_name',
  '$e_id',
  '$gas',
  '$sc',
  '$trn_date')";

          if (mysqli_query($conn, $sql)) {

            $message = "Station added Successfully...";
          } else {
            echo ("ERROR: Review  the details ");
          }


          mysqli_close($conn);
        }

        ?>

        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

          <h3 style="color:#F00;">
            <?php if (isset($message))
              echo $message; ?>
          </h3>



          <div class="form-group">
            <label class="control-label col-sm-2" for="surname">Station ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="tnumber" required placeholder="Station ID">
            </div>
          </div>

           <div class="form-group">
            <label class="control-label col-sm-2" for="othername">Station Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="sname" required placeholder="Station Name">
            </div>
          </div>



          <div class="form-group">
            <label class="control-label col-sm-2" for="othername">Address</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="dname" required placeholder="Address">
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-2" for="othername">Petrol Price</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="eid" required placeholder="Petrol Price">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="othername">Gas Price</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="gas" required placeholder="Gas Price">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="category">Station Category</label>
            <div class="col-sm-10">

              <select name="sc" class="form-control" required>
                <option value="NNPC">NNPC</option>
                <option value="MRS"> MRS</option>
                <option value="INDEPENDENT"> INDEPENDENT</option>
                <option value="TOTAL"> TOTAL</option>
                <option value="CONOIL"> CONOIL</option>
                <option value="KABURIYE & SONS NIG LTD"> KABURIYE & SONS NIG LTD</option>
              </select>
            </div>
          </div>


          <center> <input type="submit" class="btn btn-success" value="Register" name="register"></center>




        </form>

      </section>


    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">

      </div>
      <center> <strong>Copyright &copy; 2025 by kaburiye & sons nig ltd</strong> All rights reserved.</center>
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