<?php
    include('admin/config/db.php');    
    if(!isset($_SESSION["cart"])) {
        $_SESSION["cart"]= array();
    }
    $error = false;
    $succsess = false;
    if(isset($_GET['action'])){
        function update_cart($add = false){
            foreach ($_POST['quantity'] as $id => $quantity) {
                if($add){
                    $_SESSION["cart"] [$id] += $quantity;
                }else{
                    $_SESSION["cart"] [$id] = $quantity;
                }

            }
        }
       switch($_GET['action']){
            case "add":
                update_cart(true);
                header('location: ./cart.php');
            break;
            case "delete":
                if(isset($_GET['id'])){
                    unset($_SESSION["cart"][$_GET['id']]);
                }
                header('location: ./cart.php');
            break;
            case "submit":
                if(isset($_POST['update_click'])){//cap nhap
                    update_cart();
                    header('location: ./cart.php');
                }elseif($_POST['oder_click']){//dat hang
                    
                    if(empty($_POST['name'])){
                        $error = "Bạn chưa nhập tên của người nhận!";

                    }elseif(empty($_POST['phone'])){
                        $error = "Bạn chưa nhập số điện thoại của người nhận!";
                    }elseif(empty($_POST['address'])){
                        $error = "Bạn chưa nhập Địa chỉ của người nhận !";
                    }elseif(empty($_POST['quantity'])){
                        $error = "rỏ hàng rỗng !";
                    }
                    if($error == false && !empty($_POST['quantity'])){                       
                        $products = mysqli_query($connect,"SELECT * FROM `products` WHERE `prd_id` IN (".implode(",", array_keys($_POST['quantity'])).")");
                        $total=0;
                        $oderProducts = array();
                        // var_dump($_POST['quantity']);exit;
                        while ($row = mysqli_fetch_array($products)) {
                            $oderProducts[]=$row;
                            $total += $row['price'] * $_POST['quantity'][$row['prd_id']];
                        }
                        $insertoder = mysqli_query($connect,"INSERT INTO `oder` (`id`, `name`, `phone`, `address`, `note`, `total`,`created_time`,`last_updated`) VALUES (NULL, '".$_POST['name']."', '".$_POST['phone']."', '".$_POST['address']."', '".$_POST['note']."', '".$total."', '".time()."', '".time()."')");                        
                        $orderID= $connect->insert_id;
                        $insertString= "";                        
                        foreach ($oderProducts as $key => $product) {
                            $insertString .= "(NULL, '".$orderID."', '".$_POST['id_nv']."' , '".$product['prd_id']."', '".$_POST['size'][$product['prd_id']]."', '".$_POST['quantity'][$product['prd_id']]."', '".$product['price']."', '".time()."', '".time()."', '".$_POST['address']."')";
                            if($key != count($oderProducts) - 1){
                                $insertString.= ",";
                            }
                        }   
                        $insertoder = mysqli_query($connect,"INSERT INTO `oder_detail` (`id`, `id_oder`, `id_nv`, `id_prd`, `size`, `quantity`, `price`, `created_time`, `last_updated`,`address`) VALUES ".$insertString." ");
                        $succsess = header('location:http://localhost/btl/success.php');
                    }
                }
                
            break;
       }//var_dump($_SESSION["cart"]);
    }
    if(!empty($_SESSION['cart'])) {
        $products = mysqli_query($connect, "SELECT * FROM `products` WHERE `prd_id` IN (".implode(",", array_keys($_SESSION["cart"])).")");
    }
?>
<?php
    if(!isset($_SESSION["cart1"])) {
        $_SESSION["cart1"]= array();
    }
    if(isset($_GET['action'])){
       switch($_GET['action']){
            case "add":
                foreach ($_POST['size'] as $id1 => $size) {
                    $_SESSION["cart1"] [$id1] = $size;
                }
            break;
            case "delete":
                if(isset($_GET['id'])){
                    unset($_SESSION["cart1"][$_GET['id']]);
                }
            break;
            // case "submit":
            //     echo ""
            //     break;
       }
    //    var_dump($_SESSION["cart1"]);exit;
    }
    if(!empty($_SESSION['cart1'])) {
        $products = mysqli_query($connect, "SELECT * FROM `products` WHERE `prd_id` IN (".implode(",", array_keys($_SESSION["cart1"])).")");
    }
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
            <li><a class="ti-shine"></a></li>
            <li><a class="ti-user" href="admin/index.php"></a></li>
            <li><a class="ti-shopping-cart " href="http://localhost/btl/cart.php"></a></li>
        </div>
    </header>
    <!-- end header -->
    <!-- cart -->
    <section class="cart">
        <div class="container">
        <div ><?=(!empty($error)) ? $error : ""?></div>
        <div class="succsess"><?=(!empty($succsess)) ? $succsess : ""?></div>
            <div class="cart-top-wrap">                
                <div class="cart-top">                    
                    <div style="margin-left:48%" class="cart-top-cart cart-top-item">
                        <i class="ti-shopping-cart "></i>
                    </div>
                    <!-- <div class="cart-top-adress cart-top-item">
                        <i class="ti-direction "></i>
                    </div>
                    <div class="cart-top-payment cart-top-item">
                        <i class="ti-credit-card "></i>
                    </div> -->
                </div>
            </div>
        </div>
    <form action="cart.php?action=submit" method="POST">
        <div class="container">
            <div class="cart-content row">
                <div class="cart-content-left">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Size</th>
                            <th>SL</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                        <?php
                        if(!empty($products)){
                            $sp=0;
                            $total = 0;
                            $i = 1;
                            while ($row = mysqli_fetch_array($products)) { ?>                        
                            
                        <tr>
                            <td><?=$i++;?></td>
                            <td><img style="width:150px;" src="admin/uploads/<?=$row['image']?>" alt=""></td>
                            <td><p><?=$row['prd_name']?></p></td>
                            <td><input name="size[<?=$row['prd_id']?>]" type="text" value="<?=$_SESSION["cart1"][$row['prd_id']]?>"></td>
                            <td><input name="quantity[<?=$row['prd_id']?>]" type="number" value="<?=$_SESSION["cart"][$row['prd_id']]?>"></td>
                            <td><p>$<?=number_format($row['price'] * $_SESSION["cart"][$row['prd_id']],0,",",",")?></p></td>
                            <td><a href="cart.php?action=delete&id=<?=$row['prd_id']?>"><span>X</span></a></td>
                        </tr>
                        <?php
                            $sp += $_SESSION["cart"][$row['prd_id']];
                            $total += $row['price'] * $_SESSION["cart"][$row['prd_id']];
                            $i++;                         
                            }                                                
                        ?>
                    </table>
                    <div class="delivery-content-left">
                    <div>
                        <span>Vui lòng chọn mã nhân viên kiểm tra hàng</p>
                        <select class="form-control" name="id_nv">
                            <?php
                                $sql_staff = "SELECT * FROM staff";
                                $query_staff = mysqli_query($connect, $sql_staff);
                                while ($row_staff = mysqli_fetch_assoc($query_staff)) {?>
                                    <option value="<?php echo $row_staff['id_nv']; ?>"><?php echo $row_staff['id_nv']; ?></option>
                                <?php } ?>
                        </select>
                    </div>    
                    <p>Vui lòng nhập thông tin và địa chỉ giao hàng</p><br>
                    <div class="delivery-content-left-input-top row">
                        <div class="delivery-content-left-input-top-item">
                            <label for="">Họ tên <span style="color: red;">*</span></label>
                            <input type="text" name="name">
                        </div>
                        <div class="delivery-content-left-input-top-item">
                            <label for="">Điện thoại <span style="color: red;">*</span></label>
                            <input type="text" name="phone">
                        </div>
                    </div>
                    <div class="delivery-content-left-top-bottom">
                        <div class="delivery-content-left-top-item">
                            <label for="">Địa chỉ <span style="color: red;">*</span></label>
                            <input type="text" name="address">
                        </div>    
                        <div class="delivery-content-left-top-item">
                            <label for="">Ghi chú <span style="color: red;">*</span></label>
                            <input type="text" name="note">
                        </div>
                    </div>
                </div>
                </div>
                
                <div class="cart-content-right">
                    <table>
                        <tr>
                            <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                        </tr>
                        <tr>
                            <td>TỔNG SẢN PHẨM</td>
                            <td><?=$sp?></td>
                        </tr>
                        <tr>
  
                        </tr>
                        <tr>
                            <td>TỔNG TIỀN HÀNG</td>
                            <td><p style="color: black;font-weight: bold;">$<?=number_format($total,0,",",",")?></p></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <input style="padding: 0 28px;height: 30px;cursor: pointer;background-color:#000;color:#fff;" type="submit" name="update_click" value="Cập nhập">
                    <div class="cart-content-right-text">
                        <p>Bạn sẽ được miễn phí ship khi đơn hàng của bạn có tổng giá trị trên $900.000</p>
                        <p style="color: red; font-weight: bold;">Mua thêm <span style="font-size: 18px;">$500</span> để được miễn phí SHIP</p>
                    </div>
                    <div class="cart-content-right-button">
                        <button><a href="http://localhost/btl/cartegory.php">Tiếp tục mua sắm</a></button>
                        <input style="padding: 0 28px;height: 36px;cursor: pointer;background-color:#000;color:#fff" type="submit" name="oder_click" value="ĐẶT HÀNG">
                    </div>
                    <div class="cart-content-right-login">
                        <p>TÀI KHOẢN LV</p><br/>
                        <p>Hãy <a href="">Đăng nhập</a> tài khoản của bạn để tích điểm thành viên.</p>
                    </div>
                </div>
            </div>
        </div>
    </form>    
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