<?php

if (!$_SESSION['user']) {
    header("location: ../index.php");
    die;
} else {
    extract($_SESSION['user']);
    if ($vai_tro == 0) {
        header("location: ../index.php");
    }
} ?>
    <div class="container">
    <div class="row mb">
        <div class="frmtitle"><h1>CẬP NHẬT BÌNH LUẬN</h1></div>
        <div class="row boxcontent mt">
            <?php
                if (is_array($bl)) {
                    $listbl = binh_luan_select_all();
                    extract($bl);
                    
                }
            ?>
            <form action="index.php?act=updatebl" method="post">
                <input type="hidden" name=ma_bl value="<?= $ma_bl ?>">
                <input type="text" name="noi_dung">
                <input type="submit" value="Cập nhật" name="updatebl">
            </form>
        </div>
    </div>
</div>
</div>