
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
$database="192.168.1.157/primary";

$koneksi=oci_connect($username,$password,$database);

if($koneksi){
//echo "Koneksi berhasil";
}else{
  $err=oci_error();
  echo "Gagal tersambung ke ORACLE". $err['text'];
} ?>





<?php

date_default_timezone_get('Asia/Jakarta');
$tahun=date("Y");
$bulan=date("m");
$ttg=date("d");
$awal="$tahun-$bulan-$ttg";

$lama_j=$c_jenis[lama_ijin];
$tambah_tanggal = mktime(0,0,0,$bulan,$ttg+1,$tahun); // angka 2,7,1 yang dicetak tebal bisa dirubah rubah
$tambah = date('Y-m-d',$tambah_tanggal);

echo"Hasil Penarikan Data Maximo Pada Tanggal : $awal ";
$query = "SELECT
ticketid,
assetnum,
description,             
to_char(reportdate, 'yyyy-mm-dd') as tanggal_data,
to_char(reportdate, 'HH24:MI:SS') as jam_data,
status,
reportedby,
faultpriority,
faulttype,
reportdate,
to_char(statusdate, 'yyyy-mm-dd') as statusdate,
to_char(targetfinish, 'yyyy-mm-dd') as targetfinish,
to_char(actualfinish, 'yyyy-mm-dd') as actualfinish,
to_char(targetstart, 'yyyy-mm-dd') as targetstart
from sr a
where
reportdate >= to_date('$awal','yyyy-mm-dd') AND
reportdate <= to_date('$tambah','yyyy-mm-dd') AND
siteid ='TA'  AND
needecp ='0'";
//echo "$query";
?>

<?php
echo "
    <table class='table table-striped table-bordered data'>
  <thead>

    <tr >
      <th align='center' width='30px'> NO </th>
      <th>DIST </th>
      <th>Asset Number</th>
      <th>Description</th>
      <th>Status </th>
      <th>Reportted By </th>
      <th>Fault Priority</th>
      <th>Fault Type </th>
      <th>Report Date Before </th>
      <th>Report Time Before </th>
      <th>Report Date </th>
      <th>Report Jam </th>
      <th>Selisih Jam </th>
      <th>Selisih Menit </th>
      <th>Status Date Date </th>
      <th>Target Finish </th>
      <th>Actual Finish </th>
      <th>Target Start </th>

    </tr>
  </thead>
  ";

  $stid = oci_parse($koneksi, $query);
  $r = oci_execute($stid);
  $no=1;
  echo "<tbody>";
  while ($row = oci_fetch_array($stid, OCI_NUM+OCI_RETURN_NULLS+OCI_ASSOC)) 

  {


    
    $pecah_all="$pecah_thn-$pecah_bln-$pecah_tgl";
    $cek_bef=mysqli_fetch_array(mysqli_query($con,"
      select report_date,report_time,kks 
      from log_maximo 
      where 
      kks='$row[ASSETNUM]' and report_date<'$row[TANGGAL_DATA]'

      order by id_log_max desc"));


    if($cek_bef[report_date]==""){
      // cek equipment dulu ( belum)

      if($row[UNIT]=="#1"){
          $data_akhir="2013-07-10 00:00:00 ";
      }elseif($row[UNIT]=="#2"){
          $data_akhir="2013-07-10 00:00:00 ";
      }elseif($row[UNIT]=="#3"){
          $data_akhir="2013-07-10 00:00:00 ";
      }
    $data_awal="$row[TANGGAL_DATA] $row[JAM_DATA] ";
    $akhir2  = strtotime($data_akhir);
    $awal2 = strtotime($data_awal);
    $diff2  = $awal2-$akhir2;


    $jam   = floor($diff2 / (60 * 60));
    $menit = $diff2 - $jam * (60 * 60);
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
    
    echo"1";
      }else{
    $data_akhir="$cek_bef[report_date] $cek_bef[report_time] ";
    $data_awal="$row[TANGGAL_DATA] $row[JAM_DATA] ";
    $akhir2  = strtotime($data_akhir);
    $awal2 = strtotime($data_awal);
    $diff2  = $awal2-$akhir2;


    $jam   = floor($diff2 / (60 * 60));
    $menit = $diff2 - $jam * (60 * 60);
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
    

  }
    
 

    $TICKETIDD[]="$row[TICKETID]";
    $ASSETNUMD[]="$row[ASSETNUM]";
    $DESCRIPTIOND[]="$row[DESCRIPTION]";
    $assetnum[]="$row[DESCRIPTION]";
    $STATUSD[]="$row[STATUS]";
    $REPORTEDBYD[]="$row[REPORTEDBY]";
    $FAULTPRIORITYD[]="$row[FAULTPRIORITY]";
    $FAULTTYPED[]="$row[FAULTTYPE]";
    $REPORTDATED[]="$row[TANGGAL_DATA]";
    $REPORTTIMED[]="$row[JAM_DATA]";
    $STATUSDATED[]="$row[STATUSDATE]";
    $TARGETFINISHD[]="$row[TARGETFINISH]";
    $ACTUALFINISHD[]="$row[ACTUALFINISH]";
    $TARGETSTARTD[]="$row[TARGETSTART]";
    $SELISIHJAMD[]="$sh_jam";
    $SELISIHMENITD[]="$sh_menit";


    echo "<tr  height='10px'>";
    echo "<td  height='10px'>$no</td>";
    echo "<td >$row[TICKETID] </td>";
    echo "<td >$row[ASSETNUM] </td>";
    echo "<td >$row[DESCRIPTION] </td>";
    echo "<td >$row[STATUS] </td>";
    echo "<td >$row[REPORTEDBY] </td>";
    echo "<td >$row[FAULTPRIORITY] </td>";
    echo "<td >$row[FAULTTYPE] </td>";
    echo "<td >$cek_bef[report_date] </td>";
    echo "<td >$cek_bef[report_time] </td>";
    echo "<td >$row[TANGGAL_DATA] </td>";
    echo "<td >$row[JAM_DATA] </td>";
    echo "<td >$sh_jam Jam</td>";
    echo "<td >$sh_menit Menit </td>";
    echo "<td >$row[STATUSDATE] </td>";
    echo "<td >$row[TARGETFINISH] </td>";
    echo "<td >$row[ACTUALFINISH] </td>";
    echo "<td >$row[TARGETSTART] </td>";

    echo "</tr>";
    $no++;


  }
  $jum=$no-1;
  echo"<input type=hidden name=jum_to value='$jum' >";
  echo "</tbody>";
  echo "</table>";
  $stid = oci_parse($koneksi, $query);
  $r = oci_execute($stid);


  $sampai=$jum;
  for($no=0;$no<$sampai;$no++){

// cek data apakah sudah ada
    $notiket="$TICKETIDD[$no]";
    $cek=mysqli_query($con,"select *from log_maximo  where no_tiket='$notiket'");
    $h=mysqli_num_rows($cek);
    if($h>0){}else{


     mysqli_query($con,"INSERT INTO log_maximo (id_log_max,
      no_tiket,
      kks,
      deskripsi,
      status,
      pelapor,
      fault_priority,
      fault_type,
      report_date,
      report_time,
      status_date,
      target_finish,
      act_finish,
      target_start,
      selisih_jam,
      selisih_menit)
      VALUES('',
      '$TICKETIDD[$no]',
      '$ASSETNUMD[$no]',
      '$DESCRIPTIOND[$no]',
      '$STATUSD[$no]',
      '$REPORTEDBYD[$no]',
      '$FAULTPRIORITYD[$no]',
      '$FAULTTYPED[$no]',
      '$REPORTDATED[$no]',
      '$REPORTTIMED[$no]',
      '$STATUSDATED[$no]',
      '$TARGETFINISHD[$no]',
      '$ACTUALFINISHD[$no]',
      '$TARGETSTARTD[$no]',
      '$SELISIHJAMD[$no]',
      '$SELISIHMENITD[$no]')");
   }
 }

 ?>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>
</html>