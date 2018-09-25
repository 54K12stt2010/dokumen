<?php
$act_data=$_GET['act'];
if($act_data=="editnilai_standart"){
	$sh_act="EDIT DATA NILAI STANDART";
	}elseif($act_data=="tambahnilai_standart"){
	$sh_act="TAMBAH DATA NILAI STANDART";
	}else{
	$sh_act=" DATA NILAI STANDART";
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
                             
                               
                               <a href="?module=master&menu=m_nilai_iso&act=tambahnilai_standart" class="btn btn-info  btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data </a>

                                    <!-- start project list -->
                                    <table class="table table-striped responsive-utilities jambo_table data">
                                        <thead>
                                            <tr>
                                            <th>NO</th>
                                            <th>STANDART</th>
                                            <th>TAHUN</th>
                                            <th>NILAI</th>
                                            <th>CATATAN</th>
                                            <th>FILE HASIL</th>
                                            <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
      										$tampil = mysqlI_query($con,"SELECT * FROM nilai_standart  ORDER BY   id_nilai_standart  ");
									   $no=1;
	 									while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
                      $standart=$r['id_standart'];
                      $fstandart=mysqli_query($con,"SELECT * FROM standart  where id_standart='$standart' ");
                      $fb=mysqli_fetch_array($fstandart,MYSQLI_ASSOC);


		 								echo "<tr><td>$no</td>
                          <td>$fb[nama_standart]</td>
                          <td>$r[tahun]</td>
                          <td>$r[nilai]</td>
                          <td>$r[catatan]</td>
                          <td>$r[file_hasil]</td>";
             							?>
                                        <td class="td-actions">
                                            <a href="?module=master&menu=m_nilai_iso&act=editnilai_standart&id=<?php echo"$r[id_nilai_standart]";?>"; class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a <?php echo"onClick=\"return confirm ('Apakah Anda Yakin ingin Menghapus  Hasil Nilai Standart Ini ?')\"    href=?module=master&menu=m_nilai_iso&act=hapus&id=$r[id_nilai_standart]"; ?> class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
							case "tambahnilai_standart":
							echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasiedit(this)' method=POST enctype='multipart/form-data' >
          <table id='sample-table' class='table table-hover  tablesorter'>
          <tr><td>Bidang </td><td align='left'>"; 
            echo "
            <select name='standart' id='standart'>";
            $bid=mysqli_query($con,"select *from standart   order by nama_standart");
            while($databid=mysqli_fetch_array($bid,MYSQLI_ASSOC)){
              echo"<option value=\"$databid[id_standart]\" >$databid[nama_standart]</option>";
            }
            echo"</select>
            </tr><tr>
          <tr><td > <div style='float:left; width:130px;' >TAHUN </div></td>     <td> <input type=text name='tahun' size=30 >  </td></tr>
          <tr><td > <div style='float:left; width:130px;' >NILAI </div></td>     <td> <input type=text name='nilai' size=30 >  </td></tr>
          <tr><td > <div style='float:left; width:130px;' >CATATAN </div></td>     <td> <textarea name='catatan' ></textarea></</td></tr>
          <tr><td>Upload Dokument Nilai</td>    <td>  <input class=tabelgaya type=file name='fupload' size=30></td></tr>
<tr><td colspan=2>*) File yang diupload harus dengan format PDF.</td></tr>
          <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value=Simpan name='simpan'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
		  <br>
    	
                             </div>";	
			break;
			
			
			case "editnilai_standart":
			$show=mysqlI_fetch_array(mysqlI_query($con,"select *from nilai_standart  where id_nilai_standart='$_GET[id]'"));

			echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasiedit(this)' method=POST enctype='multipart/form-data' >
          <table id='sample-table' class='table table-hover  tablesorter'>
		  <input type=hidden name='id_nilai_standart' size=30 value='$show[id_nilai_standart]' >
          <tr><td>Bidang </td><td align='left'>";  

          echo "
          <select name='standart' id='standart'>";
          $c_bidang=mysqli_fetch_array(mysqli_query($con,"select *from standart where id_standart='$show[standart]' "));
          $bid=mysqli_query($con,"select *from standart  where id_standart<>'$show[standart]' order by nama_standart");
          echo"<option value=\"$c_standart[id_standart]\" >$c_bidang[nama_standart]</option>";
          while($databid=mysqli_fetch_array($bid,MYSQLI_ASSOC)){
            echo"<option value=\"$databid[id_standart]\" >$databid[nama_standart]</option>";
          }


          echo"</select>
          </tr><tr>
          <tr><td > <div style='float:left; width:130px;' >TAHUN </div></td>     <td> <input type=text name='tahun' size=30 value='$show[tahun]' >  </td></tr>
          <tr><td > <div style='float:left; width:130px;' >NILAI </div></td>     <td> <input type=text name='nilai' size=30 value='$show[nilai]'>  </td></tr>
          <tr><td > <div style='float:left; width:130px;' >CATATAN </div></td>     <td> <textarea name='catatan' >$show[catatan]</textarea></</td></tr>
          <tr><td>Upload Dokument Nilai</td>    <td>  <input class=tabelgaya type=file name='fupload' size=30></td></tr>

      <tr><td colspan=2>*) File yang diupload harus dengan format PDF.</td></tr>
		  <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='editdata'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
    	
                             </div>";	
			break;
							}





		if(isset($_POST['simpan'])){
	
	$cek=mysqli_query($con,"select *from nilai_standart  where tahun ='$_POST[tahun]' and id_standart ='$_POST[standart]'");
	$h=mysqli_num_rows($cek);
	if($h>0){
		
		 ?>
  <script type="application/javascript">
  alert("Data Pada Tahun Yang Anda Masukkan Sudah Ada, Silahkan Ganti Tahun Penilaian ? ");
  document.location='?module=master&menu=m_nilai_iso&act=tambahnilai_standart';
  </script>
  <?php 
  
		}else{
			
      // $lokasi_file    = $_FILES['fupload']['tmp_name'];
      // $tipe_file      = $_FILES['fupload']['type'];
      // $nama_file      = $_FILES['fupload']['name'];
      // $acak           = $_POST[nomornilai_standart];
      // $acak2          = $_POST[namanilai_standart];
      // $nama_file_unik = $acak.$acak2; 
      
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
      $tipe_file      = $_FILES['fupload']['type'];
      $nama_file      = $_FILES['fupload']['name'];
      $acak           = $_POST[tahun];
      $nama_file_unik = $acak.$nama_file; 
      UploadFilenilai($nama_file_unik);

if($nama_file==""){
 mysqli_query($con,"INSERT INTO nilai_standart(id_nilai_standart,id_standart,tahun,
                                 nilai,catatan) 
                         VALUES('',
                '$_POST[standart]',
                '$_POST[tahun]',
                '$_POST[nilai]',
                '$_POST[catatan]')");
    ?>
  <script type="application/javascript">
  
  alert("Data Nilai Standart Berhasil Ditambah ! ");
  document.location='?module=master&menu=m_nilai_iso';
  </script>
  <?php 
      
}else{
   mysqli_query($con,"INSERT INTO nilai_standart(id_nilai_standart,id_standart,tahun,
                                 nilai,file_hasil,catatan) 
                         VALUES('',
                '$_POST[standart]',
                '$_POST[tahun]',
                '$_POST[nilai]',
                '$nama_file_unik',
                '$_POST[catatan]')");
    ?>
  <script type="application/javascript">
  
  alert("Data Nilai Standart Berhasil Ditambah ! ");
  document.location='?module=master&menu=m_nilai_iso';
  </script>
  <?php 
      
}
 
			}
	
	}
	
	elseif(isset($_POST[editdata])){

      $lokasi_file    = $_FILES['fupload']['tmp_name'];
      $tipe_file      = $_FILES['fupload']['type'];
      $nama_file      = $_FILES['fupload']['name'];
      $acak           = $_POST[tahun];
      $nama_file_unik = $acak.$nama_file; 
      

      if($lokasi_file==""){

        $update=mysqli_query($con,"UPDATE nilai_standart SET tahun   = '$_POST[tahun]',id_standart   = '$_POST[standart]',
                                                      nilai   = '$_POST[nilai]', catatan = '$_POST[catatan]'
                           WHERE  id_nilai_standart     = '$_POST[id_nilai_standart]'");
 
            if($update>0){
            ?>
              
            <script type="application/javascript">
            alert("Data  Nilai Standart Berhasil Diedit! ");
            document.location='?module=master&menu=m_nilai_iso';
            </script>
            
            <?php 
            }else{
            ?>
              
            <script type="application/javascript">
            alert("Data  Nilai Standart Gagal Diedit! ");
            document.location='?module=master&menu=m_nilai_iso';
            </script>
              <?php
            } 

      }else{
        $cek=mysqli_query($con,"select *from nilai_standart  where id_nilai_standart ='$_POST[id_nilai_standart]'");
        $h=mysqli_fetch_array($cek);
        unlink("dokument/nilai/$h[file_hasil]");
        UploadFile($nama_file_unik);
        $update=mysqli_query($con,"UPDATE nilai_standart SET tahun   = '$_POST[tahun]',id_standart   = '$_POST[standart]',
                                                      nilai   = '$_POST[nilai]', catatan = '$_POST[catatan]'
                                                      ,file_hasil = '$nama_file_unik'
                           WHERE  id_nilai_standart     = '$_POST[id_nilai_standart]'");
 
            if($update>0){
            ?>
              
            <script type="application/javascript">
            alert("Data Nilai Standart Berhasil Diedit! ");
            document.location='?module=master&menu=m_nilai_iso';
            </script>
            
            <?php 
            }else{
            ?>
              
            <script type="application/javascript">
            alert("Data  Nilai Standart  Gagal Diedit! ");
            document.location='?module=master&menu=m_nilai_iso';
            </script>
              <?php
            }        
      }
		
    

		}
		
		
		$module=$_GET['module'];
		$menu=$_GET['menu'];
		$act=$_GET['act'];
		if ($menu=='m_nilai_iso'  AND $act=='hapus'){

  $cek=mysqli_query($con,"select *from nilai_standart  where id_nilai_standart ='$_GET[id]'");
  $h=mysqli_fetch_array($cek);
  unlink("dokument/nilai/$h[file_hasil]");
  
  mysqli_query($con,"DELETE FROM nilai_standart WHERE id_nilai_standart='$_GET[id]'");
   
          
    ?>

  <script type="application/javascript">
  alert("Data Nilai Standart Berhasil Dihapus ! ");
  document.location='?module=master&menu=m_nilai_iso';
  </script>
  <?php 
}
	
				?>
