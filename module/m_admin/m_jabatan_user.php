<?php
$act_data=$_GET['act'];
if($act_data=="editjabatan"){
	$sh_act="EDIT DATA JABATAN";
	}elseif($act_data=="tambahjabatan"){
	$sh_act="TAMBAH DATA JABATAN";
	}else{
	$sh_act=" DATA JABATAN";
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
                             
                               
                               <a href="?module=master&menu=m_jabatan&act=tambahjabatan" class="btn btn-info  btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data </a>

                                    <!-- start project list -->
                                    <table id="example" class="table table-striped responsive-utilities jambo_table data">
                                        <thead>
                                            <tr>
                                            <th>NO</th>
                                            <th>NAMA JABATAN</th>
                                            <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
									      $p      = new Paging;
    										$batas  = 30;
   											 $posisi = $p->cariPosisi($batas);
      										$tampil = mysqlI_query($con,"SELECT * FROM jabatan  ORDER BY   nama_jabatan   ");
									   $no=1;
	 									while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
		 								echo "<tr><td>$no</td>
             							<td>$r[nama_jabatan]</td>";
             							?>
                                        <td class="td-actions">
                                            <a href="?module=master&menu=m_jabatan&act=editjabatan&id=<?php echo"$r[id_jabatan]";?>"; class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a <?php echo"onClick=\"return confirm ('Apakah Anda Yakin ingin Menghapus  $r[nama_jabatan]')\"    href=?module=master&menu=m_jabatan&act=hapus&id=$r[id_jabatan]"; ?> class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
							case "tambahjabatan":
							echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasi(this)' method=POST >
          <table id='sample-table' class='table table-hover  tablesorter'>
          <tr><td > <div style='float:left; width:90px;' >Nama Jabatan </div></td>     <td> <input type=text name='namajabatan' size=30 >  </td></tr>
          <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value=Simpan name='simpan'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
		  <br>
    	
                             </div>";	
			break;
			
			
			case "editjabatan":
			$show=mysqlI_fetch_array(mysqlI_query($con,"select *from jabatan where id_jabatan='$_GET[id]'"));

			echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasiedit(this)' method=POST >
          <table id='sample-table' class='table table-hover  tablesorter'>
		  <input type=hidden name='idjabatan' size=30 value='$show[id_jabatan]' >
          <tr><td><div style='float:left; width:90px;' > Nama Jabatan </div></td>     <td>  <input type=text name='namajabatan' size=30 value='$show[nama_jabatan]' ></td></tr>
		  <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='editdata'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
    	
                             ";	
			break;
							}





		if(isset($_POST['simpan'])){
	
	$cek=mysqli_query($con,"select *from jabatan  where nama_jabatan='$_POST[namabidang]'");
	$h=mysqli_num_rows($cek);
	if($h>0){
		
		 ?>
  <script type="application/javascript">
  alert("Nama jabatan Sudah ada , Silahkan Gunakan nama jabatan Yang Lain ! ");
  document.location='?module=master&menu=m_jabatan&act=tambahjabatan';
  </script>
  <?php 
  
		}else{
			
			
	$pass=md5($_POST['password']);
  mysqli_query($con,"INSERT INTO jabatan(id_jabatan,
                                 nama_jabatan) 
	                       VALUES('',
								'$_POST[namajabatan]')");
    ?>
  <script type="application/javascript">
  
  alert("Data jabatan Berhasil Ditambah ! ");
  document.location='?module=master&menu=m_jabatan';
  </script>
  <?php 
			
			}
	
	}
	
	elseif(isset($_POST[editdata])){
		
    $update=mysqli_query($con,"UPDATE jabatan SET nama_jabatan  = '$_POST[namajabatan]'
                           WHERE  id_jabatan     = '$_POST[idjabatan]'");
 
    if($update>0){
	?>
    
  <script type="application/javascript">
  alert("Data jabatan Berhasil Diedit! ");
  document.location='?module=master&menu=m_jabatan';
  </script>
  <?php 
}else{
	?>
    
  <script type="application/javascript">
  alert("Data jabatan Gagal Diedit! ");
  document.location='?module=master&menu=m_jabatan';
  </script>
    <?php
	}

		}
		
		
		$module=$_GET['module'];
		$menu=$_GET['menu'];
		$act=$_GET['act'];
		if ($menu=='m_jabatan'  AND $act=='hapus'){
  mysqli_query($con,"DELETE FROM jabatan WHERE id_jabatan='$_GET[id]'");
    ?>
  <script type="application/javascript">
  alert("Data jabatan Berhasil Dihapus ! ");
  document.location='?module=master&menu=m_jabatan';
  </script>
  <?php 
}
	
				?>
