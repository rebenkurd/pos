

<?php

class UploadImage{


private $image_name;
private $image_type;
private $image_size;
private $image_temp;
private $upload_folder="img";
private $upload_max_size=1024000000; //2mg

private $allowed_image_type=["image/jpeg","image/jpg","image/png","image/gif"];

public $error;

public function __construct($files) { 

    $this->image_name=$files['name'];
    $this->image_temp=$files['tmp_name'];
    $this->image_size=$files['size'];
    $this->image_type=$files['type'];
    
    $this->isImage();
    $this->imageNameValidation();
    $this->sizeValidation();
    $this->checkFile();

    if($this->error==null){
        $this->movieFile();
    }
    if($this->error==null){
        $this->recordImage();
    }

}

private function isImage(){

    $finfo=finfo_open(FILEINFO_MIME_TYPE);
    $mime=finfo_file($finfo,$this->image_temp);
    if(!in_array($mime,$this->allowed_image_type)){
        return $this->error='only [.jpeg, .jpg, .png and .gif]  file are allowed';
    }
    finfo_close($finfo);
}

private function imageNameValidation(){
    return $this->image_name=filter_var($this->image_name,FILTER_SANITIZE_STRING);
}

private function sizeValidation(){
    if($this->image_size==$this->upload_max_size){
        return $this->error='file is bigger than 2mb';
    }
}

private function checkFile(){
    if(file_exists($this->upload_folder.$this->image_name)){
        return $this->error="file already exists in folder";
    }
}

private function movieFile(){
    if(!move_uploaded_file($this->image_temp,$this->upload_folder.$this->image_name)){
        return $this->error='there was an error, please try again';
    }
}

private function recordImage(){
    $mysqli=new mysqli('localhost','root','','super-pos');

    $mysqli->query("INSERT INTO image_upload(name) VALUES('$this->image_name')");
    if($mysqli->affected_rows != 1){
        if(file_exists($this->upload_folder.$this->image_name)){
            unlink($this->upload_folder.$this->image_name);
        }
        return $this->error="there was error, p;ease try again!";
    }

}

}