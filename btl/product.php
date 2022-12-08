
<?php
    include 'admin/config/db.php';
    $result = mysqli_query($connect, "SELECT * FROM products WHERE prd_id = ".$_GET['id']) ;
    $product = mysqli_fetch_assoc($result);

    $imglibrary = mysqli_query($connect, "SELECT * FROM image_library WHERE prd_id = ".$_GET['id']) ;
    $product['images'] = mysqli_fetch_all($imglibrary, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logobe.png" type="image/x-icon"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/test.css">
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
            <li><a class="ti-shine"></a></li>
            <li><a class="ti-user" href="admin/index.php"></a></li>
            <li><a class="ti-shopping-cart " href="http://localhost/btl/cart.php"></a></li>
        </div>
    </header>
    <!-- end header -->
    <!-- product -->
        <section class="product">
            <div class="container">
                <div class="product-top row">
                    <p>Trang chủ </p> <span> &#10230; </span> <p> Nữ </p> <span> &#10230; </span> <p> Hàng nữ mới về</p> <span> &#10230; </span> <p> <?=$product['prd_name']?></p>
                </div>
                <div class="product-content row">
                    <div class="product-content-left row">
                        <div class="product-content-left-big-img">
                            <img src="admin/img/<?=$product['image']?>" alt="">
                        </div>
                        <?php if(!empty($product['images'])) { ?>
                        <div class="product-content-left-small-img">
                            <?php foreach($product['images'] as $img)  { ?>
                            <img src="admin/uploads/<?=$img['image']?>" alt="">
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="product-content-right">
                        <div class="product-content-right-product-name">
                            <h1><?=$product['prd_name']?></h1>
                            <p>MSP: 57E21412</p>
                        </div>
                        <div class="product-content-right-product-price">
                            <p>$<?=number_format($product['price'],0,",",",")?></p>
                        </div>
                        <div class="product-content-right-product-color">
                            <p><span style="font-weight: bold;">Màu sắc</span>:tự do <span style="color:red">*</span></p>
                            <div class="product-content-right-product-color-img">
                                <img src="img/colorsp4.PNG" alt="">
                            </div>
                        </div>
                        <div class="product-content-right-product-size">
                            <p style="font-weight: bold;">Size</p>
                            <div class="size">
                                <form action="cart.php?action=add" method="POST">
                                    <select name="size[<?=$product['prd_id']?>]" id="" value="S">
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                    </select>                               
                            </div>
                        </div>
                        <div class="quantity">
                            <p style="font-weight: bold;">Số Lượng:</p>                            
                            <input name="quantity[<?=$product['prd_id']?>]" type="number" min="0" value="1">                        
                        </div>
                        <p style="color: red;">Vui lòng chọn size</p>
                        <div class="product-content-right-product-button">                          
                            <button><i class="ti-shopping-cart"></i><p>MUA HÀNG</p></button>
                            </form>
                            <button><p>TÌM CỬA HÀNG</p></button>
                        </div>
                        <div class="product-content-right-product-icon">
                            <div class="product-content-right-product-icon-item">
                                <i class="ti-mobile"></i><p>Hotline</p>
                            </div>
                            <div class="product-content-right-product-icon-item">
                                <i class="ti-comment-alt"></i><p>Chat</p>
                            </div>
                            <div class="product-content-right-product-icon-item">
                                <i class="ti-email"></i><p>email</p>
                            </div>
                        </div>
                        <div class="product-content-right-product-QR">
                            <img src="img/qr.png" alt="">
                        </div>
                        <div class="product-content-right-bottom">
                            <div class="product-content-right-bottom-top">
                                &#8744;
                            </div>                           
                        </div>
                        <div class="product-content-right-bottom-content-big">
                            <div class="product-content-right-bottom-content-title row">
                                <div class="product-content-right-bottom-content-title-item info">
                                    <p>Chi tiết</p>
                                </div>
                                <div class="product-content-right-bottom-content-title-item baoquan">
                                    <p>Bảo quản</p>
                                </div>
                                <div class="product-content-right-bottom-content-title-item">
                                    <p>Tham khảo size</p>
                                </div>
                            </div>
                            <div class="product-content-right-bottom-content">
                                <div class="product-content-right-bottom-content-info">
                                    <?=$product['description']?>
                                </div>
                                <div class="product-content-right-bottom-content-baoquan">
                                    Chi tiết bảo quản sản phẩm : <br/><br/>

                                    * Vải dệt kim : sau khi giặt sản phẩm phải được phơi ngang tránh bai dãn.<br/><br/>

                                    * Vải voan , lụa , chiffon nên giặt bằng tay.<br/><br/>
                                    * Những chất vải 100% cotton , không nên phơi sản phẩm bằng mắc áo mà nên vắt ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải.<br/><br/>

                                    * Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm cho sản phẩm dễ ủi phẳng , mát và không bị cháy , giữ màu sản phẩm được đẹp và bền lâu hơn. Nhiệt độ của bàn là tùy theo từng loại vải. 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            <!--product-related  -->
            <div class="product-related container">
                <div class="product-related-title">
                    <p>SẢN PHẨM LIÊN QUAN</p>
                </div>
                <div class="product-content row">
                    <div class="product-related-item">
                        <img src="img/sp10.webp" alt="">
                        <h1>Keys Shirt</h1>
                        <p>$2,830.00</p>
                    </div>
                    <div class="product-related-item">
                        <img src="img/sp11.webp" alt="">
                        <h1>Printed Monogram Tie-Dye Denim Shirt</h1>
                        <p>$1,830.00</p>
                    </div>
                    <div class="product-related-item">
                        <img src="img/sp12.webp" alt="">
                        <h1>Upcycled Regular Shirt</h1>
                        <p>$830.00</p>
                    </div>
                    <div class="product-related-item">
                        <img src="img/sp13.webp" alt="">
                        <h1>Half Shirt</h1>
                        <p>$2,830.00</p>
                    </div>
                </div>    
            </div>

    <!-- end product -->
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
    <!-- tham khao size-->
</body>
<script src="java.js"></script>
</html>