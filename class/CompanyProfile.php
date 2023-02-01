<?php 

class CompanyProfile extends DbObject {
    protected static $table = 'company_profile';
    protected static $table_fields = array(
        'id',
        'name',
        'mobile	',
        'email',
        'phone',
        'gst',
        'vat',
        'pan',
        'website',
        'upi_id',
        'upi_code',
        'bank',
        'country',
        'state',
        'city',
        'postcode',
        'address',
        'logo',
        'added_by',
        'updated_by',
        'created_at',
        'updated_at'
    );

    public $id;
    public $name;
    public $mobile;
    public $email;
    public $phone;
    public $gst;
    public $vat;
    public $pan;
    public $website;
    public $upi_id;
    public $upi_code;
    public $bank;
    public $country;
    public $state;
    public $city;
    public $postcode;
    public $address;
    public $logo;
    public $added_by;
    public $updated_by;
    public $created_at;
    public $updated_at;
    public $upload_folder="assets/img/company_profile";

       
    public function setUpiCode($file){
        if(empty($file) || !$file || !is_array($file)){
            $this->errors[] = "There was no file uploaded here";
            return false;
        }elseif($file['error'] != 0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }else{
            $this->upi_code = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }

    public function uploadUpiCode(){
        if($this->id){
            $this->update();
        } else {
            if(!empty($this->errors)){
                return false;
            }

            if(empty($this->upi_code) || empty($this->tmp_path)){
                $this->errors[]="the file was not avalable";
                return false;
            }
            $target_path=SITE_ROOT.DS.$this->upload_folder.DS.$this->upi_code;

            if(file_exists($target_path)){
                $this->errors[]="The file {$this->upi_code} already exists";
                return false;
            }
            if(move_uploaded_file($this->tmp_path,$target_path)){
                    unset($this->tmp_path);
                    return true;
            }else{
                $this->errors[] = "the file directory probably does not permission";
                return false;
            }
        }
    }
    public function setCompanyLogo($file){
        if(empty($file) || !$file || !is_array($file)){
            $this->errors[] = "There was no file uploaded here";
            return false;
        }elseif($file['error'] != 0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }else{
            $this->logo = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }

    public function uploadCompanyLogo(){
        if($this->id){
            $this->update();
        } else {
            if(!empty($this->errors)){
                return false;
            }

            if(empty($this->logo) || empty($this->tmp_path)){
                $this->errors[]="the file was not avalable";
                return false;
            }
            $target_path=SITE_ROOT.DS.$this->upload_folder.DS.$this->logo;

            if(file_exists($target_path)){
                $this->errors[]="The file {$this->logo} already exists";
                return false;
            }
            if(move_uploaded_file($this->tmp_path,$target_path)){
                    unset($this->tmp_path);
                    return true;
            }else{
                $this->errors[] = "the file directory probably does not permission";
                return false;
            }
        }
    }


}



?>