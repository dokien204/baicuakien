<?php
if (is_array($one_rap)) {
    extract($one_rap);

    $one_diadiem = one_location($id_diadiem);
    extract($one_diadiem);
}
?>
<form action="index.php?act=sua_rap" method="post" class="form-horizontal">
    <div class="card-body">
        <h4 class="card-title">Sửa Rap</h4>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label"> Tên Rap</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="ten_rap" value="<?= $ten_rap ?>"
                    placeholder="Điền tên rap">
                <input type="hidden" name="id_rap" value="<?= $id_rap ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Địa Điểm </label>
            <div class="col-sm-9">
                <select name="id_diadiem">
                    <option value="<?= $id_diadiem ?>"><?= $ten_diadiem ?></option>
                    <?php foreach ($list_diadiem as $diadiem) : ?>
                    <?php extract($diadiem); ?>
                    <option value="<?= $id_diadiem ?>"><?= $id_diadiem ?> - <?= $ten_diadiem ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="border-top text-center">
        <div class="card-body">
            <input type="submit" name="capnhap" class="btn btn-outline-success" value="Sửa"></input>
            <a href="index.php?act=list_rap"><input type="button" class="btn btn-outline-success" value="Danh sách"></a>
        </div>

    </div>
</form>