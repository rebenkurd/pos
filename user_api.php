
<?php
require_once "configs/initialized.php";



if(isset($_POST['fetch'])){
    echo User::fetch();
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
    $user->bio=$_POST["bio"];
    $user->added_by='rebin';
    $user->created_at=date("Y-m-d H:i:s");
    $user->set_file($_FILES['image']);
    if($user->image_path_and_placeholder()){
        $data=array('success'=>'true',);
        echo json_encode($data);
    }else{
        $data=array('success'=>'false',);
        echo json_encode($data);
    }
}


if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $user=User::singleFetch($id);
    if($user->delete()){
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