<?php
session_start();
ob_start();
if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
    header('location: ../index.php');
}
require_once "../model/pdo.php";
require_once "../model/phim/phim.php";
require_once "../model/phim/theloai.php";
require_once "../model/phong/phong.php";
require_once "../model/rap/rap.php";
require_once "../model/time/dia_diem.php";
require_once "../model/time/gio_chieu.php";
require_once "../model/time/ngay_chieu.php";
require_once "../model/ghe/ghe.php";
require_once "../model/ve/ve.php";
require_once "../model/thongke/thongke.php";
require_once "../model/nguoidung/taikhoan.php";
require_once "../model/binhluan/binhluan.php";

$act = $_GET['act'] ?? "";
$id_ctg = $_REQUEST['id_ctg'] ?? 0;
$is_sign_page = in_array($act, ['sign-up', 'sign-in', 'nguoidung']);
$timphim = $_REQUEST['timphim'] ?? '';
$list = all_phim($id_ctg, $timphim);
$list_theloai = all_theloai();
$list_diadiem = list_location();
$list_rap = list_rap();
$list_phong = list_phong();
$list_ngaychieu = list_showdate();
$list_giochieu = list_showtime();
$list_ve = all_ve();
$thongkephim = thongke_phim_loaiphim();
$thongkediadiem = thongke_diadiem_rap();
$thongketientheorap = rap_on_tien();
$thongketientheongay = tien_ngay();
$thongkebl = thongkebl();
$da_thanhtoan = ve_da_thanhtoan();
$ch_thanhtoan = ve_ch_thanhtoan();
$list_tk = list_khach_hang();

switch ($act) {
    case 'home':
        $title = "Trang chủ";
        // var_dump($list);
        $VIEW = "public/home.php";
        break;

        // phòng
    case 'list_phong':
        $title = "Danh Sách Phòng";
        $timphong = $_REQUEST['timphong'] ?? '';
        $list_phong = list_phong($timphong);
        $VIEW = "phong/list.php";
        break;

    case 'add_phong':
        $title = "Thêm Phòng";
        if (isset($_POST['them']) && $_POST['them']) {
            $ten_phong = $_POST['ten_phong'];
            $id_phim = isset($_POST['id_phim']) ? $_POST['id_phim'] : '';
            $id_rap = isset($_POST['id_rap']) ? $_POST['id_rap'] : '';
            if (empty($ten_phong) || empty($id_phim) || empty($id_rap)) {
                $mess = "Vui lòng nhập đủ thông tin!";
            } else {
                add_phong($ten_phong, $id_phim, $id_rap);
                $mess = "Thêm Thành Công";
            }
        }
        $VIEW = "phong/add.php";
        break;

    case 'update_phong':
        if (isset($_GET['id_phong']) && $_GET['id_phong'] > 0) {
            $id_phong = $_GET['id_phong'];
            $one_phong = one_phong($id_phong);
            $VIEW = "phong/update.php";
        }
        break;

    case 'sua_phong':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $ten_phong = $_POST['ten_phong'];
            $id_phong = $_POST['id_phong'];
            $id_phim = $_POST['id_phim'];
            $id_rap = $_POST['id_rap'];
            update_phong($ten_phong, $id_phim, $id_rap, $id_phong);
        }
        $list_phong = list_phong();
        $VIEW = "phong/list.php";
        break;

    case 'delete_phong':
        if (isset($_GET['id_phong']) && $_GET['id_phong'] > 0) {
            $id_phong = $_GET['id_phong'];
            delete_phong($id_phong);
        }
        $list_phong = list_phong();
        $VIEW = "phong/list.php";
        break;

        // rạp
    case 'list_rap':
        $title = "Danh Sách Rap";
        $timrap = $_REQUEST['timrap'] ?? '';
        $list_rap = list_rap($timrap);
        $VIEW = "rap/list.php";
        break;

    case 'add_rap':
        $title = "Thêm Rạp";
        if (isset($_POST['them']) && $_POST['them']) {
            $ten_rap = $_POST['ten_rap'];
            $id_diadiem = isset($_POST['id_diadiem']) ? $_POST['id_diadiem'] : '';

            if (empty($ten_rap) || empty($id_diadiem)) {
                $mess = "Vui lòng nhập đủ thông tin!";
            } else {
                add_rap($ten_rap, $id_diadiem);
                $mess = "Thêm Thành Công";
            }
        }
        $VIEW = "rap/add.php";
        break;

    case 'update_rap':
        $title = "Sửa Rạp";
        if (isset($_GET['id_rap']) && $_GET['id_rap'] > 0) {
            $id_rap = $_GET['id_rap'];
            $one_rap = one_rap($id_rap);
            $VIEW = "rap/update.php";
        }
        break;

    case 'sua_rap':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $ten_rap = $_POST['ten_rap'];
            $id_rap = $_POST['id_rap'];
            $id_diadiem = $_POST['id_diadiem'];
            update_rap($ten_rap, $id_diadiem, $id_rap);
        }
        $list_rap = list_rap();
        $VIEW = "rap/list.php";
        break;

    case 'delete_rap':
        if (isset($_GET['id_rap']) && $_GET['id_rap'] > 0) {
            $id_rap = $_GET['id_rap'];
            delete_rap($id_rap);
        }
        $list_rap = list_rap();
        $VIEW = "rap/list.php";
        break;

    case 'add_location':
        $title = "Thêm Địa Điểm";
        if (isset($_POST['them']) && $_POST['them']) {
            $ten_diadiem = $_POST['ten_diadiem'];

            if (empty($ten_diadiem)) {
                $mess = "Vui lòng nhập đủ thông tin!";
            } else {
                add_location($ten_diadiem);
                $mess = "Thêm Thành Công";
            }
        }
        $VIEW = "diadiem/add.php";
        break;

    case 'list_location':
        $title = "Danh Sách Địa Điểm";
        $timdiadiem = $_REQUEST['timdiadiem'] ?? '';
        $list_location = list_location($timdiadiem);
        $VIEW = "diadiem/list.php";
        break;

    case 'delete_location':
        if (isset($_GET['id_diadiem']) && $_GET['id_diadiem'] > 0) {
            delete_location($_GET['id_diadiem']);
        }
        $list_location = list_location();
        $VIEW = "diadiem/list.php";
        break;

    case 'update_location':
        $title = "Sửa Địa Điểm";
        if (isset($_GET['id_diadiem']) && $_GET['id_diadiem'] > 0) {
            $id_diadiem = $_GET['id_diadiem'];
            $one_location = one_location($id_diadiem);
            $VIEW = "diadiem/update.php";
        }
        break;

    case 'update_dd':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $ten_diadiem = $_POST['ten_diadiem'];
            $id_diadiem = $_POST['id_diadiem'];
            update_location($ten_diadiem, $id_diadiem);
        }
        $list_location = list_location();
        $VIEW = "diadiem/list.php";
        break;

        // giờ chiếu
    case 'add_showtime':
        $title = "Thêm Giờ chiếu";
        if (isset($_POST['them']) && $_POST['them']) {
            $gio_chieu = $_POST['gio_chieu'];
            $id_ngaychieu = isset($_POST['id_ngaychieu']) ? $_POST['id_ngaychieu'] : '';
            $id_phim = isset($_POST['id_phim']) ? $_POST['id_phim'] : '';
            $id_phong = isset($_POST['id_diadiem']) ? $_POST['id_diadiem'] : '';

            if (empty($gio_chieu) || empty($id_ngaychieu) || empty($id_phim) || empty($id_phong)) {
                $mess = "Vui lòng nhập đủ thông tin!";
            } else {
                add_showtime($gio_chieu, $id_ngaychieu, $id_phim, $id_phong);
                $mess = "Thêm Thành Công";
            }
        }
        $VIEW = "giochieu/add.php";
        break;

    case 'list_showtime':
        $title = "Danh Sách Giờ chiếu";
        $timgioc = $_REQUEST['timgioc'] ?? '';
        $list_showtime = list_showtime($timgioc);
        $VIEW = "giochieu/list.php";
        break;

    case 'delete_showtime':
        if (isset($_GET['id_giochieu']) && $_GET['id_giochieu'] > 0) {
            delete_showtime($_GET['id_giochieu']);
        }
        $list_showtime = list_showtime();
        $VIEW = "giochieu/list.php";
        break;

    case 'update_showtime':
        $title = "Sửa Giờ chiếu";
        if (isset($_GET['id_giochieu']) && $_GET['id_giochieu'] > 0) {
            $id_giochieu = $_GET['id_giochieu'];
            $one_showtime = one_showtime($id_giochieu);
            $VIEW = "giochieu/update.php";
        }
        break;

    case 'update_time':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $gio_chieu = $_POST['gio_chieu'];
            $id_giochieu = $_POST['id_giochieu'];
            $id_ngaychieu = $_POST['id_ngaychieu'];
            $id_phim = $_POST['id_phim'];
            $id_phong = $_POST['id_phong'];
            update_showtime($gio_chieu, $id_ngaychieu, $id_phim, $id_phong, $id_giochieu);
        }
        $list_showtime = list_showtime();
        $VIEW = "giochieu/list.php";
        break;

        // ngày chiếu
    case 'add_showdate':
        $title = "Thêm Ngày chiếu";
        if (isset($_POST['them']) && $_POST['them']) {
            $ngay_chieu = $_POST['ngay_chieu'];
            $id_phim = isset($_POST['id_phim']) ? $_POST['id_phim'] : '';
            $id_rap = isset($_POST['id_rap']) ? $_POST['id_rap'] : '';
            $id_phong = isset($_POST['id_phong']) ? $_POST['id_phong'] : '';

            if (empty($ngay_chieu) || empty($id_phim) || empty($id_rap) || empty($id_phong)) {
                $mess = "Vui lòng nhập đủ thông tin!";
            } else {
                add_showdate($ngay_chieu, $id_phim, $id_rap, $id_phong);
                $mess = "Thêm Thành Công";
            }
        }
        $VIEW = "ngaychieu/add.php";
        break;

    case 'list_showdate':
        $title = "Danh Sách Ngày Chiếu";
        $timngayc = $_REQUEST['timngayc'] ?? '';
        $list_showdate = list_showdate($timngayc);
        $VIEW = "ngaychieu/list.php";
        break;

    case 'delete_showdate':
        if (isset($_GET['id_ngaychieu']) && $_GET['id_ngaychieu'] > 0) {
            delete_showdate($_GET['id_ngaychieu']);
        }
        $list_showdate = list_showdate();
        $VIEW = "ngaychieu/list.php";
        break;

    case 'update_showdate':
        $title = "Sửa ngày chiếu";
        if (isset($_GET['id_ngaychieu']) && $_GET['id_ngaychieu'] > 0) {
            $id_ngaychieu = $_GET['id_ngaychieu'];
            $one_showdate = one_showdate($id_ngaychieu);
            $VIEW = "ngaychieu/update.php";
        }
        break;

    case 'update_ngc':
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $ngay_chieu = $_POST['ngay_chieu'];
            $id_ngaychieu = $_POST['id_ngaychieu'];
            $id_phim = $_POST['id_phim'];
            $id_rap = $_POST['id_rap'];
            $id_phong = $_POST['id_phong'];
            update_showdate($ngay_chieu, $id_phim, $id_rap, $id_phong, $id_ngaychieu);
        }
        $list_showdate = list_showdate();
        $VIEW = "ngaychieu/list.php";
        break;

    case 'listtheloai':
        $title = "Danh sách loại phim";
        $timloai = $_REQUEST['timloai'] ?? '';
        $list_theloai = all_theloai($timloai);
        $VIEW = "loaiphim/list.php";
        break;

    case 'addtheloai':
        $title = "Thêm Thể loại phim";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (!empty($_POST['ten_loai'])) {
                $ten_loai = $_POST['ten_loai'];
                add_theloai($ten_loai);
                $mess = "Thêm Thành Công";
            } else {
                $mess = "Vui lòng nhập đủ thông tin!";
            }
        }
        $VIEW = "loaiphim/add.php";
        break;

    case 'stheloai':
        //var_dump($_GET);
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $one_loai = one_theloai($_GET['idtl']);
        }
        $VIEW = "loaiphim/update.php";
        break;

    case 'updatetheloai':
        $title = "Sửa loại phim";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);
            update_theloai($id_loai, $ten_loai);
        }
        $list_theloai = all_theloai();
        $VIEW = "loaiphim/list.php";
        break;

    case 'xoatheloai':
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            delete_theloai($_GET['idtl']);
        }
        $list_theloai = all_theloaiadmin();
        $VIEW = "loaiphim/list.php";
        break;

    case 'listphim':
        $title = "Danh sách phim";
        $timphim = $_REQUEST['timphim'] ?? '';
        $list = all_phim($id_ctg, $timphim);
        $VIEW = "phim/list.php";
        break;

    case 'addphim':
        $title = "Thêm Phim";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (!empty($_FILES['anh']['name']) && !empty($_POST['ten_phim']) && !empty($_POST['id_loai']) && !empty($_POST['mo_ta']) && !empty($_POST['id_diadiem']) && !empty($_POST['id_rap']) && !empty($_POST['thoi_luong']) && !empty($_POST['gia_phim']) && !empty($_POST['trailer'])) {
                $anh = $_FILES['anh'];
                $ten_phim = $_POST['ten_phim'];
                $id_loai = $_POST['id_loai'];
                $mo_ta = $_POST['mo_ta'];
                $id_diadiem = $_POST['id_diadiem'];
                $id_rap = $_POST['id_rap'];
                $thoi_luong = $_POST['thoi_luong'];
                $gia_phim = $_POST['gia_phim'];
                $trailer = $_POST['trailer'];

                $upload = $anh['name'];
                move_uploaded_file($anh['tmp_name'], "../upload/" . $upload);
                add_phim($upload, $ten_phim, $mo_ta, $thoi_luong, $trailer, $gia_phim, $id_loai, $id_rap, $id_diadiem);

                $thong_bao = "Thêm thành công!";
            } else {
                $thong_bao = "Vui lòng nhập đủ thông tin!";
            }
        }
        $VIEW = "phim/add.php";
        break;

    case 'sphim':
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $one_phim = one_phim($_GET['id_phim']);
        }
        $VIEW = "phim/update.php";
        break;

    case 'updatephim':
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_FILES);
            $dir = "../upload/";
            $id_phim = $_POST['id_phim'];
            $ten_phim = $_POST['ten_phim'];
            $id_loai = $_POST['id_loai'];
            $mo_ta = $_POST['mo_ta'];
            $id_diadiem = $_POST['id_diadiem'];
            $id_rap = $_POST['id_rap'];
            $thoi_luong = $_POST['thoi_luong'];
            $gia_phim = $_POST['gia_phim'];
            $trailer = $_POST['trailer'];

            if (!empty($_FILES['anh']['name'])) {
                $nameimg = $_FILES['anh']['name'];
                $updateimg = $dir . basename($nameimg);
                move_uploaded_file($_FILES['anh']['tmp_name'], $updateimg);
            } else {
                $updateimg = '';
            }

            update_phim($updateimg, $ten_phim, $mo_ta, $thoi_luong, $trailer, $gia_phim, $id_loai, $id_rap, $id_diadiem, $id_phim);
        }
        $list = all_phim();
        $VIEW = "phim/list.php";
        break;

    case 'xoaphim':
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            delete_phim($_GET['id_phim']);
        }
        $list = all_phim();
        $VIEW = "phim/list.php";
        break;

        // ghế 
    case 'list_ghe':
        $title = "Danh Sách Ghế";
        $timghe = $_REQUEST['timghe'] ?? '';
        $list_ghe = list_ghe($timghe);
        $VIEW = "ghe/list.php";
        break;

    case 'add_ghe':
        $title = "Thêm Ghế";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (!empty($_POST['ten_ghe']) && !empty($_POST['gia_ghe'])) {
                $ten_ghe = $_POST['ten_ghe'];
                $gia_ghe = $_POST['gia_ghe'];
                add_ghe($ten_ghe, $gia_ghe);
                $mess = "Thêm Thành Công";
            } else {
                $mess = "Vui lòng nhập đủ thông tin!";
            }
        }
        $VIEW = "ghe/add.php";
        break;

    case 'update_ghe':
        $title = "Sửa Ghe";
        if (isset($_GET['id_ghe']) && $_GET['id_ghe'] > 0) {
            $id_ghe = $_GET['id_ghe'];
            $one_ghe = one_ghe($id_ghe);
            $VIEW = "ghe/update.php";
        }
        break;

    case 'sua_ghe':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $gia_ghe = $_POST['gia_ghe'];
            $ten_ghe = $_POST['ten_ghe'];
            $id_ghe = $_POST['id_ghe'];
            update_ghe($ten_ghe, $gia_ghe, $id_ghe);
        }
        $list_ghe = list_ghe();
        $VIEW = "ghe/list.php";
        break;

    case 'delete_ghe':
        if (isset($_GET['id_ghe']) && $_GET['id_ghe'] > 0) {
            $id_ghe = $_GET['id_ghe'];
            delete_ghe($id_ghe);
        }
        $list_ghe = list_ghe();
        $VIEW = "ghe/list.php";
        break;

    case 've':
        $title = "Vé";
        $VIEW = "ve/list.php";
        if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
            $email = $_POST['kyw'];
            $list_ve = tk_ve($email);
        } else {
            $kyw = "";
        }
        break;

    case 'trangthaive':
        $title = "Trạng thái vé";
        $one_ve = one_ve($_GET['id_ve']);
        $VIEW = "ve/trangthaive.php";
        break;

    case 'capnhattt':
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id_ve = $_POST['id_ve'];
            $trangthai = $_POST['trangthai'];
            if ($trangthai == 1) {
                update_ve($id_ve);
            }
        }
        header('location: index.php?act=ve');
        break;

    case 'binhluan':
        $title = "Danh sách bình luận";
        $list_bl = all_bl();
        $VIEW = "binhluan/list.php";
        break;

    case 'delete_bl':
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $id_bl = $_GET['id_bl'];

            delete_bl($id_bl);
        }
        header('location: index.php?act=binhluan');
        break;

    case 'taikhoan':
        $title = "Tài khoản";
        if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
            $email = $_POST['kyw'];
            $list_tk = list_one_khach_hang($email);
        } else {
            $kyw = "";
        }
        $VIEW = "khachhang/list.php";
        break;

    case 'delete_kh':
        $title = "Tài khoản";
        if (isset($_GET['id_kh']) && $_GET['id_kh'] > 0) {
            $id_kh = $_GET['id_kh'];
            delete_kh($id_kh);
        }
        header('location: index.php?act=taikhoan');
        break;

    case 'thongke':
        $VIEW = "public/home.php";
        break;

    case 'tongquan':
        $VIEW = "public/tongquan.php";
        break;

    default:
        $title = "Trang chủ";
        $VIEW = "public/home.php";
        break;
}

include "layout/header.php";
include "layout/left.php";
include  $VIEW;
include "layout/footer.php";
ob_end_flush();
