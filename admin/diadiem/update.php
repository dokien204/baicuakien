<?php
if (is_array($one_location)) {
    extract($one_location);
}
?>
<form action="index.php?act=update_dd" method="post" class="form-horizontal">
    <div class="card-body">
        <h4 class="card-title">Sửa Địa Điểm</h4>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Địa Điểm</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="ten_diadiem" value="<?= $ten_diadiem ?>" placeholder="Điền Tên Địa Điểm">
                <input type="hidden" name="id_diadiem" value="<?= $id_diadiem ?>">
            </div>
        </div>
    </div>
    <div class="border-top text-center">
        <div class="card-body">
            <input type="submit" name="capnhap" class="btn btn-outline-success" value="Sửa"></input>
            <a href="index.php?act=list_location"><input type="button" class="btn btn-outline-success" value="Danh sách"></a>
        </div>

    </div>
</form>