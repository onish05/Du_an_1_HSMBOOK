<?php
session_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/binhluan.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "model/thongke.php";
include "model/cart.php";
include "view/header.php";
include "global.php";

if (!isset($_SESSION['mycart']))
    $_SESSION['mycart'] = [];

$sachnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top10();

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
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = loadone_ten_dm($iddm);
            include "view/sanpham.php";
            break;
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];

                // Tăng lượt xem
                tang_luotxem($id);

                // Lấy thông tin sản phẩm
                $onesp = loadone_sanpham($id);
                extract($onesp);

                // Sản phẩm cùng loại
                $sp_cungloai = loadone_sanpham_cungloai($id, $iddm);

                include "view/sanphamct.php";
            } else {
                include "view/home.php";
            }
            break;

        //Controller tài khoản

        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = trim($_POST['email']);
                $user = trim($_POST['user']);
                $pass = trim($_POST['pass']);

                $errors = [];
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Email không hợp lệ";
                }


                if (empty($errors)) {
                    insert_taikhoan($email, $user, $pass);
                    $thongbao = "Đăng ký thành công. Vui lòng đăng nhập để thực hiện các chức năng!";
                }
            }
            include "view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = trim($_POST['user']);
                $pass = trim($_POST['pass']);

                $errors = [];
                if (empty($user)) {
                    $errors[] = "Tên tài khoản không được để trống!";
                }
                if (empty($pass)) {
                    $errors[] = "Mật khẩu không được để trống";
                }
                if (empty($errors)) {
                    $check_user = check_user($user, $pass);
                    if (is_array($check_user)) {
                        $_SESSION['user'] = $check_user;
                        $thongbao = "Đăng nhập thành công";
                        header("Location: index.php");
                        exit;
                    } else {
                        $thongbao = "Tài khoản không tồn tại!";
                    }
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
                update_taikhoan($id, $user, $email, $pass, $address, $tel);
                $_SESSION['user'] = check_user($user, $pass);
                header('Location: index.php?act=edit_taikhoan');
            }
            include "view/taikhoan/edit_taikhoan.php";
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
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = 1;
                $thanhtien = $soluong * $price;
                $spadd = [$id, $name, $img, $price, $soluong, $thanhtien];
                array_push($_SESSION['mycart'], $spadd);
            }
            include "view/cart/viewcart.php";
            break;
        case 'delcart':
            if (isset($_GET['idcart'])) {
                $idcart = $_GET['idcart'];
                // Xóa sản phẩm tại chỉ số idcart
                unset($_SESSION['mycart'][$idcart]);
                // Để tránh các chỉ số bị rỗng trong mảng, có thể reindex lại mảng
                $_SESSION['mycart'] = array_values($_SESSION['mycart']);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('Location: index.php?act=viewcart');
            break;
        case "viewcart":
            include "view/cart/viewcart.php";
            break;
        case "bill":
            include "view/cart/bill.php";
            break;
        case "billconfirm":
            // tạo bill
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                $name = $_POST['name'];
                if(isset($_SESSION['user'])) $iduser=$_SESSION['user']['id'];    
                else $id = 0;
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $pttt  = $_POST['pttt'];
                $ngaydathang = date('Y-m-d H:i:s');
                $tongdonhang=tongdonhang();

                $idbill=insert_bill($iduser,$name,$email,$address, $tel,$pttt, $ngaydathang, $tongdonhang);

                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['user']['id'],$cart[0],$cart[2],$cart[1],$cart[3],$cart[4],$cart[5],$idbill);
            }
            $_SESSION['cart']=[];
        }

        $bill=loadone_bill($idbill);
        $billct=loadall_cart($idbill);
            include "view/cart/billconfirm.php";
            break;
        case "mybill":
            $listbill=loadall_bill($_SESSION['user']['id']);
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
