<?php
function viewvcart($del)
{
   global $img_path;
   $tong = 0;
   $i = 0;
   if ($del == 1) {
      $xoaspth = '<th>Thao tác</th>';
      $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a></td>';
   } else {
      $xoaspth = '';
      $xoasp_td = '';
   }
   echo '<tr>
               <th>Hình</th>
               <th>Sách</th>
               <th>Đơn giá</th>
               <th>Số lượng</th>
               <th>Thành tiền</th>
               ' . $xoaspth . '
            </tr>';
   foreach ($_SESSION['mycart'] as $cart) {
      $hinh = $img_path . $cart[2];
      $ttien = $cart[3] * $cart[4];
      $tong += $ttien;
      if ($del == 1) {
         $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a></td>';
      } else {
         $xoasp_td = '';
      }
      echo '<tr>
               <td><img src="' . $hinh . '" height="80px"></td>
               <td>' . $cart[1] . '</td>
               <td>' . $cart[3] . '.000 VNĐ</td>
               <td>' . $cart[4] . '</td>
               <td>' . $ttien . '.000 VNĐ</td>
               ' . $xoasp_td . '
            </tr>';
      $i += 1;
   }
   echo '<tr>
               <td colspan="4">Tổng đơn hàng</td>
               <td>' . $tong . '.000 VNĐ</td>
         </tr>';
} ?>