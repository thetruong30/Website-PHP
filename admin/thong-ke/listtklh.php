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
            <h1>THỐNG KÊ</h1>
        </div>
        <?php
        if (isset($thongbao)) {
            echo '<script type="text/javascript">

            window.onload = function () { alert("' . $thongbao . '"); }

</script>';
        }
        ?>
        <div class="row frmcontent">
            <div class="row mb10 frmdsloai">
                <table>
                    <tr>
                        <th>MÃ DANH MỤC</th>
                        <th>TÊN DANH MỤC</th>
                        <th>SỐ LƯỢNG</th>
                        <th>GIÁ CAO NHẤT</th>
                        <th>GIÁ THẤP NHẤT</th>
                        <th>GIÁ TRUNG BÌNH</th>
                    </tr>
                    <?php
                    foreach ($listtklh as $tk) {
                        extract($tk);
                        echo '<tr>
                        <td>' . $ma_loai . '</td>
                        <td>' . $ten_loai . '</td>
                        <td>' . $so_luong . '</td>
                        <td>' . $gia_max . '</td>
                        <td>' . $gia_min . '</td>
                        <td>' . $gia_avg . '</td>
                        </tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>