<?php
function add_theloai($ten_loai)
{
    $sql = "insert into the_loai (ten_loai) values (?)";
    pdo_execute($sql, $ten_loai);
}

function update_theloai($id_loai, $ten_loai)
{
    $sql = "update the_loai set ten_loai = ? where id_loai = ?";
    pdo_execute($sql, $ten_loai, $id_loai);
}

function delete_theloai($id_loai)
{
    $sql = "update the_loai set trang_thai = 0 where id_loai = ?";
    pdo_execute($sql, $id_loai);
}

function all_theloai($timloai = "")
{
    $sql = "select * from the_loai where trang_thai = 1";
    if ($timloai != "") {
        $sql .= " and ten_loai like '%" . $timloai . "%'";
    }
    $sql .= " order by id_loai desc";
    $list = pdo_query($sql);
    return $list;
}

function one_theloai($id_loai)
{
    $sql = "select * from the_loai where id_loai = ?";
    $one_loai = pdo_query_one($sql, $id_loai);
    return $one_loai;
}