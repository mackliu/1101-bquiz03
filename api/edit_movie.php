<?php include_once "../base.php";


if(!empty($_FILES['trailer']['tmp_name'])){
    move_uploaded_file($_FILES['trailer']['tmp_name'],'../img/'.$_FILES['trailer']['name']);
    $_POST['trailer']=$_FILES['trailer']['name'];
}

if(!empty($_FILES['poster']['tmp_name'])){
    move_uploaded_file($_FILES['poster']['tmp_name'],'../img/'.$_FILES['poster']['name']);
    $_POST['poster']=$_FILES['poster']['name'];
}

$_POST['ondate']=$_POST['year']. "-".$_POST['month']."-".$_POST['day'];
unset($_POST['year']);
unset($_POST['month']);
unset($_POST['day']);
$_POST['sh']=1;
//$_POST['rank']=$Movie->math('max','id')+1;

$Movie->save($_POST);

to('../backend.php?do=movie');