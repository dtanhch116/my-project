<?php
session_start();
    function index(){
        include "models_ad/m_loai.php";
        $data = show_lh();

        $view = "views_ad/loai/v_loai.php";
        include "templates/front-end/layout.php";
    }

    function add_loai(){
        include "models_ad/m_loai.php";
        $err = [];
        if(isset($_POST['btn_loai'])){
            $ten_loai = $_POST['ten_loai'];
            $file = $_FILES['anh_loai'];

            if($file['size'] > 0){
                $ext = pathinfo($file['name'],PATHINFO_EXTENSION);
                if($ext != 'png' && $ext != 'jpg' && $ext != 'gif'){
                    $err['anh'] = 'Ảnh không đúng định dạng';
                }
            }else{
                $err['anh'] = 'Bạn chưa chọn ảnh';
            }

            if($ten_loai == ''){
                $err['ten_loai'] = 'Bạn chưa nhập tên loại hàng';
            }

            if(!isset($err['anh'])){
                $anh_loai = $file['name'];

                add_lh($ten_loai, $anh_loai);
                move_uploaded_file($file['tmp_name'] , "../../project1/public/layout/images/category/" . $anh_loai);
                
                
                header("location: ?ctr=category");
            }

        }
        
        $view = "views_ad/loai/v_add_loai.php";
        include "templates/front-end/layout.php";
    }

    function edit_loai(){
        include "models_ad/m_loai.php";
        
        $id = $_GET['id_loai'];
        $show_one = show_one_lh($id);

        $err = [];
        if(isset($_POST['btn_loai'])){
            $ten_loai = $_POST['ten_loai'];
            $file = $_FILES['anh_loai'];
            $anh_loai = $_POST['anh_loai-1'];

            if($file['size'] > 0){
                $ext = pathinfo($file['name'],PATHINFO_EXTENSION);
                if($ext != 'png' && $ext != 'jpg' && $ext != 'gif'){
                    $err['anh'] = 'Ảnh không đúng định dạng';
                }
            }

            if($ten_loai == ''){
                $err['ten_loai'] = 'Bạn chưa nhập tên loại hàng';
            }

            if(!isset($err['anh'])){
                if($file['size'] > 0){
                    $anh_loai = $file['name'];
                }else{
                $anh_loai = $_POST['anh_loai-1'];

                }
                edit_lh($ten_loai,$anh_loai,$id);
                move_uploaded_file($file['tmp_name'] , "../../project1/public/layout/images/category/" . $anh_loai);
                
                
                header("location: ?ctr=category");
            }

        }
        
        $view = "views_ad/loai/v_edit_loai.php";
        include "templates/front-end/layout.php";
    }

    function delete_loai(){
        include "models_ad/m_loai.php";
        
        if(isset($_GET['id_loai'])){
            $id = $_GET['id_loai'];
            delete_lh($id);
            header('location: ?ctr=category');
        }
    }
?>