<div class="row mb">
   <div class="boxtrai mr">
      <div class="boxtitle">ĐĂNG KÝ</div>
      <div class="row boxcontent formtaikhoan">
         <form action="index.php?act=dangky" method="post">
            <div class="row mb10">
               Tên đăng nhập
               <input type="text" name="user">
            </div>
            <div class="row mb10">
               Mật khẩu
               <input type="password" name="pass">
            </div>
            <div class="row mb10">
               Email
               <input type="email" name="email">
            </div>
            <div class="row mb10">
               <input type="submit" name="dangky" value="Đăng ký">
               <input type="reset" value="Nhập lại">
            </div>
         </form>
         <h2 class="thongbao">
            <?php
            if (isset($thongbao) && ($thongbao != "")) {
               echo $thongbao;
            }
            ?>
         </h2>
      </div>
   </div>
   <div class="boxphai">
      <?php include "view/boxright.php"; ?>
   </div>
</div>