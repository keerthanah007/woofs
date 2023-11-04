
<?php 
	include 'customer_header.php';
	$cid=$_SESSION['cust_id'];
	extract($_GET);



	if (isset($_GET['rid'])) {
		extract($_GET);

		$q="delete from tbl_cart_child where cc_id='$rid'";
		delete($q);



	}

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
<center>
<table class="table table-striped table-hover" style="width: 500px">
	<tr>
		<th>Image</th>
		<th>Breed</th>
		<th>Gender</th>
		<th>Age</th>
		<th>Quantity</th>
        <th>Price</th>
       

	</tr>


<?php 
$q="SELECT * FROM tbl_cart_child INNER JOIN tbl_cart_master USING (cm_id)INNER JOIN tbl_order USING (cm_id) INNER JOIN tbl_item USING (item_id)INNER JOIN tbl_breed USING (breed_id)INNER JOIN tbl_gender USING (g_id) where cm_id='$cmid' and cust_id='$cid'";
$res=select($q);
foreach ($res as $key ) 
	{?>
		
		<tr>
			<td><img src="<?php echo $key['image']?>" width="70px" height="70px"></td>
			<td><?php echo $key['breed_name']?></td>
			<td><?php echo $key['gender_name']?></td>
			<td><?php echo $key['age']?></td>
			<td><?php echo $key['c_quantity']?></td>
			<td><?php echo $key['c_tot_price']?></td>
			<td><a href="?rid=<?php echo $key['cc_id'] ?>">Remove</a></td>
			
</tr>



<?php } ?>

<tr>
<td align="center" colspan="8">Total:<?php echo $key['c_tot_amt'] ?></td>
</tr>
<tr>
<td align="center" colspan="8"><a href="payment.php?amo=<?php echo $key['c_tot_amt'] ?>&oid=<?php echo $key['order_id'] ?>">Proceed to payment</a></td>
</tr>
</table>
</center>