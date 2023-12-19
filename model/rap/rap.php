<?php
// thêm rạp
function add_rap($ten_rap, $id_diadiem)
{
    $sql = "insert into rap(ten_rap, id_diadiem) values(?, ?)";
    pdo_execute($sql, $ten_rap, $id_diadiem);
}
// update rạp
function update_rap($ten_rap, $id_diadiem, $id_rap)
{
    $sql = "update rap set ten_rap = ?, id_diadiem = ? where id_rap = ?";
    pdo_execute($sql, $ten_rap, $id_diadiem, $id_rap);
}
// xoá rạp
function delete_rap($id_rap)
{
    $sql = "delete from rap where id_rap = ?";
    pdo_execute($sql, $id_rap);
}
// danh sách rạp
function list_rap($timrap = "")
{
    $sql = "select rap.*, dia_diem.ten_diadiem as dia_diem from rap 
    join dia_diem on dia_diem.id_diadiem = rap.id_diadiem";
    if ($timrap != "") {
        $sql .= " where rap.ten_rap like '%" . $timrap . "%'";
    }
    $list = pdo_query($sql);
    return $list;
}
function rap_of_phim($id_diadiem)
{
    $sql = "select * from rap where id_diadiem = ?";
    $list_rap = pdo_query($sql, $id_diadiem);
    return $list_rap;
}
// select 1 rạp theo id
function one_rap($id_rap)
{
    $sql = "select * from rap where id_rap = ?";
    $one_rap = pdo_query_one($sql, $id_rap);
    return $one_rap;
}
