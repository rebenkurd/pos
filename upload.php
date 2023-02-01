
<?php 
    require("configs/initialized.php");
    
    if(isset($_POST['upload-image'])){
        if($_FILES['image']['error']== 0){
            $image_upload=new Upload($_FILES['image']);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <h2>Chose an image to upload</h2>
    <input type="file" name="image">
    <h3>
        Acceepted image file type are <span>(.jpeg, .jpg, .png and .gif)</span> and the file must be smaller than <span>(2MB)</span>.
    </h3>

    <input type="submit" name="upload-image" value="upload-image">
    <p class="error"><?php echo @$image_upload->error;?></p>
</input>
</form>
</body>
</html>