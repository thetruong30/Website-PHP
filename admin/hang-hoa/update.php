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
if (is_array($hh)) {
    $listlh = loai_select_all();
    extract($hh);
    
}

$hinhpath = "../upload/" . $hinh;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height='80'>";
} else {
    $hinh = "no photo";
}
?>
<div class="container">
    <div class="row frmtitle">
        <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=updatehh" method="post" enctype="multipart/form-data">
            <div class="row mb10 text">
                Mã hàng hóa <br>
                <input type="text" name="ma_hh" disabled>
            </div>
            <div class="row mb10 text">
                Tên hàng hóa <br>
                <input type="text" name="ten_hh" value="<?php if (isset($ten_hh) && ($ten_hh != "")) echo $ten_hh; ?>">
            </div>
            <div class="row mb10 text row2">
                Đơn giá <br>
                <input type="number" name="don_gia" value="<?php if (isset($don_gia) && ($don_gia != "")) echo $don_gia; ?>">
            </div>
            <div class="row mb10 text row2">
                Giảm giá <br>
                <input type="number" name="giam_gia" value="<?php if (isset($giam_gia) && ($giam_gia != "")) echo $giam_gia; ?>">
            </div>
            <div class="row mb10 row2">
                Đặc biệt <br>
                <input type="number" name="dac_biet" min="1" max="10" value="<?php if (isset($dac_biet) && ($dac_biet != "")) echo $dac_biet; ?>">
            </div>
            <div class="row mb10 text">
                Hình <br>
                <?=$hinh ?>
                <input type="hidden" name="img" value="<?= $hinh ?>">
                <input type="file" name="hinh">
            </div>
            <div class="row mb10 text row2">
                Số lượt xem <br>
                <input type="number" name="so_luot_xem" value="<?php if (isset($so_luot_xem) && ($so_luot_xem != "")) echo $so_luot_xem; ?>">
            </div>
            <div class="row mb10 text row2">
                Ngày nhập <br>
                <input type="date" name="ngay_nhap" value="<?php if (isset($ngay_nhap) && ($ngay_nhap != "")) echo $ngay_nhap; ?>">
            </div>
            <div class="row mb10 text row3">
                Mô tả <br>
                <textarea cols="30" rows="10" name="mo_ta"><?= $mo_ta ?></textarea>
            </div>
            <select name="ma_loai" id="">
                <?php foreach ($listlh as $lh) : ?>
                    <option value="<?= $lh['ma_loai'] ?>">
                        <?= $lh['ten_loai'] ?>
                    </option>
                <?php endforeach ?>
            </select>
            <div class="row mb10 mt">
                <input type="hidden" name="ma_hh" value="<?php if (isset($ma_hh) && ($ma_hh > 0)) echo $ma_hh; ?>">
                <input type="submit" name="updatehh" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listhh"><input type="button" value="DANH SÁCH"></a>
            </div>

        </form>
    </div>
</div>