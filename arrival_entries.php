<?php
session_start();
require __DIR__ . "/config/database.php";
if (!$_SESSION['station']) {
  header("Location:sm_login.php");
  die();
}
$user = $_SESSION['station']['station_id'];
$profile = mysqli_query($conn, "SELECT * from station_manager where station_id='$user'");
$fetch = mysqli_fetch_assoc($profile);


$query = "select * from tankers";
$tank = mysqli_query($conn, $query);

$x = "Driver";
$query = "select * from employees where role='$x'";
$drivers = mysqli_query($conn, $query);
?>


<script>
  function GetDetail(value) {

    if (value.length == 0) {
      document.getElementById("tanker").value = value;

    } else {

      document.getElementById("tanker").value = value;
    }
  }
</script>


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

             <a href="#">
              <?php echo "$fetch[surname]"; ?> <i class="fa fa-circle text-success"></i> Online
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
              <li><a href="n_sales.php"><i class="fa fa-user-plus"></i>Add Petrol Sales</a></li>
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
              <li><a href="station_add_expenses.php"><i class="fa fa-user-plus"></i>Add New</a></li>
              <li><a href="station_expenses_report.php"><i class="fa fa-group"></i>Expenses Report</a></li>
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
        <h2 align="center" style="color:blue;"> Add Arrival Entries Record</h2>


        <?php
        if (isset($_POST['register'])) {
          $entry_id = mysqli_real_escape_string($conn, $_POST['entry_id']);
          $station_id = mysqli_real_escape_string($conn, $_POST['station_id']);
          $dateofentry = mysqli_real_escape_string($conn, $_POST['dateofentry']);
          $tanke = mysqli_real_escape_string($conn, $_POST['tanker']);
          $product = mysqli_real_escape_string($conn, $_POST['product']);
          $quantitylifted = mysqli_real_escape_string($conn, $_POST['quantitylifted']);
          $quantity_received = mysqli_real_escape_string($conn, $_POST['quantity_received']);
          $shortage = mysqli_real_escape_string($conn, $_POST['shortage']);
          $drivername = mysqli_real_escape_string($conn, $_POST['dname']);
          $stats = mysqli_real_escape_string($conn, $_POST['stats']);

          $sql = "Insert into arrival_entries(
  entry_id,
  station_id,
  dateofentry,
  tanker,
  product,
  quantitylifted,
  quantity_received,
  shortage,
  driver_name,
  status)
VALUES('$entry_id',
  '$station_id',
  '$dateofentry',
  '$tanke',
  '$product',
  '$quantitylifted',
  '$quantity_received',
  '$shortage',
  '$drivername',
  '$stats')";

          if (mysqli_query($conn, $sql)) {

            $message = "Arrival Entries Record added Successfully...";
          } else {
            echo "ERROR: Review  the details  ";
          }


          mysqli_close($conn);
        }

        ?>

        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

          <h3 style="color:#F00;"> <?php if (isset($message)) echo $message; ?></h3>



          <div class="form-group">
            <label class="control-label col-sm-2" for="ArrivalID">Arrival ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" readonly name="entry_id" value="<?php echo uniqid("AR") ?>">
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-2" for="StationID">Station ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" readonly name="station_id" value="<?php echo "$user"; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="log">Driver Name</label>
            <div class="col-sm-10">
              <select name="dname" id="drivername" class="form-control" onchange="GetDetail(this.value)" required>
                <option disabled>--select---</option>
                <?php

                while ($driv = mysqli_fetch_array($tank, MYSQLI_ASSOC)):;
                ?>

                  <option value="<?php echo $driv["driver_name"]; ?>">

                    <?php echo $driv["driver_name"];
                    ?></option>


                <?php
                endwhile;
                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="tanker">Tanker Number</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="tanker" required id="tanker" placeholder="Tanker Number" readonly>
            </div>
          </div>



          <div class="form-group">
            <label class="control-label col-sm-2" for="product">Product</label>
            <div class="col-sm-10">

              <select name="product" class="form-control" required>
                <option disabled>--select---</option>
                <option value="Gas">Gas</option>
                <option value="Petrol">Petrol</option>
                <option value="Keroseine">Keroseine</option>
              </select>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-2" for="quantitylifted">Quantity Lifted</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="quantitylifted" required placeholder="Quantity Lifted" id="q_lifted">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="quantity_received">Quantity Received</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="quantity_received" required id="q_received" placeholder="Quantity Received" oninput="calculate()">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="shortage">Shortage</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="shortage" required placeholder="Shortage" id="shortage" readonly>
            </div>
          </div>

          <script>
            calculate = function() {
              var q_lifted = document.getElementById('q_lifted').value;
              var q_received = document.getElementById('q_received').value;
              document.getElementById('shortage').value = parseInt(q_lifted) - parseInt(q_received);


            }
          </script>

          <div class="form-group">
            <label class="control-label col-sm-2" for="dateofentry">Date Of Arrival</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="dateofentry">
            </div>
          </div>



          <div class="form-group">
            <label class="control-label col-sm-2" for="product">Status</label>
            <div class="col-sm-10">

              <select name="stats" class="form-control" required>
                <option disabled>---status----</option>
                <option value="Active">Active</option>
                <option value="In-Active">In-Active</option>

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