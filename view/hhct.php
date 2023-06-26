<div class="boxtrai mr">
    <div class="row mb">
        <div class="boxtitle">SẢN PHẨM CHI TIẾT</div>
        <div class="row boxcontent">
            <?php
            extract($hh);
            $hinhpath = "./upload/" . $hinh;
            if (is_file($hinhpath)) {
                $hinh = "<img src='" . $hinhpath . "' height='80'>";
            } else {
                $hinh = "no photo";
            }
            echo '<div class="boxsp1">
                <div class="row img">' . $hinh . '</div>
                <p> Giá sản phẩm: ' . $don_gia . '</p>
                <a href="#"> Tên sản phẩm: ' . $ten_hh . '</a>
                <p href="#">Mô tả chi tiết: ' . $mo_ta . '</p>
            </div>';
            ?>
        </div>
    </div>
    <!-- <div class="row mb">
        <div class="row boxcontent">
        <div class="formbl">
                 <form action="#" method="post">
                    Viết Bình Luận <br>
                    <textarea name="" id="" cols="80" rows="5" placeholder=""></textarea><br>
                    <input type="submit" value="Gửi bình luận">
                 </form>
            </div>
        </div>
    </div> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#binhluan").load("view/binhluan/binhluanform.php", {ma_hh: <?=$ma_hh?>});
        });
    </script>
    <div class="row" id="binhluan">
    </div>
    <div class="row mb">
        <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
        <div class="row boxcontent spcungloai">
            <?php
            foreach ($hh_cung_loai as $cung_loai) {
                extract($cung_loai);
                echo '<li><a href="index.php?act=hhct&ma_hh=' . $ma_hh . '&ma_loai=' . $ma_loai . '">' . $ten_hh . '</a> </li>';
            }
            ?>
        </div>
    </div>
</div>
<div class="boxphai ">
    <?php
    include "boxright.php";
    ?>
</div>
</div>