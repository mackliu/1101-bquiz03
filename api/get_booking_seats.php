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
    display:flex;
    flex-wrap:wrap;
}
.ord-info{
    padding-left:30%;
}

.seat {
    width: 20%;
    flex-shrink: 0;
    text-align: center;
    position: relative;
}

.seat input {
    display: block;
    position: absolute;
    right: 5px;
    bottom: 5px;
}

.null {
    background: url('icon/03D02.png');
    background-position: center;
    background-repeat: no-repeat;
}
.booked {
    background: url('icon/03D03.png');
    background-position: center;
    background-repeat: no-repeat;
}
</style>


<div class="room">
    <div class="seats">
        <?php
            for($i=0;$i<20;$i++){
                
                echo "<div class='seat null'>";
                echo "<span>";
                echo floor($i/5)+1 . "排". (($i%5)+1) ."號";
                echo "</span>";
                echo "<input type='checkbox' name='book' value='$i'>";
                echo "</div>";
            }
        ?>
    </div>
</div>

<div class='ord-info'>
<div>您選擇的電影是：<?=$movie['name'];?></div>
<div>您選擇的時刻是：<?=$date;?> <?=$seStr[$session];?></div>
<div>您已經勾選了<span class='tickets'></span>張票，最多可以購買四張票</div>
<div>
    <button onclick='javascript:$("#menu").toggle();$("#booking").toggle()'>上一步</button>
    <button onclick="checkout()">訂購</button>
</div>
</div>


<script>
let count=0;
let seats=new Array();
$(".seat input").on("click",function(){
    let seat=$(this).val();
    
    switch($(this).prop("checked")){
        case true:
            if(count>=4){
                alert("最多只能勾選四張票")
                $(this).prop("checked",false)
            }else{
                count++;
                seats.push(seat)
            }
        break;
        case false:
            count--
            seats.splice(seats.indexOf(seat),1)
        break;
    }
    
    $(".tickets").text(count)

})

function checkout(){
    $.post("api/checkout.php",
            {'name':'<?=$movie['name'];?>',
             'date':'<?=$date;?>',
             'session':'<?=$seStr[$session];?>',
             'qt':count,
             seats},
             (no)=>{
                 //console.log(no)
                location.href='?do=checkout&no='+no
             })
}



</script>