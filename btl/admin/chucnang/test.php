<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $path = "uploads/";
        if(isset($_POST["upload"])){
            echo"<pre>";
            print_r($_FILES);
            $count = count($_FILES["upload"]["name"]);
            for($i=0;$i<$count;$i++){
                echo $_FILES["upload"]["name"][$i]."</br>";
                $filename = $_FILES["upload"]["tmp_name"][$i];
                move_uploaded_file($filename, $path.$_FILES["upload"]["name"][$i]);
            }
            die;
        }

    ?>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="upload[]" multiple="mutiple"/>
        <input type="submit" name="upload" value="Upload"/>
    </form>
</body>
</html>