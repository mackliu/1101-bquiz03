<?php include_once "base.php";

for($i=1;$i<=9;$i++){
    $data['name']='預告片'.$i;
    $data['img']='03A0'.$i.".jpg";
    $data['rank']=$i;
    $data['sh']=1;
    $data['ani']=rand(1,3);
    $Trailer->save($data);
}