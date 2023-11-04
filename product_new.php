<?php include 'connection.php' ?>

<?php 
	$q="SELECT * FROM tbl_item INNER JOIN `tbl_gender` USING(g_id) INNER JOIN tbl_breed USING(breed_id)";
	
	if(!empty($_GET["q"])){

			$q="SELECT * FROM tbl_item INNER JOIN `tbl_gender` USING (g_id) INNER JOIN tbl_breed USING(breed_id) WHERE ( breed_name LIKE '%".$_GET['q']."%' OR age LIKE '%".$_GET['q']."%'  OR gender_name = '".$_GET['q']."')";
			;
	}



	$res=select($q);

?>

<style>
	* {
		box-sizing: border-box;
		margin: 0;
		padding: 0;
	}
	body {
		height: 100%;
		width: 100vw;
		overflow-x: hidden;
	}
	.product-container {
		width: 70%;
		margin: 20px auto;

	}
	.product-item {
		width: 100%;
		padding: 20px;
		/*border-radius: 10px;*/
		font-family: arial;
		/*box-shadow: 0px 5px 10px 5px rgba(0,0,0,0.25);*/
		border-bottom: 2px solid grey;
		display: flex;
		height: 280px;
		margin-bottom: 20px;
	}
	.product-details {
		padding: 20px;
		display: flex;
		width: 100%;
		flex-direction: column;
		justify-content: space-evenly;
	}
	.product-item img {
		margin-right: 20px;
		width: 300px;
		border-radius: 5px;
		object-fit:cover;
	}
	.btn1{
		padding: 5px 10px;
		background: tomato;
		color: white;
		text-decoration: none;
		border-radius: 5px;
	}			
	form {
		margin-bottom: 25px;
		width: 100%;
		display: flex;
		justify-content: center;
	}	
	input[type="text"] {
		width: 60%;
		padding: 5px 10px;
		border-radius: 5px;
		margin-right: 30px;
	}

	input[type="submit"] {
		padding: 5px 10px;
		background: tomato;
		color: white;
		text-decoration: none;
		border-radius: 5px;
	}
</style>





<!DOCTYPE html>
<html lang="en">

<head>
	<title>Dog Shop | Customer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Pets Care Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Custom Theme files -->
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<!-- easy-responsive-tabs -->

	<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- font-awesome icons -->
	<!-- //Custom Theme files -->
	<!-- js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Junge" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
	    rel='stylesheet' type='text/css'>
	<!-- //web-fonts -->
</head>

<body>
	<!-- banner -->
	<div class="agileits-banner">
		<div class="bnr-agileinfo">
			<div class="banner-top w3layouts">
				<div class="container">
					<ul class="agile_top_section">
						<li>
							<p> </p>
						</li>
						<li>
							<p><span class="glyphicon glyphicon-earphone"></span> +91 9074772635</p>
						</li>
						<li><a class="sign" href="home.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign Out</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="banner-w3text w3layouts">
				<h3 class="w3ls_agile">Woofs </h3>
			</div>
			<!-- navigation -->
			<div class="top-nav w3-agiletop">
				<div class="agile_inner_nav_w3ls">
					<div class="navbar-header w3llogo">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a href="index.html">Woofs</a></h1>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<div class="w3menu navbar-left">
							<ul class="nav navbar">
								<li><a href="home.php" class="active">Home</a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="product_new.php">Your Pet</a></li>
								<li><a href="contact.php">Contact</a></li>
							</ul>
						</div>
						
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- //navigation -->
		</div>
	</div>





<div class="product-container">
	<form>
	<input type="text" name="q" >
	<input type="submit" value="Search">
	</form>
		<?php

foreach ($res as $key ) 
	{
		?>
	<div class="product-item">
		<img src="<?php echo $key['image']?>" /> 
						
		<div class="product-details">
			<h4><?php echo $key['breed_name']?></h4>
						  <p><?php echo $key['gender_name']?></p>
						  <h4><?php echo $key['description']?></h4>
						  <p><?php echo $key['age']?></p>
						  <h4>$<?php echo $key['price']?></h4>
						 <h4><a class="btn1" href="cart.php?item=<?php echo $key['item_id'] ?>&amo=<?php echo $key['price'] ?>&img=<?php echo $key['image'] ?>">ADD To Cart</a></h4>
						 
						 

		</div>
		<style type="text/css">
			

		</style>

	</div>
	<?php  }
?>
	
</div>
