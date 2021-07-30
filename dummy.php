<?php include_once "base.php";

/* for($i=1;$i<=9;$i++){
    $data['name']='預告片'.$i;
    $data['img']='03A0'.$i.".jpg";
    $data['rank']=$i;
    $data['sh']=1;
    $data['ani']=rand(1,3);
    $Trailer->save($data);
} */

for($i=1;$i<=9;$i++){
    $shift=$i%4;
    $ondate=date("Y-m-d",strtotime("-$shift days"));
    $movie['name']='院線片'.$i;
    $movie['level']=rand(1,4);
    $movie['length']=rand(90,120);
    $movie['ondate']=$ondate;
    $movie['publish']='院線片'.$i.'的發行商';
    $movie['director']='院線片'.$i.'的導演';
    $movie['trailer']='03B0'.$i.'v.mp4';
    $movie['poster']='03B0'.$i.'.png';
    $movie['intro']="院線片$i 的劇情簡介院線片$i 的劇情簡介院線片$i 的劇情簡介院線片$i 的劇情簡介院線片$i 的劇情簡介院線片$i 的劇情簡介院線片$i 的劇情簡介院線片$i 的劇情簡介院線片$i 的劇情簡介院線片$i 的劇情簡介院線片$i 的劇情簡介院線片$i 的劇情簡介院線片$i 的劇情簡介";
    $movie['sh']=1;
    $movie['rank']=$i;
    $Movie->save($movie);
}


