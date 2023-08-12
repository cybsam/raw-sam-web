</head>
<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">SAM WEB</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="setting.user.php">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="log-out.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Blog Post
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavPostAccordion">
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postPageCollapse" aria-expanded="false" aria-controls="postPageCollapse">
                                            Blog Pages
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="postPageCollapse" aria-labelledby="headingOne" data-parent="#sidenavPostAccordion">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="blog.page.php">Blog</a>
                                                <a class="nav-link" href="blog.new.php">New Blog</a>
                                                <a class="nav-link" href="blog.trash.php">Trash</a>
                                            </nav>
                                        </div>

                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#catePageCollapse" aria-expanded="false" aria-controls="postPageCollapse">
                                            Category Pages
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="catePageCollapse" aria-labelledby="headingOne" data-parent="#sidenavPostAccordion">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="category.page.php">Category</a>
                                                <?php if ($_SESSION['user_status']==1) { ?>
                                                <a class="nav-link" href="category.trash.php">Category Trash</a>
                                                <?php } ?>
                                            </nav>
                                        </div>
                                        
                                    </nav>
                                </div>
                                <!-- start -->
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collaspseSiteinfo" aria-expanded="false" aria-controls="collaspseSiteinfo">
                                    <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                                    Information
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collaspseSiteinfo" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavPostAccordion">
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#siteContact" aria-expanded="false" aria-controls="postPageCollapse">
                                            Site Contact
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="siteContact" aria-labelledby="headingOne" data-parent="#sidenavPostAccordion">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="title.php">Blog</a>
                                                <a class="nav-link" href="blog.new.php">New Blog</a>
                                                
                                            </nav>
                                        </div>

                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#catePageCollapse" aria-expanded="false" aria-controls="postPageCollapse">
                                            Additional Info
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="catePageCollapse" aria-labelledby="headingOne" data-parent="#sidenavPostAccordion">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="additional.view.php">Title & footer</a>
                                                
                                            </nav>
                                        </div>
                                    </nav>
                                </div>
                                <!-- end -->
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Auth Pages
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"><i class="fa fa-users "></i> &nbsp;
                                            Authentication
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="users.all.php">Users List</a>
                                                <?php if ($_SESSION['user_status']==1) { ?>
                                                    <a class="nav-link" href="users.new.php">Users Request</a>
                                                <?php } ?>
                                                
                                                <a class="nav-link" href="users.trash.php">Block Users</a>
                                                <?php if ($_SESSION['user_status']==1) { ?>
                                                    <a class="nav-link" href="users.reject.php">Reject Users</a>
                                                <?php } ?>
                                                
                                            </nav>
                                        </div>
                                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                            Error
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="401.html">401 Page</a>
                                                <a class="nav-link" href="404.html">404 Page</a>
                                                <a class="nav-link" href="500.html">500 Page</a>
                                            </nav>
                                        </div>
                                    </nav>
                                </div>
                                <div class="sb-sidenav-menu-heading">Addons</div>
                                <a class="nav-link" href="charts.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Charts
                                </a>
                                <a class="nav-link" href="tables.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Tables
                                </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: <span style="color:red;"><?php echo $_SESSION['user_info']; ?></span></div>
                        SAM WEB
                    </div>
                </nav>
            </div>