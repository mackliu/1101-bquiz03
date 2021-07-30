<?php include_once "base.php";

/* for($i=1;$i<=9;$i++){
    $data['name']='預告片'.$i;
    $data['img']='03A0'.$i.".jpg";
    $data['rank']=$i;
    $data['sh']=1;
    $data['ani']=rand(1,3);
    $Trailer->save($data);
} */

/* for($i=1;$i<=9;$i++){
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
} */

$sess=[
    1=>'14:00~16:00',
    2=>'16:00~18:00',
    3=>'18:00~20:00',
    4=>'20:00~22:00',
    5=>'22:00~24:00',
];

for($i=1;$i<=9;$i++){
    $tmp=[];
    $shift=$i%3;
    $ondate=date("Y-m-d",strtotime("+$shift days"));
    $ord['name']='院線片'.rand(1,3);
    $ord['date']=$ondate;
    $ord['session']=$sess[rand(1,5)];
    $ord['qt']=rand(1,4);

    for($j=0;$j<$ord['qt'];$j++){
        $tmp[]=rand(0,19);
    }

    $ord['seats']=serialize($tmp);
    
    $ord['no']=date("Ymd",strtotime("+$shift days"))."000".$i;
    
    $Ord->save($ord);
}


