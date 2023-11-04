<?php 
	include 'customer_header.php';
	$cid=$_SESSION['cust_id'];
	extract($_GET);

	 if(isset($_POST['add'])){
	 	extract($_POST);
	 	     $r="select * from tbl_item where item_id='$item' ";
	 	     $res=select($r);
	 	     echo $quantity;
	 	     echo $item;
	 		if($quantity>$res[0]['stock'])
	 		{

	 			alert ('Quantity exceeded!!!');
	 		}
	 		elseif($quantity<=$res[0]['stock'])
	 	{
	 	$q="select * from  tbl_cart_master where cust_id='$cid' and cart_status='pending'";
	 	$res=select($q);
	 	if (sizeof($res)>0) {

	 		$cmid=$res[0]['cm_id'];

	 		$q0="SELECT * FROM  `tbl_cart_master` INNER JOIN `tbl_cart_child` USING(`cm_id`) WHERE `cm_id`='$cmid' AND `item_id`='$item'";
	 		$temp=select($q0);
	 		if (sizeof($temp)>0) 
	 		{
	 			//  $a="update tbl_item set stock=stock-'$quantity' where item_id='$item'";
	 			// update($a);
	 			$c="update tbl_cart_master set c_tot_amt=c_tot_amt+'$c_tot_price' where cm_id='$cmid'";
	 			update($c);
	 			$v="update tbl_cart_child set c_quantity=c_quantity+'$quantity'  where cm_id='$cmid'";
	 			update($v);
	 		}
	 		else{
	 				$c="update tbl_cart_master set c_tot_amt=c_tot_amt+'$c_tot_price' where cm_id='$cmid'";
	 			update($c);
	 			// $b="update tbl_item set stock=stock-'$quantity' where item_id='$item'";
	 			// update($b);
	 				 $wr="insert into tbl_cart_child values(null,'$cmid','$item','$quantity','$price')";
        insert($wr);


        alert('sucessful');
        return redirect("customer_cart.php?cmid=$cmid");
	 		}
	 		
	 	}else
	 	{
         
   $qb="INSERT INTO tbl_cart_master VALUES (null,'$cid','pending','$c_tot_price')";
         $iid=insert($qb);
        echo $c="update tbl_item set stock=stock-'$quantity' where item_id='$item'";
	 			update($c);

           $wr="insert into tbl_cart_child values(null,'$iid','$item','$quantity','$price')";
        insert($wr);
       
       echo $q="insert into tbl_order values(null,'$iid',curdate())" ;
        insert($q);

       
    }

   
}
alert('sucessful');
        return redirect("customer_cart.php?cmid=$cmid");
}


 ?>


<script type="text/javascript">
	function TextOnTextChange()
	{
		var x =document.getElementById("p_amount").value;
		var y =document.getElementById("p_qnty").value;
		var s=parseFloat(x)*parseFloat(y)
		document.getElementById("t_am").value =  s;
		
		// alert(s)
		// alert(y)
		// alert(q)
	}

</script> 




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






<div class="product-container">
	<form method="post">
	

	<div class="product-item">
		<img src="<?php echo $img ?>" /> 
						
		<div class="product-details">
			<h4>Price: <input type="text" id="p_amount" style="width: 100px" value="<?php echo $amo ?>" name="price"></h4>
						  <h4>Quantity:<input type="text" id="p_qnty" style="width: 100px" onchange="TextOnTextChange()"  name="quantity"></h4>
						  <h4>Total:<input type="text" id="t_am" style="width: 100px" name="c_tot_price"></h4>
						 
					  <h4><input type="submit" value="ADD" name="add" align="center"></h4>
						  

		</div>
		<style type="text/css">
			

		</style>

	</div>
	
	</form>
</div>
<!-- 
<div class="contact">
		<div class="container">
			<h3 class="agileits-title">Add to Cart</h3>
			<div class="contact-agileinfo">
				<div class="col-md-7 contact-right"> -->

					
<!-- <form method="POST">
<table border=1  class="table" style="width: 600px">
<tr>
    <th></th>
    <td><input type="text" id="p_amount" value="<?php echo $amo ?>" name="price"></td>
</tr>
<tr>
    <th>Quantity</th>
    <td><input type="text" id="p_qnty" onchange="TextOnTextChange()"  name="quantity"></td>
</tr>
<tr>
    <th>Total Amount</th>
    <td></td>
</tr>
<tr>
    <td colspan="2"><input type="submit" value="ADD" name="add" align="center">
    </td>
    </tr>
</table>
    </form>
				 -->
				
					
				
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