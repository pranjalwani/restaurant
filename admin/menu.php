<?php

$url="http://localhost/restorrent/admin/";

?>

<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="index.html"><b>
                    <img src="<?php echo $url?>plugins/images/eliteadmin-logo.png" alt="home" class="dark-logo" />
                    <img src="<?php echo $url?>plugins/images/eliteadmin-logo-dark.png" alt="home" class="light-logo" /></b><span class="hidden-xs">
                    <img src="<?php echo $url?>plugins/images/eliteadmin-text.png" alt="home" class="dark-logo" />
                    <img src="<?php echo $url?>plugins/images/eliteadmin-text-dark.png" alt="home" class="light-logo" /></span></a>
                </div>
               
                <ul class="nav navbar-top-links navbar-right pull-right">                   
                    <!-- .Megamenu -->
                    <li class="mega-dropdown">
                        <li><a href="<?php echo $url?>system/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>                        
                    </li>                    
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div><img src="<?php echo $url?>plugins/images/users/niku.jpg" alt="user-img" class="img-circle"></div>
                        <a href="#">Admin Panel</a>
                    </div>
                </div>
                <ul class="nav" id="side-menu">                    
                    <li class="nav-small-cap m-t-10">Main Menu</li>
                    <li>
                        <a href="<?php echo $url?>welcome/welcome.php" class="waves-effect">
                            <i class="icon-book-open"> </i><span class="hide-menu"> Orders</span>
                        </a> 
                    </li>
                    <li>
                        <a href="<?php echo $url?>user/user.php" class="waves-effect">
                            <i class="icon-people"> </i><span class="hide-menu"> Users</span>
                        </a> 
                    </li>
                    <li>
                        <a href="<?php echo $url?>contact/contact.php" class="waves-effect">
                            <i data-icon="&#xe00a;" class="linea-icon icon-paper-plane fa-fw"></i> <span class="hide-menu">Contact</span>
                        </a> 
                    </li>
                    <li>
                        <a href="<?php echo $url?>system/logout.php" class="waves-effect">
                            <i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span>
                        </a>
                    </li>                
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->