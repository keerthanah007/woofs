<?php 
	include 'admin_header.php';

	
if(isset($_POST['update'])){
		extract($_POST);
	echo$qw="INSERT INTO `tbl_vaccination` VALUES (null,'$item','$vacc_type','$vacc_date','$vacc_dose')";
		insert($qw);
}

 ?>

	<div class="container">
			<h3 class="agileits-title">Update Vaccination </h3>
			<div class="contact-agileinfo">
				<div class="col-md-7 contact-right">

	

			<form method="POST">
				<table border="2" class="table" style="width: 600px">
					<!-- <tr> 
						<th>STAFF ID</th>
						<td><input type="text" required="" name="Staff_ID"></td>
					 </tr> -->
                   <tr>
                   	<th>Breed & Gender</th>
                   	<td><select name="item">
                   		<option>Select</option>
                   		<?php 

                        $q="SELECT * ,CONCAT (tbl_breed.`breed_name`) AS breedname ,CONCAT (tbl_gender.gender_name) AS gendername ,concat (tbl_item.age) as age FROM tbl_item  INNER JOIN tbl_breed USING( breed_id) INNER JOIN tbl_gender USING (g_id) ";

                        $res=select($q);

                         foreach ($res as $key ) {
                         	?>
                         <option value="<?php echo $key['item_id'] ?>"><?php echo $key['breedname'] ?>&<?php echo $key['gendername'] ?>&<?php echo $key['age'] ?></option>
                         <?php
                     }
                   		 ?>
                   	</select></td>

                   </tr>


					<tr>
						<th>VACCINATION TYPE</th>
						<td><input type="text" required="" name="vacc_type"></td>
					</tr>
					<tr>
						<th>VACCINATI0N DATE</th>
						<td><input type="date" required="" name="vacc_date"</td>
					</tr>
					<tr>
						<th>VACCINATION DOSE</th>
						<td><input type="number" name="vacc_dose" min="0"></td>
					</tr>
					

    <td colspan="2"><input type="submit" value="ADD" name="update" align="center">
    </td>
    </tr>
			</table>
			</form>

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