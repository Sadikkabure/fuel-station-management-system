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

            <a href="#"> <?php echo "$fetch[surname]"; ?> <i class="fa fa-circle text-success"></i> Online </a>
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
              <li><a href="station_add_expenses.php"><i class="fa fa-user-plus"></i>Add Expense</a></li>
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
        <?php

        if (isset($_POST['expense'])) {
          $station_id = mysqli_real_escape_string($conn, $_POST['station_id']);
          $des = mysqli_real_escape_string($conn, $_POST['expensedescription']);
          $litam = mysqli_real_escape_string($conn, $_POST['literamount']);
          $litpr = mysqli_real_escape_string($conn, $_POST['l_price']);
          $cate = mysqli_real_escape_string($conn, $_POST['cate']);
          $talex = mysqli_real_escape_string($conn, $_POST['totalexpense']);
          $dte = mysqli_real_escape_string($conn, $_POST['expense_date']);



          $sql = "  into station_expenses (
  station_id,
  expense_description,
  liter_amount,
  liter_price,
  category,
  total_expense,
  expensedate)
VALUES(
  '$station_id',
  '$des',
  '$litam',
  '$litpr',
  '$cate',
  '$talex',
  '$dte')";

          if (mysqli_query($conn, $sql)) {

            $message = "Expense added Successfully...";
          } else {
            die(mysqli_error($conn));
            echo "ERROR: ";
          }


          mysqli_close($conn);
        }






        ?>

        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

          <h3 style="color:#F00;"> <?php if (isset($message)) echo $message; ?></h3>
          <h1 align="center" style="color:black;">Add Expenses</h1>



          <div class="form-group">
            <label class="control-label col-sm-2" for="expensedescription">Station ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" readonly value="<?php echo "$fetch[station_id]"; ?>" name="station_id">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="expensedescription">Expense Description</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" required name="expensedescription" placeholder="Expense Description">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="category">Category</label>
            <div class="col-sm-10">

              <select name="cate" class="form-control" onchange="GetDetail(this.value)" value="" required>
                <option disabled>--Select--</option>
                <option value="Gas">Gas</option>
                <option value="Petrol"> Petrol</option>

              </select>
            </div>
          </div>


          <script>
            calculate = function() {
              var litres_sold = document.getElementById('litres_sold').value;
              var litres_price = document.getElementById('litres_price').value;
              document.getElementById('totalexpense').value = parseInt(litres_sold) * parseInt(litres_price);


            }
          </script>


          <div class="form-group">
            <label class="control-label col-sm-2" for="Literamount">Liters:</label>
            <div class="col-sm-10">
              <input type="number" id="litres_sold" class="form-control" name="literamount" required placeholder="Liters" oninput="calculate()">
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
              <input type="number" class="form-control  variable-field costpriceunit" id="litres_price" name="l_price" readonly required>
            </div>
          </div>



          <div class="form-group">
            <label class="control-label col-sm-2" for="totalexpense"> Total Expense:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="totalexpense" required id="totalexpense" readonly>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-2" for="expensedate">Date:</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="expense_date" required>
            </div>
          </div>




          <center> <input type="submit" class="btn btn-success" value="Expense" name="expense"></center>




        </form>
      </section>


    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">

      </div>
      <center> <strong>Copyright &copy; 2025 by kaburiye & sons nig ltd</strong> All rights reserved.</center>
    </footer>

    <script>
      function GetDetail(value) {
        document.getElementById("litres_price").value = "3456";
        if (value.length == 0) {
          document.getElementById("litres_price").value = value;

        } else {
          if (value == "Gas") {
            document.getElementById("litres_price").value = "<?php echo $litre_price['gas_price']; ?>";
          } else if (value == "Petrol") {
            document.getElementById("litres_price").value = "<?php echo $litre_price['petrol_price']; ?>";
          }
        }
      }
    </script>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sparkline.min.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="js/adminlte.min.js"></script>
    <script src="js/bootstrap3-wysihtml5.all.min.js"></script>

</body>

</html>