<div class='ct'>訂單清單</div>
<div>
快速刪除：
<input type="radio" name="type" id="date" checked>依日期
<input type="text" name="deldate" id="deldate">
<input type="radio" name="type" id="movie">依電影
<select name="delmovie" id="delmovie">
    <option value=""></option>
</select>
<button>刪除</button>
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
        <div class='ct' style="width:13.75%;"><button class="del" data-id="<?=$ord['id'];?>">刪除</button></div>
    </div>
    <hr>
<?php
}
?>
</div>