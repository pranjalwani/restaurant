<?php
include'../system/config.php';
include'../system/session.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php 

include('../head.php');

$out='';

$id = $_GET['uid'];
$oid = $_GET['oid'];
$sql = "SELECT * FROM `user` WHERE `id`='".$id."'";

$user = mysqli_fetch_array(mysqli_query($con,$sql));

$order=mysqli_fetch_array(mysqli_query($con,"SELECT * from orders WHERE id='".$oid."'"));
$query=mysqli_query($con,"SELECT * from items WHERE cart='".$order['cart']."'");

$total = 0;

while($row=mysqli_fetch_array($query)){
    $item = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `products` WHERE `id`='".$row['pid']."'"));
    $total = $total + ($item['rate'] * $row['qty']);
    $out .= '<tr>
            <th>'.$item['name'].'</th>
            <th>'.$item['rate'].'</th>
            <th>'.$row['qty'].'</th>
        </tr>';
}

?>

<body>    
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">

        <?php include('../menu.php') ?>
        
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Welcome Admin</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="active"><a href="#">Invoices</a></li>
                        </ol>
                    </div>
                </div>

                <div class="mList form-group">
                    <div class="col-md-offset-3">
                        <h2>Customer Name : <?php echo $user['name'] ?></h2>
                        <h2>Customer Email : <?php echo $user['email'] ?></h2>
                    </div>

                    <div class="col-md-6 col-md-offset-3">
                    <table class="table table-bordered table-hovers">
                        <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Qty</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php echo $out ?>                        
                        </tbody>
                    </table>
                    </div>

                    <div class="clearfix" ></div>
                    <div class="col-md-offset-3">                    
                        <div class="row">
                            <h2 class="col-md-4">Total : <?php echo $total ?></h2>
                        </div>
                    </div>                    
                </div>

            </div>
        </div>        
        
        <div class="clearfix"></div>                              
        <footer class="footer text-center"> 2019 &copy; </footer>
                
    </div>
</body>
<?php include('../js.php') ?>
<script type="text/javascript">
        $(document).ready(function() {

        });
</script>
</html>