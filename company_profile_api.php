<?php
require_once "configs/initialized.php";


if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $cp=CompanyProfile::singleFetch($id);
    $cp->id=$_POST["id"];
    $cp->name=$_POST["name"];
    $cp->email=$_POST["email"];
    $cp->mobile=$_POST["mobile"];
    $cp->phone=$_POST["phone"];
    $cp->gst=$_POST["gst"];
    $cp->pan=$_POST["pan"];
    $cp->vat=$_POST["vat"];
    $cp->website=$_POST["website"];
    $cp->upi_id=$_POST["upi_id"];
    $cp->setUpiCode($_FILES["upi_code"]);
    $cp->bank=$_POST["bank"];
    $cp->country=$_POST["country"];
    $cp->state=$_POST["state"];
    $cp->city=$_POST["city"];
    $cp->postcode=$_POST["postcode"];
    $cp->address=$_POST["address"];
    $cp->setCompanyLogo($_FILES["logo"]);
    $cp->updated_by = 'rebin';
    $cp->updated_at =date("Y-m-d H:i:s");
    $file_type_logo=strtolower(pathinfo($_FILES['logo']['name'],PATHINFO_EXTENSION));
    $file_type_upi_code=strtolower(pathinfo($_FILES['upi_code']['name'],PATHINFO_EXTENSION));
    if($_FILES['logo']['size'] < $cp->max_size && $_FILES['upi_code']['size'] < $cp->max_size){
    if(in_array($file_type_logo,$cp->allowed_types) && in_array($file_type_upi_code,$cp->allowed_types)){
    if(!file_exists($cp->upload_folder.DS.$cp->logo) && !file_exists($cp->upload_folder.DS.$cp->logo)){
    if($cp->save()){
        $cp->uploadUpiCode();
        $cp->uploadCompanyLogo();
        $data=array('success'=>'true',);
        echo json_encode($data);
    }else{
        $data=array('success'=>'false',);
        echo json_encode($data);
    }
    }else{
        $data=array('errors'=>$cp->errors[]="پێشتر ئەم وێنەیە دانراوە تکایە وێنەیەکی تر بەرزبکەرەوە");
        echo json_encode($data);
    }
    }else{
        $data=array('errors'=>$cp->errors[]="تکایە با جۆری فایلەکە تەنها (jpeg,jpg,png,gif) بێت");
        echo json_encode($data);
    }}else{
        $data=array('errors'=>$cp->errors[]="تکایە با قەبارەی وێنەکە لە (5MB) کەمتربێت");
        echo json_encode($data);
    }
}


?>