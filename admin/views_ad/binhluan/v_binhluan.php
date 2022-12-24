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
                    <h1>QUẢN TRỊ BÌNH LUẬN</h1>
                </div>
               
            </div>
            <div style="margin-top: 215px;"></div>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Tên Hàng Hóa</th>
                    <th>Số Bình Luận</th>
                    <th>Thao Tác</th>
                </tr>
                <?php foreach($name_and_count_bl as $value):?>
                <tr class="d0r94">
                    <td><?=$value['id_bl']?></td>
                    <td><?=$value['ten_sp']?></td>
                    <td><?=$value['COUNT(*)']?></td>
                    <td class="bl_4">
                        <a href="?ctr=detail_bl&id_sp=<?=$value['id_sp']?>"><button class="t9d0ea">Chi Tiết</button></a>
                    </td>
                </tr>
                <?php endforeach?>
            </table>
        </div>
    </div>
</body>

</html>