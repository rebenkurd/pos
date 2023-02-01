<?php

require_once "configs/initialized.php";

if(isset($_POST['fetch'])){
    echo Custom::fetch();
}


if(isset($_POST['get'])){
$id=$_POST['id'];
$custom=Custom::singleFetch($id);
echo json_encode($custom);
}

if(isset($_POST['edit'])){
        
    $id = $_POST['id'];

    $custom=Custom::singleFetch($id);
    $custom->id=$_POST["id"];
    $custom->name=$_POST["name"];
    $custom->id=$_POST["barcode"];
    $custom->quantity=$_POST["qty"];
    $custom->unit=$_POST["unit"];
    $custom->price=$_POST["price"];
    $custom->tax=$_POST["tax"];
    $custom->purchase_price=$_POST["purchase_price"];
    $custom->tax_type=$_POST["tax_type"];
    $custom->profit_margin=$_POST["profit_margin"];
    $custom->sales_price=$_POST["sales_price"];
    $custom->final_price=$_POST["final_price"];
    // $custom->discount=$_POST["discount"];
    // $custom->discount_type=$_POST["discount_type"];
    $custom->status=$_POST["status"];
    $custom->debt=$_POST["debt"];
    $custom->category=$_POST["category"];
    $custom->mf_date=$_POST["mfd"];
    $custom->ex_date=$_POST["exd"];
    $custom->brand=$_POST["brand"];
    $custom->updated_by='rebin';
    $custom->updated_at=date("Y-m-d H:i:s");

    if($custom->save()){
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
    $custom=new Custom();
    $custom->name=$_POST["name"];
    $custom->id=$_POST["barcode"];
    $custom->quantity=$_POST["qty"];
    $custom->unit=$_POST["unit"];
    $custom->price=$_POST["price"];
    $custom->tax=$_POST["tax"];
    $custom->purchase_price=$_POST["purchase_price"];
    $custom->tax_type=$_POST["tax_type"];
    $custom->profit_margin=$_POST["profit_margin"];
    $custom->sales_price=$_POST["sales_price"];
    $custom->final_price=$_POST["final_price"];
    // $custom->discount=$_POST["discount"];
    // $custom->discount_type=$_POST["discount_type"];
    $custom->status=$_POST["status"];
    $custom->debt=$_POST["debt"];
    $custom->category=$_POST["category"];
    $custom->mf_date=$_POST["mfd"];
    $custom->ex_date=$_POST["exd"];
    $custom->brand=$_POST["brand"];
    $custom->added_by='rebin';
    $custom->created_at=date("Y-m-d H:i:s");
    if($custom->save()){
        $data=array('success'=>'true',);
        echo json_encode($data);
    }else{
        $data=array('success'=>'false',);
        echo json_encode($data);
    }

}


if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $custom=Custom::singleFetch($id);
    if($custom->delete()){
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