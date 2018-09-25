<?php
$tahun=$_GET[tahun];
$kks_show=$_GET[kks_data];
//echo"$kks_show  $ahun ";
?>
<div class="x_content">

	<h2>DATA SERP PADA  TAHUN <?php echo"$tahun $kks_show";?> </h2> 

          <input type=button class='btn btn-small btn-danger'  value=Kembali onclick=self.history.back()>
	<div class="ln_solid"></div>
	<table class="table table-striped responsive-utilities jambo_table data">
		<thead>
			<tr>
				<th>NO</th>
				<th>ASSET</th>
				<th>NAMA SYSTEM</th>
				<th>SF</th>
				<th>RC</th>
				<th>AKSI</th>
			</tr>
		</thead>
		<tbody>

			<?php
			$tampil = mysqlI_query($con,"SELECT * FROM sinkronisasi_data where kks like '%$kks_show%' ");
			$no=1;
			while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
				$show_m=mysqli_fetch_array(mysqli_query($con,"select *from equipment_maximo where kks='$r[kks]'"));

				$sep=mysqli_fetch_array(mysqli_query($con,"select *from serp where kks='$show_m[kks]' and tahun='$tahun'"));
				echo "<tr><td>$no</td>
				<td>$show_m[kks]</td>
				<td>$show_m[nama_system]</td>
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