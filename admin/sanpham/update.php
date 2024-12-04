<?php
if (is_array($sanpham)) {
   extract($sanpham);
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
   $hinh = "<img src='" . $hinhpath . "' height='80'>";
} else {
   $hinh = "không có hình ảnh";
}
?>

<div class="row">
   <div class="row formtitle">
      <h2>CẬP NHẬT SẢN PHẨM</h2>
   </div>
   <div class="row formcontent">
      <form action="index.php?act=updatesp&id=<?= $id ?>" method="POST" enctype="multipart/form-data">
         <div class="row mb10">
            <div class="chondm">
               <select name="iddm">
                  <option value="0">Tất cả</option>
                  <?php
                  foreach ($listdanhmuc as $danhmuc) {
                     extract($danhmuc);
                     if ($iddm == $danhmuc['id'])
                        $s = "selected";
                     else
                        $s = "";
                     echo '<option value="' . $danhmuc['id'] . '" ' . $s . '>' . $danhmuc['name'] . '</option>';
                  }
                  ?>
               </select>
            </div>
         </div>
         <div class="row mb10"> 
            Tên sản phẩm <br />
            <input type="text" name="tensp" value="<?= $sanpham['name'] ?>" />
         </div>
         <div class="row mb10">
            Tên tác giả <br />
            <input type="text" name="tacgia" value="<?= $sanpham['tacgia'] ?>" />
         </div>
         <div class="row mb10">
            Giá <br />
            <input type="text" name="giasp" value="<?= $sanpham['price'] ?>" />
         </div>
         <div class="row mb10">
            Hình <br />
            <table>
               <tr>
                  <td>
                     <input type="file" name="hinh">
                  </td>
                  <td>
                     <?= $hinh ?>
                  </td>
               </tr>
            </table>
         </div>
         <div class="row mb10">
            Mô tả <br />
            <textarea name="mota" rows="2" cols="100"><?= $sanpham['mota'] ?></textarea>
         </div>
         <div class="row mb10">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" name="capnhat" value="Cập nhật" />
            <input type="reset" value="Nhập lại" />
            <a href="index.php?act=listsp"><input type="button" value="Danh sách" /></a>
         </div>
         <?php
         if (isset($thongbao) && ($thongbao != "")) {
            echo $thongbao;
         }
         ?>
          </form>
   </div>
</div>
</div>