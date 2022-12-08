<?php $user = (isset($_SESSION['user'])) ?  $_SESSION['user']: [];
        if (isset($_SESSION['user']) && $_SESSION['user']){
        
       }
       else{
        header('location:http://localhost/btl/login.php');
       }
?>
<?php
if(isset($_POST['sbm'])){
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $name_nv = $_POST['name_nv'];
    $date_of_birth = $_POST['date_of_birth'];
    $date_start_work = $_POST['date_start_work'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO staff(image, name_nv, date_of_birth, date_start_work, address, phone, salary) VALUES('$image', '$name_nv', '$date_of_birth', '$date_start_work', '$address', '$phone', '$salary')";

    $query = mysqli_query($connect, $sql);
    move_uploaded_file($image_tmp, 'img/'.$image);
    header('location: indexnv.php');
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
            <h2>thêm nhân viên</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Ảnh sản phẩm</label> <br>
                    <input type="file" name="image">
                </div>

                <div class="form-group">
                    <label><h5>Tên nhân viên</h5></label>
                    <input type="text" name="name_nv" class="form-control" >
                </div>

                <div class="form-group">
                    <label><h5>Ngày sinh</h5></label>
                    <input type="date" name="date_of_birth"  >
                </div>

                <div>
                    <label><h5>Ngày làm việc</h5></label>
                    <input type="date" name="date_start_work"  >
                </div>

                <div class="form-group">
                    <label><h5>Địa chỉ</h5></label>
                    <input type="text" name="address" class="form-control"  >
                </div>

                <div class="form-group">
                    <label><h5>SĐT</h5></label>
                    <input type="number" name="phone" class="form-control"  >
                </div>

                <div class="form-group">
                    <label><h5>Lương</h5></label>
                    <input type="number" class="form-control" name="salary"  >
                </div>

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