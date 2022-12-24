<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

<body>
    <div class="main">
        <div class="menu">
            <a href="index.php" class="link__home">
                <div class="menu__logo">
                    <div class="logo">
                    <a href="index.php"><img src="../../project1/public/layout/images/banner_logo/cu_dem_pro.png" alt=""></a>

                    </div>
                    <div class="name__logo">
                        <h2>Cudem.<span class="pro">Pro</span></h2>
                    </div>
                </div>
            </a>

            <div class="title">
                <ul class="menu__title">
                <li><a href="?ctr=category">Loại Hàng</a></li>
                    <li><a href="?ctr=product">Sản Phẩm</a></li>
                    <li><a href="?ctr=basket">Giỏ Hàng</a></li>
                    <li><a href="?ctr=client">Khách Hàng</a></li>
                    <li><a href="?ctr=comment">Bình Luận</a></li>
                    <li><a href="?ctr=statistical">Thống Kê</a></li>
                    <li><a href="../../project1/index.php">Vào WEBSITE</a></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <div class="header">
                <div class="user">
                    <div class="header__img-user">
                    <img src="../../project1/public/layout/images/avatar/<?=$_SESSION['user']['hinh']?>" alt="">

                    </div>
                    <div class="header__name-user">
                        <p>Xin chào <span class="r9e80"><?=$_SESSION['user']['ho_ten']?></span></p>
                        <div class="logout">
                            <p><a href="#">Đăng Xuất</a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="Manipulation">
                <div class="hello">
                    <h1>THỐNG KÊ HÀNG HÓA</h1>
                </div>
               
            </div>
            <div style="margin-top: 215px;"></div>
            <table class="table">
                <tr>
                    <th>Loại Hàng</th>
                    <th>Số Lượng</th>
                    <th>Giá Cao Nhất</th>
                    <th>Giá Thấp Nhất</th>
                    <th>Giá Trung Bình</th>
                    
                </tr>
                <?php foreach($loai as $value):?>
                <tr class="d0r94">
                    <td><?= $value['ten_loai']?></td>
                    <td><?= $value_array[$value['id_loai']]?></td>
                    <td><?= number_format($value_array['max'][$value['id_loai']])?></td>
                    <td><?= number_format($value_array['min'][$value['id_loai']])?></td>
                    <td><?= number_format($value_array['AVG'][$value['id_loai']])?></td>
                </tr>
                <?php endforeach?>
            </table>
        </div>
    </div>



    <div id="myfirstchart" style="height: 250px;transform: translateY(284%); width: 1100px; margin-left: 240px;"></div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    new Morris.Bar({
// ID of the element in which to draw the chart.
element: 'myfirstchart',
// Chart data records -- each entry in this array corresponds to a point on
// the chart.
data: [
<?php foreach($loai as $value){?>
{ year: '<?= $value['ten_loai']?>', value: <?= $value_array[$value['id_loai']]?> }, 
<?php }?>
],



//   { year: 'laptop', value: 10 },
//     { year: 'tivi', value: 5 },
//     { year: 'máy ảnh & quay phim', value: 5 },
//     { year: 'cáp, sạc', value: 20 },
//     { year: 'loa vi tính', value: 20 },
//     { year: 'Phụ kiện gaming', value: 20 },
//     { year: 'Đồng hồ thông minh', value: 20 },
//     { year: 'camera, webcam', value: 20 },
//     { year: 'máy in', value: 20 }


// The name of the data record attribute that contains x-values.
xkey: 'year',
// A list of names of data record attributes that contain y-values.
ykeys: ['value'],
// Labels for the ykeys -- will be displayed when you hover over the
// chart.
labels: ['Value']
});
</script>
</body>

</html>