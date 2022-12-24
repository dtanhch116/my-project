<?php
    // include 'controllers_ad/c_home.php';
    // index();

    if(isset($_GET['ctr']) && $_GET['ctr'] != ''){
        $ctr = $_GET['ctr'];
        switch ($ctr) {
            case 'category' :
                include 'controllers_ad/c_loai.php';
                index();
                break;
            case 'add_category' :
                include 'controllers_ad/c_loai.php';
                add_loai();
                break;
            case 'edit_category' :
                include 'controllers_ad/c_loai.php';
                edit_loai();
                break;
            case 'delete_category' :
                include 'controllers_ad/c_loai.php';
                delete_loai();
                break;
            //======================= PRODUCT ============================
            case 'product' :
                include 'controllers_ad/c_sanpham.php';
                index();
                break;
            case 'product2' :
                include 'controllers_ad/c_sanpham.php';
                show_sanpham_2();
                break;
            case 'add_product' :
                include 'controllers_ad/c_sanpham.php';
                add_sanpham();
                break;
            case 'edit_product' :
                include 'controllers_ad/c_sanpham.php';
                edit_sanpham();
                break;
            case 'delete_product' :
                include 'controllers_ad/c_sanpham.php';
                delete();
                break;
            //======================= COMMENT ============================
            case 'comment' :
                include 'controllers_ad/c_binhluan.php';
                index();
                break;
            case 'detail_bl' :
                include 'controllers_ad/c_binhluan.php';
                chitiet_bl();
                break;
            case 'edit_comment' :
                include 'controllers_ad/c_binhluan.php';
                edit_bl();
                break;
            case 'delete_comment' :
                include 'controllers_ad/c_binhluan.php';
                delete_bl();
                break;
            //======================= STATISTICAL ============================
            case 'statistical' :
                include 'controllers_ad/c_thongke.php';
                index();
                break;
            //======================= HOA DON ============================
            case 'basket' :
                include 'controllers_ad/c_hoadon.php';
                index();
                break;
            //======================= CLIENT ============================
            case 'client' :
                include 'controllers_ad/c_khachhang.php';
                index();
                break;
            case 'add_client' :
                include 'controllers_ad/c_khachhang.php';
                add_khachhang();
                break;
            case 'edit_client' :
                include 'controllers_ad/c_khachhang.php';
                edit_khachhang();
                break;
            case 'delete_client' :
                include 'controllers_ad/c_khachhang.php';
                delete_khachhang();
                break;
            default :
            include 'controllers_ad/c_home.php';
            index();
        }
    }else{
        include 'controllers_ad/c_home.php';
        index();
    }
?>