 
<?php

require_once "configs/initialized.php";

if(isset($_POST['fetch'])){
    echo Purchase::fetch();
}



if(isset($_POST['get_due'])){
    $id=$_POST['id'];
    $purchase=Purchase::singleFetch($id);
    echo json_encode($purchase);
}
    
if(isset($_POST['view_payment'])){
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }

    $purchase_code=Purchase::singleFetch($id)->purchase_code;
    $payments= Payment::fetchAll();
    $no=1;
    if(Payment::numRows()>0){
    foreach($payments as $payment){
        if($payment->purchase_code==$purchase_code){
        echo '<tr>';
        echo '<td>'.$no++.'</td>'; 
        echo '<td>'.$payment->created_at.'</td>'; 
        echo '<td>'.$payment->pay_type.'</td>'; 
        echo '<td>'.$payment->pay_amount.'</td>'; 
        echo '<td>'.$payment->pay_note.'</td>'; 
        echo '</tr>';
    }else{
        echo '<tr>';
        echo '<td colspan="5" class="text-center">هیچ زانیاریەک نییە</td>';
        echo '</tr>';
    }
}}else{
    echo '<tr>';
    echo '<td colspan="5" class="text-center">هیچ زانیاریەک نییە</td>';
    echo '</tr>';
}
}



if(isset($_POST['fetch_all'])){
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }

    $items= Custom::fetchAll();
    $data=array();
    foreach($items as $item){
        if($item->id==$id){
        echo '<tr>';
        echo '<input type="hidden" name="custom_id[]" id="custom_id" value="'.$item->id.'">';
        echo '<td><input type="text" name="item_name[]" id="item_name" size="100" value="'.$item->name.'" readonly class="form-control item_name"></td>';
        echo '<td><div class="input-group flex-nowrap">
        <button type="button" class="btn btn-secondary btn-sm item_btn_minus" id="item_btn_minus" ><i class="ti ti-minus"></i></button>
        <input type="text" id="item_qty" name="item_qty[]" size="100" value="1" class="form-control input-sm text-center item_qty">
        <button type="button" class="btn btn-secondary btn-sm item_btn_plus" id="item_btn_plus" ><i class="ti ti-plus"></i></button>
        </div></td>';
        echo '<td><input type="text" name="item_price[]" id="item_price" size="120" value="'.$item->price.'" readonly class="form-control item_price"></td>';
        echo '<td><select name="item_discount_type[]" id="item_discount_type" class="form-control item_discount_type">
        <option value="per">%</option>
        <option value="amt">پارە</option>
        </select></td>';
        echo '<td><input type="text" name="item_discount_amount[]" id="item_discount_amount" size="100" value="'.$item->discount.'" readonly class="form-control item_discount_amount"></td>';
        echo '<td><input type="text" name="item_tax[]" id="item_tax" size="50" value="'.$item->tax.'" class="form-control item_tax"></td>';
        echo '<td><input type="text" name="item_tax_amount[]" id="item_tax_amount" value="0.00" size="100" readonly class="form-control item_tax_amount"></td>';
        echo '<td><input type="text" name="item_unit_cost[]" id="item_unit_cost" size="100" value="0.00" readonly class="form-control item_unit_cost"></td>';
        echo '<td><input type="text" name="item_total_price[]" id="item_total_price" size="100" value="0.00" readonly class="form-control item_total_price"></td>';
        echo '<td><button type="button" id="btn_remove_item" class="btn btn-danger btn-sm btn_remove_item"><i class="ti ti-minus"></i></button></td>';
        echo '</tr>';
    }else{
        return;
    }
    }
    echo json_encode($data);
}

if(isset($_POST['query'])){
    $custom_search= Custom::search($_POST['query']);
    echo $custom_search;
}


if(isset($_POST['add'])){
    $check_id=Purchase::fetchAll();
    if(Purchase::numRows()>0){
        foreach($check_id as $check){
            $id=$check->id;
            $get_numbers=str_replace("PR","",$id);
            $id_increase=$get_numbers+1;
            $get_string=str_pad($id_increase,5,0,STR_PAD_LEFT);
            $new_id="PR".$get_string;
            $purchase=new Purchase();
            $purchase->purchase_code=$new_id;
            $purchase->supplier=$_POST["supplier_id"];
            $purchase->purchase_date=$_POST["purchase_date"];
            $purchase->status=$_POST["supplier_status"];
            $purchase->ref_num=$_POST["purchase_ref_num"];
            $purchase->total_quantity=$_POST["total_quantity"];
            $purchase->tax=$_POST["tax"];
            $purchase->tax_amount=$_POST["tax_amount"];
            $purchase->discount=$_POST["discount"];
            $purchase->note=$_POST["purchase_note"];
            $purchase->total_price=$_POST["total_price"];
            $purchase->other_charges=$_POST["other_charges"];
            $purchase->discount_all=$_POST["discount_all"];
            $purchase->grand_total=$_POST["grand_total"];
            $purchase->added_by='rebin';
            $purchase->created_at=date("Y-m-d H:i:s");
            $payment_amount=$_POST['pay_amount'];
            $gtotal=$_POST["grand_total"];
        
            if($payment_amount<0 || $payment_amount == "" || $payment_amount ==null){
                if($payment_amount > $gtotal){
                    $purchase->due=0;
                }else{
                    $due=$gtotal-$payment_amount;
                    $purchase->due=$due;
                }
            }else{
                $purchase->due=$_POST["grand_total"];
            }
            
            // if($_POST["pay_amount"] < $_POST["grand_total"] || $_POST["pay_amount"] == $_POST["grand_total"] || $_POST['pay_amount'] == null){
            //     $purchase->pay_status=1;
            // }else{
            //     $purchase->pay_status=0;
            // }
        
            if($purchase->save()){
                $data=array('success'=>'true',);
                echo json_encode($data);
            }else{
                $data=array('success'=>'false');
                echo json_encode($data);
            }
        
        }
    }else{
        $purchase=new Purchase();
        $purchase->purchase_code='PR00001';
        $purchase->supplier=$_POST["supplier_id"];
        $purchase->purchase_date=$_POST["purchase_date"];
        $purchase->status=$_POST["supplier_status"];
        $purchase->ref_num=$_POST["purchase_ref_num"];
        $purchase->total_quantity=$_POST["total_quantity"];
        $purchase->tax=$_POST["tax"];
        $purchase->tax_amount=$_POST["tax_amount"];
        $purchase->discount=$_POST["discount"];
        $purchase->note=$_POST["purchase_note"];
        $purchase->total_price=$_POST["total_price"];
        $purchase->other_charges=$_POST["other_charges"];
        $purchase->discount_all=$_POST["discount_all"];
        $purchase->grand_total=$_POST["grand_total"];
        $purchase->added_by='rebin';
        $purchase->created_at=date("Y-m-d H:i:s");
        $payment_amount=$_POST['pay_amount'];
        $gtotal=$_POST["grand_total"];
    
        if($payment_amount<0 || $payment_amount == "" || $payment_amount ==null){
            if($payment_amount > $gtotal){
                $purchase->due=0;
            }else{
                $due=$gtotal-$payment_amount;
                $purchase->due=$due;
            }
        }else{
            $purchase->due=$_POST["grand_total"];
        }
        
        // if($_POST["pay_amount"] < $_POST["grand_total"] || $_POST["pay_amount"] == $_POST["grand_total"] || $_POST['pay_amount'] == null){
        //     $purchase->pay_status=1;
        // }else{
        //     $purchase->pay_status=0;
        // }
    
        if($purchase->save()){
            $data=array('success'=>'true',);
            echo json_encode($data);
        }else{
            $data=array('success'=>'false');
            echo json_encode($data);
        }
    
    }

}
if(isset($_POST['edit'])){
    $purchase=Purchase::singleFetch($_POST["purchase_id"]);
    $purchase->supplier=$_POST["supplier_id"];
    $purchase->purchase_date=$_POST["purchase_date"];
    $purchase->status=$_POST["supplier_status"];
    $purchase->ref_num=$_POST["purchase_ref_num"];
    $purchase->total_quantity=$_POST["total_quantity"];
    $purchase->tax=$_POST["tax"];
    $purchase->tax_amount=$_POST["tax_amount"];
    $purchase->discount=$_POST["discount"];
    $purchase->note=$_POST["purchase_note"];
    $purchase->total_price=$_POST["total_price"];
    $purchase->other_charges=$_POST["other_charges"];
    $purchase->discount_all=$_POST["discount_all"];
    $purchase->grand_total=$_POST["grand_total"];
    $purchase->updated_by='rebin';
    $purchase->updated_at=date("Y-m-d H:i:s");
    $payment_amount=$_POST['pay_amount'];
    if($payment_amount>0 || $payment_amount != "" || $payment_amount != null){
        if($payment_amount > $purchase->due){
            $purchase->due=0;
        }else{
            $due=$purchase->due-$payment_amount;
            $purchase->due=$due;
        }
    }else{
        $purchase->due=$_POST["grand_total"];
    }
    
    if($purchase->save()){
        $data=array('success'=>'true',);
        echo json_encode($data);
    }else{
        $data=array('success'=>'false');
        echo json_encode($data);
    }

}

if(isset($_POST['return'])){
    $purchase=Purchase::singleFetch($_POST["purchase_id"]);
    $purchase->return_date=$_POST["return_date"];
    $purchase->return_status=$_POST["return_status"];
    $purchase->total_quantity=$_POST["total_quantity"];
    $purchase->tax=$_POST["tax"];
    $purchase->tax_amount=$_POST["tax_amount"];
    $purchase->discount=$_POST["discount"];
    $purchase->note=$_POST["purchase_note"];
    $purchase->total_price=$_POST["total_price"];
    $purchase->other_charges=$_POST["other_charges"];
    $purchase->discount_all=$_POST["discount_all"];
    $purchase->grand_total=$_POST["grand_total"];
    if($purchase->save()){
        $data=array('success'=>'true',);
        echo json_encode($data);
    }else{
        $data=array('success'=>'false');
        echo json_encode($data);
    }

}


if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $purchase=Purchase::singleFetch($id);
    $purchase_code=$purchase->purchase_code;
    if($purchase->delete()){
        Item::findbyCode($purchase_code)->deleteByCode();
        Payment::findbyCode($purchase_code)->deleteByCode();
        $data = array(
            'success'=>'true',
        );
        echo json_encode($data);
    }else{
        $data = array(
            'success'=>'false',
        );
        echo json_encode($data);
    } 
}





?>