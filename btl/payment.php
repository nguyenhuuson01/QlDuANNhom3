
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
            <li><a class="ti-shine"></a></li>
            <li><a class="ti-user" href="admin/index.php"></a></li> 
        </div>
    </header>
    <!-- end header -->
    <!-- payment -->
    <section class="payment">
        <div class="container">
            <div class="payment-top-wrap">
                <div class="payment-top">
                    <div class="payment-top-payment payment-top-item">
                        <i class="ti-shopping-cart "></i>
                    </div>
                    <div class="payment-top-adress payment-top-item">
                        <i class="ti-direction "></i>
                    </div>
                    <div class="payment-top-card payment-top-item">
                        <i class="ti-credit-card "></i>
                    </div>
                </div>
            </div>
        </div>
    <div class="container">
        <div class="payment-content row">
            <div class="payment-content-left">
                <div class="payment-content-left-mothod-delivery">
                    <p style="font-weight: bold;">Phương thức giao hàng</p><br>
                    <div class="payment-content-left-mothod-delivery-item">
                        <input type="radio">
                        <label for="">Giao hàng chuyển phát nhanh</label><br>
                    </div>
                </div>
                <div class="payment-content-left-mothod-payment">
                    <p style="font-weight: bold;">Phương thức thanh toán</p><br>
                    <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại.</p><br>
                    <div class="payment-content-left-mothod-paymetn-item">
                        <input checked name="method-payment" type="radio">
                        <label for="">Thanh toán bằng thẻ tín dụng(OnePay)</label><br>
                    </div>
                    <div class="payment-content-left-mothod-paymetn-item-img">
                        <img src="img/visa.webp" alt=""><br>
                    </div>
                    <div class="payment-content-left-mothod-paymetn-item">
                        <input name="method-payment" type="radio">
                        <label for=""> Thanh toán bằng thẻ ATM(OnePay)</label><br>
                    </div>
                    <div class="payment-content-left-mothod-paymetn-item-img">
                        <img src="img/vcb.png" alt=""><br>
                    </div>
                    <div class="payment-content-left-mothod-paymetn-item">
                        <input name="method-payment" type="radio">
                        <label for=""> Thanh toán Momo</label><br>
                    </div>
                    <div class="payment-content-left-mothod-paymetn-item-img">
                        <img src="img/momo.png" alt=""><br>
                    </div>
                    <div class="payment-content-left-mothod-paymetn-item">
                        <input name="method-payment" type="radio">
                        <label for=""> Thu tiền tận nơi</label><br>
                    </div>
                </div>
            </div>
            <div class="payment-content-right">
                <div class="payment-content-right-button">
                    <input type="text" placeholder="Mã giảm giá/ Quà tặng">
                    <button><i class="ti-check"></i></button>
                </div>
                <div class="payment-content-right-button">
                    <input type="text" placeholder="Mã cộng tác viên">
                    <button><i class="ti-check"></i></button>
                </div>
                <div class="payment-content-right-mnv">
                    <select name="" id="">
                        <option value="">Chọn mã nhân viên thân thiết</option>
                        <option value="">D345</option>
                        <option value="">D346</option>
                        <option value="">D347</option>
                        <option value="">D348</option>
                        <option value="">D349</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="payment-content-right-payment">
            <button>TIẾP TỤC THANH TOÁN</button>
        </div>  
    </div>
    </section>
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