
<?php 
	include 'customer_header.php';
	$cid=$_SESSION['cust_id'];
	extract($_GET);
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
<table class="table" style="width: 500px">
	<tr>
		<th>Slno</th>
		<th>Total Amount</th>
		<th>status</th>
		
       

	</tr>


<?php 



$q="SELECT * FROM tbl_cart_child INNER JOIN tbl_cart_master USING (cm_id)INNER JOIN tbl_order USING (cm_id) INNER JOIN tbl_item USING (item_id)INNER JOIN tbl_breed USING (breed_id)INNER JOIN tbl_gender USING (g_id) where cust_id='$cid'";
$res=select($q);
$sino=1;
foreach ($res as $key ) 
	{?>
		
		<tr>
			<td><?php echo $sino++ ?></td>
			
			<td><?php echo $key['c_tot_amt']?></td>
			<td><?php echo $key['cart_status']?></td>
			<td><a href="customer_cart.php?cmid=<?php echo $key['cm_id'] ?>">Details</a></td>

			
</tr>


<?php } ?>
</table>
</center>