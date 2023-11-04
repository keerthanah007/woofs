<?php 
	include 'admin_header.php';

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
         echo$qb="INSERT INTO tbl_breed VALUES (null,'$breed_name','1')";
         insert($qb);

}

 ?>

 

<div class="contact">
		<div class="container">
			<h3 class="agileits-title">Add Breed</h3>
			<div class="contact-agileinfo">
				<div class="col-md-7 contact-right">
					
<form method="POST">
<table border=1  class="table" style="width: 600px">
<tr>
    <th>Breed Name</th>
    <td><input type="text" name="breed_name"></td>
</tr>
<tr>
    <td colspan="2"><input type="submit" value="ADD" name="add" align="center">
    </td>
    </tr>
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