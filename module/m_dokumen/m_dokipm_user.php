<?php
$act_data=$_GET['act'];
if($act_data=="editdokumentipm"){
	$sh_act="EDIT DATA DOKUMENT IPM";
	}elseif($act_data=="tambahdokumentipm"){
	$sh_act="TAMBAH DATA DOKUMENT IPM";
	}else{
	$sh_act=" DATA DOKUMENT IPM";
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
                             
                               
                               <a href="?module=files&menu=m_dokipm_user&act=tambahdokumentipm" class="btn btn-info  btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data </a>

                                    <!-- start project list -->
                                    <table class="table table-striped responsive-utilities jambo_table data">
                                        <thead>
                                            <tr>
                                            <th>NO</th>
                                            <th>NOMER IPM</th>
                                            <th>NAMA DOKUMENT IPM</th>
                                            <th>FILES</th>
                                            <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
      										$tampil = mysqlI_query($con,"SELECT * FROM dokumentipm  ORDER BY   nama_dokumentipm  ");
									   $no=1;
	 									while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
		 								echo "<tr><td>$no</td>
                          <td>$r[nomor_dokumentipm]</td>
                          <td>$r[nama_dokumentipm]</td>
                          <td>$r[files]</td>";
             							?>
                                        <td class="td-actions">
                                            <a href="?module=files&menu=m_dokipm_user&act=editdokumentipm&id=<?php echo"$r[id_dokumentipm]";?>"; class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a <?php echo"onClick=\"return confirm ('Apakah Anda Yakin ingin Menghapus  $r[nama_dokumentipm]')\"    href=?module=files&menu=m_dokipm_user&act=hapus&id=$r[id_dokumentipm]"; ?> class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
								
							// tambah data DOKUMENT IPM
							case "tambahdokumentipm":
							echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasiedit(this)' method=POST enctype='multipart/form-data' >
          <table id='sample-table' class='table table-hover  tablesorter'>
          <tr><td > <div style='float:left; width:130px;' >NOMER DOKUMENT IPM </div></td>     <td> <input type=text name='nomordokumentipm' size=30 >  </td></tr>
          <tr><td > <div style='float:left; width:130px;' >NAMA DOKUMENT IPM </div></td>     <td> <input type=text name='namadokumentipm' size=30 >  </td></tr>
          <tr><td>Upload Dokument</td>    <td>  <input class=tabelgaya type=file name='fupload' size=30></td></tr>
<tr><td colspan=2>*) File yang diupload harus dengan format PDF.</td></tr>
          <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value=Simpan name='simpan'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
		  <br>
    	
                             </div>";	
			break;
			
			
			case "editdokumentipm":
			$show=mysqlI_fetch_array(mysqlI_query($con,"select *from dokumentipm  where id_dokumentipm='$_GET[id]'"));

			echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasiedit(this)' method=POST enctype='multipart/form-data' >
          <table id='sample-table' class='table table-hover  tablesorter'>
		  <input type=hidden name='id_dokumentipm' size=30 value='$show[id_dokumentipm]' >
          <tr><td><div style='float:left; width:130px;' > Nomor DOKUMENT IPM </div></td>     <td>  <input type=text name='nomordokumentipm' size=30 value='$show[nomor_dokumentipm]' ></td></tr>
        <tr><td><div style='float:left; width:130px;' > Nama DOKUMENT IPM </div></td>     <td>  <input type=text name='namadokumentipm' size=30 value='$show[nama_dokumentipm]' ></td></tr>
          <tr><td>Upload Dokument</td>    <td>  <input class=tabelgaya type=file name='fupload' size=30></td></tr>
      <tr><td colspan=2>*) File yang diupload harus dengan format PDF.</td></tr>
		  <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='editdata'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
    	
                             </div>";	
			break;
							}





		if(isset($_POST['simpan'])){
	
	$cek=mysqli_query($con,"select *from dokumentipm  where nomor_dokumentipm ='$_POST[nomerdokumentipm]'");
	$h=mysqli_num_rows($cek);
	if($h>0){
		
		 ?>
  <script type="application/javascript">
  alert("Nomer DOKUMENT IPM Sudah ada , Silahkan Gunakan Nomer DOKUMENT IPM Yang Lain ! ");
  document.location='?module=files&menu=m_dokipm_user&act=tambahdokumentipm';
  </script>
  <?php 
  
		}else{
			
			
	$pass=md5($_POST['password']);
      // $lokasi_file    = $_FILES['fupload']['tmp_name'];
      // $tipe_file      = $_FILES['fupload']['type'];
      // $nama_file      = $_FILES['fupload']['name'];
      // $acak           = $_POST[nomordokumentipm];
      // $acak2          = $_POST[namadokumentipm];
      // $nama_file_unik = $acak.$acak2; 
      
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
      $tipe_file      = $_FILES['fupload']['type'];
      $nama_file      = $_FILES['fupload']['name'];
      $acak           = $_POST[nomordokumentipm];
      $nama_file_unik = $acak.$nama_file; 
      UploadFile($nama_file_unik);


  mysqli_query($con,"INSERT INTO dokumentipm(id_dokumentipm,nomor_dokumentipm,
                                 nama_dokumentipm,files) 
	                       VALUES('',
                '$_POST[nomordokumentipm]',
                '$_POST[namadokumentipm]',
                '$nama_file_unik')");
    ?>
  <script type="application/javascript">
  
  alert("Data DOKUMENT IPM Berhasil Ditambah ! ");
  document.location='?module=files&menu=m_dokipm_user';
  </script>
  <?php 
			
			}
	
	}
	
	elseif(isset($_POST[editdata])){

      $lokasi_file    = $_FILES['fupload']['tmp_name'];
      $tipe_file      = $_FILES['fupload']['type'];
      $nama_file      = $_FILES['fupload']['name'];
      $acak           = $_POST[nomordokumentipm];
      $nama_file_unik = $acak.$nama_file; 
      

      if($lokasi_file==""){

        $update=mysqli_query($con,"UPDATE dokumentipm SET nama_dokumentipm   = '$_POST[namadokumentipm]',
                                                      nomor_dokumentipm   = '$_POST[nomordokumentipm]'
                           WHERE  id_dokumentipm     = '$_POST[id_dokumentipm]'");
 
            if($update>0){
            ?>
              
            <script type="application/javascript">
            alert("Data DOKUMENT IPM Berhasil Diedit! ");
            document.location='?module=files&menu=m_dokipm_user';
            </script>
            
            <?php 
            }else{
            ?>
              
            <script type="application/javascript">
            alert("Data DOKUMENT IPM Gagal Diedit! ");
            document.location='?module=files&menu=m_dokipm_user';
            </script>
              <?php
            } 

      }else{
        $cek=mysqli_query($con,"select *from dokumentipm  where id_dokumentipm ='$_POST[id_dokumentipm]'");
        $h=mysqli_fetch_array($cek);
        unlink("dokument/ipm/$h[files]");
        UploadFile($nama_file_unik);
        $update=mysqli_query($con,"UPDATE dokumentipm SET nama_dokumentipm   = '$_POST[namadokumentipm]',
                                                      nomor_dokumentipm   = '$_POST[nomordokumentipm]',
                                                      files = '$nama_file_unik'
                           WHERE  id_dokumentipm     = '$_POST[id_dokumentipm]'");
 
            if($update>0){
            ?>
              
            <script type="application/javascript">
            alert("Data DOKUMENT IPM Berhasil Diedit! ");
            document.location='?module=files&menu=m_dokipm_user';
            </script>
            
            <?php 
            }else{
            ?>
              
            <script type="application/javascript">
            alert("Data DOKUMENT IPM Gagal Diedit! ");
            document.location='?module=files&menu=m_dokipm_user';
            </script>
              <?php
            }        
      }
		
    

		}
		
		
		$module=$_GET['module'];
		$menu=$_GET['menu'];
		$act=$_GET['act'];
		if ($menu=='m_dokipm_user'  AND $act=='hapus'){

  $cek=mysqli_query($con,"select *from dokumentipm  where id_dokumentipm ='$_GET[id]'");
  $h=mysqli_fetch_array($cek);
  unlink("dokument/ipm/$h[files]");
  
  mysqli_query($con,"DELETE FROM dokumentipm WHERE id_dokumentipm='$_GET[id]'");
   
          
    ?>

  <script type="application/javascript">
  alert("Data DOKUMENT IPM Berhasil Dihapus ! ");
  document.location='?module=files&menu=m_dokipm_user';
  </script>
  <?php 
}
	
				?>
