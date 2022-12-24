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
                <div class="btn__Manipulation">
                    <a href="?ctr=comment"><button class="t9d0ea t9d0ea1">Quay Lại</button></a>
                </div>
               
            </div>
            <div style="margin-top: 215px;"></div>
            <table class="table">
            <tr>
                    <th>ID</th>
                    <th>Tên Khách Hàng</th>
                    <th>Ngày Bình Luận</th>
                    <th>Nội dung</th>
                    <th>Thao Tác</th>
                </tr>
                <?php foreach($detail_bl as $value):?>
                <tr class="d0r94">
                    <td><?=$value['id_bl']?></td>
                    <td><?=$value['ho_ten']?></td>
                    <td><?=$value['ngay_bl']?></td>
                    <td class="ct_4"><?=$value['noi_dung']?></td>
                    <td class="ct_5">
                        <a href="?ctr=edit_comment"><button class="t9d0ea">Edit</button></a>
                        <a href="?ctr=delete_comment"><button class="t9d0ea">Delete</button></a>
                    </td>
                </tr>
                <?php endforeach?>
            </table>
        </div>
    </div>
</body>

</html>