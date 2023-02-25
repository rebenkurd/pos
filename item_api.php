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


if(isset($_POST['add_purchase']) || isset($_GET['add_sale'])){
    $item=new Item();
    $custom_id=$_POST["custom_id"];
    $item->custom_id=$custom_id;
    $item->code=$_POST["code"];
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
        if(isset($_GET['add_purchase'])){
            $custom=Custom::singleFetch($custom_id);
            $custom->quantity=$custom->quantity+$_POST["quantity"];
            $custom->save();
        }else{
            $custom=Custom::singleFetch($custom_id);
            $custom->quantity=$custom->quantity-$_POST["quantity"];
            $custom->save(); 
        }
        $data=array('success'=>'true',);
        echo json_encode($data);
    }else{
        $data=array('success'=>'false',);
        echo json_encode($data);
    }
}

if(isset($_POST['edit'])){
    $custom_id=$_POST["custom_id"];
    $item_id=$_POST["item_id"];
    $quantity=$_POST["quantity"];
    $code=$_POST["code"];
    $item_find=Item::findbyCode($code);
    if($item_find->id == $item_id){
        $item=Item::singleFetch($item_id);    
        $item->name=$_POST["name"];
        $item->quantity=$quantity;
        $item->price=$_POST["price"];
        $item->discount_amount=$_POST["discount_amount"];
        $item->tax=$_POST["tax"];
        $item->tax_amount=$_POST["tax_amount"];
        $item->unit_cost=$_POST["unit_cost"];
        $item->total_price=$_POST["total_price"];
        $item->updated_by='rebin';
        $item->updated_at=date("Y-m-d H:i:s");
        if($item->save()){
            // $custom=Custom::singleFetch($custom_id);
            // $cq=$custom->quantity;
            // $custom->quantity=$cq+$quantity;
            // $custom->save();
            $data=array('success'=>'true',);
            echo json_encode($data);
        }else{
            $data=array('success'=>'false',);
            echo json_encode($data);
        }
    }else{  
        $item=new Item();
        // $custom_id=$_POST["custom_id"];
        $item->code=$_POST["code"];
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
            // $custom=Custom::singleFetch($custom_id);
            // $custom->quantity=$custom->quantity+$_POST["quantity"];
            // $custom->save();
            $data=array('success'=>'true',);
            echo json_encode($data);
        }else{
            $data=array('success'=>'1',);
            echo json_encode($data);
        }
    }
}
if(isset($_POST['return'])){
    $item_id=$_POST["item_id"];
    $custom_id=$_POST["custom_id"];
    $quantity=$_POST["quantity"];
    $code=$_POST["code"];
    $item_find=Item::findbyCode($code);
        $item=Item::singleFetch($item_id);    
        $item->name=$_POST["name"];
        $item->quantity=$quantity;
        $item->price=$_POST["price"];
        $item->discount_amount=$_POST["discount_amount"];
        $item->tax=$_POST["tax"];
        $item->tax_amount=$_POST["tax_amount"];
        $item->unit_cost=$_POST["unit_cost"];
        $item->total_price=$_POST["total_price"];
        $item->updated_by='rebin';
        $item->updated_at=date("Y-m-d H:i:s");
        if($item->save()){
            $custom=Custom::singleFetch($item->custom_id);
            $custom->quantity -= $quantity;
            $custom->save();
            $data=array('success'=>'true',);
            echo json_encode($data);
        }else{
            $data=array('success'=>'false',);
            echo json_encode($data);
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