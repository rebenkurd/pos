<?php
require_once "configs/initialized.php";



if(isset($_POST['fetch'])){
    $user=new User();
    echo $user->fetch();
}

if(isset($_POST['get'])){
    $id=$_POST['id'];
    $user=User::singleFetch($id);
    echo json_encode($user);
}

if(isset($_POST['edit'])){
        
    $id = $_POST['id'];

    $user=User::singleFetch($id);
    $user->id=$_POST["id"];
    $user->f_name=$_POST["fname"];
    $user->l_name=$_POST["lname"];
    $user->email=$_POST["email"];
    $user->role=$_POST["role"];
    $user->password=md5($_POST["password"]);
    $user->phone1=$_POST["phone1"];
    $user->phone2=$_POST["phone2"];
    $user->address=$_POST["address"];
    $user->bio=$_POST["bio"];
    $user->updated_by = 'rebin';
    $user->updated_at =date("Y-m-d H:i:s");

    if($user->save()){
        $data = array(
            'success'=>'true',
        );
        echo json_encode($data);
    }
    else{
        $data = array(
            'success'=>'false',
        );
        echo json_encode($data);
    } 
}


if(isset($_POST['add'])){
    $user=new User();
    $user->f_name=$_POST["fname"];
    $user->l_name=$_POST["lname"];
    $user->email=$_POST["email"];
    $user->role=$_POST["role"];
    $user->password=md5($_POST["password"]);
    $user->phone1=$_POST["phone1"];
    $user->phone2=$_POST["phone2"];
    $user->address=$_POST["address"];
    $user->added_by='rebin';
    $user->created_at=date("Y-m-d H:i:s");
    $user->setUserImage($_FILES['image']);
    $file_type=strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));

    if($_FILES['image']['size'] < $user->max_size){
    if(in_array($file_type,$user->allowed_types)){
    if(!file_exists($user->upload_folder.DS.$user->image)){
    if($user->save()){
        $user->uploadUserPhoto();
        $data=array('success'=>'true',);
        echo json_encode($data);
    }else{
        $data=array('success'=>'false',);
        echo json_encode($data);
    }
    }else{
        $data=array('errors'=>$user->errors[]="پێشتر ئەم وێنەیە دانراوە تکایە وێنەیەکی تر بەرزبکەرەوە");
        echo json_encode($data);
    }
    }else{
        $data=array('errors'=>$user->errors[]="تکایە با جۆری فایلەکە تەنها (jpeg,jpg,png,gif) بێت");
        echo json_encode($data);
    }}else{
        $data=array('errors'=>$user->errors[]="تکایە با قەبارەی وێنەکە لە (5MB) کەمتربێت");
        echo json_encode($data);
    }
        }


if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $user=User::singleFetch($id);
    if($user->delete()){
        $user->deleteImage();
        $data = array(
            'success'=>'true',
        );
        echo json_encode($data);
    }
    else{
        $data = array(
            'success'=>'false',
        );
        echo json_encode($data);
    } 
}

?>