

<body onload="loadAnh()">
    <div id="main">
        <header>
            <div class="header">
                <div class="header__nav">
                    <nav class="content">
                        <div class="content--left">
                            <p class="header--download">
                                Tải ứng dụng
                                <img src="public/layout/images/header/QR-shopee.png" alt="" class="img--qr">
                            </p>
                            <p class="header--connect">Kết nối <i class="ti-facebook"></i> <i class="ti-instagram"></i>
                            </p>
                        </div>
                        <div class="content--right">
                            <div class="box__content--right">
                                <p class="header--notification">
                                    <i class="ti-bell"></i> Thông báo
                                </p>

                                <?php if (!isset($_SESSION['user'])) { ?>

                                    <p class="header--register"><a href="index.php?ctr=register">Đăng Ký</a></p>
                                    <p class="header--login"><a href="index.php?ctr=login">Đăng Nhập</a></p>

                                <?php } else { ?>

                                    <div class="seccion__main">
                                        <div class="seccion__img">
                                            <img src="public/layout/images/avatar/<?= $_SESSION['user']['hinh'] ?>" width="25px" height="25px" alt="">
                                        </div>
                                        <div class="seccion__username">
                                            <span><?= $_SESSION['user']['ho_ten'] ?></span>
                                            <div class="seccion__hover" style="z-index: 10;">
                                                <ul>
                                                    <li><a href="?ctr=my_account">Tài Khoản của tôi</a></li>
                                                    <li><a href="?ctr=logout">Đăng Xuất</a></li>
                                                    <?php if ($_SESSION['user']['vai_tro'] == 'admin') : ?>
                                                        <li><a href="admin/index.php">Quản Trị</a></li>
                                                    <?php endif ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="header-logo-search">
                    <div class="header--logo">
                        <a href="index.php"><img src="public/layout/images/banner_logo/cu_demlogo.png" alt=""></a>
                    </div>
                    <div class="header--search">
                        <form action="" method="POST" class="header__search--form">
                            <input placeholder="Tìm kiếm sản phẩm" type="text" name="value_from_search_product" class="header__search--input">
                            <button class="header__search--btn" name="btn_search_product" type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                    <div class="header--shopping">
                        <div class="shopping">

                            <a href="?ctr=<?= isset($_SESSION['user']) ? 'cart' : 'login' ?>"><i class="ti-shopping-cart"></i></a>

                            <div class="notify__cart">

                                <!-- khi không có sản phẩm -->
                                <?php
                                if (empty($_SESSION['cart'])) :

                                    echo '<div class="box_images__no-product"><img src="public/layout/images/avatar/anh-gai-xinh-hoc-sinh-tuyet-dep.jpg" alt="" class="images__no-product"></div>
                            
                                        <p class="error">Chưa có sản phẩm</p>';

                                else :
                                    echo '<div class="title__notify">
                                    <p class="error_isset">Sản phẩm mới thêm</p>
                                </div>';
                                    $count = 0;

                                    foreach ($_SESSION['cart'] as $key => $value) {
                                        $count++;
                                        if ($count > 2) break;

                                        echo '
                                        <div class="notify__cart--all">
                                            <div class="notify__cart--img">
        
                                                <img src="public/layout/images/product/' . $value['img'] . '" alt="">
                                            </div>
        
                                            <div class="notify__cart--name">
                                                <p>' . $value['name'] . '</p>
                                            </div>
        
                                            <div class="notify__cart--price">
                                                <p>' . number_format($value['price']) . 'đ</p>
                                            </div>
                                        </div>
        
                                        <a href="?ctr=cart" class="join__cart"><button>Xem Giỏ Hàng</button></a>';
                                    }



                                endif;
                                ?>

                            </div>




                            <!-- end -->

                        </div>
                    </div>
                </div>
            </div>
            <style>
    .header__search--input {
        outline-color: #ee4d2d;
        font-size: 16px;
        padding-left: 12px;
    }
</style>


<style>
    .shopping:hover .notify__cart {
        display: block;
    }
    .seccion__hover{
    position: absolute;
    width: 150px;
    height: 112px;
    top: 34px;
    border-radius: 3px;
    background-color: var(--pj-white);
    transform: translateX(-25px);
    /* display: none; */
}

    .seccion__hover::after {
        position: absolute;
        content: '';
        width: 150px;
        top: -9px;
        height: 150px;
        z-index: -2;
        /* background-color: black; */
    }

    .notify__cart {
        position: relative;
        margin-top: 7px;
        padding: 10px;
        width: 408px;
        height: 200px;
        z-index: 5;
        border-radius: 5px;
        box-shadow: 0px 0px 7px 0px black;

        transform: translateX(-328px);
        background-color: white;
        border: 1px solid white;
        display: none;
    }

    .title__notify {

        opacity: 0.6;
        border-bottom: 1px solid rgb(197, 197, 197);
    }

    .notify__cart--all {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;

    }

    .notify__cart--img {
        width: 50px;
        height: 50px;
        padding: 7px;
        border: 1px solid rgb(207, 207, 207);
    }

    .notify__cart--all img {
        width: 100%;
        height: 100%;
    }

    .notify__cart--name {
        padding: 0 5px 0 3px;
        width: 233px;
        height: 20px;
        overflow: hidden;
        /* display: block; */
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
    }

    .notify__cart--price {
        color: red;
        font-weight: bold;
    }

    .join__cart {
        position: absolute;
        padding-bottom: 5px;
        bottom: 4px;
        right: 10px;
    }


    .join__cart>button {
        cursor: pointer;
        height: 30px;
        width: 111px;
        border-radius: 3px;
        font-weight: bold;
        color: white;
        background-color: #ff7337;
        border: 1px solid #ff7337;
    }



    .shopping:hover .notify__cart {
        display: block;
    }

    .notify__cart {
        position: relative;
        margin-top: 7px;
        padding: 10px;
        width: 408px;
        height: 200px;
        z-index: 5;
        border-radius: 5px;
        box-shadow: 0px 0px 7px 0px black;

        transform: translateX(-328px);
        background-color: white;
        border: 1px solid white;
        display: none;
    }

    .title__notify {

        opacity: 0.6;
        border-bottom: 1px solid rgb(197, 197, 197);
    }

    .notify__cart--all {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;

    }

    .notify__cart--img {
        width: 50px;
        height: 50px;
        padding: 7px;
        border: 1px solid rgb(207, 207, 207);
    }

    .notify__cart--all img {
        width: 100%;
        height: 100%;
    }

    .notify__cart--name {
        padding: 0 5px 0 3px;
        width: 233px;
        height: 20px;
        overflow: hidden;
        /* display: block; */
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
    }

    .notify__cart--price {
        color: red;
        font-weight: bold;
    }

    .join__cart {
        position: absolute;
        padding-bottom: 5px;
        bottom: 4px;
        right: 10px;
    }


    .join__cart>button {
        cursor: pointer;
        height: 30px;
        width: 111px;
        border-radius: 3px;
        font-weight: bold;
        color: white;
        background-color: #ff7337;
        border: 1px solid #ff7337;
    }

    .images__no-product {
        width: 100%;
        height: 110px;
        border-radius: 50%;
        object-fit: cover;
    }

    .box_images__no-product {
        width: 110px;
        margin: auto;
    }

    .error {
        font-size: 18px;
        text-align: center;
        margin-top: 20px;
    }
</style>
        </header>