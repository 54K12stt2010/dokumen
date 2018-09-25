<?php
$act_data=$_GET['act'];
if($act_data=="editdokumentik"){
	$sh_act="EDIT DATA DOKUMENT IK";
	}elseif($act_data=="tambahdokumentik"){
	$sh_act="TAMBAH DATA DOKUMENT IK";
	}else{
	$sh_act=" DATA DOKUMENT IK";
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
                             
                               
                               <a href="?module=files&menu=m_dokik_user&act=tambahdokumentik" class="btn btn-info  btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data </a>

                                    <!-- start project list -->
                                    <table class="table table-striped responsive-utilities jambo_table data">
                                        <thead>
                                            <tr>
                                            <th>NO</th>
                                            <th>NOMER IK</th>
                                            <th>NAMA DOKUMENT IK</th>
                                            <th>FILES</th>
                                            <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
      										$tampil = mysqlI_query($con,"SELECT * FROM dokumentik  ORDER BY   nama_dokumentik  ");
									   $no=1;
	 									while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
		 								echo "<tr><td>$no</td>
                          <td>$r[nomor_dokumentik]</td>
                          <td>$r[nama_dokumentik]</td>
                          <td>$r[files]</td>";
             							?>
                                        <td class="td-actions">
                                            <a href="?module=files&menu=m_dokik_user&act=editdokumentik&id=<?php echo"$r[id_dokumentik]";?>"; class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a <?php echo"onClick=\"return confirm ('Apakah Anda Yakin ingin Menghapus  $r[nama_dokumentik]')\"    href=?module=files&menu=m_dokik_user&act=hapus&id=$r[id_dokumentik]"; ?> class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
								
							// tambah data DOKUMENT ik
							case "tambahdokumentik":
							echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasiedit(this)' method=POST enctype='multipart/form-data' >
          <table id='sample-table' class='table table-hover  tablesorter'>
          <tr><td > <div style='float:left; width:130px;' >NOMER DOKUMENT IK </div></td>     <td> <input type=text name='nomordokumentik' size=30 >  </td></tr>
          <tr><td > <div style='float:left; width:130px;' >NAMA DOKUMENT IK </div></td>     <td> <input type=text name='namadokumentik' size=30 >  </td></tr>
          <tr><td>Upload Dokument</td>    <td>  <input class=tabelgaya type=file name='fupload' size=30></td></tr>
<tr><td colspan=2>*) File yang diupload harus dengan format PDF.</td></tr>
          <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value=Simpan name='simpan'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
		  <br>
    	
                             </div>";	
			break;
			
			
			case "editdokumentik":
			$show=mysqlI_fetch_array(mysqlI_query($con,"select *from dokumentik  where id_dokumentik='$_GET[id]'"));

			echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasiedit(this)' method=POST enctype='multipart/form-data' >
          <table id='sample-table' class='table table-hover  tablesorter'>
		  <input type=hidden name='id_dokumentik' size=30 value='$show[id_dokumentik]' >
          <tr><td><div style='float:left; width:130px;' > Nomor DOKUMENT IK </div></td>     <td>  <input type=text name='nomordokumentik' size=30 value='$show[nomor_dokumentik]' ></td></tr>
        <tr><td><div style='float:left; width:130px;' > Nama DOKUMENT IK </div></td>     <td>  <input type=text name='namadokumentik' size=30 value='$show[nama_dokumentik]' ></td></tr>
          <tr><td>Upload Dokument</td>    <td>  <input class=tabelgaya type=file name='fupload' size=30></td></tr>
      <tr><td colspan=2>*) File yang diupload harus dengan format PDF.</td></tr>
		  <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='editdata'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
    	
                             </div>";	
			break;
							}





		if(isset($_POST['simpan'])){
	
	$cek=mysqli_query($con,"select *from dokumentik  where nomor_dokumentik ='$_POST[nomerdokumentik]'");
	$h=mysqli_num_rows($cek);
	if($h>0){
		
		 ?>
  <script type="application/javascript">
  alert("Nomer DOKUMENT IK Sudah ada , Silahkan Gunakan Nomer DOKUMENT IK Yang Lain ! ");
  document.location='?module=files&menu=m_dokik_user&act=tambahdokumentik';
  </script>
  <?php 
  
		}else{
			
			
	$pass=md5($_POST['password']);
      // $lokasi_file    = $_FILES['fupload']['tmp_name'];
      // $tipe_file      = $_FILES['fupload']['type'];
      // $nama_file      = $_FILES['fupload']['name'];
      // $acak           = $_POST[nomordokumentik];
      // $acak2          = $_POST[namadokumentik];
      // $nama_file_unik = $acak.$acak2; 
      
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
      $tipe_file      = $_FILES['fupload']['type'];
      $nama_file      = $_FILES['fupload']['name'];
      $acak           = $_POST[nomordokumentik];
      $nama_file_unik = $acak.$nama_file; 
      UploadFileik($nama_file_unik);


  mysqli_query($con,"INSERT INTO dokumentik(id_dokumentik,nomor_dokumentik,
                                 nama_dokumentik,files) 
	                       VALUES('',
                '$_POST[nomordokumentik]',
                '$_POST[namadokumentik]',
                '$nama_file_unik')");
    ?>
  <script type="application/javascript">
  
  alert("Data DOKUMENT ik Berhasil Ditambah ! ");
  document.location='?module=files&menu=m_dokik_user';
  </script>
  <?php 
			
			}
	
	}
	
	elseif(isset($_POST[editdata])){

      $lokasi_file    = $_FILES['fupload']['tmp_name'];
      $tipe_file      = $_FILES['fupload']['type'];
      $nama_file      = $_FILES['fupload']['name'];
      $acak           = $_POST[nomordokumentik];
      $nama_file_unik = $acak.$nama_file; 
      

      if($lokasi_file==""){

        $update=mysqli_query($con,"UPDATE dokumentik SET nama_dokumentik   = '$_POST[namadokumentik]',
                                                      nomor_dokumentik   = '$_POST[nomordokumentik]'
                           WHERE  id_dokumentik     = '$_POST[id_dokumentik]'");
 
            if($update>0){
            ?>
              
            <script type="application/javascript">
            alert("Data DOKUMENT IK Berhasil Diedit! ");
            document.location='?module=files&menu=m_dokik_user';
            </script>
            
            <?php 
            }else{
            ?>
              
            <script type="application/javascript">
            alert("Data DOKUMENT IK Gagal Diedit! ");
            document.location='?module=files&menu=m_dokik_user';
            </script>
              <?php
            } 

      }else{
        $cek=mysqli_query($con,"select *from dokumentik  where id_dokumentik ='$_POST[id_dokumentik]'");
        $h=mysqli_fetch_array($cek);
        unlink("dokument/ik/$h[files]");
        UploadFileik($nama_file_unik);
        $update=mysqli_query($con,"UPDATE dokumentik SET nama_dokumentik   = '$_POST[namadokumentik]',
                                                      nomor_dokumentik   = '$_POST[nomordokumentik]',
                                                      files = '$nama_file_unik'
                           WHERE  id_dokumentik     = '$_POST[id_dokumentik]'");
 
            if($update>0){
            ?>
              
            <script type="application/javascript">
            alert("Data DOKUMENT IK Berhasil Diedit! ");
            document.location='?module=files&menu=m_dokik_user';
            </script>
            
            <?php 
            }else{
            ?>
              
            <script type="application/javascript">
            alert("Data DOKUMENT IK Gagal Diedit! ");
            document.location='?module=files&menu=m_dokik_user';
            </script>
              <?php
            }        
      }
		
    

		}
		
		
		$module=$_GET['module'];
		$menu=$_GET['menu'];
		$act=$_GET['act'];
		if ($menu=='m_dokik_user'  AND $act=='hapus'){

  $cek=mysqli_query($con,"select *from dokumentik  where id_dokumentik ='$_GET[id]'");
  $h=mysqli_fetch_array($cek);
  unlink("dokument/ik/$h[files]");
  
  mysqli_query($con,"DELETE FROM dokumentik WHERE id_dokumentik='$_GET[id]'");
   
          
    ?>

  <script type="application/javascript">
  alert("Data DOKUMENT IK Berhasil Dihapus ! ");
  document.location='?module=files&menu=m_dokik_user';
  </script>
  <?php 
}
	
				?>
