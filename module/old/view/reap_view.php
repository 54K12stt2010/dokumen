<?php
include('../config/koneksi.php');
$bulan=$_GET[bulan];
$tahun=$_GET[tahun];
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
<h2>DATA REAP PADA  <?php echo" $nama_bulan $tahun";?> </h2> 
<div style="border: 1px solid rgb(204, 204, 204); padding: 5px; overflow: auto; width: 100%; height:500px; background-color: rgb(255, 255, 255);">

	
	<table class="table table-striped responsive-utilities jambo_table">
		<thead>
			<tr>
				<th>NO</th>
				<th>ASSET</th>
				<th>NAMA SYSTEM</th>
				<th>SF</th>
				<th>RC</th>
				<th>DEMAGE</th>
				<th>STATUS KERUSAKAN</th>
				<th>RECOVERY TIME</th>
				<th>DERATING (MW)</th>
				<th>MW</th>
				<th>LOSS EAF</th>
				<th>LOP</th>
				<th>MTBF</th>
				<th>F(T)</th>
				<th>RISK</th>
				<th>ACTION PLAN</th>
				<th>BIAYA</th>
				<th>RESIDUAL LOSS</th>
				<th>RESIDUAL F(T)</th>
				<th>RESIDUAL RISK</th>
				<th>BENEFIT</th>
				<th>B/C Ratio</th>
				<th>AKSI</th>
			</tr>
		</thead>
		<tbody>

			<?php
			$tampil = mysqlI_query($con,"SELECT * FROM sinkronisasi_data");
			$no=1;
			while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
				$show_m=mysqli_fetch_array(mysqli_query($con,"select *from equipment_maximo where kks='$r[kks]'"));

				$sep=mysqli_fetch_array(mysqli_query($con,"select *from serp where kks='$show_m[kks]' and tahun='$tahun'"));
				echo "<tr><td>$no</td>
				<td>$show_m[kks]</td>
				<td>$show_m[nama_system]</td>
				<td>$sep[sf]</td>
				<td>$show_m[nama_system]</td>
				<td>$sep[sf]</td>
				<td>$show_m[nama_system]</td>
				<td>$sep[sf]</td>
				<td>$show_m[nama_system]</td>
				<td>$sep[sf]</td>
				<td>$show_m[nama_system]</td>
				<td>$sep[sf]</td>
				<td>$show_m[nama_system]</td>
				<td>$sep[sf]</td>
				<td>$show_m[nama_system]</td>
				<td>$sep[sf]</td>
				<td>$show_m[nama_system]</td>
				<td>$sep[sf]</td>
				<td>$show_m[nama_system]</td>
				<td>$sep[sf]</td>
				<td>$sep[sf]</td>
				<td>$sep[rc]</td>";

				?>
				<td class="td-actions">
					<a href="?module=dataserp&act=editdata_serp&kks=<?php echo"$r[kks]&tahun=$tahun";?>"; class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
				</td>
				<?php
				echo"</tr>";
				$no++;
			}
			?>  
		</tbody>
	</table>

	</div>