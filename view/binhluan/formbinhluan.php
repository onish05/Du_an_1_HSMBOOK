<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
$idpro = $_REQUEST['idpro'];
$dsbl = loadall_binhluan($idpro); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/css.css">
    <style>
        body {
            margin: 0;
        }
        * {
            font-size: 1.5vw;
        }
    </style>
</head>
<body>
    <div class="row mb">
        <div class="boxtitle">Bình luận</div>
        <div class="boxcontent2 binhluan">
            <table>
                <?php  
                foreach ($dsbl as $bl) {
                    extract($bl);
                    echo '<tr><td>' . $noidung  . '</td>';
                    echo '<td>' . $iduser . '</td>';
                    echo '<td>'. $ngaybinhluan .'</td></tr>';
                }
                ?>
            </table>
        </div>
        <div class="boxfooter binhluanform">
            <form action="<?=$_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="idpro" value="<?= $idpro ?>">
                <input type="text" name="noidung" id="">
                <input type="submit" value="Gửi bình luận" name="guibinhluan">
            </form>
        </div>
        <?php
        if(isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
                $noidung = $_POST['noidung'];
                $idpro = $_POST['idpro'];
                $iduser = $_POST['iduser'];
                $ngaybinhluan = date('d/m/Y H:i:s');
                insert_binhluan($noidung, $ngaybinhluan, $iduser, $idpro);
                header("location: " . $_SERVER['HTTP_REFERER']);
        }
        ?>
    </div>
</body>
</html> 