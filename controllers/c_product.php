<?php
session_start();
include_once "models/m_trangchu.php";
function index()
{
    include "models/m_product.php";
    $id_loai = get_id_loai();
    $show_lh_product = show_loai();
    // $sp_loai = show_sp_loai($id_loai);

    $total_page = pagination();
    $current_page = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
    $hanghoa_by_page = get_hanghoa_by_limit10($id_loai);
    if (isset($_GET['price-asc'])) :
        $hanghoa_by_page = show_sp_sort($id_loai, 'don_gia', 'asc');
    elseif (isset($_GET['price-desc'])) :
        $hanghoa_by_page = show_sp_sort($id_loai, 'don_gia', 'desc');
    elseif (isset($_GET['luot_ban-desc'])) :
        $hanghoa_by_page = show_sp_sort($id_loai, 'luot_ban', 'desc');
    elseif (isset($_GET['new-desc'])) :
        $hanghoa_by_page = show_sp_sort($id_loai, 'ngay_nhap', 'desc');
        elseif (isset($_GET['giam_gia-desc'])) :
            $hanghoa_by_page = show_sp_sort($id_loai, 'giam_gia', 'desc');
    endif;

    $current_cate = isset($_GET['id_loai']) ? $_GET['id_loai'] : 1;
    // var_dump($current_cate);

    $view = "views/product/v_hanghoa.php";
    include "templates/front-end/layout.php";
}

function get_id_loai()
{
    $id_loai = !empty($_GET['id_loai']) ? $_GET['id_loai'] : 1;
    return $id_loai;
}

function pagination()
{
    $id_loai = get_id_loai();
    $total_hh = get_total_hanghoa_by_cate($id_loai);
    $total_page = ceil($total_hh / 10);
    return $total_page;
}
