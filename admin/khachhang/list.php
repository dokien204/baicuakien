<div style="margin-left: 250px;" class="row text-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">Danh Sách Người Dùng</h5>
            </div>
            <div class="tab-area">
                <div class="tab-item active">
                    <form action="index.php?act=taikhoan" class="ticket-search-form" method="post">
                        <div class="form-group large">
                            <input type="text" name="kyw" placeholder="Search for account">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <form action="index.php?act=list_location" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">Nghiệp vụ</th>
                                <th scope="col">Trang thái</th>
                                <th scope="col">!</th>
                            </tr>
                        </thead>
                        <tbody class="customtable">
                            <tr>
                                <?php foreach ($list_tk as $tk) : ?>
                                <?Php
                                    $xoatk = "index.php?act=delete_kh&id_kh=" . $tk['id_kh'];
                                    $nghiep_vu = $tk['role'] == 1 ? "ADMIN" : "Khách hàng";
                                    $trang_thai = $tk['trang_thai'] == 1 ? "Đang hoạt động" : "Ngưng hoạt động";
                                    ?>
                            <tr>
                                <td><?= $tk['id_kh'] ?></td>
                                <td><?= $tk['email'] ?></td>
                                <td><?= $nghiep_vu  ?></td>
                                <td><?= $trang_thai ?></td>
                                <td><a onclick="return confirm('Xoá là mất luôn ??')" href="<?= $xoatk ?>"><input
                                            type="button" value="Xoá"></a></td>
                            </tr>

                            <?php endforeach ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>