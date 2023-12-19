<?php
$id_rap = filter_input(INPUT_POST, 'id_rap', FILTER_SANITIZE_NUMBER_INT);
$id_phim= filter_input(INPUT_POST, 'id_phim', FILTER_SANITIZE_NUMBER_INT);

if($id_rap != null && $id_phim != null){
    include "../model/time/ngay_chieu.php";
    include "pdo.php";
    $list_ngay = date_of_rap($id_rap, $id_phim); 
    // Tạo các tùy chọn rạp dựa trên kết quả truy vấn/xử lý
    echo '<option value="" disabled hidden selected>Ngày</option>';
    foreach ($list_ngay as $date) {
        extract($date);
        echo "<option value=".$id_ngaychieu.">$ngay_chieu</option>";
    }
    
}else{
    echo "Lỗi : tham số chuyền vào ";
}

?>