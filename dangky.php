<div class="menu">
    <ul>
        <li>
            <a href="#">Trang chủ</a>
            <i class="fa-solid fa-chevron-right fa-2xs" style="color: #000000;"></i>
            <a href="index.php?act=dangnhap">Tài khoản</a>
            <i class="fa-solid fa-chevron-right fa-2xs" style="color: #000000;"></i>
            <a style="color: rgb(255, 74, 17);" href="index.php?act=dangky">Đăng ký</a>
        </li>
    </ul>
</div>
<div class="container">
    <div class="box-left">
        <div class="">
            <h3>QUYỀN LỢI THÀNH VIÊN</h3>
            <p> <i class="fa-sharp fa-solid fa-caret-right"></i> Mua hàng dễ dàng, nhanh chóng</p>
            <p> <i class="fa-sharp fa-solid fa-caret-right"></i> Theo dõi chi tiết đơn hàng, địa chỉ thanh toán</p>
            <p> <i class="fa-sharp fa-solid fa-caret-right"></i> Nhận nhiều chương trình ưu đãi hấp dẫn!</p>
        </div>
    </div>
    <div class="box-right">
        <h2 style="text-align: center;">Đăng ký</h2>
        <hr width="100%" />
        <form action="index.php?act=dangky" method="post">
            <div class="title-login">
                <p> Họ và tên <span style="color: red;">*</span> :</p>
                <input type="text" name="hovaten" placeholder="Họ và tên">
            </div>
            <div class="title-login">
                <p> Tài khoản <span style="color: red;">*</span> :</p>
                <input type="text" placeholder="Tài khoản" name="user">
            </div>
            <div class="title-login">
                <p>Số điện thoại <span style="color: red;">*</span> :</p>
                <input type="text" placeholder="Mật khẩu" name="phone">
            </div>
            <div class="title-login">
                <p>Email <span style="color: red;">*</span> :</p>
                <input type="text" placeholder="Email" name="email">
            </div>
            <div class="title-login">
                <p>Mật khẩu <span style="color: red;">*</span> :</p>
                <input type="password" placeholder="Mật khẩu" name="password">
            </div>
            <i class="thongbao">
                <?php 
                    if(isset($thongbao)&&($thongbao!="")){
                        echo $thongbao;
                    }
                ?>
            </i>
            <!-- <div class="title-login">
                    <p>Nhập lại mật khẩu <span style="color: red;">*</span> :</p>
                    <input type="password" placeholder="Nhập lại mật khẩu" name="rppass">
                </div> -->
            <div class="submit-login">
                <input type="submit" value="Đăng ký" name="dangky">
            </div>
            <div class="text-note">
                <p>Chúng tôi cam kết bảo mật thông tin của bạn</p>
            </div>
        </form>

    </div>
</div>
