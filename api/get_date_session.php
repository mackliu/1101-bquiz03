<?php include_once "../base.php";

$movie=$Movie->find($_GET['movie']);
$date=$_GET['date'];
$t=strtotime(date("Y-m-d"))+(24*60*60);

if($date!=date("Y-m-d")){
    $s=5;
}else{
    /* if(date("G")<14){
        $s=5;
    }else{
        $s=5-ceil((date("G")-13)/2);
    }
 */
    $s=(date("G")<14)?5:5-ceil((date("G")-13)/2);
}

for($i=(6-$s);$i<=5;$i++){
    $seats=$Ord->math('sum','qt',['name'=>$movie['name'],'date'=>$date,'session'=>$seStr[$i]]);
    echo "<option value='$i'>";
    echo $seStr[$i] . "剩餘座位 ".(20-$seats);
    echo "</option>";
}

