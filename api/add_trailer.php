<?php include_once "../base.php";

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
    $data['img']=$_FILES['img']['name'];
}

$data['sh']=1;
$data['rank']=$Trailer->math('max','id')+1;
$data['name']=$_POST['name'];
$data['ani']=rand(1,3);

$Trailer->save($data);


to("../backend.php?do=trailer");