<?php
$act_data=$_GET['act'];
if($act_data=="editequipment_navitas"){
	$sh_act="EDIT EQUIPMENT NAVITAS";
	}elseif($act_data=="tambahequipment_navitas"){
	$sh_act="TAMBAH EQUIPMENT NAVITAS";
	}else{
	$sh_act=" DATA EQUIPMENT NAVITAS";
	}
?>

<div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo"$sh_act";?></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <p></p>


                                    <?php
							$swap_act = isset($_GET['act']) ? $_GET['act'] : '';
							switch($swap_act){


							 default:
                             
                            ?>
                             
                               
                               <!-- <a target='blank_' href="module/tarik/peralatan_navitas.php" class="btn btn-info  btn-sm"><i class="fa fa-plug"></i> Sinkronisasi Data Equipment Navitas </a> -->
                               <a href="?module=equipment_navitas&act=tambahequipment_navitas" class="btn btn-info  btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data </a>


                               <a href="cetak/excel_navitas_equip.php" class="btn btn-warning  btn-sm"><i class=" fa fa-file-excel-o"></i> Export To Excel </a>

                                    <!-- start project list -->
                                    <table class="table table-striped responsive-utilities jambo_table data">
                                        <thead>
                                            <tr>
                                            <th>NO</th>
                                            <th>CAUSE CODE</th>
                                            <th>NAMA SYSTEM</th>
                                            <th>DESKRIPSI</th>
                                            <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
      										$tampil = mysqlI_query($con,"SELECT * FROM equipment_navitas  ORDER BY   cause_code ");
									   $no=1;
	 									while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
		 								echo "<tr><td>$no</td>
                          <td>$r[cause_code]</td>
                          <td>$r[nama_system]</td>
                          <td>$r[deskripsi]</td>";
             							?>
                                        <td class="td-actions">
                                            <a href="?module=equipment_navitas&act=editequipment_navitas&id=<?php echo"$r[cause_code]";?>"; class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a <?php echo"onClick=\"return confirm ('Apakah Anda Yakin ingin Menghapus  $r[cause_code]')\"    href=?module=equipment_navitas&act=hapus&id=$r[cause_code]"; ?> class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                        </td>
                                        <?php
										echo"</tr>";
      									$no++;
    									}
									   ?>  
                                        </tbody>
                                    </table>
                                    <!-- end project list -->

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
    				
    				break;
								
							// tambah data bidang
							case "tambahequipment_navitas":

              echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasi(this)' method=POST >
          <table id='sample-table' class='table table-hover  tablesorter'>
          <tr>
            <td > <div style='float:left; width:90px;' >Cause Code </div></td>
            <td> <input type=text name='cause_code' size=30 >  </td>
          </tr>
          <tr>
            <td > <div style='float:left; width:90px;' >Nama System </div></td>
            <td> <input type=text name='nama_system' size=30 >  </td>
          </tr>
          <tr>
            <td > <div style='float:left; width:90px;' >Deskripsi </div></td>
            <td> <textarea name='deskripsi'></textarea>  </td>
          </tr>
          
          <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value=Simpan name='simpan'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
      <br>
      
                             </div>"; 
      break;
			
			
			case "editequipment_navitas":
			$show=mysqlI_fetch_array(mysqlI_query($con,"select *from equipment_navitas where cause_code='$_GET[id]'"));

			echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasi(this)' method=POST >
          <table id='sample-table' class='table table-hover  tablesorter'>
          <tr>
            <td > <div style='float:left; width:90px;' >Cause Code </div></td>
            <td> <input type=text name='cause_code' size=30 readonly value='$show[cause_code]'>  </td>
          </tr>
          <tr>
            <td > <div style='float:left; width:90px;' >Nama System </div></td>
            <td> <input type=text name='nama_system' size=30 value='$show[nama_system]' >  </td>
          </tr>
          <tr>
            <td > <div style='float:left; width:90px;' >Deskripsi </div></td>
            <td> <textarea name='deskripsi'>$show[deskripsi]</textarea>  </td>
          </tr>
          
          <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='editdata'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
    	
                             </div>";	
			break;
							}





		if(isset($_POST['simpan'])){
	
	$cek=mysqli_query($con,"select *from equipment_navitas  where cause_code='$_POST[cause_code]'");
	$h=mysqli_num_rows($cek);
	if($h>0){
		
		 ?>
  <script type="application/javascript">
  alert("Cause Code Sudah ada , Silahkan Gunakan Cause Code Yang Lain ! ");
  document.location='?module=equipment_navitas&act=tambahequipment_navitas';
  </script>
  <?php 
  
		}else{
			
			
	$pass=md5($_POST['password']);
   mysqli_query($con,"INSERT INTO equipment_navitas(cause_code,
                                 nama_system,
                                 deskripsi
                                 ) 
                         VALUES(
                '$_POST[cause_code]',
                '$_POST[nama_system]',
                '$_POST[deskripsi]')");
    ?>
  <script type="application/javascript">
  
  alert("Data Equipment Navitas Berhasil Ditambah ! ");
  document.location='?module=equipment_navitas';
  </script>
  <?php 
			
			}
	
	}
	
	elseif(isset($_POST[editdata])){
		
   $update=mysqli_query($con,"UPDATE equipment_navitas SET nama_system  = '$_POST[nama_system]',
                                deskripsi  = '$_POST[deskripsi]'
                           WHERE  cause_code  = '$_POST[cause_code]' ");
 
    if($update>0){
	?>
    
  <script type="application/javascript">
  alert("Data Equipment Navitas Berhasil Diedit! ");
  document.location='?module=equipment_navitas';
  </script>
  <?php 
}else{
	?>
    
  <script type="application/javascript">
  alert("Data Equipment Navitas Gagal Diedit! ");
  document.location='?module=equipment_navitas';
  </script>
    <?php
	}

		}
		
		
		$module=$_GET['module'];
		$submenu=$_GET['submenu'];
		$act=$_GET['act'];
		if ($module=='equipment_navitas'  AND $act=='hapus'){
  mysqli_query($con,"DELETE FROM equipment_navitas WHERE cause_code='$_GET[id]'");
    ?>
  <script type="application/javascript">
  alert("Data Equipment Navitas Berhasil Dihapus ! ");
  document.location='?module=equipment_navitas';
  </script>
  <?php 
}
	
				?>
