<?php
    include_once "libraryPDO.php";

    function show_detal($id){
        $sql = "SELECT * FROM san_pham WHERE id_sp = ?";
        return pdo_query_one($sql, $id);
    }

    function show_bl_client($id_sanpham){
        $sql = "SELECT binh_luan.id_bl, binh_luan.noi_dung, binh_luan.ngay_bl, khach_hang.ho_ten, khach_hang.hinh FROM binh_luan, khach_hang WHERE binh_luan.id_kh=khach_hang.id_kh and id_sp = ?";
        return pdo_query_all($sql, $id_sanpham);
    }
    function add_comment($id_khachhang, $id_sanpham, $noi_dung){
        $sql = "INSERT INTO `binh_luan`(`id_kh`, `id_sp`, `noi_dung`, `ngay_bl`) VALUES (? ,? ,?, now())";
        pdo_execute($sql, $id_khachhang, $id_sanpham, $noi_dung);
    }
?>