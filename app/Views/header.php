<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($_SESSION['admin'])) : ?>
        <!-- <link rel="shortcut icon" type="image/png" href="<?= APPURL ?>public/images/logos/favicon.png" /> -->
        <link rel="stylesheet" href="<?= APPURL ?>public/css/styles.min.css" />
    <?php else : ?>
        <link rel="stylesheet" href="<?= APPURL ?>public/css/bootstrap.min.css">
    <?php endif; ?>
    <title>Document</title>
</head>

<body>
    <?php if (isset($_SESSION['admin'])) : ?>
        <!--  Body Wrapper -->
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
            <!-- Sidebar Start -->
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div>
                    <div class="brand-logo d-flex align-items-center justify-content-between">
                        <a href="<?= APPURL ?>admin/index" class="text-nowrap logo-img">TSHOP</a>
                        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                            <i class="ti ti-x fs-8"></i>
                        </div>
                    </div>
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                        <ul id="sidebarnav">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="<?= APPURL ?>admin/index" aria-expanded="false">
                                    <span class="hide-menu">Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="<?= APPURL ?>admin/user" aria-expanded="false">
                                    <span class="hide-menu">Tài khoản</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="<?= APPURL ?>admin/category" aria-expanded="false">
                                    <span class="hide-menu">Danh mục</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="<?= APPURL ?>admin/bill" aria-expanded="false">
                                    <span class="hide-menu">Đơn hàng</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="<?= APPURL ?>admin/product" aria-expanded="false">
                                    <span class="hide-menu">Sản phẩm</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="<?= APPURL ?>admin/voucher" aria-expanded="false">
                                    <span class="hide-menu">Mã giảm giá</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </aside>
            <!--  Sidebar End -->
            <!--  Main wrapper -->
            <div class="body-wrapper">
                <!--  Header Start -->
                <header class="app-header">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                                <li class="nav-item dropdown">
                                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="<?= APPURL ?>public/img/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                        <div class="message-body">
                                            <a href="<?= APPURL ?>admin/logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <!--  Header End -->
            <?php else : ?>
                <!-- Phần header -->
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
                            <ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?= APPURL ?>">TShop</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="<?= APPURL ?>page/index">Trang chủ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="product" href="<?= APPURL ?>page/product">Sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="about" href="<?= APPURL ?>page/about">Về chúng tôi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="contact" href="<?= APPURL ?>page/contact">Liên hệ</a>
                                </li>
                            </ul>
                            <form class="d-flex" action="<?= APPURL ?>page/search" method="POST">
                                <input class="form-control me-2" style="width: 500px;" type="text" name="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                            <ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="page" href="<?= APPURL ?>product/cart">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                        </svg>
                                        Giỏ Sách
                                    </a>
                                </li>
                                <li class="nav-item dropdown ">
                                    <?php if (!isset($_SESSION['user'])) : ?>
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Tài khoản,
                                        </a>
                                        <ul class="dropdown-menu end-0" style="left:auto">
                                            <li><a class="dropdown-item" href="<?= APPURL ?>user/login">Đăng nhập</a></li>
                                            <li><a class="dropdown-item" href="<?= APPURL ?>user/resign">Đăng ký</a></li>
                                            <!-- <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Đăng xuất</a></li> -->
                                        </ul>
                                    <?php else : ?>
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Tài khoản,<?= $_SESSION['user']['HoTen'] ?>
                                        </a>
                                        <ul class="dropdown-menu end-0" style="left:auto">
                                            <li><a class="dropdown-item" href="<?= APPURL ?>user/info">Thông tin tài khoản</a></li>
                                            <li><a class="dropdown-item" href="<?= APPURL ?>order/infoBill">Thông tin đơn hàng</a></li>
                                            <hr>
                                            <li><a class="dropdown-item" href="<?= APPURL ?>user/logout">Đăng xuất</a></li>
                                            <!-- <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Đăng xuất</a></li> -->
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Phần header -->

                <!-- Phần Slider -->
                <?php if ($viewName == 'home') : ?>
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?= APPURL ?>public/img/banner1.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= APPURL ?>public/img/banner2.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= APPURL ?>public/img/banner3.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                <?php endif; ?>
                <!-- EndPhần Slider -->
            <?php endif; ?>













