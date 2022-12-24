<style>
    .content {
        height: auto !important;
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
        margin-right: 4px;
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

<div class="content">
    <div class="order">
        <?php if (isset($_GET['editHd'])) : ?>
            <h2 style="color: #ee4d2d;" class="order__heading">Chỉnh sửa đơn hàng</h2>
        <?php else : ?>
            <h2 class="order__heading">Chi tiết đơn hàng</h2>
        <?php endif ?>
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
                    <span style="display: none;" class="priceOrder--noformat"><?= $data['price'] ?></span>
                    <span style="display: none;" class="giamGia--noformat"><?= $data['giamgia'] ?></span>
                    <tr class="cart-item">
                        <td style="max-width: 360px;"><?= $data['ten_sp'] ?></td>
                        <td class="priceOrder"><?= number_format($data['price'], 0, '', '.') ?><sup style='color:#ee4d2d;'>đ</sup></td>
                        <td class="giamGia"><?= number_format($data['giamgia'], 0, '', '.') ?><sup style='color:#ee4d2d;'>đ</sup></td>
                        <td>
                            <?php if (isset($_GET['editHd'])) : ?>
                                <div class="quantity">
                                    <span onclick="minus()" class="num-cut"><i class="fa-regular fa-square-minus"></i></span>
                                    <span class='num' style="font-size: 20px;"><?= $data['quantity'] ?></span>
                                    <span onclick="plus()" class="num-add"><i class="fa-regular fa-square-plus"></i></span>
                                </div>
                            <?php else : ?>
                                <div class="quantity">
                                    <span class='num' style="font-size: 20px;"><?= $data['quantity'] ?></span>
                                </div>
                            <?php endif ?>
                        </td>
                        <td class="thanhTien"><sup style='color:#ee4d2d;'>đ</sup></td>
                    </tr>

                </tbody>

            </table>

            <?php if (!isset($_GET['editHd'])) : ?>
                <p style="margin-top: 20px; font-size: 16px;" class="ngay-mua">Ngày đặt hàng: <?php echo date('l, d - m - Y', strtotime($data['ngay_mua'])); ?></p>
                <p style="font-size: 16px; margin-top: 8px;" class="trang-thai">Trạng thái:
                    <?php
                    if ($data['trang_thai'] == 0)
                        echo 'Chờ xác nhận';
                    elseif ($data['trang_thai'] == 1)
                        echo 'Đang giao';
                    elseif ($data['trang_thai'] == 2)
                        echo 'Đã nhận';
                    else echo 'Đã bị hủy';
                    ?>
                </p>
                <div onclick="window.location.href = '?ctr=cart'" class="backPage">Quay lại</div>
            <?php else : ?>
                <div class="total-price">
                    <span style="display: none;" class="tienThanhToan--noformat"><?= $tienDaThanhToan ?></span>
                    <label for="">Tổng tiền đã thanh toán: </label>
                    <span style="color:#ee4d2d;font-size: 19px; letter-spacing: 1px;" class="total-price__value"><?= number_format($tienDaThanhToan, 0, '', '.') ?><sup style='color:#ee4d2d;'>đ</sup></span>
                </div>
                <div style="margin-top: 12px;" class="total-price">
                    <label for="">Tổng tiền còn thiếu: </label>
                    <span style="color:#ee4d2d;font-size: 19px; letter-spacing: 1px;" class="tien-thieu"><?= number_format($tienDaThanhToan, 0, '', '.') ?></span><sup style='color:#ee4d2d;'>đ</sup>
                </div>
                <form action="" method="post">
                    <input type="hidden" class="quantity-idSp" value="" name="edit-quantity">
                    <button onclick="return editHd()" name="editOrder" class="thanh-toan">Lưu Thay Đổi</button>
                    <a href="?ctr=cart" class="huyOrder">Trở Lại</a>
                </form>
            <?php endif ?>
        </div>
    </div>
</div>


<?php if (isset($_GET['editHd'])) : ?>
    <script>
        var boxQuantityElm = document.querySelectorAll('.quantity');
        var iconMinus = document.querySelectorAll('.num-cut');
        var act = '';

        function minus() {
            act = 'minus';
        }

        function plus() {
            act = 'plus';
        }
        if (act == 'minus') alert('minus');
        if (act == 'plus') alert('plus');
        for (const item of boxQuantityElm) {

            item.addEventListener('click', function() {
                var quantityElm = item.children[1];
                var quantity = quantityElm.innerHTML;
                var setIconMinus = item.children[0];
                if (act == 'minus') {
                    quantityElm.innerHTML = --quantity;
                    if (quantity <= 1) {
                        quantityElm.innerHTML = 1;
                    }
                }
                if (act == 'plus') {
                    quantityElm.innerHTML = ++quantity;
                }

                setMinusDefault(quantity, setIconMinus);
                setMoney();
                setDataQuantity();
                setTienThieu();
            })

            if (item.children[1].innerHTML <= 1) {
                item.children[0].style.opacity = 0.6;
                item.children[0].style.cursor = 'default';
            }

        }

        function setMinusDefault(quantity, node) {
            if (quantity <= 1) {
                node.style.opacity = 0.6;
                node.style.cursor = 'default';
            } else {
                node.style.opacity = 1;
                node.style.cursor = 'pointer';
            }
        }

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

        var dataQuantity = document.querySelectorAll('.quantity-idSp');

        function setDataQuantity() {
            for (var i = 0; i < dataQuantity.length; i++) {
                dataQuantity[i].value = quantity[i].innerText;
            }
        }
        setDataQuantity();
        // console.log('hihi');

        var tien_thieu = document.querySelector('.tien-thieu');
        // console.log(tien_thieu);
        var thanh_toan = document.querySelector('.thanh-toan')
        // console.log(thanh_toan);
        function setTienThieu() {
            var tienThanhToan = document.querySelector('.tienThanhToan--noformat').innerText;
            // console.log(setMoney());
            var tienNo = setMoney() - tienThanhToan;
            if (tienNo < 0) tienNo = 0;
            tien_thieu.innerHTML = new Intl.NumberFormat().format(tienNo);
            return setMoney() - tienThanhToan;
        }
        setTienThieu();

        function editHd() {
            var notify = (tien_thieu.innerText == 0) ? 'Xác nhận thay đổi ^_^' : 'Bạn cần thanh toán đủ trước khi lưu thay đổi!';
            var bool = confirm(notify);
            if (setTienThieu() < 0) {
                alert('XShop thông báo: Đơn hàng của bạn đã được thay đổi. Chúng tôi đã gửi lại tiền thừa vào tài khoản của bạn. Hãy kiểm tra tài khoản của bạn!');
            }
            return bool;
        }
    </script>

<?php else : ?>

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

<?php endif ?>