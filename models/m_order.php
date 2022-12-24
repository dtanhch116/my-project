<?php
require_once 'libraryPDO.php';

function addHd ($id_kh) {
    try {
        $sql = "insert into hoa_don(id_kh) values(?)";
        $conn = pdo_execute($sql, $id_kh);
        return $conn -> lastInsertId();
    }
    catch(PDOException $e) {
        throw new PDOException("Lỗi kết nối!");
        echo $e -> getMessage();
    }
}

function addHd_detail($id_hd, $id_sp, $quantity) {
    try{
        $sql = "insert into hoa_don_detail(id_hd, id_sp, quantity) values (?,?,?)";
        pdo_execute($sql, $id_hd, $id_sp, $quantity);
    }
    catch(PDOException $e) {
        throw new PDOException("Lỗi kết nối!");
        echo $e -> getMessage();
    }
}

function editHd($trang_thai,$id_hd){
    try {
        $sql = "update hoa_don set trang_thai=$trang_thai where id_hd=$id_hd";
        pdo_execute($sql);
    }
    catch(PDOException $e) {
        throw new PDOException("Lỗi kết nối!");
        echo $e-> getMessage();
    }
}

function editHd_detail($quantity,$id_hd,$id_sp) {
    try {
        $sql = "update hoa_don_detail set quantity=$quantity where id_hd=$id_hd and id_sp=$id_sp";
        pdo_execute($sql);
    }
    catch(PDOException $e) {
        throw new PDOException("Lỗi kết nối!");
        echo $e-> getMessage();
    }
}

function deleteHd_detail($id_hd,$id_sp) {
    try {
        $sql = "delete from hoa_don_detail where id_hd=$id_hd and id_sp=$id_sp";
        pdo_execute($sql);
    }
    catch(PDOException $e) {
        throw new PDOException("Lỗi kết nối!");
        echo $e-> getMessage();
    }
}

function deleteHd() {
    $sql = "select id_hd from hoa_don";
    $hd = pdo_query_all($sql);
    // var_dump($hd);
    $sql = "select id_hd from hoa_don_detail";
    $hd_in_hdct = pdo_query_all($sql)?pdo_query_all($sql):[];
    $convert = [];
    foreach($hd_in_hdct as $v) {
        $convert[] = $v['id_hd'];
    }
    // var_dump($convert);
    foreach($hd as $v) {
        // var_dump(in_array($v['id_hd'], $hd_in_hdct));
        if(!in_array($v['id_hd'], $convert)) {
            $id_hd = $v['id_hd'];
            $sql = "delete from hoa_don where id_hd = $id_hd";
            pdo_execute($sql);
        }
    }
}

function get_all_hd() {
    $sql = "select A.id_hd, A.trang_thai, A.ngay_mua, B.id_sp, B.quantity from hoa_don A, hoa_don_detail B where B.id_hd = A.id_hd order by B.id_hd desc";
    $result = pdo_query_all($sql);
    // var_dump($result);
    return $result;
}

function get_sp_from_hd($id) {
    $id_sp = $id;
    $sql = "select ten_sp from san_pham where id_sp=$id_sp";
    $result = pdo_query_one($sql);
    return $result['ten_sp'];
}

function history_order($id_sp, $id_hdct) {
    $sql = "select sp.ten_sp as ten_sp, sp.don_gia as price, sp.giam_gia as giamgia, hd.ngay_mua as ngay_mua, hd.trang_thai as trang_thai, kh.ho_ten as ten_kh, kh.phone as phone, hdct.quantity from hoa_don_detail hdct, san_pham sp, hoa_don hd, khach_hang kh where sp.id_sp = ? and hd.id_hd = ? and hdct.id_hd = $id_hdct and hdct.id_sp = $id_sp and kh.id_kh = hd.id_kh";
    $result = pdo_query_one($sql, $id_sp, $id_hdct);
    // var_dump($result);
    return $result;
}
?>