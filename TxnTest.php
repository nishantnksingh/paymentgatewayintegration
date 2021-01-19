<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

?>
<?php
	include('header.php');
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
</head>
<body>
	<div style=" width: 30%; height: 70%; border-radius: 3vw; box-shadow: 15px 15px 15px 5px #A8A8A8; margin: 100px auto; background-color: rgb(32,56,100);">
	<img src="cartt.png" width="30%;" height="30%;" style="margin-left: 35%;"></img>
	
	<form method="post" action="pgRedirect.php" style="background-color: white;">
		<table style="margin: 30px auto;  font-size: 1.2vw; background-color: white;" >
			<tbody>
				<tr style="background-color: white;">
					<td ><label>DONATION_ID*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					</td>
				</tr>
				<tr style="background-color: white;">
					<td><label>DONAR_ID*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></td>
				</tr>
				<!-- 
					<td><label>INDUSTRY_TYPE_ID*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td> 
				</tr> 
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr> -->
				<tr style="background-color: white;">
					
					<td><label>DONATION_Amount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="1">
					</td>
				</tr>
				
				<tr>
				   <td></td>
                    <br>
					<td><input value="CheckOut" type="submit"	onclick=""  class="btn btn-success btn-lg" style="margin: 40px auto;"></td>
				</tr>
			
			</tbody>
		</table>
	
		 <!-- * - Mandatory Fields -->
	</form>
	<p style="color: white; text-align: center; margin-bottom: 30px;">Secured by Paytm</p>
</div>
</body>
</html>
<?php
	include('footer.php');
	?>
