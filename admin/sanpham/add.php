<div class="row">
   <div class="row formtitle">
      <h2>THÊM SẢN PHẨM</h2>
   </div>
   <div class="row formcontent">
      <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
         <div class="row mb10">
            Danh mục<br />
            <div class="chondm">
               <select name="iddm">
                  <option value="0">Tất cả</option>
                  <?php
                  foreach ($listdanhmuc as $danhmuc) {
                     extract($danhmuc);
                     echo '<option value="' . $id . '">' . $name . '</option>';
                  }
                  ?>
               </select>
            </div>
         </div>
         <div class="row mb10">
            Tên sản phẩm <br />
            <input type="text" name="tensach" />
         </div>
         <div class="row mb10">
            Tên tác giả <br />
            <input type="text" name="tacgia" />
         </div>
         <div class="row mb10">
            Giá <br />
            <input type="text" name="giasach" />
         </div>
         <div class="row mb10">
            Hình <br />
            <input type="file" name="hinh">
         </div>
         <div class="row mb10">
            Mô tả <br />
            <textarea name="mota" rows="2" cols="100"></textarea>
         </div>
         <div class="row mb10">
            <input type="submit" name="themmoi" value="Thêm mới" />
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