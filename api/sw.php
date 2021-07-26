<?php include_once "../base.php";

$row1=$Trailer->find($_POST['id'][0]);
$row2=$Trailer->find($_POST['id'][1]);
$temp=$row1['rank'];
$row1['rank']=$row2['rank'];
$row2['rank']=$temp;

$Trailer->save($row1);
$Trailer->save($row2);