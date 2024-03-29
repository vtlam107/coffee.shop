﻿<?php
    session_start();
    require_once('connectDB.php');
    if(!isset($_SESSION['cart']))
        $_SESSION['cart'] = array();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Coffe</title>
    <link href="../css/Style.css" rel="stylesheet" />
    <link href="../css/duc.css" rel="stylesheet" />
    <link href="../fontawesome-free-5.6.3-web/css/all.css" rel="stylesheet" />
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <a href="#" class="logo"><img src="../Image/LogoSample_ByTailorBrands.jpg" /></a>
                <div class="search-box">
                    <input class="search-txt" type="text" placeholder="Tìm sản phẩm" />
                    <a class="search-btn" style="text-decoration:none;" href="#"><i class="fas fa-search fa-lg"></i></a>
                </div>
                <div class="shop-cart">
                    <a class="shop-btn" href="ShopCart.php"><i class="fas fa-shopping-cart fa-lg"></i></a>
                </div>
                <nav>

                    <ul>
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Sản phẩm</a></li>
                        <li><a href="#">Các cửa hàng</a></li>
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <h1 class="page">Giỏ hàng của bạn</h1>
    
    <section class="container">
        <ul class="product-gallery">
        <?php
            foreach ($_SESSION['cart'] as $maSP => $soLuong) {
                $sql = "select * from ca_phe where maSanPham = $maSP";
                $result = mysqli_query($con,$sql);
                $phan_dong = 0;
                while ($SP = mysqli_fetch_array($result)) {
                    ++$phan_dong;
                    ?>
                        <li>
                            <img src="<?php echo $SP['anh'] ?>" />
                            <div class="product-infomation">
                                <h4>
                                    <?php echo $SP['tenSanPham'] ?>
                                </h4>
                                <span>
                                    <?php echo $SP['gia'] ?>
                                 VND</span>
                            </div>
                            <div class="product-description">
                                <p>
                                    <?php echo $SP['moTa'] ?>
                                </p>
                                <a href="delfromcart.php?id=<?php echo $SP['maSanPham'] ?>" class="buy">
                                    Xoá
                                </a>
                            </div>
                        </li>
                    <?php
                    if($phan_dong == 3)
                    {
                        ?>
                                </ul>
                            </section>
                            <section class="container">
                                <ul class="product-gallery">
                        <?php
                        $phan_dong = 0;
                    }
                }
            }
        ?>
        </ul>
    </section>

    <section class="container">
        <div class="confirm">
            <a class="confirm-btn" href="#"><i class="far fa-check-circle fa-lg"></i>Xác nhận</a>
        </div>
    </section>
    <div class="welcome">
        <h2>Chào mừng đến với...</h2>
    </div>
    <?php 
        mysqli_close($con);
    ?>
</body>
</html>