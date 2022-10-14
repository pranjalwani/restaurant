<?php 
include "../system/config.php";
session_start();

$number = $_GET['n'];
$print='';
if($number=='1'){
    $random_array = range(1, 6);
    shuffle($random_array);
    $random_array = array_slice($random_array ,1,5);
    mysqli_query($con,"INSERT INTO `game`(`a`, `b`, `c`, `d`, `e`) VALUES ('".$random_array[0]."','$random_array[1]','$random_array[2]','$random_array[3]','$random_array[4]')");    
    $game_id = mysqli_insert_id($con);    
    $_SESSION['game']=$game_id;
    $_SESSION['score']=0;
    $_SESSION['qus']=1;

    $games = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `game` WHERE `id`='".$game_id."'"));

    $question = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `questions` WHERE `question_number`='".$games['a']."'"));

    $sql = mysqli_query($con,"SELECT * FROM `choices` WHERE `question_number`='".$games['a']."'");
    while($row=mysqli_fetch_array($sql)){
        $print.='<li>
                <input name="choice" type="radio" value="'.$row['id'].'" />
                '.$row['choice'].'
                </li>';
    }
}else{
    $games = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `game` WHERE `id`='".$_SESSION['game']."'"));

    switch ($number) {
        case "2":
            $question = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `questions` WHERE `question_number`='".$games['b']."'"));
            $sql = mysqli_query($con,"SELECT * FROM `choices` WHERE `question_number`='".$games['b']."'");
            break;
        case '3':
            $question = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `questions` WHERE `question_number`='".$games['c']."'"));
            $sql = mysqli_query($con,"SELECT * FROM `choices` WHERE `question_number`='".$games['c']."'");
            break;
        case "4":
            $question = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `questions` WHERE `question_number`='".$games['d']."'"));
            $sql = mysqli_query($con,"SELECT * FROM `choices` WHERE `question_number`='".$games['d']."'");
            break;
        case "5":
            $question = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `questions` WHERE `question_number`='".$games['e']."'"));
            $sql = mysqli_query($con,"SELECT * FROM `choices` WHERE `question_number`='".$games['e']."'");
            break;
    }
    
    while($row=mysqli_fetch_array($sql)){
        $print.='<li>
                <input name="choice" type="radio" value="'.$row['id'].'" />
                '.$row['choice'].'
                </li>';
    }
}

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
        <link rel="stylesheet" type="text/css" media="screen" href="css/quiz.css" />
</head>
<body>
    <div id="container">
        <header>
            <div class="container">
                <h1>PHP Quiz</h1>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="current"><p><b>Question <?php echo $number; ?> of 5:</b>                    
                        <?php echo $question['question'] ?>
                    </p>
                </div>                
            </div>
            <form method="post" action="process.php" class="quizForm">
                <ul class="choices">
                    <?php echo $print; ?>                    
                </ul>
                <input type="submit" value="submit" class="btn btn-info" />
                <input type="hidden" name="number" value="<?php echo $number; ?>" />
            </form>
        </main>  
    </div>    

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>    
    <script src="../js/sweetalert.min.js"></script>
</body>
</html>