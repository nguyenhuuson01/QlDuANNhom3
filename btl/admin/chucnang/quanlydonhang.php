<?php
    if (!empty($_GET['actions']) && $_GET['actions'] == 'search' && !empty($_POST)){
        $_SESSION['product_filter'] = $_POST;
    }
    if(!empty($_SESSION['product_filter'])){
        $where1 = "";
        
        foreach ($_SESSION['product_filter'] as $field => $value) {
            if(!empty($value)){
                switch ($field) {
                    case 'prd_name':
                        $where1 .= (!empty($where1))?"AND"."`".$field."` LIKE '%".$value."%'":"`".$field."` LIKE '%".$value."%'";
                        break;
                    default :
                        $where1 .= (!empty($where1))?"AND"."`".$field."` = '".$value."'":"`".$field."` = '".$value."'";
                        break;
                } 
            }
        }//var_dump($where1);exit;
        extract($_SESSION['product_filter']);
    }
$item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:4; //số sp trên 1 trang
$current_page = !empty($_GET['page'])?$_GET['page']:1; //trang
$offset = ($current_page - 1) * $item_per_page; //công thức tính offset chạy từ sp nào
$totalRecords = mysqli_query($connect, "SELECT * FROM oder_detail");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $item_per_page ); //ct tính tổng số sp trên 1 trang ceil là làm tròn
if(!empty($where1)){
    $oder_detail = mysqli_query($connect, "SELECT `oder_detail`.*, `products`.`prd_name`
    FROM `oder_detail` 
    LEFT JOIN `products` ON `oder_detail`.`id_prd` = `products`.`prd_id`
    WHERE (".$where1.")");
}else{
    $oder_detail = mysqli_query($connect, "SELECT `oder_detail`.*, `products`.`prd_name`
    FROM `oder_detail` 
    LEFT JOIN `products` ON `oder_detail`.`id_prd` = `products`.`prd_id`  
    ORDER BY id ASC LIMIT ".$item_per_page." OFFSET ".$offset."");
}

?>
<?php $user = (isset($_SESSION['user'])) ?  $_SESSION['user']: [];
        if (isset($_SESSION['user']) && $_SESSION['user']){
        
       }
       else{
        header('location:http://localhost/btl/login.php');
       }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cssds.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="icon" href="img/logobe.png" type="image/x-icon"> 
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../font/themify-icons/themify-icons.css"> 
    <title>Document</title>
    <style>
        .hidden-text p{  width:80px;
            line-height: 25px;
    -webkit-line-clamp: 3;
    height: 75px;
    display: -webkit-box;
    -webkit-box-orient: vertical;
            text-overflow: ellipsis;
            overflow: hidden;
        }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <a href="http://localhost/btl"> <img src="../img/logo.png"></a>
    </div>
    <div class="menu">
        
    </div> 
    <div class="others">                       
        <li><a class="ti-shine"></a></li>
        <li><a class="ti-user" href="admin/index.php"></a></li>
        <li><a class="ti-share" href="../logout.php"> log uot</a></li>  
    </div>
</header>
<div style="margin-top:100px" class="container">
        <div class="space-between row">
            <div class="cartegory-left">
                <ul style="position:fixed">
                    <a style="text-decoration:none" href="http://localhost/btl/admin/index.php"><li class="cartegory-left-li">QUẢN LÝ SẢN PHẨM
                    </li></a>
                        
                    <a style="text-decoration:none" href="http://localhost/btl/admin/indexdh.php"><li style="background-color:#adabab" class="cartegory-left-li">QUẢN LÝ ĐƠN HÀNG
                    </li></a>
                        
                    <a style="text-decoration:none" href="http://localhost/btl/admin/indexnv.php"><li class="cartegory-left-li">QUẢN LÝ NHÂN VIÊN
                    </li></a>

                    <a style="text-decoration:none" href="http://localhost/btl/admin/indexkh.php"><li class="cartegory-left-li">QUẢN LÝ KHÁCH HÀNG
                    </li></a> 
                </ul>
            </div>
            <div class="cartegory-right row">                
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2>Quản lý đơn hàng</h2>
                    </div>	
                    <div class="card-body">    
                        <a class="btn btn-primary" style="margin-bottom:20px;" href="indexdh.php?page_layout=them">Thêm Mới</a>
                        <form style="padding-bottom:10px"  action="?actions=search" method="POST">
                            <fieldset style="border:1px solid #ccc;padding-bottom:10px">
                                <legend>Tìm kiếm đơn hàng:</legend>
                                Tên SP: <input type="text" name="prd_name" value="<?=!empty($prd_name)?$prd_name:""?>" />
                                <input class="btn btn-primary" type="submit" value="search">
                            </fieldset>
                        </form>               
                        <p>Tổng số đơn hàng: <?=$totalRecords?> </p>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Số HĐ</th>
                                    <th>Mã KH</th>
                                    <th>Mã NV</th>
                                    <th>Tên SP</th>
                                    <th>Size</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Ngày đặt</th>
                                    <th>địa chỉ giao</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>                                    
                                </tr>
                            </thead>
                        <tbody class="tbody-dark">                        
                            <?php
                                while ($row = mysqli_fetch_array($oder_detail)) {  
                            ?>
                            <tr>
                                <td><p ><?=$row['id']?></p></td>
                                <td><p ><?=$row['id_oder']?></p></td>                                
                                <td><p><?=$row['id_nv']?></p></td>                                
                                <td><p ><?=$row['prd_name']?></p></td>
                                <td><p ><?=$row['size']?></p></td>
                                <td><p ><?=$row['quantity']?></p></td>
                                <td><p >$<?=number_format($row['price'],0,",",",")?></p></td>
                                <td><p ><?=date("d/m/Y H:i", $row['created_time'])?></p></td>
                                <td><p ><?=$row['address']?></p></td>
                                <td>
                                    <p ><a class="btn-edit" style=" text-decoration: none;" href="indexdh.php?page_layout=sua&id=<?php echo $row['id']; ?>">sửa</a></p>
                                </td>
                                <td>
                                    <p ><a class="btn-edit" style=" text-decoration: none;" onClick="return Del('<?php echo $row['id']; ?>')" href="indexdh.php?page_layout=xoa&id=<?php echo $row['id']; ?>">xóa</a></p>
                                </td>							
                            </tr>
                            <?php } ?>            
                        </tbody>
                
                    </table>                
                    <div class="cartegory-right-bottom row">
                        <div class="cartegory-right-bottom-items">                        
                            <p>Hiển thị <?=$item_per_page?><span>|</span><?=$totalRecords?> sản phẩm</p>
                        </div>
                        <div class="cartegory-right-bottom-items">
                            <p ><?php include 'paginationdanhsach.php'?></p>
                        </div>
                    </div>
                </div>                
            </div>
        </div>                
    </div>
</div>   

                
<script>
	function Del(name){
		return confirm("Bạn có chắc muốn xóa sản phẩm: " + name + " ?");
	}
</script>

                
            </div>
        </div>
    
</div>
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
<script src="..java.js"></script>
</html>