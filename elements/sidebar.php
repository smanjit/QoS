<!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <div class="user-details">
                    <div class="text-center"><img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle"></div>
                    <div class="user-info">
                        <div class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['user'] ?></a>
                            <ul class="dropdown-menu">
                                
                                <li class="dropdown-divider"></li>
                                <li><a href="./signout" class="dropdown-item">Logout</a></li>
                            </ul>
                        </div>
                        <p class="text-muted m-0"><i class="far fa-dot-circle text-primary"></i> Online</p>
                    </div>
                </div>
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>
                        <li><a href="./" class="waves-effect"><i class="mdi mdi-home"></i><span> Display <span class="badge badge-primary float-right"></span></span></a></li>
                        <li class="has_sub"><a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-album"></i> <span>ADD Interface </span><span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="./addspeaker">ADD Speaker</a></li>
                                <li><a href="./addrword">ADD Repeated words</a></li>
                                
                            </ul>
                        </li>
                        <li class="has_sub"><a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-opacity"></i> <span>DELETE Interface </span><span class="float-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="icons-material.html">Delete Event</a></li>
                                <li><a href="icons-ion.html">Delete Speaker</a></li>
                                <li><a href="icons-fontawesome.html">Delete repeated Words</a></li>
                            </ul>
                        </li>
                        <!--<li class="has_sub">-->
                        <!--<a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-share-variant"></i><span>Multi Menu </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>-->
                        <!--<ul>-->
                        <!--<li class="has_sub">-->
                        <!--<a href="javascript:void(0);" class="waves-effect"><span>Menu Item 1.1</span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>-->
                        <!--<ul style="">-->
                        <!--<li><a href="javascript:void(0);"><span>Menu Item 2.1</span></a></li>-->
                        <!--<li><a href="javascript:void(0);"><span>Menu Item 2.2</span></a></li>-->
                        <!--</ul>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--<a href="javascript:void(0);"><span>Menu Item 1.2</span></a>-->
                        <!--</li>-->
                        <!--</ul>-->
                        <!--</li>-->
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->