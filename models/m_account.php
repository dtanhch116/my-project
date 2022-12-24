<?php 
    include "libraryPDO.php";

    function query_account_email(){
        $sql = "SELECT email FROM khach_hang";
        return pdo_query_all($sql);
    }
    function query_account_name(){
        $sql = "SELECT ho_ten FROM khach_hang";
        return pdo_query_all($sql);
    }

    function login_account($user_account){
        $sql = "SELECT * FROM khach_hang WHERE ho_ten = ?";
        return pdo_query_one($sql, $user_account);
    }
    // function login_account(){
    //     $sql = "SELECT * FROM khach_hang";
    //     return pdo_query_one($sql);
    // }

    function register_account($ho_ten, $mat_khau, $email, $dia_chi, $anh_user, $vai_tro){
        $sql = "INSERT INTO `khach_hang`(`ho_ten`, `mat_khau`, `email`, `dia_chi`, `hinh`, `vai_tro`) VALUES (? ,? ,? ,? ,? ,? )";
        pdo_execute($sql, $ho_ten, $mat_khau, $email, $dia_chi, $anh_user, $vai_tro);
    }



    // account user
    function show_in4_khach_hang($id){
        $sql = "SELECT * FROM khach_hang WHERE id_kh = ?";
        return pdo_query_one($sql, $id);
    }
    function update_account($ten_login, $email, $address, $avatar, $phone, $id){
        // $sql = "UPDATE `khach_hang` SET `ho_ten`= ?,`email`= ?,`dia_chi`= ?',`hinh`= ?,`phone`= ? WHERE id_kh = ?";
        $sql = "UPDATE `khach_hang` SET `ho_ten`= ? ,`email`= ? ,`dia_chi` = ?, `hinh`= ? ,`phone`= ?  WHERE id_kh = ?";
    pdo_execute($sql, $ten_login, $email, $address, $avatar, $phone, $id);

    }
?>