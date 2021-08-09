<?php 

$no=$_GET['no'];
$ord=$Ord->find(['no'=>$no]);

?>

<style>
.ord-form {
    width: 50%;
    margin: auto;
    background: #ddd;
    padding: 20px;
    border: 1px solid #555;
}

.ord-form>div:nth-child(odd) {
    background: #bbb;
}

.ord-form>div:nth-child(even) {
    background: #999;
}

.ord-form>div {
    border: 1px solid #555;
    margin: 2px;
    padding: 0 5px;
}
.right-line{
    border-right:1px solid #555;
}

</style>
<div class="ord-form">
<div>感謝您的訂購，您的訂單編號是：<?=$no;?></div>
<div>
    <span class='right-line'>電影名稱:</span>
    <span><?=$ord['name'];?></span>
</div>
<div>
    <span class='right-line'>日期:</span>
    <span><?=$ord['date'];?></span>
</div>
<div>
    <span class='right-line'>場次時間:</span>
    <span><?=$ord['session'];?></span>
</div>
<div>
    座位：<br>
    <?php
    $seats=unserialize($ord['seats']);
    foreach($seats as $seat){
       echo  floor($seat/5)+1 . "排". (($seat%5)+1) ."號<br>";
    }
    ?>

    共<?=$ord['qt'];?>張電影票

</div>
<div class='ct'>
    <button onclick="location.href='index.php'">確認</button>
</div>



</div>


