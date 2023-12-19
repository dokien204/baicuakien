<div style="margin-left: 250px;" class="row text-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Danh sách Ghế</h5>
            </div>
            <div class="tab-area">
                <div class="tab-item active">
                    <form action="index.php?act=list_ghe" class="ticket-search-form" method="post">
                        <div class="form-group large">
                            <input type="text" name="timghe" placeholder="Search for room">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <form action="index.php?act=list_ghe" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Ghế</th>
                                <th scope="col">Gía Ghế</th>
                                <th>!</th>
                            </tr>
                        </thead>
                        <tbody class="customtable">
                            <tr>
                                <?php foreach ($list_ghe as $ghe) {
                                    $update = "index.php?act=update_ghe&id_ghe=" . $ghe['id_ghe'];
                                    $delete = "index.php?act=delete_ghe&id_ghe=" . $ghe['id_ghe'];
                                    echo '<tr>
                            <td>' . $ghe['id_ghe'] . '</td>
                            <td>' . $ghe['ten_ghe'] . '</td>
                            <td>' . $ghe['gia_ghe'] . '</td>
                            <td><a href="' . $update . '"><input type="button"  value="Sửa"></a>
                            <a href="' . $delete . '"><input type="button"  value="Xoá"></a></td>
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
        <a style="color: #000000;" href="index.php?act=add_ghe">Thêm</a>
    </button>
</div>