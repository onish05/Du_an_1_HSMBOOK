<div class="row mb">

    <div class="boxtrai mr">
        <div class="row mb">
            <?php
            extract($onesp);
            ?>
            <div class="boxtitle"><?= $name ?></div>
            <div class="row boxcontent">
                <?php
                $img = $img_path . $img;
                echo '<div  class="row mb spct"><img src="' . $img . '" width="50%"/></div><br>';
                echo "<p><b>Tác giả:</b> $tacgia</p>";
                echo $mota; 
                ?>
            </div>
        </div>
        <div class="row">
            <iframe src="view/binhluan/formbinhluan.php?idpro=<?= $id?>" frameborder="0" width="100%" height="300px"></iframe>
        </div>
        <div class="row mb">
            <div class="boxtitle">Sản phẩm cùng loại</div>
            <div class="row boxcontent">
                <?php
                foreach ($sp_cungloai as $sp_cungloaii) {
                    extract($sp_cungloaii);
                    $linksp = "index.php?act=sanphamct&idsp" . $id;
                    echo '<li class="row mb10 spcl"><a href="' . $linksp . '">' . $name . '</a></li>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="boxphai">
        <?php include "boxright.php"; ?>
    </div>
</div>