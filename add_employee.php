<?php
session_start();

if (!$_SESSION['data']) {
  header("Location:admin.php");
  die();
}
require __DIR__ . "/config/database.php";
$user = $_SESSION['data'];
$profile = mysqli_query($conn, "select * from admin where email='$user'");
$fetch = mysqli_fetch_array($profile);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
        <?php
        if (isset($_POST['add_employee'])) {
          $employee_id = mysqli_real_escape_string($conn, $_POST['adm_number']);
          $surname = mysqli_real_escape_string($conn, $_POST['surname']);
          $othername = mysqli_real_escape_string($conn, $_POST['othername']);
          $role = mysqli_real_escape_string($conn, $_POST['role']);
          $sex = mysqli_real_escape_string($conn, $_POST['sex']);
          $salary = mysqli_real_escape_string($conn, $_POST['salary']);

          $dob = mysqli_real_escape_string($conn, $_POST['dob']);
          $state = mysqli_real_escape_string($conn, $_POST['state']);
          $local = mysqli_real_escape_string($conn, $_POST['local']);
          $religion = mysqli_real_escape_string($conn, $_POST['religion']);

          $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);

          $email = mysqli_real_escape_string($conn, $_POST['email']);
          $address = mysqli_real_escape_string($conn, $_POST['address']);

          $sql = "Insert into employees(employee_id,
  surname,
  othername,
  role,
  sex,
  salary,
  dob,
  state_origin,
  local,
  religion,
  phonenumber,
  email,
  address
  )
VALUES('$employee_id',
  '$surname',
  '$othername',
  '$role',
  '$sex',
  '$salary',
  '$dob',
  '$state',
  '$local',
  '$religion',
  '$phone_number',
  '$email',
  '$address')";

          if (mysqli_query($conn, $sql)) {

            $message = "Employee added Successfully...";
          } else {
            die(mysqli_error($conn));
            echo "<h4>ERROR: </h4>";
          }
          mysqli_close($conn);
        }
        ?>
        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

          <h3 style="color:#F00;">
            <?php if (isset($message))
              echo $message; ?>
          </h3>
          <h1 align="center" style="color:green;">New Employee Registration</h1>
          <div class="form-group">
            <label class="control-label col-sm-2" for="adm_number">Employee ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" required name="adm_number" placeholder="Employee ID">
            </div>
          </div>



          <div class="form-group">
            <label class="control-label col-sm-2" for="surname">Surname</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="surname" required placeholder="Surname">
            </div>
          </div>




          <div class="form-group">
            <label class="control-label col-sm-2" for="othername">Othername</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="othername" required placeholder="Othername">
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-2" for="role">Role</label>
            <div class="col-sm-10">

              <select name="role" class="form-control" required>

                <option>----Select Role----</option>
                <option value="Security">Security</option>
                <option value="Driver"> Driver</option>
                <option value="Fuel Attendants"> Fuel Attendants</option>
                <option value="Cleaner "> Cleaner</option>
                <option value="Others "> Others</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="seez">Sex</label>
            <div class="col-sm-10">
              <label class="radio-inline"><input type="radio" name="sex" value="male">Male</label>
              <label class="radio-inline"><input type="radio" name="sex" value="female">Female</label>

            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="salary">Salary</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="salary" required placeholder="Salary">
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-2" for="dob">Date of Birth</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="dob" required placeholder="Date of birth">
            </div>
          </div>




          <div class="form-group">
            <label class="control-label col-sm-2" for="state">State of Origin:</label>
            <div class="col-sm-10">
              <select required name="state" id="state" class="select-state form-control">
                <option value="" selected="selected">-- State --</option>
                <option value="Abia">Abia</option>
                <option value="Adamawa">Adamawa</option>
                <option value="AkwaIbom">Akwa Ibom</option>
                <option value="Anambra">Anambra</option>
                <option value="Bauchi">Bauchi</option>
                <option value="Bayelsa">Bayelsa</option>
                <option value="Benue">Benue</option>
                <option value="Borno">Borno</option>
                <option value="Cross River">Cross River</option>
                <option value="Delta">Delta</option>
                <option value="Ebonyi">Ebonyi</option>
                <option value="Edo">Edo</option>
                <option value="Ekiti">Ekiti</option>
                <option value="Enugu">Enugu</option>
                <option value="Gombe">Gombe</option>
                <option value="Imo">Imo</option>
                <option value="Jigawa">Jigawa</option>
                <option value="Kaduna">Kaduna</option>
                <option value="Kano">Kano</option>
                <option value="Katsina">Katsina</option>
                <option value="Kebbi">Kebbi</option>
                <option value="Kogi">Kogi</option>
                <option value="Kwara">Kwara</option>
                <option value="Lagos">Lagos</option>
                <option value="Nasarawa">Nasarawa</option>
                <option value="Niger">Niger</option>
                <option value="Ogun">Ogun</option>
                <option value="Ondo">Ondo</option>
                <option value="Osun">Osun</option>
                <option value="Oyo">Oyo</option>
                <option value="Plateau">Plateau</option>
                <option value="Rivers">Rivers</option>
                <option value="Sokoto">Sokoto</option>
                <option value="Taraba">Taraba</option>
                <option value="Yobe">Yobe</option>
                <option value="Zamfara">Zamfara</option>
                <option value="FCT">FCT</option>
              </select>
            </div>
          </div>



          <div class="form-group">
            <label class="control-label col-sm-2" for="log">Local Government:</label>
            <div class="col-sm-10">
              <select name="local" id="lga" class="select-lga form-control" required>
                <option value="">LGA</option>
              </select>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-2" for="religion">Religion</label>
            <div class="col-sm-10">

              <select name="religion" class="form-control" required>
                <option> ----Choose Religion----</option>
                <option value="islam">Islam</option>
                <option value="christianity"> Christianity</option>
                <option value="others"> others</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="log">Phone Number</label>
            <div class="col-sm-10">
              <input type="phone_number" class="form-control" name="phone_number" required placeholder="Phone Number">
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-2" for="log">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" required placeholder="Email">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="address">Address</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="address" required placeholder="Address">
            </div>
          </div>

          <center> <input type="submit" class="btn btn-success" value="Add Employee" name="add_employee"></center>
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
  <script src="js/state-capital.js"></script>
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