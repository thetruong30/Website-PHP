<div class="boxtrai mr">
    <div class="row mb">
        <div class="boxtitle">CẬP NHẬT TÀI KHOẢN</div>
        <div class="row boxcontent">
            <?php
            if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                extract($_SESSION['user']);
                $hinhpath = "./upload/" . $hinh;
                if (is_file($hinhpath)) {
                    $hinh = "<img src='" . $hinhpath . "' height='80'>";
                } else {
                    $hinh = "no photo";
                }
            }
            ?>
            <div class="row dkitv">
            <form action="index.php?act=edit_taikhoan" method="post" enctype="multipart/form-data">
                <div class="row mb10">
                    <label for="">Mật khẩu</label><br>
                    <input type="password" name="mat_khau" id="" value="<?= $mat_khau ?>"><br>
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
                    <input type="text" name="ho_ten" value="<?= $ho_ten ?>"><br>
                    <span style="color:red">
                        <?= $errors['ho_ten'] ?? '' ?>
                    </span>
                </div>
                <div class="row mb10">
                    <label for="">email</label><br>
                    <input type="email" name="email" id="" value="<?= $email ?>"><br>
                    <span style="color:red">
                        <?= $errors['email'] ?? '' ?>
                    </span>
                </div>
                <div class="row mb10">
                    <label for="">Ảnh</label><br>
                    <?= $hinh ?><br>
                    <input type="file" name="hinh" id="" value=""><br>
                </div>
                <input type="submit" value="Cập nhật" name="capnhat">
                <input type="hidden" name="ma_kh" value="<?=$ma_kh?>">
                <input type="hidden" name="vai_tro" value="0">
                <input type="hidden" name="kich_hoat" value="0">
                <input type="reset" value="Nhập lại">
            </form>
        </div>
            <?php
            if (isset($thongbao) && $thongbao != "") {
                echo $thongbao;
            } ?>
        </div>
    </div>
</div>
<div class="boxphai">
    <?php
    include "view/boxright.php";
    ?>
</div>
</div>