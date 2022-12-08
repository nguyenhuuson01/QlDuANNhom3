<?php $user = (isset($_SESSION['user'])) ?  $_SESSION['user']: [];
        if (isset($_SESSION['user']) && $_SESSION['user']){
        
       }
       else{
        header('location:http://localhost/btl/login.php');
       }
?>
<?php
    $sql_staff = "SELECT * FROM staff";
    $query_staff = mysqli_query($connect, $sql_staff);
    $sql_oder = "SELECT * FROM oder";
    $query_oder = mysqli_query($connect, $sql_oder);
    $sql_products = "SELECT * FROM products";
    $query_products = mysqli_query($connect, $sql_products);
    if(isset($_POST['sbm'])){
        $id_oder = $_POST['id_oder'];
        $id_nv = $_POST['id_nv'];
        $id_prd = $_POST['id_prd'];
        $size = $_POST['size'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $created_time = $_POST['created_time'];
        $address = $_POST['address'];
        $sql = "INSERT INTO oder_detail(`id_oder`, id_nv, id_prd, size, quantity, price, created_time, address) VALUES('$id_oder', '$id_nv', '$id_prd', '$size', '$quantity', '$price','$created_time','$address')";
        $query = mysqli_query($connect, $sql);
        header('location: indexdh.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/cssds.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../font/themify-icons/themify-icons.css">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm đơn hàng</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label><h5>Mã khách hàng</h5></label>
                    <select class="form-control" name="id_oder">
                        <?php
                            while ($row_oder = mysqli_fetch_assoc($query_oder)) {?>
                                <option value="<?php echo $row_oder['id']; ?>"><?php echo $row_oder['id']; ?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><h5>Mã nhân viên</h5></label>
                    <select class="form-control" name="id_nv">
                        <?php
                            while ($row_staff = mysqli_fetch_assoc($query_staff)) {?>
                                <option value="<?php echo $row_staff['id_nv']; ?>"><?php echo $row_staff['id_nv']; ?></option>
                            <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label><h5>Tên sản phẩm</h5></label>
                    <select class="form-control" name="id_prd">
                        <?php
                            while ($row_products = mysqli_fetch_assoc($query_products)) {?>
                                <option value="<?php echo $row_products['prd_id']; ?>"><?php echo $row_products['prd_name']; ?></option>
                            <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label><h5>Size sản phẩm</h5></label>           
                    <select name="size">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                    </select>
                </div>

                <div class="form-group">
                    <label><h5>Số lượng sản phẩm</h5></label>
                    <input type="number" name="quantity" class="form-control">
                </div>

                <div class="form-group">
                    <label><h5>Giá sản phẩm</h5></label>
                    <input type="number" name="price" class="form-control">
                </div>

                <div class="form-group">
                    <label><h5>Ngày đặt</h5></label>
                    <input type="date" name="created_time">
                </div>

                <div>
                    <label><h5>Địa chỉ giao hàng</h5></label>
                    <input type="text" name="address" class="form-control">
                </div><br>

                    <button name="sbm" class="btn btn-success">Thêm mới</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
</body>
</html>