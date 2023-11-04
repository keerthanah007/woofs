<?php
include 'admin_header.php';
if(isset($_GET['id']))
{
    extract($_GET);
    echo $q="update tbl_vendor set v_status='0' where vendor_id='$id'";
    update($q);
    // return redirect('staff_view.php');
}

if(isset($_GET['uid']))
{
    extract($_GET);
    echo $q="update tbl_vendor set v_status='1' where vendor_id='$uid'";
    update($q);
    // return redirect('staff_view.php');
}

?>

<div class="contact">
		<div class="container">
			<h3 class="agileits-title">View Vendor</h3>
			<div class="contact-agileinfo">
				<div class="col-md-7 contact-right">
					
<form method="POST">
<table border=1  class="table" style="width: 600px">
<tr>
    <th>Name</th>
    <th>Phone Number</th>
    <th>Place</th>
    <th>Breed</th>
    <th>Status</th>
                <th>Action</th>
</tr>
<?php
$q="SELECT * FROM tbl_vendor";
$res=select($q);
foreach ($res as $key ) 
	{
		?>
		<tr>
	<td><?php echo $key['v_name']?></td>
	<td><?php echo $key['v_phno']?></td>
	<td><?php echo $key['v_place']?></td>
	<td><?php echo $key['breed_id']?></td>
	<td><?php echo $key['v_status']?></td>

	<?php 
                        if($key['v_status']=='1')
                            { ?>
                            <td><a href="?id=<?php echo $key['vendor_id']?>" class="btn btn-danger btn-sm">De-activate</a></td>
                    <?php   }
                    else if($key['v_status']=='0'){  ?>
                        <td><a href="?uid=<?php echo $key['vendor_id']?>" class="btn btn-success btn-sm">Activate</a></td>
                <?php    }



                     ?>
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