<?php
    define("DB_HOST","localhost"); 
    define("DB_USER","root");
    define("DB_PWK",""); 
    define("DB_NAME",'xshop');

    function pdo_connection(){
        try {
            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",DB_USER , DB_PWK);    
            return $conn;
        }
        catch(PDOException $e) {
            // check_create_db();
        }
    }

    function pdo_execute($sql){
        $sql_arg = array_slice(func_get_args(), 1);
        $connec = pdo_connection();
        $stmt = $connec -> prepare($sql);
        $stmt -> execute($sql_arg);
        return $connec;
    }

    function pdo_query_all($sql){
        $sql_arg = array_slice(func_get_args(), 1);
        $connec = pdo_connection();
        $stmt = $connec -> prepare($sql);
        $stmt -> execute($sql_arg);
        $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function pdo_query_one($sql){
        $sql_arg = array_slice(func_get_args(), 1);
        $connec = pdo_connection();
        $stmt = $connec -> prepare($sql);
        $stmt -> execute($sql_arg);
        $data = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function check_create_db() {
        $db = "create database xshop";
        $conn = new PDO("mysql:host=".DB_HOST, DB_USER, DB_PWK);
        $stmt = $conn -> prepare($db);
        $stmt -> execute();
        $conn = pdo_connection();
        $arrTable_sql = [
            'loai' => "create table loai(id_loai INT(11) AUTO_INCREMENT PRIMARY KEY, ten_loai VARCHAR(255), anh VARCHAR(255))",
            'san_pham' => "create table san_pham(id_sp INT(11) AUTO_INCREMENT PRIMARY KEY, ten_sp VARCHAR(255), don_gia FLOAT, giam_gia FLOAT DEFAULT NULL, anh_sp VARCHAR(255), id_loai INT(11), dac_biet VARCHAR(100), luot_ban INT(11), ngay_nhap DATE DEFAULT CURRENT_TIMESTAMP, mo_ta TEXT DEFAULT NULL, FOREIGN KEY (id_loai) REFERENCES loai(id_loai) )",
            'khach_hang' => "create table khach_hang(id_kh INT(11) AUTO_INCREMENT PRIMARY KEY, ho_ten VARCHAR(255), mat_khau VARCHAR(255), email VARCHAR(255), dia_chi VARCHAR(255), hinh VARCHAR(255) DEFAULT NULL, vai_tro VARCHAR(100) )",
            'binh_luan' => "create table binh_luan(id_bl INT(11) AUTO_INCREMENT PRIMARY KEY, id_kh int(11) , id_sp int(11) , noi_dung VARCHAR(255), ngay_bl DATE DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (id_kh) REFERENCES khach_hang(id_kh), FOREIGN KEY (id_sp) REFERENCES san_pham(id_sp) )",
            'hoa_don' => "create table hoa_don(id_hd INT(11) AUTO_INCREMENT PRIMARY KEY, id_kh INT(11) , ngay_mua DATE DEFAULT CURRENT_TIMESTAMP, trang_thai int(11) DEFAULT 0, FOREIGN KEY (id_kh) REFERENCES khach_hang(id_kh) )",
            'hoa_don_detail' => "create table hoa_don_detail(id_hd int(11) , id_sp int(11) , quantity int(255), FOREIGN KEY (id_hd) REFERENCES hoa_don(id_hd), FOREIGN KEY (id_sp) REFERENCES san_pham(id_sp) )",
        ];
        foreach($arrTable_sql as $item) {
            $stmt = $conn -> prepare($item);
            $stmt -> execute();
        }
        return true;
    }

?>