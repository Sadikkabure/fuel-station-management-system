<?php
session_start();

if (!$_SESSION['data']){ 
    header("Location:m_manager.php");
    die();
}
 require "dbcon.php";
$user=$_SESSION['data'];
$profile=mysqli_query($connect,"select * from station_manager where email='$user'");
$fetch=mysqli_fetch_array($profile);  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Manager Home</title> 
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
      <span class="logo-mini"><b>BNL</b></span>      
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
              <img src="images/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo"$fetch[email]"; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="images/avatar.png" class="img-circle" alt="User Image">
            <p>
                 <?php echo"$fetch[email]"; ?>
                  <small><b><?php echo"$fetch[username]"; ?></b></small>
                </p>
              </li>
              <li class="user-body">
              <li class="user-footer">
                <div class="pull-left">
                  <a href="ohome.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="ologout.php" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="images/avatar.png" class="img-circle" alt="User Image">
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
          <li ><a href="#"><i class="fa fa-user"></i>Profile</a></li>  
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
          <li ><a href="sm_regform.php"><i class="fa fa-user-plus"></i>Add New</a></li> 
          <li ><a href="#"><i class="fa fa-group"></i>Profile</a></li>            
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
          <li ><a href="#"><i class="fa fa-user-plus"></i>Add New</a></li> 
          <li ><a href="#"><i class="fa fa-group"></i>Profile</a></li>            
          </ul>
        </li>
      <li >

         <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span> Expenses</span>
            <span class="pull-right-container">
              <small class="fa fa-angle-left pull-right "></small>
               </span>
          </a>
          <ul class="treeview-menu">
          <li ><a href="#"><i class="fa fa-user-plus"></i>Add New</a></li> 
          <li ><a href="#"><i class="fa fa-group"></i>Expenses Report</a></li>            
          </ul>
        </li>

          <a href="alogout.php">
            <i class="fa fa-briefcase"></i> <span>Logout</span>
            <span class="pull-right-container">
              <i class="fa fa-sign-out"></i>
            </span>
          </a>
    </section>
  </aside>  
  <div class="content-wrapper"> 
   <section class="content">
   <h2 align="center" style="color:blue;"> Users Biodata</h2>
<table  class="table table-bordered table-condensed table-hover">

<?php
$sql="select  count(*) as total  from owners ";
$query=mysqli_query($connect,$sql);
$data=mysqli_fetch_assoc($query);

$sql4="select  count(*) as total4  from owners where gender='male' ";
$query4=mysqli_query($connect,$sql4);
$data4=mysqli_fetch_assoc($query4);
?>

      <tr class="danger">
  <th><b>Total Number of Station Manager</b></th>
  <td><?php echo $data['total'] ?></td>
  </tr>
 <tr class="danger">
  <th><b>Total Number of Maintainer Manager</b></th>
  <td><?php echo $data4['total4'] ?></td>
  </tr>
</table>
   </section>
    
    
  </div>
  
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
  <center>  <strong>Copyright &copy; 2024 by PPMS</strong> All rights reserved.</center>
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
