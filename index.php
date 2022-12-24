<style>
    .hh18#content{
        height: 1152px;
    }
    .no-sp {
        margin-top: 36px;
    }
    .no-sp h2 {
        color: #ff7337;
        text-align: center;
        margin-bottom: 16px;
    }
    .img--err {
        background: url(https://hinhgaixinh.com/wp-content/uploads/2022/03/anh-gai-xinh-hoc-sinh-tuyet-dep.jpg) repeat center / contain;
        padding-top: 50%;
    }
</style>

<?php

// $ctr viết tắt của controllers, sử dụng biến này để truyền lên thanh url (đặt tên tùy thích)
if (isset($_GET['ctr']) && $_GET['ctr'] != '') {
    $ctr = $_GET['ctr'];
    switch ($ctr) {
        case 'product':
            include "controllers/c_product.php";
            index();
            break;
        case 'chitiet':
            include "controllers/c_chitiet.php";
            index();
            break;
        case 'cart':
            include "controllers/c_cart.php";
            index();
            break;

        case 'delete_cart':
            include "controllers/c_cart.php";
            if (isset($_GET['dl_id'])) {
                $id_cart = $_GET['dl_id'];
                delete_cart($id_cart);
            }
            break;
        case 'login':
            include "controllers/c_account.php";
            login();
            break;
        case 'register':
            include "controllers/c_account.php";
            register();
            break;
        case 'logout':
            include "controllers/c_account.php";
            logout();
            break;
        case 'my_pass':
            include "controllers/c_user.php";
            pass();
            break;
        case 'my_account':
            include "controllers/c_user.php";
            account();
            break;
        case 'edit_account':
            include "controllers/c_user.php";
            edit_account();
            break;
        default:
            include "controllers/c_trangchu.php";
            index();
    }
} else {
    include "controllers/c_trangchu.php";
    index();
}
