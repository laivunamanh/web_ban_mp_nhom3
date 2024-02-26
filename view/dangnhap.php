<!-- begin main -->
<main>
    <h1 class="h1">ĐĂNG NHẬP TÀI KHOẢN</h1>
    <div class="form-dn">
        <form action="index.php?act=dangnhap" method="post" class="form-dkidn">
            <div class="container">
                <label for="uname"><b>TÊN ĐĂNG NHẬP</b></label>
                <input type="text" placeholder="Nhập tên đăng nhập" name="user" required class="ip-text">

                <label for="psw"><b>MẬT KHẨU</b></label>
                <input type="password" placeholder="Nhập mật khẩu" name="pass" required class="ip-text">
                <div class="btn-dn">
                    <input type="submit" name="dangnhap" value="Đăng nhập"> <br>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Nhớ mật khẩu
                    </label>
                    <br> <button ><a href="index.php?act=dangki" style="color: white; text-decoration: none;">Đăng kí ngay</a></button>
                </div>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn"><a href="index.php?act=qlnguoidung">Cancel</a></button>
                <span class="psw">Quên <a href="index.php?act=quenmk">mật khẩu?</a></span>
            </div>
        </form>
        <h5 style="color: red; text-align: center;">
            <?php
            
            if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
            }
        ?>
        </h5>

    </div>



</main>



<!-- end main -->