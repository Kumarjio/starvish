<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SV</b>M</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>StarVish</b>&nbsp;Mechatronics</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <i class="fa fa-history"></i>
                </a>
                <ul class="dropdown-menu">
                  <li class="header"> Last Login : <i class="fa fa-clock-o"></i> <?= empty($last_login) ? "First Time Login" : $last_login; ?></li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $name; ?>
                      <small><?php echo $role_text; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>loadChangePass" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
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
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" class="smooth-scroll list-unstyled">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>

            <li class="treeview">
              <a href="#quot" data-toggle="collapse" title="View Purchase Orders">
                <i class="fa fa-file"></i>
                <span>Quotation</span>
              </a>
              <div id="quot" class="collapse">
                <ul class="dropdown">
                  <li class="treeview">
                    <a href="<?php echo base_url()?>" ><br>
                      <i class="fa fa-paperclip"></i>
                      <span>Customer Quotation</span>
                    </a>
                  </li>
                  <br>
                  <li class="treeview">
                    <a href="<?php echo base_url()?>" >
                      <i class="fa fa-file-text-o"></i>
                      <span>Vendor Quotation</span>
                    </a>
                  </li>
                  <br>
                </ul>
              </div>
            </li>


            <li class="treeview">
              <a href="#PO" data-toggle="collapse" title="View Purchase Orders">
                <i class="fa fa-bell-o"></i>
                <span>Purchase Orders</span>
              </a>
              <div id="PO" class="collapse">
                <ul class="dropdown">
                  <li class="treeview">
                    <a href="<?php echo base_url()?>" ><br>
                      <i class="fa fa-paperclip"></i>
                      <span>Customer PO</span>
                    </a>
                  </li>
                  <br>
                  <li class="treeview">
                    <a href="<?php echo base_url()?>" >
                      <i class="fa fa-file-text-o"></i>
                      <span>Vendor PO</span>
                    </a>
                  </li>
                  <br>
                  <li class="treeview">
                    <a href="<?php echo base_url()?>" >
                      <i class="fa fa-building-o"></i>
                      <span>Purchase Logs</span>
                    </a>
                  </li>
                  <br>
                </ul>
              </div>
            </li>


            <li class="treeview">
              <a href="<?php echo base_url()?>" >
                <i class="fa fa-check-square-o"></i>
                <span>Invoice</span>
              </a>
            </li>

            <li class="treeview">
              <a href="#dc" data-toggle="collapse" title="View Purchase Orders">
                <i class="fa fa-cube"></i>
                <span>Delivery Challan</span>
              </a>
              <div id="dc" class="collapse">
                <ul class="dropdown">
                  <li class="treeview">
                    <a href="<?php echo base_url()?>" ><br>
                      <i class="fa fa-file-text-o"></i>
                      <span>Customer DC</span>
                    </a>
                  </li>
                  <br>
                  <li class="treeview">
                    <a href="<?php echo base_url()?>" >
                      <i class="fa fa-paperclip"></i>
                      <span>Vendor DC</span>
                    </a>
                  </li>
                  <br>
                </ul>
              </div>
            </li>

          <li class="treeview">
              <a href="<?php echo base_url()?>" >
                <i class="fa fa-unlink"></i>
                    <span>Followup Master</span>
                </a>
           </li>

           <li class="treeview">
               <a href="<?php echo base_url()?>" >
                 <i class="fa fa-flag-o"></i>
                     <span>Daily Jobs</span>
                 </a>
            </li>

            <?php
            if($role == ROLE_ADMIN || $role == ROLE_MANAGER)
            {
            ?>
            <li class="header">MANAGER PANEL</li>
            <li class="treeview">
                <a href="<?php echo base_url()?>" >
                  <i class="fa fa-usd"></i>
                <span>Pay slip </span>
              </a>
            </li>
            <li class="treeview">
              <a href="#reports" data-toggle="collapse" title="View Purchase Orders">
                <i class="fa fa-files-o"></i>
                <span>Reports</span>
              </a>
              <div id="reports" class="collapse">
                <ul class="dropdown">
                  <li class="treeview">
                    <a href="<?php echo base_url()?>" ><br>
                      <i class="fa fa-credit-card"></i>
                      <span>Service Reports </span>
                    </a>
                  </li>

                  <li class="treeview">
                    <a href="<?php echo base_url()?>" ><br>
                      <i class="fa fa-credit-card"></i>
                      <span>Revenue Reports </span>
                    </a>
                  </li>
                  <br>
                  <li class="treeview">
                      <a href="<?php echo base_url()?>" >
                        <i class="	fa fa-money"></i>
                      <span>Expenditure</span>
                    </a>
                  </li>
                  <br>
                  <li class="treeview">
                      <a href="<?php echo base_url()?>" >
                        <i class="fa fa-spinner"></i>
                      <span>Pending Payments</span>
                    </a>
                  </li>
                  <br>
                  <li class="treeview">
                      <a href="<?php echo base_url()?>" >
                        <i class="fa fa-bar-chart"></i>
                      <span>Daily Job Report</span>
                    </a>
                  </li>
                  <br>
                  <li class="treeview">
                      <a href="<?php echo base_url()?>" >
                        <i class="fa fa-usd"></i>
                      <span>Tax Report </span>
                    </a>
                  </li>
                  <br>
                </ul>
              </div>
            </li>


            <?php
            }
            if($role == ROLE_ADMIN)
            {
            ?>
            <li class="header">ADMIN PANEL</li>
            <li class="treeview">
              <a href="#master" data-toggle="collapse" title="View Purchase Orders">
                <i class="fa fa-users"></i>
                <span>Administration</span>
              </a>
              <div id="master" class="collapse">
                <ul class="dropdown">
                  <li class="treeview">
                    <a href="<?php echo base_url()?>customer_master" ><br>
                      <i class="fa fa-heart-o"></i>
                      <span>Customer Master</span>
                    </a>
                  </li>
                  <br>
                  <li class="treeview">
                      <a href="<?php echo base_url()?>" >
                        <i class="fa fa-plus-square-o"></i>
                      <span>Vendor Master</span>
                    </a>
                  </li>
                  <br>
                  <li class="treeview">
                      <a href="<?php echo base_url()?>userListing" >
                        <i class="fa fa-user"></i>
                      <span>Employee Master</span>
                    </a>
                  </li>
                  <br>
                </ul>
              </div>
            </li>

            <?php
            }
            ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
