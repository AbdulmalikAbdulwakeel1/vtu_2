<?php
if(isset($_POST['submit'])){
$phone= $_POST['phone'];
$bundle=$_POST['bundle'];

//buy data

$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.gladtidingsdata.com/api/data/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode([
    "network" => 3,
"mobile_number" =>  $phone,
"plan" =>  $bundle,
"Ported_number" => true,
// "payment_medium" =>  payment_medium // NOTE: This field/parameter is optional, It is mainly for those that wants to use Data wallet.... Mediums are \'MAIN WALLET\' or \'MTN SME DATA BALANCE\' or \'MTN CG DATA BALANCE\' or \'AIRTEL CG DATA BALANCE\'
  ]),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Token cc0354d62854d3b9d1cc10b9c208d8d48e545492',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$err= curl_error($curl);
if($err){
    die("error". $err);
}
echo "<pre>". $response ."</pr>";

}



// buy card

if(isset($_POST['buy-card'])){
        $phone=$_POST['phone'];
        $network=$_POST['network'];
        $amount=$_POST['amount']; 

$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.gladtidingsdata.com/api/topup/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode([
    "network"=> $network,
"amount" => $amount,
"mobile_number" => $phone,
"Ported_number"=> true,
"airtime_type" => "VTU"

  ]),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Token cc0354d62854d3b9d1cc10b9c208d8d48e545492',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

}



//buy waec card

if (isset($_POST['buy-pin'])){
$examname=$_POST['examname'];
$quantity=$_POST['quantity'];

$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.gladtidingsdata.com/api/epin/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode([
    "exam_name"=>$examname,
"quantity"=> $quantity 
  ]),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Token cc0354d62854d3b9d1cc10b9c208d8d48e545492',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
}


//print card

if(isset($_POST['print-card'])){

$card_id=$_POST['card_id'];
$amount= $_POST['amount'];
$qty=$_POST['qty'];

$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.gladtidingsdata.com/api/rechargepin/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode([
    "network" =>  1, //$card_id, // Mtn id = 1
"network_amount"=> 100, // Mtn N100 id = 1
"quantity"=> $qty, // 1,2 0r 5
"name_on_card" => "alaran"
  ]),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Token cc0354d62854d3b9d1cc10b9c208d8d48e545492',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
}

//cable

if(isset($_POST['pay_meter'])){
  $card_id=$_POST['card_id'];
  $plan_id=$_POST["plan_id"];
  $card_number=$_POST['card_number'];


  

$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.gladtidingsdata.com/api/cablesub/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode([
    "cablename"=> $card_id,
    "cableplan"=> $plan_id,
    "smart_card_number"=> $card_number
  ]),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Token cc0354d62854d3b9d1cc10b9c208d8d48e545492',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <label for="">select data bundle</label>
    <select name="bundle" id="" required>
        <option value="">select data buldle</option>
        <option value="167">MTN 2.0 GB [&#8358;510.0] SME, 30days validity</option>
        <option value="168">MTN 3.0 GB [&#8358;765.0] SME, 30days validity</option>
        <option value="169">MTN 5.0 GB [&#8358;1275.0] SME, 30days validity</option>
        <option value="179">MTN 500.0 MB [&#8358;127.5] SME, 30days validity</option>
    </select>
    <label for="number">Number</label>
    <input type="number" name="phone" placeholder="enter your phone number" required>
    <input type="submit" value="buy" name="submit" />
    </form>

<br><br><br>

    <div>Buy airtime</div>
    <form action="" method="POST">
        <label for="">number</label>
        <input type="number" placeholder="input your number" name="phone" required>

        <select name="network" id="">
        <option value="">select network type</option>
        <option value="1">MTN</option>
        <option value="2">GLO</option>
        <option value="3">AIRTEL</option>
        <option value="6">9MOBILE</option>
        <option value="7">SMILE</option>
    </select>
    <input type="number" name="amount" placeholder="amount" required>
    <input type="submit" name="buy-card" value="buy Card" required>
    <?php
  
?>
    </form>
<br><br><br>
<div>
  result checker
  <form action="" method="POST">
   <label for="">Exam type</label>
        <select name="examname" id="" required>
        <option value="">select</option>
        <option value="WAEC">WAEC</option>
        <option value="NECO">NECO</option>
        <option value="NABTEB">NABTEB</option>
    </select>

    <label for="">quantity to buy</label>
    <input type="number" name="quantity" required placeholder="input quantity to buy">

    <input type="submit" name="buy-pin">
  </form>
</div>


<br><br><br>
<br><br>
<div>print card</div>
<form action="" method="POST">
  <label for="">Network Type</label>
  <select name="card_id" id="" required>

    <option value="1">MTN [&#8358;100.0]</option>
    <option value="2">GLO [&#8358;100]</option>
    <option value="3">AIRTEL [&#8358;100]</option>
    <option value="4">9MOBLIE [&#8358;100]</option>
    <option value="5">MTN [&#8358;200]</option>
    <option value="6">GLO [&#8358;200]</option>
    <option value="7">AIRTEL [&#8358;200]</option>
    <option value="8">MTN [&#8358;500]</option>
    <option value="9">MTN [&#8358;1000]</option>
    <option value="10">GLO [&#8358;500]</option>
    <option value="11">AIRTEL [&#8358;200]</option>
    <option value="12">9MOBILE [&#8358;200]</option>
  </select>

  <label for="">amount</label>
  <input type="number" name="amount" required>

  <label for="">Quantity</label>
  <input type="number" name="qty" required>

  <input type="submit" name="print-card">
</form>
 
<br><br><br><br><br>

<div>Smart card</div>
<form action="" method="POST">
<label for="">cable name</label>
<select name="card_id" id="" required>
  <option value="">Choose type</option>
  <option value="1">GOTV </option>
  <option value="2">DSTV </option>
  <option value="3">STARTIME </option>
</select>

<label for="">Plan</label>
<select name="plan_id" id="" required>
<option value="2">gotv max [&#8358;5700]</option>
<option value="6">dstv yanga [&#8358;4200]</option>
<option value="7">dstv compact [&#8358;12500]</option>
<option value="8">dstv compact plus [&#8358;19800]</option>
<option value="9">dstv premium [&#8358;29500]</option>
<option value="16">gotv jinja [&#8358;2700]</option>
</select>
<label for="">cable number</label>
<input type="text" name="card_number" required>

<input type="submit" name="pay_meter">
</form>
</body>
</html>