<?php
session_start();
if(!isset($_SESSION['user_id']))
{
	header("index.php");
}
?>
<?php
$number_plate = $_GET['number_plate'];
$price = $_GET['price'];
$con=new mysqli("localhost","root","","car_rental");
$company_data = mysqli_query($con,"SELECT * FROM car c,inventory i where c.car_id = i.car_id and number_plate = '$number_plate'");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rent Wheels- Rent a Car</title>

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
<script>
function changeprice(no_days){
	var php_var = "<?php echo $price; ?>";
        var xmlhttp;
        if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
          }
        else
          {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange=function()
        {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
            var res=xmlhttp.responseText;
            document.getElementById("agg_price").innerHTML=res;
            }
          }
		xmlhttp.open("GET","cart.php?oneprice="+php_var+"&days="+no_days,true);
        
		xmlhttp.send();
}
function checkout(){
	var price = "<?php echo $price;?>";
	var number_plate = "<?php echo $number_plate;?>";
	var no_days = document.getElementById('no_of_days').value;
	var php_var = "<?php echo $price; ?>";
	
        var xmlhttp;
        if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
          }
        else
          {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange=function()
        {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
            var res=xmlhttp.responseText;
            document.getElementById("neverused").innerHTML=res;
            }
          }
		xmlhttp.open("GET","checkout.php?price="+price+"&days="+no_days+"&number_plate="+number_plate,true);
        
		xmlhttp.send();
}
</script>
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
                    <h2 class="section-heading">Here is your car!</h2>
                    
			
      
        <h2 >Please check the details</h2><hr />
       
        
        <div class="form-group" id="load">
        
		<?php
while ($row = mysqli_fetch_array($company_data))
{
    $imageSrc = "car_images/" . $row['image'];		
echo "<div class='row'>";
	echo '<div class="col-sm-8"><img src="'.$imageSrc.'" alt="image_coming_soon" style="width:250px;height:180px;"><p>'.$row['company'].'  '.$row['model'].'</p></div>' ;
	echo '<div class="col-sm-2"><p>Days To Rent</p><select id="no_of_days" name="days"  class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" onChange="changeprice(this.value)" >
	
  <option selected="selected" value="1">No of Days : 1</option>
  <option  value="2">2</option>
  <option  value="3">3</option>
  <option  value="4">4</option>
  <option  value="5">5</option>
  <option  value="6">6</option>
  <option  value="7">7</option>
  <option  value="8">8</option>
  <option value="9">9</option>
  
  </select></div>';
  echo '<div  id="divtag" value ="'.$price.'" class="col-sm-2"><p>Total Price: </p><p id="agg_price" > $'.$price.'</p></div>';
		echo "</div>";
		echo '<div class="row"><div class="col-sm-12"><button  id="checkout" type="button" onClick="checkout();">Check Out</button></div></div>';
		echo '</div></center></body></html>';
}
mysqli_close($con);
?>
            <p><b><a href= "userpagemain.php?"><-Back</a></b></p>                
    
        </div>
       
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
