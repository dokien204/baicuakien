<div style="margin-left: 250px;" class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Danh sách loại phim</h5>
            </div>
            <div class="tab-area">
                <div class="tab-item active">
                    <form action="index.php?act=listtheloai" class="ticket-search-form" method="post">
                        <div class="form-group large">
                            <input type="text" name="timloai" placeholder="Search for category">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <form action="index.php?act=listtheloai" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên loại</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">OPTION</th>
                            </tr>
                        </thead>
                        <tbody class="customtable">
                            <?php foreach ($list_theloai as $loai) : ?>
                                <?php extract($loai);
                                $suatheloai = "index.php?act=stheloai&idtl=" . $id_loai;
                                $xoatheloai = "index.php?act=xoatheloai&idtl=" . $id_loai;
                                ?>
                                <tr>
                                    <td> <?= $id_loai ?> </td>
                                    <td> <?= $ten_loai ?> </td>
                                    <td> <?php if ($trang_thai == 1) {
                                                echo "Đang hoạt động";
                                            } else {
                                                echo "Không hoạt động";
                                            } ?> </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-success"><a onclick="return confirm('Xoá là mất luôn ??')" style="color: #000000;" href="<?= $xoatheloai ?>">Xoá</a></button> |
                                        <button type="button" class="btn btn-outline-success"><a style="color: #000000;" href="<?= $suatheloai ?>">Sửa</a></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <button type="button" class="btn btn-outline-success text-center">
        <a style="color: #000000;" href="index.php?act=addtheloai">Thêm</a>
    </button>
</div>