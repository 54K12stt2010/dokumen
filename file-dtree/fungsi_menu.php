<?php

      function get_menu($data, $parent = 0) {
	      static $i = 1;
	      $tab = str_repeat(" ", $i);
	      if ($data[$parent]) {
		      $html = "$tab<ul id='menu-tree' class='filetree'>";
		      $i++;
		      foreach ($data[$parent] as $v) {
			       $child = get_menu($data, $v->id_menu);
			       $html .= "$tab<li>";
			       $html .= '<a href="?module=detail_daftarisi&standart='.$v->standart.'&daftar_isi='.$v->id_menu.'">'.$v->title.'</a>';
			       if ($child) {
				       $i--;
				       $html .= $child;
				       $html .= "$tab";
			       }
			       $html .= '</li>';
		      }
		      $html .= "$tab</ul>";
		      return $html;
	      } 
        else {
		      return false;
	      }
      }

?>