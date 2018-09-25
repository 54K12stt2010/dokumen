<?php
function SQLFilter2($val){
// Karakter yang sering digunakan untuk sqlInjection
//$char = array ('-','/','\\',',','.','#',':',';','\'','"',"'",'[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
$char = array ('"',"'");

// Hilangkan karakter yang telah disebutkan di array $char
$cleanval = str_replace($char, '', trim($val));

return $cleanval;
}
?>