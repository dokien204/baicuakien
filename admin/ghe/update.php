<?php
if (is_array($one_ghe)) {
    extract($one_ghe);
}
?>
<form action="index.php?act=sua_ghe" method="post" class="form-horizontal">
    <div class="card-body">
        <h4 class="card-title">Sửa ghế</h4>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label"> Tên ghế</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="ten_ghe" value="<?= $ten_ghe ?>"
                    placeholder="Điền tên ghế">
            </div>
            <label for="fname" class="col-sm-3 text-right control-label col-form-label"> Giá ghế</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="gia_ghe" value="<?= $gia_ghe ?>"
                    placeholder="Điền giá ghế">
                <input type="hidden" name="id_ghe" value="<?= $id_ghe ?>">
            </div>
        </div>
    </div>
    <div class="border-top text-center">
        <div class="card-body">
            <input type="submit" name="capnhap" class="btn btn-outline-success" value="Sửa"></input>
            <a href="index.php?act=list_ghe"><input type="button" class="btn btn-outline-success" value="Danh sách"></a>
        </div>

    </div>
</form>