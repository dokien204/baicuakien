<?php
if (is_array($one_loai)) {
    extract($one_loai);
}
?>
<form action="index.php?act=updatetheloai" method="post" class="form-horizontal">
    <div class="card-body">
        <h4 class="card-title">Sửa Loại Phim</h4>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Loại Phim</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="ten_loai" value="<?= $ten_loai ?>" placeholder="Điền tên loại phim">
                <input type="hidden" name="id_loai" value="<?= $id_loai ?>">
            </div>
        </div>
    </div>
    <div class="border-top text-center">
        <div class="card-body">
            <button type="submit" class="btn btn-outline-success">Sửa</button>
            <a href="index.php?act=listtheloai"><input type="button" class="btn btn-outline-success" value="Danh sách"></a>
        </div>

    </div>
</form>