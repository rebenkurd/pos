 
<?php

require_once "configs/initialized.php";

if(isset($_POST['fetch'])){
    echo Purchase::fetch();
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
        echo '<input type="hidden" name="item_id[]" id="item_id"value="'.$item->id.'">';
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
    echo Custom::search($_POST['query']);
}


if(isset($_POST['add'])){
    $purchase=new Purchase();
    $purchase->purchase_code=$_POST["purchase_code"];
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
    if($purchase->delete()){
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