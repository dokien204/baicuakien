<?php
require_once("config.php");
// var_dump($_POST);

$gio_chieu = one_showtime($id_giochieu);
?>
<div class="container">
    <h3>Tạo mới đơn hàng</h3>
    <div class="table-responsive">
        <form action="index.php?act=saukhithanhtoan" id="create_form" method="post">
            <input type="hidden" name="id_phim" value="<?= $id_phim ?>">
            <input type="hidden" name="id_diadiem" value="<?= $id_diadiem ?>">
            <input type="hidden" name="id_rap" value="<?= $id_rap ?>">
            <input type="hidden" name="id_ngaychieu" value="<?= $id_ngaychieu ?>">
            <input type="hidden" name="id_giochieu" value="<?= $id_giochieu ?>">

            <div class="form-group">
                <label for="language">Loại hàng hóa </label>
                <select name="order_type" id="order_type" class="form-control">
                    <option value="topup">Nạp tiền điện thoại</option>
                    <option value="billpayment">Thanh toán hóa đơn</option>
                    <option value="fashion">Thời trang</option>
                    <option value="other">Khác - Xem thêm tại VNPAY</option>
                </select>
            </div>
            <div class="form-group">
                <label for="order_id">Mã hóa đơn</label>
                <input class="form-control" id="order_id" name="order_id" type="text"
                    value="<?php echo date("YmdHis") ?>" />
            </div>
            <div class="form-group">
                <label for="amount">Số tiền</label>
                <input class="form-control" id="amount" name="amount" type="number" value="<?= $tong_gia ?>" />
            </div>
            <div class="form-group">
                <label for="order_desc">Nội dung thanh toán</label>
                <textarea class="form-control" cols="20" id="order_desc" name="order_desc"
                    rows="2">Noi dung thanh toan</textarea>
            </div>
            <div class="form-group">
                <label for="bank_code">Ngân hàng</label>
                <select name="bank_code" id="bank_code" class="form-control">
                    <option value="">Không chọn</option>
                    <option value="NCB"> Ngan hang NCB</option>
                    <option value="AGRIBANK"> Ngan hang Agribank</option>
                    <option value="SCB"> Ngan hang SCB</option>
                    <option value="SACOMBANK">Ngan hang SacomBank</option>
                    <option value="EXIMBANK"> Ngan hang EximBank</option>
                    <option value="MSBANK"> Ngan hang MSBANK</option>
                    <option value="NAMABANK"> Ngan hang NamABank</option>
                    <option value="VNMART"> Vi dien tu VnMart</option>
                    <option value="VIETINBANK">Ngan hang Vietinbank</option>
                    <option value="VIETCOMBANK"> Ngan hang VCB</option>
                    <option value="HDBANK">Ngan hang HDBank</option>
                    <option value="DONGABANK"> Ngan hang Dong A</option>
                    <option value="TPBANK"> Ngân hàng TPBank</option>
                    <option value="OJB"> Ngân hàng OceanBank</option>
                    <option value="BIDV"> Ngân hàng BIDV</option>
                    <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                    <option value="VPBANK"> Ngan hang VPBank</option>
                    <option value="MBBANK"> Ngan hang MBBank</option>
                    <option value="ACB"> Ngan hang ACB</option>
                    <option value="OCB"> Ngan hang OCB</option>
                    <option value="IVB"> Ngan hang IVB</option>
                    <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                </select>
            </div>
            <div class="form-group">
                <label for="language">Ngôn ngữ</label>
                <select name="language" id="language" class="form-control">
                    <option value="vn">Tiếng Việt</option>
                    <option value="en">English</option>
                </select>
            </div>
            <div class="form-group">
                <label>Thời hạn thanh toán</label>
                <input class="form-control" id="txtexpire" name="txtexpire" type="text"
                    value="<?php echo $expire; ?>" />
            </div>

            <div class="form-group">
                <h3>Thông tin hóa đơn (Billing)</h3>
            </div>

            <div class="form-group">
                <label>Email (*)</label>
                <input class="form-control" id="txt_billing_email" name="txt_billing_email" type="text"
                    value="<?= $_SESSION['khach_hang']['email'] ?>" />
            </div>

            <button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán Post</button>
            <button style="margin-top: 30px; margin-bottom: 50px;" type="submit" name="redirect" id="redirect"
                class="btn btn-primary">Thanh
                toán
                Redirect</button>
        </form>
    </div>
</div>