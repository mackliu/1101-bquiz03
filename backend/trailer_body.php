
<?php
    include_once "../base.php";
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
            <input type="button" id="<?=$up;?>" value="往上" class='sw' onclick="sw(this)">
            <input type="button" id="<?=$down;?>" value="往下" class='sw' onclick="sw(this)">
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