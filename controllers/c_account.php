<?php
session_start();
    function login(){
        include "models/m_account.php";
        $err = [];
        if(isset($_POST['btn__login'])){
            $user_account = $_POST['ho_ten'];
            $pass_account = $_POST['mat_khau'];
            $user = login_account($user_account);

            if($user){
                if($pass_account == $user['mat_khau']){
                    $_SESSION['user'] = $user;
                    header("location: index.php");
                }else{
                    $err['account'] = 'Tài khoản hoặc mật khẩu không đúng';
                }
            }else{
                    $err['account'] = 'Tài khoản hoặc mật khẩu không đúng';
                }
        }
        $view = "views/account/v_login.php";
        include "templates/front-end/layout_login.php";
    }

    function register(){
        include "models/m_account.php";
        // $query_email = query_email();
        // $query_account_name = query_account_name();
        $data_account_name = query_account_name();
        $data_account_email = query_account_email();
        $err = [];
        if(isset($_POST['btn__register'])){
            $ho_ten = $_POST['ho_ten'];
            $mat_khau = $_POST['mat_khau'];
            $mat_khau_re = $_POST['mat_khau_re'];
            $email = $_POST['email'];
            $dia_chi = $_POST['dia_chi'];
            $vai_tro = 'Khách Hàng';
            $file = $_FILES['hinh'];
            if($file['size'] > 0){
                $ext = pathinfo($file['name'],PATHINFO_EXTENSION);
                if($ext != 'png' && $ext != 'jpg' && $ext != 'gif'){
                    $err['anh_user'] = 'Ảnh không đúng định dạng';
                }
            }
            if($ho_ten == ''){
                $err['ten'] = 'Bạn chưa nhập tên đăng nhập';
            }
            if($mat_khau == ''){
                $err['mat_khau'] = 'Bạn chưa nhập password';
            }
            if($email == ''){
                $err['email'] = 'Bạn chưa nhập email';
            }
            if($dia_chi == ''){
                $err['dia_chi'] = 'Bạn chưa nhập địa chỉ';
            }
            if($mat_khau != $mat_khau_re){
                $err['mat_khau_re'] = 'Password không đúng';
            }

            foreach($data_account_name as $value){
                if($ho_ten == $value['ho_ten']){
                    $err['ten'] = "Tên này đã tồn tại";
                }
            }
            foreach($data_account_email as $value){
                if($email == $value['email']){
                    $err['email'] = "email này đã tồn tại";
                }
            }
            // !isset($err['anh']) && !isset($err['ten']) && !isset($err['mat_khau']) && !isset($err['mat_khau_re']) && !isset($err['email']) && !isset($err['dia_chi'])
            
            if(empty($err)){
                if($file['size'] > 0){
                    $anh_user = $file['name'];
                }else{
                $anh_user = 'avatar_md.png';
                }
                register_account($ho_ten, $mat_khau, $email, $dia_chi, $anh_user, $vai_tro);
                move_uploaded_file($file['tmp_name'], 'public/layout/images/avatar/' .$anh_user);

            }
        }
        $view = "views/account/v_register.php";
        include "templates/front-end/layout_login.php";
    }

    function logout(){
        unset($_SESSION['user']);
        header("location: index.php?ctr=login");
    }
?>