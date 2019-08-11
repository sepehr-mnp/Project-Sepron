<?php

$id=$_GET['id'];
if($id){
$adrs="http://wallet1.gigfa.com/az2";
$inp = file_get_contents("trans.json");
$tempArray = json_decode($inp,true);
$hsh=$tempArray[$id-1]['HSH'];
$prvkey="-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQCUtUXO2WN7l6bjJa1TKk7EPoSfLZR8GQVbqYFlP6HpNfV92Kuk
0YbOldXKI/9Tu87JRGOL4+kmTo1W35hchokwevX8Ue6CVyQ4ft3a3bEsOKHw866S
jK4Dfdkp3rCXY8uCuxE9jIgF+e9tO8pD8sDeI65RerklJ0OGbUZcr6SG4QIDAQAB
AoGATiDvDD4qhkSm6bBh38/akkBGbVsFKC39Iqtr0EYeSuiOkg/EHlP2/5K5P/qp
qtSBUD0eD+EuHXInz/ypj/MfIAoM8DCnCOatNaThYYoEWSd3q5ahm3se0juaEpbb
hYwDXugyyzyu+XP9r7qBzkYOyiEyyAvVV20N7s3PEmEXOAECQQDjYHHmyMqSU6dh
nudyHsM5r/hijgCPXWvpTUb0PhYwIuCbr7+/K+w9vqoknKm9JmRjIEdER3GyTE2V
jf7sBUNVAkEAp22c/nvkZT7AFmm6eRboMbwPTPwIvCrm2TabLTKIC59F9lPJG3Ci
hBuPSEv9mcnwWr+yMXef7ga3r0o1b5DNXQJAWf2H1wFNO1CkhHxxubb3KVO+CLOP
AS7GUNXm6S/RdEe5gaSzTSRDIcTebhMbEuOpA5p42ks0co7EfhZu+Fa06QJAUKUE
nLNyRK4f+eu9TPwSpXoO6KbxUilb/j5GKlQPoYF7QnYDBTuQnA9mSY2Ivp29Lwjs
vNUA7LbBnSYibPWTZQJBAKrsjdYPxW6qwBf9NztYVpQusZEpz6S3yeGMOEEHXQ7q
ASo5HDPhCUS0rwfzCh+dDPpg/ms2sNNR4sN6Hf+lc7c=
-----END RSA PRIVATE KEY-----";
$pubkey="MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCUtUXO2WN7l6bjJa1TKk7EPoSf
LZR8GQVbqYFlP6HpNfV92Kuk0YbOldXKI/9Tu87JRGOL4+kmTo1W35hchokwevX8
Ue6CVyQ4ft3a3bEsOKHw866SjK4Dfdkp3rCXY8uCuxE9jIgF+e9tO8pD8sDeI65R
erklJ0OGbUZcr6SG4QIDAQAB";

$pubkey=urlencode($pubkey);
$pubkey=str_replace("%0A","%20",$pubkey);
$pubkey=str_replace("%0D","",$pubkey);

openssl_sign ($hsh.$id,$sign ,$prvkey,OPENSSL_ALGO_SHA512);
         $inpp = file_get_contents("servers.json");
    $Array = json_decode($inpp,true);
 file_get_contents($Array[0]['adrs']."/con/sign4.php"."?sign=".urlencode(base64_encode($sign))."&from=".$pubkey."&data=".$hsh."&id=".$id);
 echo   file_get_contents($Array[1]['adrs']."/con/sign4.php"."?sign=".urlencode(base64_encode($sign))."&from=".$pubkey."&data=".$hsh."&id=".$id);
         echo file_get_contents("http://wallet4.gigfa.com/con/sign4.php"."?sign=".urlencode(base64_encode($sign))."&from=".$pubkey."&data=".$hsh."&id=".$id);
echo "?sign=".urlencode(base64_encode($sign))."&from=".$pubkey."&data=".$hsh."&id=".$id;
}
?>