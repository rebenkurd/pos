<?php 


class DbObject{
    public $allowed_types = array("jpeg","jpg" ,"png","gif");
    public $max_size=5242880;//5MB
    public $errors=array();
    public $upload_errors_array=array(
        UPLOAD_ERR_OK => "There is No Error",
        UPLOAD_ERR_INI_SIZE => "the uploaded file exceeds the upload_mix_filesize directive",
        UPLOAD_ERR_FORM_SIZE =>  "the uploaded file exceeds the MIX_FILE_SIZE directive that",
        UPLOAD_ERR_PARTIAL => "the uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE  => "no file was uploaded" ,
        UPLOAD_ERR_NO_TMP_DIR => "missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE =>  "faield to write file to disk.",
        UPLOAD_ERR_EXTENSION  =>  "A PHP extention stopped the file upload.",
    );


    public function deleteImage(){
        return unlink($this->upload_folder.DS.$field);
    }


    public static function fetchAll(){
        global $database;
        return static::findByQuery("SELECT * FROM ".static::$table." ORDER BY id DESC");
    }

    
    public static function numRows(){
        global $database;
        $res= $database->query("SELECT * FROM ".static::$table);
        return mysqli_num_rows($res);
    }


    public static function singleFetch($id){
        global $database;
        $the_result_array=static::findByQuery("SELECT * FROM ".static::$table." WHERE id='$id' LIMIT 1");
        return !empty($the_result_array)?array_shift($the_result_array):false;
    }
    public static function findbyCode($code){
        global $database;
        $the_result_array=static::findByQuery("SELECT * FROM ".static::$table." WHERE purchase_code='$code' LIMIT 1");
        return !empty($the_result_array)?array_shift($the_result_array):false;
    }

    
    public static function findByQuery($sql){
        global $database;
        $result_set=$database->query($sql);
        $the_object_array=array();
        while($row=mysqli_fetch_array($result_set)){
            $the_object_array[]=static::instantation($row);
        }
        return $the_object_array;
    }



    public static function instantation($the_record){
        $calling_class=get_called_class();
        $the_object=new $calling_class;
        foreach($the_record as $the_attribute => $value){
            if($the_object->hasTheAttribute($the_attribute)){
                $the_object->$the_attribute=$value;
            }
        }
        return $the_object;
    }


    private function hasTheAttribute($the_attribute)
    {
        $the_properties=get_object_vars($this);
        return array_key_exists($the_attribute,$the_properties);
    }

    protected function properties(){
        $properties=array();
        foreach(static::$table_fields as $field){
            if(property_exists($this,$field)){
                $properties[$field]=$this->$field;
            }
        }
        return $properties;
    }

    protected function cleanProperties(){
        global $database;
        $clean_properties=array();
        foreach($this->properties() as $key => $value){
            $clean_properties[$key]=$database->es($value);
        }
        return $clean_properties;
    }



    public function save(){
        return isset($this->id)?$this->update():$this->create();
    }


    public function create(){
        global $database;
        $properties=$this->properties();
        $sql="INSERT INTO ".static::$table."(".implode(",",array_keys($properties)).")";
        $sql .="VALUES('".implode("','",array_values($properties))."')";

        if($database->query($sql)){
            return true;
        }else{
            return false;
        }    
    }


    public function update(){
        global $database;
        $properties=$this->properties();
        $properties_pairs=array();
        foreach($properties as $key => $value){
            $properties_pairs[]="{$key}='{$value}'";
        }

        $sql="UPDATE ".static::$table." SET ";
        $sql .=implode(", ",$properties_pairs);
        $sql .=" WHERE id='".$database->es($this->id)."'";
        $database->query($sql);

        return (mysqli_affected_rows($database->connection)==1)?true:false;
    }

    public function delete(){
        global $database;
        $sql = "DELETE FROM ".static::$table." WHERE id='".$database->es($this->id)."' LIMIT 1";
        $database->query($sql);

        return (mysqli_affected_rows($database->connection)==1)?true:false;
    }

    



}