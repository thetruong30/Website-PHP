<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/main.css'>
</head>

<body>
    <div class="container">
        <div class="row mb header">
            <h1>SIÊU THỊ TRỰC TUYẾN </h1>
        </div>
        <div class="row mb menu">
            <ul>
                <li><a href="./index.php">Trang chủ</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Góp ý</a></li>
                <li><a href="#">Hỏi đáp</a></li>
            </ul>
        </div>
        <div class="boxtrai mr">
        <?php
        require "./dao/hang-hoa.php";
        $ma_loai=$_GET['ma_loai'];
        $listhh = hang_hoa_select_by_loai($ma_loai);
        foreach ($listhh as $hh) {
            extract($hh);
            $hinhpath = "./upload/" . $hinh;
            if (is_file($hinhpath)) {
                $hinh = "<img src='" . $hinhpath . "' height='80'>";
            } else {
                $hinh = "no photo";
            }
            echo '<div class="boxsp">
                    <div class="row img">' . $hinh . '</div>
                    <p>' . $don_gia . '</p>
                    <a href="chitietsanpham.php?ma_hh=' . $ma_hh . '">' . $ten_hh . '</a>  
                </div>';
        }
        ?>
        </div>
        <div class="boxphai ">
            <div class="row mb">
                <div class="boxtitle">TÀI KHOẢN</div>
                <div class="boxconten formtk">
                    <form action="#" method="post">
                        <div class="row mb1">
                            Tên đăng nhập <br>
                            <input type="text" name="user" id="">
                        </div>
                        <div class="row mb1">
                            Mật khẩu <br>
                            <input type="password" name="pass" id="">
                        </div>
                        <div class="row mb1">
                            <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
                        </div>
                        <div class="row mb1">
                            <input type="submit" value="Đăng nhập">
                        </div>
                    </form>
                    <li>
                        <a href="#">Quên mật khẩu</a>
                    </li>
                    <li>
                        <a href="#">Đăng kí thành viên</a>
                    </li>
                </div>
            </div>
            <div class="row  mb">
                <div class="boxtitle">DANH MỤC</div>
                <div class="boxconten2 menudoc">
                    <?php
                    require "./dao/loai.php";
                    $listlh = loai_select_all();
                    foreach ($listlh as $lh) {
                        extract($lh);
                        echo '
                    <ul>
                        <li>
                        <a href="dssplh.php?ma_loai='.$ma_loai.'">' . $ten_loai . '</a>
                        </li>
                        
                    </ul>';
                    }

                    ?>
                </div>
                <div class="boxfooter searbox">
                    <form action="#" method="post">
                        <input type="text" name="" id="">
                    </form>
                </div>
            </div>
            <div class="row  mb">
                <div class="boxtitle"> TOP 10 YÊU THÍCH</div>
                <div class="row boxconten">
                    <?php
                    $dstop10 = hang_hoa_select_top10();
                    foreach ($dstop10 as $sp) {
                        extract($sp);
                        $hinhpath = "./upload/" . $hinh;
                        if (is_file($hinhpath)) {
                            $hinh = "<img src='" . $hinhpath . "' height='80'>";
                        } else {
                            $hinh = "no photo";
                        }
                        echo '<div class="row mb1 top10">
                            <img src="' . $hinh . '" alt="">
                            <a href="chitietsanpham.php?ma_hh=' . $ma_hh . '">'.$ten_hh.'</a>
                        </div>';
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>
    <div class="row mb footer">
        Copyright @ 2023
    </div>
    </div>
</body>

</html>