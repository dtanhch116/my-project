<?php
    include "libraryPDO.php";

    function trang_thai_hoa_don(){
        $sql = "SELECT * FROM hoa_don";
        return pdo_query_all($sql);
    }

    function ten_khach_hang($id_hd){
        $sql = "SELECT khach_hang.ho_ten FROM khach_hang, hoa_don WHERE khach_hang.id_kh=hoa_don.id_kh and hoa_don.id_hd = ?";
        return pdo_query_one($sql, $id_hd);
    }

    function ten_san_pham($id_hd){
        $sql = "SELECT san_pham.ten_sp FROM san_pham, hoa_don_detail WHERE san_pham.id_sp=hoa_don_detail.id_sp and hoa_don_detail.id_hd = ?";
        return pdo_query_one($sql, $id_hd);
    }

    function so_luong($id_hd){
        $sql = "SELECT quantity as so_luong FROM hoa_don_detail WHERE id_hd = ?";
        return pdo_query_one($sql, $id_hd);
    }
    // function ad(){
    //     $sql = "SELECT * FROM hoa_don_detail";
    //     return pdo_query_all($sql);
    // }

    function history_order($id_hdct) {
        $sql = "select sp.ten_sp as ten_sp, sp.don_gia as price, sp.giam_gia as giamgia, hd.ngay_mua as ngay_mua, hd.trang_thai as trang_thai, kh.ho_ten as ten_kh, kh.phone as phone, hdct.quantity from hoa_don_detail hdct, san_pham sp, hoa_don hd, khach_hang kh where sp.id_sp = hdct.id_sp and hd.id_hd = ? and hdct.id_hd = $id_hdct and kh.id_kh = hd.id_kh";
        $result = pdo_query_all($sql, $id_hdct);
        // var_dump($result);
        return $result;
    }
?>