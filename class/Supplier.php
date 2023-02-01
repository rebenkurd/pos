<?php 

class Supplier extends DbObject {
    protected static $table = 'suppliers';
    protected static $table_fields = array(
        'id',
        'name',
        'mobile',
        'email',
        'gst',
        'tax',
        'open_balance',
        'country',
        'state',
        'city',
        'postcode',
        'status',
        'address',
        'added_by',
        'updated_by',
        'created_at',
        'updated_at'
    );

    public $id;
    public $name;
    public $mobile;
    public $email;
    public $gst;
    public $tax;
    public $open_balance;
    public $country;
    public $state;
    public $city;
    public $postcode;
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
        1 => 'name',
        2 => 'mobile',
        3 => 'email',
        4 => 'gst',
        5 => 'tax',
        6 => 'open_balance',
        7 => 'country',
        8 => 'state',
        9 => 'city',
        10 => 'postcode',
        11 => 'address',
        12 => 'status',
        13 => 'added_by',
        14 => 'updated_by',
        15 => 'created_at',
        16 => 'updated_at'
    );

    if(isset($_POST['search']['value'])){
        $search_value=$_POST['search']['value'];
        $sql .=" WHERE name like '%".$search_value."%'";
        $sql .=" OR mobile like '%".$search_value."%'";
        $sql .=" OR email like '%".$search_value."%'";
        $sql .=" OR status like '%".$search_value."%'";
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
        $sub_array[]=$row['name'];
        $sub_array[]=$row['mobile'];
        $sub_array[]=$row['email'];
        $sub_array[]=$row['status'];

    $sub_array[]='<a href="javascript:void(0);" data-id="'.$row['id'].'" class="text-info edit_btn_supplier">
    <i class="ti ti-edit"></i>
    </a> <a href="javascript:void(0);" data-id="'.$row['id'].'" class="text-danger delete_supplier">
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