<style>
    .cart-header {
        width: 100%;
    }

    table {
        border-collapse: collapse;
        /* margin-bottom: 100px; */
        border: 1px solid #ee4d2d;
        border-bottom: 1px solid transparent;
    }

    thead {
        background: #ff7337;
    }

    thead tr td {
        color: #fff;
        text-align: center;
        padding: 10px;
    }

    tbody tr td {
        text-align: center;
        border-bottom: 1px solid #ee4d2d;
        height: 50px;
        width: 100px;

    }

    .cart__delete {
        width: 24px;
        border-right: 1px solid #ee4d2d;
    }

    .cart__delete-head {
        border-bottom: 1px solid transparent;
    }

    .cart__img {
        width: 56px;
        padding: 6px 0;
    }

    .cart__img img {
        display: inline-block;
        height: 64px;
        width: 64px;
        object-fit: cover;
        border-radius: 50%;
    }

    tbody tr td img {
        width: 100%;
        height: auto;
        object-fit: contain;
    }

    .cart__buy {
        color: #fff;
        text-decoration: none;
        display: inline-block;
        padding: 12px 16px;
        background-color: #ee4d2d;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .p-header {
        text-align: center;
        padding: 50px 10px;
        font-size: 28px;
        font-weight: bold;
        color: #ff7337;
        font-weight: 700;

    }

    .p-imgNoCart {
        padding: 0 10px 12px;
        font-size: 24px;
        font-weight: 700;
        color: #ee4d2d;
    }

    /* .p-header::after{
    content: '';
    display: block;
    border-bottom: 2px solid #ee4d2d; 
    width: 25px;
    padding-top: 10px;
} */
    main {
        width: 70%;
        margin: auto;
    }

    .chon-sp {
        width: 8px;
        border-right: 1px solid #ee4d2d;
    }

    .all-sp {
        cursor: pointer;
        text-decoration: underline;
    }

    .chon-sp-icon {
        width: 18px;
        height: 18px;
        border: 1px solid rgba(0, 0, 0, 0.5);
        border-radius: 2px;
        text-align: center;
        margin: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .chon-sp-icon i {
        font-size: 10px;
        display: none;
    }

    .cart-many {
        margin-top: 28px;
        width: 180px;
        display: flex;
        justify-content: space-between;
    }

    .cart-many button {
        color: #fff;
        background-color: #ee4d2d;
        border: none;
        font-size: 16px;
        display: block;
        cursor: pointer;
    }

    .delete-many a {
        text-decoration: none;
        color: #fff;
        font-size: 16px;
    }

    .chon-sp-icon.choosed i {
        display: block;
    }

    .imgNoCart {
        text-align: center;
    }

    .addNoCart {
        margin: auto;
        padding: 10px 16px;
        background-color: #ff7337;
        color: #fff;
        cursor: pointer;
        margin-top: 28px;
        width: 240px;
        font-size: 18px;
    }

    .addNoCart a {
        text-decoration: none;
        color: #fff;
        font-size: 18px;
    }


    .donHang--ordered {
        text-align: center;
        margin-top: 90px;
    }

    .ordered-heading {
        text-align: center;
        font-size: 20px;
        color: #ff7337;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .ordered-table {
        margin: auto;
    }

    .ordered-table table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ff7337;
    }

    .ordered-table tr {
        border-collapse: collapse;
    }

    .ordered-table th {
        border: 1px solid #ff7337;
        padding: 8px 12px;
        border-collapse: collapse;
    }

    .ordered-table td {
        padding: 8px 12px;
        border: 1px solid #ff7337;
        /* min-width: 168px; */
    }

    .small {
        width: 48px;
    }

    .ordered-table button {
        padding: 4px 8px;
        margin: auto;
        margin-left: 4px;
        cursor: pointer;
    }

    .showAllHd {
        text-align: center;
        margin-top: 16px !important;
        cursor: pointer;
    }

    .showAllHd a {
        text-decoration: none;
        font-size: 15px;
        color: #333;
    }

    .btn__dl {
        display: block;
        width: 152px;
        margin: auto;
        padding: 8px 0;
        font-size: 15px;
        background-color: #efefef;
    }

    .btn--disable {
        opacity: 0.7;
        cursor: default !important;
        user-select: none;
    }
</style>
<main class="mainnn">
    <?php if (isset($_GET['msg'])) :
        if ($_GET['msg'] == 'successful') :
            echo "<script>
                alert('Đặt Hàng Thành Công ^_^')
            </script>";
        // else: if($_GET['msg'] == 'editSuccess'):
        //     echo "<script>
        //         alert('Đã Lưu Thay Đổi ^_^')
        //     </script>";
        endif;
    endif;
    // endif;
    ?>
    <div class="cart-header">
        <p class="p-header">Shopping Cart</p>
        <?php if ($_SESSION['cart']) : ?>
            <section id="cart-container" class="cart-container my-5">
                <table width="100%">
                    <thead>
                        <tr>
                            <td class="chon-sp">
                                <p class="all-sp">Chọn tất cả</p>
                            </td>
                            <td class="cart__delete cart__delete-head">Xóa</td>
                            <td class="cart__img"></td>
                            <td>Sản phẩm</td>
                            <td>Đơn giá</td>
                            <td>Giảm giá</td>
                            <td>Thanh toán</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $k => $v) : ?>

                            <tr>
                                <td class="chon-sp">
                                    <div id="<?= $k ?>" class="chon-sp-icon" onclick="">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                </td>
                                <td class="cart__delete"><a href="?ctr=cart&dl_Id=<?= $k ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                                <td class="cart__img"><img src="public/layout/images/product/<?= $v['img'] ?>" alt=""></td>

                                <td><?= $v['name'] ?></td>

                                <td><?= number_format($v['price'], 0, '', ',') ?><sup style='color:#ee4d2d;'>đ</sup></td>

                                <td><?= number_format($v['giamgia'], 0, '', ',') ?><sup style='color:#ee4d2d;'>đ</sup></td>

                                <td><a href="?ctr=cart&order&order_id=<?= $k ?>" class="cart__buy">Mua Ngay</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

                <div class="cart-many">
                    <form action="?ctr=cart&dl_Id" method="post">
                        <?php foreach ($_SESSION['cart'] as $k => $v) : ?>
                            <input type="hidden" class="choosed-cart-dl" name="choosed-cart-dl[]" value="">
                        <?php endforeach ?>
                        <p onclick="msgErr()" class="delete-many">
                            <a href="?ctr=cart&dl_Id" class="cart__buy"><button name="choose-many--dl">Xóa</button></a>
                        </p>
                    </form>

                    <form action="?ctr=cart&order_id" method="post">
                        <?php foreach ($_SESSION['cart'] as $k => $v) : ?>
                            <input type="hidden" class="choosed-cart-order" name="choosed-cart-order[]" value="">
                        <?php endforeach ?>
                        <div onclick="msgErr()" class="buy-many">
                            <a href="?ctr=cart&order_id" class="cart__buy"><button name="choose-many--order">Mua Ngay</button></a>
                        </div>
                </div>
                </form>

            </section>
        <?php else : ?>
            <div class="imgNoCart">
                <div class="p-header p-imgNoCart">Giỏ Hàng Của Bạn Trống</div>
                <!-- <img src="http://media.doisongphapluat.com/602/2019/12/27/nu-sinh-gieo-thuong-nho-nho-khoanh-khac-xuat-than-tren-song-truyen-hinh-2.jpeg" alt=""> -->
                <img src="https://hinhgaixinh.com/wp-content/uploads/2021/10/gai-thanh-hoa-sexy-min.jpg" alt="">
                <p onclick="window.location.href='?ctr'" class="addNoCart"><a href="?ctr">Thêm Giỏ Hàng</a></p>
            </div>

        <?php endif ?>
    </div>


    <div class="donHang--ordered">
        <div class="ordered-heading">Đơn Hàng Của Bạn</div>
        <div class="ordered-table">
            <table>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th class="small">Số lượng</th>
                    <th>Ngày đặt</th>
                    <!-- <th>Ngày nhận</th> -->
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                    <th style="width: 68px;" class="small">Xem chi tiết</th>
                </tr>

                <?php foreach ($hd_order as $v) : ?>
                    <tr>
                        <td><?= get_sp_from_hd($v['id_sp']) ?></td>
                        <td class="small"><?= $v['quantity'] ?></td>
                        <td style="max-width: 166px;"><?php echo date('d - m - Y', strtotime($v['ngay_mua'])); ?></td>
                        <!-- <td style="max-width: 166px;">Chưa nhận</td> -->
                        <td>
                            <?php
                            if ($v['trang_thai'] == 0)
                                echo 'Chờ xác nhận';
                            elseif ($v['trang_thai'] == 1)
                                echo 'Đang giao';
                            elseif ($v['trang_thai'] == 2)
                                echo 'Đã nhận';
                            else echo 'Đã bị hủy';
                            ?>
                        </td>
                        <td style="min-width: 168px; max-width: 172px;">
                            <?php if ($v['trang_thai'] == 0) : ?>
                                <form action="?ctr=cart&showHdDetail&editHd&idHd=<?= $v['id_hd'] ?>&idSp=<?= $v['id_sp'] ?>" method="post">
                                    <input type="hidden" value="<?= $v['id_sp'] ?>" name="idSp">
                                    <button>Sửa đơn</button>

                                    <a style="    background-color: #efefef;border: 1px solid rgba(0,0,0,0.5);border-radius: 2px;padding: 6px 10px;font-size: 13px;color: #000;text-decoration: none;" href="?ctr=cart&dlHdct&idHd=<?= $v['id_hd'] ?>&idSp=<?= $v['id_sp'] ?>" onclick="return dlHdDetail()">Hủy đơn</a>
                                    <?php else : if ($v['trang_thai'] == 1) : ?>

                                        <span class="btn__dl btn--disable">Xóa</span>

                                    <?php else : ?>
                                        <a style="    background-color: #efefef;border: 1px solid rgba(0,0,0,0.5);border-radius: 2px;padding: 6px 10px;font-size: 13px;color: #000;text-decoration: none;display: block;margin: auto;width: 152px;" href="?ctr=cart&dlHdct&idHd=<?= $v['id_hd'] ?>&idSp=<?= $v['id_sp'] ?>">Xóa</a>
                                    <?php endif ?>
                                </form>
                            <?php endif ?>
                        </td>
                        <td style="width: 68px;" class="small"><a href="?ctr=cart&showHdDetail&idHd=<?= $v['id_hd'] ?>&idSp=<?= $v['id_sp'] ?>">Chi tiết</a></td>
                    </tr>
                <?php endforeach ?>
            </table>
            <?php if (sizeof($hd_all_order) > 6) : ?>
                <button class="showAllHd"><a href="?ctr=cart&showAllHd">Xem Tất Cả</a></button>
            <?php endif ?>
        </div>
    </div>
</main>
<script src="public/layout/js/js_cart.js"></script>
<script>
    var err = 0;
    var msg = 'Vui lòng lựa chọn các sản phẩm!';
    var input_sp_choosed_dl = document.querySelectorAll('.choosed-cart-dl');
    var input_sp_choosed_order = document.querySelectorAll('.choosed-cart-order');

    function msgErr() {
        for (const item of input_sp_choosed_dl) {
            if (item.value) {
                break;
            } else err++;
        }
        if (err > 0) {
            alert(msg);
        }
    }

    function dlHdDetail() {
        var bool = confirm('Xác Nhận Hủy Đơn Hàng ?')
        if (bool) {
            alert('XShop thông báo: Đơn hàng của bạn đã bị hủy. Chúng tôi đã gửi lại tiền thừa vào tài khoản của bạn. Hãy kiểm tra tài khoản của bạn!');
        }
        return bool;
    }
</script>