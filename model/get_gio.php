<?php
$id_ngaychieu = filter_input(INPUT_POST, 'id_ngay', FILTER_SANITIZE_NUMBER_INT);
$id_phim = filter_input(INPUT_POST, 'id_phim', FILTER_SANITIZE_NUMBER_INT);

if ($id_ngaychieu != null && $id_phim != null) {
    include "../model/time/gio_chieu.php";
    include "pdo.php";
    $list_giochieu = time_of_phim($id_ngaychieu, $id_phim);
    // Tạo các tùy chọn rạp dựa trên kết quả truy vấn/xử lý
    echo '<option value="" disabled hidden selected>giờ</option>';
    foreach ($list_giochieu as $time) {
        extract($time);
        echo "<option value=" . $id_giochieu . ">$gio_chieu:00</option>";
    }
} else {
    echo "Lỗi : tham số chuyền vào ";
}
