<div class="menu">
    <ul>
        <li>
            <a href="#">Trang chủ</a>
            <i class="fa-solid fa-chevron-right fa-2xs" style="color: #000000;"></i>
            <a href="index.php?act=dangnhap">Tài khoản</a>
            <i class="fa-solid fa-chevron-right fa-2xs" style="color: #000000;"></i>
            <a style="color: rgb(255, 74, 17);" href="index.php?act=capnhattaikhoan">Cập nhật tài khoản</a>
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

    <?php 
                
                    if(isset($_SESSION['taikhoan']) && (is_array($_SESSION['taikhoan']))){
                        extract($_SESSION['taikhoan']);
                    }
                
                ?>

    <div class="box-right">
        <h2 style="text-align: center;">Cập nhật tài khoản</h2>
        <hr width="100%" />
        <form action="index.php?act=capnhattaikhoan" method="post">
            <div class="title-login">
                <p> Tài khoản <span style="color: red;">*</span> :</p>
                <input type="text" name="user" value="<?=$taikhoan?>">
            </div>
            <div class="title-login">
                <p>Số điện thoại <span style="color: red;">*</span> :</p>
                <input type="text" name="phone" value="<?php echo $sdt?>">
            </div>
            <div class="title-login">
                <p>Email <span style="color: red;">*</span> :</p>
                <input type="text" name="email" value="<?=$email?>">
            </div>
            <div class="title-login">
                <p>Mật khẩu <span style="color: red;">*</span> :</p>
                <input type="password" name="password" value="<?=$matkhau?>">
            </div>

            <div class="submit-login">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="submit" value="Cập nhật" name="capnhat">
            </div>
            <i class="thongbao">
                <?php 
                    if(isset($thongbao)&&($thongbao!="")){
                        echo $thongbao;
                    }
                ?>
            </i>
            <div class="text-note">
                <p>Chúng tôi cam kết bảo mật thông tin của bạn</p>
            </div>
        </form>

    </div>
</div>