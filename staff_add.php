<?php 
	include 'admin_header.php';

	if(isset($_POST['submit'])){
		extract($_POST);

		$q="SELECT * FROM `tbl_login` WHERE `username`='$username' ";
		$res=select($q);
		// print_r($res);
		if(sizeof($res)>0){
		
			alert('Username already taken!');
		
	}
	else{
		$qw="INSERT INTO `tbl_login` VALUES ('$username','$password','staff','1')";
		insert($qw);
		$qs="INSERT INTO `tbl_staff` VALUES (null,'$username','$s_fname','$s_lname','$s_gender','$s_dob','$password',
		'$s_phone','$s_hno','$s_street','$s_district','$s_pin','1')";
		insert($qs);
}
}

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

if (isset($_GET['upid'])) {
	extract($_GET);

	$q2="select * from tbl_staff where staff_id='$upid'";
	$res=select($q2);
}
if (isset($_POST['update'])) {
	extract($_POST);

	echo $q="update tbl_staff set s_fname='$s_fname',s_lname='$s_lname',s_gender='$s_gender',s_dob='$s_dob',s_phone='$s_phone', s_hno='$s_hno', s_street='$s_street', s_district='$s_district', s_pin='$s_pin'where staff_id='$upid'";
	update($q);
}

 ?>

	<div class="container">
			<h3 class="agileits-title">Add Staff </h3>
			<div class="contact-agileinfo">
				<div class="col-md-7 contact-right">

	

			<form method="POST">
				<?php if (isset($_GET['upid'])) { ?>
				<table border="2" class="table" style="width: 600px">
					<!-- <tr> 
						<th>STAFF ID</th>
						<td><input type="text" required="" name="Staff_ID"></td>
					 </tr> -->
					<tr>
						<th>FIRST NAME</th>
						<td><input type="text" required=""  value="<?php echo $res[0]['s_fname'] ?>" name="s_fname"></td>
					</tr>
					<tr>
						<th>LAST NAME</th>
						<td><input type="text" required="" value="<?php echo $res[0]['s_lname'] ?>" name="s_lname"></td>
					</tr>
					<tr>
						<th>GENDER</th>
						<td><input type="radio" name="s_gender" value="female">Female<input type="radio" name="s_gender" value="male">Male</td>
					</tr>
					<tr>
						<th>DATE OF BIRTH</th>
						<td><input type="date" required="" value="<?php echo $res[0]['s_dob'] ?>" name="s_dob"></td>
					</tr>
					
		            <tr>
						<th>PHONE NUMBER</th>
						<td><input type="number" value="<?php echo $res[0]['s_phone'] ?>" name="s_phone" min="0"></td>
					</tr>
					<tr>
						<th>HOUSE NUMBER</th>
						<td><input type="text" value="<?php echo $res[0]['s_hno'] ?>" name="s_hno"></td>
					</tr>
					<tr>
						<th>STREET NAME</th>
						<td><input type="text" value="<?php echo $res[0]['s_street'] ?>" name="s_street"></td>
					</tr>
					<tr>
					    <th>DISTRICT</th>
					    <td>
					    	<select name="s_district">
					    		<option value="TVM">TVM</option>
					    		<option value="ALA">ALA</option>
					    		<option value="ERN">ERN</option>
					    		<option value="IDU">IDU</option>
					    		<option value="KAN">KAN</option>
					    		<option value="KOZ">KOZ</option>
					    		<option value="KOL">KOL</option>
                                <option value="KOT">KOT</option>
					    		<option value="KAS">KAS</option>
					    		<option value="MAL">MAL</option>
					    		<option value="PAT">PAT</option>
					    		<option value="PAL">PAL</option>
					    		<option value="THR">THR</option>
					    		<option value="WAY">WAY</option>
					        </select></td>
                    
						</tr>
					<tr>
						<th>PINCODE</th>
						<td><input type="number" value="<?php echo $res[0]['s_pin'] ?>" name="s_pin"></td>
					</tr>
				<tr>
				        <td colspan="2"><input type="submit" name="update" value="SAVE" align="center">
				 </td>
				</tr>
			</table>
		<?php }else{?>
			<table border="2" class="table" style="width: 600px">
					<!-- <tr> 
						<th>STAFF ID</th>
						<td><input type="text" required="" name="Staff_ID"></td>
					 </tr> -->
					<tr>
						<th>FIRST NAME</th>
						<td><input type="text" required="" name="s_fname"></td>
					</tr>
					<tr>
						<th>LAST NAME</th>
						<td><input type="text" required="" name="s_lname"></td>
					</tr>
					<tr>
						<th>GENDER</th>
						<td><input type="radio" name="s_gender" value="female">Female<input type="radio" name="s_gender" value="male">Male</td>
					</tr>
					<tr>
						<th>DATE OF BIRTH</th>
						<td><input type="date" required="" name="s_dob"></td>
					</tr>
					<tr>
						<th>EMAIL</th>
						<td><input type="email" name="username"></td>
					</tr>
					<tr>
						<th>PASSWORD</th>
						<td><input type="password" name="password" required=""></td>
					</tr>
					<tr>
						<th> CONFIRM PASSWORD</th>
						<td><input type="password" name=" confirm password" required=""></td>
					</tr>
					
				    <tr>
						<th>DATE OF JOINING</th>
						<td><input type="date" required="" name="s_join"></td>
					</tr>
						<th>PHONE NUMBER</th>
						<td><input type="number" name="s_phone" min="0"></td>
					</tr>
					<tr>
						<th>HOUSE NUMBER</th>
						<td><input type="text" name="s_hno"></td>
					</tr>
					<tr>
						<th>STREET NAME</th>
						<td><input type="text" name="s_street"></td>
					</tr>
					<tr>
					    <th>DISTRICT</th>
					    <td>
					    	<select name="s_district">
					    		<option value="TVM">TVM</option>
					    		<option value="ALA">ALA</option>
					    		<option value="ERN">ERN</option>
					    		<option value="IDU">IDU</option>
					    		<option value="KAN">KAN</option>
					    		<option value="KOZ">KOZ</option>
					    		<option value="KOL">KOL</option>
                                <option value="KOT">KOT</option>
					    		<option value="KAS">KAS</option>
					    		<option value="MAL">MAL</option>
					    		<option value="PAT">PAT</option>
					    		<option value="PAL">PAL</option>
					    		<option value="THR">THR</option>
					    		<option value="WAY">WAY</option>
					        </select></td>
                    
						</tr>
					<tr>
						<th>PINCODE</th>
						<td><input type="number" name="s_pin"></td>
					</tr>
				<tr>
				        <td colspan="2"><input type="submit" name="submit" value="SAVE" align="center">
				        <input type="reset" name="" value="RESET" align="center"></td>
				</tr>
			</table>
		<?php } ?>
			</form>
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
                <th>Action</th>
</tr>
<h3 class="agileits-title">Upadte Staff</h3>
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

	<?php 
                        if($key['s_status']=='1')
                            { ?>
                            <td><a href="?id=<?php echo $key['staff_id']?>" class="btn btn-danger btn-sm">De-activate</a></td>
                    <?php   }
                    else if($key['s_status']=='0'){  ?>
                        <td><a href="?uid=<?php echo $key['staff_id']?>" class="btn btn-success btn-sm">Activate</a></td>
                <?php    }



                     ?>
                      <td><a href="?upid=<?php echo $key['staff_id']?>" class="btn btn-success btn-sm">Update</a></td>

	</tr>
<?php
}

?>
</table>

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