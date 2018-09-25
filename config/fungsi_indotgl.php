<?php
   function tgl_indo($tgl){
       $bulan=array("0","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		 $tgl2=substr($tgl,8,2);
		$bln=substr($tgl,5,2);
//variabel=namavariabel{huruf ke};
//huruf ke=di hitung dari nol;
 		if ($bln{0}=="0"){
 			$bln2=$bln{1};
		}else{
 			$bln2=$bln;
		}
		$thn=substr($tgl,0,4);
             return $tgl2.' '.$bulan[$bln2].' '.$thn;
     }
   function tgl_indo2($tgl){
		 $tgl2=substr($tgl,8,2);
         return $tgl2;
     }
   function tgl_indo3($tgl){
	       $bulan5=array("0","Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des");
	$bln=substr($tgl,5,2);
 		if ($bln{0}=="0"){
 			$bln2=$bln{1};
		}else{
 			$bln2=$bln;
		}
           return $bulan5[$bln2];
     }
   function tgl_indo4($tgl){
		$thn=substr($tgl,0,4);
        return $thn;
     }
?>
