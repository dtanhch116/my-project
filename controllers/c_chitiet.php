<?php
session_start();
    function index(){
        include "models/m_chitiet.php";
        $id_sanpham = $_GET['id_sp'];
        // global $id_sanpham;
        
        $detail = show_detal($id_sanpham);
        $bl_client = show_bl_client($id_sanpham);
        // print_r($bl_client);
        
        if(isset($_POST['btn__add-comment'])){
            $id_khachhang = $_SESSION['user']['id_kh'];
            $noi_dung = $_POST['cmt'];
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $time = date("d-m-Y");
            // hàm date_default_timezone_set() thiết lập giờ theo từng vùng nhất định. Việt nam sử dụng mã Asia/Ho_Chi_Minh
            // Việt Nam sử dụng mã Asia/Ho_Chi_Minh
            echo $time;

            if($noi_dung == ''){
                $noi_dung_bl = '';
            }

            if(!isset($noi_dung_bl)){
            add_comment($id_khachhang, $id_sanpham, $noi_dung);
            unset($_POST['btn__add-comment']);
            header("location: ?ctr=chitiet&id_sp=$id_sanpham");
            die;
            }
        }
        $view = "views/chitiet/v_chitiet.php";
        include "templates/front-end/layout.php";
    }
?>