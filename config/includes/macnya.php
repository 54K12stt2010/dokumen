<?php
function get_mac($ipnya){
/*
$output = shell_exec("nbtstat -a $ipnya");
$output = explode("\n",$output);
$mac_line = explode ("=", $output[ sizeof($output)-3 ]);
$mac = trim($mac_line[1]);
return $mac;
*/

exec("arping -I eth0 -c 1 $ipnya", $return_array);
$output	=$return_array[1];
$mac_line = substr($output,2,6) ;
$satu= strpos("$output","[");
$dua= strpos("$output","]");
$mac= substr($output,$satu+1,17);
return $mac;
}
?>