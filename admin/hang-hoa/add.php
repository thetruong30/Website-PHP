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
<div class=" container">
    <div class="row frmtitle">
        <h1>THÊM MỚI HÀNG HÓA</h1>
    </div>
    <div class="row frmcontent">
        <form action="index.php?act=addhh" method="post" enctype="multipart/form-data">
            <div class="row row2 mb10 text">
                Mã hàng hóa <br>
                <input type="text" name="ma_hh" disabled>
            </div>
            <div class="row row2 mb10 text">
                Tên hàng hóa <br>
                <input type="text" name="ten_hh" value="<?= $ten_hh ?? '' ?>">
                <span style="color:red">
                    <?= $errors['ten_hh'] ?? '' ?>
                </span>
            </div>

            <div class="row mb10 text row2">
                Đơn giá <br>
                <input type="number" name="don_gia" value="<?= $number ?? '' ?>">
                <span style="color:red">
                    <?= $errors['don_gia'] ?? '' ?>
                </span>
            </div>

            <div class="row row2 mb10 text">
                Giảm giá <br>
                <input type="text" name="giam_gia" value="<?= $giam_gia ?? '' ?>">
                <span style="color:red">
                    <?= $errors['giam_gia'] ?? '' ?>
                </span>
            </div>

            <div class="row mb10 text row2">
                Đặc biệt <br>
                <input type="number" name="dac_biet" min="1" max="10" value="<?= $dac_biet ?? '' ?>">
                <span style="color:red">
                    <?= $errors['dac_biet'] ?? '' ?>
                </span>
            </div>

            <div class="row mb10 text">
                Hình <br>
                <input type="file" name="hinh" value="<?= $hinh ?? '' ?>">
                <span style="color:red">
                    <?= $errors['hinh'] ?? '' ?>
                </span>
            </div>

            <div class="row row2 mb10 text">
                Số lượt xem <br>
                <input type="number" name="so_luot_xem" value="<?= $so_luot_xem ?? '' ?>">
                <span style="color:red">
                    <?= $errors['so_luot_xem'] ?? '' ?>
                </span>
            </div>

            <div class="row row2 mb10 text">
                Ngày nhập <br>
                <input type="date" name="ngay_nhap" value="<?= $ngay_nhap ?? '' ?>">
                <span style="color:red">
                    <?= $errors['ngay_nhap'] ?? '' ?>
                </span>
            </div>

            <div class="row row3 mb10 text">
                Mô tả <br>
                <textarea cols="30" rows="10" name="mo_ta" value="<?= $mo_ta ?? '' ?>"></textarea>
                <span style="color:red">
                    <?= $errors['mo_ta'] ?? '' ?>
                </span>
            </div>

            <select name="ma_loai" id="">
                <?php foreach ($listlh as $lh) : ?>
                    <option value="<?= $lh['ma_loai'] ?>">
                        <?= $lh['ten_loai'] ?>
                    </option>
                <?php endforeach ?>
            </select>
            <div class="row mb10 mt">
                <input type="submit" name="btn_insert" value="THÊM MỚI">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listhh"><input type="button" value="DANH SÁCH"></a>
            </div>

        </form>
    </div>
</div>