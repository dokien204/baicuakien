<?php
function add_ve($ds_ghe, $id_kh, $id_giochieu, $ngay_dat, $tong_tien, $qr, $trang_thai = 1)
{
    $sql = "insert into ve (ds_ghe, id_kh, id_giochieu, ngay_dat, tong_tien, qr, trang_thai) values (?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $ds_ghe, $id_kh, $id_giochieu, $ngay_dat, $tong_tien, $qr, $trang_thai);
}
