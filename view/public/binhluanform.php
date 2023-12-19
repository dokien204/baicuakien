<?php
include "../../model/pdo.php";
include "../../model/binhluan/binhluan.php";
session_start();
$id_phim = $_REQUEST['id_phim'];

$list_bl = list_bl($id_phim);
?>

<style>
.author {
    border-right: 1px dashed #dfdfdf;
}
</style>

<?php foreach ($list_bl  as $bl) : ?>
<?php extract($bl) ?>
<div style="padding: 20px 0;" class="movie-review-item">
    <div class="author">
        <div class="movie-review-info">
            <?php
                $timestamp = strtotime($ngay_bl);
                $fm_date = date("d/m/Y", $timestamp);
                ?>
            <span class="reply-date"><?= $fm_date ?></span>
            <h8><?= $email ?></h8>
        </div>
    </div>
    <div style="padding-left: 50px;" class="movie-review-content">
        <h6><?= $noi_dung ?></h6>
    </div>
</div>
<?php endforeach ?>
<br>
<?php if (isset($_SESSION['khach_hang'])) { ?>
<?php $id_kh = $_SESSION['khach_hang']['id_kh']; ?>
<div>
    <form id="commentForm" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="id_phim" value="<?= $id_phim ?>">
        <input type="hidden" name="id_kh" value="<?= $id_kh ?>">
        <input type="text" name="binhluan" id="comment" placeholder="Nội dung bình luận"
            style="resize: vertical; width: 80%; height: 60px; margin-left: 80px;"></input>
        <input type="submit" name="guibl" id="submitComment" class="btn btn-outline-success text-center"
            style="width: 100px; height: 60px; margin-top: -5px;"></input>
    </form>
</div>
<?php } ?>
<?php
if (isset($_POST['guibl']) && ($_POST['guibl'])) {
    $noi_dung = $_POST['binhluan'];
    $id_phim = $_POST['id_phim'];
    $id_kh = $_POST['id_kh'];
    $ngay_bl = date('Y-m-d', strtotime('today'));


    add_binhluan($noi_dung, $ngay_bl, $id_kh, $id_phim);

    header("location: " . $_SERVER['HTTP_REFERER']);
}
?>