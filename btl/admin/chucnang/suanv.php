<?php $user = (isset($_SESSION['user'])) ?  $_SESSION['user']: [];
        if (isset($_SESSION['user']) && $_SESSION['user']){
        
       }
       else{
        header('location:http://localhost/btl/login.php');
       }
?>
<?php
    $id = $_GET['id'];

    $sql_staff = "SELECT * FROM staff where id_nv = $id";
    $query_staff = mysqli_query($connect, $sql_staff);
    $row_up = mysqli_fetch_assoc($query_staff);
    
    if(isset($_POST['sbm'])){
        $image_tmp = $_FILES['image']['tmp_name'];

        if($_FILES['image']['name'] == ""){
            $image = $row_up['image'];
        }else{
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp, 'img/'.$image);
        }
        $name_nv = $_POST['name_nv'];
        $date_of_birth = $_POST['date_of_birth'];
        $date_start_work = $_POST['date_start_work'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $salary = $_POST['salary'];
        $sql = "UPDATE staff SET `image` = '$image', name_nv = '$name_nv', date_of_birth='$date_of_birth', date_start_work='$date_start_work', address='$address',phone='$phone',salary='$salary' WHERE id_nv = $id";
        $query = mysqli_query($connect, $sql);
        header('location: indexnv.php');
    }
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Sửa nhân viên</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
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
                    <label><h5>Tên nhân viên</h5></label>
                    <input type="text" name="name_nv" class="form-control" value="<?php echo $row_up['name_nv']; ?>">
                </div>

                <div class="form-group">
                    <label><h5>Ngày sinh</h5></label>
                    <input type="date" name="date_of_birth" value="<?php echo $row_up['date_of_birth']; ?>" >
                </div>

                <div>
                    <label><h5>Ngày làm việc</h5></label>
                    <input type="date" name="date_start_work" value="<?php echo $row_up['date_start_work']; ?>" >
                </div>

                <div class="form-group">
                    <label><h5>Địa chỉ</h5></label>
                    <input type="text" name="address" class="form-control" value="<?php echo $row_up['address']; ?>" >
                </div>

                <div class="form-group">
                    <label><h5>SĐT</h5></label>
                    <input type="number" name="phone" class="form-control" value="<?php echo $row_up['phone']; ?>" >
                </div>

                <div class="form-group">
                    <label><h5>Lương</h5></label>
                    <input type="number" class="form-control" name="salary" value="<?php echo $row_up['salary']; ?>" >
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