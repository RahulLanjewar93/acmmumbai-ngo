<?php
$fp =fopen("./xyz.csv",'w');
$a = array (1,2,3,4,5);
fputcsv($fp,$a);
fclose($fp);
?>