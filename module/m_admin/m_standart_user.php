<?php
$act_data=$_GET['act'];
if($act_data=="editstandart"){
	$sh_act="EDIT DATA STANDART";
	}elseif($act_data=="tambahstandart"){
	$sh_act="TAMBAH DATA STANDART";
	}else{
	$sh_act=" DATA STANDART";
	}
?>

<div class="x_content">


  <p></p>

  <div class="x_title">
    <h2><?php echo"$sh_act";?></h2>
    <div class="clearfix"></div>
  </div>


                                    <?php
							$swap_act = isset($_GET['act']) ? $_GET['act'] : '';
							switch($swap_act){


							 default:
                             
                            ?>
                             
                               
                               <a href="?module=master&menu=m_standart&act=tambahstandart" class="btn btn-info  btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data </a>

                                    <!-- start project list -->
                                    <table class="table table-striped responsive-utilities jambo_table data">
                                        <thead>
                                            <tr>
                                            <th>NO</th>
                                            <th>NAMA STANDART</th>
                                            <th>AKTIF</th>
                                            <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
      										$tampil = mysqlI_query($con,"SELECT * FROM standart  ORDER BY   nama_standart  ");
									   $no=1;
	 									while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
		 								echo "<tr><td>$no</td>
             							<td>$r[nama_standart]</td>
                          <td>$r[aktif]</td>";
             							?>
                                        <td class="td-actions">
                                            <a href="?module=master&menu=m_standart&act=editstandart&id=<?php echo"$r[id_standart]";?>"; class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a <?php echo"onClick=\"return confirm ('Apakah Anda Yakin ingin Menghapus  $r[nama_standart]')\"    href=?module=master&menu=m_standart&act=hapus&id=$r[id_standart]"; ?> class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
								
							// tambah data standart
							case "tambahstandart":
							echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasi(this)' method=POST >
          <table id='sample-table' class='table table-hover  tablesorter'>
          <tr><td > <div style='float:left; width:90px;' >Nama standart </div></td>     <td> <input type=text name='namastandart' size=30 >  </td></tr>
          <tr><td > <div style='float:left; width:90px;' >Aktif </div></td>     <td> <input type=radio name='aktif' size=30 value='Y' > Y   <br><input type=radio name='aktif' size=30 value='N' > N  </td></tr>
          <tr><td></td><td colspan=2><div id='paddingsaja' >
          <input type=submit class='btn btn-medium btn-primary' value=Simpan name='simpan'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
		  <br>
    	
                             </div>";	
			break;
			
			
			case "editstandart":
			$show=mysqlI_fetch_array(mysqlI_query($con,"select *from standart where id_standart='$_GET[id]'"));

			echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasiedit(this)' method=POST >
          <table id='sample-table' class='table table-hover  tablesorter'>
		  <input type=hidden name='idstandart' size=30 value='$show[id_standart]' >
          <tr><td><div style='float:left; width:90px;' > Nama standart </div></td>     <td>  <input type=text name='namastandart' size=30 value='$show[nama_standart]' ></td></tr>
          <tr><td><div style='float:left; width:90px;' > Aktif </div></td>     <td>";  
          if($show[aktif]=="Y"){
              echo"<input type=radio name='aktif' size=30 value='Y' checked > Y   <br><input type=radio name='aktif' size=30 value='N' > N ";
          }else{
            echo"<input type=radio name='aktif' size=30 value='Y' > Y   <br><input type=radio name='aktif' checked size=30 value='N' > N ";
          }

          echo"</td></tr>
		  <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='editdata'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
    	
                             </div>";	
			break;
							}





		if(isset($_POST['simpan'])){
	
	$cek=mysqli_query($con,"select *from standart  where nama_standart='$_POST[namastandart]'");
	$h=mysqli_num_rows($cek);
	if($h>0){
		
		 ?>
  <script type="application/javascript">
  alert("Nama standart Sudah ada , Silahkan Gunakan nama standart Yang Lain ! ");
  document.location='?module=masterdata&submenu=standart&act=tambahstandart';
  </script>
  <?php 
  
		}else{
			
			
	$pass=md5($_POST['password']);
  mysqli_query($con,"INSERT INTO standart(id_standart,
                                 nama_standart,aktif) 
	                       VALUES('',
                '$_POST[namastandart]',
                '$_POST[aktif]')");
    ?>
  <script type="application/javascript">
  
  alert("Data standart Berhasil Ditambah ! ");
  document.location='?module=master&menu=m_standart';
  </script>
  <?php 
			
			}
	
	}
	
	elseif(isset($_POST[editdata])){
		
    $update=mysqli_query($con,"UPDATE standart SET nama_standart   = '$_POST[namastandart]',aktif   = '$_POST[aktif]'
                           WHERE  id_standart     = '$_POST[idstandart]'");
 
    if($update>0){
	?>
    
  <script type="application/javascript">
  alert("Data standart Berhasil Diedit! ");
  document.location='?module=master&menu=m_standart';
  </script>
  <?php 
}else{
	?>
    
  <script type="application/javascript">
  alert("Data standart Gagal Diedit! ");
  document.location='?module=master&menu=m_standart';
  </script>
    <?php
	}

		}
		
		
		$module=$_GET['module'];
		$menu=$_GET['menu'];
		$act=$_GET['act'];
		if ($menu=='m_standart'  AND $act=='hapus'){
  mysqli_query($con,"DELETE FROM standart WHERE id_standart='$_GET[id]'");
    ?>
  <script type="application/javascript">
  alert("Data standart Berhasil Dihapusdd ! ");
  document.location='?module=master&menu=m_standart';
  </script>
  <?php 
}
	
				?>
