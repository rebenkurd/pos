<?php

require_once "configs/initialized.php";

if(isset($_POST['fetch'])){
    echo Payment::fetch();
}

// if(isset($_POST['get'])){
//     $id=$_POST['id'];
//     $supplier=Supplier::singleFetch($id);
//     echo json_encode($supplier);
// }

// if(isset($_POST['edit'])){
        
//     $id = $_POST['id'];

//     $supplier=Supplier::singleFetch($id);
//     $supplier->id=$_POST["id"];
//     $supplier->name=$_POST["name"];
//     $supplier->mobile=$_POST["mobile"];
//     $supplier->email=$_POST["email"];
//     $supplier->gst=$_POST["gst"];
//     $supplier->tax=$_POST["tax"];
//     $supplier->open_balance=$_POST["open_balance"];
//     $supplier->country=$_POST["country"];
//     $supplier->state=$_POST["state"];
//     $supplier->city=$_POST["city"];
//     $supplier->postcode=$_POST["postcode"];
//     $supplier->status=$_POST["status"];
//     $supplier->address=$_POST["address"];
//     $supplier->updated_by='rebin';
//     $supplier->updated_at=date("Y-m-d H:i:s");

//     if($supplier->save()){
//         $data = array(
//             'success'=>'true',
//         );
//         echo json_encode($data);
//     }
//     else{
//         $data = array(
//             'success'=>'false',
//         );
//         echo json_encode($data);
//     } 
// }


if(isset($_POST['add'])){
    $payment=new Payment();
    $payment->purchase_code=$_POST["purchase_code"];
    $payment->pay_amount=$_POST["pay_amount"];
    $payment->pay_type=$_POST["pay_type"];
    $payment->pay_note=$_POST["pay_note"];
    $payment->added_by='rebin';
    $payment->created_at=date("Y-m-d H:i:s");
    if($payment->save()){
        $data=array('success'=>'true',);
        echo json_encode($data);
    }else{
        $data=array('success'=>'false',);
        echo json_encode($data);
    }

}


if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $payment=Payment::singleFetch($id);
    if($payment->delete()){
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