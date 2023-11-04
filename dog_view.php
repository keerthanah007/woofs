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

	 	$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		 $qp="INSERT INTO tbl_item VALUES (null,'$gender_name','$breed_name','$description','$target','$age','$price',
         '$stock','1')";
         insert($qp);
	
	}
	
		// else
		// {
		// 	echo "file uploading error occured";
		// }
	
	


         

}
if(isset($_GET['id']))
{
    extract($_GET);
    echo $q="update tbl_item set i_status='0' where item_id='$id'";
    update($q);
    // return redirect('staff_view.php');
}

if(isset($_GET['uid']))
{
    extract($_GET);
    echo $q="update tbl_item set i_status='1' where item_id='$uid'";
    update($q);
    // return redirect('staff_view.php');
}

if (isset($_GET['upid'])) {
	extract($_GET);

	$q2="select * from tbl_item where item_id='$upid'";
	$res=select($q2);
}
if (isset($_POST['update'])) {
	extract($_POST);
	$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))

	echo$q="update tbl_item set description='$description',image='$target',age='$age',price='$price',stock='$stock' where item_id='$upid'";
	update($q);
 }
// 	else
// 		{
// 			echo "file uploading error occured";
// 		}
	
	
	
	




 ?>

 <!DOCTYPE html>
<html lang="en">

<head>
	<title>Dog Shop | Staff_Manages_Pet</title>
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
							<p><span class="glyphicon glyphicon-earphone"></span>+91 9074772635 </p>
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
								<li><a href="about.php" >About</a></li>
								<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span data-letters="Pages">Add</span><span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="staff_add.php">Staff</a></li>
										<li><a href="staff_manages_pet.php">Dog</a></li>
										<li><a href="vendor_add.php">Vendor</a></li>
									    
									</ul>
								</li>

								<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span data-letters="Pages">View</span><span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="staff_view.php">Staff</a></li>
										<li><a href="breed_view.php">Dog</a></li>
									    <li><a href="vendor_view.php">Vendor</a></li>
									    <li><a href="customer_view.php">Customer</a></li>
									</ul>
								</li>

								<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span data-letters="Pages">Report</span><span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="icons.html">Staff</a></li>
										<li><a href="purchase.php">Purchase</a></li>
									    <li><a href="sales.php">Sales</a></li>
									</ul>
								</li>
								
							</ul>
						</div>
						
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- //navigation -->
		</div>
	</div>

<!-- <div class="contact">
		<div class="container">
			<h3 class="agileits-title">Add Pets</h3>
			<div class="contact-agileinfo">
				<div class="col-md-7 contact-right">
					
<form method="POST"  enctype="multipart/form-data">
	<?php if (isset($_GET['upid'])) { ?>

<table border=1  class="table" style="width: 600px">

<tr>

    <th>Description</th>
    <td><textarea name="description" rows="10" cols="60" value="<?php echo $res[0]['description'] ?>"></textarea></td>
</tr>
<tr>
    <th>Image</th>
    <td><input type="file" name="imgg" value="<?php echo $res[0]['image'] ?>"></td>
</tr>
<tr>
    <th>Age</th>
    <td><input type="text" name="age" value="<?php echo $res[0]['age'] ?>"></td>
</tr>
<tr>
    <th>Price</th>
    <td><input type="text" name="price" value="<?php echo $res[0]['price'] ?>"></td>
</tr>
<tr>
    <th>Stock</th>
    <td><input type="text" name="stock" value="<?php echo $res[0]['stock'] ?>" ></td>
</tr>
<tr>
    <td colspan="2"><input type="submit" value="ADD" name="update" align="center">
    </td>
    </tr>
</table>
<?php }else{?>




<table border=1  class="table" style="width: 600px">
<tr>
    <th>Breed Name</th>
    <td><select name="breed_name">
    	<?php
    	$q="SELECT * FROM `tbl_breed`";
    	$res=select($q);
    	foreach ($res as $row) {?>
    		
<option value="<?php echo $row['breed_id'] ?>"><?php echo $row['breed_name'] ?></option>

    		<?php
    	}
    	?>
    </select>
    </td>
</tr>
<tr>
    <th>Gender</th>
    <td><select name="gender_name">
    	<?php
    	$q="SELECT * FROM `tbl_gender`";
    	$res=select($q);
    	foreach ($res as $row) {?>
    		
<option value="<?php echo $row['g_id'] ?>"><?php echo $row['gender_name'] ?></option>

    		<?php
    	}
    	?>
    </select>
    </td>
</tr>
<tr>
    <th>Description</th>
    <td><textarea name="description" rows="10" cols="60"></textarea></td>
</tr>
<tr>
    <th>Image</th>
    <td><input type="file" name="imgg"></td>
</tr>
<tr>
    <th>Age</th>
    <td><input type="text" name="age"></td>
</tr>
<tr>
    <th>Price</th>
    <td><input type="text" name="price"></td>
</tr>
<tr>
    <th>Stock</th>
    <td><input type="text" name="stock"></td>
</tr>
<tr>
    <td colspan="2"><input type="submit" value="ADD" name="add" align="center">
    </td>
    </tr>
</table>
<?php } ?>-->
    
    <h3 class="agileits-title"> Pet Details</h3>

<table border=1  class="table" style="width: 600px">
<tr>
    <th>Breed Name</th>
    <th>Gender</th>
    <th>Description</th>
    <th>Image</th>
    <th>Age</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Item Status</th>
    <th>Action</th>
</tr>
<?php
$q="SELECT * FROM tbl_item INNER JOIN `tbl_gender` USING(g_id) INNER JOIN tbl_breed USING(breed_id)";
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
	<td><?php echo $key['i_status']?></td>
	
	<?php 
                        if($key['i_status']=='1')
                            { ?>
                            <td><a href="?id=<?php echo $key['item_id']?>" class="btn btn-danger btn-sm">De-activate</a></td>
                    <?php   }
                    else if($key['i_status']=='0'){  ?>
                        <td><a href="?uid=<?php echo $key['item_id']?>" class="btn btn-success btn-sm">Activate</a></td>
                <?php    }



                     ?>
                      <td><a href="?upid=<?php echo $key['item_id']?>" class="btn btn-success btn-sm">Update</a></td>

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