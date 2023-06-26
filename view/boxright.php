<div class="row mb">
    <div class="boxtitle">TÀI KHOẢN</div>
    <div class="boxcontent row formtaikhoan">
        <?php
        if (isset($_SESSION['user'])) {
            extract($_SESSION['user']);
        ?>
            <div class="row mb1">
               <span>Xin chào</span>  <br>
            </div>
            <div class="row mkh">
                <?php $hinhpath = $img_path . $hinh;
                if (is_file($hinhpath)) {
                    $hinh = "<img src='" . $hinhpath . "' width='50'  height='50'>";
                } else {
                    $hinh = "no photo";
                }
                ?>
                <?= $hinh ?> <br>

                <a href="#"><?= $ma_kh ?> </a>

            </div>
            <div class="row mb1 mt1">
                <li>
                    <a href="index.php?act=quenmk">Quên mật khẩu</a>
                </li>
                <li>
                    <a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a>
                </li>
                <?php if (($vai_tro == 1)) { ?>
                    <li>
                        <a href="admin/index.php">Đăng nhập admin</a>
                    </li>
                <?php } ?>
                <li>
                    <a href="index.php?act=thoat">Đăng xuất</a>
                </li>
            </div>
        <?php
        } else {
        ?>
            <form action="index.php?act=dangnhap" method="post">
                <div class="row mb1">
                    Tên đăng nhập <br>
                    <input type="text" name="ma_kh" id="">
                </div>
                <div class="row mb1">
                    Mật khẩu <br>
                    <input type="password" name="mat_khau" id="">
                </div>
                <div class="row mb1">
                    <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
                </div>
                <div class="row mb1">
                    <input type="submit" value="Đăng nhập" name='dangnhap'>
                </div>
            </form>
            <li>
                <a href="index.php?act=quenmk">Quên mật khẩu</a>
            </li>
            <li>
                <a href="index.php?act=dangky">Đăng kí thành viên</a>
            </li>
        <?php } ?>
    </div>
</div>
<div class="row  mb">
    <div class="boxtitle">DANH MỤC</div>
    <div class="boxcontent1 menudoc">
        <?php

        foreach ($listlh as $lh) {
            extract($lh);
            echo '
                    <ul>
                        <li>
                            <a href="index.php?act=hh&ma_loai=' . $ma_loai . '">' . $ten_loai . '</a>
                        </li>
                        
                    </ul>';
        }

        ?>
    </div>
    <div class="boxfooter searbox">
        <form action="index.php?act=hh" method="post">
            <input type="text" name="kyw" id="">
<input type="submit" name="timkiem" value="Tìm kiếm">

        </form>
    </div>
</div>
<div class="row  mb">
    <div class="boxtitle"> TOP 10 YÊU THÍCH</div>
    <div class="row boxcontent">
        <?php
        foreach ($dstop10 as $sp) {
            extract($sp);
            $hinhpath = $img_path . $hinh;
            if (is_file($hinhpath)) {
                $hinh = "<img src='" . $hinhpath . "' height='80'>";
            } else {
                $hinh = "no photo";
            }
            echo '<div class="row mb1 top10">
                            ' . $hinh . '
                            <a href="index.php?act=hhct&ma_hh=' . $ma_hh . '">' . $ten_hh . '</a>
                        </div>';
        }

        ?>

    </div>
</div>