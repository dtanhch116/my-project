<style>
    .cate--primary {
        color: #ff7337;
        /* transform: translateX(10px); */
        display: inline-block;
        font-weight: 700;
    }

    .cate--primary::before {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: -8px;
        content: "";
        border-width: 4px;
        border-style: solid;
        border-color: transparent transparent transparent var(--primary-color);
    }

    .cate__list-item-icon i {
        font-weight: 700;
    }

    .sort-sub-price__text a {
        text-decoration: none;
        color: #000;
    }

    .sort-sub-price__text a:hover {
        color: #ff7337;
    }

    .btn__sort a {
        color: #000;
        text-decoration: none;
    }

    .btn--primary > a {
        color: #fff;
    }

    .product__star {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .product__price {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .product__price--current {
        padding-right: 4px;
        font-size: 15px;
    }
</style>


<div style="padding-bottom: 40px;" class="container">
    <div class="grid">
        <div class="banner">
            <a href="" class="banner__link">
                <!-- <img src="./img/banner.jfif" alt="" class="banner__img"> -->
            </a>
            <span onclick="next()" class="banner__icon banner__icon-right">
                <i class="fa-solid fa-angle-right"></i>
            </span>
            <span onclick="back()" class="banner__icon banner__icon-left">
                <i class="fa-solid fa-angle-left"></i>
            </span>
        </div>

        <!-- category -->
        <div class="row">
            <div class="col-2 cate">
                <div class="cate__heading">
                    <span class="cate__heading-icon">
                        <i class="fa-solid fa-list"></i>
                    </span>
                    <span class="cate__heading-text">Tất Cả Danh Mục</span>
                </div>
                <div class="cate__list">
                    <?php foreach ($show_lh_product as $value) : ?>
                        <p class="cate__list-item">



                            <a style="position: relative;" href="?ctr=product&id_loai=<?= $value['id_loai'] ?>" class="cate__list-item-link 
                                <?= ($value['id_loai'] == $_GET['id_loai']) ? ' cate--primary' : '' ?>
                                ">

                                <?= $value['ten_loai'] ?>

                            </a>

                        </p>
                    <?php endforeach ?>
                    <!-- <p class="cate__list-item cate__list-item-see-more">Thêm
                        <i class="fa-sharp fa-solid fa-angle-down"></i>
                    </p> -->
                </div>
            </div>

            <div class="col-10 products">
                <div class="product__sort">
                    <div class="product__sort-main">
                        <p class="product__sort-main-head">Sắp xếp theo</p>
                        <div class="btn__sort  <?= isset($_GET['giam_gia-desc']) ? 'btn--primary' : '' ?>"><a href="?ctr=product&id_loai=<?= $current_cate ?>&pageNum=<?= ($current_page) ?>&giam_gia-desc">Phổ biến</a></div>
                        <div class="btn__sort <?= isset($_GET['new-desc']) ? 'btn--primary' : '' ?>"><a href="?ctr=product&id_loai=<?= $current_cate ?>&pageNum=<?= ($current_page) ?>&new-desc">Mới nhất</a></div>
                        <div class="btn__sort <?= isset($_GET['luot_ban-desc']) ? 'btn--primary' : '' ?>"><a href="?ctr=product&id_loai=<?= $current_cate ?>&pageNum=<?= ($current_page) ?>&luot_ban-desc">Bán chạy</a></div>
                        <div class="btn__sort-price <?= (isset($_GET['price-desc']) || isset($_GET['price-asc'])) ? 'btn--primary' : '' ?>">Giá
                            <i class="fa-solid fa-angle-down"></i>

                            <div class="btn__sort-sub-price">
                                <p class="sort-sub-price__text"><a href="?ctr=product&id_loai=<?= $current_cate ?>&pageNum=<?= ($current_page) ?>&price-asc">Giá: Thấp đến Cao</a></p>
                                <p class="sort-sub-price__text"><a href="?ctr=product&id_loai=<?= $current_cate ?>&pageNum=<?= ($current_page) ?>&price-desc">Giá: Cao đến Thấp</a></p>
                            </div>

                        </div>
                    </div>

                    <?php if ($total_page > 1) : ?>
                        <div class="product__sort-page">
                            <span class="product__sort-page-text"><span class="product__sort-page-current"><?= isset($_GET['pageNum']) ? $_GET['pageNum'] : 1 ?></span>/<?= $total_page ?></span>
                            <?php if ($current_page > 1) : ?>
                                <a href="?ctr=product&id_loai=<?= $current_cate ?>&pageNum=<?= ($current_page - 1) ?>" class="page__icon-link">
                                <?php else : ?>
                                    <a>
                                    <?php endif ?>
                                    <span class="btn__page <?= ($current_page == 1) ? 'btn--disabled' : '' ?>">
                                        <i class="fa-solid fa-angle-left"></i>
                                    </span>
                                    <?php if ($current_page > 1) : ?>
                                    </a>
                                <?php else : ?>
                                </a>
                            <?php endif ?>

                            <?php
                            if ($current_page < $total_page) {
                                echo "<a href='?ctr=product&id_loai=" . $current_cate . "&pageNum=" . ($current_page + 1) . "' class='page__icon-link'>";
                            } else echo '<a>';
                            ?>
                            <span class="btn__page <?= ($current_page == $total_page) ? 'btn--disabled' : '' ?>">
                                <i class="fa-solid fa-angle-right"></i>
                            </span>

                            <?php
                            if ($current_page < $total_page) {
                                echo '</a>';
                            } else echo '</a>';
                            ?>
                        </div>

                    <?php endif ?>
                </div>

                <div class="row">
                    <?php foreach ($hanghoa_by_page as $value) : ?>
                        <div class="col-2-4 products__item">
                            <a href="?ctr=chitiet&id_sp=<?= $value['id_sp'] ?>" class="product">
                                <div class="product__img">
                                    <img src="public/layout/images/product/<?= $value['anh_sp'] ?>" onerror="this.src='https://demofree.sirv.com/nope-not-here.jpg'" height="186px" alt="">
                                </div>
                                <div class="product__text">
                                    <p class="product__desc">
                                        <?= $value['ten_sp'] ?>
                                    </p>
                                    <div class="product__price">
                                        <span class="product__price--origin"><?= number_format($value['don_gia']) ?>đ</span>
                                        <span class="product__price--current"><?= number_format(($value['don_gia'] - $value['giam_gia'])>0?($value['don_gia'] - $value['giam_gia']):0, 0, '.', '.') ?><?php //number_format($value['giam_gia']) ?>đ</span>
                                    </div>
                                    <div class="product__star">
                                        <span class="product__star-icon">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </span>
                                        <span style="padding-right: 8px;" class="product__star-text">Đã bán <?= number_format($value['luot_ban']) ?></span>
                                    </div>
                                    <p class="product__address">Nước ngoài</p>
                                </div>

                                <!-- like + giảm giá -->
                                <div class="product__love">Yêu thích</div>
                                <div class="product__reduce-price">
                                    <div class="product__reduce-price-percent">30%</div>
                                    <div class="product__reduce-price-text">GIẢM</div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>


        <?php if ($total_page > 1) : ?>
            <div class="pagination">
                <div class="page__icon">

                    <?php if ($current_page > 1) : ?>
                        <a href="?ctr=product&id_loai=<?= $current_cate ?>&pageNum=<?= ($current_page - 1) ?>" class="page__icon-link">
                        <?php endif ?>

                        <i class="fa-solid fa-angle-left"></i>

                        <?php if ($current_page > 1) : ?>
                        </a>
                    <?php endif ?>

                </div>
                <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                    <div class="btn__page <?= ($i == $current_page) ? 'btn--primary' : '' ?>"><a class="btn__page-link <?= ($i == $current_page) ? 'btn--primary' : '' ?>" href="?ctr=product&id_loai=<?= $current_cate ?>&pageNum=<?= $i ?>"><?= $i ?></a></div>
                    <?php
                    if ($current_page <= 5) {
                        if ($i == 7) {
                            echo "<div class='btn__page'>...</div>";
                            break;
                        }
                    } else if ($current_page < ($total_page - 2)) {
                        if ($i == 2) {
                            echo "<div class='btn__page'>...</div>";
                            $i = $current_page - 3;
                        }
                        if ($i == ($current_page + 2)) {
                            echo "<div class='btn__page'>...</div>";
                            break;
                        }
                    } else {
                        if ($i == 2) {
                            echo "<div class='btn__page'>...</div>";
                            $i = $total_page - 5;
                        }
                    }
                    ?>
                <?php endfor ?>
                <div class="page__icon">
                    <?php
                    if ($current_page < $total_page) {
                        echo '<a href="?ctr=product&id_loai=' . $current_cate . '&pageNum=' . ($current_page + 1) . '" class="page__icon-link">';
                    }
                    ?>
                    <i class="fa-solid fa-angle-right"></i>
                    <?php
                    if ($current_page < $total_page) {
                        echo '</a>';
                    }
                    ?>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>

<script src="public/layout/js/js_slider.js"></script>
<script>
    setInterval(next, 3000);
</script>