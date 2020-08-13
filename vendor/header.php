


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Gemini matrimony</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style>
					        
                            .left123 {
                           position: relative;
                           right: -220px;
                           top: 21px;
                           color: white;
                            }
                             </style>
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index" class="logo"><b>GEMINI</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <?php
              include('connection.php');
              // $id=$_GET['id'];
              
              $select_user_type =mysqli_fetch_array(mysqli_query($link,"select * from tbl_vendors where id='".$vendorid."'"));
              $paymentmode = $select_user_type['amount'];
              
              $user_register_date = $select_user_type['subscribevendordate'];
              ?>
              
              <?php
              include('connection.php');
              $query="select * from amountpay";
              $result=mysqli_query($link,$query);
              while($row=mysqli_fetch_array($result)){
              $mycat185=$row['amount']; 
              $day=$row['valid']; 
             
              if($paymentmode==$mycat185 )
              {
                   
            
              $sum = strtotime(date("d-m-Y", strtotime("$user_register_date")) . " +$day days");
              $dateTo=date('d-m-Y',$sum);
            
              if(strtotime($dateTo) > strtotime($user_register_date) )
              { 
              
              }
              else
              {
              $date_exceed=1;
              }
              }
              }
              ?>
              
              <?php
              include('connection.php');
              $query="select * from amountpay";
              $result=mysqli_query($link,$query);
              while($row=mysqli_fetch_array($result)){
              $mycat185=$row['amount']; 
              $dayss=$row['valid1']; 
              
              if($paymentmode==$mycat185 )
              {
              
              $sum = strtotime(date("d-m-Y", strtotime("$user_register_date")) . " +$dayss days");
              $dateTo1=date('d-m-Y',$sum);
              
              if(strtotime($dateTo1) > strtotime($user_register_date) )
              { 
              
              }
              else
              {
              $date_exceed1=1;
              }
              }
              }
              ?>

              <div class="left123"><?php if(!empty($date_exceed)){echo "Your account validity is Expired,Kindly Subscribe"; } ?></div>
              <div class="left123"><?php if(!empty($date_exceed1)){echo "Your account validity will be Expired On $dateTo,Kindly Renewal"; } ?></div>
          
                    <!-- end mobile menu -->
                    <!-- start header menu -->
                    <div class="top-menu">
                      <ul class="nav navbar-nav pull-right">
                      <li><a href="http://geminimatrimony.com" target="_blank" class="btn btn-danger btn-xs dashboard">Home</a></li>
                        <?php
              include('connection.php');
              //echo "select * from tbl_users where id='".$userid."'";exit;
              $sqlstt=mysqli_query($link,"select * from tbl_vendors where id='".$vendorid."'");
              while($result=mysqli_fetch_array($sqlstt))
              {
              $id=$result['id'];
              ?>
                        <!-- start message dropdown -->
                        
                        <!-- end message dropdown -->
                         <li class="dropdown dropdown-user">
                                      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
               
                                          <span class="username usernam"> <?php echo $result['name']?>  </span>
                                          <i class="fa fa-angle-down"></i>
                                      </a>
                                      <ul class="dropdown-menu dropdown-menu-default">
                                         <li>
                                              <a href="changepassword?id=<?php echo $vendorid; ?>">
                                                  <i class="icon-user"></i> Change Password </a>
                                          </li>
                                   
                                          <li>
                                              <a href="logout">
                                                  <i class="icon-logout"></i> Log Out </a>
                                          </li>
                                      </ul>
                                  </li>
              <?php } ?>
                      </ul>
                    </div>
          



            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

            <li>
              <a href="fill-details">
                <span>Fill Your Details</span>
              </a>
            </li>
            <li>
              <a href="index">
                <span>View Profile</span>
              </a>
            </li>
            <li>
              <a href="pricinglist">
                <span>Pricing List</span>
              </a>
            </li>
            <li>
              <a href="wishlist-vendor">
                <span>Wish List</span>
               
              </a>
            </li>
      
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->

    

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>