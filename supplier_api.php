<?php

require_once "configs/initialized.php";

if(isset($_POST['fetch'])){
    echo Supplier::fetch();
}

if(isset($_POST['get'])){
$id=$_POST['id'];
$supplier=Supplier::singleFetch($id);
echo json_encode($supplier);
}

if(isset($_POST['edit'])){
        
    $id = $_POST['id'];

    $supplier=Supplier::singleFetch($id);
    $supplier->id=$_POST["id"];
    $supplier->name=$_POST["name"];
    $supplier->mobile=$_POST["mobile"];
    $supplier->email=$_POST["email"];
    $supplier->gst=$_POST["gst"];
    $supplier->tax=$_POST["tax"];
    $supplier->open_balance=$_POST["open_balance"];
    $supplier->country=$_POST["country"];
    $supplier->state=$_POST["state"];
    $supplier->city=$_POST["city"];
    $supplier->postcode=$_POST["postcode"];
    $supplier->status=$_POST["status"];
    $supplier->address=$_POST["address"];
    $supplier->updated_by='rebin';
    $supplier->updated_at=date("Y-m-d H:i:s");

    if($supplier->save()){
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
    $supplier=new Supplier();
    $supplier->name=$_POST["name"];
    $supplier->mobile=$_POST["mobile"];
    $supplier->email=$_POST["email"];
    $supplier->gst=$_POST["gst"];
    $supplier->tax=$_POST["tax"];
    $supplier->open_balance=$_POST["open_balance"];
    $supplier->country=$_POST["country"];
    $supplier->state=$_POST["state"];
    $supplier->city=$_POST["city"];
    $supplier->postcode=$_POST["postcode"];
    $supplier->status=$_POST["status"];
    $supplier->address=$_POST["address"];
    $supplier->added_by='rebin';
    $supplier->created_at=date("Y-m-d H:i:s");
    if($supplier->save()){
        $data=array('success'=>'true',);
        echo json_encode($data);
    }else{
        $data=array('success'=>'false',);
        echo json_encode($data);
    }

}


if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $supplier=Supplier::singleFetch($id);
    if($supplier->delete()){
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