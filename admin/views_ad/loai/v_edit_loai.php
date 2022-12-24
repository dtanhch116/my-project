<body>
    <div class="main">
        <div class="menu">
            <a href="../home.html" class="link__home">
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
                    <h1>QUẢN TRỊ HÀNG HÓA</h1>
                </div>
                <div class="btn__Manipulation">
                    <a href="?ctr=category"><button class="t9d0ea t9d0ea1">Quay Lại</button></a>
                </div>
            </div>

            <div style="margin-top: 215px;"></div>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="box">
                    <div class="box__input">
                        <input type="hidden" value="<?= $show_one['id_loai']?>">
                        <label for="">Tên Loai</label>
                        <input type="text" class="input" name="ten_loai" value="<?=$show_one['ten_loai']?>">

                        <label for="">Ảnh Loại</label>
                        <img src="../../project1/public/layout/images/category/<?= $show_one['anh'] ?>" alt="" width="100px"
                        height="100px">
                        <input type="hidden" name="anh_loai-1" value="<?=$show_one['anh']?>">
                        <input type="file" class="input" name="anh_loai">
                    </div>
                    <div class="box__input">
                      
                    </div>
                </div>
                <button class="t9d0ea btn_t9d0ea2 t9d0ea1" type="submit" name="btn_loai">Thêm</button>
            </form>
        </div>
    </div>
</body>

</html>