<?php
    session_start();
    function pass(){
        include "models/m_account.php";
        if(isset($_POST['btn_upload_pass'])){
            $id = $_SESSION['user']['id_kh'];
            $new_pass = $_POST['new_pass'];
            $retype_pass = $_POST['retype_pass'];

            if($new_pass == $retype_pass){
                $err = '';
                echo "dung";
            }else{
                echo "sai";
                $err = 'Mật khẩu không đúng';
            }
            
            if(empty($err)){
                echo 'hihi';
                require_once "models/libraryPDO.php";
                $sql = "UPDATE khach_hang SET mat_khau = $retype_pass WHERE id_kh = $id";
                
                pdo_execute($sql);
                $msg = 'nice';
                header("location: ?ctr=my_account&msg=$msg");
            }
            
        }
        $view = "views/user/v_pass.php";
        include "templates/front-end/layout.php";
    }

    

    function account(){
        include "models/m_account.php";
        $id = $_SESSION['user']['id_kh'];
        $in4_user = show_in4_khach_hang($id);
        $view = "views/user/v_account.php";
        include "templates/front-end/layout.php";
    }

    function edit_account(){
        include "models/m_account.php";
        $id = $_SESSION['user']['id_kh'];
        $in4_user = show_in4_khach_hang($id);
        // echo $id;
        
        if(isset($_POST['btn_upload_account'])){
            $ten_login = $_POST['ten_dn'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $file = $_FILES['avatar'];
            $avatar = $_POST['anh_main'];

            if($file['size'] > 0){
                $avatar = $file['name'];
            }else{
                $avatar = $_POST['anh_main'];
            }
            echo $id;
            update_account($ten_login, $email, $address, $avatar, $phone, $id);

           
            move_uploaded_file($file['tmp_name'] . '../../project1/public/layout/images/product/' , $file['name']);
           
            header('location: ?ctr=my_account');
        }
        $view = "views/user/v_edit_account.php";
        include "templates/front-end/layout.php";
    }
?>