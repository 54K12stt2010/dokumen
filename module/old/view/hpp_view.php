<?php
include('../config/koneksi.php');
$tahun=$_GET[tahun];
$bulan=$_GET[bulan];
if($bulan=="01"){
	$nama_bulan="JANUARI";
}elseif($bulan=="02"){
	$nama_bulan="FEBRUARI";
}elseif($bulan=="03"){
	$nama_bulan="MARET";
}elseif($bulan=="04"){
	$nama_bulan="APRIL";
}elseif($bulan=="05"){
	$nama_bulan="MEI";
}elseif($bulan=="06"){
	$nama_bulan="JUNI";
}elseif($bulan=="07"){
	$nama_bulan="JULI";
}elseif($bulan=="08"){
	$nama_bulan="AGUSTUS";
}elseif($bulan=="09"){
	$nama_bulan="SEPTEMBER";
}elseif($bulan=="10"){
	$nama_bulan="OKTOBER";
}elseif($bulan=="11"){
	$nama_bulan="NOVEMBER";
}elseif($bulan=="12"){
	$nama_bulan="DESEMBER";
}
?>
<div class="x_content">

	<h2>HPP PADA  TAHUN <?php echo"$nama_bulan $tahun";?> </h2> 

	<div class="ln_solid"></div>
	<table class="table table-striped responsive-utilities jambo_table">
		<thead>
			<tr>
				<th>NO</th>
				<th>KETERANGAN</th>
				<th>NOMINAL</th>
				<th>AKSI</th>
			</tr>
		</thead>
		<tbody>

			<?php
			$tampil = mysqlI_query($con,"SELECT * FROM sinkronisasi_data");
				
				$show_m=mysqli_fetch_array(mysqli_query($con,"select *from setting_hpp where bulan='$bulan' and tahun='$tahun'"));

				if($show_m[nominal]==""){
					$nom="Belum Diset";
				}else{
					$nom=$show_m[nominal];
				}
				echo "<tr>
				<td>1</td>
				<td>HPP</td>
				<td>$nom</td>";

				?>
				<td class="td-actions">
					<a href="?module=sethpp&act=editdata_hpp&bulan=<?php echo"$bulan&tahun=$tahun";?>"; class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
				</td>
				<?php
				echo"</tr>";
			?>  
		</tbody>
	</table>