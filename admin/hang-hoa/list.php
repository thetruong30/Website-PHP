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
    <div class="row frmtitle">
        <h1>DANH SÁCH HÀNG HÓA</h1>
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
                <select name="ma_loai" id="">
                    <option value="0" selected>Tất cả</option>
                    <?php foreach ($listlh as $lh) : ?>
                        <option value="<?= $lh['ma_loai'] ?>">
                            <?= $lh['ten_loai'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <input type="submit" name="listok" value="Tìm kiếm">
            </form>
        </div>
        <div class="row mb10 mt frmdshanghoa text ">
            <table>
                <tr>
                    
                    <th>MÃ HÀNG HÓA</th>
                    <th>TÊN HÀNG HÓA</th>
                    <th>ĐƠN GIÁ</th>
                    <th>GIẢM GIÁ</th>
                    <th>HÌNH</th>
                    <th>ĐẶC BIỆT</th>
                    <th>SỐ LƯỢT XEM</th>
                    <th>NGÀY NHẬP</th>
                    <th>MÔ TẢ</th>
                    <th>LOẠI HÀNG</th>
                    <th></th>
                </tr>
                <?php

                foreach ($listhh as $hh) {
                    extract($hh);
                    $suahh = "index.php?act=suahh&ma_hh=" . $ma_hh;
                    $xoahh = "index.php?act=xoahh&ma_hh=" . $ma_hh;
                    $hinhpath = "../upload/" . $hinh;
                    if (is_file($hinhpath)) {
                        $hinh = "<img src='" . $hinhpath . "' height='80'>";
                    } else {
                        $hinh = "no photo";
                    }

                    echo '
                         <tr>
                         
                         <td>' . $ma_hh . '</td>
                         <td>' . $ten_hh . '</td>
                         <td>' . $don_gia . '</td>
                         <td>' . $giam_gia . '</td>
                         <td>' . $hinh . '</td>
                         <td>' . $dac_biet . '</td>
                         <td>' . $so_luot_xem . '</td>
                         <td>' . $ngay_nhap . '</td>
                         <td>' . $mo_ta . '</td>
                         <td>' . $ma_loai . '</td>
                         <td><a href="' . $suahh . '"><input type="button" value="Sửa"></a> <a href="' . $xoahh . '"><input type="button" onclick="myFunction()" value="Xóa"></a></td>
                         </tr>';
                }

                ?>
            </table>
        </div>
        <div class="row mb10 text">
            <a href="index.php?act=addhh"><input type="button" value="Nhập thêm"></a>
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