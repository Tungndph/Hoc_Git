<?php
session_start(); 
include './model/pdo.php';
include './model/taikhoan.php';
include './views/header.php';
// include './views/dangnhap.php';  


// MAIN
if(isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch($act) {
        case "dangnhap":
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $user = $_POST['user'];
                $pass = $_POST['password'];
                $taikhoan = dang_nhap($user, $pass);
                if (is_array($taikhoan)) {
                    $_SESSION['taikhoan'] = $taikhoan;                
                    // header("Location: index.php");
                } else {
                    $thongbao = "Sai tài khoản hoặc mật khẩu";
                }
            }
            include './views/dangnhap.php';
            break;
        
        case "dangky":
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['password'];
                $sdt = $_POST['phone'];
                dang_ky($email, $user, $pass, $sdt);
                $thongbao = "* Đăng kí tài khoản thành công";
                // header("location: index.php");
            }
            include './views/dangky.php';
            break;

            case "quenmk":
                if (isset($_POST['guieamil']) && $_POST['guieamil']) {
                    $email = $_POST['email'];
                    $quenmk = quen_mat_khau($email);
                    if (is_array($quenmk)) {
                        $thongbao = "Mật khẩu của bạn là : " . $quenmk['matkhau'];
                    } else {
                        $thongbao = "Email này không tồn tại";
                    }
                }
                include './views/quenmatkhau.php';
                break;
        
            case 'capnhattaikhoan':
                if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $user = $_POST['user'];
                    $pass = $_POST['password'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $id = $_POST['id'];
                    edit_taikhoan($id,$user,$pass,$phone,$email);
                    $thongbao = "* Cập nhật tài khoản thành công";
                }
            include './views/capnhattaikhoan.php';
            break;
        
            case "thoat";
                session_unset();
                header('Location: index.php');
            break;

        default:
            include './views/home.php';
            break;
        }
    
}else{
    include './views/dangnhap.php';

}
// FOOTER
include './views/footer.php';   

?>
