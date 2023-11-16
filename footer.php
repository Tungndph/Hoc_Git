<footer>
    <div class="ftn">
        <div class="footer top">
            <div class="ft">
                <h4>Giới Thiệu</h4>
                <a href="">Về chúng tôi</a>
                <a href="">Sản phẩm</a>
                <a href="">Khuyến mại</a>
                <a href="">Chuyện cà phê</a>
            </div>
            <div class="ft">
                <h4>Điều Khoản</h4>
                <a href="">Điều khoản sử dụng</a>
                <a href="">Chính sách và bảo mật</a>
                <a href="">Hướng dẫn xuất hóa đơn GTGT</a>
            </div>
            <div class="ft">
                <h4>Đặt Hàng: 1800.1800 </h4>
                <h4>Liên hệ</h4>
                <p>Tầng 3-4, Hub Building P, FPT Polytechnic, Trịnh Văn Bô, TP.Hà Nội</p>
            </div>
            <div class="ft">
                <h4>Giới Thiệu</h4>
            </div>

        </div>
        <hr>
        <div class="footer bot">
            <p>Công ty cổ phần thương mại dịch vụ Trà Cà Phê VN <br>
                Mã số DN: 0312867172 do sở kế hoạch và đầu tư tp. HCM cấp ngày 23/07/2014. Người đại diện: TRẦN VĂN
                QUÝ<br>
                Địa chỉ: Tầng 3-4, Hub Building P, FPT Polytechnic, Trịnh Văn Bô, TP.Hà Nội. Điện thoại: (028) 7107
                8079 Email:
                hi@duanmot.fpt.edu.vn <br>
                © 2014-2022 Công ty cổ phần thương mại dịch vụ Trà Cà Phê VN mọi quyền bảo lưu</p>
        </div>
    </div>
</footer>
</body>
<script>
        var index = 0;
        var anh = ['./img/tc/anh.webp', './img/tc/anh1.webp', './img/tc/anh2.webp', './img/tc/anh3.webp', './img/tc/anh4.webp', './img/tc/anh5.webp'];
        setInterval(() => {
            document.getElementById('anh').src = anh[index];
            index++;
            if (index >= 4) {
                index = 0;
            }
        }, 1500);
    </script>
</html>