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
} 

?>


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

$query = "SELECT *FROM R_CCODE";
//echo "$query";
echo "
<table class='table table-striped projects' style='font-size:10px;'>
<thead>

<tr>
<th align='center' width='30px'> NO </th>
<th>KODE SYSTEM </th>
<th>NAMA SYSTEM</th>

</tr>
</thead>
";

$stid = oci_parse($koneksi, $query);
$r = oci_execute($stid);
$no=1;
echo "<tbody>";
while ($row = oci_fetch_array($stid, OCI_NUM+OCI_RETURN_NULLS+OCI_ASSOC)) 

{

$kks[]=$row[RCC_KODE];
$namasystem[]=$row[RCC_DESK];
echo "<tr  height='10px'>";
echo "<td  height='10px'>$no</td>";
echo "<td >$row[RCC_KODE] <input type='hidden' name='pr_num$no' value='$row[RCC_KODE]' ></td>";
echo "<td >$row[RCC_DESK] <input type='hidden' name='item_num$no' value='$row[RCC_DESK]' ></td>";

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

 $notiket="$kks[$no]";
  $cek=mysqli_query($con,"select *from equipment_navitas  where cause_code='$notiket'");
  $h=mysqli_num_rows($cek);
  if($h>0){}else{
    mysqli_query($con,"INSERT INTO equipment_navitas (cause_code,
    nama_system,
    deskripsi)
    VALUES(
    '$kks[$no]',
    '$namasystem[$no]',
    '$namasystem[$no]')");
}

}

?>
