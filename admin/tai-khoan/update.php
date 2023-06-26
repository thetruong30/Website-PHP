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
    <div class="row">
        <div class="frmtitle mb text"><h1>CẬP NHẬT TÀI KHOẢN</h1></div>
        <div class="row boxcontent">
            <?php
                if (is_array($kh)) {
                    $listkh = khach_hang_select_all();
                    extract($kh);
                    
                }
            ?>
            <form action="index.php?act=updatekh" method="post" enctype="multipart/form-data">
                <select name="vai_tro" id="">
                        <option value="0">
                            Khách hàng
                        </option>
                        <option value="1">
                            Nhân viên
                        </option>
                </select>
                <input type="submit" value="Cập nhật" name="updatekh">
                <input type="hidden" name="ma_kh" value="<?=$ma_kh?>">
                <input type="hidden" name="kich_hoat" value="0">
                <input type="reset" value="Nhập lại">
            </form>
        </div>
    </div>
</div>
</div>