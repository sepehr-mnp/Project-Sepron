<?php
$from=$_GET["from"];
$to=$_GET["to"];
$amount=$_GET["amount"];
$per=$_GET["per"];
$to2=$_GET["to2"];
$data=$_GET["data"];
$sign=$_GET["sign"];
$inp = file_get_contents("trans.json");
$tempArray = json_decode($inp,true);
$prvHSH=$tempArray[sizeof($tempArray)-1]['HSH'];
$mon =0;
$mine=500;
$date=date("Y/m/d");


for($i=0;$i<sizeof($tempArray);$i+=1){
     if($tempArray[$i]['TRN']['from']==$from){
        $mon-=$tempArray[$i]['TRN']['amount'];
    }
    
    if($tempArray[$i]['TRN']['to']==$from){
        $mon+=$tempArray[$i]['TRN']['amount'];
    }
    
    
for($s=0;$s<sizeof($tempArray[$i]["RAY"]);$s+=1){
   
  $tempArray[$i]["RAY"][$s] = explode(",",$tempArray[$i]["RAY"][$s]);
    if($tempArray[$i]["RAY"][$s][0]==$from){
     $mon+=$tempArray[$i]["MINE"];
    }
}
    }
    echo $mon;

for($i=0;$i<sizeof($tempArray);$i+=1){
     if($tempArray[$i]['TRN']['sign']==$sign){
        $amount = 0;
    }
    }

if(($mon>=$amount) && ($amount>0)){
 $asss=$from;
 
$asss = str_replace([
    '-----BEGIN RSA PUBLIC KEY-----',
    '-----END RSA PUBLIC KEY-----',
    "\r\n",
    "\n",
], [
    '',
    '',
    "\n",
    ''
], $asss);

$asss = "-----BEGIN PUBLIC KEY-----\n" . wordwrap($asss, 64, "\n", true) . "\n-----END PUBLIC KEY-----";

$datas =$data.$from.$to.$amount.$per.$to2;

$signature= $sign;

  $result = openssl_verify($datas,base64_decode($signature), $asss,OPENSSL_ALGO_SHA512);
 $sray=0;

if($result){
      $ass = sizeof($tempArray); 
    
$signs = json_decode( file_get_contents("sign.json"),true);
for($i=0;$i<sizeof($signs);$i+=1){
     if($signs[$i][$ass]){
        $prvsigns=$signs[$i][$ass][$prvHSH];
    }}
   $prvsignshsh="";
    sort($prvsigns);
    for($i=0;$i<sizeof($prvsigns);$i+=1){
      $prvsignshsh = $prvsignshsh.$prvsigns[$i];
    }
    echo $prvsignshsh;

  
  $hsh= hash('sha512',$ass.$from.$to.$amount.$per.$to2.$data.$sign.$mine.$prvsignshsh.$date.$prvHSH);
   echo $hsh;
           array_push($tempArray,array(
                'ID'=>$ass,
                'TRN'=>array(
                    'from' => $from,
                    'to' => $to,
                    'amount' => $amount,
                    'per' => $per,
                    'to2' => $to2,
                    'data' => $data,
                    'sign' => $sign
                    ),
                    'DATE'=>$date,
                'HSH'=> $hsh,
                'MINE'=>$mine,
    		    'RAY' =>  $prvsigns
            ));
            $jsonData = json_encode($tempArray);
            file_put_contents("trans.json", $jsonData);
            echo "fine";
              $inp = file_get_contents("servers.json");
    $Array = json_decode($inp,true);
    file_get_contents($Array[0]['adrs']."/con/tst4.php?"."from=".urlencode($from)."&amount=".urlencode($amount)."&to=".urlencode($to)."&data=".urlencode($data)."&sign=".urlencode($sign)."&to2=".urlencode($to2)."&per=".urlencode($per));
     file_get_contents($Array[1]['adrs']."/con/tst4.php?"."from=".urlencode($from)."&amount=".urlencode($amount)."&to=".urlencode($to)."&data=".urlencode($data)."&sign=".urlencode($sign)."&to2=".urlencode($to2)."&per=".urlencode($per));
    echo file_get_contents("http://wallet2.gigfa.com/con/sign3.php?id=".strval(intval($ass)+1));
    echo $ass;
            
}
}


 

?>