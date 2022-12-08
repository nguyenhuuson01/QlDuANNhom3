<?php
	$connect = mysqli_connect('localhost','root','','web_shop');
	if($connect){
		mysqli_query($connect, "SET NAME 'UTF8'");
		session_start();
	}else{
		echo 'ket noi that bai ';
	}
?>