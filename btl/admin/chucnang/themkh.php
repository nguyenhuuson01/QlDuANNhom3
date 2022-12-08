<?php $user = (isset($_SESSION['user'])) ?  $_SESSION['user']: [];
        if (isset($_SESSION['user']) && $_SESSION['user']){
        
       }
       else{
        header('location:http://localhost/btl/login.php');
       }
?>
<?php
if(isset($_POST['sbm'])){
    $name = $_POST['date_of_birth'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $total = $_POST['total'];
    $created_time = $_POST['created_time'];

    $sql = "INSERT INTO oder(name, phone, address, total, created_time) VALUES('$name', '$phone', '$address', '$total', '$created_time')";

    $query = mysqli_query($connect, $sql);
    header('location: indexkh.php');
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
    <title>HUNRE</title>
</head>
<body>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>thêm khách hàng</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label><h5>Tên khách hàng</h5></label>
                    <input type="text" name="name" class="form-control" >
                </div>

                <div class="form-group">
                    <label><h5>SĐT</h5></label>
                    <input type="text" name="phone"  >
                </div>

                <div>
                    <label><h5>Địa chỉ</h5></label>
                    <input type="text" name="address"  >
                </div>

                <div class="form-group">
                    <label><h5>Số tiền phải trả</h5></label>
                    <input type="int" name="total" class="form-control"  >
                </div>

                <div class="form-group">
                    <label><h5>Ngày đặt hàng</h5></label>
                    <input type="date" name="created_time" class="form-control"  >
                </div><br>
                    <button name="sbm" class="btn btn-success">thêm</button>
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