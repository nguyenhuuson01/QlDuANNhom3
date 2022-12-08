<?php 
    include 'admin/config/db.php';
?>
<?php
$search=isset($_GET['prd_name']) ? $_GET['prd_name'] : "";
if($search){
    $where = "WHERE `prd_name` LIKE '%".$search."%'";
}
$item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:6; //số sp trên 1 trang
$current_page = !empty($_GET['page'])?$_GET['page']:1; //trang
$offset = ($current_page - 1) * $item_per_page; //công thức tính offset chạy từ sp nào
if ($search) {
    $products = mysqli_query($connect, "SELECT * FROM products WHERE `prd_name` LIKE '%".$search."%' ORDER BY prd_id ASC LIMIT ".$item_per_page." OFFSET ".$offset."");
    $totalRecords = mysqli_query($connect, "SELECT * FROM products");
}else{
    $products = mysqli_query($connect, "SELECT * FROM products ORDER BY prd_id ASC LIMIT ".$item_per_page." OFFSET ".$offset."");
    $totalRecords = mysqli_query($connect, "SELECT * FROM products");
}
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $item_per_page ); //ct tính tổng số sp trên 1 trang ceil là làm tròn
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
        <form action="" method="GET">
        <div class="others">
            <li><input name="prd_name" value="<?=$search=isset($_GET['prd_name']) ? $_GET['prd_name'] : ""?>" placeholder="Tìm Kiếm" type="text"><i class="ti-search"></i></li>
            <li><a class="ti-shine"></a></li>
            <li><a class="ti-user" href="admin/index.php"></a></li>
            <li><a class="ti-shopping-cart " href="http://localhost/btl/cart.php"></a></li>
        </div>
        </form>
    </header>
    <!-- end header -->

    <!-- cartegory -->
    <section class="cartegory">
        <div class="container">
            <div class="cartegory-top row">
                <p>Trang chủ </p> <span> &#10230; </span> <p> Nữ </p> <span> &#10230; </span> <p> Hàng nữ mới về</p>
            </div>
        </div>
        <div class="container">
            <div class="space-between row">
                <div class="cartegory-left">
                    <ul>
                        <li class="cartegory-left-li"><a href="#">Nữ</a>
                            <ul>
                                <li><a href="">Hàng nữ mới về</a></li>
                                <li><a href="">BEYOND </a></li>
                                <li><a href="">JEANS FOR JOY</a></li>
                                <li><a href="">Quần jeans nữ</a></li>
                            </ul>
                        </li>
                           
                        <li class="cartegory-left-li"><a href="#">Nam</a>
                            <ul>
                                <li><a href="">Hàng nam mới về</a></li>
                                <li><a href="">Áo phông</a></li>
                                <li><a href="">BLAZER</a></li>
                                <li><a href="">Quần jeans nam</a></li>
                            </ul>
                        </li>
                            
                        <li class="cartegory-left-li"><a href="#">Trẻ em</a>
                            <ul>
                                <li><a href="">Hàng mới về</a></li>
                                <li><a href="">Áo phông</a></li>
                                <li><a href="">Quần </a></li>
                                <li><a href="">Quần jeans</a></li>
                            </ul>
                        </li>
                        <li class="cartegory-left-li"><a href="#">Bộ sưu tập</a>
                            <ul>
                                <li><a href="">limited</a></li>
                                <li><a href="">Xuân hè</a></li>
                                <li><a href="">MET GALA</a></li>
                            </ul>
                        </li> 
                    </ul>
                </div>
                <div class="cartegory-right row">
                    <div class="cartegory-right-top-item">
                        <p>HÀNG NỮ MỚI VỀ</p>
                    </div>
                    <div class="cartegory-right-top-item">
                        <button><span>Bộ lọc</span> <i class="ti-angle-down"></i></button>
                    </div>
                    <div class="cartegory-right-top-item">
                        <select name="" id="">
                            <option value="">Sắp xếp</option>
                            <option value="">Giá cao đến thấp</option>
                            <option value="">Giá thấp đến cao</option>
                        </select>
                    </div>
                    <div class="cartegory-right-content row">
                        <?php
                        while ($row = mysqli_fetch_array($products)) {  
                        ?>
                        <div class="cartegory-right-content-item">
                            <a href="product.php?id=<?=$row['prd_id']?>"><img src="admin/img/<?=$row['image']?>" title="<?=$row['prd_name']?>"></a>               
                            <h1><a href="product.php?id=<?=$row['prd_id']?>"><?=$row['prd_name']?></a></h1>
                            <p>$<?=number_format($row['price'],0,",",",")?></p>
                        </div>
                        <?php } ?>                       
                        <div class="cartegory-right-bottom row">
                            <div class="cartegory-right-bottom-items">                        
                                <p>Hiển thị <?=$item_per_page?><span>|</span><?=$totalRecords?> sản phẩm</p>
                            </div>
                            <div class="cartegory-right-bottom-items">
                                <p ><?php include 'pagination.php'?></p>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </section>
    <!-- end cartegory -->

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