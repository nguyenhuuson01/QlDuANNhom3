<?php
include 'admin/config/db.php';

//huy session theo ten
unset($_SESSION['user']);
// xóa tất cả tần tật session
// session_destroy();
header('location:http://localhost/btl/index.php');
?>