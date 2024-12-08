<?php
function loadall_taikhoan()
{
    $sql = "SELECT * FROM taikhoan order by id desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}
function delete_taikhoan($id)
{
    $sql = "DELETE FROM taikhoan WHERE id = " . $id;
    pdo_execute($sql);
}
function insert_taikhoan($email, $user, $pass)
{
    $sql = "INSERT INTO taikhoan(`email`,`user`,`pass`) VALUE ('$email','$user','$pass')";
    pdo_execute($sql);
}
function check_user($user, $pass)
{
    $sql = "SELECT * FROM `taikhoan` WHERE user = '$user' AND pass ='$pass' ";
    $sp = pdo_query_one($sql);
    return $sp;
}
function check_email($email)
{
    $sql = "SELECT * FROM `taikhoan` WHERE email = '$email'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function update_taikhoan($id, $user, $email, $pass, $address, $tel)
{
    $sql = "UPDATE taikhoan SET user = '" . $user . "', email = '" . $email . "' , pass = '" . $pass . "', address = '" . $address  . "', tel = '" . $tel . "' WHERE id = " . $id;
    pdo_execute($sql);
}
function tang_luotxem($id) {
    $sql = "UPDATE sanpham SET luotxem = luotxem + 1 WHERE id = ?";
    pdo_execute($sql, $id);
}
