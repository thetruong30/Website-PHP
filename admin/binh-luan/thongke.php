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
        <h1>THỐNG KÊ BÌNH LUẬN</h1>
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
                    <th></th>
                    <th>MÃ HÀNG HÓA</th>
                    <th>TÊN HÀNG HÓA</th>
                    <th>BÌNH LUẬN MỚI NHẤT</th>
                    <th>BÌNH LUẬN CŨ NHẤT</th>
                    <th></th>
                </tr>
                <?php
                foreach ($listbl as $bl) {
                    extract($bl);
                    // $suabl = "index.php?act=suabl&ma_bl=" . $ma_bl;
                    $chitietbl = "index.php?act=ctbl&ma_hh=" . $ma_hh;
                    echo '
                         <tr>
                         <td>' . $ma_hh . '</td>
                         <td>' . $ten_hh . '</td>
                         <td>' . $moi_nhat . '</td>
                         <td>' . $cu_nhat . '</td>
                         <td><a href="' . $chitietbl . '"><input type="button" value="Chi tiết"></a></td>
                         </tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>



