<?php
session_start();
require "dbcon.php";
if (!$_SESSION['station']){ 
    header("Location:sm_login.php");
    die();
}
require "dbcon.php";
$user=$_SESSION['station'];
$profile=mysqli_query($connect,"select * from station_manager where station_id='$user'");
$fetch=mysqli_fetch_array($profile);  

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
              <img src="images/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo"$fetch[email]"; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="images/avatar.png" class="img-circle" alt="User Image">
            <p>
                 <?php echo"$fetch[surname]"; ?>
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
          <img src="images/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Station Manager </p>
          
          <a href="#"> <?php echo"$fetch[station_id]"; ?> <i class="fa fa-circle text-success"></i> Online </a>
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
          <li ><a href="gas_sales.php"><i class="fa fa-user-plus"></i>Add Gas Sales</a></li> 
          <li ><a href="sales_r.php"><i class="fa fa-group"></i>Petrol Sales Report</a></li>
           <li ><a href="gas_sales_r.php"><i class="fa fa-group"></i>Gas Sales Report</a></li>   </ul>
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span> Expenses</span>
            <span class="pull-right-container">
              <small class="fa fa-angle-left pull-right "></small>
               </span>
          </a>
          <ul class="treeview-menu">
          <li ><a href="station_add_expenses.php"><i class="fa fa-user-plus"></i>Add Expense</a></li>
          <li ><a href="station_expenses_report.php"><i class="fa fa-group"></i>Expenses Report</a></li>
            
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
          <li ><a href="arrival_entries.php"><i class="fa fa-user-plus"></i>Add New</a></li> 
          <!-- <li ><a href="station_arrival_report.php"><i class="fa fa-group"></i>Arrival Report</a></li>             -->
          </ul>
        </li>

         <li >
          <a href="sm_cpassword.php">
            <i class="fa fa-key"></i> <span>Change password</span>
            <span class="pull-right-container">
             
            </span>
          </a>
        </li>
 
      <li >
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
   <h2 align="center" style="color:black;"> Expenses Report</h2>


<div class="table-responsive">
  
        <table  class="table table-bordered table-hover"  >
              <thead>
              <tr class="success">
                <th> Description </th>
                <th> Liters</th>
                  <th>Liter Price</th>
                   <th> Category </th>
                <th> Total Expense </th>
                <th>Date</th> 
                
              </tr>
              </thead>
                          
                            
 <?php
require"dbcon.php";
$getRecords_string="select * from station_expenses where station_id = '$user' order by expense_id";
$getRecord = mysqli_query($connect,$getRecords_string);
$num_of_record = mysqli_num_rows($getRecord);
if($num_of_record>0){
  while ($record = mysqli_fetch_array($getRecord)){
    
    echo'<tr>';
    
    echo"<td class=''>$record[expense_description]</td>";  
    echo"<td class=''>$record[liter_amount]</td>";
      echo"<td class=''>$record[liter_price]</td>";
      echo"<td class=''>$record[category]</td>";
     echo"<td class=''>$record[total_expense]</td>";
echo"<td class=''>$record[expensedate]</td>";      
    echo'</tr>';
   
  }
}
else
{
  // die(mysql_error($connect));
  echo"<h6>Loading..........</h6>";
  }


?>

              
            </table>  
    
  </div>








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
