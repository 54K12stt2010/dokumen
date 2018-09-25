<?php
/**
 * Hijri Date Converter Helper class file.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.helpers
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
//class HijriHelper extends AppHelper {

/**
 * Converts a date to hijri format 
 * @param string $date yyyy-mm-dd. 
 * @param boolean $monthname, set to true to get full monthname like Muharram or false for number.
 * @access public
 */
	function convertHijri($date,$monthname=true) {
	   $y = substr($date,0,4);
	   $m = substr($date,5,2);
	   $d = substr($date,8,2);
      if (($y>1582)||(($y==1582)&&($m>10))||(($y==1582)&&($m==10)&&($d>14))){
        $jd=(int)((1461*($y+4800+(int)(($m-14)/12)))/4)+(int)((367*($m-2-12*((int)(($m-14)/12))))/12)-(int)( (3* ((int)(  ($y+4900+    (int)( ($m-14)/12))/100)))/4)+$d-32075;
      } else {
        $jd = 367*$y-(int)((7*($y+5001+(int)(($m-9)/7)))/4)+(int)((275*$m)/9)+$d+1729777;
      }
			$l=$jd-1948440+10632;
			$n=(int)(($l-1)/10631);
			$l=$l-10631*$n+354;
			$j=((int)((10985-$l)/5316))*((int)((50*$l)/17719))+((int)($l/5670))*((int)((43*$l)/15238));
			$l=$l-((int)((30-$j)/15))*((int)((17719*$j)/50))-((int)($j/16))*((int)((15238*$j)/43))+29;
			$m=(int)((24*$l)/709);
			$d=$l-(int)((709*$m)/24);
			$y=30*$n+$j-30;

  if(!$monthname){ // return basic
    return($d.'-'.$m.'-'.$y);
  } else { // return full
    switch ($m){
      case 1:
        $mn = 'Muharram';
      break;
      case 2:
        $mn = 'Safar';
      break;
      case 3:
        $mn = 'Rabiulawal';
      break;
      case 4:
        $mn = 'Rabiulakhir';
      break;
      case 5:
        $mn = 'Jamadilawal';
      break;
      case 6:
        $mn = 'Jamadilakhir ';
      break;
      case 7:
        $mn = 'Rejab';
      break;
      case 8:
        $mn = 'Syaaban';
      break;
      case 9:
        $mn = 'Ramadhan';
      break;
      case 10:
        $mn = 'Syawal';
      break;
      case 11:
        $mn = 'Zulkaedah';
      break;
      case 12:
        $mn = 'Zulhijjah';
      break;            
    }
    return($d.' '.$mn.' '.$y);
  }
  }
	function convertHijri2($date,$monthname=true) {
	   $y = substr($date,0,4);
	   $m = substr($date,5,2);
	   $d = substr($date,8,2);
      if (($y>1582)||(($y==1582)&&($m>10))||(($y==1582)&&($m==10)&&($d>14))){
        $jd=(int)((1461*($y+4800+(int)(($m-14)/12)))/4)+(int)((367*($m-2-12*((int)(($m-14)/12))))/12)-(int)( (3* ((int)(  ($y+4900+    (int)( ($m-14)/12))/100)))/4)+$d-32075;
      } else {
        $jd = 367*$y-(int)((7*($y+5001+(int)(($m-9)/7)))/4)+(int)((275*$m)/9)+$d+1729777;
      }
			$l=$jd-1948440+10632;
			$n=(int)(($l-1)/10631);
			$l=$l-10631*$n+354;
			$j=((int)((10985-$l)/5316))*((int)((50*$l)/17719))+((int)($l/5670))*((int)((43*$l)/15238));
			$l=$l-((int)((30-$j)/15))*((int)((17719*$j)/50))-((int)($j/16))*((int)((15238*$j)/43))+29;
			$m=(int)((24*$l)/709);
			$d=$l-(int)((709*$m)/24);
			$y=30*$n+$j-30;

  if(!$monthname){ // return basic
    return($d.'-'.$m.'-'.$y);
  } else { // return full
    switch ($m){
      case 1:
        $mn = 'Muharram';
      break;
      case 2:
        $mn = 'Safar';
      break;
      case 3:
        $mn = 'Rabiulawal';
      break;
      case 4:
        $mn = 'Rabiulakhir';
      break;
      case 5:
        $mn = 'Jamadilawal';
      break;
      case 6:
        $mn = 'Jamadilakhir ';
      break;
      case 7:
        $mn = 'Rejab';
      break;
      case 8:
        $mn = 'Syaaban';
      break;
      case 9:
        $mn = 'Ramadhan';
      break;
      case 10:
        $mn = 'Syawal';
      break;
      case 11:
        $mn = 'Zulkaedah';
      break;
      case 12:
        $mn = 'Zulhijjah';
      break;            
    }
    return($d);
  }
  }
	function convertHijri3($date,$monthname=true) {
	   $y = substr($date,0,4);
	   $m = substr($date,5,2);
	   $d = substr($date,8,2);
      if (($y>1582)||(($y==1582)&&($m>10))||(($y==1582)&&($m==10)&&($d>14))){
        $jd=(int)((1461*($y+4800+(int)(($m-14)/12)))/4)+(int)((367*($m-2-12*((int)(($m-14)/12))))/12)-(int)( (3* ((int)(  ($y+4900+    (int)( ($m-14)/12))/100)))/4)+$d-32075;
      } else {
        $jd = 367*$y-(int)((7*($y+5001+(int)(($m-9)/7)))/4)+(int)((275*$m)/9)+$d+1729777;
      }
			$l=$jd-1948440+10632;
			$n=(int)(($l-1)/10631);
			$l=$l-10631*$n+354;
			$j=((int)((10985-$l)/5316))*((int)((50*$l)/17719))+((int)($l/5670))*((int)((43*$l)/15238));
			$l=$l-((int)((30-$j)/15))*((int)((17719*$j)/50))-((int)($j/16))*((int)((15238*$j)/43))+29;
			$m=(int)((24*$l)/709);
			$d=$l-(int)((709*$m)/24);
			$y=30*$n+$j-30;

  if(!$monthname){ // return basic
    return($d.'-'.$m.'-'.$y);
  } else { // return full
    switch ($m){
      case 1:
        $mn = 'Muharram';
      break;
      case 2:
        $mn = 'Safar';
      break;
      case 3:
        $mn = 'Rabiulawal';
      break;
      case 4:
        $mn = 'Rabiulakhir';
      break;
      case 5:
        $mn = 'Jamadilawal';
      break;
      case 6:
        $mn = 'Jamadilakhir ';
      break;
      case 7:
        $mn = 'Rejab';
      break;
      case 8:
        $mn = 'Syaaban';
      break;
      case 9:
        $mn = 'Ramadhan';
      break;
      case 10:
        $mn = 'Syawal';
      break;
      case 11:
        $mn = 'Zulkaedah';
      break;
      case 12:
        $mn = 'Zulhijjah';
      break;            
    }
    return($mn);
  }
  }
  	function convertHijri4($date,$monthname=true) {
	   $y = substr($date,0,4);
	   $m = substr($date,5,2);
	   $d = substr($date,8,2);
      if (($y>1582)||(($y==1582)&&($m>10))||(($y==1582)&&($m==10)&&($d>14))){
        $jd=(int)((1461*($y+4800+(int)(($m-14)/12)))/4)+(int)((367*($m-2-12*((int)(($m-14)/12))))/12)-(int)( (3* ((int)(  ($y+4900+    (int)( ($m-14)/12))/100)))/4)+$d-32075;
      } else {
        $jd = 367*$y-(int)((7*($y+5001+(int)(($m-9)/7)))/4)+(int)((275*$m)/9)+$d+1729777;
      }
			$l=$jd-1948440+10632;
			$n=(int)(($l-1)/10631);
			$l=$l-10631*$n+354;
			$j=((int)((10985-$l)/5316))*((int)((50*$l)/17719))+((int)($l/5670))*((int)((43*$l)/15238));
			$l=$l-((int)((30-$j)/15))*((int)((17719*$j)/50))-((int)($j/16))*((int)((15238*$j)/43))+29;
			$m=(int)((24*$l)/709);
			$d=$l-(int)((709*$m)/24);
			$y=30*$n+$j-30;

  if(!$monthname){ // return basic
    return($d.'-'.$m.'-'.$y);
  } else { // return full
    switch ($m){
      case 1:
        $mn = 'Muharram';
      break;
      case 2:
        $mn = 'Safar';
      break;
      case 3:
        $mn = 'Rabiulawal';
      break;
      case 4:
        $mn = 'Rabiulakhir';
      break;
      case 5:
        $mn = 'Jamadilawal';
      break;
      case 6:
        $mn = 'Jamadilakhir ';
      break;
      case 7:
        $mn = 'Rejab';
      break;
      case 8:
        $mn = 'Syaaban';
      break;
      case 9:
        $mn = 'Ramadhan';
      break;
      case 10:
        $mn = 'Syawal';
      break;
      case 11:
        $mn = 'Zulkaedah';
      break;
      case 12:
        $mn = 'Zulhijjah';
      break;            
    }
    return($y);
  }
  }

//}