<?php 
    include'config.php';
    include'session.php';

    mysqli_query($con,"UPDATE `cart` SET `payment`='1' WHERE `id`='".$_POST['id']."'");
    if($_POST['dis']=='5'){
        mysqli_query($con,"INSERT INTO `orders`(`user`, `cart`, `isDiscount`) VALUES ('".$_SESSION['login']."','".$_POST['id']."','5')");
    }else{
        mysqli_query($con,"INSERT INTO `orders`(`user`, `cart`, `isDiscount`) VALUES ('".$_SESSION['login']."','".$_POST['id']."','0')");
    }
    echo 'ok';
?>