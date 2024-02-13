<!-- begin footer -->
<footer>
    <!-- Copyright © Classic Store
  GPĐK HKD: 41O8047539 do UBND Quận Bình Thạnh cấp ngày 27 tháng 04 năm 2023
   -->
    <div class="kele"></div>
    <div class="site-footers">
        <div class="site-footer">
            <h5>MEN COSMESTIC STORE</h5>
            <p>Được thành lập từ năm 2023. Men cosmetic store đã trở thành địa chỉ mua sắm những sản phẩm chăm sóc da,
                tạo kiểu tóc, làm đẹp uy tín dành riêng cho Nam giới.</p>
        </div>
        <div class="site-footer">
            <h5>ĐIỀU KHOẢN DỊCH VỤ</h5>
            <li><a href="index.php?act=chinhsachquydinh">Chính sách & quy định</a></li>
            <li><a href="">Chính sách thanh toán</a></li>
            <li><a href="">Chính sách đổi trả</a></li>
            <li><a href="">Chính sách bảo mật thông tin</a></li>

        </div>
        <div class="site-footer">
            <h5>THEO DÕI CHÚNG TÔI</h5>
            <li><a href=""><img src="./img/logofb.png" alt="">Facebook</a></li>
            <li> <a href=""><img src="./img/logo-instagram.png" alt="">Instagram</a></li>
        </div>
    </div>
    <div class="footer-content">
        <p>Men-cosmetic-store.vn</p>
        <p>Địa chỉ: Tầng 1, Tòa nhà Capital Place, số 29 đường Liễu Giai, Phường Ngọc Khánh, Quận Ba Đình, Thành phố Hà
            Nội, Việt Nam. Tổng đài hỗ trợ: 19001221 - Email: cskh@hotro.mencosmetic.vn
            Chịu Trách Nhiệm Quản Lý Nội Dung: Điện thoại liên hệ: 0732344254
            Mã số doanh nghiệp: 0106734793 do Sở Kế hoạch & Đầu tư TP Hà Nội cấp lần đầu ngày 10/11/2023</p>
    </div>
</footer>

</body>
<script>
document.getElementById('backButton')?.addEventListener('click', function() {
    // Quay lại trang trước
    window.history.back();
});

// xu ly gio hang
const lstInputNumbers = document.getElementsByClassName("number-prod-giohang");
const total_prod_giohang = document.getElementById("total_prod_giohang");

function renewGioHang() {
    var new_soluong = 0;
    for (let i = 0; i < lstInputNumbers.length; i++) {
        new_soluong += Number(lstInputNumbers[i].value);
    }
    total_prod_giohang.innerText = new_soluong;
}

for (let i = 0; i < lstInputNumbers.length; i++) {
    const lstInputNumber = lstInputNumbers[i];

    lstInputNumber.addEventListener('change', () => {
        const soluong = lstInputNumber.value;
        const idsp = lstInputNumber.getAttribute('data-idsp');

        var xhr = new XMLHttpRequest();

        xhr.open('GET', `index.php?act=capnhatsoluonggiohang&idsp=${idsp}&soluong=${soluong}`, true);

        // Xử lý sự kiện khi yêu cầu hoàn thành
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Dữ liệu nhận được từ yêu cầu
                var responseData = xhr.responseText;
                renewGioHang();
            } else {
                alert("Hành động lỗi !");
                document.location.reload();
            }
        };

        // Xử lý sự kiện khi có lỗi xảy ra trong quá trình yêu cầu
        xhr.onerror = function() {
            alert("Hành động lỗi !");
            document.location.reload();
        };

        // Gửi yêu cầu
        xhr.send();
    });
}
</script>

</html>
<!-- end footer -->