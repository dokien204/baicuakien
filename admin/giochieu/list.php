<div style="margin-left: 250px;" class="row text-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Danh Sách Giờ Chiếu</h5>
            </div>
            <div class="tab-area">
                <div class="tab-item active">
                    <form action="index.php?act=list_showtime" class="ticket-search-form" method="post">
                        <div class="form-group large">
                            <input type="text" name="timgioc" placeholder="Search for time">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <form action="index.php?act=list_showtime" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Giờ chiếu</th>
                                <th scope="col">Ngày chiếu</th>
                                <th scope="col">Phim</th>
                                <th scope="col">Phòng</th>
                                <th scope="col">OPTION</th>
                            </tr>
                        </thead>
                        <tbody class="customtable">
                            <tr>
                                <?php foreach ($list_showtime as $time) {
                                    $suatime = "index.php?act=update_showtime&id_giochieu=" . $time['id_giochieu'];
                                    $xoatime = "index.php?act=delete_showtime&id_giochieu=" . $time['id_giochieu'];
                                    $timestamp = strtotime($time['ngay_chieu']);
                                    $fm_date = date("d/m/Y", $timestamp);
                                    echo '<tr>
                            <td>' . $time['id_giochieu'] . '</td>
                            <td>' . $time['gio_chieu'] . '</td>
                            <td>' . $fm_date  . '</td>
                            <td>' . $time['ten_phim'] . '</td>
                            <td>' . $time['ten_phong'] . '</td>
                            <td><a href="' . $suatime . '"><input type="button"  value="Sửa"></a>
                            <a href="' . $xoatime . '"><input type="button"  value="Xoá"></a></td>
                        </tr>';
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <button type="button" class="btn btn-outline-success text-center">
        <a style="color: #000000;" href="index.php?act=add_showtime">Thêm</a>
    </button>
</div>