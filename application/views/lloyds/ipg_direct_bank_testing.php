
<?php  include("ipg-util.php"); 

if(file_exists("ipg-util.php")){
    echo "exist";
}else{
    echo "not";
}
?>

<html>
<head><title>IPG Connect Sample for PHP</title></head>
<body>
<p><h1>Order Form</h1>


<form method="post" action="https://www.ipg-online.com/connect/gateway/processing">
    <!-- <form method="post" action="https://www.ipg-online.com/connect/gateway/processing"> -->
<input type="text" name="txntype" value="sale">
<input type="text" name="timezone" value="Europe/Berlin"/>	
<input type="text" name="txndatetime" value="<?php echo getDateTime() ?>"/>
<input type="text" name="hash_algorithm" value="SHA256"/>
<!-- 978 -->
<input type="text" name="hash" value="<?php echo createHash("13.00","826") ?>"/>
<input type="text" name="storename" value="2206195064"/>
<input type="text" name="mode" value="payonly"/>
<input type="text" name="paymentMethod" value="M"/>
<input type="text" name="chargetotal" value="13.00"/>
<input type="text" name="currency" value="826"/>

<input type="text" name="responseFailURL" value="http://localhost/lloydsbank/sorry.php"/>
<input type="text" name="responseSuccessURL" value="http://localhost/lloydsbank/ok.php"/>

<input type="submit" value="Submit">
</form>
</body>
</html>
