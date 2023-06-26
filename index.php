<?php
session_start();
include "dao/pdo.php";
include "dao/hang-hoa.php";
include "global.php";
include "dao/loai.php";
include "dao/khach-hang.php";
include "view/header.php";
$listlh = loai_select_all();
$listhh = hang_hoa_select_all();
$dstop10 = hang_hoa_select_top10();
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'hhct':

            if (isset($_GET['ma_hh']) && ($_GET['ma_hh'] > 0)) {
                $ma_hh = $_GET['ma_hh'];
                $hh = hang_hoa_select_by_id($ma_hh);
                extract($hh);
                $hh_cung_loai = hang_hoa_select_cung_loai($ma_loai, $ma_hh);

                include "view/hhct.php";
            } else {
                include "view/home.php";
            }
            break;
        case 'hh':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
                $listsp = hang_hoa_select_keyword($kyw);
                include "view/hh.php";
            } else {
                $kyw = "";
            }
            if (isset($_GET['ma_loai']) && ($_GET['ma_loai'] > 0)) {
                $ma_loai = $_GET['ma_loai'];
                $listsp = hang_hoa_select_by_loai($ma_loai);
                include "view/hh.php";
            } else {
                include "view/home.php";
            }

            break;
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $ma_kh = $_POST['ma_kh'];
                $mat_khau = $_POST['mat_khau'];
                $mat_khau2 = $_POST['mat_khau2'];
                $ho_ten = $_POST['ho_ten'];
                $kich_hoat = $_POST['kich_hoat'];
                $hinh = $_FILES['hinh']['name'];
                $email = $_POST['email'];
                $vai_tro = $_POST['vai_tro'];
                $kich_hoat = $_POST['kich_hoat'];
                if ($ma_kh == "") {
                    $errors['ma_kh'] = "Không được để trống";
                }
                if ($ho_ten == "") {
                    $errors['ho_ten'] = "Không được để trống";
                }
                if ($mat_khau == "") {
                    $errors['mat_khau'] = "Không được để trống";
                }
                if ($mat_khau2 != $mat_khau || $mat_khau2 == "") {
                    $errors['mat_khau2'] = "Nhập lại sai mật khẩu";
                }
                if ($email == "") {
                    $errors['email'] = "Không được để trống";
                }
                if (!isset($errors)) {
                    $target_dir = "./upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // echo "The file " . htmlspecialchars( basename(basename($_FILES["filetoUpload"]["name"])) . "has been uploaded.";
                    } else {
                        // echo "Sorry, there was an error uploading your file";
                    }
                    khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
                    $thongbao = "Đăng ký thành công";
                    
                }
                include "view/taikhoan/dangky.php";
            }
            include "view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $ma_kh = $_POST['ma_kh'];
                $mat_khau = $_POST['mat_khau'];
                $checkuser = check_user($ma_kh, $mat_khau);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    // $thongbao = "Đăng nhập thành công";
                    header('location: index.php');
                } else {
                    $thongbao = "Tài khoản không tồn tại";
                    if (isset($thongbao)) {
                        echo '<script type="text/javascript">

            window.onload = function () { alert("' . $thongbao . '"); }

                    </script>';
                    }

                    include "view/home.php";
                }
            }

            break;
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $mat_khau = $_POST['mat_khau'];
                $ho_ten = $_POST['ho_ten'];
                $kich_hoat = $_POST['kich_hoat'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "./upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars( basename(basename($_FILES["filetoUpload"]["name"])) . "has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file";
                }
                $email = $_POST['email'];
                $vai_tro = $_POST['vai_tro'];
                $kich_hoat = $_POST['kich_hoat'];
                $ma_kh = $_POST['ma_kh'];
                khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
                $_SESSION['user'] = check_user($ma_kh, $mat_khau);
                header('location: index.php?act=edit_taikhoan');
            }
            include "view/taikhoan/edittk.php";
            break;
        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                if ($email = "") {
                    $errors['email'] = "Không được để trống";
                    include "view/taikhoan/quenmk.php";
                } else {
                    $check_email = check_email($email);
                    if (is_array($check_email)) {
                        $thongbao = "Mật khẩu của bạn là: " . $check_email['mat_khau'];
                    } else {
                        $thongbao = "email không tồn tại!";
                    }
                }
            }
            include "view/taikhoan/quenmk.php";
            break;
        case 'thoat':
            session_unset();
            header("location: index.php");
            break;
        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        case 'lienhe':
            include "view/lienhe.php";
            break;
        case 'gopy':
            include "view/gopy.php";
            break;
        case 'hoidap':
            include "view/hoidap.php";
            break;

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
