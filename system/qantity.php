<?php 
    include'config.php';
    $item = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `items` WHERE `id`='".$_POST['id']."'"));
    $tempWeight = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `products` WHERE `id`='".$item['pid']."'"));
    $weight = $tempWeight['weight'];

    if($_POST['op']=='+'){
        $qty = $item['qty']+1;
        $weight = $weight + 0.075 / $tempWeight['rate'];
        mysqli_query($con,"UPDATE `products` SET `weight`='".$weight."' WHERE `id`='".$item['pid']."'");
        mysqli_query($con,"UPDATE `items` SET `qty`='".$qty."' WHERE `id`='".$item['id']."'");
        echo 'ok';
    }else if($_POST['op']=='-'){
        $qty = $item['qty']-1;        
        if($qty==0){
            $weight = $weight - 0.05 / $tempWeight['rate'];
            mysqli_query($con,"UPDATE `products` SET `weight`='".$weight."' WHERE `id`='".$item['pid']."'");
            mysqli_query($con,"DELETE FROM `items` WHERE `id`='".$item['id']."'");
        }else{
            $weight = $weight - 0.075 / $tempWeight['rate'];
            mysqli_query($con,"UPDATE `products` SET `weight`='".$weight."' WHERE `id`='".$item['pid']."'");
            mysqli_query($con,"UPDATE `items` SET `qty`='".$qty."' WHERE `id`='".$item['id']."'");
        }
        echo 'ok';
    }else{
        echo 'error';
    }


?>