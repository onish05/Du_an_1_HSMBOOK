<div class="row mb">
   <div class="boxtitle">TÀI KHOẢN</div>
   <div class="boxcontent formtaikhoan">
   <?php
if (isset($_SESSION['user'])){
    extract($_SESSION['user']);
?>
    <div class="row mb10">
        <b>Xin chào: <?=$user?></b>
    </div>
    <div class="row mb10">
        <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
        <li><a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>
        <?php if (isset($role) && $role == 1): ?>
            <li><a href="admin/index.php">Đăng nhập Admin</a></li>
        <?php endif; ?>
        <li><a href="index.php?act=thoat">Thoát</a></li>
    </div>
<?php
} else {
?>
    <form action="index.php?act=dangnhap" method="post">
        <div class="row mb10">
            Tên đăng nhập <br>
            <input type="text" name="user">
        </div>
        <div class="row mb10">
            Mật khẩu <br>
            <input type="password" name="pass">
        </div>
        <div class="row mb10">
            <input type="checkbox" name="remember"> Ghi nhớ tài khoản?
        </div>
        <div class="row mb10">
            <input type="submit" value="Đăng nhập" name="dangnhap">
        </div>
    </form>
    <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
    <li><a href="index.php?act=dangky">Đăng ký thành viên</a></li>
<?php
}
?>

<div class="row mb">
   <div class="boxtitle">DANH MỤC</div>
   <div class="boxcontent2">
      <div class="menudoc listdm">
         <?php
         foreach ($dsdm as $dm) {
            extract($dm);
            $linkdm = "index.php?act=sanpham&iddm=" . $id;
            echo '<ul><a href="' . $linkdm . '"><li>' . $name . '</li></a></ul>';
         }
         ?>
      </div>
   </div>
   <div class="boxfooter searchbox">
      <form action="index.php?act=sanpham" method="post">
         <input type="text" name="kyw" />
         <input type="submit" name="timkiem" value="Tìm" />
      </form>
   </div>
</div>
<div class="row">

   <div class="boxtitle">Top 10 sách yêu thích</div>
   <div class="top10">
      <?php
      foreach ($dstop10 as $sp) {
         extract($sp);
         $linksp = "index.php?act=sanphamct&idsp=" . $id;
         $img = $img_path . $img;
         echo '<div class="row mb10 top10">
                        <a href="' . $linksp . '"><img src="' . $img . '" width="300px" alt="" /></a>
                        <a href="' . $linksp . '">' . $name . '</a>
                     </div>';
                  }
                  ?>
               </div>
            </div>
         </div>
      
   </div>