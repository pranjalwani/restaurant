<?php 
    include'config.php';
    $item = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `items` WHERE `id`='".$_POST['id']."'"));
    if($_POST['op']=='+'){
        $qty = $item['qty']+1;
        mysqli_query($con,"UPDATE `items` SET `qty`='".$qty."' WHERE `id`='".$item['id']."'");
        echo 'ok';
    }else if($_POST['op']=='-'){
        $qty = $item['qty']-1;
        if($qty==0){
            mysqli_query($con,"DELETE FROM `items` WHERE `id`='".$item['id']."'");
        }else{
            mysqli_query($con,"UPDATE `items` SET `qty`='".$qty."' WHERE `id`='".$item['id']."'");
        }        
        echo 'ok';
    }else{
        echo 'error';
    }


?>