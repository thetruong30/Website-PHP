<?php
session_start();
if (!$_SESSION['user']) {
    header("location: ../index.php");
    die;
} else {
    extract($_SESSION['user']);
    if ($vai_tro == 0) {
        header("location: ../index.php");
    }
    //truong dep trai
    
}
include "header.php";
require "../dao/loai.php";
require "../dao/hang-hoa.php";
require "../dao/khach-hang.php";
require "../dao/binh-luan.php";
require "../dao/thong-ke.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            //controler loại hàng
        case 'addlh':

            //kiểm tra người dùng có nhập nút add hay không
            if (isset($_POST['btn_insert']) && ($_POST['btn_insert'])) {
                $ten_loai = $_POST['ten_loai'];
                if ($ten_loai == "") {
                    $errors['ten_loai'] = "Tên không được để trống";
                    include "loai-hang/add.php";
                } else {
                    loai_insert($ten_loai);
                    $thongbao = "Thêm thành công";
                    $listlh = loai_select_all();
                    include "loai-hang/list.php";
                }
            } else {
                include "loai-hang/add.php";
            }

            break;
        case 'listlh':

            $listlh = loai_select_all();
            include "loai-hang/list.php";
            break;
        case 'xoalh':
            if (isset($_GET['ma_loai']) && ($_GET['ma_loai'] > 0)) {
                $ma_loai = $_GET['ma_loai'];
                loai_delete($ma_loai);
                $thongbao = "Xóa thành công";
            }
            $listlh = loai_select_all();
            header('location: index.php?act=listlh');
            break;
        case 'sualh':
            if (isset($_GET['ma_loai']) && ($_GET['ma_loai'] > 0)) {
                $ma_loai = $_GET['ma_loai'];
                $lh = loai_select_by_id($ma_loai);
            }
            include "loai-hang/update.php";
            break;
        case 'updatelh':
            //kiểm tra người dùng có nhập nút update hay không
            if (isset($_POST['updatelh']) && ($_POST['updatelh'])) {
                $ten_loai = $_POST['ten_loai'];
                $ma_loai = $_POST['ma_loai'];
                loai_update($ma_loai, $ten_loai);
                $thongbao = "Cập nhật thành công";
            }
            $listlh = loai_select_all();
            header('location: index.php?act=listlh');
            break;
            //controler hàng hóa
        case 'addhh':

            //kiểm tra người dùng có nhập nút add hay không
            if (isset($_POST['btn_insert']) && ($_POST['btn_insert'])) {
                $ten_hh = $_POST['ten_hh'];
                $don_gia = $_POST['don_gia'];
                $giam_gia = $_POST['giam_gia'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars( basename(basename($_FILES["filetoUpload"]["name"])) . "has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file";
                }
                $mo_ta = $_POST['mo_ta'];
                $so_luot_xem = $_POST['so_luot_xem'];
                $dac_biet = $_POST['dac_biet'];
                $ma_loai = $_POST['ma_loai'];
                $ngay_nhap = $_POST['ngay_nhap'];
                if ($ten_hh == "") {
                    $errors['ten_hh'] = "Không được để trống";
                }
                if ($don_gia <= 0) {
                    $errors['don_gia'] = "Nhập lại đơn giá";
                }
                if ($giam_gia <= 0) {
                    $errors['giam_gia'] = "Nhập lại giá";
                }
                if ($mo_ta == "") {
                    $errors['mo_ta'] = "Không được trống";
                }
                if ($so_luot_xem <= 0) {
                    $errors['so_luot_xem'] = "Nhập lại lượt xem";
                }
                if ($dac_biet <= 0 || $dac_biet > 10) {
                    $errors['dac_biet'] = "Nhập lại đặc biệt";
                }
                if ($ngay_nhap == "") {
                    $errors['ngay_nhap'] = "Không được trống";
                }

                if (!isset($errors)) {
                    hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta);
                    $thongbao = "Thêm thành công";
                    $listlh = loai_select_all();
                    $listhh = hang_hoa_select_all();
                    include "hang-hoa/list.php";
                } else {
                    $listlh = loai_select_all();
                    include "hang-hoa/add.php";
                }
            } else {
                $listlh = loai_select_all();
                include "hang-hoa/add.php";
            }

            break;
        case 'listhh':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $ma_loai = $_POST['ma_loai'];
                if ($ma_loai > 0 && $kyw == "") {
                    $listhh = hang_hoa_select_by_loai($ma_loai);
                } else if ($kyw != "" && $ma_loai == 0) {
                    $listhh = hang_hoa_select_keyword($kyw);
                } else if ($kyw == "" && $ma_loai == 0) {
                    $listhh = hang_hoa_select_all();
                }
            } else {
                $listhh = hang_hoa_select_all();
            }
            $listlh = loai_select_all();
            include "hang-hoa/list.php";
            break;
        case 'xoahh':
            if (isset($_GET['ma_hh']) && ($_GET['ma_hh'] > 0)) {
                $ma_hh = $_GET['ma_hh'];
                hang_hoa_delete($ma_hh);
                $thongbao = "Xóa thành công";
            }

            $listhh = hang_hoa_select_all();
            header('location: index.php?act=listhh');
            break;
        case 'suahh':
            if (isset($_GET['ma_hh']) && ($_GET['ma_hh'] > 0)) {
                $ma_hh = $_GET['ma_hh'];
                $hh = hang_hoa_select_by_id($ma_hh);
            }
            include "hang-hoa/update.php";
            break;
        case 'updatehh':
            //kiểm tra người dùng có nhập nút update hay không
            if (isset($_POST['updatehh']) && ($_POST['updatehh'])) {
                $ten_hh = $_POST['ten_hh'];
                $don_gia = $_POST['don_gia'];
                $giam_gia = $_POST['giam_gia'];
                $hinh = $_FILES['hinh']['name'];
                // $hinhpath = "../upload/" . $hinh;
                // if(is_file($hinhpath)){

                // }
                // $hinh=$_POST['img'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars( basename(basename($_FILES["filetoUpload"]["name"])) . "has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file";
                }

                $mo_ta = $_POST['mo_ta'];
                $so_luot_xem = $_POST['so_luot_xem'];
                $dac_biet = $_POST['dac_biet'];
                $ma_loai = $_POST['ma_loai'];
                $ngay_nhap = $_POST['ngay_nhap'];
                $ma_hh = $_POST['ma_hh'];

                hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta);
                $thongbao = "Cập nhật thành công";
            }
            $listhh = hang_hoa_select_all();
            $listlh = loai_select_all();
            header('location: index.php?act=listhh');
            break;
        case 'dskh':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $vai_tro = $_POST['vai_tro'];
                if ($vai_tro < 3 && $kyw == "") {
                    $listkh = khach_hang_select_by_role($vai_tro);
                } else if ($kyw != "" && $vai_tro == 3) {
                    $listkh = khach_hang_select_keyword($kyw);
                } else if ($kyw == "" && $vai_tro == 3) {
                    $listkh = hang_hoa_select_all();
                }
            } else {
                $listkh = khach_hang_select_all();
            }
            include "tai-khoan/list.php";
            break;
        case 'suakh':
            if (isset($_GET['ma_kh']) && ($_GET['ma_kh'] != "")) {
                $ma_kh = $_GET['ma_kh'];
                $kh = khach_hang_select_by_id($ma_kh);
            }
            include "tai-khoan/update.php";
            break;
        case 'updatekh':
            //kiểm tra người dùng có nhập nút update hay không
            if (isset($_POST['updatekh']) && ($_POST['updatekh'])) {
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
                $vai_tro = $_POST['vai_tro'];
                khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
                $thongbao = "Cập nhật thành công";
            }
            $listkh = khach_hang_select_all();
            header('location: index.php?act=dskh');
            break;
        case 'xoakh':
            if (isset($_GET['ma_kh']) && ($_GET['ma_kh'] != "")) {
                $ma_kh = $_GET['ma_kh'];
                khach_hang_delete($ma_kh);
                $thongbao = "Xóa thành công";
            }
            $listkh = khach_hang_select_all();
            header('location: index.php?act=dskh');
            break;
        case 'listtkbl':
            $listbl = thong_ke_binh_luan();
            include "binh-luan/thongke.php";
            break;
        case 'ctbl':
            $ma_hh = $_GET['ma_hh'];
            $listbl = binh_luan_select_by_hang_hoa($ma_hh);
            include "binh-luan/list.php";
            break;
        case 'suabl':
            if (isset($_GET['ma_bl']) && ($_GET['ma_bl'] > 0)) {
                $ma_bl = $_GET['ma_bl'];
                $bl = binh_luan_select_by_id($ma_bl);
            }
            include "binh-luan/update.php";
            break;
        case 'updatebl':
            //kiểm tra người dùng có nhập nút update hay không
            if (isset($_POST['updatebl']) && ($_POST['updatebl']) > 0) {
                $ma_bl = $_POST['ma_bl'];
                $noi_dung = $_POST['noi_dung'];
                binh_luan_update($ma_bl, $noi_dung);
                $thongbao = "Cập nhật thành công";
            }
            $ma_hh = $_GET['ma_hh'];
            // $listbl = binh_luan_select_by_hang_hoa($ma_hh);
            header('location: index.php?act=listtkbl');
            break;
        case 'xoabl':
            if (isset($_GET['ma_bl']) && ($_GET['ma_bl'] > 0)) {
                $ma_bl = $_GET['ma_bl'];
                binh_luan_delete($ma_bl);
                $thongbao = "Xóa thành công";
            }
            $listbl = binh_luan_select_all();
            header('location: index.php?act=dsbl');
            break;
        case 'thongke':
            $listtklh = thong_ke_hang_hoa();
            include "thong-ke/listtklh.php";
            break;
        case 'bieudo':
            $listtklh = thong_ke_hang_hoa();
            include "thong-ke/bieudo.php";
            break;
        case 'trangnd':
            header("location: ../index.php");
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
