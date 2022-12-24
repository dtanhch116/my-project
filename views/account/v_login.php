<body>
    <?php if(isset($_GET['no-login'])): 
        echo "<script>
                alert('Bạn phải đăng nhập trước khi thêm hoặc mua hàng!');
            </script>";
    endif;
    ?>
    <div class="main__login">
        <div class="logo__login">
            <a href="?ctr" class="logo__login--link">
                <img src="public/layout/images/banner_logo/cu_dem_pro.png" width="100px" height="100px" alt=""> <span class="logo__login--name"><span class="r9t8a1">CUDEM</span>.<span class="r9t8a2">PRO</span></span>
            </a>
        </div>

        <div class="from__login">
            <form action="" method="POST" >
                <label for="">Tên đăng nhập</label>
                <input type="text" name="ho_ten" class="login__input">

                <label for="">Password</label>
                <input type="password" name="mat_khau" class="login__input">

                
                <?php if(isset($err['account'])):?>
                    <p style="color: red;"><?=$err['account']?></p>
                    <?php endif?>
                <button type="submit" name="btn__login" class="btn--login">Đăng nhập</button>
                <p>bạn chưa có tài khoản ? <a href="?ctr=register">Đăng kí</a></p>
            </form>
        </div>
    </div>
</body>
</html>