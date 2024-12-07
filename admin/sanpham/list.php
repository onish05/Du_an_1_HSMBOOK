<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Danh sách sản phẩm</title>
   <link rel="stylesheet" href="./css/css.css">
</head>

<body>
   <div class="row">
      <div class=" row frmtitle mb">
         <h2>DANH SÁCH SẢN PHẨM</h2>
      </div>
      <div class="formtimkiem">
         <form action="#" method="post">
            <input type="text" name="kyw">
            <select name="iddm">
               <option value="0" selected>Tất cả</option>
               <?php
               foreach ($listdanhmuc as $danhmuc) {
                  extract($danhmuc);
                  echo '<option value="' . $id . '">' . $name . '</option>';
               }
               ?>
            </select>
            <input type="submit" name="listok" value="Go">
         </form>
      </div>
      <div class="row formcontent">
         <div class="row mb10 formdslh">
            <table>
               <tr>
                  <th></th>
                  <th>Mã sản phẩm</th>
                  <th>Tên sách</th>
                  <th>Tên tác giả</th>
                  <th>Hình sản phẩm</th>
                  <th>Giá</th>
                  <th>Lượt xem</th>
                  <th></th>
               </tr>
               <?php
               foreach ($listsanpham as $sanpham) {
                  extract($sanpham);
                  $suasp = "index.php?act=suasp&id=" . $id;
                  $xoasp = "index.php?act=xoasp&id=" . $id;
                  $hinhpath = "../upload/" . $img;
                  $luotxem = 0;

                  if (is_file($hinhpath)) {
                     $hinh = "<img src='" . $hinhpath . "' height='80'>";
                  } else {
                     $hinh = "no photo";
                  }
                  echo ' <tr>
               <td><input type="checkbox" name="check" id="" /></td>
               <td>' . $id . '</td>
               <td>' . $name . '</td>
               <td>' . $tacgia . '</td>
               <td>' . $hinh . '</td>
               <td>' . $price . '</td>
               <td>' . $luotxem . '</td>
               <td>
                  <a href="' . $suasp . '"><input type="button" value="Sửa" /></a>
                  <a href="' . $xoasp . '"><input type="button" value="Xóa" /></a>
               </td>
            </tr>';
               }
               ?>
            </table>
         </div>
         <div class="row mb10">
            <input type="button" value="Chọn tất cả" />
            <input type="button" value="Bỏ chọn tất cả" />
            <input type="button" value="Xóa các mục đã chọn" />
            <a href="index.php?act=addsp"><input type="button" value="Nhập thêm" /></a>
         </div>
      </div>
   </div>
</body>

</html>