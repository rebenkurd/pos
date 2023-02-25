<?php 

class Payment extends DbObject {
    protected static $table = 'payments';
    protected static $table_fields = array(
        'id',
        'pay_amount',
        'pay_type',
        'pay_note',
        'code',
        'added_by',
        'updated_by',
        'created_at',
        'updated_at'
    );

    public $id;
    public $pay_amount;
    public $pay_type;
    public $pay_note;
    public $code;
    public $added_by;
    public $updated_by;
    public $created_at;
    public $updated_at;




    public static function fetchPayment($code){
        global $database;
        $outpu=array();
        $sql="SELECT * FROM ".static::$table;
        $res=$database->connection->query($sql);
        $total_rows=mysqli_num_rows($res);
    
        $columns=array(
            0 => 'id',
            1 => 'pay_amount',
            2 => 'pay_type',
            3 => 'pay_note',
            4 => 'code',
            5 => 'added_by',
            6 => 'updated_by',
            7 => 'created_at',
            8 => 'updated_at'
        );
    
        if(isset($_POST['search']['value'])){
            $search_value=$_POST['search']['value'];
            $sql .=" WHERE created_at like '%".$search_value."%'";
            $sql .=" OR pay_type like '%".$search_value."%'";
            $sql .=" OR pay_amount like '%".$search_value."%'";
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
            if($row['code']==$code){
            $sub_array=array();
            $sub_array[]=$row['id'];
            $sub_array[]=$row['created_at'];
            $sub_array[]=$row['pay_type'];
            $sub_array[]=$row['pay_note'];
            $sub_array[]=$row['pay_amount'];
            $sub_array[]='<a href="javascript:void(0);" data-id="'.$row['id'].'" class="text-danger delete_payment">
            <i class="ti ti-trash"></i>
            </a>';
            $data[]=$sub_array;
            }
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