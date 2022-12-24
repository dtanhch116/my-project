<?php
    include "libraryPDO.php";
    function thongke(){
        $sql = "SELECT * FROM loai";
        return pdo_query_all($sql);
    }

    function count_product($id){

        $sql = "SELECT COUNT(id_sp) as 'sum' FROM san_pham WHERE id_loai = ?";
        return pdo_query_one($sql,$id);
    }

    function min_thongke($id){
        $sql = 'SELECT MIN(don_gia) as min FROM san_pham WHERE id_loai = ?';
        return pdo_query_one($sql, $id);
    }

    function max_thongke($id){
        $sql = 'SELECT MAX(don_gia) as max FROM san_pham WHERE id_loai = ?';
        return pdo_query_one($sql, $id);
    }

    function AVG_thongke($id){
        $sql = 'SELECT AVG(don_gia) as AVG FROM san_pham WHERE id_loai = ?';
        return pdo_query_one($sql, $id);
    }
?>