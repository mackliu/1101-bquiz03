<?php include_once "../base.php";

sort($_POST['seats']);
$_POST['seats']=serialize($_POST['seats']);
$_POST['no']=date("Ymd") . sprintf("%04d",($Ord->math('max','id')+1));
$Ord->save($_POST);
echo $_POST['no'];
