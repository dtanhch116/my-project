<?php
session_start();
    function index(){
        include "models_ad/m_binhluan.php";
        $name_and_count_bl = show_name_sp_count_bl();
       // echo "<pre>";
       // print_r($name_and_count_bl);
       
        $view = "views_ad/binhluan/v_binhluan.php";
        include "templates/front-end/layout.php";
    }

    function chitiet_bl(){
        include "models_ad/m_binhluan.php";
        $id_sp = $_GET['id_sp'];
       // $id_kh = $_GET['id_kh'];
        $detail_bl = show_detail_bl($id_sp);
        
        $view = "views_ad/binhluan/v_chitiet_bl.php";
        include "templates/front-end/layout.php";
    }

    
    function edit_bl(){
        $view = "views_ad/binhluan/v_edit_bl.php";
        include "templates/front-end/layout.php";
    }

    function delete_bl(){
        
    }
?>