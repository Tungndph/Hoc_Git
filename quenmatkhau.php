<div class="menu">
    <ul>
        <li>
            <a href="#">Trang chủ</a>
            <i class="fa-solid fa-chevron-right fa-2xs" style="color: #000000;"></i>
            <a href="index.php?act=dangnhap">Tài khoản</a>
            <i class="fa-solid fa-chevron-right fa-2xs" style="color: #000000;"></i>
            <a style="color: rgb(255, 74, 17);" href="index.php?act=quenmk">Quên mật khẩu</a>
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
        <h2 style="text-align: center;">Quên mật khẩu</h2>
        <hr width="100%" />

        <form action="index.php?act=quenmk" method="post">
            <div class="title-login">
                <label for="">Email:</label> <br>
                <input type="email" name="email" class="email" placeholder="Nhập email"> <br>
                <i class="thongbao">
                    <?php 
                    if(isset($thongbao)&&($thongbao!="")){
                        echo $thongbao;
                    }
                ?>
                </i>
                <div class="sign">

                    <div class="submit-forgot">
                        <input type="submit" value="Gửi" name="guieamil">
                    </div>
                    <div class="load-login">
                        <a href="index.php?act=dangnhap">Đăng nhập</a>
                    </div>

                </div>

                <div class="text-note">
                    <p>Chúng tôi cam kết bảo mật thông tin của bạn</p>
                    <h2 class="thongbao">
                    </h2>
                </div>
            </div>

    </div>