<?php 

class Purchase extends DbObject {
    protected static $table = 'purchases';
    protected static $table_fields = array(
        'id',
        'purchase_code',
        'other_charges',
        'total_quantity',
        'discount_all',
        'discount',
        'tax',
        'tax_amount',
        'grand_total',
        'ref_num',
        'note',
        'status',
        'purchase_date',
        'supplier',
        'pay_status',
        'due',
        'added_by',
        'updated_by',
        'created_at',
        'updated_at'
    );

    public $id;
    public $purchase_code;
    public $other_charges;
    public $total_quantity;
    public $discount_all;
    public $discount;
    public $tax;
    public $tax_amount;
    public $grand_total;
    public $ref_num;
    public $status;
    public $pay_status;
    public $note;
    public $purchase_date;
    public $supplier;
    public $payment;
    public $due;
    public $added_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    

 public static function fetch(){
    global $database;
    $outpu=array();
    $sql="SELECT * FROM ".static::$table;
    $res=$database->connection->query($sql);
    $total_rows=mysqli_num_rows($res);

    $columns=array(
        0 => 'id',
        1 => 'purchase_date',
        2 => 'purchase_code',
        3 => 'pay_status',
        4 => 'ref_num',
        5 => 'grand_total',
        6 => 'due',
        7 => 'added_by',
        // 7 => 'unit_cost',
        // 8 => 'total_amount',
        // 9 => 'code',
        // 10 => 'status',
        // 10 => 'purchase_date',
        // 11 => 'supplier',
        // 12 => 'payment',
        // 13 => 'added_by',
        // 14 => 'updated_by',
        // 15 => 'created_at',
        // 16 => 'updated_at'
    );

    if(isset($_POST['search']['value'])){
        $search_value=$_POST['search']['value'];
        $sql .=" WHERE purchase_date like '%".$search_value."%'";
        $sql .=" OR purchase_code like '%".$search_value."%'";
        $sql .=" OR pay_status like '%".$search_value."%'";
        $sql .=" OR ref_num like '%".$search_value."%'";
        $sql .=" OR grand_total like '%".$search_value."%'";

    }

    if(isset($_POST['order'])){
        $column_name=$_POST['order'][0]['column'];
        $order=$_POST['order'][0]['dir'];
        $sql .=" ORDER BY ".$columns[$column_name]." ".$order." ";
    }else{
        $sql.=" ORDER BY id DESC ";
    }

    if($_POST['length'] !=-1){
        $start=$_POST['start'];
        $length=$_POST['length'];
        $sql .=" LIMIT ".$start.", ".$length;
    }

    $query=$database->connection->query($sql);
    $count_rows=mysqli_num_rows($query);
    $data=array();
    while($row=mysqli_fetch_assoc($query)){
        $sub_array=array();
        $sub_array[]=$row['id'];
        $sub_array[]=$row['purchase_date'];
        $sub_array[]=$row['purchase_code'];
        $sub_array[]=$row['due'] <= 0 ? '<span class="badge bg-label-success">پارە دراوە</span>' : '<span class="badge bg-label-danger">پارە نەدراوە</span>';
        $sub_array[]=$row['ref_num'];
        $sub_array[]=$row['grand_total'];
        $sub_array[]=$row['due'];
        $sub_array[]=$row['added_by'];
    $sub_array[]='<div class="d-inline-block">
    <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots"></i></a>
        <div class="dropdown-menu dropdown-menu m-0 fs-6">
            <a href="invoice.php?id='.$row['purchase_code'].'" class="dropdown-item"><i class="ti ti-eye"></i> بینینی کڕین</a>
            <a href="edit_purchase.php?id='.$row['purchase_code'].'" class="dropdown-item"><i class="ti ti-edit"></i> گۆڕانکاری</a>
            <a href="view_payment.php?id='.$row['purchase_code'].'" class="dropdown-item"><i class="ti ti-cash-banknote"></i> پێشاندانی پارەدان</a>
            <a href="javascript:;" class="dropdown-item btn_pay_now"><i class="ti ti-cash-banknote-off"></i> ئێستا پارەبدە</a>
            <div class="dropdown-divider"></div>
            <a href="javascript:;" class="dropdown-item"><i class="ti ti-printer"></i> چاپکردن</a>
            <a href="javascript:;" class="dropdown-item"><i class="ti ti-file-text"></i> PDF</a>
            <div class="dropdown-divider"></div>
            <a href="return_purchase.php?id='.$row['purchase_code'].'" class="dropdown-item"><i class="ti ti-arrow-back-up"></i> گەڕاندنەوەی کڕین</a>
            <a href="javascript:;" class="dropdown-item text-danger delete_purchase" data-id="'.$row['id'].'"><i class="ti ti-trash"></i> Delete</a>
        </div>
    </div>';
    $data[]=$sub_array;

    }

    $output=array(
        'draw'=>intval($_POST['draw']),
        'recordsTotal'=>$count_rows,
        'recordsFiltered'=>$total_rows,
        'data'=>$data,
    );

    echo json_encode($output);

}

    

}



?>