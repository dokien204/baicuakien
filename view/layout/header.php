<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title><?= $title ?? "" ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css?ver=<?= rand() ?>">
    <link rel="stylesheet" href="assets/css/all.min.css?ver=<?= rand() ?>">
    <link rel="stylesheet" href="assets/css/ghe.css?ver=<?= rand() ?>">
    <link rel="stylesheet" href="assets/css/animate.css?ver=<?= rand() ?>">
    <link rel="stylesheet" href="assets/css/flaticon.css?ver=<?= rand() ?>">
    <link rel="stylesheet" href="assets/css/magnific-popup.css?ver=<?= rand() ?>">
    <link rel="stylesheet" href="assets/css/odometer.css?ver=<?= rand() ?>">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css?ver=<?= rand() ?>">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css?ver=<?= rand() ?>">
    <link rel="stylesheet" href="assets/css/nice-select.css?ver=<?= rand() ?>">
    <link rel="stylesheet" href="assets/css/jquery.animatedheadline.css?ver=<?= rand() ?>">
    <link rel="stylesheet" href="assets/css/main.css?ver=<?= rand() ?>">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js?ver=<?= rand() ?>"></script>
    <script>
    $(document).ready(function() {
        $(".header-button.user").click(function() {
            $(".user-Information").toggleClass("active");
        });
    });
    </script>
</head>
<style>
/* .header-wrapper {
        position: relative;
    } */
.user-Information {
    position: absolute;
    transform: translateY(-100%);
    background-image: -webkit-linear-gradient(169deg, #5560ff 17%, #aa52a1 63%, #ff4343 100%);
    border-radius: 10px;
    opacity: 0;
    transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
    right: 0;
}

.user-Information.active {
    transform: translateY(100%);
    opacity: 1;
}

.user-Information li {
    list-style: none;
    margin: 10px 30px;
    color: white;
}

.user-Information li:hover {
    text-decoration: underline;
}
</style>

<body>
    <!-- ==========Preloader========== -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ==========Preloader========== -->
    <!-- ==========Overlay========== -->
    <div class="overlay"></div>
    <a href="#0" class="scrollToTop">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- ==========Overlay========== -->

    <!-- ==========Header-Section========== -->
    <header class="header-section">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="index.php">
                        <img style="width: 170px; height: 80px; object-fit: cover;" src="assets/images/logo/logoquy.png"
                            alt="logo">
                    </a>
                </div>
                <ul class="menu">
                    <li>
                        <a href="index.php" class="active">Home</a>
                    </li>
                    <li>
                        <a href="index.php?act=listphim">movies</a>
                    </li>
                    <?php
                    if (isset($_SESSION['khach_hang'])) { ?>
                    <li class="header-button pr-0  user">
                        <a><i class="fa-regular fa-user" style="color: #ffffff;"></i></a>
                    </li>
                    <div class="user-Information">
                        <li>
                            <a href="index.php?act=nguoidung">Thông Tin Người dùng</a>
                        </li>
                        <li>
                            <a href="index.php?act=logout">Logout</a> <!-- Thêm liên kết Logout -->
                        </li>
                    </div>
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <?php } elseif (isset($_SESSION['admin'])) { ?>
                    <li class="header-button pr-0  user">
                        <a><i class="fa-regular fa-user" style="color: #ffffff;"></i></a>
                    </li>
                    <div class="user-Information">
                        <li>
                            <a href="index.php?act=admin">Đăng nhập admin</a>
                        </li>
                        <li>
                            <a href="index.php?act=logout">Logout</a>
                        </li>
                    </div>
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <?php } else { ?>
                    <li class="header-button pr-0 ">
                        <a href="index.php?act=sign-in">join us</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </header>