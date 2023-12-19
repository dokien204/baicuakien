<?php
$id_ve = $_GET['id_ve'];
// echo $id_ve;
?>
<div style="margin-left: 250px;" class="row text-center">
    <form action="index.php?act=capnhattt" class="col-12" method="post">
        <input type="hidden" name="id_ve" value="<?= $id_ve ?>">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Danh sách vé</h5>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Khách hàng</th>
                            <th scope="col">Tên phim</th>
                            <th scope="col">Ghế</th>
                            <th scope="col">Phòng</th>
                            <th scope="col">Ngày chiếu</th>
                            <th scope="col">Giờ chiếu</th>
                            <th scope="col">Tổng giá</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">!</th>
                        </tr>
                    </thead>
                    <tbody class="customtable">
                        <?php extract($one_ve);
                        $timestamp = strtotime($ngay_chieu);
                        $fm_date = date("d/m/Y", $timestamp);
                        $thanh_tien = number_format($tong_tien, '0', '.', ',');
                        ?>
                        <tr>
                            <td><?= $id_ve ?></td>
                            <td><?= $email ?></td>
                            <td><?= $ten_phim ?></td>
                            <td><?= $ds_ghe ?></td>
                            <td><?= $ten_phong ?></td>
                            <td><?= $fm_date ?></td>
                            <td><?= $gio_chieu ?></td>
                            <td><?= $thanh_tien ?></td>
                            <td>
                                <?php if ($trang_thai == 0) {
                                    echo 'Chưa thanh toán';
                                } else {
                                    echo 'Đã thanh toán';
                                } ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <select name="trangthai">
            <option value="" disabled hidden selected>Trạng thái</option>
            <option value="1">Đã thanh toán</option>
        </select>
        <br>
        <button style="margin-top: 30px;" type="submit" class="btn btn-outline-success text-center">
            Cập nhật
        </button>
    </form>
</div>