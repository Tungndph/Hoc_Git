<div class="menu">
    <ul>
        <li>
            <a href="#">Trang chủ </a><i class="fa-solid fa-chevron-right fa-2xs" style="color: #000000;"></i>
            <a style="color: rgb(255, 74, 17);" href="index.php?act=dangnhap">Tài khoản</a>
        </li>
    </ul>
</div>
<div class="user rht">
    <?php if (isset($_SESSION['taikhoan'])) {
                extract($_SESSION['taikhoan']);
            ?>
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
            <?php if($vaitro == 1){ ?>
            <div class="user">
                Xin chào ADMIN: <?= $user ?>
            </div>
            <?php }else if ($vaitro == 0){
                    echo 'Xin chào : '.$user;
                }?>
            <div class="pass">
                <li>
                    <a href="index.php?act=quenmk" style="color: #000077;">Quên mật khẩu ?</a> <br>
                </li>
                <?php
                    if ($vaitro == 1) {
                    ?>
                <li>
                    <a href="./admin/amin/admin.php" style="color: #000077;">Đăng nhập Admin</a>
                </li>
                <?php }  ?>
                <li>
                    <a href="index.php?act=thoat" style="color: #000077;">Đăng xuất</a>
                </li>
            </div>
        </div>
    </div>
    <?php
            } else {
            ?>
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
            <h2 style="text-align: center;">Đăng nhập</h2>
            <hr width="100%" />
            <form action="index.php?act=dangnhap" method="post">
                <div class="title-login">
                    <p> Tài Khoản :</p>
                    <input type="text" placeholder="Tài khoản" name="user">
                </div>
                <div class="title-login">
                    <p>Mật khẩu :</p>
                    <input type="password" placeholder="Mật khẩu" name="password">
                </div>
                <div class="sign">
                    <a href="index.php?act=dangky">Đăng ký</a>
                    <a href="index.php?act=quenmk">Quên mật khẩu ?</a>
                </div>

                <div class="submit-login">
                    <input type="submit" value="Đăng nhập" name="dangnhap">
                </div>
                <div class="text-note">
                    <p>Chúng tôi cam kết bảo mật thông tin của bạn</p>
                </div>
            </form>
        </div>
    </div>

    <?php } ?>
</div>
</div>