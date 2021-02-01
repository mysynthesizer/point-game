<?php
$rty=$_GET['id'];
$ytr=$_GET['cwt'];

if($ytr=="00ff00"){
	mail("opanoll@yandex.ru", "new tochka", "new tochka a");
	$body=file_get_contents("http://sms.ru/sms/send?api_id=4BAFF889-32D9-43CC-FF19-44EFAFEB53C4&to=380993285428&text=".urlencode(iconv("windows-1251","utf-8","novaya tochka")));
}

echo $ytr;

$file1 = fopen("daten.txt", "a");
	fwrite($file1, $rty."&#".$ytr."&");
fclose($file1);
 
?>