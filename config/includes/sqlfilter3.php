<?php
function SQLFilter($val){
// Karakter yang sering digunakan untuk sqlInjection
$char = array ('<','&');

// Hilangkan karakter yang telah disebutkan di array $char
$cleanval = str_replace($char, '', trim($val));

return $cleanval;
}
?>