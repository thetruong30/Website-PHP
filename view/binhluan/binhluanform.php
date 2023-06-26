<?php
session_start();
require "../../dao/pdo.php";
require "../../dao/binh-luan.php";
require "../../dao/khach-hang.php";
require "../../dao/hang-hoa.php";


$ma_hh = $_REQUEST['ma_hh'];

$dsbl = binh_luan_select_by_hang_hoa($ma_hh);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="rowmb">
        <div class="boxtitle">BÌNH LUẬN</div>
        <div class="boxcontent2 binhluan">
            <table>
                <?php
                foreach ($dsbl as $bl) {
                    extract($bl);
                    echo '<tr><td>' . $ma_kh . '</td></tr>';
                    echo '<tr><td>Nội dung bình luận:' . $noi_dung . '</td></tr>';
                    echo '<tr><td>' . $ngay_bl . '</td></tr>';
                }
                ?>
            </table>
        </div>
        <?php
        if(isset($_SESSION['user'])){
        ?>
        <div class="boxfotter binhluanform">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name=ma_hh value="<?= $ma_hh ?>">
                <input type="text" name="noi_dung">
                <input type="submit" value="Gửi bình luận" name="guibinhluan">
            </form>
        </div>
        <?php
            }else{
                echo " <div class='boxfotter binhluanform'>
                    <p style='color:red;'>Vui lòng đăng nhập để bình luận</p>
            </div>";
            }
        ?>
        <?php

        if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
            $noi_dung = $_POST['noi_dung'];
            $ma_kh = $_SESSION['user']['ma_kh'];
            $ngay_bl = date('h:i:sa d/m/Y');
            binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl);
            header("location: " . $_SERVER['HTTP_REFERER']);
        }
        ?>
    </div>
</body>

</html>