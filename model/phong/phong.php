<?php
// thêm phong
function add_phong($ten_phong, $id_phim, $id_rap)
{
    $sql = "insert into phong(ten_phong, id_phim, id_rap) values(?, ?, ?)";
    pdo_execute($sql, $ten_phong, $id_phim, $id_rap);
}
// update phong
function update_phong($ten_phong, $id_phim, $id_rap, $id_phong)
{
    $sql = "update phong set ten_phong = ?, id_phim = ?, id_rap = ? where id_phong = ?";
    pdo_execute($sql, $ten_phong, $id_phim, $id_rap, $id_phong);
}
// xoá phòng
function delete_phong($id_phong)
{
    $sql = "delete from phong where id_phong = ?";
    pdo_execute($sql, $id_phong);
}
// danh sách phòng
function list_phong($timphong = "")
{
    $sql = "select phong.*, phim.ten_phim as ten_phim, rap.ten_rap as ten_rap from phong 
    join phim on phong.id_phim = phim.id_phim 
    join rap on phong.id_rap = rap.id_rap";
    if ($timphong != "") {
        $sql .= " where phong.ten_phong like '%" . $timphong . "%'";
    }
    $sql .= " order by phong.id_phong desc";
    $list = pdo_query($sql);
    return $list;
}
// select 1 phòng theo id
function one_phong($id_phong)
{
    $sql = "select * from phong where id_phong = ?";
    $one_phong = pdo_query_one($sql, $id_phong);
    return $one_phong;
}

function phong_of_rap($id_rap)
{
    $sql = "select * from phong where id_rap = ?";
    $phong_of_rap = pdo_query($sql, $id_rap);
    return $phong_of_rap;
}

function phong_of_gio($id_giochieu)
{
    $sql = "select phong.ten_phong as ten_phong from phong join gio_chieu on phong.id_phong = gio_chieu.id_phong where gio_chieu.id_giochieu = ?";
    $phong_of_gio = pdo_query_one($sql, $id_giochieu);
    return $phong_of_gio;
}
