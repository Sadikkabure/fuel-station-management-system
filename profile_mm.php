<?php
session_start();

if (!$_SESSION['data']){ 
    header("Location:admin.php");
    die();
}
 require "dbcon.php";
$user=$_SESSION['data'];
$profile=mysqli_query($connect,"select * from admin where email='$user'");
$fetch=mysqli_fetch_array($profile);  
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
    <a href="ahome.php" class="logo">
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
                 <?php echo"$fetch[email]"; ?>
                  
                </p>
              </li>
              <li class="user-body">
              <li class="user-footer">
                <div class="pull-left">
                  <a href="ahome.php" class="btn btn-default btn-flat">Profile</a>
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
          <li ><a href="ahome.php"><i class="fa fa-user"></i>Profile</a></li>  
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
          <li ><a href="profile_sm.php"><i class="fa fa-group"></i>Profile</a></li>            
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
          <li ><a href="mm_regform.php"><i class="fa fa-user-plus"></i>Add New</a></li> 
          <li ><a href="profile_mm.php"><i class="fa fa-group"></i>Profile</a></li>            
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
          <li ><a href="new_tanker.php"><i class="fa fa-truck"></i>New</a></li> 
          <li ><a href="e_tanker.php"><i class="fa fa-truck"></i>Existing</a></li>            
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
          <li ><a href="n_station.php"><i class="fa fa-filter"></i>Add New</a></li> 
          <li ><a href="e_station.php"><i class="fa fa-filter"></i>Existing</a></li>            
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
          <li ><a href="add_employee.php"><i class="fa fa-user-plus"></i>Add New</a></li> 
          <li ><a href="profile_employes.php"><i class="fa fa-files-o"></i>Employees List</a></li>            
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
          <li ><a href="s_report.php"><i class="fa fa-files-o"></i>Petrol Report</a></li>
          <li ><a href="g_report.php"><i class="fa fa-files-o"></i>Gas Report</a></li>
            
          </ul>
        </li>
        
      <li >

<li >
  <a href="m_report.php">
            <i class="fa fa-files-o"></i> <span>Maintenance Report</span>
            <span class="pull-right-container">
            
            </span>
          </a>
        </li>
      <li >


        <li >
  <a href="expenses_report.php">
            <i class="fa fa-money"></i> <span>Expenses Reports</span>
            <span class="pull-right-container">
            
            </span>
          </a>
        </li>


      <li >

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



<div class="table-responsive">
  
        <table  class="table table-bordered table-hover"  >
              <thead>
              <tr class="success">
                <th> SN</th>
                <th> Manager ID </th>
                <th> Surname</th>
                <th> Othername</th>
                <th>Sex</th>    
                <th>DOB</th>
                <th>SOG</th>
              
                              
                    
                     <th>More</th>
                     <th>Edit</th>
                     <th>Delete</th>

              </tr>
              </thead>
                          
                            
                            <?php
require"dbcon.php";
$getRecords_string="select * from maintenance_manager order by ID ASC ";

$getRecord = mysqli_query($connect,$getRecords_string);
$num_of_record = mysqli_num_rows($getRecord);
if($num_of_record>0){
   
  while ($record = mysqli_fetch_array($getRecord)){
    
    
    echo'<tr>';
    
    echo"<td class=''>$record[ID]</td>";
    echo"<td class=''>$record[maintenancemanager_id]</td>";
    echo"<td class=''>$record[surname]</td>";
      echo"<td class=''>$record[othername]</td>";
     echo"<td class=''>$record[sex]</td>";
    echo"<td class=''>$record[dob]</td>";
    echo"<td class=''>$record[state_origin]</td>";
    
  

    echo'<td class=""><button class="btn-info "><a href="mm_more.php?ID='.$record['ID'].'">More</a></button></td>';
echo'<td class=""><button class=" btn-success"><a href="mm_edit.php?ID='.$record['ID'].'">EDIT </a></button></td>';
    echo'<td class=""><button class="btn-danger "><a href="mm_delete.php?ID='.$record['ID'].'">DELETE</a></button></td>';
    
    
    echo'</tr>';
    
    
  }
}
else
{
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
