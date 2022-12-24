<?php
    session_start();

    function index(){
        include "models_ad/m_hoadon.php";
        $trang_thai = trang_thai_hoa_don();
        $value_array_hoa_don = [];
        if($trang_thai):
        foreach($trang_thai as $value_id_hd){
            $id_hd = $value_id_hd['id_hd'];
            $value_array_hoa_don[$id_hd]['name'] = ten_khach_hang($id_hd)['ho_ten'];
            $value_array_hoa_don[$id_hd]['product'] = ten_san_pham($id_hd)['ten_sp'];
            $value_array_hoa_don[$id_hd]['number'] = so_luong($id_hd)['so_luong'];
        }
        endif;
         if (isset($_POST['btn_xacnhan'])) {
            $id_xacnhan = $_POST['id_trangthai'];
            $sql = "update hoa_don set trang_thai=1 where id_hd=$id_xacnhan";
            require_once "models_ad/libraryPDO.php";
            pdo_execute($sql);
            header("location: ?ctr=basket");
        }
        else if (isset($_POST['btn_huydon'])) {
            $id_xacnhan = $_POST['id_trangthai'];
            // var_dump($id_xacnhan);exit;
            $sql = "update hoa_don set trang_thai=3 where id_hd=$id_xacnhan";
            require_once "models_ad/libraryPDO.php";
            pdo_execute($sql);
            header("location: ?ctr=basket");
        }
        
        if(isset($_GET['hdDetail'])) {
            $id_hdct= $id_sp = '';
            if(isset($_GET['idHd'])) {
                $id_hdct = $_GET['idHd'];
            }
            $data = history_order($id_hdct);
            // echo "<pre>";
            // var_dump($data);
        }
        // print_r($value_array_hoa_don[$id_hd]['number']);
        $view = 'views_ad/hoadon/v_hoadon.php';
        include "templates/front-end/layout.php";
    }
?>