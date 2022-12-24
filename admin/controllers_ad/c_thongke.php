<?php
session_start();
    function index(){
        include "models_ad/m_thongke.php";
        $loai = thongke();
        $value_array = [];

        foreach($loai as $value_id_loai){
            
            $id = $value_id_loai['id_loai'];
            $value_array['min'][$id] = min_thongke($id)['min'];
            $value_array['max'][$id] = max_thongke($id)['max'];
            $value_array['AVG'][$id] = AVG_thongke($id)['AVG'];

            $value_array[$id] = count_product($id)['sum'];
        }

        
        
        $view = "views_ad/thongke/v_thongke.php";
        include "templates/front-end/layout.php";
    }
?>