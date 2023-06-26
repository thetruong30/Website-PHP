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
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/main.css'>
</head>

<body>
    <div class="container">
        <div class="row frmtitle">
            <h1>Thêm mới loại hàng</h1>
        </div>
        <div class="row frmcontent">
            <form action="index.php?act=addlh" method="post">
                <div class="row mb10 text">
                    Mã loại <br>
                    <input type="text" name="ma_loai" disabled>
                </div>
                <div class="row mb10 text">
                    Tên loại <br>
                    <input type="text" name="ten_loai">
                    <span style="color:red">
                        <?= $errors['ten_loai'] ?? '' ?>
                    </span>
                </div>

                <div class="row mb10">
                    <input type="submit" name="btn_insert" value="THÊM MỚI">
                    <input type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listlh"><input type="button" value="DANH SÁCH"></a>
                </div>

            </form>
        </div>
    </div>
</body>