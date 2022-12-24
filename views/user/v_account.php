<div id="main_user">
    <?php 
        if($_GET['msg'] == 'nice') :
            echo '<script>
            alert("Ban da doi pass thanh cong");
        </script>';
        endif;
    ?>
    
    <section>
        <div class="grid">
            <div class="update_account">
                <div class="title">
                    <h2>Hồ Sơ Của Tôi</h2>
                    <p>Quản lí thông tin hồ sơ để bảo mật tài khoản</p>
                </div>


                <form action="" method="">

                    <div class="my_account">

                        <div class="my_account--in4">
                            <form action="" method="">
                                <p>Tên đăng nhập:
                                    <label for=""><?=$in4_user['ho_ten']?></label>
                                </p>

                                <p>Email:
                                    <label for=""><?=$in4_user['email']?></label>
                                </p>

                                <p>Số điện thoại:
                                    <label for=""><?=$in4_user['phone']?></label>
                                </p>
                                <br><br>
                               
                                <a href="?ctr=my_pass">Đổi mật khẩu</a>
                            </form>
                        </div>

                        <div class="my_account--avatar">
                            <img src="public/layout/images/avatar/<?=$in4_user['hinh']?>" alt="">
                            <!-- <input type="file" class="input_avatar"> -->
                            <!-- <button class="btn_avatar">Chọn Ảnh</button> -->
                        </div>
                    </div>
                    <button type="submit" class="btn_account" name="btn_upload_account">Xác nhận</button>
                    <button class="btn_account"><a href="?ctr=edit_account" style="color: white; text-decoration: none;">Update</a></button>
                </form>




            </div>
        </div>
    </section>

</div>