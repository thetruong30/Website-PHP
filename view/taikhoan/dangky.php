<?php

        if (isset($thongbao)) {
            
            echo '<script type="text/javascript">

            window.onload = function () { alert("' . $thongbao . '"); }

</script>';
        }
        ?>
<div class="boxtrai mr">
    <div class="row mb">
        <div class="boxtitle">ĐĂNG KÝ THÀNH VIÊN</div>
        <div class="row boxcontent dkitv">
            <form action="index.php?act=dangky" method="post" enctype="multipart/form-data">
                <div class="row mb10">   
                <label for="">Tài khoản</label><br>
                <input type="text" name="ma_kh" value="<?= $ma_kh ?? '' ?>"><br>
                <span style="color:red">
                        <?= $errors['ma_kh'] ?? '' ?>
                    </span>
                </div> 
                <div class="row mb10">
                <label for="">Mật khẩu</label><br>
                <input type="password" name="mat_khau" value="<?= $mat_khau ?? '' ?>"><br>
                <span style="color:red">
                        <?= $errors['mat_khau'] ?? '' ?>
                    </span>
                </div>
                <div class="row mb10">
                <label for="">Nhập lại mật khẩu</label><br>
                <input type="password" name="mat_khau2" value="<?= $mat_khau2 ?? '' ?>"><br>
                <span style="color:red">
                        <?= $errors['mat_khau2'] ?? '' ?>
                    </span>
                </div>
                <div class="row mb10">
                <label for="">Họ và tên</label><br>
                <input type="text" name="ho_ten" value="<?= $ho_ten ?? '' ?>"><br>
                <span style="color:red">
                        <?= $errors['ho_ten'] ?? '' ?>
                    </span>
                </div>
                <div class="row mb10">
                <label for="">email</label><br>
                <input type="email" name="email" id="" value="<?= $email ?? '' ?>"><br>
                <span style="color:red">
                        <?= $errors['email'] ?? '' ?>
                    </span>
                </div>
                <div class="row mb10">
                <label for="">Ảnh</label><br>
                <input type="file" name="hinh" id=""><br>
                <span style="color:red">
                        <?= $errors['hinh'] ?? '' ?>
                    </span>
                </div>
                <input type="submit" value="Đăng ký" name="dangky">
                <input type="hidden" name="vai_tro" value="0">
                <input type="hidden" name="kich_hoat" value="0">
                <input type="reset" value="Nhập lại">
            </form>
            <?php
            if(isset($thongbao)&& $thongbao!=""){
                echo $thongbao;
            } ?>
        </div>
    </div>
</div>
<div class="boxphai ">
    <?php
    include "view/boxright.php";
    ?>
</div>
</div>