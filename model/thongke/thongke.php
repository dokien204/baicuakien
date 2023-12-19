<?php
// thông kê phim- loại phim
function thongke_phim_loaiphim()
{
    $sql = "SELECT the_loai.id_loai AS idloai, the_loai.ten_loai AS tenloai, COUNT(phim.id_phim) AS soluong, MIN(phim.gia_phim) AS min, MAX(phim.gia_phim) AS max, AVG(phim.gia_phim) AS avg
    FROM phim
    JOIN the_loai ON phim.id_loai = the_loai.id_loai
    GROUP BY the_loai.id_loai, the_loai.ten_loai
    ORDER BY the_loai.id_loai DESC";
    $thongke = pdo_query($sql);
    return $thongke;
}

// thông kê địa điểm - rạp
function thongke_diadiem_rap()
{
    $sql = "SELECT dia_diem.id_diadiem AS iddiadiem, dia_diem.ten_diadiem AS tendiadiem, COUNT(rap.id_rap) AS soluong, GROUP_CONCAT(rap.ten_rap SEPARATOR ', ') AS tenrap
    FROM dia_diem
    LEFT JOIN rap ON dia_diem.id_diadiem = rap.id_diadiem
    GROUP BY dia_diem.id_diadiem, dia_diem.ten_diadiem
    ORDER BY dia_diem.id_diadiem DESC";
    $thongke = pdo_query($sql);
    return $thongke;
}
// thống kê tiền theo rap
function rap_on_tien()
{
    $sql = "SELECT rap.ten_rap AS ten_rap, SUM(ve.tong_tien) AS tong_tien
    FROM rap
    JOIN dia_diem ON dia_diem.id_diadiem = rap.id_diadiem 
    JOIN phong ON phong.id_rap = rap.id_rap
    JOIN gio_chieu ON gio_chieu.id_phong = phong.id_phong
    JOIN ve ON ve.id_giochieu = gio_chieu.id_giochieu
    GROUP BY rap.ten_rap";
    $thongke = pdo_query($sql);
    return $thongke;
}
// thống kê tiền theo ngày 

function tien_ngay()
{
    $sql = "SELECT ve.ngay_dat AS ngay, SUM(ve.tong_tien) AS tong_tien FROM ve";
    $thongke = pdo_query($sql);
    return $thongke;
}

function thongkebl()
{
    $sql = "select binh_luan.id_bl as id_bl, binh_luan.noi_dung as noi_dung, khach_hang.email as email, phim.ten_phim as ten_phim
    from binh_luan 
    join phim on phim.id_phim = binh_luan.id_phim 
    join khach_hang on khach_hang.id_kh = binh_luan.id_kh 
    group by binh_luan.id_bl";
    $thongke = pdo_query($sql);
    return $thongke;
}
