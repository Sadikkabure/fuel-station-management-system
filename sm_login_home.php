<?php
session_start();
require __DIR__ . "/config/database.php";
if (!$_SESSION['station']) {
  header("Location:sm_logout.php");
  die();
}

$user = $_SESSION['station'];
$profile = mysqli_query($conn, "select * from employees");
$fetch = mysqli_fetch_array($profile);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Station Manager</title>
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
      <a href="sm_login_home.php" class="logo">
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
                <span class="hidden-xs"><?php echo "$fetch[email]"; ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="images/admin.jpg" class="img-circle" alt="User Image">
                  <p>
                    <?php echo "$fetch[surname]"; ?>
                    <small><b>Station Manager</b></small>
                  </p>
                </li>
                <li class="user-body">
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="sm_login_home.php" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="sm_logout.php" class="btn btn-default btn-flat">Sign out</a>
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
            <p>Station Manager </p>

            <a href="#"> <?php echo "$fetch[station_id]"; ?> <i class="fa fa-circle text-success"></i> Online </a>
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
              <i class="fa fa-files-o"></i> <span> Sales Record</span>
              <span class="pull-right-container">
                <small class="fa fa-angle-left pull-right "></small>
              </span>
            </a>
            <ul class="treeview-menu">
              <!-- <li ><a href="n_sales.php"><i class="fa fa-user-plus"></i>Add Petrol Sales</a></li>  -->
              <li><a href="gas_sales.php"><i class="fa fa-user-plus"></i>Add Gas Sales</a></li>
              <li><a href="sales_r.php"><i class="fa fa-group"></i>Petrol Sales Report</a></li>
              <li><a href="gas_sales_r.php"><i class="fa fa-group"></i>Gas Sales Report</a></li>
            </ul>

          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i> <span> Expenses</span>
              <span class="pull-right-container">
                <small class="fa fa-angle-left pull-right "></small>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="station_add_expenses.php"><i class="fa fa-user-plus"></i>Add Expense</a></li>
              <!-- <li ><a href="station_expenses_report.php"><i class="fa fa-group"></i>Expenses Report</a></li> -->

            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i> <span> Arrival Entry</span>
              <span class="pull-right-container">
                <small class="fa fa-angle-left pull-right "></small>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="arrival_entries.php"><i class="fa fa-user-plus"></i>Add New</a></li>
              <li><a href="station_arrival_report.php"><i class="fa fa-group"></i>Arrival Report</a></li>
            </ul>
          </li>

          <li>
            <a href="sm_cpassword.php">
              <i class="fa fa-key"></i> <span>Change password</span>
              <span class="pull-right-container">

              </span>
            </a>
          </li>

          <li>
            <a href="sm_logout.php">
              <i class="fa fa-sign-out"></i> <span>Logout</span>
              <span class="pull-right-container">

              </span>
            </a>
          </li>
      </section>
    </aside>
    <div class="content-wrapper">
      <section class="content">
        <h2 align="center" style="color:red;"> User Biodata</h2>


        <table class="table  table-hover">

          <tr class="success">

            <th> Employee ID </th>
            <td> <?php echo "$fetch[employee_id]"; ?>
            </td>

          </tr>


          <tr class="info">
            <th> Surname</th>
            <td> <?php echo "$fetch[surname]"; ?></td>

          </tr>
          <tr>
            <th> Othername</th>
            <td> <?php echo "$fetch[othername]"; ?></td>
          </tr>
          <tr class="warning">
            <th> Sex</th>
            <td> <?php echo "$fetch[sex]"; ?></td>
          </tr>

          <tr>
            <th> Email</th>
            <td> <?php echo "$fetch[email]"; ?></td>
          </tr>

          <tr class="danger">
            <th>Phonenumber </th>
            <td> <?php echo "$fetch[phonenumber]"; ?></td>
          </tr>
          </tr>
          <tr class="info">
            <th> Date of Birth</th>
            <td> <?php echo "$fetch[dob]"; ?></td>

          </tr>
          <tr>
            <th> State of Origin</th>
            <td> <?php echo "$fetch[state_origin]"; ?></td>



        </table>
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