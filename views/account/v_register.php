<body>
    <div class="main__register">
        <div class="logo__register">
            <a href="?ctr" class="logo__register--link">
                <img src="public/layout/images/banner_logo/cu_dem_pro.png" width="100px" height="100px" alt=""> <span class="logo__register--name"><span class="r9t8a1">CUDEM</span>.<span class="r9t8a2">PRO</span></span>
            </a>
        </div>

        <div class="from__register">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="">Tên Đăng Nhập</label>
                <?php if(isset($err['ten'])):?>
                    <p style="color: red;"><?=$err['ten']?></p>
                    <?php endif?>
                <input type="text" name="ho_ten" class="register__input">

                <label for="">Password</label>
                <?php if(isset($err['mat_khau'])):?>
                    <p style="color: red;"><?=$err['mat_khau']?></p>
                    <?php endif?>
                <input type="password" name="mat_khau" class="register__input">

                <label for="">Please re-enter your password</label>
                <?php if(isset($err['mat_khau_re'])):?>
                    <p style="color: red;"><?=$err['mat_khau_re']?></p>
                    <?php endif?>
                <input type="password" name="mat_khau_re" class="register__input">

                <label for="">email</label>
                <?php if(isset($err['email'])):?>
                    <p style="color: red;"><?=$err['email']?></p>
                    <?php endif?>
                <input type="email" name="email" class="register__input">

                <label for="">Địa Chỉ</label>
                <?php if(isset($err['dia_chi'])):?>
                    <p style="color: red;"><?=$err['dia_chi']?></p>
                    <?php endif?>
                <input type="text" name="dia_chi" class="register__input">

                <label for="">avatar</label>
                <input type="file" name="hinh" class="register__input">

                <button type="submit" name="btn__register" class="btn--register">Đăng Kí</button>
            </form>
        </div>
    </div>
</body>
</html>