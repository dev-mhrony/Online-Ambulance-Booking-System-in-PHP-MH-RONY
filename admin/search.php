<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['eahpaid']==0)) {
  header('location:logout.php');
  } else{

?>


<!DOCTYPE html>
<head>
<title>Code Camp BD ||Search Listed Product Details </title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<?php include_once('includes/header.php');?>
<!--header end-->
<!--sidebar start-->
<?php include_once('includes/sidebar.php');?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
 <div class="panel panel-default">
    
    <div>
       <form class="cmxform form-horizontal" method="post" action="" name="search">
                                   
                                    <div class="form-group ">
                                        
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-6">Search by Request Number / User Name / User Mobile No:</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="searchdata" id="searchdata" class="form-control" value="" required="true">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                          <p style="text-align: center;"> <button class="btn btn-primary" type="submit" name="search">Search</button></p>
                                           
                                        </div>
                                    </div>

                                </form>
                                <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  
<div class="panel-heading">
   
          Result against "<?php echo $sdata;?>" keyword</div>

      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>

       <thead>
           <tr>
            <th data-breakpoints="xs">S.NO</th>
            <th>Booking Number</th>
            <th>Patient Name</th>
            <th>Relative Contact Number</th>
            <th>Hiring Date/Time</th>
            <th>Request Date</th>
            <th>Status</th>
            <th data-breakpoints="xs">Action</th>
          </tr>
        </thead>
          
         <?php
        $eid= $_SESSION['empid'];
$ret=mysqli_query($con,"select * from  tblambulancehiring where (tblambulancehiring.BookingNumber like '%$sdata%' || tblambulancehiring.PatientName  like '%$sdata%' || tblambulancehiring.RelativeConNum like '%$sdata%') ");
$cnt=1;
$count=mysqli_num_rows($ret);
if($count>0){
while ($row=mysqli_fetch_array($ret)) {

?>
        
        <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
              <td><?php  echo $row['BookingNumber'];?></td>
              <td><?php  echo $row['PatientName'];?></td>
                  <td><?php  echo $row['RelativeConNum'];?></td>
                  <td><?php  echo $row['HiringDate'];?> : <?php  echo $row['HiringTime'];?></td>
                  <td><?php  echo $row['BookingDate'];?></td>

                                   <td> <?php   $pstatus=$row['Status'];  
                 if($pstatus==""){ ?>
<span class="badge badge-info">New</span>
 <?php } elseif($pstatus=="Assigned"){ ?>
<span } class="badge badge-primary">Assigned</span>
 <?php } elseif($pstatus=="On the way"){ ?>
<span class="badge badge-primary">On the Way</span>
 <?php } elseif($pstatus=="Pickup"){ ?>
<span class="badge badge-success">Patient Pick</span>
 <?php } elseif($pstatus=="Reached"){ ?>
<span class="badge badge-success">Patient Reached Hospital</span>
 <?php } elseif($pstatus=="Rejected"){ ?>
<span class="badge badge-success">Rejected</span>

<?php } ?>
</td>
                  <td><a href="booking-details.php?id=<?php echo $row['ID'];?>&&bookingnum=<?php echo $row['BookingNumber'];?>" class="btn btn-primary">View</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}} else {?>
<tr>
  <td colspan="9" style="color:red">No Record Found</td>
</tr>

<?php } ?>  
 </tbody>
            </table>
            <?php } ?>
            
          
    </div>
  </div>
</div>
</section>
 <!-- footer -->
     <?php include_once('includes/footer.php');?>  
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
<?php }  ?>