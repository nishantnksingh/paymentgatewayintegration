<?php 
include('header.php');
?>
<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg


//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {

		?>
		<div style=" width: 500px; border-radius: 3vw; box-shadow: 15px 15px 15px 5px #A8A8A8; margin: 100px auto; background-color: rgb(32,56,100); padding-top: 30px; padding-bottom: 25px;"> <?php 
		
		echo "<div style='color:white; font-size:30px; font-weight:bold; text-align: center; margin-bottom:20px; padding-top: 20px; padding-bottom:40px;'>Transaction Status </div>";
		echo "<div style='background-color:white; width: 100%;'><img src='success.png' width='30%' height='30%' style=' display: block; margin: 0 auto; padding-top: 30px;'></img></div>";
		echo "<div style='color:green;font-size:30px; text-align: center; background-color:white;'>Transaction Status is Success </div>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		if(isset($_POST['ORDERID']) && isset($_POST['TXNAMOUNT'])){ //our if 2
			$order_id=$_POST['ORDERID'];
			$status=$_POST['STATUS'];
			$respmsg=$_POST['RESPMSG'];
			$amount=$_POST['TXNAMOUNT'];
			$date=$_POST['TXNDATE'];
			?>
			<div style="background-color: white; width: 100%; text-align: center;">
			<table style="font-size: 1.2vw; text-align: center;margin-left: 30px; background-color: white; display: block; padding-bottom: 20px;">		
				<tr style="margin-left: 30px;">
					<td>Status :</td>
					<td> <?php echo $respmsg; ?></td>
				</tr>
				<tr>
					<td>Transaction Status :</td>
					<td> <?php echo $status; ?></td>
				</tr>
				<tr>
					<td>Donation Amount :</td>
					<td> <?php echo $amount; ?></td>
				</tr>
				<tr>
					<td>Donation Date :</td>
					<td><?php echo $date; ?></td>
				</tr>
			</table>

		</div>
		<div style="text-align: center; color: white; display: block; margin-top: 20px; ">Secured by Paytm</div>
		</div>
		<?php 	
			
	}
}
	else {
		?>
		<div style=" width: 500px; border-radius: 3vw; box-shadow: 15px 15px 15px 5px #A8A8A8; margin: 100px auto; background-color: rgb(32,56,100); padding-top: 30px;">
			<?php 
				echo "<div style='color:white; font-size:30px; font-weight:bold; text-align: center; margin-bottom:20px; padding-top: 20px; padding-bottom:40px;'>Transaction Status</div>";
				echo "<div style='background-color:white; width: 100%;'><img src='fail.png' width='30%' height='30%' style=' display: block; margin: 0 auto; padding-top: 50px;'></img></div>";
			echo "<p style='color:red; font-size:1.2vw;; background-color: white; text-align: center; display: block; padding-bottom: 60px;'>Transaction Status is Failure</p>";
			?>
			<div style="text-align: center; color: white; display: block; margin-top: 20px; padding-bottom: 30px; ">Secured by Paytm</div>
		</div>
		</div>
		<?php
		
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		
				
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>

<?php
include('footer.php');
?>