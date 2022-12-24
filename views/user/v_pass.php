<div id="main_user">
        <section>
            <div class="grid">
                <div class="update_pass">
                    <div class="title">
                        <h2>Thêm Mật Khẩu</h2>
                        <p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
                    </div>

                    <div class="my_pass">
                        <form action="" method="POST">
                            <label for="">Mật khẩu cũ</label>
                            <input type="password" class="input" name="pass">
                            <label for="">Mật khẩu mới</label>
                            <input type="password" class="input" name="new_pass">
                            <label for="">Nhập lại mật khẩu mới</label>
                            <input type="password" class="input" name="retype_pass">
                            <?php if(isset($err)):?>
                                <span style="color: red;"><?= $err ?></span>
                            <?php endif?>
                            <button type="submit" class="input btn" name="btn_upload_pass">Xác nhận</button>
                            <button  class="input btn" ><a href="?ctr=my_account" style="color: white; text-decoration: none;">Quay lại</a></button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>