<?php

include'system/config.php';
include'system/session.php';

$name = 'Name';
$total = '0';
$isGame = 'block';
$myReward = '';
$dig = '';
$re='0';

if($IS_AUTH){
    $isnotAuth = "none";
    $isAuth = "inline-block";

    $user = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `user` WHERE `email`='".$_SESSION['login']."'"));
    $name=$user['name'];

    $cart = mysqli_fetch_array(mysqli_query($con,"SELECT `id` FROM `cart` WHERE `user`='".$user['id']."'"));
    $items = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) AS 'NUM' FROM `items` WHERE `cart`='".$cart['id']."'"));
    $total = $items['NUM'];
}else{
    $isnotAuth = "inline-block";
    $isAuth = "none";
    header('location:login.php');
}

if(isset($_GET['reward'])){
    $isGame = 'none';
    $re = $_GET['reward'];
    $myReward = "Soory! You Lost The Quiz Game. Better luck next time";
    if($re=='5'){
        $myReward = "Congratulation! You win 5&#8377; Discount.";
        $dig='swal("Congratulation! You win 5₹ Discount.");';
    }else{
        $dig='swal("Soory! You Lost The Quiz Game. Better luck next time");';
    }
}

$error = '';
$out = '';
$total = 0;

$user = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `user` WHERE `email`='".$_SESSION['login']."'"));
$cart = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `cart` WHERE `user`='".$user['id']."' AND `payment`='0'"));
$items = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) AS 'NUM' FROM `items` WHERE `cart`='".$cart['id']."'"));

if($cart['payment']==1){
    header('location:login.php');
}

if($items['NUM']==0){
    $out='<tr>
            <td colspan="5" style="text-align:center">No Items Added to Cart</td>            
          </tr>';
    $error = "document.getElementById('ordButton').disabled=true;
                document.getElementById('playButton').disabled=true;";
}else{  
    $sql = mysqli_query($con,"SELECT * FROM `items` WHERE `cart`='".$cart['id']."'"); 
    $i=0;
    while($row = mysqli_fetch_array($sql)){
        $i++;
        $product = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `products` WHERE `id`='".$row['pid']."'"));
        $out.='<tr>
                <td style="text-align:center">'.$i.'</td>
                <td style="text-align:center">'.$product['name'].'</td>
                <td style="text-align:center">'.$product['rate'].' &#8377;</td>
                <td style="text-align:center"><span class="btn btn-info round" onclick="removeQty(\''.$row['id'].'\')">-</span>'.$row['qty'].'<span class="btn btn-success round" onclick="addQty(\''.$row['id'].'\')">+</span></td>
                <td style="text-align:center">'.($row['qty']*$product['rate']).' &#8377;</td>
                </tr>';
        $total = $total + ($row['qty']*$product['rate']);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | Durga Prasad</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link rel="stylesheet" type="text/css" media="screen" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/order.css" />
</head>
<body>
    <header>
        <h1>Your DP (Durga Prasad)</h1>    
    </header>

    <nav class="site-header sticky-top py-1">
        <div class="container d-flex flex-column flex-md-row justify-content-between" id="myNavW">            
            <a class="py-2 d-none d-md-inline-block" href="index.php">Home</a>
            <div class="py-2 d-none d-md-inline-block" id="myNav">
                <a class="dropbtn" href="#">Menu</a>
                <div class="dropdown-content">
                    <a href="item.php?cat=1">South indian food</a>
                    <a href="item.php?cat=2">Panjabi food</a>
                    <a href="item.php?cat=3">Jain food</a>
                    <a href="item.php?cat=4">Chinese food</a>
                    <a href="item.php?cat=5">Vegan food</a>
                </div>
            </div>            
            <a class="py-2 d-none d-md-inline-block" href="contact.php">Contact Us</a>
            <a class="py-2" href="login.php" style="display: <?php echo $isnotAuth; ?>;">Login</a>
            <div class="py-2" id="myNav" style="display: <?php echo $isAuth; ?>;">
                <a class="dropbtn" href="#"><i class="far fa-user-circle"></i> <?php echo $name; ?></a>
                <div class="dropdown-content">
                    <a href="checkout.php">Cart(<?php echo $total; ?>)</a>
                    <a href="system/logout.php">Logout</a>
                </div>
            </div>            
        </div>
    </nav>

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 font-weight-normal">Punny headline</h1>
            <p class="lead font-weight-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts.</p>
            <a class="btn btn-primary" href="#">Coming soon</a>
        </div>        
    </div>

    <div class="container">
        <h2>To,</h2>
        <h4><?php echo $user['name']; ?></h4>
        <p>Address: <?php echo $user['Addr']; ?></p>
        <table>
            <tr>
                <th>Sr.</th>
                <th>Item Name</th>
                <th>Rate</th>
                <th>Qantity</th>
                <th>Total</th>
            </tr>
            <?php echo $out; ?>
        </table>
        <h2 style="margin-top:10px;">Total: <?php echo $total; ?> &#8377;</h2>
        <p style="display:<?php echo $isGame; ?>">Get Dicount of 5&#8377; by plaing simple quiz Game.&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-outline-warning" id="playButton" onclick="playGame()">Play</button></p>
        <p><?php echo $myReward; ?></p>
        <button class="btn btn-danger" id="ordButton" onclick="makeOrder('<?php echo $cart['id'] ;?>','<?php echo $re ;?>')">Confirm Order</button>
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>    
    <script src="js/sweetalert.min.js"></script>
    <script type="text/javascript">
        <?php echo $error; ?>        
        function addQty(qtyID){
            $.ajax({
                type: "POST",
                url: "system/qantity.php",
                data: { id: qtyID, op: '+' }
            }).done(function( msg ) {
                if(msg=="ok"){
                    location.reload(); 
                }else{                    
                    swal("Some Error Occurd!");
                }
            });
        }
        function removeQty(qtyID){
            $.ajax({
                type: "POST",
                url: "system/qantity.php",
                data: { id: qtyID, op: '-' }
            }).done(function( msg ) {
                if(msg=="ok"){
                    location.reload(); 
                }else{                    
                    swal("Some Error Occurd!");
                }
            });
        }
        function makeOrder(ordID, ordDI){
            $.ajax({
                type: "POST",
                url: "system/order.php",
                data: { id: ordID, dis: ordDI }
            }).done(function( msg ) {
                if(msg=="ok"){
                    location.reload(); 
                }else{                    
                    swal("Some Error Occurd!");
                }
            });
        }
        function playGame(){
            var item = <?php echo $items['NUM']; ?>;
            if(item == 0){
                swal("Create an order to continue");
            }else{
                window.location = "Quiz/index.php";
            }
        }
        <?php echo $dig; ?>
    </script>
</body>
</html>