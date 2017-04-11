<?php
session_start();
if(!isset($_SESSION['user_id']))
{
	header("index.php");
}
?>
<?php
$user_id = $_SESSION['user_id'];
$temp=0;
$con=new mysqli("localhost","root","","car_rental");
$company_data = mysqli_query($con,"select * from car ca,inventory i,cart c where c.user_id=$user_id and i.number_plate=c.number_plate and i.car_id=ca.car_id;");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rent Wheels - Rent a Car</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/user.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<script src="jquery.colorbox-min.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="script.js"></script> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Welcome <?php echo $_SESSION["username"];?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
					<li>
					<a class="page-scroll" href="logout.php">Log Out</a>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"></div>
                <div class="intro-heading"></div>
               
            </div>
        </div>
    </header>
	
	

    <!-- Services Section -->
    <section id="services" class="signup">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" id="neverused">
                    <h2 class="section-heading">Here is your booked history!</h2>
       
        
        <div class="form-group" id="load">
      <center>  <table class="imagetable">
		<?php
while ($row = mysqli_fetch_array($company_data))
{if($temp==0){
	//echo "<tr><th>car_id</th>";
	echo "<th>company</th>";
	echo "<th>type</th>";
	echo "<th>model</th>";
	echo "<th>number_plate</th>";
	echo "<th>color</th>";
	//echo "<th>availability</th>";
	echo "<th>price</th>";
	//echo "<th>select</th>" ;
	echo "<th>Date Booked</th>";
	echo "<th>Date Returned</th></tr>";
	}$temp=1;
//echo "<td>".$row[car_id]."</td>";
	echo "<tr><td>".$row['company']."</td>";
	echo "<td>".$row['car_type']."</td>";
	echo "<td>".$row['model']."</td>";
	echo "<td>".$row['number_plate']."</td>";
	echo "<td>".$row['color']."</td>";
	//echo "<td>".$row[availability]."</td>";
	echo "<td>".$row['price']."</td>";
	echo "<td>".$row['date_out']."</td>";
	echo "<td>".$row['date_in']."</td></tr>";
}
mysqli_close($con);
?>
     </table> </center>  </div>
    <p> <a href= "userpagemain.php?"><-Back</a></p>
 </section>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>
