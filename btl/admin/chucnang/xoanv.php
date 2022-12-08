<?php 
    include 'admin/config/db.php';
	$user = (isset($_SESSION['user'])) ?  $_SESSION['user']: [];
        if (isset($_SESSION['user']) && $_SESSION['user']){
        
       }
       else{
        header('location:http://localhost/btl/login.php');
       }
?>
<?php
	$id = $_GET['id'];
	$sql = "DELETE FROM staff where id_nv = $id";
	$query = mysqli_query($connect, $sql);
	header('location: indexnv.php?page_layout=nhanvien');
?>