<?php

session_start();

require __DIR__ . "/config/database.php";
if (!$_SESSION['data']) {
  header("Location:admin.php");
  die();
}
if (!isset($_GET['ID'])) {
  header("location:admin.php");
}


if (isset($_POST['insert'])) {
  $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
  $surname = mysqli_real_escape_string($conn, $_POST['surname']);
  $othername = mysqli_real_escape_string($conn, $_POST['othername']);
  $sex = mysqli_real_escape_string($conn, $_POST['sex']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $sog = mysqli_real_escape_string($conn, $_POST['sog']);
  $local = mysqli_real_escape_string($conn, $_POST['local']);
  $religion = mysqli_real_escape_string($conn, $_POST['religion']);
  $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  mysqli_query($conn, "
               
        Update maintenance_manager  set maintenancemanager_id='$employee_id',
        surname='$surname',
        othername='$othername',  
        sex='$sex',
        dob='$dob',
        state_origin='$sog',
        local='$local',
        religion='$religion',
        phonenumber='$phonenumber',
        email='$email'
              
    where ID='$_GET[ID]'
        ") or die(mysqli_error($conn));
  header("location:profile_mm.php");
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
        <h2 align="center" style="color:blue;"> Maintenance Managers Biodata</h2>


        <?php
        $userInfo = mysqli_query($conn, "select * from maintenance_manager where ID='$_GET[ID]'");
        $num_users = mysqli_num_rows($userInfo);
        if ($num_users == 1) {
          $user_information = mysqli_fetch_array($userInfo);
        }



        ?>



        <form method="post">




          <div class="form-group">
            <label for="newstitle"><b>Employee ID</b></label>
            <input type="text" name="employee_id" required class="form-control"
              value="<?php echo $user_information['maintenancemanager_id'] ?>" />
          </div>




          <div class="form-group">
            <label for=""><b>Surname</b></label>
            <input type="text" name="surname" required class="form-control"
              value="<?php echo $user_information['surname'] ?>" />
          </div>

          <div class="form-group">
            <label for=""><b>Othername</b></label>
            <input type="text" name="othername" required class="form-control"
              value="<?php echo $user_information['othername'] ?>" />
          </div>


          <div class="form-group">
            <label for=""><b>Sex</b></label>
            <input type="text" name="sex" required class="form-control"
              value="<?php echo $user_information['sex'] ?>" />
          </div>


          <div class="form-group">
            <label for=""><b>Date of Birth</b></label>
            <input type="date" name="dob" required class="form-control"
              value="<?php echo $user_information['dob'] ?>" />
          </div>


          <div class="form-group">
            <label for=""><b>State of Origin</b></label>
            <input type="text" name="sog" required class="form-control"
              value="<?php echo $user_information['state_origin'] ?>" />
          </div>




          <div class=" form-group">
            <label for=""><b>Local</b></label>
            <input type="text" required class="form-control" name="local"
              value="<?php echo $user_information['local'] ?>" />
          </div>


          <div class=" form-group">
            <label for=""><b>Religion</b></label>
            <input type="text" required class="form-control" name="religion"
              value="<?php echo $user_information['religion'] ?>" />
          </div>

          <div class=" form-group">
            <label for="n"><b>Phonenumber</b></label>
            <input type="text" required class="form-control" name="phonenumber"
              value="<?php echo $user_information['phonenumber'] ?>" />
          </div>

          <div class=" form-group">
            <label for="n"><b>Religion</b></label>
            <input type="text" required class="form-control" name="religion"
              value="<?php echo $user_information['religion'] ?>" />
          </div>



          <div class=" form-group">
            <label for="n"><b>Email</b></label>
            <input type="text" required class="form-control" name="email"
              value="<?php echo $user_information['email'] ?>" />
          </div>

          <div class=" form-group">
            <label for="n"><b>Password</b></label>
            <input type="text" required class="form-control" name="password"
              value="<?php echo $user_information['password'] ?>" />
          </div>



          <center>
            <input type="submit" class="btn btn-success" value="Update" name="insert" />
          </center>


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