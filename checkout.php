<?php include 'includes/session.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		button, input[type="submit"], input[type="reset"] {
	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
}
	</style>
</head>
<body class="hold-transition skin-blue layout-top-nav">
	<center>
	      <section class="content">
	      	<h1 class="page-header"><u>Checkout</u></h1>
	        		Name:
	        		<?php if(isset($_SESSION['user'])){
 					echo $user['firstname'].' '.$user['lastname'];
	        	     }

	        		?>
	        		<br>
	        		<br>
	        		Payment Method: <select><option>Cash on Delivery</option></select>
	        		<br>
	        		<br>
	        		Delivery Charge: Free
	        		<br>
	        		<br>
	  
		        		<table border="1" cellpadding="5" cellspacing="0">
		        			<thead>
		        				<th></th>
		        				<th>Photo</th>
		        				<th>Name</th>
		        				<th>Price</th>
		        				<th width="20%">Quantity</th>
		        				<th>Subtotal</th>
		        			</thead>
		        			<tbody id="tbody">
		        			</tbody>
		        		</table>
		        		
	      </section>
	      <br>
	      <br>
	        <?php
	        			if(isset($_SESSION['user'])){
	        				echo "
	        					<a href='invoice.php'style='display: inline-block;
								background:#d14b1b;
								color: #fff;
								padding: 8px 30px;
								margin: 30px 0;
								border-radius: 30px;
								transition: background 0.5s;''>Buy Now</a>
	        				";
	        			}
	        			else{
	        				echo "
	        					<h4>You need to <a href='login.php'>Login</a> to checkout.</h4>
	        				";
	        			}
	        		?>
	        		</input>
	        	</form>
	        		<br>
	        		<br>
	        		<a href='cart_view.php'>&#8592Back to Cart</a>
	     
	  </center>
	
	  
</body>

<?php include 'includes/scripts.php'; ?>
<script>
var total = 0;
$(function(){

	getDetails();
	getTotal();

});

function getDetails(){
	$.ajax({
		type: 'POST',
		url: 'cart_details.php',
		dataType: 'json',
		success: function(response){
			$('#tbody').html(response);
			getCart();
		}
	});
}

function getTotal(){
	$.ajax({
		type: 'POST',
		url: 'cart_total.php',
		dataType: 'json',
		success:function(response){
			total = response;
		}
	});
}
</script>
</html>