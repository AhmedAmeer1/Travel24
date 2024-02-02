<style type="text/css">
body {background-color:white;}
#mydiv {
   background-image: url('<?php echo base_url('assets/images/Success.jpg')?>');
   background-repeat:no-repeat;
   background-size:contain;
   height:2000px;width:1200px;
}
</style>
<?php if(!empty($payment)){ ?>
    <h1 class="success">Your Payment has been Successful!</h1>
    <h4>Payment Information</h4>
    <p><b>Reference Number:</b> #<?php echo $payment['id']; ?></p>
    <p><b>Transaction ID:</b> <?php echo $payment['txn_id']; ?></p>
    <p><b>Paid Amount:</b> <?php echo $payment['payment_gross'].' '.$payment['currency_code']; ?></p>
    <p><b>Payment Status:</b> <?php echo $payment['status']; ?></p>
	
    <h4>Payer Information</h4>
    <p><b>Name:</b> <?php echo $payment['payer_name']; ?></p>
    <p><b>Email:</b> <?php echo $payment['payer_email']; ?></p>
	
    <h4>Product Information</h4>
    <p><b>Name:</b> <?php echo $product['name']; ?></p>
    <p><b>Price:</b> <?php echo $product['price'].' '.$product['currency']; ?></p>
<?php }else{ ?>
<html>
    <!-- <h1 class="error">Transaction has been failed!</h1> -->
    <div id="mydiv">
  </div>
   
    </html>
<?php } ?>