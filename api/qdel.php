<?php include_once "../base.php";

switch($_POST['type']){
    case 'date':
        $Ord->del(['date'=>$_POST['target']]);    
    break;
    case 'movie':
        $Ord->del(['name'=>$_POST['target']]);    

    break;
}
