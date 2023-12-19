<section class="movie-section padding-top padding-bottom">
    <div class="container">
        <div class="row flex-wrap-reverse justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-3">
                <div class="widget-1 widget-check">
                    <div class="widget-1-body">
                        <h6 class="subtitle">Category</h6>
                        <div class="check-area">
                            <?php foreach ($list_loai as $loai) : ?>
                                <?php extract($loai);
                                $link = "index.php?act=listphim&id_ctg=" . $id_loai;
                                ?>
                                <div class="form-group">
                                    <a style="color: #ffffff;" href="<?= $link ?>"><?= $ten_loai ?></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
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
            <div class="col-lg-9 mb-50 mb-lg-0">
                <div class="filter-tab tab">
                    <div class="filter-area">
                        <div class="filter-main">
                            <ul class="grid-button tab-menu">
                                <li>
                                    <i class="fas fa-th"></i>
                                </li>
                                <li class="active">
                                    <i class="fas fa-bars"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-area">
                        <div class="tab-item">
                            <div class="row mb-10 justify-content-center">
                                <?php foreach ($list_phim as $phim) : ?>
                                    <?php extract($phim);
                                    $link_phim = "index.php?act=ctphim&id_phim=" . $id_phim;
                                    ?>
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="movie-grid">
                                            <div class="movie-thumb c-thumb">
                                                <a href="#0">
                                                    <img style="object-fit: cover;" src="upload/<?= $anh ?>" alt="">
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
                        <div class="tab-item active">
                            <div class="movie-area mb-10">
                                <?php foreach ($list_phim as $phim) : ?>
                                    <?php extract($phim);
                                    $link_phim = "index.php?act=ctphim&id_phim=" . $id_phim;
                                    ?>
                                    <div class="movie-list">
                                        <div class="movie-thumb c-thumb">
                                            <a href="#0" class="w-100 bg_img h-100" data-background="upload/<?= $anh ?>">
                                                <img class="d-sm-none" src="upload/<?= $anh ?>" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content bg-one">
                                            <h5 class="title">
                                                <a href="<?= $link_phim ?>"><?= $ten_phim ?></a>
                                            </h5>
                                            <p class="duration"><?= $thoi_luong ?> Phút</p>
                                            <div class="movie-tags">
                                                <a href="#0"><?= $ten_loai ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>