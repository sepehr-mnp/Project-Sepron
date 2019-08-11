<?php
$id=$_GET['id'];
$data=$_GET['data'];
$sign=$_GET['sign'];
$adrs=$_GET['adrs'];
$from=$_GET['from'];
$fromn=$from."*".$sign;
$datas=$data.$id;
$inp = file_get_contents("trans.json");
$tempArray = json_decode($inp,true);
$prvHSH=$tempArray[sizeof($tempArray)-1]['HSH'];
$mon =0;
for($i=0;$i<sizeof($tempArray);$i+=1){
     if($tempArray[$i]['TRN']['from']==$from){
        $mon-=$tempArray[$i]['TRN']['amount'];
    }
    
    if($tempArray[$i]['TRN']['to']==$from){
        $mon+=$tempArray[$i]['TRN']['amount'];
    }
    }
    
    
    echo $mon;



 if($mon>=10000){
 
 
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
], $from);
$asss = "-----BEGIN PUBLIC KEY-----\n" . wordwrap($asss, 64, "\n", true) . "\n-----END PUBLIC KEY-----";

$resalt=openssl_verify($datas,base64_decode($sign), $asss,OPENSSL_ALGO_SHA512);
}
echo "f";

if($resalt){
    echo "first";
$jsonString = file_get_contents('trans.json');
$trarr= json_decode($jsonString, true);



$siarr= json_decode(file_get_contents('sign.json'), true);
 
$FP=0;
    $SP=0;
    $AG=1;
    $pp=0;
    
    for($i=0;$i<sizeof($siarr);$i++){
     if($siarr[$i][$id]){
      $FP=1;
      $pp=$i;
     if($siarr[$i][$id][$data]){
      $FS=1; 
    for($i2=0;$i2<sizeof($siarr[$i][$id][$data]);$i2++){
    if($siarr[$i][$id][$data][$i2]==$fromn){
        $AG=0;
    }
     }
    } 
     }
    }  
    
    echo $pp;
  
    echo $FP,$FS,$AG;
if($AG){
     if($FP){
        if($SP){
           array_push($siarr[$pp][$id][$data],$fromn);
        }
        else{
    $siarr[$pp][$id][$data][]=$fromn;
        }
    }
    
   else{
        
    
    
array_push($siarr,array(
            $id => array(
                    $data => array(
                        $fromn
                    ))));            
}

$newJsonString = json_encode($trarr);
file_put_contents('trans.json', $newJsonString);


    $inpp = file_get_contents("servers.json");
    $Array = json_decode($inpp,true);
  file_get_contents($Array[0]['adrs']."/con/sign4.php"."?sign=".urlencode(base64_encode($sign))."&from=".urlencode($from)."&data=".$hsh."&id=".$id);
    file_get_contents($Array[1]['adrs']."/con/sign4.php"."?sign=".urlencode(base64_encode($sign))."&from=".urlencode($from)."&data=".$hsh."&id=".$id);
    
}




file_put_contents('sign.json', json_encode($siarr));
}




?>