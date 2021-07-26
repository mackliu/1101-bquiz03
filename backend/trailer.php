
<style>
    .trailer-header,.trailer-add{
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
    .trailer-add > div{
        width:48%;
        margin-top:10px;
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
    <div class="trailer-body">
    <?php
        $trailers=$Trailer->all(['sh'=>1],' order by rank');
        foreach($trailers as $trailer){
    ?>
        <div><?=$trailer['img'];?></div>
        <div><?=$trailer['name'];?></div>
        <div><?=$trailer['rank'];?></div>
        <div>操作</div>
    </div>
    <?php
    }
    ?>
    <div class="ct trailer-btn">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">

    </div>
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