<div style="margin-left: 250px;" class="row text-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Danh Sách Ngày Chiếu</h5>
            </div>
            <div class="tab-area">
                <div class="tab-item active">
                    <form action="index.php?act=list_showdate" class="ticket-search-form" method="post">
                        <div class="form-group large">
                            <input type="text" name="timngayc" placeholder="Search for date">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <form action="index.php?act=list_showdate" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NAME</th>
                                <th scope="col">FILM</th>
                                <th scope="col">RẠP</th>
                                <th scope="col">PHÒNG</th>
                                <th scope="col">OPTION</th>
                            </tr>
                        </thead>
                        <tbody class="customtable">
                            <tr>
                                <?php foreach ($list_showdate as $date) {
                                    $suadate = "index.php?act=update_showdate&id_ngaychieu=" . $date['id_ngaychieu'];
                                    $xoadate = "index.php?act=delete_showdate&id_ngaychieu=" . $date['id_ngaychieu'];
                                    $timestamp = strtotime($date['ngay_chieu']);
                                    $fm_date = date("d/m/Y", $timestamp);
                                    echo '<tr>
                            <td>' . $date['id_ngaychieu'] . '</td>
                            <td>' . $fm_date . '</td>
                            <td>' . $date['ten_phim'] . '</td>
                            <td>' . $date['ten_rap'] . '</td>
                            <td>' . $date['ten_phong'] . '</td>
                            <td><a href="' . $suadate . '"><input type="button"  value="Sửa"></a>
                            <a href="' . $xoadate . '"><input type="button"  value="Xoá"></a></td>
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
        <a style="color: #000000;" href="index.php?act=add_showdate">Thêm</a>
    </button>
</div>