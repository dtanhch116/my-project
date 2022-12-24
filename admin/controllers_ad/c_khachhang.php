<?php
session_start();
function index()
{
  include "models_ad/m_khachhang.php";
  $khachhang = show_khachhang();



  $view = "views_ad/khachhang/v_khachhang.php";
  include "templates/front-end/layout.php";
}

function add_khachhang()
{
  include "models_ad/m_khachhang.php";
  if (isset($_POST['btn_add'])) {
    $err = [];
    $ho_ten = $_POST['ten_kh'];
    $mat_khau = $_POST['password'];
    $email = $_POST['email'];
    $vai_tro = $_POST['vai_tro'];
    $file = $_FILES['anh_kh'];

    if ($ho_ten == '') {
      $err['ten_kh'] = "Ban chua nhap ten";
    }
    if ($mat_khau == '') {
      $err["password"] = "Ban chua nhap password";
    }
    if ($email == '') {
      $err["email"] = "Ban chua nhap email";
    }
    $maxfilesize = 2 * 1024 * 1024;
    if ($file['size'] > 0) {
      $anh = $file['name'];
      $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
      if ($ext != 'png' && $ext != 'jpg' && $ext != 'gif') {
        $err['anh'] = "Ảnh không đúng định dạng";
      }
      if ($file['size'] > $maxfilesize) {
        $err['anh'] = "bạn nhập ảnh nhỏ hơn 2MB";
      }
      if ($vai_tro == 1) {
        $vai_tro = 'admin';
      }
      if ($vai_tro == 2) {
        $vai_tro = 'Khach Hang';
      }
      if (!isset($err["ten_kh"])  && !isset($err["email"]) && !isset($err["password"]) && !isset($err['anh'])) {
        $anh_kh = $file['name'];

        add_khach_hang($ho_ten, $mat_khau, $email, $anh, $vai_tro);
        move_uploaded_file($file['tmp_name'], 'duan1/public/layout/images/avatar/' . $anh_kh);
        header("location: ?ctr=client");
      }
    }
  }


  $view = "views_ad/khachhang/v_add_khachhang.php";
  include "templates/front-end/layout.php";
}


function edit_khachhang()
{
  include "models_ad/m_khachhang.php";
  $id = $_GET['id_kh'];
  $query_khachhang = show_one_khachhang($id);
  print_r($query_khachhang);
  if (isset($_POST['btn_edit'])) {
    $err = [];
    $ho_ten = $_POST['ten_kh'];
    $mat_khau = $_POST['password'];
    $email = $_POST['email'];
    $vai_tro = $_POST['vai_tro'];
    $file = $_FILES['anh_kh'];

    if ($ho_ten == '') {
      $err['ten_kh'] = "Ban chua nhap ten";
    }
    if ($mat_khau == '') {
      $err["password"] = "Ban chua nhap password";
    }
    if ($email == '') {
      $err["email"] = "Ban chua nhap email";
    }
    $maxfilesize = 2 * 1024 * 1024;
    if ($file['size'] > 0) {
      $anh = $file['name'];
      $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
      if ($ext != 'png' && $ext != 'jpg' && $ext != 'gif') {
        $err['anh'] = "Ảnh không đúng định dạng";
      }
      if ($file['size'] > $maxfilesize) {
        $err['anh'] = "bạn nhập ảnh nhỏ hơn 2MB";
      }
    }
      
    
    edit_khach_hang($ho_ten, $mat_khau, $email, $anh, $vai_tro, $id);
      if (!isset($err["ten_kh"])  && !isset($err["email"]) && !isset($err["password"]) && !isset($err['anh'])) {
        $anh_kh = $file['name'];
        move_uploaded_file($file['tmp_name'], 'duan1/public/layout/images/avatar/' . $anh_kh);
        header("location: ?ctr=client");
      
  }
}
  $view = "views_ad/khachhang/v_edit_khachhang.php";
  include "templates/front-end/layout.php";
}

function delete_khachhang()
{
  include "models_ad/m_khachhang.php";
  $id = $_GET['id_kh'];
  delete_khach_hang($id);
  header("location: ?ctr=client");
}
