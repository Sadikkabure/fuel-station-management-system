<?php
session_start();
require __DIR__ . "/config/database.php";
if (!$_SESSION['station']) {
  header("Location:sm_login.php");
  die();
}
require __DIR__ . "/config/database.php";
$user = $_SESSION['station'];
$profile = mysqli_query($conn, "select * from station_manager where station_id='$user'");
$fetch = mysqli_fetch_array($profile);


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
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
        <h2 align="center" style="color:blue;"> Add Gas Daily Sales Record</h2>






        <?php
        if (isset($_POST['register'])) {
          $s_id = mysqli_real_escape_string($conn, $_POST['s_id']);
          $l_sold = mysqli_real_escape_string($conn, $_POST['l_sold']);
          $a_litre = mysqli_real_escape_string($conn, $_POST['a_litre']);
          $l_price = mysqli_real_escape_string($conn, $_POST['l_price']);
          $totalsales = mysqli_real_escape_string($conn, $_POST['totalsales']);
          $date = mysqli_real_escape_string($conn, $_POST['date']);


          $sql = "Insert into gas_sales(
  station_id,
  litres_sold,
  available_litres,
  litre_price,
  total_sales,
  date
  )
VALUES('$s_id',
  '$l_sold',
  '$a_litre',
  '$l_price',
  '$totalsales',
  '$date')";

          if (mysqli_query($conn, $sql)) {

            $message = "Sales Record added Successfully...";
          } else {
            die(mysqli_error($conn));
            echo "ERROR: Review  the details  ";
          }


          mysqli_close($conn);
        }

        ?>

        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

          <h3 style="color:#F00;"> <?php if (isset($message)) echo $message; ?></h3>



          <div class="form-group">
            <label class="control-label col-sm-2" for="StationID">Station ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" readonly name="s_id" value="<?php echo "$fetch[station_id]"; ?>">
            </div>
          </div>


          <script>
            calculate = function() {
              var litres_sold = document.getElementById('l_sold').value;
              var litres_price = document.getElementById('l_price').value;
              document.getElementById('totalsales').value = parseInt(litres_sold) * parseInt(litres_price);

            }
          </script>

          <div class="form-group">
            <label class="control-label col-sm-2" for="litres sold">Litres Sold</label>
            <div class="col-sm-10">
              <input type="number" class="form-control variable-field quantity" id="l_sold" name="l_sold" oninput="calculate()" required>
            </div>
          </div>

          <?php
          require __DIR__ . "/config/database.php";
          $getRecord = mysqli_query($conn, "select * from stations where station_id='$user'");
          $litre_price = mysqli_fetch_array($getRecord);
          ?>
          <div class="form-group">
            <label class="control-label col-sm-2" for="log">Litre price</label>
            <div class="col-sm-10">
              <input type="number" class="form-control variable-field costpriceunit" id="l_price" name="l_price" value="<?php echo "$litre_price[gas_price]"; ?>" required readonly>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="Available litres">Total sales</label>
            <div class="col-sm-10">
              <input type="number" class="form-control width-80 totalcostprice" id="totalsales" name="totalsales" readonly required>
            </div>
          </div>
          </tr>

          <div class="form-group">
            <label class="control-label col-sm-2" for="Available litres">Available Litres </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="a_litre" required placeholder="Available Litres">
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-2" for="date">Date</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="date" required placeholder="Date">
            </div>
          </div>

          <center> <input type="submit" class="btn btn-success" value="Register" name="register"></center>

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