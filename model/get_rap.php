<?php
$id_diadiem = filter_input(INPUT_POST, 'id_diadiem', FILTER_SANITIZE_NUMBER_INT);

if($id_diadiem != null){
    include "../model/rap/rap.php";
    include "pdo.php";
    $list_rap = rap_of_phim($id_diadiem);
    // Tạo các tùy chọn rạp dựa trên kết quả truy vấn/xử lý
    echo "<option value='' disabled hidden selected>Rạp</option>";
    foreach ($list_rap as $rap) {
        extract($rap);
        echo "<option value=".$id_rap.">$ten_rap</option>";
    }
    
}else{
    echo "Lỗi : tham số chuyền vào ";
}

?>