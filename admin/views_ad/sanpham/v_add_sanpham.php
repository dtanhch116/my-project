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
                    <h1>QUẢN TRỊ HÀNG HÓA</h1>
                </div>
                <div class="btn__Manipulation">
                    <a href="?ctr=product"><button class="t9d0ea t9d0ea1">Quay Lại</button></a>
                </div>
            </div>

            <div style="margin-top: 215px;"></div>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="box">
                    <div class="box__input">
                        <label for="">Tên Sản Phẩm</label>
                        <?php if(isset($err['ten'])):?>
                            <span style="color: red;"><?= $err['ten'] ?></span>
                            <?php endif?>
                        <input type="text" class="input" name="ten_sp">

                        <label for="">Đơn Giá</label>
                        <?php if(!empty($err['don_gia'])):?>
                            <span style="color: red;"><?= $err['don_gia'] ?></span>
                            <?php endif?>
                        <input type="text" class="input" name="don_gia">

                        <label for="">Giảm giá</label>
                        <?php if(!empty($err['giam_gia'])):?>
                            <span style="color: red;"><?= $err['giam_gia'] ?></span>
                            <?php endif?>
                        <input type="text" class="input" name="giam_gia">

                        <label for="">Ảnh Sản Phẩm</label>
                        <?php if(!empty($err['anh'])):?>
                            <span style="color: red;"><?= $err['anh'] ?></span>
                            <?php endif?>
                        <input type="file" class="input" name="anh_sp">
                    </div>
                    
                    <div class="box__input">
                        <label for="">Trạng Thái</label>
                        <select name="dac_biet" class="input" id="">
                            <option value="Đặc Biệt">Đặc Biệt</option>
                            <option value="Bình Thường">Bình Thường</option>
                        </select>

                        <label for="">Ngày Nhập</label>
                        <?php if(!empty($err['ngay_nhap'])):?>
                            <span style="color: red;"><?= $err['ngay_nhap'] ?></span>
                            <?php endif?>
                        <input type="date" class="input" name="ngay_nhap">

                        <label for="">Loại</label>
                        <select name="id_loai" class="input" id="">
                            <?php foreach($show_loai as $value):?>
                            <option value="<?= $value['id_loai']?>"><?= $value['ten_loai']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>


                <label for="" class="textarea__lable">Mô Tả</label>
                <?php if(!empty($err['mo_ta'])):?>
                            <span style="color: red;"><?= $err['mo_ta'] ?></span>
                            <?php endif?>
                <textarea name="mo_ta" class="mota textarea" cols="30" rows="10"></textarea>



                <button class="t9d0ea btn_t9d0ea2 t9d0ea1" type="submit" name="btn_sanpham">Thêm</button>
            </form>
        </div>
    </div>
</body>

</html>