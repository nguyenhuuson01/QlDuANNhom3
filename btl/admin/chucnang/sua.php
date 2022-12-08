<?php $user = (isset($_SESSION['user'])) ?  $_SESSION['user']: [];
        if (isset($_SESSION['user']) && $_SESSION['user']){
        
       }
       else{
        header('location:http://localhost/btl/login.php');
       }
?>
<?php
    $id = $_GET['id'];

    $sql_brand = "SELECT * FROM brands";
    $query_brand = mysqli_query($connect, $sql_brand);

    $sql_up = "SELECT * FROM products WHERE prd_id = $id";
    $query_up = mysqli_query($connect, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);
    
    $sql_img =mysqli_query($connect,"SELECT * FROM image_library WHERE prd_id = $id"); 
    if(isset($_POST['sbm'])){
        $prd_name = $_POST['prd_name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        if($_FILES['image']['name'] == ""){
            $image = $row_up['image'];
        }else{
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp, 'img/'.$image);
        }


        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $brand_id = $_POST['brand_id'];

        if(isset($_FILES['images'])){
            $files = $_FILES['images'];
            $file_names = $files['name'];
            if(!empty($file_names[0])){
                mysqli_query($connect, "DELETE FROM image_library WHERE prd_id = $id ");
                foreach ($file_names as $key => $value){
                    move_uploaded_file($files['tmp_name'][$key],'uploads/'.$value);
                }
                foreach ($file_names as $key => $value) {
                    mysqli_query($connect, "INSERT INTO image_library(prd_id,image) VALUES('$id','$value')");
                }
            }

        }
        

        $sql = "UPDATE products SET prd_name = '$prd_name', image = '$image', price = $price, quantity = $quantity, description = '$description', brand_id = $brand_id WHERE prd_id = $id";

        $query = mysqli_query($connect, $sql);

        header('location: index.php');
    }
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Sửa sản phẩm</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="prd_name" class="form-control" value="<?php echo $row_up['prd_name']; ?>">
                </div>

                <div class="form-group">
                    <label>Ảnh sản phẩm</label> <br>
                    <img style="width:200px;" src="img/<?= $row_up['image'] ?>" /><br/>
                    <input type="hiden" name="image" value="<?php echo $row_up['image']; ?>" >
                    <input type="file" name="image" />
                    </div>
                        <div class="clear-both"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ảnh mô tả</label> <br>
                    <input type="file" name="images[]" multiple="multiple" >
                    <div style="display:flex;">
                    <?php foreach ($sql_img as $key => $value){ ?>                        
                            <div style="width: 150px;;margin-right:10px">
                                <img style="width:150px;" src="uploads/<?=$value['image']?>" alt="">
                            </div>                        
                    <?php } ?>
                    </div>    
                    </div>
                        <div class="clear-both"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Số lượng sản phẩm</label>
                    <input type="number" name="quantity" class="form-control" value="<?php echo $row_up['quantity']; ?>">
                </div>

                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="number" name="price" class="form-control" value="<?php echo $row_up['price']; ?>">
                </div>

                <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    <textarea type="text" name="description" class="form-control" id="editor" value="<?php echo $row_up['description']; ?>"><?=$row_up['description']; ?></textarea>
                </div>

                <div class="form-group">
                    <label>Thương hiệu</label>
                    <select class="form-control" name="brand_id">
                        <?php
                            while ($row_brand = mysqli_fetch_assoc($query_brand)) {?>
                                <option <?php if($row_brand['brand_id'] == $row_up['brand_id']){ echo "selected"; }  ?> value="<?php echo $row_brand['brand_id']; ?>"><?php echo $row_brand['brand_name']; ?></option>
                            <?php } ?>
                    </select>
                </div>
                    <button name="sbm" class="btn btn-success">Sửa</button>
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