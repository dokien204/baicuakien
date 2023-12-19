<?php
function all_ve()
{
    $sql = "select ve.*, khach_hang.email as email, gio_chieu.gio_chieu as gio_chieu, ngay_chieu.ngay_chieu as ngay_chieu, phim.ten_phim as ten_phim, phong.ten_phong as ten_phong from gio_chieu 
    join ve on ve.id_giochieu = gio_chieu.id_giochieu 
    join khach_hang on khach_hang.id_kh = ve.id_kh 
    join ngay_chieu on ngay_chieu.id_ngaychieu = gio_chieu.id_ngaychieu 
    join phim on phim.id_phim = gio_chieu.id_phim 
    join phong on phong.id_phong = gio_chieu.id_phong order by ve.id_ve desc";
    $list_ve = pdo_query($sql);
    return $list_ve;
}

// select vé theo người dùng
function ve_one_kh($id_kh)
{
    $sql = "select ve.*, khach_hang.id_kh as id_kh, khach_hang.email as email, gio_chieu.gio_chieu as gio_chieu,  phim.ten_phim as ten_phim, phong.ten_phong as ten_phong, ngay_chieu.ngay_chieu as ngay_chieu from ve 
    join khach_hang on khach_hang.id_kh = ve.id_kh 
    join gio_chieu on gio_chieu.id_giochieu = ve.id_giochieu 
    join phim on phim.id_phim = gio_chieu.id_phim 
    join phong on phong.id_phong = gio_chieu.id_phong 
    join ngay_chieu on ngay_chieu.id_ngaychieu = gio_chieu.id_ngaychieu 
    where ve.id_kh = ?";
    $list_ve_kh = pdo_query($sql, $id_kh);
    return $list_ve_kh;
}

function one_ve($id_ve)
{
    $sql = "select ve.*, khach_hang.email as email, gio_chieu.gio_chieu as gio_chieu, ngay_chieu.ngay_chieu as ngay_chieu, phim.ten_phim as ten_phim, phong.ten_phong as ten_phong from gio_chieu 
    join ve on ve.id_giochieu = gio_chieu.id_giochieu 
    join khach_hang on khach_hang.id_kh = ve.id_kh 
    join ngay_chieu on ngay_chieu.id_ngaychieu = gio_chieu.id_ngaychieu 
    join phim on phim.id_phim = gio_chieu.id_phim 
    join phong on phong.id_phong = gio_chieu.id_phong 
    where id_ve = ?";
    $one_ve = pdo_query_one($sql, $id_ve);
    return $one_ve;
}

function update_ve($id_ve)
{
    $sql = "update ve set trang_thai = 1 where id_ve = ?";
    pdo_execute($sql, $id_ve);
}

function ve_da_thanhtoan()
{
    $sql = "select ve.*, khach_hang.email as email, phim.ten_phim, gio_chieu.gio_chieu, 
    (select avg(tong_tien) from ve where trang_thai = 1) as tb_giave, 
    (select sum(tong_tien) from ve where trang_thai = 1) as tong_tien_ve 
    from ve 
    join khach_hang on khach_hang.id_kh = ve.id_kh 
    join gio_chieu on gio_chieu.id_giochieu = ve.id_giochieu 
    join phim on phim.id_phim = gio_chieu.id_phim 
    where ve.trang_thai = 1 group by ve.id_ve";
    $ve = pdo_query($sql);
    return $ve;
}

function ve_ch_thanhtoan()
{
    $sql = "select ve.*, khach_hang.email as email, phim.ten_phim, gio_chieu.gio_chieu, 
    (select avg(tong_tien) from ve where trang_thai = 0) as tb_giave_chtt, 
    (select sum(tong_tien) from ve where trang_thai = 0) as tong_tien_ve_chtt 
    from ve 
    join khach_hang on khach_hang.id_kh = ve.id_kh 
    join gio_chieu on gio_chieu.id_giochieu = ve.id_giochieu 
    join phim on phim.id_phim = gio_chieu.id_phim 
    where ve.trang_thai = 0 group by ve.id_ve";
    $ve = pdo_query($sql);
    return $ve;
}

function tk_ve($email)
{
    $sql = "SELECT ve.*, khach_hang.email AS email, gio_chieu.gio_chieu AS gio_chieu, ngay_chieu.ngay_chieu AS ngay_chieu, phim.ten_phim AS ten_phim, phong.ten_phong AS ten_phong 
    FROM gio_chieu 
    JOIN ve ON ve.id_giochieu = gio_chieu.id_giochieu 
    JOIN khach_hang ON khach_hang.id_kh = ve.id_kh 
    JOIN ngay_chieu ON ngay_chieu.id_ngaychieu = gio_chieu.id_ngaychieu 
    JOIN phim ON phim.id_phim = gio_chieu.id_phim 
    JOIN phong ON phong.id_phong = gio_chieu.id_phong 
    WHERE khach_hang.email = ?";
    $list_ve = pdo_query($sql, $email);
    return $list_ve;
}
