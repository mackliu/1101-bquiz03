<h3 class='ct' style="margin:5px 0;padding:5px;border:1px solid #999">新增院線片</h3>
<form action="api/new_movie.php" method="post" enctype="multipart/form-data">
<div style="width:80%;margin:auto">
    <div style="display:flex;width:95%">
        <div>影片資料</div>
        <div style="width:80%;">
            <table>
                <tr>
                    <td>片名：</td>
                    <td><input type="text" name="name" vlaue=""></td>
                </tr>
                <tr>
                    <td>分級</td>
                    <td>
                        <select name="level">
                            <option value="1">普遍級</option>
                            <option value="2">輔導級</option>
                            <option value="3">保護級</option>
                            <option value="4">限制級</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>片長</td>
                    <td><input type="number" name="length" value=""></td>
                </tr>
                <tr>
                    <td>上映日期</td>
                    <td>
                        <select name="year">
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>年
                        
                        <select name="month">
                            <?php 
                            for($i=1;$i<=12;$i++){
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>月

                        <select name="day">
                        <?php 
                            for($i=1;$i<=31;$i++){
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>日

                    </td>
                </tr>
                <tr>
                    <td>發行商</td>
                    <td><input type="text" name="publish" value=""></td>
                </tr>
                <tr>
                    <td>導演</td>
                    <td><input type="text" name="director" value=""></td>
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
            <textarea name="intro" style="width:98%;height:60px"></textarea>
        </div>
    </div>
</div>
<div class="ct">
        <input type="submit" value="新增"><input type="reset" value="重置">                    

</div>
</form>