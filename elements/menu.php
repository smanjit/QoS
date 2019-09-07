<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center"><a href="./" class="logo"><span>GMT</span>Checker</a> <a href="./" class="logo-sm"><span>GMT</span></a>
                    <!--<a href="./" class="logo"><img src="assets/images/logo_white_2.png" height="28"></a>-->
                    <!--<a href="./" class="logo-sm"><img src="assets/images/logo_sm.png" height="36"></a>--></div>
            </div>
            <!-- Button mobile view to collapse sidebar menu -->
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect"><i class="mdi mdi-menu"></i></button>
                        </li>
                        <li class="hide-phone app-search float-left">
                            
                        </li>
                    </ul>
                    <ul class="nav navbar-right float-right list-inline">
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="assets/images/users/avatar-1.jpg" alt="user-img" class="rounded-circle"> <span class="profile-username"><?php echo $_SESSION['user'] ?><br></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)" class="dropdown-item">Profile</a></li>
                                <li><a href="javascript:void(0)" class="dropdown-item"><span class="badge badge-success float-right">5</span> Settings</a></li>
                                <li><a href="javascript:void(0)" class="dropdown-item">Lock screen</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a href="./signout" class="dropdown-item">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Top Bar End -->