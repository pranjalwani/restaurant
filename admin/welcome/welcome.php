<?php
include'../system/config.php';
include'../system/session.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php 

include('../head.php');

$out='';
$discount='';

$num_users=0;
$num_stock=0;
$num_invoices=0;

$query=mysqli_fetch_array(mysqli_query($con,'SELECT COUNT(*) AS `Num` FROM `user`'));
$num_users = $query['Num'];

$query=mysqli_fetch_array(mysqli_query($con,'SELECT COUNT(*) AS `Num` FROM `products`'));
$num_stock = $query['Num'];

$query=mysqli_fetch_array(mysqli_query($con,'SELECT COUNT(*) AS `Num` FROM `orders`'));
$num_invoices = $query['Num'];

$query=mysqli_query($con,'select * from orders');
$out='';
$cd='';
$count=0;
while($row=mysqli_fetch_array($query)){
  $total = 0;
  $count++;
  $user = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `user` WHERE `email`='".$row['user']."'"));

  if($row['isDiscount']=='0'){
    $discount = 'No Discount';
  }else{
    $discount = 'Discount: 5₹';
  }

  $cart = mysqli_query($con,"SELECT * FROM `items` WHERE `cart`='".$row['cart']."'");
  while($rowa=mysqli_fetch_array($cart)){
    $item = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `products` WHERE `id`='".$rowa['pid']."'"));
    $total = $total+($rowa['qty']*$item['rate']);
  }

  $out.='<tr>
        <td>'.$count.'</td>
        <td>'.$user['name'].'</td>
        <td>'.$user['Addr'].'</td>
        <td>'.$total.'₹</td>
        <td>'.$discount.'</td>
        <td><button class="btn btn-info waves-effect waves-light" onclick="gotoInvoice('.$user['id'].', '.$row['id'].')">View Invoice</button></td>
      </tr>';
}

$q=mysqli_query($con,'select * from products');
while($r=mysqli_fetch_array($q)){
  $cd .= "['".$r['name']."', ".($r['weight'] * 100)."],";
}

?>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">

        <?php include('../menu.php') ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
              <div class="row bg-title">
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                      <h4 class="page-title">Welcome Admin</h4>
                  </div>
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                      <ol class="breadcrumb">
                          <li class="active"><a href="#">Home</a></li>
                      </ol>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                  <div class="white-box">
                    <div class="row row-in">
                      <div class="col-lg-4 col-sm-6 row-in-br">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                <h5 class="text-muted vb">USERS</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-danger"><?php echo $num_users; ?></h3>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 row-in-br  b-r-none">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                    <h5 class="text-muted vb">Products</h5>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-megna"><?php echo $num_stock; ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 row-in-br">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
                                    <h5 class="text-muted vb">INVOICES</h5>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-primary"><?php echo $num_invoices; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                  <div class="white-box">
                    <div id="chart_div"></div>                  
                  </div>                  
                </div>                
              </div>

              <div class="col-sm-12">                
                <div class="white-box">                    
                    <br>
                    <div class="table-responsive">
                      <table id="mytable" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>Sr no.</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Amount</th>
                            <th>Discount</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Sr no.</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Amount</th>
                            <th>Discount</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>                                        
                          <?php echo $out ?>
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>              
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center">  </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
   
</body>
<?php include('../js.php') ?>
<script type="text/javascript">
        $(document).ready(function() {
          $.toast({
              heading: 'Welcome to Admin Panel',
              text:'',
              position: 'top-right',
              loaderBg: '#ff6849',
              icon: 'info',
              hideAfter: 3500,
              stack: 6
          });

          $('#mytable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
          });

        });

        function gotoInvoice(id, oid){
          window.location.href = "invoice.php?uid="+id+"&oid="+oid;
        }
        
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {

          // Create the data table.
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Product');
          data.addColumn('number', 'Rating');
          data.addRows([ <?php echo $cd; ?> ]);

          // Set chart options
          var options = {'title':'Cart - Discart Analysis',
                        'width':'100%',
                        'height':700};

          // Instantiate and draw our chart, passing in some options.
          var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        }
</script>
</html>
