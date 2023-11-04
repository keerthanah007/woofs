<?php 
	include 'customer_header.php';
    $cid=$_SESSION['cust_id'];
	extract($_GET);


	if(isset($_POST['submit'])){
		extract($_POST);

		echo$qc="INSERT INTO `tbl_card` VALUES (null,'$cid','$card_no','$bank_name','$card_type','$exp_date','1')";
		 $id=insert($qc);

		  alert('successfully');
		 return redirect("add_card.php");
		
}

 ?>
 <div class="container">
			<h4 class="agileits-title"><center>ADD NEW CARD</center></h4>
			<div class="contact-agileinfo">
				<div class="col-md-7 contact-right">

	

 <form method="POST">
				<center><table border="2" class="table" style="width: 400px;height: 400px" ></center>
						<tr>
						<th>Card Number</th>
						<td><input type="text" required="" name="card_no"></td>
					</tr>
					<tr>
						<th>BANK NAME</th>
						<td><input type="text" required="" name="bank_name"></td>
					</tr>
					<tr>
						<th>CARD TYPE</th>
						<td><input type="text" required="" name="card_type"></td>
					</tr>
					<tr>
				
						<th>EXPIRY DATE</th>
						<td><input type="date" required="" name="exp_date"></td>
					</tr>
					
					<tr>
				        <td colspan="6"><input type="submit" name="submit" value="SAVE" align="center">
				      
				</tr>

			</table>
		</form>