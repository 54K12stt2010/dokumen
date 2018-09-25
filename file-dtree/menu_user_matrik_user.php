<?php

include"koneksi.php";
include"fungsi_menu_matrik_user.php";

$sql=mysqli_query($con,"select * from daftar_isi where standart='4'  ORDER BY menu_order");

while ($row = mysqli_fetch_object($sql)) {
	       $data[$row->parent_id][] = $row;
      }
      $menu = get_menu($data);
      echo "$menu"; 
?>