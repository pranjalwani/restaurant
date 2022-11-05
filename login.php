<!-- login for online food ordering system -->

<?php
include'system/config.php';
include'system/session.php';

if($IS_AUTH){
    $isnotAuth = "none";
    $isAuth = "inline-block";
    header('location:index.php');
}else{
    $isnotAuth = "inline-block";
    $isAuth = "none";
}

$error = '';

if(isset($_POST['logSubmit']) || isset($_POST['regSubmit'])){
    echo "<script type=\'text/javascript\''>
            document.getElementById('logButton').disabled=true;
            document.getElementById('RegButton').disabled=true;
            </script>";

    if(isset($_POST['logSubmit'])){
        $email = $_POST['lemail'];
        $pass = $_POST['lpassword'];
        
        $user = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) AS 'NUM',`email`,`password` FROM `user` WHERE `email`='".$email."'"));
        if($user['NUM']==0){
            $error='swal("Incorrect email or password!");';            
        }else{
            if(password_verify ( $pass , $user['password'] )){                
                session_start();
                $_SESSION['login']=$user['email'];
                header('location:index.php');
            }else{
                $error='swal("Incorrect email or password!");';
            }            
        }        
    }

    if(isset($_POST['regSubmit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $addr = $_POST['addr'];
        $pass = $_POST['password'];
        $passc = $_POST['passwordc'];

        if($pass!=$passc){
            $error='swal("Password does not match!");';
        }else{
            $user = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) AS 'NUM',`email` FROM `user` WHERE `email`='".$email."'"));
            if($user['NUM']!=0){
                $error='swal("User already exists try login!");';
            }else{
                $pass = password_hash($pass,1);
                mysqli_query($con,"INSERT INTO `user`(`name`, `email`, `Addr`, `password`) VALUES ('".$name."','".$email."','".$addr."','".$pass."')");
                session_start();
                $_SESSION['login']=$email;
                header('location:index.php');        
            }            
        }
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
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" />
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
                <a class="dropbtn" href="#"><i class="far fa-user-circle"></i> Name</a>
                <div class="dropdown-content">
                    <a href="checkout.php">Cart(0)</a>
                    <a href="system/logout.php">Logout</a>
                </div>
            </div>            
        </div>
    </nav>

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 font-weight-normal">WELCOME TO</h1>
            <p class="lead font-weight-normal">HOTEL DURGA PRASAD</p>
        </div>        
    </div>

    <div class="container">        
        <div class="nav nav-tabs nav-fill" role="tablist">
            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-home" aria-selected="true">Login</a>
            <a class="nav-item nav-link" data-toggle="tab" href="#nav-register" role="tab" aria-controls="nav-profile" aria-selected="false">Register</a>            
        </div>
        
        <div class="tab-content py-3 px-3 px-sm-0">
            <div class="tab-pane fade show active" id="nav-login" role="tabpanel" aria-labelledby="nav-home-tab">                
                <div class="wrap-contact2">
                    <form class="contact2-form validate-formB" method="POST">
                        <span class="contact2-form-title">
                            Login
                        </span>                                    
                        <div class="wrap-input2 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input2" type="text" name="lemail">
                            <span class="focus-input2" data-placeholder="EMAIL"></span>
                        </div>
                        <div class="wrap-input2 validate-input" data-validate = "Password is required">
                            <input class="input2" type="password" name="lpassword">
                            <span class="focus-input2" data-placeholder="PASSWORD"></span>
                        </div>            
                        <div class="container-contact2-form-btn">
                            <div class="wrap-contact2-form-btn">
                                <div class="contact2-form-bgbtn"></div>
                                <button class="contact2-form-btn" name="logSubmit" id="logButton">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="wrap-contact2">
                    <form class="contact2-form validate-formA" method="post">
                        <span class="contact2-form-title">
                            Register
                        </span>
                        <div class="wrap-input2 validate-input" data-validate = "Name is required">
                            <input class="input2" type="text" name="name">
                            <span class="focus-input2" data-placeholder="NAME"></span>
                        </div>                                
                        <div class="wrap-input2 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input2" type="text" name="email">
                            <span class="focus-input2" data-placeholder="EMAIL"></span>
                        </div>
                        <div class="wrap-input2 validate-input" data-validate = "Address is required">
                            <input class="input2" type="text" name="addr">
                            <span class="focus-input2" data-placeholder="ADDRESS"></span>
                        </div>
                        <div class="wrap-input2 validate-input" data-validate = "Password is required">
                            <input class="input2" type="password" name="password">
                            <span class="focus-input2" data-placeholder="PASSWORD"></span>
                        </div>
                        <div class="wrap-input2 validate-input" data-validate = "Renter Password">
                            <input class="input2" type="password" name="passwordc">
                            <span class="focus-input2" data-placeholder="RE-ENTER PASSWORD"></span>
                        </div>
                        <div class="container-contact2-form-btn">
                            <div class="wrap-contact2-form-btn">
                                <div class="contact2-form-bgbtn"></div>
                                <button class="contact2-form-btn" name="regSubmit" id="RegButton">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/login.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script type="text/javascript">
        <?php echo $error; ?>
    </script>
</body>
</html>