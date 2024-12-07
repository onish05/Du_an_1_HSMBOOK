<div class="row mb">
   <div class="boxtrai mr">
      <div class="row mb">
         <div class="boxtitle">GIỎ HÀNG</div>
         <div class="row boxcontent formdslh cart">
            <table>
               <tr>
                  <th>Hình</th>
                  <th>Sản phẩm</th>
                  <th>Đơn giá</th>
                  <th>Số lượng</th>
                  <th>Thành tiền</th>
                  <th>Thao tác</th>
               </tr>
               <?php
               $tong = 0;
               foreach ($_SESSION['mycart'] as $cart) {
                  $hinh = $img_path . $cart['img'];
                  $thanhtien = $cart['soluong'] * $cart['price'];
                  $tong += $thanhtien;
                  echo '
                  <tr>
                  <td><img src="' . $hinh . '" alt="" height="80px"></td>
                  <td>' . $cart['name'] . '</td>
                  <td>' . $cart['price'] . ' .000 VNĐ</td>
                  <td>' . $cart['soluong'] . '</td>
                  <td>' . $thanhtien . ' .000 VNĐ</td>
                  <td><input type="button" value="Xóa"></td>
               </tr>
                  ';
               }
               echo '<tr>
                  <td colspan="4">Tổng đơn hàng</td>
                  <td>' . $tong . ' .000 VNĐ</td>
                  <td></td>
               </tr>';
               ?>
               <!-- <tr>
                  <td>1</td>
                  <td><img src="" alt="" height="80px"></td>
                  <td>Sách hay</td>
                  <td>50</td>
                  <td>2</td>
                  <td>100 VNĐ</td>
                  <td><input type="button" value="Xóa"></td>
               </tr> -->
            </table>
         </div>
      </div>
      <div class="row mb bill">
         <input type="submit" value="ĐỒNG Ý ĐẶT HÀNG">
         <a href="index.php?act=delcart"> <input type="button" value="XÓA GIỎ HÀNG"></a>
      </div>
   </div>
   <div class="boxphai">
      <?php
      include "view/boxright.php";
      ?>
   </div>
</div>