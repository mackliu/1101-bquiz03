<?php include_once "../base.php";

foreach($_POST['id'] as $key => $id){

    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        $Trailer->del($id);
    }else{
        $trailer=$Trailer->find($id);
        $trailer['name']=$_POST['name'][$key];
        $trailer['ani']=$_POST['ani'][$key];
        $trailer['sh']=(!empty($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $Trailer->save($trailer);
    }

}

to("../backend.php?do=trailer");