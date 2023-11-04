

<?php 
	include 'connection.php';

	 if(isset($_POST['add'])){
	 	extract($_POST);

	//  	$q="SELECT * FROM `tbl_login` WHERE `username`='$username'";
	//  	$res=select($q);
		
	//  	if(sizeof($res)>0){
			
	//  		alert('Username already taken!');
	//  	}
	//  else{
         // $qw="INSERT INTO tbl_login VALUES ('$username','$password','staff')";
         // insert($qw);
         $qp="INSERT INTO tbl_item VALUES (null,'$gender_name','$breed_name','$des','$image','$age','$price',
         '$stock','1')";
         insert($qp);

}

 ?>

 <!DOCTYPE html>
<html lang="en">

<head>
	<title>Dog Shop | View_Pets</title>
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
	<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- font-awesome icons -->
	<!-- //Custom Theme files -->
	<!-- js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
	    rel='stylesheet' type='text/css'>
	<!-- //web-fonts -->
</head>

<body>
	<!-- banner -->
	<div class="agileits-banner about-w3banner">
		<div class="bnr-agileinfo">
			<div class="banner-top w3layouts">
				<div class="container">
					<ul class="agile_top_section">
						<li>
						</li>
						<li>
							<p><span class="glyphicon glyphicon-earphone"></span> +91  </p>
						</li>
						<li><a class="sign" href="home.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign Out</a>							</li>
					</ul>
				</div>
			</div>
			<div class="banner-w3text w3layouts">


				<h2>Woofs</h2>
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
								<li><a href="home.php">Home</a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="gallery.html">Gallery</a></li>
								<li><a href="contact.php" class="active">Contact</a></li>
							</ul>
						</div>
						
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- //navigation -->
		</div>
	</div>

<div class="contact">
		<div class="container">
			<h3 class="agileits-title">View Pets</h3>
			<div class="contact-agileinfo">
				<div class="col-md-7 contact-right">
					
<form method="POST">
<table border=1  class="table" style="width: 600px">
<tr>
    <th>Breed Name</th>
    <th>Gender</th>
    <th>Description</th>
    <th>Image</th>
    <th>Age</th>
    <th>Price</th>
    <th>Stock</th>
</tr>
<?php
$q="SELECT * FROM tbl_item INNER JOIN `tbl_gender` USING(gender_id) INNER JOIN tbl_breed USING(breed_id)";
$res=select($q);
foreach ($res as $key ) 
	{
		?>
		<tr>
	<td><?php echo $key['breed_name']?></td>
	<td><?php echo $key['gender_name']?></td>
	<td><?php echo $key['description']?></td>
	<td><img src="<?php echo $key['image']?>" width="70px" height="70px"></td>
	<td><?php echo $key['age']?></td>
	<td><?php echo $key['price']?></td>
	<td><?php echo $key['stock']?></td>
	</tr>
<?php
}

?>
</table>   
    </form>
				
				
					
				
	<!-- //contact -->
	<!-- password-script -->
	<script type="text/javascript">
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

<script src="js/SmoothScroll.min.js"></script>
	<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/bootstrap.js"></script>
</body>
</html>