<?php 

class User extends DbObject {
    protected static $table = 'users';
    protected static $table_fields = array(
        'id',
        'f_name',
        'l_name',
        'email',
        'password',
        'address',
        'bio',
        'phone1',
        'phone2',
        'image',
        'added_by',
        'updated_by',
        'role',
        'created_at',
        'updated_at'
    );

    public $id;
    public $f_name;
    public $l_name;
    public $email;
    public $password;
    public $address;
    public $bio;
    public $phone1;
    public $phone2;
    public $image;
    public $added_by;
    public $updated_by;
    public $role;
    public $created_at;
    public $updated_at;
    public $image_directory="assets/img/user";
    public $image_placeholder="http://placehold.it/400x400&text=image";

    public function uploadImage($file) {

            // if($this->id){
            //     $this->update();
            // } else {
    
                $target_path=SITE_ROOT.DS.$this->image_directory.DS.$this->image;
    
                if(move_uploaded_file($this->tmp_path,$target_path)){
                        unset($this->tmp_path);
                        return true;
                }else{
                    $this->errors[] = "the file directory probably does not permission";
                    return false;
                }
            // }
    }
    public function image_path_and_placeholder(){
        return empty($this->image) ? $this->image_placeholder : $this->upload_directory.DS.$this->image;
    }
 public static function fetch(){
    global $database;
    $outpu=array();
    $sql="SELECT * FROM ".static::$table;
    $res=$database->connection->query($sql);
    $total_rows=mysqli_num_rows($res);

    $columns=array(
        0 => 'id',
        1 => 'f_name',
        2 => 'l_name',
        3 => 'email',
        4 => 'password',
        5 => 'address',
        6 => 'bio',
        7 => 'phone1',
        8 => 'phone2',
        9 => 'image',
        11 => 'updated_by',
        12 => 'role',
        13 => 'created_at',
        14 => 'updated_at'
    );

    if(isset($_POST['search']['value'])){
        $search_value=$_POST['search']['value'];
        $sql .=" WHERE f_name like '%".$search_value."%'";
        $sql .=" OR l_name like '%".$search_value."%'";
        $sql .=" OR email like '%".$search_value."%'";
        $sql .=" OR phone1 like '%".$search_value."%'";
        $sql .=" OR phone2 like '%".$search_value."%'";
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
            $sub_array[]=$row['f_name']." ".$row['l_name'];
            $sub_array[]=$row['email'];
            $sub_array[]=$row['phone1'];
            $sub_array[]=$row['phone2'];
            $sub_array[]=Role::singleFetch($row['role'])->name;
        $sub_array[]='<a href="javascript:void(0);" data-id="'.$row['id'].'" class="text-info edit_btn_user">
        <i class="ti ti-edit"></i>
        </a> <a href="javascript:void(0);" data-id="'.$row['id'].'" class="text-danger delete_user">
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