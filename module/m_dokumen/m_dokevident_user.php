<?php
$act_data=$_GET['act'];
if($act_data=="editdokumentevident"){
	$sh_act="EDIT DATA DOKUMENT EVIDENT";
	}elseif($act_data=="tambahdokumentevident"){
	$sh_act="TAMBAH DATA DOKUMENT EVIDENT";
	}else{
	$sh_act=" DATA DOKUMENT EVIDENT";
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
                             
                               
                               <a href="?module=files&menu=m_dokevident_user&act=tambahdokumentevident" class="btn btn-info  btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data </a>

                                    <!-- start project list -->
                                    <table class="table table-striped responsive-utilities jambo_table data">
                                        <thead>
                                            <tr>
                                            <th>NO</th>
                                            <th>TAHUN</th>
                                            <th>NAMA EVIDENT</th>
                                            <th>FILES</th>
                                            <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
      										$tampil = mysqlI_query($con,"SELECT * FROM dokumentevident  ORDER BY   nama_dokumentevident  ");
									   $no=1;
	 									while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
		 								echo "<tr><td>$no</td>
                          <td>$r[tahun]</td>
                          <td>$r[nama_dokumentevident]</td>
                          <td>$r[files]</td>";
             							?>
                                        <td class="td-actions">
                                            <a href="?module=files&menu=m_dokevident_user&act=editdokumentevident&id=<?php echo"$r[id_dokumentevident]";?>"; class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a <?php echo"onClick=\"return confirm ('Apakah Anda Yakin ingin Menghapus  $r[nama_dokumentevident]')\"    href=?module=files&menu=m_dokevident_user&act=hapus&id=$r[id_dokumentevident]"; ?> class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
								
							// tambah data DOKUMENT evident
							case "tambahdokumentevident":
							echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasiedit(this)' method=POST enctype='multipart/form-data' >
          <table id='sample-table' class='table table-hover  tablesorter'>
          <tr><td > <div style='float:left; width:130px;' >TAHUN</div></td>     <td> <input type=text name='tahun' size=30 >  </td></tr>
          <tr><td > <div style='float:left; width:130px;' >NAMA EVIDENT</div></td>     <td> <input type=text name='namadokumentevident' size=30 >  </td></tr>
          <tr><td>Upload Dokument</td>    <td>  <input class=tabelgaya type=file name='fupload' size=30></td></tr>
<tr><td colspan=2>*) File yang diupload harus dengan format PDF.</td></tr>
          <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value=Simpan name='simpan'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
		  <br>
    	
                             </div>";	
			break;
			
			
			case "editdokumentevident":
			$show=mysqlI_fetch_array(mysqlI_query($con,"select *from dokumentevident  where id_dokumentevident='$_GET[id]'"));

			echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasiedit(this)' method=POST enctype='multipart/form-data' >
          <table id='sample-table' class='table table-hover  tablesorter'>
		  <input type=hidden name='id_dokumentevident' size=30 value='$show[id_dokumentevident]' >
        <tr><td><div style='float:left; width:130px;' > TAHUN </div></td>     <td>  <input type=text name='tahun' size=30 value='$show[tahun]' ></td></tr>
        <tr><td><div style='float:left; width:130px;' > Nama DOKUMENT evident </div></td>     <td>  <input type=text name='namadokumentevident' size=30 value='$show[nama_dokumentevident]' ></td></tr>
          <tr><td>Upload Dokument</td>    <td>  <input class=tabelgaya type=file name='fupload' size=30></td></tr>
      <tr><td colspan=2>*) File yang diupload harus dengan format PDF.</td></tr>
		  <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='editdata'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
    	
                             </div>";	
			break;
							}





		if(isset($_POST['simpan'])){
	
	
			
	$pass=md5($_POST['password']);
      // $lokasi_file    = $_FILES['fupload']['tmp_name'];
      // $tipe_file      = $_FILES['fupload']['type'];
      // $nama_file      = $_FILES['fupload']['name'];
      // $acak           = $_POST[nomordokumentevident];
      // $acak2          = $_POST[namadokumentevident];
      // $nama_file_unik = $acak.$acak2; 
      
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
      $tipe_file      = $_FILES['fupload']['type'];
      $nama_file      = $_FILES['fupload']['name'];
      $acak           = $_POST[nomordokumentevident];
      $nama_file_unik = $acak.$nama_file; 
      UploadFileevident($nama_file_unik);


  mysqli_query($con,"INSERT INTO dokumentevident(id_dokumentevident,tahun,
                                 nama_dokumentevident,files) 
	                       VALUES('',
                '$_POST[tahun]',
                '$_POST[namadokumentevident]',
                '$nama_file_unik')");
    ?>
  <script type="application/javascript">
  
  alert("Data EVIDENT Berhasil Ditambah ! ");
  document.location='?module=files&menu=m_dokevident_user';
  </script>
  <?php 
			
			}
	
	
	
	elseif(isset($_POST[editdata])){

      $lokasi_file    = $_FILES['fupload']['tmp_name'];
      $tipe_file      = $_FILES['fupload']['type'];
      $nama_file      = $_FILES['fupload']['name'];
      $acak           = $_POST[nomordokumentevident];
      $nama_file_unik = $acak.$nama_file; 
      

      if($lokasi_file==""){

        $update=mysqli_query($con,"UPDATE dokumentevident SET nama_dokumentevident   = '$_POST[namadokumentevident]',
                            tahun   = '$_POST[tahun]'
                           WHERE  id_dokumentevident     = '$_POST[id_dokumentevident]'");
 
            if($update>0){
            ?>
              
            <script type="application/javascript">
            alert("Data DOKUMENT evident Berhasil Diedit! ");
            document.location='?module=files&menu=m_dokevident_user';
            </script>
            
            <?php 
            }else{
            ?>
              
            <script type="application/javascript">
            alert("Data EVIDENT Gagal Diedit! ");
            document.location='?module=files&menu=m_dokevident_user';
            </script>
              <?php
            } 

      }else{
        $cek=mysqli_query($con,"select *from dokumentevident  where id_dokumentevident ='$_POST[id_dokumentevident]'");
        $h=mysqli_fetch_array($cek);
        unlink("dokument/evident/$h[files]");
        UploadFileevident($nama_file_unik);
        $update=mysqli_query($con,"UPDATE dokumentevident SET tahun   = '$_POST[tahun]'                                                    ,nama_dokumentevident   = '$_POST[namadokumentevident]'                                                    ,files = '$nama_file_unik'
                           WHERE  id_dokumentevident     = '$_POST[id_dokumentevident]'");
 
            if($update>0){
            ?>
              
            <script type="application/javascript">
            alert("Data EVIDENT Berhasil Diedit! ");
            document.location='?module=files&menu=m_dokevident_user';
            </script>
            
            <?php 
            }else{
            ?>
              
            <script type="application/javascript">
            alert("Data EVIDENT Gagal Diedit! ");
            document.location='?module=files&menu=m_dokevident_user';
            </script>
              <?php
            }        
      }
		
    

		}
		
		
		$module=$_GET['module'];
		$menu=$_GET['menu'];
		$act=$_GET['act'];
		if ($menu=='m_dokevident_user'  AND $act=='hapus'){

  $cek=mysqli_query($con,"select *from dokumentevident  where id_dokumentevident ='$_GET[id]'");
  $h=mysqli_fetch_array($cek);
  unlink("dokument/evident/$h[files]");
  
  mysqli_query($con,"DELETE FROM dokumentevident WHERE id_dokumentevident='$_GET[id]'");
   
          
    ?>

  <script type="application/javascript">
  alert("Data EVIDENT Berhasil Dihapus ! ");
  document.location='?module=files&menu=m_dokevident_user';
  </script>
  <?php 
}
	
				?>
