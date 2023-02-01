<?php 

class Purchase extends DbObject {
    protected static $table = 'purchases';
    protected static $table_fields = array(
        'id',
        'purchase_code',
        'other_charges	',
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
        'payment',
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
    public $note;
    public $purchase_date;
    public $supplier;
    public $payment;
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
        3 => 'status',
        4 => 'ref_num',
        5 => 'grand_total',
        6 => 'added_by',
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
        $sql .=" OR status like '%".$search_value."%'";
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
        $sub_array[]=$row['status'];
        $sub_array[]=$row['ref_num'];
        $sub_array[]=$row['grand_total'];
        $sub_array[]=$row['added_by'];

    $sub_array[]='<a href="javascript:void(0);" data-id="'.$row['id'].'" class="text-info edit_btn_custom">
    <i class="ti ti-edit"></i>
    </a> <a href="javascript:void(0);" data-id="'.$row['id'].'" class="text-danger delete_custom">
    <i class="ti ti-trash"></i>
    </a>
    ';
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