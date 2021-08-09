<?php include_once "../base.php";

$movie=$Movie->find($_GET['movie']);
$ondate=strtotime($movie['ondate']);
$today=strtotime(date("Y-m-d"));
$days=($today-$ondate)/(60*60*24);  //距離上映日期的天數

//3-$days 可上映的日期


for($i=0;$i<(3-$days);$i++){
    $date=date("Y-m-d",strtotime("+$i days",$today));
    $showDate=date("m-d l",strtotime("+$i days",$today));
    echo "<option value='$date'>";
    echo $showDate;
    echo "</option>";
}
