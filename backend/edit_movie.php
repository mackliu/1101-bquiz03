<?php
$row=$Movie->find($_GET['id']);
$year=mb_substr($row['ondate'],0,4);
$month=mb_substr($row['ondate'],5,2);
$day=mb_substr($row['ondate'],8,2);
?>

<h3 class='ct' style="margin:5px 0;padding:5px;border:1px solid #999">編輯院線片</h3>
<form action="api/edit_movie.php" method="post" enctype="multipart/form-data">
<div style="width:80%;margin:auto">
    <div style="display:flex;width:95%">
        <div>影片資料</div>
        <div style="width:80%;">
            <table>
                <tr>
                    <td>片名：</td>
                    <td><input type="text" name="name" value="<?=$row['name'];?>"></td>
                </tr>
                <tr>
                    <td>分級</td>
                    <td>
                        <select name="level">
                            <option value="1" <?=($row['level']==1)?'selected':'';?>>普遍級</option>
                            <option value="2" <?=($row['level']==2)?'selected':'';?>>輔導級</option>
                            <option value="3" <?=($row['level']==3)?'selected':'';?>>保護級</option>
                            <option value="4" <?=($row['level']==4)?'selected':'';?>>限制級</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>片長</td>
                    <td><input type="number" name="length" value="<?=$row['length'];?>"></td>
                </tr></td>
                </tr>
                <tr>
                    <td>上映日期</td>
                    <td>
                        <select name="year">
                            <option value="2021" <?=($year==2021)?'selected':'';?>>2021</option>
                            <option value="2022" <?=($year==2022)?'selected':'';?>>2022</option>
                        </select>年
                        
                        <select name="month">
                            <?php 
                            for($i=1;$i<=12;$i++){
                                $sel=($month==$i)?'selected':'';
                                echo "<option value='$i' $sel>$i</option>";
                            }
                            ?>
                        </select>月

                        <select name="day">
                        <?php 
                            for($i=1;$i<=31;$i++){
                                $sel=($month==$i)?'selected':'';
                                echo "<option value='$i' $sel>$i</option>";
                            }
                            ?>
                        </select>日

                    </td>
                </tr>
                <tr>
                    <td>發行商</td>
                    <td><input type="text" name="publish" value="<?=$row['publish'];?>"></td>
                </tr>
                <tr>
                    <td>導演</td>
                    <td><input type="text" name="director" value="<?=$row['director'];?>"></td>
                </tr>
                <tr>
                    <td>預告影片</td>
                    <td><input type="file" name="trailer" value=""></td>
                </tr>
                <tr>
                    <td>電影海報</td>
                    <td><input type="file" name="poster" value=""></td>
                </tr>
            </table>
        </div>
    </div>
    <div style="display:flex;width:95%">
        <div>劇情簡介</div>
        <div style="width:80%;">
            <textarea name="intro" style="width:98%;height:60px"><?=$row['intro'];?></textarea>
        </div>
    </div>
</div>
<div class="ct">
        <input type="submit" value="編輯"><input type="reset" value="重置">                    
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
</div>
</form>