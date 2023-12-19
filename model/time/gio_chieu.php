<?php
// thêm giờ chiếu
function add_showtime($giochieu, $id_ngaychieu, $id_phim, $id_phong)
{
    $sql = "insert into gio_chieu(gio_chieu, id_ngaychieu, id_phim, id_phong) value(?, ?, ?, ?)";
    pdo_execute($sql, $giochieu, $id_ngaychieu, $id_phim,  $id_phong);
}
//update giờ chiếu
function update_showtime($giochieu, $id_ngaychieu, $id_phim, $id_phong, $id_giochieu)
{
    $sql = "update gio_chieu set gio_chieu = ?, id_ngaychieu = ?, id_phim = ?, id_phong = ? where id_giochieu = ?";
    pdo_execute($sql, $giochieu, $id_ngaychieu, $id_phim, $id_phong, $id_giochieu);
}
//xoá giờ chiếu
function delete_showtime($id_giochieu)
{
    $id_dd = $_GET['id_giochieu'];
    $sql = "delete from gio_chieu where id_giochieu =?";
    pdo_execute($sql, $id_giochieu);
}
// list giờ chiếu
function list_showtime($timgioc = "")
{
    $sql = "select gio_chieu.*, ngay_chieu.ngay_chieu as ngay_chieu, 
    phim.ten_phim as ten_phim, phong.ten_phong as ten_phong from gio_chieu 
    join ngay_chieu on gio_chieu.id_ngaychieu = ngay_chieu.id_ngaychieu 
    join phim on gio_chieu.id_phim = phim.id_phim 
    join phong on gio_chieu.id_phong = phong.id_phong";
    if ($timgioc != "") {
        $sql .= " where gio_chieu.gio_chieu like '%" . $timgioc . "%'";
    }
    $list_showtime = pdo_query($sql);
    return $list_showtime;
}
//load 1
function one_showtime($id_giochieu)
{
    $sql = "select * from gio_chieu where id_giochieu =?";
    $one_showtime = pdo_query_one($sql, $id_giochieu);
    return $one_showtime;
}

function time_of_phim($id_ngaychieu, $id_phim)
{
    $sql = "select * from gio_chieu where id_ngaychieu = ? and id_phim = ?";
    $time_of_phim = pdo_query($sql, $id_ngaychieu, $id_phim);
    return $time_of_phim;
}
