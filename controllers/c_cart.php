<?php
    function index(){
        require_once 'models/m_order.php';
        session_start();
        deleteHd();
    
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $hd_all_order = get_all_hd();
        // var_dump($hd_all_order);
        $hd_6_order = [];
        if(sizeof($hd_all_order) > 6) {
            for($i=0;$i<6;$i++) {
                $hd_6_order[]=$hd_all_order[$i];
            }
        }
        else $hd_6_order = $hd_all_order;
        if(isset($_GET['showAllHd'])) {
            $hd_order=$hd_all_order;
        }
        else $hd_order = $hd_6_order;


        if(isset($_POST['add-sp-cart'])) {
            $name = $_POST['name'];
            $img = $_POST['img'];
            $price = $_POST['price'];
            $giamgia = $_POST['giamgia'];
            $id = $_POST['id'];
            $productAdd = ['name' => $name, 'img' => $img, 'price' => $price, 'giamgia' => $giamgia, 'id' => $id,];
            $_SESSION['cart'][$id] = $productAdd;
        }       

        if(isset($_GET['dl_Id'])) {
            $many_cart_item = get_many_cart();
            if(isset($_POST['choose-many--dl'])) {
                if($many_cart_item) {
                    delete_cart($_GET['dl_Id'], $many_cart_item);
                }
            } else
            delete_cart($_GET['dl_Id'], $many_cart_item);
        }
        if(isset($_GET['order_id'])) {
                //để header location ở đây làm mất dữ liệu
                $many_cart_item = get_many_cart();
                $arrOrder = order($_GET['order_id'], $many_cart_item);
                // var_dump($arrOrder);
                if(isset($_POST['thanhToan'])){
                $msg = insertDataOrder();
                header("location: ?ctr=cart&msg=$msg");
                }
            }
        if(isset($_GET['dlHdct'])) {
            deleteHd_detail($_GET['idHd'],$_GET['idSp']);
            header("location: ?ctr=cart&msg='xóa thành công'");
        }
        if(isset($_GET['order_id'])) {
            $view = "views/cart/v_order.php";
        }
        else
        if(isset($_GET['showHdDetail'])){
            $id_sp = $id_hdct = '';
            if(isset($_GET['idSp'])) {
                $id_sp = $_GET['idSp'];
            }
            else if(isset($_POST['idSp'])) {
                $id_sp = $_POST['idSp'];
            }
            if(isset($_GET['idHd'])) {
                $id_hdct = $_GET['idHd'];
            }
            $data = history_order($id_sp, $id_hdct);
            // var_dump($data['quantity']);
            $tienDaThanhToan = ( $data['price'] - $data['giamgia'] ) * $data['quantity'];
            if(isset($_POST['editOrder'])) {
                editHd_detail($_POST['edit-quantity'],$_GET['idHd'],$_GET['idSp']);
                header("location: ?ctr=cart&msg=editSuccess");
            }
            // var_dump($tienDaThanhToan);
            // var_dump($data);
            $view = "views/cart/v_chitietHd.php";
        }
        else
            $view = "views/cart/v_cart.php";

        include "templates/front-end/layout.php";
    } //end fn index


    function delete_cart($id, $arr=[]){
        unset($_SESSION['cart'][$id]);
        if($arr) {
            foreach($arr as $v) {
                unset($_SESSION['cart'][$v]);
            }
        }
        header("location: ?ctr=cart");
    }


    function order($id, $arr=[]) {
        $arrOrder = [];
        if($id) {
            if(isset($_SESSION['cart'][$id]))
            $arrOrder[] = $_SESSION['cart'][$id];
            else
                {
                    require_once 'models/m_chitiet.php';
                    $name = show_detal($id)['ten_sp'];
                    $img = show_detal($id)['anh_sp'];
                    $price = show_detal($id)['don_gia'];
                    $giamgia = show_detal($id)['giam_gia'];
                    $id = show_detal($id)['id_sp'];
                    $productAdd = ['name' => $name, 'img' => $img, 'price' => $price, 'giamgia' => $giamgia, 'id' => $id,];
                    $arrOrder[] = $productAdd;
                }
        }
        if($arr) {
            foreach($arr as $v ) {
                $arrOrder[] = $_SESSION['cart'][$v];
            }
        }
        return $arrOrder;
        
    }

    function insertDataOrder() {
        require_once "models/m_product.php";
        require_once 'models/m_order.php';

        if(!$_SESSION['user']) {
            return;
        }
        else {
            $id_kh = $_SESSION['user']['id_kh'];
            $id_hd = addHd($id_kh);
            $dataSpOrder = '';
            if(isset($_POST['thanhToan'])) {
                $dataSpOrder = $_POST['quantity'];
                foreach($dataSpOrder as $id_sp => $quantity) {
                    addHd_detail($id_hd, $id_sp, $quantity);
                    update_num_sell($id_sp, $quantity);
                    unset($_SESSION['cart'][$id_sp]);
                }
            }
            $msg = 'Đặt hàng thành công ^_^';
        }
        return $msg;
    }


    function get_many_cart() {
        $cart_many_choosed = [];
        if(isset($_POST['choose-many--dl'])) {          
            foreach($_POST['choosed-cart-dl'] as $item) {
                if($item != ''):
                    $cart_many_choosed[] = $item;
                endif;
            }
            if(sizeof($cart_many_choosed) <= 0) {
                $msg = 'Vui lòng lựa chọn các sản phẩm!';
                header("location: ?ctr=cart&msg=$msg");
            }
        }
        if(isset($_POST['choose-many--order'])) {
            foreach($_POST['choosed-cart-order'] as $item) {
                if($item != ''):
                    $cart_many_choosed[] = $item;
                endif;
            }
            if(sizeof($cart_many_choosed) <= 0) {
                $msg = 'Vui lòng lựa chọn các sản phẩm!';
                header("location: ?ctr=cart&msg=$msg");
            }
        }
        return $cart_many_choosed;
    }



?>