<?php
$rty=$_GET['mas'];
$ytr=$_GET['cwt'];

echo $ytr;
//echo "<script>alert(3);</script>";

$file1 = fopen("okrug.txt", "a");
	fwrite($file1, $rty."&#".$ytr."&");
fclose($file1);
 
?>