<?php
session_start();
    function index(){
        include "models_ad/m_sanpham.php";
        $sanpham = show_sanpham();

        $view = "views_ad/sanpham/v_sanpham.php";
        include "templates/front-end/layout.php";
    }

    function show_sanpham_2(){
        include "models_ad/m_sanpham.php";
        $sanpham = show_sanpham();
        $show_loai = show_loai_hang();

        
        $view = "views_ad/sanpham/v_sanpham_2.php";
        include "templates/front-end/layout.php";
    }

    function add_sanpham(){
        include "models_ad/m_sanpham.php";
        $show_loai = show_loai_hang();
        $err = [];
        if(isset($_POST['btn_sanpham'])){
            $ten_sp = $_POST['ten_sp'];
            $don_gia = $_POST['don_gia'];
            $giam_gia = $_POST['giam_gia'];

            $file = $_FILES['anh_sp'];

            $dac_biet = $_POST['dac_biet'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $mo_ta = $_POST['mo_ta'];
            $id_loai = $_POST['id_loai'];

            if($file['size'] > 0){
                $ext = pathinfo($file['name'],PATHINFO_EXTENSION);
                if($ext != 'png' && $ext != 'jpg' && $ext != 'gif'){
                    $err['anh'] = 'Ảnh không đúng định dạng';
                }
            }else{
                $err['anh'] = 'Bạn chưa chọn ảnh';
            }   

            

            if($ten_sp == ""){
                $err['ten'] = 'Bạn chưa nhập tên sản phẩm';
            }else{
                $err['ten'] = '';
            }
            if($don_gia == ""){
                $err['don_gia'] = 'Bạn chưa nhập giá tiền';
            }else{
                $err['don_gia'] = '';
            }
            if($don_gia <= 0){
                $err['don_gia'] = 'Giá tiền phải lớn hơn 0';
            }else{
                $err['don_gia'] = '';
            }
            if($giam_gia < 0){
                $err['giam_gia'] = 'Sale không được nhỏ hơn 0';
            }else{
                $err['giam_gia'] = '';
            }
            if($mo_ta == ""){
                $err['mo_ta'] = 'Bạn chưa nhập mô tả sản phẩm';
            }else{
                $err['mo_ta'] = '';
            }
            if($ngay_nhap == ""){
                $err['ngay_nhap'] = 'Mời chọn ngày';
            }else{
                $err['ngay_nhap'] = '';
            }

            
            if(!isset($err['anh'])){
                

                $anh_sp = $file['name'];

                add_sp($ten_sp, $don_gia, $giam_gia, $anh_sp, $id_loai, $dac_biet, $ngay_nhap, $mo_ta);

                move_uploaded_file($file['tmp_name'] , "../../project1/public/layout/images/product/" . $anh_sp);
                header("location: ?ctr=product");
            }
        }

        $view = "views_ad/sanpham/v_add_sanpham.php";
        include "templates/front-end/layout.php";
    }

    function edit_sanpham(){
        include "models_ad/m_sanpham.php";
        $id = $_GET['id_sp'];
        $show_loai = show_loai_hang();
        $show_one = show_0ne_sanpham($id);
        
        $err = [];
        if(isset($_POST['btn_sanpham'])){
            $ten_sp = $_POST['ten_sp'];
            $don_gia = $_POST['don_gia'];
            $giam_gia = $_POST['giam_gia'];

            $file = $_FILES['anh_sp'];
            $anh_sp = $_POST['anh_sp_one'];

            $dac_biet = $_POST['dac_biet'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $mo_ta = $_POST['mo_ta'];
            $id_loai = $_POST['id_loai'];

            if($file['size'] > 0){
                $ext = pathinfo($file['name'],PATHINFO_EXTENSION);
                if($ext != 'png' && $ext != 'jpg' && $ext != 'gif'){
                    $err['anh'] = 'Ảnh không đúng định dạng';
                }
            }   

            if($ten_sp == ""){
                $err['ten'] = 'Bạn chưa nhập tên sản phẩm';
            }else{
                $err['ten'] = '';
            }
            if($don_gia == ""){
                $err['don_gia'] = 'Bạn chưa nhập giá tiền';
            }else{
                $err['don_gia'] = '';
            }
            if($don_gia <= 0){
                $err['don_gia'] = 'Giá tiền phải lớn hơn 0';
            }else{
                $err['don_gia'] = '';
            }
            if($giam_gia < 0){
                $err['giam_gia'] = 'Sale không được nhỏ hơn 0';
            }else{
                $err['giam_gia'] = '';
            }
            if($mo_ta == ""){
                $err['mo_ta'] = 'Bạn chưa nhập mô tả sản phẩm';
            }else{
                $err['mo_ta'] = '';
            }
            if($ngay_nhap == ""){
                $err['ngay_nhap'] = 'Mời chọn ngày';
            }else{
                $err['ngay_nhap'] = '';
            }
            if($dac_biet == ""){
                $err['dac_biet'] = "";
            }

            
            if(!isset($err['anh'])){
                if($file['size'] > 0){
                    $anh_sp = $file['name'];
                }else{
                    $anh_sp = $_POST['anh_sp_one'];
                }
               
                edit_sp($ten_sp, $don_gia, $giam_gia, $anh_sp, $id_loai, $dac_biet, $ngay_nhap, $mo_ta, $id);

                if($file['size'] > 0){
                    move_uploaded_file($file['tmp_name'] , "../../project1/public/layout/images/product/" . $file['name']);
                }
                
                header("location: ?ctr=product");
            }
        }


        $view = "views_ad/sanpham/v_edit_sanpham.php";
        include "templates/front-end/layout.php";
    }

    function delete(){
        include "models_ad/m_sanpham.php";

        if(isset($_GET['id_sp'])){
            $id = $_GET['id_sp'];
            delete_sp($id);
            header('location: ?ctr=product');
        }
    }
?>