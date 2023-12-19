<?php
if (is_array($one_phim)) {
    extract($one_phim);
}
// var_dump($one_phim);
?>

<form action="index.php?act=updatephim" class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="card-body">
        <h4 class="card-title text-center">Thêm phim</h4>
        <input type="hidden" name="id_phim" value="<?= $id_phim ?? "" ?>">
        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">Ảnh</label>
            <div class="col-sm-9">
                <input name="anh" type="file" class="form-control" placeholder="Ảnh">
            </div>
            <img style="margin-left: 350px; width: 150px; height: 200px; object-fit: cover;" src="../upload/<?= $anh ?>" alt="">
        </div>
        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">Tên phim</label>
            <div class="col-sm-9">
                <input name="ten_phim" value="<?= $ten_phim ?? "" ?>" type="text" class="form-control" placeholder="Tên phim">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">Thể loại</label>
            <div class="col-sm-9">
                <select name="id_loai">
                    <option value="<?= $id_loai ?>"><?= $ten_loai ?? "" ?></option>
                    <?php foreach ($list_theloai as $the_loai) : ?>
                        <?php extract($the_loai); ?>
                        <option value="<?= $id_loai ?>"><?= $id_loai . " - " . $ten_loai ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">Mô tả</label>
            <div class="col-sm-9">
                <input name="mo_ta" value="<?= $mo_ta ?? "" ?>" type="Mô tả" class="form-control" placeholder="Mô tả">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">Địa điểm</label>
            <div class="col-sm-9">
                <select name="id_diadiem">
                    <option value="<?= $id_diadiem ?? "" ?>" selected><?= $dia_diem ?? "" ?></option>
                    <?php foreach ($list_diadiem as $diadiem) : ?>
                        <?php extract($diadiem); ?>
                        <option value="<?= $id_diadiem ?>"><?= $id_diadiem . " - " . $ten_diadiem ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">Rạp</label>
            <div class="col-sm-9">
                <select name="id_rap">
                    <option value="<?= $id_rap ?? "" ?>"><?= $ten_rap ?? "" ?></option>
                    <?php foreach ($list_rap as $rap) : ?>
                        <?php extract($rap); ?>
                        <option value="<?= $id_rap ?>"><?= $id_rap . " - " . $ten_rap ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">Thời lượng</label>
            <div class="col-sm-9">
                <input name="thoi_luong" value="<?= $thoi_luong ?? "" ?>" type="text" class="form-control" placeholder="Thời lượng">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">Trailer</label>
            <div class="col-sm-9">
                <input name="trailer" value="<?= $trailer ?? "" ?>" type="text" class="form-control" placeholder="Trailer">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 text-right control-label col-form-label">Giá phim</label>
            <div class="col-sm-9">
                <input name="gia_phim" value="<?= $gia_phim ?? "" ?>" type="text" class="form-control" placeholder="Giá phim">
            </div>
        </div>
    </div>
    <div class="border-top text-center">
        <div class="card-body">
            <button type="submit" class="btn btn-outline-success">Sửa</button>
            <button type="button" class="btn btn-outline-success">
                <a class="text-success" href="index.php?act=listphim">Danh sách</a>
            </button>
        </div>
    </div>
    <p class="border-top text-center"><?= $thong_bao ?? "" ?></p>
</form>