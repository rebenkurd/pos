<?php

require_once "configs/initialized.php";

if(isset($_POST['fetch'])){
    echo Category::fetch();
}

if(isset($_POST['get'])){
$id=$_POST['id'];
$category=Category::singleFetch($id);
echo json_encode($category);
}

if(isset($_POST['edit'])){
        
    $id = $_POST['id'];

    $category=Category::singleFetch($id);
    $category->id=$_POST["id"];
    $category->name=$_POST["name"];
    $category->description=$_POST["description"];
    $category->status=$_POST["status"];
    $category->updated_by = 'rebin';
    $category->updated_at =date("Y-m-d H:i:s");

    if($category->save()){
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
    $category=new Category();
    $category->name=$_POST["name"];
    $category->description=$_POST["description"];
    $category->status=$_POST["status"];
    $category->added_by='rebin';
    $category->created_at=date("Y-m-d H:i:s");
    if($category->save()){
        $data=array('success'=>'true',);
        echo json_encode($data);
    }else{
        $data=array('success'=>'false',);
        echo json_encode($data);
    }

}


if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $category=Category::singleFetch($id);
    if($category->delete()){
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