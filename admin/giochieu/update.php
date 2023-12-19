<?php
if (is_array($one_showtime)) {
    extract($one_showtime);

    $one_phim = one_phim($id_phim);

    $one_phong = one_phong($id_phong);

    $one_ngay = one_showdate($id_ngaychieu);
}
?>
<form action="index.php?act=update_time" method="post" class="form-horizontal">
    <div class="card-body">
        <h4 class="card-title">Sửa Giờ Chiếu</h4>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Giờ Chiếu</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="gio_chieu" value="<?= $gio_chieu ?>"
                    placeholder="Điền Giờ Chiếu">
                <input type="hidden" name="id_giochieu" value="<?= $id_giochieu ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Điền ngay chieu</label>
            <div class="col-sm-9">
                <select name="id_ngaychieu">
                    <option value="<?= $one_ngay['id_ngaychieu'] ?>"><?= $one_ngay['ngay_chieu'] ?></option>
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
                    <option value="<?= $one_phim['id_phim'] ?>"><?= $one_phim['ten_phim'] ?></option>
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
                    <option value="<?= $one_phong['id_phong'] ?>"><?= $one_phong['ten_phong'] ?></option>
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
            <input type="submit" name="capnhap" class="btn btn-outline-success" value="Sửa"></input>
            <a href="index.php?act=list_showtime"><input type="button" class="btn btn-outline-success"
                    value="Danh sách"></a>
        </div>

    </div>
</form>