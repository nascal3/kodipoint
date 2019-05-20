<?php 

include '../_database/database.php';

$ipn =  file_get_contents('php://input');

$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
fwrite($myfile, $ipn);
fclose($myfile);

$ipndecode = json_decode($ipn);

$transtype = $ipndecode->{"transactionType"};
$account = $ipndecode->{"accountId"};
$amount = $ipndecode->{"amount"};
$secretkey = $ipndecode->{"secretKey"};
$paysource = $ipndecode->{"paymentSource"};
$postdate = $ipndecode->{"postingDate"};
$valdate = $ipndecode->{"valueDate"};

$sql ="INSERT INTO re_ipn(transaction_type,account_id,amount,payment_source,posting_date,value_date) VALUES('$transtype','$account','$amount','$amount','$paysource','$postdate','$valdate')";

mysqli_query($conn,$sql) or die(mysqli_error($conn));

$responses = array();
$responses[]= array("description"=>"Success","responseCode"=>"0001","thirdPartyReference"=>" ");

header("Content-type: application/json");
 
//send response
echo json_encode($responses);

mysqli_close($conn);
?>