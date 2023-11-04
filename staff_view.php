<?php
include 'admin_header.php';
if(isset($_GET['id']))
{
    extract($_GET);
    echo $q="update tbl_staff set s_status='0' where staff_id='$id'";
    update($q);
    // return redirect('staff_view.php');
}

if(isset($_GET['uid']))
{
    extract($_GET);
    echo $q="update tbl_staff set s_status='1' where staff_id='$uid'";
    update($q);
    // return redirect('staff_view.php');
}

?>


<div class="contact">
		<div class="container">
			<h3 class="agileits-title">View Staff</h3>
			<div class="contact-agileinfo">
				<div class="col-md-7 contact-right">
					
<form method="POST">
<table border=1  class="table" style="width: 600px">
<tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Gender</th>
    <th>Date Of Birth</th>
    <th>Phone Number</th>
    <th>Email</th>
    <th>House Number</th>
    <th>Street Name</th>
    <th>District</th>
    <th>Pincode</th>
    <th>Status</th>
  
</tr>
<?php
$q="SELECT * FROM tbl_staff";
$res=select($q);
foreach ($res as $key ) 
	{
		?>
		<tr>
	<td><?php echo $key['s_fname']?></td>
	<td><?php echo $key['s_lname']?></td>
	<td><?php echo $key['s_gender']?></td>
	<!-- <td><img src="<?php echo $key['image']?>" width="70px" height="70px"></td> -->
	<td><?php echo $key['s_dob']?></td>
	<td><?php echo $key['s_phone']?></td>
	<td><?php echo $key['username']?></td>
	<td><?php echo $key['s_hno']?></td>
	<td><?php echo $key['s_street']?></td>
	<td><?php echo $key['s_district']?></td>
	<td><?php echo $key['s_pin']?></td>
	<td><?php echo $key['s_status']?></td>

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