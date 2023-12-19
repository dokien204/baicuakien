<?php
// thêm khách hàng 
function insert_khach_hang($email, $pass)
{
    $sql = "INSERT INTO  khach_hang(email,mat_khau) VALUES('$email','$pass')";
    pdo_execute($sql);
}
//check email nhập vào đã tồn tại hay chưa
function check_email($email)
{
    $sql = "SELECT * FROM khach_hang WHERE email = '" . $email . "' ";
    $kh = pdo_query_one($sql);
    return $kh;
}
//check email mật khẩu đã tồn tại hay chưa 
function check_khach_hang($email, $pass)
{
    $sql = "SELECT * FROM khach_hang WHERE email = '" . $email . "' AND mat_khau='" . $pass . "' ";
    $kh = pdo_query_one($sql);
    return $kh;
}

function dangxuat()
{
    if (isset($_SESSION['khach_hang'])) {
        unset($_SESSION['khach_hang']);
    } else {
        unset($_SESSION['admin']);
    }
}

function lay1_tk($email)
{
    $sql = "select * from khach_hang where email = '$email'";
    $khach_hang = pdo_query_one($sql);
    return $khach_hang;
}

function lay_email($id_kh)
{
    $sql = "select * from khach_hang where id_kh = ?";
    $email = pdo_query_one($sql, $id_kh);
    return $email;
}


//xoá người dùng
function delete_kh($id_kh)
{
    $sql = "update khach_hang set trang_thai = 0 where id_kh = ?";
    pdo_execute($sql, $id_kh);
}
// list người dùng
function list_khach_hang()
{
    $sql = "select * from khach_hang";
    $list_tk = pdo_query($sql);
    return $list_tk;
}

// list one người dùng
function list_one_khach_hang($email)
{
    $sql = "select * from khach_hang where email = ? ";
    $list_tk = pdo_query($sql, $email);
    return $list_tk;
}

function update_mk($id_kh, $mk_moi)
{
    $sql = "update khach_hang set mat_khau = ? where id_kh = ?";
    pdo_execute($sql, $mk_moi, $id_kh);
}