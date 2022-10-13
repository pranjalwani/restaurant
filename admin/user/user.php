<?php
include'../system/config.php';
include'../system/session.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php 

include('../head.php');

$out='';

$query=mysqli_query($con,'select * from user');
$out='';
$count=0;
while($row=mysqli_fetch_array($query)){
    $count++;
    $out.='<tr>
            <td>'.$count.'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['Addr'].'</td>                   
        </tr>';
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
                          <li class="active"><a href="#">Users</a></li>
                      </ol>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->              
              <div class="col-sm-12">                
                <div class="white-box">                    
                    <br>
                    <div class="table-responsive">
                      <table id="mytable" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>Sr no.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>                            
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Sr no.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>                                                       
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
            <footer class="footer text-center"> 2019 &copy; </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
   
</body>
<?php include('../js.php') ?>
<script type="text/javascript">
        $(document).ready(function() {          
          $('#mytable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
          });

        });
</script>
</html>