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
                        <img src="../../project1/public/layout/images/avatar/<?= $_SESSION['user']['hinh'] ?>" alt="">

                    </div>
                    <div class="header__name-user">
                        <p>Xin chào <span class="r9e80"><?= $_SESSION['user']['ho_ten'] ?></span></p>

                        <div class="logout">
                            <p><a href="#">Đăng Xuất</a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="Manipulation">
                <div class="hello">
                    <h1>QUẢN TRỊ HÓA ĐƠN</h1>
                </div>
                <div class="btn__Manipulation">

                </div>
            </div>

            <div style="margin-top: 215px;"></div>

            <?php if (isset($_GET['hdDetail'])) : ?>

                <style>
                    .content {
                        height: auto !important;
                    }
                    .order__kh>p{
                        display: flex;
                        align-items: center;
                    }

                    .order {
                        margin: auto;
                        padding-top: 48px;
                        min-width: 600px;
                        /* padding-bottom: 48px; */
                    }

                    .order__heading {
                        /* color: #ee4d2d; */
                        padding: 0 32px;
                        text-align: center;
                    }

                    .order__kh {
                        margin-top: 36px;
                    }

                    .order__kh p {
                        line-height: 1.5;
                        font-size: 16px;
                    }

                    .order__kh label {
                        font-size: 16px;
                        margin-right: 8px !important;
                        font-weight: 600;

                    }

                    .order__sp {
                        margin-top: 24px;
                    }

                    .order__sp-heading {
                        /* font-weight: 600; */
                        font-size: 16px;
                    }

                    .order__sp-table {
                        margin-left: 48px;
                        margin-top: 8px;
                    }

                    .order__sp-table tr {
                        width: 600px;
                    }

                    .order__sp-table th,
                    .order__sp-table td {
                        margin-right: 0;
                        font-weight: 400;
                        padding: 8px 32px;
                        text-align: center;
                        border-bottom: 1px solid #ddd;
                    }

                    .order__sp-table th {
                        font-weight: 600;
                    }

                    .total-price {
                        margin-top: 24px;
                        font-size: 18px;
                        /* font-weight: 600; */
                    }

                    .thanh-toan {
                        padding: 10px 12px;
                        min-width: 164px;
                        width: 128px;
                        text-align: center;
                        background-color: #ee4d2d;
                        font-size: 18px;
                        color: #fff;
                        margin-top: 20px;
                        border-radius: 2px;
                        border: none;
                        cursor: pointer;
                    }

                    .quantity {
                        font-size: 16px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .num-cut {
                        margin-right: 8px;
                        cursor: pointer;
                        font-weight: 400;
                    }

                    .num-add {
                        margin-left: 8px;
                        cursor: pointer;
                        font-weight: 400;
                    }

                    .huyOrder {
                        margin-left: 16px;
                        font-size: 17px;
                        text-decoration: none;
                        color: #000;
                    }

                    .backPage {
                        padding: 8px 12px;
                        margin-top: 15px;
                        color: #fff;
                        background-color: #ee4d2d;
                        width: 120px;
                        text-align: center;
                        font-size: 16px;
                        border-radius: 2px;
                        cursor: pointer;
                    }
                </style>

                <div class="order">
                    <h2 class="order__heading">Chi tiết đơn hàng</h2>
                    <div class="order__kh">
                        <p class="order__kh-name">
                            <label for="">Khách hàng:</label> <?= $_SESSION['user']['ho_ten'] ?>
                        </p>
                        <p class="order__kh-phone">
                            <label for="">Số điện thoại:</label> <?= $_SESSION['user']['phone'] ?>
                        </p>
                        <p class="order__kh-address">
                            <label for="">Địa chỉ nhận hàng:</label> <?= $_SESSION['user']['dia_chi'] ?>
                        </p>
                    </div>

                    <div class="order__sp">
                        <p class="order__sp-heading">Sản phẩm:</p>
                        <table class="order__sp-table">
                            <thead>
                                <tr>
                                    <th style="max-width: 360px;">Tên sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Giảm giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $v) : ?>
                                    <span style="display: none;" class="priceOrder--noformat"><?= $v['price'] ?></span>
                                    <span style="display: none;" class="giamGia--noformat"><?= $v['giamgia'] ?></span>
                                    <tr class="cart-item">
                                        <td style="max-width: 360px;"><?= $v['ten_sp'] ?></td>
                                        <td class="priceOrder"><?= number_format($v['price'], 0, '', '.') ?><sup style='color:#ee4d2d;'>đ</sup></td>
                                        <td class="giamGia"><?= number_format($v['giamgia'], 0, '', '.') ?><sup style='color:#ee4d2d;'>đ</sup></td>
                                        <td>
                                            <?php if (isset($_GET['editHd'])) : ?>
                                                <div class="quantity">
                                                    <span onclick="minus()" class="num-cut"><i class="fa-regular fa-square-minus"></i></span>
                                                    <span class='num' style="font-size: 20px;"><?= $v['quantity'] ?></span>
                                                    <span onclick="plus()" class="num-add"><i class="fa-regular fa-square-plus"></i></span>
                                                </div>
                                            <?php else : ?>
                                                <div class="quantity">
                                                    <span class='num' style="font-size: 20px;">2</span>
                                                </div>
                                            <?php endif ?>
                                        </td>
                                        <td class="thanhTien"><sup style='color:#ee4d2d;'>đ</sup></td>
                                    </tr>
                                <?php endforeach ?>

                            </tbody>

                        </table>


                        <p style="margin-top: 20px; font-size: 16px;" class="ngay-mua">Ngày đặt hàng: <?php echo date('l, d - m - Y', strtotime($v['ngay_mua'])); ?></p>
                        <p style="font-size: 16px; margin-top: 8px;" class="trang-thai">Trạng thái:
                            <?php
                            if ($v['trang_thai'] == 0)
                                echo 'Chờ xác nhận';
                            elseif ($v['trang_thai'] == 1)
                                echo 'Đang giao';
                            elseif ($v['trang_thai'] == 2)
                                echo 'Đã nhận';
                            else echo 'Đã bị hủy';
                            ?>
                        </p>
                        <div onclick="window.location.href = '?ctr=basket'" class="backPage">Quay lại</div>
                    </div>
                </div>
            <?php else : ?>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Tên Khách Hàng</th>
                        <!-- <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th> -->
                        <th>Ngày Đặt</th>
                        <th>Trạng Thái</th>
                        <th>Thao Tác</th>
                        <th>Chi Tiết Hóa Đơn</th>
                    </tr>
                    <?php if ($trang_thai) : ?>
                        <?php foreach ($trang_thai as $value) : ?>
                            <tr class="d0r94">
                                <td><?= $value['id_hd'] ?></td>
                                <td><?= $value_array_hoa_don[$value['id_hd']]['name'] ?></td>

                                <td><?= $value['ngay_mua'] ?></td>
                                <td>
                                    <?php if ($value['trang_thai'] == 0) { ?>
                                        Chờ xác nhận
                                    <?php } elseif ($value['trang_thai'] == 1) { ?>
                                        Đang giao
                                    <?php } elseif ($value['trang_thai'] == 2) { ?>
                                        Đã giao
                                    <?php } else { ?>
                                        Đã hủy
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($value['trang_thai'] == 0) {  ?>
                                        <form style="display: flex;justify-content: center;" action="" method="POST">
                                            <input name="id_trangthai" type="hidden" value="<?= $value['id_hd'] ?>">
                                            <button style="padding: 4px 8px;cursor: pointer;font-size: 15px;" name="btn_xacnhan">Xác Nhận</button>
                                            <button style="margin-left: 16px !important; padding: 4px 8px;cursor: pointer;font-size: 15px;" name="btn_huydon">Hủy Đơn</button>
                                        </form>

                                    <?php } else if ($value['trang_thai'] == 1) { ?>
                                        <span style="padding: 4px 8px;font-size: 15px;opacity: 0.8;background-color: #ccc;border: 1px solid #9b8c8c;cursor: default;color: #504d4d;">Đã xác nhận</span>
                                    <?php } else { ?>
                                        <span style="padding: 4px 8px;font-size: 15px;opacity: 0.8;background-color: #ccc;border: 1px solid #9b8c8c;cursor: default;color: #504d4d;">Đã bị hủy</span>
                                    <?php } ?>
                                </td>
                                <td><a href="?ctr=basket&hdDetail&idHd=<?= $value['id_hd'] ?>">Chi tiết</a></td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>


                </table>

            <?php endif ?>


        </div>
    </div>
</body>

<script>
    var cartItem = document.querySelectorAll('.cart-item');
    var price = document.querySelectorAll('.priceOrder--noformat');
    var giamGia = document.querySelectorAll('.giamGia--noformat');
    var quantity = document.querySelectorAll('.num');
    var thanhTien = document.querySelectorAll('.thanhTien');
    var totalMoney = document.querySelector('.total-price__value');

    function setMoney() {
        var sum = 0;
        for (var i = 0; i < cartItem.length; i++) {
            // console.log(quantity[i].innerText);
            var subMoney = (price[i].innerText - giamGia[i].innerText) * quantity[i].innerText;
            // console.log(subMoney);
            var newsubMoney = new Intl.NumberFormat().format(subMoney);
            thanhTien[i].innerHTML = newsubMoney + "<sup style='color:#ee4d2d;'>đ</sup>";
            sum += subMoney;
        }
        var newsum = new Intl.NumberFormat().format(sum);
        // totalMoney.innerHTML = newsum + "<sup style='color:#ee4d2d;'>đ</sup>";
        return sum;
    }
    setMoney();
</script>

</html>