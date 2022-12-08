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
	$sql = "DELETE FROM products where prd_id = $id";
	$query = mysqli_query($connect, $sql);
	header('location: index.php?page_layout=danhsach');
?>