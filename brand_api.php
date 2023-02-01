<?php

require_once "configs/initialized.php";




if(isset($_POST['fetch'])){
    echo Brand::fetch();
}

if(isset($_POST['get'])){
$id=$_POST['id'];
$brand=Brand::singleFetch($id);
echo json_encode($brand);
}

if(isset($_POST['edit'])){
        
    $id = $_POST['id'];
    $brand=Brand::singleFetch($id);
    $brand->id=$_POST["id"];
    $brand->name=$_POST["name"];
    $brand->description=$_POST["description"];
    $brand->status=$_POST["status"];
    $brand->updated_by = 'rebin';
    $brand->updated_at =date("Y-m-d H:i:s");

    if($brand->save()){
        $data = array(
            'success'=>'true',
        );
        echo json_encode($data);
    }
    else{
        $data = array(
            'success'=>'false',
        );
        echo json_encode($data);
    } 
}






if(isset($_POST['add'])){
    $brand=new Brand();
    $brand->name=$_POST["name"];
    $brand->description=$_POST["description"];
    $brand->status=$_POST["status"];
    $brand->added_by='rebin';
    $brand->created_at=date("Y-m-d H:i:s");
    if($brand->save()){
        $data=array('success'=>'true',);
        echo json_encode($data);
    }else{
        $data=array('success'=>'false',);
        echo json_encode($data);
    }

}


if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $brand=Brand::singleFetch($id);
    if($brand->delete()){
        $data = array(
            'success'=>'true',
        );
        echo json_encode($data);
    }
    else{
        $data = array(
            'success'=>'false',
        );
        echo json_encode($data);
    } 
}




?>