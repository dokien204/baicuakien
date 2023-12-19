<section style="margin-bottom: 200px;" class="details-banner bg_img" data-background="assets/images/banner/banner03.jpg">
    <div class="container">
        <?php extract($one_phim);
        $timestamp = strtotime($ngay_chieu);
        $fm_date = date("d/m/Y", $timestamp);
        $fm_gia = number_format($gia_phim, 0, ',', '.');
        ?>
        <form action="index.php?act=movie-ticket-plan" class="details-banner-wrapper" method="post">
            <div class="details-banner-thumb">
                <img src="upload/<?= $anh ?>" alt="">
                <a href="<?= $trailer ?>" class="video-popup">
                    <img src="upload/<?= $anh ?>" alt="">
                </a>
            </div>

            <div class="details-banner-content offset-lg-3">
                <h3 class="title"><?= $ten_phim ?></h3>
                <input type="hidden" name="ten_phim" value="<?= $ten_phim ?>">
                <input type="hidden" name="id_phim" value="<?= $_GET['id_phim'] ?? "" ?>">
                <input type="hidden" name="id_phong" value="<?= $phong_of_phim['ten_phong'] ?? "" ?>">

                <div style="margin: 20px 0;" class="social-and-duration">
                    <div class="duration-area" style="margin-top:30px; display: flex; flex-direction: column; row-gap: 15px;">

                        <div class="item">
                            <p style="font-size: 18px;">Ngày chiếu: <?= $fm_date ?></p>
                        </div>

                        <div class="item">
                            <p style="font-size: 18px;">Giá phim: <?= $fm_gia ?> VND</p>
                        </div>

                        <div class="item">
                            <p style="font-size: 18px;">Thời lượng: <?= $thoi_luong ?> Phút</p>
                        </div>

                        <div class="item">
                            <p style="font-size: 18px;"><?= $mo_ta ?></p>
                        </div>

                    </div>
                </div>

                <button style="width: 100px; height: 50px; margin-top: 20px;" type="submit" class="btn btn-outline-success text-center">
                    Tiếp tục
                </button>
            </div>
        </form>
    </div>
</section>
<h3 style="margin-left:50px ;">Bình Luận</h3>
<hr>
<div style="margin: 50px 0;" id="commentList">
    <script>
        $(document).ready(function() {
            $("#commentList").load("view/public/binhluanform.php", {
                id_phim: <?= $id_phim ?>
            });
        });
    </script>

</div>