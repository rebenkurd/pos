<?php

require_once "configs/initialized.php";




// if(isset($_POST['fetch'])){
//     echo Item::fetch();
// }

// if(isset($_POST['get'])){
//     $id=$_POST['id'];
//     $item=Item::singleFetch($id);
//     echo json_encode($item);
// }

// if(isset($_POST['edit'])){
        
//     $id = $_POST['id'];
//     $item=Item::singleFetch($id);
//     $item->id=$_POST["id"];
//     $item->name=$_POST["name"];
//     $item->description=$_POST["description"];
//     $item->status=$_POST["status"];
//     $item->updated_by = 'rebin';
//     $item->updated_at =date("Y-m-d H:i:s");

//     if($item->save()){
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
    $item=new Item();
    $item_id=$_POST["item_id"];
    $item->purchase_code=$_POST["purchase_code"];
    $item->name=$_POST["name"];
    $item->quantity=$_POST["quantity"];
    $item->price=$_POST["price"];
    $item->discount_amount=$_POST["discount_amount"];
    $item->tax=$_POST["tax"];
    $item->tax_amount=$_POST["tax_amount"];
    $item->unit_cost=$_POST["unit_cost"];
    $item->total_price=$_POST["total_price"];
    $item->added_by='rebin';
    $item->created_at=date("Y-m-d H:i:s");
    if($item->save()){
        $custom=Custom::singleFetch($item_id);
        $custom->quantity=$custom->quantity+$_POST["quantity"];
        $custom->save();
        $data=array('success'=>'true',);
        echo json_encode($data);
    }else{
        $data=array('success'=>'false',);
        echo json_encode($data);
    }
}

if(isset($_POST['edit'])){
    $item_id=$_POST["item_id"];
    $purchase_code=$_POST["purchase_code"];
    $item_find=Item::findbyCode($purchase_code);
    if($item_find->id == $item_id){  
        $item=Item::singleFetch($_POST["item_id"]);    
        $item->name=$_POST["name"];
        $item->quantity=$_POST["quantity"];
        $item->price=$_POST["price"];
        $item->discount_amount=$_POST["discount_amount"];
        $item->tax=$_POST["tax"];
        $item->tax_amount=$_POST["tax_amount"];
        $item->unit_cost=$_POST["unit_cost"];
        $item->total_price=$_POST["total_price"];
        $item->updated_by='rebin';
        $item->updated_at=date("Y-m-d H:i:s");
        if($item->save()){
            $custom=Custom::singleFetch($_POST["item_id"]);
            $custom->quantity=$custom->quantity+$_POST["quantity"];
            $custom->save();
            $data=array('success'=>'true',);
            echo json_encode($data);
        }else{
            $data=array('success'=>'false',);
            echo json_encode($data);
        }
    }else{
        $item=new Item();
        $item_id=$_POST["item_id"];
        $item->purchase_code=$_POST["purchase_code"];
        $item->name=$_POST["name"];
        $item->quantity=$_POST["quantity"];
        $item->price=$_POST["price"];
        $item->discount_amount=$_POST["discount_amount"];
        $item->tax=$_POST["tax"];
        $item->tax_amount=$_POST["tax_amount"];
        $item->unit_cost=$_POST["unit_cost"];
        $item->total_price=$_POST["total_price"];
        $item->added_by='rebin';
        $item->created_at=date("Y-m-d H:i:s");
        if($item->save()){
            $custom=Custom::singleFetch($item_id);
            $custom->quantity=$custom->quantity+$_POST["quantity"];
            $custom->save();
            $data=array('success'=>'true',);
            echo json_encode($data);
        }else{
            $data=array('success'=>'false',);
            echo json_encode($data);
        }
    }

}


if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $item=Item::singleFetch($id);
    if($item->delete()){
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