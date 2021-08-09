<?php include_once "../base.php";

$movie=$Movie->find($_GET['movie']);
$date=$_GET['date'];
$session=$_GET['session'];


?>

<style>

.room{
    width:540px;
    height:370px;
    background:url('icon/03D04.png');
    margin:auto;
    padding-top:19px;
    box-sizing:border-box;
}
.seats{
    width:315px;
    height:340px;
    margin:auto;
}
.ord-info{
    padding-left:30%;
}
</style>


<div class="room">
<div class="seats">



</div>
</div>

<div class='ord-info'>
<div>您選擇的電影是：<?=$movie['name'];?></div>
<div>您選擇的時刻是：<?=$date;?> <?=$seStr[$session];?></div>
<div>您已經勾選了<span class='tickets'></span>張票，最多可以購買四張票</div>
<div><button onclick='javascript:$("#menu").toggle();$("#booking").toggle()'>上一步</button><button>訂購</button></div>
</div>