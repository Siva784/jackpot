
      <header class="main-header">
        <a href="../../index2.html" class="logo"><b>Admin</b>LTE</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs">Gopal</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                 
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
           
            <div class="pull-left info">
              <p>Gopal</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="users.php"><i class="fa fa-circle-o"></i> Users</a></li>
                <!-- <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li> -->
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>PromoCode</span>
                <span class="label label-primary pull-right">1</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="promoupdate.php"><i class="fa fa-circle-o"></i>promocode update</a></li>
                
              </ul>
            </li>
            <!-- <li>
              <a href="adsupdate.php">
                <i class="fa fa-th"></i> <span>Ads Update</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li> -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Deposit</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pendingdeposit.php"><i class="fa fa-circle-o"></i> pending transactions</a></li>
                <li><a href="completeddeposit.php"><i class="fa fa-circle-o"></i> completed transactions</a></li>
                <li><a href="alldeposit.php"><i class="fa fa-circle-o"></i> All transactions</a></li>
              </ul>
            </li>
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Withdraw</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="completedwithdraw.php"><i class="fa fa-circle-o"></i> completed</a></li>
                <li><a href="pendingwithdraw.php"><i class="fa fa-circle-o"></i>pending</a></li>
                <li><a href="allwithdraw.php"><i class="fa fa-circle-o"></i>All</a></li>

                
              </ul>
            </li>
                    </ul>
        </section>