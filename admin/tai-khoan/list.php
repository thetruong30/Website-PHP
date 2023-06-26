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
            <h1>DANH SÁCH TÀI KHOẢN</h1>
        </div>
        <?php
        if (isset($thongbao)) {
            echo '<script type="text/javascript">
    
                window.onload = function () { alert("' . $thongbao . '"); }
    
    </script>';
        }
        ?>
        <div class="row mt frmcontent">
            <div class="row mb10  frmdsloai">
                <form action="" method="post">
                    <input type="text" name="kyw">
                    <select name="vai_tro" id="">
                        <option value="3" selected>Tất cả</option>
                        <option value="0">
                            Khách hàng
                        </option>
                        <option value="1">
                            Nhân viên
                        </option>
                    </select>
                    <input type="submit" name="listok" value="Tìm kiếm">
                </form>
            </div>
            <div class="row frmcontent">
                <div class="row mb10 frmdsloai">
                    <table>
                        <tr>
                            
                            <th>MÃ KHÁCH HÀNG</th>
                            <th>MẬT KHẨU</th>
                            <th>HỌ VÀ TÊN</th>
                            <th>ẢNH ĐẠI DIỆN</th>
                            <th>EMAIL</th>
                            <th>VAI TRÒ</th>
                            <th></th>
                        </tr>
                        <?php
                        foreach ($listkh as $kh) {
                            extract($kh);
                            $suakh = "index.php?act=suakh&ma_kh=" . $ma_kh;
                            $xoakh = "index.php?act=xoakh&ma_kh=" . $ma_kh;
                            $hinhpath = "../upload/" . $hinh;
                            if (is_file($hinhpath)) {
                                $hinh = "<img src='" . $hinhpath . "' height='80'>";
                            } else {
                                $hinh = "no photo";
                            }
                            echo '
                         <tr>
                         
                         <td>' . $ma_kh . '</td>
                         <td>' . $mat_khau . '</td>
                         <td>' . $ho_ten . '</td>
                         <td>' . $hinh . '</td>
                         <td>' . $email . '</td>';
                            if ($vai_tro == 0) {
                                echo "<td>khách hàng</td>";
                            } else {
                                echo "<td>nhân viên</td>";
                            }

                            echo '<td><a href="' . $suakh . '"><input type="button" value="Sửa"></a> <a href="' . $xoakh . '"><input type="button" onclick="myFunction()" value="Xóa"></a></td>
                         </tr>';
                        }
                        ?>
                    </table>
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