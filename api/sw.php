<?php include_once "../base.php";

$db=new DB($_POST['table']);

$row1=$db->find($_POST['id'][0]);
$row2=$db->find($_POST['id'][1]);
$temp=$row1['rank'];
$row1['rank']=$row2['rank'];
$row2['rank']=$temp;

$db->save($row1);
$db->save($row2);