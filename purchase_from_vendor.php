
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



<div class="contact">
		<div class="container">
			<h3 class="agileits-title">Purchase From Vendor</h3>
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
<?php } ?>
    
    <h3 class="agileits-title">Update Pet Details</h3>

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