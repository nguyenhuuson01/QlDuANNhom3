<?php $user = (isset($_SESSION['user'])) ?  $_SESSION['user']: [];
        if (isset($_SESSION['user']) && $_SESSION['user']){
        
       }
       else{
        header('location:http://localhost/btl/login.php');
       }
?>
<?php
    $sql_brand = "SELECT * FROM brands";
    $query_brand = mysqli_query($connect, $sql_brand);
    $path = "uploads/";
    if(isset($_POST['sbm'])){
        $prd_name = $_POST['prd_name'];

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $brand_id = $_POST['brand_id'];

        if(isset($_FILES['images'])){
            $files = $_FILES['images'];
            $file_names = $files['name'];
            // var_dump($files['tmp_name']);die();
            foreach ($file_names as $key => $value){
                move_uploaded_file($files['tmp_name'][$key],'uploads/'.$value);
            }
        }

        $sql = "INSERT INTO products(prd_name, image, price, quantity, description, brand_id) VALUES('$prd_name', '$image', $price, $quantity, '$description', $brand_id)";
        
        $query = mysqli_query($connect, $sql);
        $id_pro= mysqli_insert_id($connect);
        foreach ($file_names as $key => $value) {
            mysqli_query($connect, "INSERT INTO image_library(prd_id,image) VALUES('$id_pro','$value')");
        }    
        move_uploaded_file($image_tmp, 'img/'.$image);
        header('location: index.php');
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
            <h2>Thêm sản phẩm</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="prd_name" class="form-control">
                </div>

                <div class="form-group">
                    <label>Ảnh sản phẩm</label> <br>
                    <input type="file" name="image">
                </div>

                <div class="form-group">
                    <label>Ảnh mô tả</label> <br>
                    <input type="file" name="images[]" multiple="multiple">
                </div>

                <div class="form-group">
                    <label>Số lượng sản phẩm</label>
                    <input type="number" name="quantity" class="form-control">
                </div>

                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="number" name="price" class="form-control">
                </div>

                <div class="form-group">
                    <label>Mô tả sản phẩm</label>           
                    <textarea  name="description" class="form-control" cols="30" rows="10" id="editor"></textarea>
                </div>

                <div class="form-group">
                    <label>Thương hiệu</label>
                    <select class="form-control" name="brand_id">
                        <?php
                            while ($row_brand = mysqli_fetch_assoc($query_brand)) {?>
                                <option value="<?php echo $row_brand['brand_id']; ?>"><?php echo $row_brand['brand_name']; ?></option>
                            <?php } ?>
                    </select>
                </div>
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