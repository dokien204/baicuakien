<form action="index.php?act=add_showtime" method="post" class="form-horizontal">
    <div class="card-body">
        <h4 class="card-title">Thêm Giờ Chiếu</h4>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Giờ Chiếu</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="gio_chieu" placeholder="Điền giờ chiếu">
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Điền ngay chieu</label>
            <div class="col-sm-9">
                <select name="id_ngaychieu">
                    <option value="" disabled hidden selected>ngay chieu</option>
                    <?php foreach ($list_ngaychieu as $ngay_chieu) : ?>
                    <?php extract($ngay_chieu); ?>
                    <option value="<?= $id_ngaychieu ?>"><?= $id_ngaychieu ?> - <?= $ngay_chieu ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Điền phim</label>
            <div class="col-sm-9">
                <select name="id_phim">
                    <option value="" disabled hidden selected>Phim</option>
                    <?php foreach ($list as $phim) : ?>
                    <?php extract($phim); ?>
                    <option value="<?= $id_phim ?>"><?= $id_phim ?> - <?= $ten_phim ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Phòng</label>
            <div class="col-sm-9">
                <select name="id_phong">
                    <option value="" disabled hidden selected>Phòng</option>
                    <?php foreach ($list_phong as $phong) : ?>
                    <?php extract($phong); ?>
                    <option value="<?= $id_phong ?>"><?= $id_phong ?> - <?= $ten_phong ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="border-top text-center">
        <div class="card-body">
            <input type="submit" name="them" class="btn btn-outline-success" value="Thêm"></input>
            <a href="index.php?act=list_showtime"><input type="button" class="btn btn-outline-success"
                    value="Danh sách"></a>
        </div>
    </div>
</form>