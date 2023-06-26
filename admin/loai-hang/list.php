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
            <h1>DANH SÁCH LOẠI HÀNG</h1>
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
                        
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listlh as $lh) {
                        extract($lh);
                        $sualh = "index.php?act=sualh&ma_loai=" . $ma_loai;
                        $xoalh = "index.php?act=xoalh&ma_loai=" . $ma_loai;
                        echo '
                         <tr>
                         <td>' . $ma_loai . '</td>
                         <td>' . $ten_loai . '</td>
                         <td><a href="' . $sualh . '"><input type="button" value="Sửa"></a> <a href="' . $xoalh . '"><input type="button" onclick="myFunction()" value="Xóa"></a></td>
                         </tr>';
                    }

                    ?>

                </table>
            </div>
            <div class="row mb10">
                <a href="index.php?act=addlh"><input type="button" value="Nhập thêm"></a>
            </div>
            <script language="javascript">
                function myFunction() {
                    alert("Bạn có muốn xóa không?");
                }
                // Chức năng chọn hết
                document.getElementById("btn1").onclick = function() {
                    // Lấy danh sách checkbox
                    var checkboxes = document.getElementsByName('name[]');

                    // Lặp và thiết lập checked
                    for (var i = 0; i < checkboxes.length; i++) {
                        checkboxes[i].checked = true;
                    }
                };

                // Chức năng bỏ chọn hết
                document.getElementById("btn2").onclick = function() {
                    // Lấy danh sách checkbox
                    var checkboxes = document.getElementsByName('name[]');

                    // Lặp và thiết lập Uncheck
                    for (var i = 0; i < checkboxes.length; i++) {
                        checkboxes[i].checked = false;
                    }
                };
            </script>
        </div>
    </div>
</body>