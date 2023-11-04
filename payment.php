<?php 
	include 'customer_header.php';
    $cid=$_SESSION['cust_id'];
	extract($_GET);


	if(isset($_POST['submit'])){
		extract($_POST);

		// echo$qc="INSERT INTO `tbl_card` VALUES (null,'$cid','$card_no','$bank_name','$card_type','$exp_date','1')";
		// $id=insert($qc);
		echo$q="insert into tbl_payment values(null,'$oid','$card_no',curdate())";
		insert($q);
		 alert('successfully');
		 return redirect('myorder.php');
}

 ?>



	<div class="container">
			<h4 class="agileits-title"><center>Make Payment</center></h4>
			<div class="contact-agileinfo">
				<div class="col-md-7 contact-right">

	

			<form method="POST">
				<table border="2" class="table" style="width: 400px;height: 400px">
						<tr>
						<th>Amount</th>
						<td><input type="number" required="" value="<?php echo $amo ?>" name="card_no"></td>
					</tr>
					<tr>
						<th>CARD NUMBER</th>
						<td><select name="card_no">

							<option>Select</option>

    	               <option>

    	               	<?php 
                         $q1="select *,concat (card_no,' ',card_type) as card from  tbl_card where cust_id='$cid'";
                         $res=select($q1);

                         foreach ($res as $key ) {
                         	?>
                         	<option value="<?php echo $key['card_id'] ?>"><?php echo $key['card'] ?></option>
                       <?php  
                        }

    	               	 ?>


    	               </option>
    </select></td>

    <td><a href="add_card.php">Add card</a></td>
					</tr>


										
					<tr>
					
					
						<th>EXPIRY DATE</th>
						<td><input type="date" required="" name="exp_date"></td>
					</tr>
										
					<tr>
					
					
						<th>CVV</th>
						<td><input type="text" required="" name="cvv"></td>
					</tr>
					
				<tr>
				        <td colspan="2"><input type="submit" name="submit" value="SAVE" align="center">
				      
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
</div>
</body>

</html>
