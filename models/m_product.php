<?php
include_once "libraryPDO.php";

function show_loai()
{
    $sql = "SELECT * FROM loai";
    return pdo_query_all($sql);
}

function show_sp_loai($id_loai)
{

    $sql = "SELECT * FROM san_pham WHERE id_loai = ?";
    return pdo_query_all($sql, $id_loai);
}

function show_sp_sort($id_loai, $col_sort, $sort)
{
    $pageNum = isset($_GET['pageNum']) ? $_GET['pageNum'] : 1;
    $limit = 10;
    $start = ($pageNum - 1) * $limit;
    $sql = "SELECT * FROM san_pham WHERE id_loai = ? ORDER BY $col_sort $sort limit $start, $limit";
    return pdo_query_all($sql, $id_loai);
}

function update_num_sell($id_sp, $quantity) {
    $sql = "select luot_ban from san_pham where id_sp=$id_sp";
    $luot_ban = pdo_query_one($sql)['luot_ban'];
    if(!$luot_ban) $luot_ban = 0;
    $luot_ban += $quantity;
    $sql = "update san_pham set luot_ban=$luot_ban where id_sp=$id_sp";
    pdo_execute($sql);
}


?>