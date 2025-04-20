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



if (isset($_POST['submit'])) {

  try {

    $email = $_SESSION['station']['email'];

    $old_password = mysqli_real_escape_string($conn, trim(md5($_POST['o_password'])));

    $query = "SELECT email, password FROM station_manager WHERE email = '$email' AND password = '$old_password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

      $confirmpassword = mysqli_real_escape_string($conn, $_POST['c_password']);
      $confirmpassword = stripslashes(trim($_POST['c_password']));
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $password = stripslashes(trim($_POST['password']));

      if (md5($confirmpassword) !== md5($password)) {
        $error = 'Password does not match';
      } else {
        $current_password = md5($confirmpassword);

        $sql = "UPDATE station_manager SET password = '$current_password' WHERE email ='$user'";
        $query = mysqli_query($conn, $sql);
        $success = "Password Sucessfully Changed";

      }
    } else {
      $error = 'Old password is incorrect';
    }
  } catch (\Throwable $th) {
    throw $th;
  }


}

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
        <h2 align="center" style="color:blue;"> Change Password</h2>


        <form class="form-horizontal" role="form" method="post">




          <div class="form-group">
            <label class="control-label col-sm-2" for="o_password">Old Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" required name="o_password" placeholder="Old Password">
            </div>
          </div>



          <div class="form-group">
            <label class="control-label col-sm-2" for="surname">New Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" required placeholder="New Password">
            </div>
          </div>




          <div class="form-group">
            <label class="control-label col-sm-2" for="pass">Confirm Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="c_password" required placeholder="Confirm Password">
            </div>
          </div>
          <center> <input type="submit" class="btn btn-success" value="Change" name="submit"></center>
        </form>

        <h4 style="color:seagreen;"> <?php if (isset($error)) {
                                        echo $error;
                                      } elseif (isset($sus)) {
                                        echo $sus;
                                      } ?></h4>
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