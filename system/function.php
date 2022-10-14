<?php
    include'config.php';
    $user = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) AS 'NUM', `id` FROM `user` WHERE `email`='".$_POST['user']."'"));
    $tempWeight = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `products` WHERE `id`='".$_POST['product']."'"));    
    $weight = ($tempWeight['weight'] + 0.1) / $tempWeight['rate'];
    if($user['NUM']==0){
        echo "user";
    }else{
        $cart = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) AS 'NUM',`id` FROM `cart` WHERE `user`='".$user['id']."' AND `payment`='0'"));
        if($cart['NUM']==0){
            mysqli_query($con,"INSERT INTO `cart`(`user`,`payment`) VALUES ('".$user['id']."','0')");
            $cart_id = mysqli_insert_id($con);
        }else{
            $cart_id = $cart['id'];
        }

        $items = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) AS 'NUM' FROM `items` WHERE `cart`='".$cart_id."'"));
        if($items['NUM']==0){                            
            mysqli_query($con,"UPDATE `products` SET `weight`='".$weight."' WHERE `id`='".$_POST['product']."'");
            mysqli_query($con,"INSERT INTO `items`(`cart`, `pid`, `qty`) VALUES ('".$cart_id."','".$_POST['product']."','1')");
            echo "ok";
        }else{
            $rows = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) AS 'NUM' FROM `items` WHERE `pid`='".$_POST['product']."' AND `cart`='".$cart_id."'"));
            if($rows['NUM']!=0){
                echo "product";
            }else{
                mysqli_query($con,"UPDATE `products` SET `weight`='".$weight."' WHERE `id`='".$_POST['product']."'");
                mysqli_query($con,"INSERT INTO `items`(`cart`, `pid`, `qty`) VALUES ('".$cart_id."','".$_POST['product']."','1')");
                echo "ok";
            }            
        }
    }
?>