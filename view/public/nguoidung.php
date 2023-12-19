<?php
// var_dump($_SESSION['khach_hang']);
// var_dump($lichsuve); 
?>
<section class="speaker-banner bg_img" data-background="assets/images/banner/banner07.jpg">
    <div class="container">
        <div class="speaker-banner-content">
            <h2 class="title">Profile</h2>
        </div>
    </div>
</section>
<section class="speaker-single padding-top pt-lg-0">
    <div class="container">
        <div class="speaker-wrapper bg-six padding-top padding-bottom">
            <div class="speaker-content">
                <div class="author">
                    <h5 class="title"><?php echo $_SESSION['khach_hang']['email'] ?></h5>
                </div>
                <div class="speak-con-wrapper">
                    <div class="speak-con-area">
                        <div class="item">
                            <div class="item-thumb">
                                <i class="fa-regular fa-address-card fa-2xl"></i>
                            </div>
                            <div class="item-content">
                                <span class="up">Thông tin liên hệ:</span>
                                <a href="MailTo:hello@Boleto .com"><?php echo $_SESSION['khach_hang']['email'] ?></a>
                            </div>
                            <div class="item-content">
                                <a style="margin-left: 42px;" href="index.php?act=doimk">Đổi mật khẩu</a>
                            </div>
                        </div>
                        <ul class="social-icons">
                            <li>
                                <a href="#0">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0" class="active">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="fab fa-behance"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="content">
                    <h3 class="subtitle">Lịch Sử Đặt Vé</h3>
                    <div class="table-responsive">
                        <table style="color: #ffffff;" class="table">
                            <tr class="thead-light">
                                <th scope="col">Khách hàng</th>
                                <th scope="col">Tên phim</th>
                                <th scope="col">Ghế</th>
                                <th scope="col">Phòng</th>
                                <th scope="col">Ngày chiếu</th>
                                <th scope="col">Giờ chiếu</th>
                                <th scope="col">Tổng giá</th>
                                <th scope="col">Trạng thái</th>
                            </tr>

                            <?php foreach ($lichsuve as $ve) : ?>
                            <?php
                                $timestamp = strtotime($ve['ngay_chieu']);
                                $fm_date = date("d/m/Y", $timestamp);
                                $fm_tonggia = number_format($ve['tong_tien'], 0, ',', '.');
                                ?>
                            <tr>
                                <td><?= $ve['email'] ?></td>
                                <td><?= $ve['ten_phim'] ?></td>
                                <td><?= $ve['ds_ghe'] ?></td>
                                <td><?= $ve['ten_phong'] ?></td>
                                <td><?= $fm_date ?></td>
                                <td><?= $ve['gio_chieu'] ?> Giờ</td>
                                <td><?= $fm_tonggia ?> VND</td>
                                <td><?= ($ve['trang_thai'] == 1) ? "Đã thanh toán" : "Chưa thanh toán" ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
</section>