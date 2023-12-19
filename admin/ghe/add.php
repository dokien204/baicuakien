<form action="index.php?act=add_ghe" method="post" class="form-horizontal">
    <div class="card-body">
        <h4 class="card-title">Thêm Ghế</h4>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên Ghế </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="ten_ghe" placeholder="Điền tên ghế">
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Gía Ghế </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="gia_ghe" placeholder="Điền tên ghế">
            </div>
        </div>
    </div>
    <div class="border-top text-center">
        <div class="card-body">
            <input type="submit" name="them" class="btn btn-outline-success" value="Thêm"></input>
            <a href="index.php?act=list_ghe"><input type="button" class="btn btn-outline-success" value="Danh sách"></a>
        </div>

    </div>
</form>