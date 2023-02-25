<?php 

class Sale extends DbObject {
    protected static $table = 'sales';
    protected static $table_fields = array(
        'id',
        'code',
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
        'sale_date',
        'supplier',
        'return',
        'return_status',
        'return_date',
        'due',
        'added_by',
        'updated_by',
        'created_at',
        'updated_at'
    );

    public $id;
    public $code;
    public $other_charges;
    public $total_quantity;
    public $discount_all;
    public $discount;
    public $tax;
    public $tax_amount;
    public $grand_total;
    public $ref_num;
    public $status;
    public $return_status;
    public $return_date;
    public $note;
    public $sale_date;
    public $supplier;
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
        1 => 'code',
        2 => 'other_charges',
        3 => 'total_quantity',
        4 => 'discount_all',
        5 => 'discount',
        6 => 'tax',
        7 => 'tax_amount',
        8 => 'grand_total',
        9 => 'ref_num',
        10 => 'note',
        11 => 'status',
        12 => 'sale_date',
        13 => 'supplier',
        14 => 'return',
        15 => 'return_status',
        16 => 'return_date',
        17 => 'due',
        18 => 'added_by',
        19 => 'updated_by',
        20 => 'created_at',
        21 => 'updated_at'
    );

    if(isset($_POST['search']['value'])){
        $search_value=$_POST['search']['value'];
        $sql .=" WHERE sale_date like '%".$search_value."%'";
        $sql .=" OR code like '%".$search_value."%'";
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
        $sub_array[]=$row['sale_date'];
        if($row['return_status']=="return"){
            $sub_array[]=$row['code'].' '.'<span class="badge bg-label-warning " title="گەڕێندراوەتەوە"><i class="ti ti-arrow-back-up fs-6"></i></span>';
        }elseif($row['return_status']=="cancel"){
            $sub_array[]=$row['code'].' '.'<span class="badge bg-label-danger" title="ڕەتکراوەتەوە"><i class="ti ti-file-x fs-6"></i></span>'; 
        }else{
            $sub_array[]=$row['code'];
        }

        if($row['due'] > 0 && $row['due'] < $row['grand_total']){
            $sub_array[]='<span class="badge bg-label-warning">بەشێکی ماوە</span>';
        }elseif($row['due'] <= 0 ){
            $sub_array[]='<span class="badge bg-label-success">هەمووی دراوە</span>';
        }else{
            $sub_array[]='<span class="badge bg-label-danger">هیچی نە دراوە</span>';
        }
        $sub_array[]=$row['ref_num'];
        $sub_array[]=$row['grand_total'];
        $sub_array[]=$row['due'];
        $sub_array[]=$row['added_by'];
    $sub_array[]='<div class="d-inline-block">
    <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots"></i></a>
        <div class="dropdown-menu dropdown-menu m-0 fs-6">
            <a href="sinvoice.php?id='.$row['code'].'" class="dropdown-item"><i class="ti ti-eye"></i> بینینی کڕین</a>
            <a href="edit_sale.php?id='.$row['code'].'" class="dropdown-item"><i class="ti ti-edit"></i> گۆڕانکاری</a>
            <a href="javascript:;" class="dropdown-item btn_view_payment"><i class="ti ti-cash-banknote"></i> پێشاندانی پارەدان</a>
            <a href="javascript:;" class="dropdown-item btn_pay_now"><i class="ti ti-cash-banknote-off"></i> ئێستا پارەبدە</a>
            <div class="dropdown-divider"></div>
            <a href="javascript:;" class="dropdown-item"><i class="ti ti-printer"></i> چاپکردن</a>
            <a href="javascript:;" class="dropdown-item"><i class="ti ti-file-text"></i> PDF</a>
            <div class="dropdown-divider"></div>
            <a href="return_sale.php?id='.$row['code'].'" class="dropdown-item"><i class="ti ti-arrow-back-up"></i> گەڕاندنەوەی کڕین</a>
            <a href="javascript:;" class="dropdown-item text-danger delete_sale" data-id="'.$row['id'].'"><i class="ti ti-trash"></i> Delete</a>
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