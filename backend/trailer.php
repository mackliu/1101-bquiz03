
<style>
    .trailer-header,.trailer-add,.trailer-body .row{
        display:flex;
        justify-content:space-between;
    }

    .trailer-header .items{
        width:24.75%;
        background:#bbb;
        text-align:center;
        margin:5px 0;
    }
    .trailer-body{
        height:225px;
        overflow:auto;
    }
    .trailer-body .row{
        margin:3px 0;
        text-align:center;
        background:white;
        padding:3px 0;
        align-items:center;
    }
    .row > div{
        width:24.75%;
    }
    .trailer-add > div{
        width:48%;
        margin-top:10px;
    }
    .trailer-btn{
        margin-top:5px;
    }
</style>
<div class="tab">
    <div style="height:320px;width:95%;background:#ccc;padding:5px">
    <div class='ct' style="border:1px solid #666;padding:5px">預告片清單</div>
    <div class="trailer-header">
        <div class='items'>預告片海報</div>
        <div class='items'>預告片片名</div>
        <div class='items'>預告片排序</div>
        <div class='items'>操作</div>
    </div>
    <form action="api/edit_trailer.php" method="post">
    <div class="trailer-body">
    <?php
        $trailers=$Trailer->all(' order by rank');
        foreach($trailers as $key => $trailer){
            if($key > 0 && $key < (count($trailers)-1)){
                $up=$trailer['id']."-".$trailers[$key-1]['id'];
                $down=$trailer['id']."-".$trailers[$key+1]['id'];
            }

            if($key==0){
                $up=$trailer['id']."-".$trailer['id'];
                $down=$trailer['id']."-".$trailers[$key+1]['id'];
            }

            if($key==(count($trailers)-1)){
                $up=$trailer['id']."-".$trailers[$key-1]['id'];
                $down=$trailer['id']."-".$trailer['id'];
            }
    ?> 
        <div class="row">
        <div><img src='img/<?=$trailer['img'];?>' style="width:75px;height:90px;"></div>
        <div><input type="text" name="name[]" value="<?=$trailer['name'];?>"></div>
        <div>
            <input type="button" id="<?=$up;?>" value="往上" class='sw'>
            <input type="button" id="<?=$down;?>" value="往下" class='sw'>
        </div>
        <div>
            <input type="checkbox" name="sh[]" value="<?=$trailer['id'];?>" <?=($trailer['sh']==1)?'checked':'';?>>顯示
            <input type="checkbox" name="del[]" value="<?=$trailer['id'];?>">刪除
            <select name="ani[]">
                <option value="1" <?=($trailer['ani']==1)?'selected':'';?>>淡入淡出</option>
                <option value="2" <?=($trailer['ani']==2)?'selected':'';?>>縮放</option>
                <option value="3" <?=($trailer['ani']==3)?'selected':'';?>>滑入滑出</option>

            </select>
            <input type="hidden" name="id[]" value="<?=$trailer['id'];?>">
        </div>
        </div>
        <?php
    }
    ?>
    </div>
    <div class="ct trailer-btn">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
        
    </div>
</form>
</div>
<hr>
    <div style="height:160px;width:95%;background:#ccc;padding:5px">
    <div class='ct' style="border:1px solid #666;padding:5px">新增預告片海報</div>
    <form action="api/add_trailer.php" method="post" enctype='multipart/form-data'>
        <div class="trailer-add">
            <div>預告片海報：<input type="file" name="img"></div>
            <div>預告片片名：<input type="text" name="name"></div>
        </div>
        <div class="ct trailer-btn">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </form>
    </div>
</div>
<script>

$(".sw").on("click",function(){
    let id=$(this).attr('id').split("-")
    console.log(id);
    $.post('api/sw.php',{id,'table':'trailer'},(res)=>{
        //console.log(res)
        location.reload()
    })
})
</script>