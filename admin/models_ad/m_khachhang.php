<?php
include "models_ad/libraryPDO.php";

function show_khachhang(){
$sql = "SELECT * FROM khach_hang";
return pdo_query_all($sql);

}
function show_one_khachhang($id){
    $sql = "SELECT * FROM khach_hang WHERE id_kh = ?";
    return pdo_query_one($sql,$id);
}

function add_khach_hang($ho_ten, $mat_khau, $email, $file, $vai_tro){
    $sql = "INSERT INTO `khach_hang`(`ho_ten`, `mat_khau`, `email`, `hinh`, `vai_tro`) VALUES (?,?,?,?,?)";

    pdo_execute($sql, $ho_ten, $mat_khau, $email, $file, $vai_tro);
}

function edit_khach_hang($ho_ten, $mat_khau, $email, $file, $vai_tro,$id){
    $sql = "UPDATE `khach_hang` SET `ho_ten`= ? ,`mat_khau`= ? ,`email`= ? ,`hinh`= ? ,`vai_tro`= ?  WHERE id_kh = ?";

    pdo_execute($sql, $ho_ten, $mat_khau, $email, $file,$vai_tro, $id);
}

function delete_khach_hang($id){
    $sql = "DELETE FROM khach_hang WHERE id_kh = ?";

    pdo_execute($sql, $id);
}



?>