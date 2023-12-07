<?php
session_start();

include './model/pdo.php';
include './model/taikhoan.php';
include './model/donhang.php';
include './model/danhmuc.php';
include './model/sanpham.php';
include './model/binhluan.php';

if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}
$sphot = loadall_sanpham_home();
// $spkhac = loadall_sanpham_cf();
$coffe = loadall_sanpham_cf_tra();
$dsdm = loadall_danhmuc();

$spdm = loadall_sanpham_tra();

// HEADER
include './views/header.php';
// include './views/trangchu.php';

// MAIN
$error = [];
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'admin':
            include './admin/views/header.php';
            break;
        case 'listcf':

            //    if(isset($_POST["ma_dm"]) && ($_POST["ma_dm"])){
            //     $ma_dm = $_POST["ma_dm"];
            //    }else{
            //     $ma_dm = 0;
            //    }

            include './views/caphe.php';
            break;
        case 'listtra':

            include './views/tra.php';
            break;
        case 'listmenu':
            if (isset($_GET['ma_dm']) && ($_GET['ma_dm'] > 0)) {
                $ma_dm = $_GET['ma_dm'];
            } else {
                $ma_dm = 0;
            }
            
            $dssp = loadall_sanpham($ma_dm, 12);
            $tendm = loadall_danhmuc();
            include './views/menu.php';
            break;

        case 'home':

            include './views/home.php';
            break;

        case "sanphamct":
            if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {

                insert_binhluan($_POST['noidung'], $_POST['ma_sp'], $_POST['makh'],);

                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
            if (isset($_GET['ma_sp']) && $_GET['ma_sp'] > 0) {
                $sanpham = loadone_sanpham($_GET['ma_sp']);

                $sanphamcl = load_sanpham_cungloai($_GET['ma_sp'], $sanpham['ma_dm']);

                $binhluan = load_all_binhluan($_GET['ma_sp']);
                include "./views/spchitiet.php";
            } else {
                include "./views/home.php";
            }
            break;

        case "sanphamct-menu":
            if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {

                insert_binhluan($_POST['ma_bl'], $_POST['noidung'], $_POST['ma_sp'], $_POST['ma_kh']);

                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
            if (isset($_GET['ma_sp']) && $_GET['ma_sp'] > 0) {
                $sanpham = loadone_sanpham($_GET['ma_sp']);

                $sanphamcl = load_sanpham_cungloai($_GET['ma_sp'], $sanpham['ma_dm']);

                $binhluan = load_all_binhluan($_GET['ma_sp']);
                include "./views/chitiet_menu.php";
            } else {
                include "./views/home.php";
            }
            break;
        case "xoabl":
            if (isset($_GET['ma_bl']) && ($_GET['ma_bl'] > 0)) {

                xoa_binhluan($_GET['ma_bl']);
            }
            $binhluan = load_all_binhluan($_GET['ma_sp']);
            include "./views/spchitiet.php";
            break;
        case 'addctsp':
            // if(isset($_POST['']) && ($_POST[''])) {
            $ma_sp = $_POST['ma_sp'];


        case 'taikhoan':
            include './views/taikhoan/dangnhap.php';
            break;

        case 'dangnhap':
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $user = $_POST['user'];
                $pass = $_POST['password'];
                $taikhoan = dang_nhap($user, $pass);
                if (is_array($taikhoan)) {
                    $_SESSION['taikhoan'] = $taikhoan;
                    header("Location: index.php");
                } else {
                    $thongbao = "Sai tài khoản hoặc mật khẩu";
                }
            }
            include './views/taikhoan/dangnhap.php';
            break;



        case 'dangky':
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['password'];
                $sdt = $_POST['phone'];
                $repassword = $_POST['repassword'];

                
                $conn = mysqli_connect("localhost", "root", "", "du_an_coffe");
                $sql = "SELECT * FROM tai_khoan WHERE tendangnhap = '{$user}'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $error['user'] = '<h5 style="margin-top: 8px;">Tên đăng nhập đã tồn tại</h5>';
                }

                if (empty($user)) {
                    $error['user'] = '<h5 style="margin-top: 8px;" >* Nhập Tên đăng nhập</h5>'; 
                };
                if (empty($sdt)) {
                    $error['phone'] = '<h5 style="margin-top: 8px;">* Nhập SDT</h5>';
                };
                if (empty($email)) {
                    $error['email'] = '<h5 style="margin-top: 8px;">* Nhập Email</h5>'; 
                };
                if (empty($pass)) {
                    $error['password'] = '<h5 style="margin-top: 8px;">* Nhập Pass</h5>'; 
                };
               
                if (empty($repassword)) {
                    $error['repassword'] = '<h5 style="margin-top: 8px;">* Nhập Pass</h5>'; ;
                };
                if($repassword == $pass){
                    if (!$error) {
                    $sql_ad = "INSERT INTO tai_khoan VALUES (null,'$hoten', '$user', '$pass', '$repassword','$email','$sdt' ) ";
                    dang_ky($hoten, $user, $pass,$repassword,$email, $sdt );
                    $thongbao = "* Đăng kí tài khoản thành công";
                    }
                }else{
                    $thongbao = "* Mật khẩu không trùng khớp";
                };

                // header("location: index.php");
            }

            include './views/taikhoan/dangky.php';
            break;
        case 'quenmk':
            if (isset($_POST['guieamil']) && $_POST['guieamil']) {
                $email = $_POST['email'];
                $quenmk = quen_mat_khau($email);
                if (is_array($quenmk)) {
                    $thongbao = "Mật khẩu của bạn là : " . $quenmk['matkhau'];
                } else {
                    $thongbao = "Email này không tồn tại";
                }
            }
            include './views/taikhoan/quenmk.php';
            break;
        case 'capnhattaikhoan':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $hoten = $_POST['hoten'];
                $user = $_POST['user'];
                $pass = $_POST['password'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $makh = $_POST['makh'];
                edit_taikhoan($makh, $hoten, $user, $pass, $phone, $email);
                $thongbao = "* Cập nhật tài khoản thành công";
            }
            include './views/taikhoan/updatetk.php';
            break;
        case 'thoat';
            session_unset();
            header('Location: index.php');
            break;

            //  GIỎ HÀNG

        case 'addcart':
            if (isset($_POST['themgiohang']) && ($_POST['themgiohang'])) {
                $ma_sp = $_POST['ma_sp'];
                $ten_sp = $_POST['ten_sp'];
                $anh_sp = $_POST['anh_sp'];
                $gia_sp = $_POST['gia_sp'];


                // Tìm kiếm sản phẩm trong giỏ hàng
                $productKey = null;
                foreach ($_SESSION['mycart'] as $key => $product) {
                    if ($product[0] === $ma_sp) {
                        $productKey = $key;
                        break;
                    }
                }

                // Nếu sản phẩm đã có trong giỏ hàng
                if ($productKey !== null) {
                    // Tăng số lượng sản phẩm
                    $_SESSION['mycart'][$productKey][4]++;
                    $_SESSION['mycart'][$productKey][5] = (int)$_SESSION['mycart'][$productKey][4] * (int)$_SESSION['mycart'][$productKey][3];
                } else {
                    $soluong_sp = 1;
                    $tongtien = (int)$soluong_sp * (int)$gia_sp;
                    $spadd = [$ma_sp, $ten_sp, $anh_sp, $gia_sp, $soluong_sp, $tongtien];
                    $_SESSION['mycart'][] = $spadd;
                }

                header("Location: " . $_SERVER["HTTP_REFERER"]);
                 
            }
            include './views/giohang/giohang.php';
            break;
            case 'delcart':
                if (isset($_SESSION['mycart']))
                    unset($_SESSION['mycart']);
                header('location:index.php?act=giohang');
                break;

        case 'deletecart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header("Location: index.php?act=giohang");
            break;

        case 'giohang':
            include './views/giohang/giohang.php';
            break;

        case 'thanhtoan':
            include './views/giohang/thanhtoan.php';
            break;

        case 'dathang':
            // tạo bill
            if (isset($_POST['dat-hang']) && ($_POST['dat-hang'])) {
                if (isset($_SESSION['taikhoan'])) $ma_kh = $_SESSION['taikhoan']['makh'];
                else $makh = 0;
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $diachi = $_POST['diachi'];
                $ngaydathang = date('Y-m-d');
                $pttt = $_POST['pttt'];
                $tongdonhang = tongdonhang();

                $ma_dh = insert_dathang($ma_kh, $hoten, $email, $sdt, $diachi, $ngaydathang, $pttt, $tongdonhang);
                $_SESSION['ma_dh'] = $ma_dh; 
                if(isset($_SESSION['mycart']) && (count($_SESSION['mycart']) > 0)) {
               
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['taikhoan']['makh'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $ma_dh);
                  
                }
             
                unset($_SESSION['mycart']);
              
            }   
            
        }
        
            $bill = loadone_bill($ma_dh);
            $billct = loadall_cart($ma_dh);
            
            include './views/giohang/dhthanhcong.php';
            
            break;
        case 'dhthanhcong':
         
            include './views/giohang/dhthanhcong.php';
            break;

        case 'dhcuatoi':
            if (isset($_GET['ma_dh'])) {
                $ma_dh = $_GET['ma_dh'];


                $result = loadall_bill($ma_dh);
            }

            // $listbill = load_bill($_SESSION['taikhoan']['makh']);
            // $listbill = chitietdh(1);
            include './views/giohang/dhcuatoi.php';
            // include './views/giohang/donhangcuatoi.php';
            break;
        case 'timkiemsp':
            $keyword = $_POST['keyword'];

            // Tạo truy vấn SQL
            $sql = 'SELECT * FROM san_pham WHERE ten_sp LIKE :keyword';

            // Tạo đối tượng truy vấn



    }
} else {
    include './views/trangchu.php';
};



// FOOTER
include './views/footer.php';
