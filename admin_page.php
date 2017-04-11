<?php
// Start the session
session_start();
if(!isset($_SESSION['user_id']))
{
	header("index.php");
}
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
    <link href="css/admin.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<script src="jquery.colorbox-min.js" type="text/javascript"></script>
<script type="text/javascript" src="functions.js"></script>
<script type="text/javascript" src="inev.js"></script>
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
                <button type="button" class="page-scroll btn btn-xl" id="showsignup" ><a href="#services" style="color:white">Add Car</a></button>&nbsp;
				<button type="button" class="page-scroll btn btn-xl" id="showsignin" ><a href="#services1" style="color:white">Delete/Modify</a></button>&nbsp;
				<button type="button" class="page-scroll btn btn-xl" id="showcheckin" ><a href="#services2" style="color:white">Car Return</a></button>
            </div>
        </div>

    </header>
	
	
    <!-- Services Section -->
    <section id="services" class="signup">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Add New Car</h2>
                    
			<form class="form-signup" method="post" id="register-form"  >
      
        <h2 >Put the required details</h2><hr />
       
        
		
        
		  <div class="form-group">
		<center>
		<table>
      <tr><td>Car Company:&nbsp &nbsp &nbsp </td><td> <select name="company_1" id="company_1" onChange="changeSecond_1(this.value)" > 
								
							  </select></td></tr>
							  <br/>
							  
		<tr><td>Car Type: &nbsp &nbsp &nbsp </td><td> <select name="type_1" id="type_1" onChange="changeThird_1(document.getElementById('company_1').value,this.value)">
								
							  </select></td></tr>
							  <br/>
							  
					<tr><td>Car Model:&nbsp &nbsp &nbsp </td><td> <select name="model_1" id="model_1" onChange="hide()">
								
							 </select></td></tr>
							<br/>
							</table></center>
        </div>

		
		
		
		
		
		
		
		
		
		
		
		
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Company Name" name="company_name" id="company_name" /> 
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Type" name="type_2" id="car_type" />
        <span id="check-e" style="color:red"></span>
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Model" name="model_2" id="car_model" /><span id="emptyp" style="color:red"></span>
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Color" name="color" id="car_color" /><span id="emptypc" style="color:red"></span>
        </div>
		
		<div class="form-group">
        <input type="text" class="form-control" placeholder="Registration_number" name="car_plate" id="car_plate" />
        </div>
		
		<div class="form-group">
        <input type="text" class="form-control" placeholder="Price" name="car_price" id="car_price" />
        </div>
		 
		<div class="form-group">
		<input type="file" name="file" id="file"  />
		<input type="submit" value="Upload" class="submit" />
		<span id="message_1" class="anything" ></span>
		</div>
		
      <hr />
        
        <div class="form-group">
            <button type="button" class="btn btn-default" name="signUp" id="add_car">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; Add Car
   </button> 
        </div>  
      <span id="unfilled" style="color:red"></span>
	   <span id="filled" style="color:Blue"><p></p></span>
      </form>
	  <div id="ack"></div>
                </div>
            </div>
           
        </div>
 </section>
 
   <section id="services1" class="signin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Select the car</h2>
                    
			<form class="form-signin" method="post" id="sign-form"  >
      
        <h2></h2><hr />
       
        
      
        
        <div class="form-group">
		<center>
		<table>
      <tr><td>Car Company:&nbsp &nbsp &nbsp </td><td> <select name="company" id="company" onChange="changeSecond(this.value)" > 
								
							  </select></td></tr>
							  <br/>
							  
		<tr><td>Car Type: &nbsp &nbsp &nbsp </td><td> <select name="type" id="type" onChange="changeThird(document.getElementById('company').value,this.value)">
								
							  </select></td></tr>
							  <br/>
							  
					<tr><td>Car Model:&nbsp &nbsp &nbsp </td><td> <select name="model" id="model" onChange="display(this.value)">
								
							 </select></td></tr>
							<br/>
							</table></center>
        </div>
       <div class="form-group">
      <center><table id="table" class="imagetable">
				</table></center>
        </div>
      
		
      <hr />
        
        <div class="form-group">
            <button type="button" class="btn btn-default" name="delete" id="erase">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; Delete
   </button> 
   <button type="button" class="btn btn-default" name="signIn" id="update">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; Update
   </button> 
   
   </div>  
   
   <div class="form-group" id="change">
           

        
		
		<input type="text" class="form-control" placeholder="Enter Updated Price" name="update_price" id="update_price" /><span id="emptyp" style="color:red"></span>
</br>
		   <button type="button" class="btn btn-default" name="delete" id="ok">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; ok
   </button> 
   <button type="button" class="btn btn-default" name="signIn" id="cancel">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; cancel
   </button> 
   <div>

   <span id="error" style="color:red"> </span>   
   </div>
        </div>  
   
   </div>  
   
      <span id="unfilled_singin" style="color:red"></span>
	   
      </form>
	  <div id="ack"></div>
                </div>
            </div>
           
        </div>
    </section>
	
	   <section id="services2" class="checkin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Check-in the car</h2>
                    
			<form class="form-signin" method="post" id="sign-form"  >
      
        <h2></h2><hr />
       <div class="form-group">
        <input type="text" class="form-control" placeholder="Enter customer email id" name="email" id="email_id" />
        
        </div>
        
		<div class="form-group" id="abc">
           

        
		
</br>
		   <button type="button" class="btn btn-default" name="delete" id="get_details">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; get_details
   </button> 
   </br>
   </br>
   <span id="result_1" style="color:blue"> </span>
   <div>

   <span id="email_error" style="color:red"> </span>   
   </div>
        </div>
		
		
		
		
		<div class="form-group" id="paid">
           

        
		
</br>
		   <button type="button" class="btn btn-default" name="pay" id="pay">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; CheckIn
   </button>

<button type="button" class="btn btn-default" name="c" id="c">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp;Cancel 
   </button>   
   </br>
   
   
        </div>
		
		
        
      
        
        <div class="form-group">
		
        </div>
       
	   
      </form>
	  
                </div>
            </div>
           
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
