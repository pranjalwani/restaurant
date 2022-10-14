<?php 
    include'config.php';
    include'session.php';

    mysqli_query($con,"UPDATE `cart` SET `payment`='1' WHERE `id`='".$_POST['id']."'");
    
    $items = mysqli_query($con,"SELECT * FROM `items` WHERE `cart`='".$_POST['id']."'");    
    while($rw = mysqli_fetch_array($items)){
        $prd = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `products` WHERE `id`='".$rw['pid']."'"));
        $weight = $prd['weight'] + 0.13 / $prd['rate'];
        mysqli_query($con,"UPDATE `products` SET `weight`='".$weight."' WHERE `id`='".$rw['pid']."'");
    }

    if($_POST['dis']=='5'){
        mysqli_query($con,"INSERT INTO `orders`(`user`, `cart`, `isDiscount`) VALUES ('".$_SESSION['login']."','".$_POST['id']."','5')");
    }else{
        mysqli_query($con,"INSERT INTO `orders`(`user`, `cart`, `isDiscount`) VALUES ('".$_SESSION['login']."','".$_POST['id']."','0')");
    }
    echo 'ok';
?>