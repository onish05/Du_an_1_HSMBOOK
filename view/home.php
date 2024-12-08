<div class="row mb">
   <div class="boxtrai mr">
      <div class="row">
         <div class="banner">
            <div class="slideshow-container">

               <div class="mySlides fade">
                  <img src="view/img/slide/1.jpg" alt="" style="width:100%">
               </div>
               <div class="mySlides fade">
                  <img src="view/img/slide/2.jpg" alt="" style="width:100%">
               </div>
               <div class="mySlides fade">
                  <img src="view/img/slide/3.jpg" alt="" style="width:100%">
               </div>
            </div>
            <br>
         </div>
      </div>
      <div class="row">
         <?php
         $i = 0;
         foreach ($sachnew as $sp) {
            extract($sp);
            $hinh = $img_path . $img;
            $linksp = "index.php?act=sanphamct&idsp=" . $id;
            if (($i == 2) || ($i == 5) || ($i == 8)) {
               $mr = "";
            } else {
               $mr = "mr";
            }
            echo '<div class="boxsp ' . $mr . '">
               <div class="row img">
               <a href="' . $linksp . '">
                <img src="' . $hinh . '" height="400px" alt="" />
               </a>
            </div>
            <p>' . $price . '.000đ</p>
            <a href="' . $linksp . '"><div class="ten">' . $name . '</div></a>
           <div class="row btnaddtocart">
           <form action="index.php?act=addtocart" method="post">
               <input type="hidden" name="id " value="' . $id . '">
               <input type="hidden" name="name " value="' . $name . '">
               <input type="hidden" name="img " value="' . $img . '">
               <input type="hidden" name="price " value="' . $price . '">
               <input type="submit" name="addtocart" class="addtocart" value="Thêm vào giỏ hàng">
            </form>
           </div>
         </div>';
            $i += 1;
         }
         ?>
      </div>
   </div>
   <div class="boxphai">
      <?php include "boxright.php"; ?>
   </div>
</div>