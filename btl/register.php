<?php
include 'admin/config/db.php';

$err = [];
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    if(empty($name)){
        $err['name'] = 'x Bạn chưa nhập tên';
    }
    if(empty($password)){
        $err['password'] = 'x Bạn chưa nhập password';
    }if($password != $repassword){
        $err['repassword'] = 'x Mật khẩu nhập lại không đúng';
    }

    if(empty($err)){
        // password_hash(string, PASSWORD_DEFAULT)
        $pass = password_hash($password, PASSWORD_DEFAULT);
        // var_dump($pass);
        // die();
        $sql = "INSERT INTO user(name,password) VALUES ('$name', '$pass')";
        $query = mysqli_query($connect,$sql);
        if($query){
            header('location: login.php');
        }
    }
    // die();

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
    </header>    
    <!-- end header -->
    <!-- slider -->
    <section id="slider">
        <div class="login">
            <form  method="POST">
                <table>
                    <tr>
            
                        <td>
                            <input type="text" name="name" placeholder="Tên đăng nhập">
                            <div class="text-span">
                                <span><?php echo (isset($err['name']))?$err['name']:'' ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                  
                        <td>
                            <input type="password" name="password" placeholder="Mật Khẩu">
                            <div class="text-span">
                                <span><?php echo (isset($err['password']))?$err['password']:'' ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                    <tr>
            
                        <td>
                            <input type="password" name="repassword" placeholder="Nhập lại mật khẩu">
                            <div class="text-span">
                                <span><?php echo (isset($err['repassword']))?$err['repassword']:'' ?></span>
                            </div>
                        </td>
                    </tr>    
                        <td colspan="2">
                            <div class="row-login">
                                <button class="login-button" type="submit"><p>Đăng ký</p></button>                                
                            </div>
                        </td>
                    </tr>
                </table>
            </form>   
        </div>
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