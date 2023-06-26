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
<?php
    if(is_array($lh)){
        extract($lh);
    }
?>
<div class="container">
    <div class="row frmtitle">
        <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=updatelh" method="post">
            <div class="row md10 text">
                Mã loại <br>
                <input type="text" name="ma_loai" disabled>
            </div>
            <div class="row mb10 text">
                Tên loại <br>
                <input type="text" name="ten_loai" value="<?php if(isset($ten_loai)&& ($ten_loai!="")) echo $ten_loai;?>">
            </div>
            <span style="color:red">
                    <?= $errors['ten_loai'] ?? '' ?>
                </span>
            <div class="row mb10">
                <input type="hidden" name="ma_loai" value="<?php if(isset($ma_loai)&& ($ma_loai>0)) echo $ma_loai;?>">
                <input type="submit" name="updatelh" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listlh"><input type="button" value="DANH SÁCH"></a>
            </div>
            
        </form>
    </div>
</div>