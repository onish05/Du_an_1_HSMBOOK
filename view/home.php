<div class="row mb">
   <div class="boxtrai mr">
      <div class="row">
         <div class="banner">
            <!-- Slideshow container -->
            <div class="slideshow-container">

               <!-- Full-width images with number and caption text -->
               <div class="mySlides fade">
                  <img src="../view/img/slide/1.webp" style="width:100%">

               </div>

               <div class="mySlides fade">
                  <img src="../view/img/slide/2.webp" style="width:100%">
               </div>

               <div class="mySlides fade">
                  <img src="../view/img/slide/3.webp" style="width:100%">
               </div>

               <!-- Next and previous buttons -->
               <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
               <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

            <!-- The dots/circles -->
            <div style="text-align:center">
               <span class="dot" onclick="currentSlide(1)"></span>
               <span class="dot" onclick="currentSlide(2)"></span>
               <span class="dot" onclick="currentSlide(3)"></span>
            </div>
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
                  <img src="' . $hinh . '" width="300px"  alt="" />
               </a>
            </div>
            <p>' . $price . '.000đ</p>
            <a href="' . $linksp . '"><div class="ten">' . $name . '</div></a>
            <form action="index.php?act=addtocart" method="post">
               <input type="hidden" name="id" value="'.$id.'">
               <input type="hidden" name="name" value="'.$name.'">
               <input type="hidden" name="img" value="'.$img.'">
               <input type="hidden" name="price" value="'.$price.'">
               <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
            </form>
         </div>';
            $i += 1;
         }
         ?>
      </div>
   </div>
   <script>
      let slideIndex = 0;
      showSlides();

      function showSlides() {
         let i;
         let slides = document.getElementsByClassName("mySlides");
         for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
         }
         slideIndex++;
         if (slideIndex > slides.length) {
            slideIndex = 1
         }
         slides[slideIndex - 1].style.display = "block";
         setTimeout(showSlides, 2000); // Change image every 2 seconds
      }
   </script>
   <div class="boxphai">
      <?php include "boxright.php"; ?>
   </div>
</div>