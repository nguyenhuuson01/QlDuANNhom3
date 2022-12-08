<?php
	require_once 'config/db.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<link rel="icon" href="../img/logobe.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<title>thanhson</title>
</head>
<body>
	<?php
		if(isset($_GET['page_layout'])){
			switch($_GET['page_layout']){
				case 'quanlydonhang':
					require_once 'chucnang/quanlydonhang.php';
					break;
				case 'them':
					require_once 'chucnang/themdh.php';
					break;
					
				case 'sua':
					require_once 'chucnang/suadh.php';
					break;
					
				case 'xoa':
					require_once 'chucnang/xoadh.php';
					break;					
				default:
					require_once 'chucnang/quanlydonhang.php';
					break;
			}
		}else{
			require_once 'chucnang/quanlydonhang.php';
		}
	?>	
</body>
</html>