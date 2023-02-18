<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Tentex</title>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="admin/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="admin/plugins/fontawesome/css/all.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="admin/plugins/select2/css/select2.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="admin/plugins/datatables/datatables.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="admin/css/style.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="admin/css/bootstrap-datetimepicker.min.css">

    <!-- Full Calander CSS -->
    <link rel="stylesheet" href="admin/plugins/fullcalendar/fullcalendar.min.css">



    <!--[if lt IE 9]>
   <script src="assets/js/html5shiv.min.js"></script>
   <script src="assets/js/respond.min.js"></script>
  <![endif]-->
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="#" class="logo">
                    <h2 style="text-shadow:1px 1px 1px grey;" class="p-1 text-info">TENTEX</h2>
                </a>
                

            </div>
            <!-- /Logo -->

            <!-- Sidebar Toggle -->
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-bars"></i>
            </a>
            <!-- /Sidebar Toggle -->

            <!-- Search -->
            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <!-- /Search -->

            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->

            <!-- Header Menu -->
            <ul class="nav nav-tabs user-menu">

                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow main-drop">
                    ◢<a href="#" class="dropdown-toggle nav-link bg-dark m-3" data-bs-toggle="dropdown">

                        <span class="text-white"> <i class="fa fa-user"></i> Admin</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i data-feather="user" class="me-1"></i>
                            {{ Session()->get('admin_name') }}</a>
                        <a class="dropdown-item" href="{{ url('/admin-dashboard') }}"><i data-feather="settings"
                                class="me-1"></i>
                            Dashboard</a>
                        <a class="dropdown-item" href="{{ url('/admin-logout') }}"><i data-feather="log-out"
                                class="me-1"></i>
                            Logout</a>
                    </div>
                </li>
                <!-- /User Menu -->

            </ul>
            <!-- /Header Menu -->

        </div>
        <!-- /Header -->

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title"><span>Main</span></li>
                        <li class="active">
                            <a href="{{ url('/admin-dashboard') }}"><i data-feather="home"></i>
                                <span>Dashboard</span></a>
                        </li>

                        <li>
                            <a href="{{ url('/all-user') }}"><i data-feather="users"></i> <span>All Users</span></a>
                        </li>

                        <li class="submenu">
                            <a href="#"><i data-feather="grid"></i><span>Category</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('/create-category') }}">Add Category</a></li>
                                <li><a href="{{ url('/categories/') }}">View Category</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i data-feather="grid"></i> <span>Sub Category</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('/create-subcategory') }}">Add Sub-Category</a></li>
                                <li><a href="{{ url('/subcategories/') }}">View Sub-Category</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#"><i data-feather="grid"></i> <span>Products</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('/create-product') }}">Add Product</a></li>
                                <li><a href="{{ url('/products/') }}">View Product</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fa fa-envelope"></i> <span> All Messages</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('/show-message') }}">Client Message</a></li>
                            </ul>
                        </li>


                        <li class="submenu">
                            <a href="#"><i class="fa fa-fax"></i> <span>Banner Section</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('/create-banner') }}">Add Banner</a></li>
                                <li><a href="{{ url('/banners/') }}">All Banners</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-cart-arrow-down"></i> <span>Client Orders</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('/show-order') }}">All Orders</a></li>
                            </ul>
                        </li>




                        <li class="submenu">
                            <a href="#"><i class="fa fa-fax"></i> <span>Blogs</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('/blog-create') }}">Add Blog</a></li>
                                <li><a href="{{ url('/blogs') }}">Our Blogs</a></li>
                            </ul>
                        </li>


                        <li class="submenu">
                            <a href="#"><i class="fa fa-tasks"></i> <span>FaQs</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('/faq-create') }}">Add faqs</a></li>
                                <li><a href="{{ url('/faqs') }}">All faqs</a></li>
                            </ul>
                        </li>





                        <li class="menu-title">
                            <span>Pages</span>
                        </li>


                        <li class="submenu">
                            <a href="#"><i data-feather="layout"></i> <span> Dealing Product</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('/products/') }}">Our Products</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->

        @yield('admin_content')

        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin/js/jquery-3.6.0.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="admin/js/popper.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>

    <!-- Feather Icon JS -->
    <script src="admin/js/feather.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="admin/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Select2 JS -->
    <script src="admin/plugins/select2/js/select2.min.js"></script>

    <!-- Datepicker Core JS -->
    <script src="admin/plugins/moment/moment.min.js"></script>
    <script src="admin/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Datatables JS -->
    <script src="admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/plugins/datatables/datatables.min.js"></script>

    <!-- Chart JS -->
    <script src="admin/plugins/apexchart/apexcharts.min.js"></script>
    <script src="admin/plugins/apexchart/chart-data.js"></script>

    <!-- Custom JS -->
    <script src="admin/js/script.js"></script>



    <!-- Full Calendar JS -->
    <script src="admin/js/jquery-ui.min.js"></script>
    <script src="admin/plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="admin/plugins/fullcalendar/jquery.fullcalendar.js"></script>

</body>

</html>
