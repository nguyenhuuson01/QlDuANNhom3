<?php
include 'admin/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logobe.png" type="image/x-icon"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font/themify-icons/themify-icons.css"> 
    <title>Document</title>
</head>
<body>
    <!-- header -->
    <header>
        <div class="logo">
           <a href="index.php"> <img src="img/logo.png"></a>
        </div>
        <div class="menu">
            <li><a href="cartegory.php">NỮ</a>
                <ul class="sub-menu">
                    <li><a href="cartegory.php">Hàng mới về</a></li>
                    <li><a href="">Collection</a></li>
                    <li><a href="">Áo</a>
                    <ul class="sub-li">
                            <li><a href="">Áo sơ mi</a></li>
                            <li><a href="">Áo phông</a></li>
                            <li><a href="">Áo Vest</a></li>
                            <li><a href="">Áo khoác</a></li>
                            <li><a href="">Áo len</a></li>
                        </ul>    
                    </li>
                    <li><a href="">Quần</a>
                        <ul class="sub-li">
                            <li><a href="">Quần jean</a></li>
                            <li><a href="">Quần lửng</a></li>
                            <li><a href="">Quần kaki</a></li>
                        </ul>                      
                    </li>
                </ul>
            </li>    
            <li><a href="">NAM</a>
                <ul class="sub-menu">
                    <li><a href="">Hàng mới về</a></li>
                    <li><a href="">Collection</a></li>
                    <li><a href="">Áo</a>
                        <ul class="sub-li">
                            <li><a href="">Áo sơ mi</a></li>
                            <li><a href="">Áo phông</a></li>
                            <li><a href="">Áo Vest</a></li>
                            <li><a href="">Áo khoác</a></li>
                            <li><a href="">Áo len</a></li>
                        </ul>
                    </li>
                    <li><a href="">Quần</a>
                        <ul class="sub-li">
                            <li><a href="">Quần jean</a></li>
                            <li><a href="">Quần lửng</a></li>
                            <li><a href="">Quần kaki</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="">TRẺ EM</a>
                <ul class="sub-menu">
                    <li><a href="">Hàng mới về</a></li>
                    <li><a href="">Collection</a></li>
                    <li><a href="">Áo</a>
                        <ul class="sub-li">
                            <li><a href="">Áo sơ mi</a></li>
                            <li><a href="">Áo phông</a></li>                
                            <li><a href="">Áo khoác</a></li>                            
                        </ul>
                    </li>
                    <li><a href="">Quần</a>
                        <ul class="sub-li">
                            <li><a href="">Quần jean</a></li>
                            <li><a href="">Quần lửng</a></li>                           
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="">SALE</a>
                <ul class="sub-menu">
                    <li><a href="">sale 99%</a></li>                   
                    <li><a href="">Áo sale 50%</a>
                        <ul class="sub-li">
                            <li><a href="">Áo sơ mi</a></li>                           
                        </ul>
                    </li>
                    <li><a href="">Quần sale 50%</a>
                        <ul class="sub-li">
                            <li><a href="">Quần jean</a></li>                        
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="">KHẨU TRANG</a>
                <ul class="sub-menu">
                    <li><a href="">Hàng mới về</a></li>
                    <li><a href="">Khẩu trang LV</a></li>                    
                </ul>
            </li>
            <li><a href="">BST</a>
                <ul class="sub-menu">
                    <li><a href="">Hàng mới về</a></li>
                    <li><a href="">Collection</a></li>
                    <li><a href="">Thu Đông</a>
                        <ul class="sub-li">
                            <li><a href="">Áo sơ mi</a></li>
                            <li><a href="">Áo phông</a></li>                        
                        </ul>
                    </li>
                    <li><a href="">Xuân Hè</a>
                        <ul class="sub-li">
                            <li><a href="">Quần jean</a></li>                   
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="">THÔNG TIN</a></li>
        </div>
        <div class="others">
            <li><input placeholder="Tìm Kiếm" type="text"><i class="ti-search"></i></li>
            <li><a class="ti-shine" href="#"></a></li>
            <li><a class="ti-user" href="admin/index.php"></a></li>
            <li><a class="ti-shopping-cart " href="http://localhost/btl/cart.php"></a></li>  
        </div>
    </header>
    <!-- end header -->
    <!-- slider -->
    <section id="slider">
        <div class="aspect-ratio-169">
            <img src="img/bia.jpg">
            <img src="img/bia1.jpg">
            <img src="img/bia2.jpg">
        </div>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </section>
    <!-- end slider -->

    <!-- input email -->
    <section class="input-container">
        <p>Nhận bản tin LV</p>
        <input type="text" placeholder="Nhập email của bạn...">
    </section>
    <!-- end input email -->
    
    <!-- footer -->
    <div class="footer-top">
        <li><a href=""><img src="img/logobe.png" alt=""></a></li>
        <li><a href="">Liên hệ</a></li>
        <li><a href="">Tuyển dụng</a></li>
        <li><a href="">Giới Thiệu</a></li>
        <li>
            <a href="" class="ti-facebook"></a>
            <a href="" class="ti-youtube"></a>
            <a href="" class="ti-twitter"></a>
        </li>
    </div>
    <div class="information">
        SĐT shop <a href="" class="ti-mobile">: <span>099999999</span></a><br>
        Email <a href="" class="ti-email">: nhomweb@gmail.com</a> <br>
        Địa chỉ <a href="" class="ti-direction-alt">: Trường Đại học Tài nguyên và Môi trường Hà Nội </a>
    </div>
</body>
<script src="java.js"></script>
</html>