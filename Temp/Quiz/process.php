<?php 
include "../system/config.php";
session_start();

$number = $_POST['number'];
$selected_choice = $_POST['choice'];

$next=$number+1;

$games = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `game` WHERE `id`='".$_SESSION['game']."'"));

switch ($number) {
    case "1":
        $ans = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `choices` WHERE `question_number`='".$games['a']."' AND `is_correct`='1'"));
        break;
    case "2":
        $ans = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `choices` WHERE `question_number`='".$games['b']."' AND `is_correct`='1'"));
        break;
    case "3":
        $ans = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `choices` WHERE `question_number`='".$games['c']."' AND `is_correct`='1'"));
        break;
    case "4":
        $ans = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `choices` WHERE `question_number`='".$games['d']."' AND `is_correct`='1'"));        
        break;
    case "5":
        $ans = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `choices` WHERE `question_number`='".$games['e']."' AND `is_correct`='1'"));
        break;
}

if($ans['id']==$selected_choice){
    $_SESSION['score']++;
}

if($number == '5'){
    header("Location: final.php");
    exit();
} else {
    $_SESSION['qus']=$next;
    header("Location: question.php?n=".$next."&score=".$_SESSION['score']);
}

?>