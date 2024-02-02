<html>
<head><title>IPG Connect Sample for PHP</title></head>
<body>
<p><h1>Proceeding to LLoyds Bank Payment System....</h1>


<form method="post" action="https://www.ipg-online.com/connect/gateway/processing">
    <!-- <form method="post" action="https://www.ipg-online.com/connect/gateway/processing"> -->
<input type="hidden" name="txntype" value="sale">
<input type="hidden" name="timezone" value="Europe/Berlin"/>	
<?php date_default_timezone_set("Europe/Berlin"); ?>
<input type="hidden" name="txndatetime" value="<?php echo   $dateTime ?>"/>
<input type="hidden" name="hash_algorithm" value="SHA256"/>
<input type="hidden" name="hash" value="<?php echo $createHash ?>"/>
<input type="hidden" name="storename" value="2206195064"/>
<input type="hidden" name="mode" value="payonly"/>
<input type="hidden" name="paymentMethod" value="M"/>
<input type="hidden" name="chargetotal" value="<?php echo $total?>"/>
<input type="hidden" name="currency" value="826"/>

<input type="hidden" name="responseFailURL" value="<?php echo base_url('index/lloyds_failure') ?>"/>
<input type="hidden" name="responseSuccessURL" value="<?php echo base_url('index/lloyds_success' ) ?>"/>

<input type="submit" style="display:none" id="submit" value="Submit">
</form>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script>

setTimeout(function(){ 
   
    $("#submit").click();
    }, 
    2000);



    function redirectToPage() {
  // Check if the URL is provided
  if (url) {
    // Redirect to the specified URL
    window.location.href = url;
  } else {
    // If no URL is provided, display an error message
    console.error("No URL provided for redirection.");
  }
}


</script>