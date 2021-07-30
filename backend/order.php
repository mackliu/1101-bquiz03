<div class='ct'>訂單清單</div>
<div>
快速刪除：
<input type="radio" name="type" value="date" checked>依日期
<input type="text" name="deldate" id="deldate">
<input type="radio" name="type" value="movie">依電影
<select name="delmovie" id="delmovie">
    <?php
        $movies=$Ord->all(" group by name");
        foreach($movies as $movie){
    ?>
    <option value="<?=$movie['name'];?>"><?=$movie['name'];?></option>
    <?php
    }
    ?>
</select>
<button onclick="qdel()">刪除</button>
</div>


<div style="display:flex;justify-content:space-between;width:95%">
    <div class='ct' style="width:13.75%;background:#ccc">訂單編號</div>
    <div class='ct' style="width:13.75%;background:#ccc">電影名稱</div>
    <div class='ct' style="width:13.75%;background:#ccc">日期</div>
    <div class='ct' style="width:13.75%;background:#ccc">場次時間</div>
    <div class='ct' style="width:13.75%;background:#ccc">訂購數量</div>
    <div class='ct' style="width:13.75%;background:#ccc">訂購位置</div>
    <div class='ct' style="width:13.75%;background:#ccc">操作</div>
</div>
<div style="height:450px;width:95%;background:#eee;overflow:auto">
<?php
$ords=$Ord->all(" order by no desc");
foreach($ords as $ord){
?>
    <div style="display:flex;justify-content:space-between;background:#eee">
        <div class='ct' style="width:13.75%;"><?=$ord['no'];?></div>
        <div class='ct' style="width:13.75%;"><?=$ord['name'];?></div>
        <div class='ct' style="width:13.75%;"><?=$ord['date'];?></div>
        <div class='ct' style="width:13.75%;"><?=$ord['session'];?></div>
        <div class='ct' style="width:13.75%;"><?=$ord['qt'];?></div>
        <div class='ct' style="width:13.75%;">
            <?php
                $seats=unserialize($ord['seats']);
                foreach($seats as $s){
                    echo (floor($s/5)+1)."排";
                    echo ($s%5+1) . "號";
                    echo "<br>";
                }
            ?>
        
        </div>
        <div class='ct' style="width:13.75%;"><button class="del-btn" data-id="<?=$ord['id'];?>">刪除</button></div>
    </div>
    <hr>
<?php
}
?>
</div>

<script>

function qdel(){
    let type=$("input[name='type']:checked").val();
    let target;
    switch(type){
        case 'date':
            target=$("#deldate").val();
        break;
        case 'movie':
            target=$("#delmovie").val();
        break;
    }

    let chk=confirm(`你是否確認要刪除所有${target}的訂單?`)

    if(chk){
        $.post('api/qdel.php',{type,target},()=>{
            location.reload()
        })
    }

}


$(".del-btn").on("click",function(){
    let id=$(this).data('id')
    $.post("api/del.php",{'table':'ord',id},()=>{
        location.reload();
    })
})
</script>