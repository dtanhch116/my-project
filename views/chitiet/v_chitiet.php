<div id="content">
    <div class="grid">
        <section class="briefing">
            <div class="product-briefing">
                <div class="product__briefing-images">

                    <!-- ảnh sản phẩm chi tiết-->
                    <!-- <?php foreach ($detal as $value) : ?>
                            <div class="product__briefing--images-child">
                                <img src="public/layout/images/product/<?= $value['anh_sp'] ?>" alt="">
                            </div>
                            <?php endforeach ?> -->

                    <div class="product__briefing--images-child">
                        <img src="public/layout/images/product/<?= $detail['anh_sp'] ?>"  onerror="this.src='https://demofree.sirv.com/nope-not-here.jpg'" alt="">
                    </div>

<!-- 
                    <div class="sub-child">
                        <div class="box">
                            <img src="images/product/sp3.jpg" alt="">
                        </div>
                        <div class="box">
                            <img src="images/product/sp3.jpg" alt="">

                        </div>
                        <div class="box">
                            <img src="images/product/sp3.jpg" alt="">

                        </div>
                        <div class="box">
                            <img src="images/product/sp3.jpg" alt="">

                        </div>
                        <div class="box">
                            <img src="images/product/sp3.jpg" alt="">

                        </div>
                    </div> -->
                </div>

                <div class="product__briefing-information">
                    <div class="product__briefing--information-child">
                        <!--tên sản phẩm , đánh giá , lượt bán-->
                        <div class="name-product__briefing">
                            <h3><?= $detail['ten_sp'] ?></h3>
                            <div class="flex__star">
                                <div class="star">
                                    <p><span class="rqw1 rqw1-star">4.6</span> <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i></p>
                                </div>
                                <div class="evaluate">
                                    <p><span class="rqw1">6.6</span> Đánh giá</p>
                                </div>
                                <div class="sell">
                                    <p><span class=""><?= $detail['luot_ban'] ?></span> Đã Bán</p>
                                </div>
                            </div>
                        </div>
                        <!-- giá sản phẩm -->
                        <div class="price_detail">
                            <div class="price-product__briefing-original">
                                <p><?= number_format($detail['don_gia']) ?></p>
                            </div>
                            <div class="price-product__briefing-sale">
                                <p><?= number_format($detail['giam_gia']) ?></p>
                            </div>
                        </div>
                        <!-- vận chuyển -->
                        <div class="transport">
                            <div class="transport-box">
                                <p class="t9sa3">Vận Chuyển</p>
                            </div>
                            <div class="transport-box ">
                                <p><i class="fa-solid fa-truck-arrow-right"></i> Miễn phí vận chuyển</p>
                                <p class="padding__box t9sa3"><i class="fa-solid fa-jet-fighter"></i> Vận chuyển từ <span class="q4rt">Nước ngoài</span></p>
                                <p class="padding__box t9sa3">phí vận chuyển <span class="q4rt">0đ</span></p>
                            </div>
                            <div class="transport-box transport__box-3">
                                <p>tới</p>
                                <div class="q4rt">
                                    <p class="q4rt">Mĩ Đình 2, Nam Từ Liêm, Hà Nội</p>
                                </div>
                            </div>
                        </div>
                        <!-- Màu Sắc -->
                        <div class="color">
                            <div class="color-product__briefing">
                                <p class="t9sa3">Màu sắc</p>
                            </div>
                            <div class="color-product__briefing-btn">
                                <button>Màu 1</button>
                                <button>Màu 2</button>
                                <button>Màu 3</button>
                                <button>Màu 4</button>
                                <button>Màu 5</button>
                                <button>Màu 6</button>
                                <button>Màu 7</button>
                            </div>
                        </div>
                        <!-- thêm giỏ hàng, mua hàng -->
                        <div class="goods">
                            <div class="add-goods">
                                <form action="?ctr=<?= isset($_SESSION['user']) ? 'cart' : 'login&no-login'?>" method="post">
                                    <input type="hidden" name="name" value="<?= $detail['ten_sp'] ?>">
                                    <input type="hidden" name="img" value="<?= $detail['anh_sp'] ?>">
                                    <input type="hidden" name="price" value="<?= $detail['don_gia'] ?>">
                                    <input type="hidden" name="giamgia" value="<?= $detail['giam_gia'] ?>">
                                    <input type="hidden" name="id" value="<?= $detail['id_sp'] ?>">

                                    <button style="cursor: pointer;" class="form-add__goods" name="add-sp-cart"><i class="fa-solid fa-cart-plus"></i> Thêm vào giỏ hàng</button>
                                </form>

                            </div>
                            <div class="Purchase-goods">
                                <form action="?ctr=<?php
                                    if(isset($_SESSION['user'])):
                                        echo "cart&order_id=".$detail['id_sp'];
                                
                                        else : echo "login&no-login";
                                    endif;
                                ?>" method="post">
                                    <button style="cursor: pointer;" class="form-Purchase-goods" name="">Mua Ngay</button>
                    <!-- <a href="" class="cart__buy"><button name="choose-many--order">Mua Ngay</button></a> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Mô Tả sản phẩm -->
    <div class="grid">
        <section class="describe">
            <div class="describe__product">
                <div class="ro8e9">
                    <div class="sub-ro8e9">
                        <p>MÔ TẢ SẢN PHẨM</p>
                    </div>
                </div>

                <div class="detail-describe">
                    <p class=""><?= $detail['mo_ta'] ?></p>
                </div>
            </div>
        </section>
    </div>
    <!-- Đánh giá sản phẩm, bình luận của người dùng -->
    <div class="grid">
        <?php foreach ($bl_client as $value) : ?>
            <section id="comment__users">
                <div class="comment__user">
                    <div class="avatar">
                        <img src="public/layout/images/avatar/<?= $value['hinh'] ?>" alt="">
                    </div>
                    <div class="comment__user-conntent">
                        <div class="name-user">
                            <p class="y40e8"><?= $value['ho_ten'] ?></p>
                            <p class="y40e9">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </p>
                            <p class="y40e2">2022-09-17</p>
                            <p class="y40e1"><?= $value['noi_dung'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="feedback">
                    <div class="sub__feedback">
                        <p>Phản hồi của người bán</p> <br>
                        <span>Cảm ơn bạn đã quan tâm !
                        </span>
                    </div>
                </div>
            </section>
        <?php endforeach ?>
        <?php if (isset($_SESSION['user'])) : ?>
            <div class="addCmt">
                <div class="addCmt__avt">
                    <?php
                    // $v = $_SESSION['user'];
                    //  echo "<img src='images/product/".$v['hinh']."' alt=''>"; 

                    ?>
                    <img src="public/layout/images/avatar/<?= $_SESSION['user']['hinh'] ?>" alt="">
                </div>
                <form action="" method="post" style="display: flex;">

                    <div class="form__input">
                        <input type="text" placeholder="Comment" autocomplete="off" name="cmt">
                    </div>
                    <div class="form__btn">
                        <input type="submit" name="btn__add-comment" value="Gửi">
                    </div>
                </form>
            </div>
        <?php endif ?>
    </div>
</div>