<div style="margin-left: 250px;" class="row text-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Danh sách phim</h5>
            </div>
            <div class="tab-area">
                <div class="tab-item active">
                    <form action="index.php?act=listphim" class="ticket-search-form" method="post">
                        <div class="form-group large">
                            <input type="text" name="timphim" placeholder="Search for Movies">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Địa điểm</th>
                            <th scope="col">Rạp</th>
                            <th scope="col">Thời lượng</th>
                            <th scope="col">Trailer</th>
                            <th scope="col">Giá</th>
                            <th scope="col">!</th>
                        </tr>
                    </thead>
                    <tbody class="customtable">
                        <?php foreach ($list as $phim) : ?>
                            <?php extract($phim);

                            $xoaphim = "index.php?act=xoaphim&id_phim=$id_phim";
                            $suaphim = "index.php?act=sphim&id_phim=$id_phim";
                            ?>
                            <tr>
                                <td><?= $id_phim ?></td>
                                <td>
                                    <img style="width: 150px; height: 200px; object-fit: cover;" src="../upload/<?= $anh ?>" alt="">
                                </td>
                                <td><?= $ten_phim ?></td>
                                <td><?= $ten_loai ?></td>
                                <td><?= $mo_ta ?></td>
                                <td><?= $dia_diem ?></td>
                                <td><?= $ten_rap ?></td>
                                <td><?= $thoi_luong ?></td>
                                <td><?= $trailer ?></td>
                                <td><?= $gia_phim ?></td>
                                <td>
                                    <button type="button" class="btn btn-outline-success text-center">
                                        <a style="color: #000000;" href="<?= $suaphim ?>">Sửa</a>
                                    </button>
                                    ------
                                    <button type="button" class="btn btn-outline-success text-center">
                                        <a onclick="return confirm('Xoá là mất luôn ??')" style="color: #000000;" href="<?= $xoaphim ?>">Xoá</a>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-outline-success text-center">
        <a style="color: #000000;" href="index.php?act=addphim">Thêm</a>
    </button>
</div>