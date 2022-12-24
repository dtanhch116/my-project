<div id="main_user">
    <section>
        <div class="grid">
            <div class="update_account">
                <div class="title">
                    <h2>Hồ Sơ Của Tôi</h2>
                    <p>Quản lí thông tin hồ sơ để bảo mật tài khoản</p>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="my_account">

                        <div class="my_account--in4">
                            
                                <p>Tên đăng nhập:
                                </p>
                                <input type="text" name="ten_dn" class="input_in4" value="<?=$in4_user['ho_ten']?>">
                                <p>Email:
                                </p>
                                <input type="text" name="email" class="input_in4" value="<?=$in4_user['email']?>">
                                <p>Số điện thoại:
                                </p>
                                <input type="text" name="phone" class="input_in4" value="<?=$in4_user['phone']?>">
                                <p>Địa chỉ:
                                </p>
                                <input type="text" name="address" class="input_in4" value="<?=$in4_user['dia_chi']?>">
                                <br><br>
                                
                                <a href="?ctr=my_pass">Đổi mật khẩu</a>
                            
                        </div>

                        <div class="my_account--avatar">
                            <img src="public/layout/images/avatar/<?=$in4_user['hinh']?>" alt="">
                            <input type="hidden" name="anh_main" value="<?=$in4_user['hinh']?>">
                            <input type="file" class="input_avatar" name="avatar">
                            <!-- <button class="btn_avatar">Chọn Ảnh</button> -->
                        </div>
                    </div>
                    <button type="submit" class="btn_account" name="btn_upload_account">Xác nhận</button>
                    <button class="btn_account"><a href="?ctr=my_account" style="color: white; text-decoration: none;">Quay Lại</a></button>
                </form>


            </div>
        </div>
    </section>

</div>