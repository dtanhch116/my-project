<?php
include "libraryPDO.php";
function show_sanpham()
{
    $sql = "SELECT * FROM san_pham";
    $data = pdo_query_all($sql);
    return $data;
}

function show_0ne_sanpham($id){
    $sql = "SELECT * FROM san_pham WHERE id_sp = ?";
    $data = pdo_query_one($sql, $id);
    return $data;
}

function show_loai_hang(){
    $sql = "SELECT * FROM loai";
    $data = pdo_query_all($sql);
    return $data;
}

function add_sp($ten_sp, $don_gia, $giam_gia, $anh_sp, $id_loai, $dac_biet, $ngay_nhap, $mo_ta){
    $sql = "INSERT INTO `san_pham`(`ten_sp`, `don_gia`, `giam_gia`, `anh_sp`, `id_loai`, `dac_biet`, `ngay_nhap`, `mo_ta`) VALUES (?, ?, ?, ?, ?, ? ,now(), ?)";
    pdo_execute($sql, $ten_sp, $don_gia, $giam_gia, $anh_sp, $id_loai, $dac_biet, $mo_ta);
}

function edit_sp($ten_sp, $don_gia, $giam_gia, $anh_sp, $id_loai, $dac_biet, $ngay_nhap, $mo_ta, $id){
    $sql = "UPDATE `san_pham` SET `ten_sp`= ?,`don_gia`= ?,`giam_gia`= ?,`anh_sp`= ?,`id_loai`= ?,`dac_biet`= ?,`ngay_nhap`= ?,`mo_ta`= ? WHERE id_sp = ?";
    pdo_execute($sql, $ten_sp, $don_gia, $giam_gia, $anh_sp, $id_loai, $dac_biet, $ngay_nhap, $mo_ta, $id);
}

function delete_sp($id){
    $sql = "DELETE FROM san_pham WHERE id_sp = ?";
    pdo_execute($sql,$id);
}
