<style>

</style>
<div class="tab">
    <div style="height:450px;width:95%;background:#ccc;padding:5px">
        <button onclick="location.href='?do=new_movie'">新增電影</button>
        <hr>
        <div class="movie-body">
        <?php
            $movies=$Movie->all(" order by rank");
            foreach($movies as $key => $movie){
                if($key > 0 && $key < (count($movies)-1)){
                    $up=$movie['id']."-".$movies[$key-1]['id'];
                    $down=$movie['id']."-".$movies[$key+1]['id'];
                }
    
                if($key==0){
                    $up=$movie['id']."-".$movie['id'];
                    $down=$movie['id']."-".$movies[$key+1]['id'];
                }
    
                if($key==(count($movies)-1)){
                    $up=$movie['id']."-".$movies[$key-1]['id'];
                    $down=$movie['id']."-".$movie['id'];
                }
        ?>
        <div style="width:98%;margin:3px auto;background:white;display:flex;align-items:center">
                <div style="width:20%;text-align:center;padding:5px;">
                    <img src="img/<?=$movie['poster'];?>" style="width:80px;height:110px">
                </div>
                <div style="width:20%">
                    分級:<img src='icon/03C0<?=$movie['level'];?>.png' style="width:20px">
                </div>
                <div style="width:80%">
                    <div style="display:flex;">
                        <div style="width:33%">片名:<?=$movie['name'];?></div>
                        <div style="width:33%">片長:<?=$movie['length'];?></div>
                        <div style="width:33%">上映時間:<?=$movie['ondate'];?></div>

                    </div>
                    <div style="text-align:right">
                        <button>顯示</button>
                        <button id="<?=$up;?>" class='sw'>往上</button>
                        <button id="<?=$down;?>" class='sw'>往下</button>
                        <button>編輯電影</button>
                        <button>刪除電影</button>

                    </div>
                    <div>
                        <?=$movie['intro'];?>
                    </div>
                </div>
    
        </div>

        <?php
        }
        ?>
        </div>
    </div>
</div>
<script>
$(".sw").on("click", function() {
    let id = $(this).attr('id').split("-")
    console.log(id);
    $.post('api/sw.php', {id,'table':'movie'}, (res) => {
        //console.log(res)
        location.reload()
    })
})
</script>