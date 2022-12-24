<?php
    include "libraryPDO.php";
    function show_lh(){
        $sql = "SELECT *FROM loai";
        return pdo_query_all($sql);
    }

    function show_one_lh($id){
        $sql = "SELECT * FROM loai WHERE id_loai = ?";
        return pdo_query_one($sql, $id);
    }

    function add_lh($ten_loai, $anh_loai){
        $sql = "INSERT INTO `loai`(`ten_loai`, `anh`) VALUES (?,?)";
        return pdo_query_all($sql, $ten_loai, $anh_loai);
    }

    function edit_lh($ten_loai,$anh_loai,$id){
        $sql = "UPDATE `loai` SET `ten_loai`=?,`anh`=? WHERE id_loai = ?";
        pdo_execute($sql,$ten_loai,$anh_loai,$id);
    }

    function delete_lh($id){
        $sql = "DELETE FROM loai WHERE id_loai = ?";
        pdo_execute($sql, $id);
    }
?>