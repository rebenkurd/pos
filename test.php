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

$get_num= str_replace("PR","",rand(1,10));
$id_inc= $get_num+1;
$get_str= str_pad($id_inc,5,0,STR_PAD_LEFT);
echo "PR".$get_str;


?>
  </form>
</body>
</html>