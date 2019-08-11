<?php

$id=$_GET['id'];
if($id){
$adrs="http://wallet1.gigfa.com/az2";
$inp = file_get_contents("trans.json");
$tempArray = json_decode($inp,true);
$hsh=$tempArray[$id-1]['HSH'];
$prvkey="-----BEGIN RSA PRIVATE KEY-----
your 1024bit prvkey
-----END RSA PRIVATE KEY-----";
$pubkey="your 1024bit pubkey";

         ///depends on your php version
$pubkey=urlencode($pubkey);
$pubkey=str_replace("%0A","%20",$pubkey);
$pubkey=str_replace("%0D","",$pubkey);
//
openssl_sign ($hsh.$id,$sign ,$prvkey,OPENSSL_ALGO_SHA512);
         $inpp = file_get_contents("servers.json");
    $Array = json_decode($inpp,true);
 file_get_contents($Array[0]['adrs']."/con/sign4.php"."?sign=".urlencode(base64_encode($sign))."&from=".$pubkey."&data=".$hsh."&id=".$id);
 echo   file_get_contents($Array[1]['adrs']."/con/sign4.php"."?sign=".urlencode(base64_encode($sign))."&from=".$pubkey."&data=".$hsh."&id=".$id);
         echo file_get_contents($Array[2]['adrs']."/con/sign4.php"."?sign=".urlencode(base64_encode($sign))."&from=".$pubkey."&data=".$hsh."&id=".$id);
echo "?sign=".urlencode(base64_encode($sign))."&from=".$pubkey."&data=".$hsh."&id=".$id;
}
?>
