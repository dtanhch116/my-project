
<body>
    <div class="main">
        <div class="menu">
            <a href="index.php" class="link__home">
                <div class="menu__logo">
                    <div class="logo">
                    <a href="index.php"><img src="../../project1/public/layout/images/banner_logo/cu_dem_pro.png" alt=""></a>

                    </div>
                    <div class="name__logo">
                        <h2>Cudem.<span class="pro">Pro</span></h2>
                    </div>
                </div>
            </a>

            <div class="title">
                <ul class="menu__title">
                <li><a href="?ctr=category">Loại Hàng</a></li>
                    <li><a href="?ctr=product">Sản Phẩm</a></li>
                    <li><a href="?ctr=basket">Giỏ Hàng</a></li>
                    <li><a href="?ctr=client">Khách Hàng</a></li>
                    <li><a href="?ctr=comment">Bình Luận</a></li>
                    <li><a href="?ctr=statistical">Thống Kê</a></li>
                    <li><a href="../../project1/index.php">Vào WEBSITE</a></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <div class="header">
                <div class="user">
                    <div class="header__img-user">
                    <img src="../../project1/public/layout/images/avatar/<?=$_SESSION['user']['hinh']?>" alt="">

                    </div>
                    <div class="header__name-user">
                    <p>Xin chào <span class="r9e80"><?=$_SESSION['user']['ho_ten']?></span></p>

                        <div class="logout">
                            <p><a href="#">Đăng Xuất</a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="Manipulation">
                <div class="hello">
                    <h1>QUẢN TRỊ KHÁCH HÀNG</h1>
                </div>
                <div class="btn__Manipulation">
                    <a href="?ctr=client"><button class="t9d0ea t9d0ea1">Quay Về</button></a>
                </div>
            </div>

            <div style="margin-top: 215px;"></div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="box">
                    <div class="box__1 box__input">
                        <label for="">Tên khách Hàng</label>
                        <?php if(isset($err['ho_ten'])):?>
                            <span style="color: red;"><?= $err['ho_ten']?></span>
                            <?php endif?>
                        <input type="text" class="input" name="ten_kh"value="<?=$query_khachhang['ho_ten']?>">

                        <label for="">email</label>
                        <?php if(isset($err['email'])):?>
                            <span style="color: red;"><?= $err['email']?></span>
                            <?php endif?>
                        <input type="text" class="input" name="email" value="<?=$query_khachhang['email']?>">


                        <label for="">Password</label>
                        <?php if(isset($err['mat_khau'])):?>
                            <span style="color: red;"><?= $err['password']?></span>
                            <?php endif?>
                        <input type="text" class="input" name="password" value="<?=$query_khachhang['mat_khau']?>">
                    </div>

                    <div class="box__2 box__input">
                        <label for="">avatar</label>
                        <img src="../../../duan1/public/layout/images/avatar/<?= $query_khachhang['hinh'] ?>" width="100" height="100" alt="">

                        <input type="file" class="input" name="anh_kh">

                        <label for="">Vai Trò</label>
                        <select name="vai_tro" class="input" id="">
                            <option value="1"<?= ($query_khachhang['vai_tro'] == 'Admin') ? 'selected' : ''?>>admin</option>
                            <option value="2"<?= ($query_khachhang['vai_tro'] == 'Khach Hang') ? 'selected' : ''?>>khách Hàng</option>
                        </select>
                    </div>
                </div>



                <button class="t9d0ea btn_t9d0ea2 t9d0ea1" name="btn_edit" type="submit">Cập nhật</button>
            </form>
        </div>
    </div>
</body>

</html>