<?php 
session_start();
include "models/m_trangchu.php";
    function index(){
        //  $dac_biet = "Đặc biệt";
        //  $data_home = show_sp_home($dac_biet);
         $data_loai = show_lh_home();
        $total_page=c_total_page();
        $hh_top18=get_18_hanghoa_top();
         if(isset($_POST['btn_search_product'])){
            $search = $_POST['value_from_search_product'];
               $search_product = search_product($search);
            }
            if(isset($_GET['pageNum'])):
                $current_page = $_GET['pageNum'];
                $hanghoa_by_page = get_hanghoa_by_page();
            endif;
        $view = "views/v_trangchu.php";
        include "templates/front-end/layout.php";
    }
    function c_total_page() {
        $total_hh = get_total_hanghoa();
        $total_page = ceil($total_hh / 36);
        return $total_page;
    }
?>