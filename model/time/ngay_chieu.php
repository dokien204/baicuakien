<?php
// thêm ngày chiếu
function add_showdate($ngay_chieu, $id_phim, $id_rap, $id_phong)
{
    $sql = "insert into ngay_chieu(ngay_chieu, id_phim, id_rap, id_phong) value(?, ?, ?, ?)";
    pdo_execute($sql, $ngay_chieu, $id_phim, $id_rap, $id_phong);
}
//update ngày chiếu
function update_showdate($ngay_chieu, $id_phim, $id_rap, $id_phong, $id_ngaychieu)
{
    $sql = "update ngay_chieu set ngay_chieu = ?, id_phim = ?, id_rap = ?, id_phong = ? where id_ngaychieu = ?";
    pdo_execute($sql, $ngay_chieu, $id_phim, $id_rap, $id_phong, $id_ngaychieu);
}
//xoá ngày chiếu
function delete_showdate($id_ngaychieu)
{
    $sql = "delete from ngay_chieu where id_ngaychieu =?";
    pdo_execute($sql, $id_ngaychieu);
}
// list ngày chiếu
function list_showdate($timngayc = "")
{
    $sql = "select ngay_chieu.*, phim.ten_phim as ten_phim, rap.ten_rap as ten_rap, 
    phong.ten_phong as ten_phong from ngay_chieu
     join phim on phim.id_phim = ngay_chieu.id_phim  
    join rap on rap.id_rap = ngay_chieu.id_rap 
    join phong on phong.id_phong = ngay_chieu.id_phong";
    if ($timngayc != "") {
        $sql .= " where ngay_chieu like '%" . $timngayc . "%'";
    }
    $sql .= " order by ngay_chieu.id_ngaychieu desc";
    $list_showdate = pdo_query($sql);
    return $list_showdate;
}
//load 1
function one_showdate($id_ngaychieu)
{
    $sql = "select * from ngay_chieu where id_ngaychieu =?";
    $one_showdate = pdo_query_one($sql, $id_ngaychieu);
    return $one_showdate;
}

function date_of_rap($id_rap, $id_phim)
{
    $sql = "select * from ngay_chieu where id_rap = ? and id_phim = ?";
    $date_of_phim = pdo_query($sql, $id_rap, $id_phim);
    return $date_of_phim;
}
