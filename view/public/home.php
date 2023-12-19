<?php
// var_dump($_SESSION['khach_hang']);
?>
<section style="margin-top: 30px;" class="movie-section padding-top padding-bottom bg-two">
    <div class="container">
        <div class="row flex-wrap-reverse justify-content-center">
            <div class="col-lg-3 col-sm-10  mt-50 mt-lg-0">
                <div style="display: none;" class="widget-1 widget-facility">
                    <div class="widget-1-body">
                        <ul>
                            <li>
                                <a href="#0">
                                    <span class="img"><img src="assets/images/sidebar/icons/sidebar01.png" alt="sidebar"></span>
                                    <span class="cate">24X7 Care</span>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <span class="img"><img src="assets/images/sidebar/icons/sidebar02.png" alt="sidebar"></span>
                                    <span class="cate">100% Assurance</span>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <span class="img"><img src="assets/images/sidebar/icons/sidebar03.png" alt="sidebar"></span>
                                    <span class="cate">Our Promise</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div style="display: none;" class="widget-1 widget-banner">
                    <div class="widget-1-body">
                        <a href="#0">
                            <img src="assets/images/sidebar/banner/banner01.jpg" alt="banner">
                        </a>
                    </div>
                </div>
                <div class="widget-1 widget-trending-search">
                    <h3 class="title">CATEGORY</h3>
                    <div class="widget-1-body">
                        <ul>
                            <?php foreach ($list_loai as $loai) : ?>
                                <?php extract($loai);
                                $link = "index.php?act=listphim&id_ctg=" . $id_loai;
                                ?>
                                <li>
                                    <h6 class="sub-title">
                                        <a href="<?= $link ?>"><?= $ten_loai ?></a>
                                    </h6>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="widget-1 widget-banner">
                    <div class="widget-1-body">
                        <a href="#0">
                            <img src="https://plus.unsplash.com/premium_photo-1682146739433-5926577acb7a?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="article-section padding-bottom">
                    <div class="section-header-1">
                        <h2 class="title">MOVIES HOT</h2>
                    </div>
                    <div class="row mb-30-none justify-content-center">
                        <?php foreach ($phim_hot as $top3) : ?>
                            <?php extract($top3);
                            $link_phim = "index.php?act=ctphim&id_phim=" . $id_phim;
                            ?>
                            <div class="col-sm-6 col-lg-4">
                                <div class="movie-grid">
                                    <div class="movie-thumb c-thumb">
                                        <a href="#0">
                                            <img style="width: 260px; height: 360px; object-fit: cover;" src="upload/<?= $anh ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="movie-content bg-one">
                                        <h6 class="title m-0">
                                            <a style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" href="<?= $link_phim ?>"><?= $ten_phim ?></a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="article-section padding-bottom">
                    <div class="section-header-1">
                        <h2 class="title">MOVIES</h2>
                        <a class="view-all" href="index.php?act=listphim">View All</a>
                    </div>
                    <div class="row mb-30-none justify-content-center">
                        <?php foreach ($phim_3 as $listh) : ?>
                            <?php extract($listh);
                            $link_phim = "index.php?act=ctphim&id_phim=" . $id_phim;
                            ?>
                            <div class="col-sm-6 col-lg-4">
                                <div class="event-grid">
                                    <div class="movie-thumb c-thumb">
                                        <a href="#0">
                                            <img style="width: 260px; height: 360px; object-fit: cover;" src="upload/<?= $anh ?>" alt="event">
                                        </a>
                                    </div>
                                    <div class="movie-content bg-one">
                                        <h5 class="title m-0">
                                            <a href="<?= $link_phim ?>"><?= $ten_phim ?></a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Movie-Main-Section========== -->