<?php

include'system/config.php';

$username='';
$password='';

if(isset($_POST['submit'])){
  $user=$_POST['user'];
  $pwd=$_POST['password'];  
  $sql=mysqli_query($con,"select * from admin where username='".$user."' and password='".$pwd."'");
  while($row=mysqli_fetch_array($sql)){
    $username=$row['username'];
    $password=$row['password'];
  }

  if($user===$username && $pwd===$password){
    session_start();
    $_SESSION['login']=$user;
    header('location:welcome/welcome.php');
  }
  else
  {
    echo '<script language="javascript">';
    echo 'alert("Wrong id and password")';
     echo '</script>';
  }
}

?>
<!DOCTYPE html>  
<html lang="en">
<?php include('head.php') ?>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div >
<section id="wrapper" class="login-register">
  <div class="login-box">
    <div class="white-box">
      <form class="form-horizontal form-material" id="loginform" method="post">
        <h3 class="box-title m-b-20">Sign In</h3>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" name="user" placeholder="Username">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" type="password" required="" name="password" placeholder="Password">
          </div>
        </div>
          <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="submit">Log In</button>
          </div>
        </div>    
        
      </form>
     
    </div>
  </div>
</section>
<!-- jQuery -->
<?php include('js.php') ?>
</body>
</html>