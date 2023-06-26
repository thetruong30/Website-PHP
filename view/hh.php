<div class="boxtrai mr">
    <div class="row mb">
        <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
        <div class="row boxcontent">
            <?php
            foreach ($listsp as $sp) {
                extract($sp);
                $hinhpath = $img_path . $hinh;
                if (is_file($hinhpath)) {
                    $hinh = "<img src='" . $hinhpath . "' height='80'>";
                } else {
                    $hinh = "no photo";
                }
                echo '<div class="boxsp">
                            <div class="row img">' . $hinh . '</div>
                            <p>' . $don_gia . '</p>
                            <a href="index.php?act=hhct&ma_hh=' . $ma_hh . '&ma_loai='.$ma_loai.'">' . $ten_hh . '</a>  
                        </div>';
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