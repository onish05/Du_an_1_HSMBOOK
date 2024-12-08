<div class="row mb">
   <div class="boxtrai mr">
      <form action="index.php?act=billconfirm" method="post">
         <div class="row mb">
            <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
            <div class="row boxcontent billform">
               <?php
               if (isset($_SESSION['user'])) {
                  $name = $_SESSION['user']['user'];
                  $address = $_SESSION['user']['address'];
                  $email = $_SESSION['user']['email'];
                  $tel = $_SESSION['user']['tel'];
               } else {
                  $name = "";
                  $address = "";
                  $email = "";
                  $tel = "";
               }
               ?>
               <table>
                  <tr>
                     <td>Người đặt hàng</td>
                     <td><input type="text" name="name" id="name" value="<?= $name ?>"></td>
                  </tr>
                  <tr>
                     <td>Địa chỉ</td>
                     <td><input type="text" name="address" id="address" value="<?= $address ?>"></td>
                  </tr>
                  <tr>
                     <td>Email</td>
                     <td><input type="email" name="email" id="email" value="<?= $email ?>"></td>
                  </tr>
                  <tr>
                     <td>Điện thoại</td>
                     <td><input type="tel" name="tel" id="tel" value="<?= $tel ?>"></td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="row mb">
            <div class="boxtitle">PHƯƠNG THỨC THANH TOÁN</div>
            <div class="row ptttall">
               <table>
                  <tr>
                     <td><input type="radio" name="pttt" value="COD" checked> Trả tiền khi nhận hàng</td>
                     <td><input type="radio" name="pttt" value="bank"> Chuyển khoản ngân hàng</td>
                     <td><input type="radio" name="pttt" value="online"> Thanh toán online</td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="row mb">
            <div class="boxtitle">GIỎ HÀNG</div>
            <div class="row boxcontent cart">
               <table class="tablebill">
                  <?php
                  viewvcart(0);
                  ?>
               </table>
            </div>
         </div>
         <div class="row mb bill">
            <a href="index.php?act=billconfirm"><input type="submit" value="ĐẶT HÀNG"></a>
         </div>
      </form>
   </div>
   <div class="boxphai">
      <?php include "view/boxright.php"; ?>
   </div>
</div>