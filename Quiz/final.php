<?php 
include "../system/config.php";
session_start();

$game=$_SESSION['game'];

mysqli_query($con,"DELETE FROM `game` WHERE `id`='".$game."'");

$_SESSION['game']=0;
$_SESSION['qus']=1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home | Durga Prasad</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link rel="stylesheet" type="text/css" media="screen" href="../css/normalize.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
</head>
<body>
    
    <div class="container">
        <header>
            <div class="container">
                <h1>PHP Quiz</h1>
            </div>
        </header>
        <main>
            <div class="container">
                <h2>You are Done!</h2>
                <p>Congrats! You have completed the test</p>
                <p>Final socre: <?php echo $_SESSION['score']; ?></p>
                <a href="../checkout.php?reward=<?php echo $_SESSION['score']; ?>" class="btn btn-success">Clam Reward</a>
            </div>
        </main>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>    
    <script src="../js/sweetalert.min.js"></script>
</body>
</html>