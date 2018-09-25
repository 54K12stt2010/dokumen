<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="refresh" content="30">

  <script type="text/javascript" src="../../assets/DataTables/media/js/jquery.js"></script>
  <script type="text/javascript" src="../../assets/DataTables/media/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/DataTables/media/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="../../assets/DataTables/media/css/dataTables.bootstrap.css">
</head> 
<?php
$con=mysqli_connect("localhost","root","ujta9119","db_reap");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$checkin = date('m/d/Y');

$checkout = date('m/d/Y', strtotime("+1 day", strtotime($checkin)));
//membangun koneksi
$username="review";
$password="review";
$database="192.168.1.199/navpr";
 
$koneksi=oci_connect($username,$password,$database);
 
if($koneksi){
//echo "Koneksi berhasil";
}else{
$err=oci_error();
echo "Gagal tersambung ke ORACLE". $err['text'];
} ?>

    
    <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo"$sh_act";?></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">



<?php
date_default_timezone_get('Asia/Jakarta');
$tahun=date("Y");
$bulan=date("m");
$ttg=date("d");
$awal="$ttg-$bulan-$tahun";

$lama_j=$c_jenis[lama_ijin];
$tambah_tanggal = mktime(0,0,0,$bulan,$ttg+1,$tahun); // angka 2,7,1 yang dicetak tebal bisa dirubah rubah
$tambah = date('d-m-Y',$tambah_tanggal);

echo"$awal $tambah";
$query = "SELECT 
   a.rdistrik_kode,a.rkunit_kode,a.runit_kode,d.runit_nama,

   to_char(tgl_awal, 'YYYY-MM-DD') as tanggal_awal,
   to_char(TGL_akhir, 'YYYY-MM-DD') as tanggal_akhir,
   tgl_awal,jam_awal,
   case when tgl_akhir < tgl_awal then round(sysdate)
        else TGL_akhir    
   end  AS TGL_AKHIR, 
   case when tgl_akhir < tgl_awal then null
        else jAM_akhir    
   end  AS JAM_AKHIR, 
   a.rstatkin_kode,b.rstatkin_nama,
   a.rcc_kode,c.rcc_kode_asli,c.rcc_desk,tukin_derate,tukin_notes
from (       
        SELECT rdistrik_kode,rkunit_kode,runit_kode,
           tukin_tgl as Tgl_Awal,tukin_jam as Jam_Awal,
           Lead(TUKIN_TGL)
           OVER(ORDER BY RDISTRIK_KODE,RKUNIT_KODE,RUNIT_KODE,TUKIN_TGL,TUKIN_JAM) TGL_AKHIR,
           Lead(TUKIN_JAM)
           OVER(ORDER BY RDISTRIK_KODE,RKUNIT_KODE,RUNIT_KODE,TUKIN_TGL,TUKIN_JAM) JAM_AKHIR,
           rstatkin_kode,tukin_derate, rcc_kode, 
           tukin_notes
        FROM T_UKINERJA 
     ) a 
     
     inner join
     r_stat_kinerja b on a.RSTATKIN_KODE=b.RSTATKIN_KODE
     inner join r_unit d on a.rdistrik_kode=d.rdistrik_kode
                            and a.rkunit_kode = d.rkunit_kode
                            and a.runit_kode = d.runit_kode
     left join r_ccode c on a.RCC_KODE = c.RCC_KODE 
WHERE
    a.rdistrik_kode= 'UT'
    -- HILANGKAN COMMENT DI BAWAH INI UNTUK MENCARI DATA SPESIFIK SUATU KODE KINERJA
    -- and a.rstatkin_kode = '110'
    and tgl_awal between to_date('$awal','DD-MM-YYYY') and to_date('$tambah','DD-MM-YYYY') 
    
ORDER BY
   a.rdistrik_kode,a.rkunit_kode,a.runit_kode, tgl_awal desc,jam_awal desc";
//echo "$query";
echo "
    <table class='table table-striped table-bordered data'>
<thead>

<tr>
<th align='center' width='30px'> NO </th>
<th>KODE DISTIK </th>
<th>KODE KUNIT</th>
<th>KODE UNIT</th>
<th>NAMA UNIT</th>
<th>TANGGAL AWAL </th>
<th>JAM AWAL </th>
<th>TANGGAL AKHIR</th>
<th>JAM AKHIR</th>
<th>SELISIH JAM</th>
<th>SELISIH MENIT</th>
<th>KODE STATUS </th>
<th>STATUS DESKRIPSI </th>
<th>KODE RCC </th>
<th>KODE ELLIPSE </th>
<th>RCC DESKRIPSI </th>
<th>DERATING </th>
<th>CATATAN DERATING </th>

</tr>
</thead>
";

$stid = oci_parse($koneksi, $query);
$r = oci_execute($stid);
$no=1;
echo "<tbody>";
while ($row = oci_fetch_array($stid, OCI_NUM+OCI_RETURN_NULLS+OCI_ASSOC)) 

{




if($row[RCC_KODE]<>""){


$tgl_awal_sel="$row[TGL_AWAL]  $row[JAM_AWAL]";
$tgl_akhir_sel="$row[TGL_AKHIR]   $row[JAM_AKHIR]";

$awal  = strtotime($tgl_awal_sel);
$akhir = strtotime($tgl_akhir_sel);
$diff  = $akhir - $awal;

$jam   = floor($diff / (60 * 60));
$menit = $diff - $jam * (60 * 60);
$show_menit =floor( $menit / 60 );


if(($jam>=0) && ($jam<=9)){

  $sh_jam="0$jam";
}else{
  $sh_jam="$jam";
}


if(($show_menit>=0) && ($show_menit<=9)){

  $sh_menit="0$show_menit";
}else{
  $sh_menit="$show_menit";
}

$SEL_JAM[]=$sh_jam;
$SEL_MENIT[]=$sh_menit;
$RDISTRIK_KODED[]="$row[RDISTRIK_KODE]";
$RKUNIT_KODED[]="$row[RKUNIT_KODE]";
$RUNIT_KODED[]="$row[RUNIT_KODE]";
$RUNIT_NAMAD[]="$row[RUNIT_NAMA]";
$TGL_AWALD[]="$row[TANGGAL_AWAL]";
$JAM_AWALD[]="$row[JAM_AWAL]";
$TGL_AKHIRD[]="$row[TANGGAL_AKHIR]";
$JAM_AKHIRD[]="$row[JAM_AKHIR]";
$RSTATKIN_KODED[]="$row[RSTATKIN_KODE]";
$RSTATKIN_NAMAD[]="$row[RSTATKIN_NAMA]";
$RCC_KODED[]="$row[RCC_KODE]";
$RCC_KODE_ASLID[]="$row[RCC_KODE_ASLI]";
$RCC_DESKD[]="$row[RCC_DESK]";
$TUKIN_DERATED[]="$row[TUKIN_DERATE]";
$TUKIN_NOTESD[]="$row[TUKIN_NOTES]";

echo "<tr  height='10px'>";
echo "<td  height='10px'>$no</td>";
echo "<td >$row[RDISTRIK_KODE] </td>";
echo "<td >$row[RKUNIT_KODE]</td>";
echo "<td >$row[RUNIT_KODE] </td>";
echo "<td >$row[RUNIT_NAMA]  </td>";
echo "<td >$row[TANGGAL_AWAL] </td>";
echo "<td >$row[JAM_AWAL] </td>";
echo "<td >$row[TANGGAL_AKHIR] </td>";
echo "<td >$row[JAM_AKHIR] </td>";
echo "<td >$sh_jam  Jam</td>";
echo "<td >$sh_menit Menit</td>";
echo "<td >$row[RSTATKIN_KODE]</td>";
echo "<td >$row[RSTATKIN_NAMA] </td>";
echo "<td >$row[RCC_KODE] </td>";
echo "<td >$row[RCC_KODE_ASLI] </td>";
echo "<td >$row[RCC_DESK] </td>";
echo "<td >$row[TUKIN_DERATE]</td>";
echo "<td >$row[TUKIN_NOTES] </td>";

echo "</tr>";
$no++;

}
}
$jum=$no-1;
echo"<input type=hidden name=jum_to value='$jum' >";
echo "</tbody>";
echo "</table>";
$stid = oci_parse($koneksi, $query);
$r = oci_execute($stid);

$sampai=$jum;
for($no=0;$no<$sampai;$no++){

if($RCC_KODED[$no]<>""){
// cek data apakah sudah ada
  $notiket="$TICKETIDD[$no]";
  $cek=mysqli_query($con,"select *from log_navitas  where jam_awal = '$JAM_AWALD[$no]' and   tgl_awal ='$TGL_AWALD[$no]' and    kode_rcc='$RCC_KODED[$no]' ");
  $h=mysqli_num_rows($cek);
  if($h>0){}else{


   mysqli_query($con,"INSERT INTO log_navitas (id_log_navitas,
            distrik,
            kel_unit,
            kode_unit,
            nama_unit,
            tgl_awal,
            jam_awal,
            tgl_akhir,
            jam_akhir,
            kode_status,
            desk_status,
            kode_rcc,
            cause_code,
            code_desk,
            derating,
            catatan,
            selisih_jam,
            selisih_menit)
    VALUES('',
    '$RDISTRIK_KODED[$no]',
    '$RKUNIT_KODED[$no]',
    '$RUNIT_KODED[$no]',
    '$RUNIT_NAMAD[$no]',
    '$TGL_AWALD[$no]',
    '$JAM_AWALD[$no]',
    '$TGL_AKHIRD[$no]',
    '$JAM_AKHIRD[$no]',
    '$RSTATKIN_KODED[$no]',
    '$RSTATKIN_NAMAD[$no]',
    '$RCC_KODED[$no]',
    '$RCC_KODE_ASLID[$no]',
    '$RCC_DESKD[$no]',
    '$TUKIN_DERATED[$no]',
    '$TUKIN_NOTESD[$no]',
    '$SEL_JAM[$no]',
    '$SEL_MENIT[$no]')");
 }
}
}?>


<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>
</html>