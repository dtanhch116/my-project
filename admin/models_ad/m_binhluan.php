<?php
    include "libraryPDO.php";

    function show_name_sp_count_bl(){
    //    $sql = "SELECT san_pham.id_sp, san_pham.ten_sp, COUNT(binh_luan.id_sp) FROM san_pham, binh_luan WHERE san_pham.id_sp=binh_luan.id_sp";

    // $sql = "SELECT id_sp, COUNT(1) FROM binh_luan GROUP BY id_sp HAVING COUNT(1) > 1";

    $sql = "SELECT binh_luan.id_bl, binh_luan.id_sp,san_pham.ten_sp, COUNT(*) FROM binh_luan, san_pham WHERE binh_luan.id_sp=san_pham.id_sp GROUP BY binh_luan.id_sp,san_pham.ten_sp HAVING COUNT(*) >= 1";

       return pdo_query_all($sql);

    }


    function show_detail_bl($id_sp){
        // $sql = "SELECT binh_luan.id_sp, binh_luan.id_bl, binh_luan.id_kh, khach_hang.ho_ten, binh_luan.ngay_bl, binh_luan.noi_dung FROM khach_hang, binh_luan WHERE id_sp = ? and khach_hang.id_kh";

        // $sql = "SELECT binh_luan.id_sp, binh_luan.id_bl, khach_hang.ho_ten, binh_luan.ngay_bl, binh_luan.noi_dung FROM khach_hang, binh_luan WHERE id_sp = ? and id_kh = ?";

        // $sql = "SELECT binh_luan.id_bl, binh_luan.id_sp,san_pham.ten_sp, COUNT(*) FROM binh_luan, san_pham WHERE binh_luan.id_sp=san_pham.id_sp GROUP BY binh_luan.id_sp,san_pham.ten_sp HAVING COUNT(*) >= 1";

        // $sql = "SELECT id_kh, COUNT(*) 
        // FROM binh_luan WHERE id_sp = ? GROUP BY id_kh, id_sp 
		// HAVING COUNT(*) >= 1";

        // $sql = "SELECT binh_luan.id_bl, binh_luan.ngay_bl, binh_luan.noi_dung, binh_luan.id_kh, khach_hang.ho_ten, binh_luan.id_sp, COUNT(*) 
        // FROM binh_luan, khach_hang WHERE binh_luan.id_kh=khach_hang.id_kh and id_sp = ? GROUP BY binh_luan.id_kh, khach_hang.ho_ten, id_sp 
		// HAVING COUNT(*) >= 1";

        $sql = "SELECT binh_luan.id_bl, binh_luan.ngay_bl, binh_luan.noi_dung, binh_luan.id_kh, khach_hang.ho_ten, binh_luan.id_sp, COUNT(*) 
        FROM binh_luan, khach_hang WHERE binh_luan.id_kh=khach_hang.id_kh and id_sp = ? GROUP BY khach_hang.ho_ten, id_sp 
		HAVING COUNT(*) >= 1";

        return pdo_query_all($sql, $id_sp);
    }
?>