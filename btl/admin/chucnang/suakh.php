<?php $user = (isset($_SESSION['user'])) ?  $_SESSION['user']: [];
        if (isset($_SESSION['user']) && $_SESSION['user']){
        
       }
       else{
        header('location:http://localhost/btl/login.php');
       }
?>
<?php
    $id = $_GET['id'];

    $sql_staff = "SELECT * FROM oder where id = $id";
    $query_staff = mysqli_query($connect, $sql_staff);
    $row_up = mysqli_fetch_assoc($query_staff);
    
    if(isset($_POST['sbm'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $total = $_POST['total'];
        $created_time = $_POST['created_time'];
        $sql = "UPDATE oder SET  name = '$name', phone='$phone', address='$address', total='$total',created_time='$created_time' WHERE id = $id";
        $query = mysqli_query($connect, $sql);
        header('location: indexkh.php');
    }
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Sửa khách hàng</h2>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label><h5>Tên khách hàng</h5></label>
                    <input type="text" name="name" class="form-control" value="<?php echo $row_up['name']; ?>">
                </div>

                <div class="form-group">
                    <label><h5>SĐT</h5></label>
                    <input type="text" name="phone" class="form-control" value="<?php echo $row_up['phone']; ?>" >
                </div>

                <div class="form-group">
                    <label><h5>Địa chỉ</h5></label>
                    <input type="text" name="address" class="form-control" value="<?php echo $row_up['address']; ?>" >
                </div>

                <div class="form-group">
                    <label><h5>Số tiền phải trả</h5></label>
                    <input type="int" name="total" class="form-control" value="<?php echo $row_up['total']; ?>" >
                </div>

                <div>
                    <label><h5>Ngày đặt hàng</h5></label>
                    <input type="date" name="created_time" value="<?php echo $row_up['created_time']; ?>" >
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