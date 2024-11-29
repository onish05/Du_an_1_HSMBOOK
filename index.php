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

// $sachnew = loadall_sanpham_home();
// $dsdm = loadall_danhmuc();

// if (isset($_GET['act']) && ($_GET['act'] != "")){
//     $act = $_GET['act'];
//     switch($act){
//         case 'sanpham':
//             if(isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
//                 $kyw = $_POST['kyw'];
//             } else {
//                 $kyw = "";
//             }
//             if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
//                 $iddm = $_GET['iddm'];
//             } else {
//                 $iddm = 0;
//             }
//             $dssp = loadall_sanpham($kyw. $iddm);
//             $tendm = loadall_ten_dm($iddm);
//             include "view/sanpham.php";
//             break;
//         case 'sanphamct':
//             if(isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
//                 $id = $_GET['idsp'];
//                 $onesp = loadall_sanpham($id);
//                 extract($onesp);
//                 $sp_cungloai = loadall_sanpham_cungloai($id, $iddm);
//                 include "view/sanphamct.php";
//             } else {
//                 include "view/home.php";
//             }
//             break;
//     }
// }