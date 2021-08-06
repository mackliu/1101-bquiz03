<style>
.posters{
    width:210px;
    height:280px;
    margin:0 auto 10px auto;
    /* margin-bottom:10px; */
    position: relative;
}

.po{
    position:absolute;
    text-align:center;
    display:none;
}
.po img{
 width:100%;
 height:260px;
 
}
.btns{
    width:410px;
    height:120px;
    position: relative;
    display:flex;
    align-items:center;
}

.arrow{
   border:20px solid transparent;
   width:0;
   cursor:pointer;
}
.left{
    border-right:20px solid black;
}
.right{
    border-left:20px solid black;
}
.thumbs{
    width:320px;
    overflow:hidden;
    position:relative;
    display:flex;
}
.thumb{
    width:80px;
    padding:5px;
    flex-shrink:0;
    box-sizing:border-box;
    font-size:12px;
}
.thumb img{
    width:100%;
    height:100px;
}
</style>

<div class="half" style="vertical-align:top;">
<h1>預告片介紹</h1>
<div class="rb tab" style="width:95%;">
    <div id="">
        <div class="posters">
            <?php
                $pos=$Trailer->all(['sh'=>1]," order by rank");
                foreach($pos as $index => $po){
                    echo "<div class='po' data-ani='{$po['ani']}'>";
                    echo "<img src='img/{$po['img']}'><br>";
                    echo $po['name'];
                    echo "</div>";
                }

            ?>
        </div>
        <div class="btns">
            <div class='arrow left'></div>
            <div class='thumbs'>
                <?php
            foreach($pos as $index => $po){
                    echo "<div class='thumb' data-ani='{$po['ani']}'>";
                    echo "<img src='img/{$po['img']}'><br>";
                    echo $po['name'];
                    echo "</div>";
                }
                ?>
            </div>
            <div class='arrow right'></div>
        </div>
    </div>
</div>
</div>
<script>
    $(".po").eq(0).show()
</script>


    <style>

        .mbox{
            width:48%;
            margin:0.5%;
            border:1px solid #ccc;
            border-radius:10px;
            padding:10px 3px;
            box-sizing:border-box;
            font-size:14px;
        }
        .half a{
            text-decoration:none;
        }
    </style>
            <div class="half">
                <h1>院線片清單</h1>
                <div class="rb tab" style="width:95%;display:flex;flex-wrap:wrap">
                    <?php
                        $today=date("Y-m-d");
                        $startDay=date("Y-m-d",strtotime("-2 days"));

                        $all=$Movie->count(['sh'=>1]," && ondate >='$startDay' && ondate <='$today'");
                        $div=4;
                        $pages=ceil($all/$div);
                        $now=$_GET['p']??1;
                        $start=($now-1)*$div;
                        $movies=$Movie->all(['sh'=>1]," && ondate >='$startDay' && ondate <='$today' order by rank limit $start,$div");
                        foreach($movies as $movie){
                     ?>   
                        <div class='mbox'>
                            <div style="display:flex">
                                <div>
                                    <a href='?do=intro&id=<?=$movie['id'];?>'><img src="img/<?=$movie['poster'];?>" style="width:60px;height:80px;border:2px solid white"></a>
                                </div>
                                <div>
                                    <div>片名:<?=$movie['name'];?></div>
                                    <div>分級:
                                        <img src="icon/03C0<?=$movie['level'];?>.png" style="width:20px;">
                                        <?=$ll[$movie['level']];?></div>
                                    <div>上映日期:<?=$movie['ondate'];?></div>
                                </div>
                            </div>
                            <div>
                                <button onclick="location.href='?do=intro&id=<?=$movie['id'];?>'">劇情簡介</button>
                                <button onclick="location.href='?do=order&id=<?=$movie['id'];?>'">線上訂票</button>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="ct" style="width:96%">
                          <?php

                            if(($now-1)>0){
                                echo "<a href='index.php?p=".($now-1)."'> < </a>";
                            }

                            for($i=1;$i<=$pages;$i++){
                                $fontsize=($i==$now)?"24px":"18px";
                                echo "<a href='index.php?p=$i' style='font-size:$fontsize'> $i </a>";
                            }

                            if(($now+1)<=$pages){
                                echo "<a href='index.php?p=".($now+1)."'> > </a>";
                            }

                          ?>

                    </div>
                </div>
            </div>