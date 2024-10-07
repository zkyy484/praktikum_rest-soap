<?php

$url = "https://api.coindesk.com/v1/bpi/currentprice.json";
$response = file_get_contents($url);
if ($response===false) {
    die('Error Cuyy');
}

$data = json_decode($response, true);
// print_r($data);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="text-align: center; background-color: yellow;">
        <h1>BITCOIN PRICE</h1>
    </div>

    <div  style="text-align: center">
        <p>USD : <?php echo $data ['bpi']['USD']['rate'];?></p>
        <p>GBP : <?php echo $data ['bpi']['GBP']['rate'];?></p>
        <p>EUR : <?php echo $data ['bpi']['EUR']['rate'];?></p>
    </div>
</body>
</html>