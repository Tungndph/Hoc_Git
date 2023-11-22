<div class="right" style="margin-top: 5px;">

    <div class="cols">

        <div class="title"> <i>Đăng Nhập</i></div>

        <div class="user rht">

            <?php if (isset($_SESSION['taikhoan'])) {

                extract($_SESSION['taikhoan']);

            ?>

                <?php if ($role == 1) { ?>

                    <div class="user">

                        Xin chào ADMIN: <?= $user ?>

                    </div>

                <?php } else if ($role == 0) {

                    echo 'Xin chào : ' . $user;
                } ?>

                <div class="pass">

                    <li>

                        <a href="index.php?act=quenmk" style="color: #000077;">Quên mật khẩu ?</a> <br>

                    </li>

                    <?php

                    if ($role == 1) {

                    ?>

                        <li>

                            <a href="./admin/amin/admin.php" style="color: #000077;">Đăng nhập Admin</a>

                        </li>

                    <?php }  ?>

                    <li>

                        <a href="index.php?act=logout" style="color: #000077;">Đăng xuất</a>

                    </li>

                </div>

            <?php

            } else {

            ?>

                <form action="index.php?act=signin" method="POST">

                    <label for="">Tài Khoản</label> <br>

                    <input type="text" name="user" id=""> <br>

                    <label for="">Mật Khẩu</label> <br>

                    <input type="password" name="pass" id=""> <br>

                    <input type="checkbox" name="" id=""> Ghi nhớ tài khoản ? <br>

                    <button type="submit" value="Đăng Nhập" name="signin">Đăng Nhập</button>

                </form>

                <div class="pass">

                    <a href="index.php?act=quenmk">Quên mật khẩu ?</a> <br>

                    <span>Bạn chưa có tài khoản ? <a href="index.php?act=signup">Đăng ký</a></span>

                </div>

            <?php } ?>

        </div>

    </div>





    <div class="cols">

        <div class="title"><i>Danh Mục</i></div>

        <div class="list">

            <ul>

                <?php

                foreach ($dsdm as $dm) {

                    extract($dm);

                    $linkdm = "index.php?act=sanpham&iddm=" . $id;

                    echo ' <li>

                                    <a href="' . $linkdm . '">' . $name . '</a>

                                </li>

                        ';
                }

                ?>

            </ul>

            <input type="text" name="" id="" placeholder="Tìm kiếm từ khóa">

        </div>



    </div>





    <div class="cols">

        <div class="title"><i>Top 5 Sản Phẩm Bán chạy</i></div>

        <div class="sellest rht">

            <?php

            foreach ($dstop10 as $sp) {

                extract($sp);

                $linksp = "index.php?act=spct&idsp=" . $id;

                $img = $img_path . $img;

                echo '<div class="sel">

                            <div class="text-seller">

                            <img src="' . $img . '" alt="">

                            <a href="' . $linksp . '">' . $name . '</a>

                            </div>

                        </div><hr>';
            }

            ?>

        </div>



    </div>



</div>