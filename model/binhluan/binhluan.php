<?php
function add_binhluan($noi_dung, $ngay_bl , $id_kh , $id_phim)
{
    $sql = "insert into binh_luan(noi_dung, ngay_bl , id_kh , id_phim) values(?,?,?,?)";
    pdo_execute($sql, $noi_dung, $ngay_bl , $id_kh , $id_phim);
}

function list_bl($id_phim){

    $sql = "SELECT binh_luan.noi_dung AS noi_dung, binh_luan.ngay_bl AS ngay_bl, khach_hang.email AS email, phim.ten_phim AS tenphim
    FROM binh_luan
    JOIN khach_hang ON binh_luan.id_kh = khach_hang.id_kh
    JOIN phim ON binh_luan.id_phim = phim.id_phim
    WHERE phim.id_phim = ?";
    $list = pdo_query($sql,$id_phim);
    return $list;
}
?>