<?php
session_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/binhluan.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "model/thongke.php";
include "view/header.php";
include "global.php";

$sachnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        //Controller sản phẩm
        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw . $iddm);
            $tendm = loadone_ten_dm($iddm);
            include "view/sanpham.php";
            break;
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadall_sanpham($id);
                extract($onesp);
                $sp_cungloai = loadone_sanpham_cungloai($id, $iddm);
                include "view/sanphamct.php";
            } else {
                include "view/home.php";
            }
            break;
        //Controller tài khoản
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                insert_taikhoan($email, $user, $pass);
                $thongbao = "Đăng ký thành công. Vui lòng đăng nhập để thực hiện các chức năng!";
            }
            include "view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $check_user = check_user($user, $pass);
                if (is_array($check_user)) {
                    $_SESSION['user'] = $check_user;
                    $thongbao = "Đăng nhập thành công";
                    header("Location: index.php");
                } else {
                    $thongbao = "Tài khoản không tồn tại!";
                }
            }
            include 'view/taikhoan/dangky.php';
            break;
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user'] = check_user($user, $pass);
                header('Location: index.php?act=edit_taikhoan');
            }
            include 'view/taikhoan/edit_taikhoan.php';
            break;
        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                $check_email = check_email($email);
                if (is_array($check_email)) {
                    $thongbao = "Mật khẩu của bạn là: " . $check_email['pass'];
                } else {
                    $thongbao = "Email không tồn tại";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;
        case 'thoat':
            session_unset();
            header('Location: index.php');
            break;
        //controller   
        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        //Controller cart
        case "addtocart":
            include "view/cart/viewcart.php";
            break;
        case "delcart":
            header("Location: index.php?act=viewcart");
            break;
        case "viewcart":
            include "view/cart/viewcart.php";
            break;
        case "bill":
            include "view/cart/bill.php";
            break;
        case "billconfirm":
            include "view/cart/billconfirm.php";
            break;
        case "mybill":
            include "view/cart/mybill.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
