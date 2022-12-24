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
        padding: 8px 12px;
        min-width: 64px;
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
        justify-content: space-between;
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
</style>


<div class="content">
    <div class="order">
        <h2 class="order__heading">Thông tin đặt hàng</h2>
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
                    <?php foreach ($arrOrder as $v) : ?>
                        <span style="display: none;" class="priceOrder--noformat"><?= $v['price'] ?></span><span style="display: none;" class="giamGia--noformat"><?= $v['giamgia'] ?></span>
                        <tr class="cart-item">
                            <td style="max-width: 360px;"><?= $v['name'] ?></td>
                            <td class="priceOrder"><?= number_format($v['price'],0,'','.') ?><sup style='color:#ee4d2d;'>đ</sup></td>
                            <td class="giamGia"><?= number_format($v['giamgia'],0,'','.') ?><sup style='color:#ee4d2d;'>đ</sup></td>
                            <td>
                                <div class="quantity">
                                    <span onclick="minus()" class="num-cut"><i class="fa-regular fa-square-minus"></i></span>
                                    <span class='num' style="font-size: 20px;">1</span>
                                    <span onclick="plus()" class="num-add"><i class="fa-regular fa-square-plus"></i></span>
                                </div>
                            </td>
                            <td class="thanhTien">100000000</td>
                        </tr>
                    <?php endforeach ?>

                </tbody>

            </table>


            <div class="total-price">
            <label for="">Tổng tiền: </label>
                <span style="color:#ee4d2d;font-size: 19px; letter-spacing: 1px;" class="total-price__value"></span>
            </div>

            <form action="" method="post">
                <?php
                foreach($arrOrder as $k => $v): ?>
                    <input type="hidden" class="quantity-idSp" value="" name="quantity[<?=$v['id']?>]">
                <?php endforeach ?>
            <button onclick="return confirm('Xác Nhận Đặt Hàng ^_^')" name="thanhToan" class="thanh-toan">Thanh Toán</button>
            <a href="?ctr=cart" class="huyOrder">Trở Lại</a>
            </form>
        </div>
    </div>
</div>

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
    if(act == 'minus') alert('minus');
    if(act == 'plus') alert('plus');
    for (const item of boxQuantityElm) {
        
        item.addEventListener('click', function() {
            var quantityElm = item.children[1];
            var quantity = quantityElm.innerHTML;
            var setIconMinus = item.children[0];
            if(act == 'minus') {
                quantityElm.innerHTML = --quantity;
                if(quantity <= 1) {
                quantityElm.innerHTML = 1;
                }
            }
            if(act == 'plus') {
                quantityElm.innerHTML = ++quantity;
            }

            setMinusDefault(quantity, setIconMinus);
            setMoney();
            setDataQuantity();
        })

        if(item.children[1].innerHTML <= 1) {
            item.children[0].style.opacity = 0.6;
            item.children[0].style.cursor = 'default';
        }
        
    }

    function setMinusDefault(quantity,node){
        if(quantity <= 1) {
            node.style.opacity = 0.6;
            node.style.cursor = 'default';
        }
        else {
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

    function setMoney () {
        var sum = 0;
       for(var i =0; i<cartItem.length; i++) {
        var subMoney = (price[i].innerText - giamGia[i].innerText) * quantity[i].innerText;
        var newsubMoney = new Intl.NumberFormat().format(subMoney);
        thanhTien[i].innerHTML = newsubMoney+"<sup style='color:#ee4d2d;'>đ</sup>";
        sum += subMoney;
    }
    var newsum = new Intl.NumberFormat().format(sum);
    totalMoney.innerHTML = newsum+"<sup style='color:#ee4d2d;'>đ</sup>";
    }
    setMoney();

    var dataQuantity = document.querySelectorAll('.quantity-idSp');
    function setDataQuantity() {
        for(var i=0; i< dataQuantity.length;i++) {
            dataQuantity[i].value = quantity[i].innerText;
        }
    }
    setDataQuantity();


</script>