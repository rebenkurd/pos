<?php 

class Custom extends DbObject {
    protected static $table = 'customs';
    protected static $table_fields = array(
        'id',
        'barcode',
        'name',
        'category',
        'price',
        'tax',
        'tax_type',
        'purchase_price',
        'profit_margin',
        'sales_price',
        'final_price',
        'quantity',
        'unit',
        'brand',
        'image',
        'mf_date',
        'ex_date',
        'debt',
        'discount',
        'discount_type',
        'status',
        'added_by',
        'updated_by',
        'created_at',
        'updated_at'
    );

    public $id;
    public $barcode;
    public $name;
    public $category;
    public $price;
    public $tax;
    public $tax_type;
    public $purchase_price;
    public $profit_margin;
    public $sales_price;
    public $final_price;
    public $quantity;
    public $mf_date;
    public $ex_date;
    public $brand;
    public $unit;
    public $debt;
    public $discount;
    public $discount_type;
    public $status;
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
        1 => 'barcode',
        2 => 'name',
        3 => 'category',
        4 => 'price',
        5 => 'tax',
        6 => 'tax_type',
        7 => 'purchase_price',
        8 => 'profit_margin',
        9 => 'sales_price',
        10 => 'final_price',
        11 => 'quantity',
        12 => 'unit',
        13 => 'brand',
        14 => 'image',
        15 => 'mf_date',
        16 => 'ex_date',
        17 => 'debt',
        18 => 'discount',
        19 => 'discount_type',
        20 => 'status',
        21 => 'added_by',
        22 => 'updated_by',
        23 => 'created_at',
        24 => 'updated_at'
    );

    if(isset($_POST['search']['value'])){
        $search_value=$_POST['search']['value'];
        $sql .=" WHERE barcode like '%".$search_value."%'";
        $sql .=" OR name like '%".$search_value."%'";
        $sql .=" OR price like '%".$search_value."%'";
        $sql .=" OR quantity like '%".$search_value."%'";
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
        $sub_array[]=$row['barcode'];
        $sub_array[]=$row['name'];
        $sub_array[]=Brand::singleFetch($row['brand'])->name;
        $sub_array[]=Category::singleFetch($row['category'])->name;
        $sub_array[]=$row['unit'];
        $sub_array[]=$row['quantity']>20? '<span class="badge bg-label-success">'.$row['quantity'].'</span>' : '<span class="badge bg-label-danger">'.$row['quantity'].'</span>';
        $sub_array[]=number_format($row['price'],0)." دینار";
        $sub_array[]=$row['final_price'];
        $sub_array[]=$row['tax'];
        $sub_array[]=$row['debt']== 0 ? '<span class="badge bg-label-success">نەخێر</span>' : '<span class="badge bg-label-danger">بەڵێ</span>';
        $sub_array[]=$row['status']== 0 ? '<span class="badge bg-label-success">چالاکە</span>' : '<span class="badge bg-label-danger">ناچالاکە</span>';

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