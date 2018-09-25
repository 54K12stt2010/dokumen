
<head>
<meta http-equiv="refresh" content="30">
</head> 
<?php
$con=mysqli_connect("localhost","root","","db_reap");
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
$database="192.168.1.157/maxprd";
 
$koneksi=oci_connect($username,$password,$database);
 
if($koneksi){
//echo "Koneksi berhasil";
}else{
$err=oci_error();
echo "Gagal tersambung ke ORACLE". $err['text'];
} ?>

  	<link href="../../css/bootstrap.min.css" rel="stylesheet">

    <link href="../../fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../css/animate.min.css" rel="stylesheet">
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
$awal="$tahun-$bulan-$ttg";
echo"$awal";

$lama_j=$c_jenis[lama_ijin];
$tambah_tanggal = mktime(0,0,0,$bulan,$ttg+1,$tahun); // angka 2,7,1 yang dicetak tebal bisa dirubah rubah
$tambah = date('Y-m-d',$tambah_tanggal);

echo" $tambah";
$query = "SELECT
  ticketid,
  assetnum,
  description,
  status,
  reportedby,
  faultpriority,
  faulttype,
  reportdate,
  statusdate,
  targetfinish,
  actualfinish,
  targetstart
from sr a
where
  reportdate >= to_date('$awal','yyyy-mm-dd') AND
  reportdate <= to_date('$tambah','yyyy-mm-dd') AND
  siteid ='TA'  AND
  needecp ='0'";
//echo "$query";
echo "
<table class='table table-striped projects' style='font-size:10px;'>
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
<th>Report Date </th>
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


$TICKETIDD[]="$row[TICKETID]";
$ASSETNUMD[]="$row[ASSETNUM]";
$DESCRIPTIOND[]="$row[DESCRIPTION]";
$assetnum[]="$row[DESCRIPTION]";
$STATUSD[]="$row[STATUS]";
$REPORTEDBYD[]="$row[REPORTEDBY]";
$FAULTPRIORITYD[]="$row[FAULTPRIORITY]";
$FAULTTYPED[]="$row[FAULTTYPE]";
$REPORTDATED[]="$row[REPORTDATE]";
$STATUSDATED[]="$row[STATUSDATE]";
$TARGETFINISHD[]="$row[TARGETFINISH]";
$ACTUALFINISHD[]="$row[ACTUALFINISH]";
$TARGETSTARTD[]="$row[TARGETSTART]";

echo "<tr  height='10px'>";
echo "<td  height='10px'>$no</td>";
echo "<td >$row[TICKETID] <input type='hidden' name='TICKETID$no' value='$row[TICKETID]' ></td>";
echo "<td >$row[ASSETNUM] <input type='hidden' name='ASSETNUM$no' value='$row[ASSETNUM]' ></td>";
echo "<td >$row[DESCRIPTION] <input type='hidden' name='DESCRIPTION$no' value='$row[DESCRIPTION]' ></td>";
echo "<td >$row[STATUS] <input type='hidden' name='STATUS$no' value='$row[STATUS]' > </td>";
echo "<td >$row[REPORTEDBY] <input type='hidden' name='REPORTEDBY$no' value='$row[REPORTEDBY]' ></td>";
echo "<td >$row[FAULTPRIORITY] <input type='hidden' name='FAULTPRIORITY$no' value='$row[FAULTPRIORITY]' ></td>";
echo "<td >$row[FAULTTYPE] <input type='hidden' name='FAULTTYPE$no' value='$row[FAULTTYPE]' ></td>";
echo "<td >$row[REPORTDATE] <input type='hidden' name='REPORTDATE$no' value='$row[REPORTDATE]' ></td>";
echo "<td >$row[STATUSDATE] <input type='hidden' name='STATUSDATE$no' value='$row[STATUSDATE]' ></td>";
echo "<td >$row[TARGETFINISH] <input type='hidden' name='TARGETFINISH$no' value='$row[TARGETFINISH]' ></td>";
echo "<td >$row[ACTUALFINISH] <input type='hidden' name='ACTUALFINISH$no' value='$row[ACTUALFINISH]' ></td>";
echo "<td >$row[TARGETSTART] <input type='hidden' name='TARGETSTART$no' value='$row[TARGETSTART]' ></td>";

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
for($no=0;$no<=$sampai;$no++){

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
    status_date,
    target_finish,
    act_finish,
    target_start)
    VALUES('',
    '$TICKETIDD[$no]',
    '$ASSETNUMD[$no]',
    '$DESCRIPTIOND[$no]',
    '$STATUSD[$no]',
    '$REPORTEDBYD[$no]',
    '$FAULTPRIORITYD[$no]',
    '$FAULTTYPED[$no]',
    '$REPORTDATED[$no]',
    '$STATUSDATED[$no]',
    '$TARGETFINISHD[$no]',
    '$ACTUALFINISHD[$no]',
    '$TARGETSTARTD[$no]')");
 }
}

?>
