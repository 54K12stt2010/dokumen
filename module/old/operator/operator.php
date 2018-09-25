<?php
$act_data=$_GET['act'];
if($act_data=="editoperator"){
	$sh_act="EDIT DATA OPERATOR SYSTEM";
	}elseif($act_data=="tambahoperator"){
	$sh_act="TAMBAH DATA OPERATOR SYSTEM";
	}else{
	$sh_act=" DATA OPERATOR SYSTEM";
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
                             
                               
                               <a href="?module=operator&act=tambahoperator" class="btn btn-info  btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data </a>

                                    <!-- start project list -->
                                    <table class="table table-striped responsive-utilities jambo_table data">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%">NO</th>
                                            	<th>USERNAME</th>
                                            	<th>NAMA LENGKAP</th>
                                            	<th>BIDANG</th>
                                            	<th>JABATAN</th>
                                            	<th>LEVEL</th>
                                            	<th>BLOKIR</th>
                                            	<th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
      										$tampil = mysqli_query($con,"SELECT * FROM operator where username<>'10011754' ORDER BY   username  ");
									   $no=1;
	 									while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
		 								$tujjjuan=$r['jabatan'];
			 							$find=mysqli_query($con,"SELECT * FROM jabatan  where id_jabatan='$tujjjuan' ");
    									$fi=mysqli_fetch_array($find,MYSQLI_ASSOC);
										
		 								$fatasana=$r['atasan'];
			 							$fat=mysqli_query($con,"SELECT * FROM jabatan  where id_jabatan='$fatasana' ");
    									$fata=mysqli_fetch_array($fat,MYSQLI_ASSOC);
										
										
		 								$bidang=$r['bidang'];
			 							$fbidang=mysqli_query($con,"SELECT * FROM bidang  where id_bidang='$bidang' ");
    									$fb=mysqli_fetch_array($fbidang,MYSQLI_ASSOC);
										
										
		 								$bagian=$r['bagian'];
			 							$fbagian=mysqli_query($con,"SELECT * FROM bagian  where id_bagian='$bagian' ");
    									$fba=mysqli_fetch_array($fbagian,MYSQLI_ASSOC);

    									if($r[level]=="user"){
											$showlevel="USER";
											}
										elseif($r[level]=="superadmin"){
											$showlevel="SUPER ADMIN";
											}

											echo "<tr><td>$no</td>
             							<td>$r[username]</td>
             							<td>$r[nama_lengkap]</td>
		         						<td >$fb[nama_bidang]</td>
		         						<td >$fi[nama_jabatan]</td>
		         						<td >$showlevel</td>
		         						<td >$r[blokir]</td>";
             							?>
                                        <td class="td-actions">
                                            <a href="?module=operator&act=editoperator&id=<?php echo"$r[username]";?>"; class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a <?php echo"onClick=\"return confirm ('Apakah Anda Yakin ingin Menghapus  $r[nama_lengkap]')\"    href=?module=operator&act=hapus&id=$r[username]"; ?> class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
								
							// tambah data operator
							case "tambahoperator":
							echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasi(this)' method=POST >
          <table id='sample-table' class='table table-hover  tablesorter'>
          <tr><td><div style='float:left; width:90px;' >Username</div></td>     <td>  <input type=text name='username' size=30 placeholder='Username Tidak Boleh Sama'></td></tr>
          <tr><td>Password</td>     <td>  <input type=text name='password' size=30></td></tr>
          <tr><td>Nama Lengkap</td> <td>  <input type=text name='nama_lengkap' size=30></td></tr><tr>
		  <tr><td>Bidang </td><td align='left'>";  
		  
			echo "
			<select name='bidang' id='bidang'>";
			$bid=mysqli_query($con,"select *from bidang   order by nama_bidang");
			while($databid=mysqli_fetch_array($bid,MYSQLI_ASSOC)){
			echo"<option value=\"$databid[id_bidang]\" >$databid[nama_bidang]</option>";
			}
			
			
          echo"</select>
			</tr><tr>
			</td>  <td>Bagian </td><td align='left'>";  
		  
			echo "			<select name='bagian' id='bagian'>";
			$bag=mysqli_query($con,"select *from bagian   order by nama_bagian");
			while($databag=mysqli_fetch_array($bag,MYSQLI_ASSOC)){
			echo"<option value=\"$databag[id_bagian]\" >$databag[nama_bagian]</option>";
			}
			
			
          echo"</select>
			
			</td> 
				</tr><tr>
				 <td>Jabatan </td><td align='left'>";  
		  
			echo "<select name='jabatan' id='jabatan'>";
			$kat=mysqli_query($con,"select *from jabatan   order by nama_jabatan");
			while($data=mysqli_fetch_array($kat,MYSQLI_ASSOC)){
			echo"<option value=\"$data[id_jabatan]\" >$data[nama_jabatan]</option>";
			}
			
			
          echo"</select>
			
			</td></tr><tr><td>atasan</td>       <td>  
			<select name='atasan' id='atasan'>";
			$akat=mysqli_query($con,"select *from jabatan   order by nama_jabatan");
			while($dataat=mysqli_fetch_array($akat,MYSQLI_ASSOC)){
			echo"<option value=\"$dataat[id_jabatan]\" >$dataat[nama_jabatan]</option>";
			}
			
			
          echo"</select>
		  </td></tr>
     		<tr><td>Level</td>     <td>   
								<select name='level'>
									<option value='superadmin'> SUPER ADMIN </option>
									<option value='user'> USER </option>
								</select> 
			</td></tr>
          <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value=Simpan name='simpan'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
    	
                             </div>";	
			break;
			
			
			case "editoperator":
			$show=mysqli_fetch_array(mysqli_query($con,"select *from operator where username='$_GET[id]'"));

			echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasiedit(this)' method=POST enctype='multipart/form-data' >
          <table id='sample-table' class='table table-hover  tablesorter'>
          <tr><td><div style='float:left; width:90px;' >Username</div></td>     <td>  <input type=text name='username' size=30 placeholder='Username Tidak Boleh Sama' value='$show[username]' readonly></td></tr>
           <tr><td>Password</td>     <td>  <input type=text name='password' size=30 placeholder='Kosongkan  jika tidak diubah''></td></tr>
          <tr><td>Nama Lengkap</td> <td>  <input type=text name='nama_lengkap' size=30 value='$show[nama_lengkap]'></td></tr><tr>
		  <tr><td>Bidang </td><td align='left'>";  
		  
			echo "
			<select name='bidang' id='bidang'>";
			$c_bidang=mysqli_fetch_array(mysqli_query($con,"select *from bidang where id_bidang='$show[bidang]' "));
			$bid=mysqli_query($con,"select *from bidang  where id_bidang<>'$show[bidang]' order by nama_bidang");
			echo"<option value=\"$c_bidang[id_bidang]\" >$c_bidang[nama_bidang]</option>";
			while($databid=mysqli_fetch_array($bid,MYSQLI_ASSOC)){
			echo"<option value=\"$databid[id_bidang]\" >$databid[nama_bidang]</option>";
			}
			
			
          echo"</select>
			</tr><tr>
			</td>  <td>Bagian </td><td align='left'>";  
		  
			echo "
			<select name='bagian' id='bagian'>";
			$bag=mysqli_query("select *from bagian  where id_bagian<>'$show[bagian]' order by nama_bagian");
			$c_bagian=mysqli_fetch_array(mysqli_query($con,"select *from bagian where id_bagian='$show[bagian]' "));
			echo"<option value=\"$c_bagian[id_bagian]\" >$c_bagian[nama_bagian]</option>";

			while($databag=mysqli_fetch_array($bag,MYSQLI_ASSOC)){
			echo"<option value=\"$databag[id_bagian]\" >$databag[nama_bagian]</option>";
			}
			
			
          echo"</select>
			
			</td> 
				</tr><tr>
				 <td>Jabatan </td><td align='left'>";  
		  
			echo "
			<select name='jabatan' id='jabatan'>";
			$kat=mysqli_query("select *from jabatan  where id_jabatan<>'$show[jabatan]'  order by nama_jabatan");
			$c_kat=mysqli_fetch_array(mysqli_query($con,"select *from jabatan where id_jabatan='$show[jabatan]' "));
			echo"<option value=\"$c_kat[id_jabatan]\" >$c_kat[nama_jabatan]</option>";
			while($data=mysqli_fetch_array($kat,MYSQLI_ASSOC)){
			echo"<option value=\"$data[id_jabatan]\" >$data[nama_jabatan]</option>";
			}
			
			
          echo"</select>
			
			</td></tr><tr><td>atasan</td>       <td>  
			<select name='atasan' id='atasan'>";
			$akat=mysqli_query($con,"select *from jabatan  where id_jabatan<>'$show[atasan]'  order by nama_jabatan");
			$c_akat=mysqli_fetch_array(mysqli_query($con,"select *from jabatan where id_jabatan='$show[atasan]' "));
			echo"<option value=\"$c_akat[id_jabatan]\" >$c_akat[nama_jabatan]</option>";
			while($dataat=mysqli_fetch_array($akat,MYSQLI_ASSOC)){
			echo"<option value=\"$dataat[id_jabatan]\" >$dataat[nama_jabatan]</option>";
			}
			
			
			
			
          echo"</select>
		  </td></tr>
		  ";
			if ($show['blokir']=='N'){
      echo "<tr><td>Blokir</td>     <td height=30px>  <input type=radio name='blokir' value='Y'> Y   
                                           <input type=radio name='blokir' value='N' checked> N </td></tr>";
    }
    else{
      echo "<tr><td height=30px>Blokir</td>     <td>  <input type=radio name='blokir' value='Y' checked> Y  
                                           <input type=radio name='blokir' value='N'> N </td></tr>";
    } 
          echo"
     		<tr><td>Level</td>     <td>  "; 
			$levelsimpan=array("superadmin","user");
			$levelshow=array("SUPER ADMIN","USER");
			echo"<select name='level'>";
			if($show[level]=="superadmin"){
				$showlevel="SUPER ADMIN";
				}
			elseif($show[level]=="user"){
				$showlevel="USER";
				}
				echo"<option value='$show[level]'> $showlevel </option>";
			for($ij=0;$ij<=1;$ij++){
				
				echo"<option value='$levelsimpan[$ij]'> $levelshow[$ij] </option>";
				}
				echo"</select>"; 
			echo"</td>
			</tr>
			<tr><td>Gambar</td>       <td> :  ";
          if ($show[profil]!=''){
              echo "<img src='profil/sedang_$show[profil]'>";  
          }
    echo "</td></tr>
          <tr><td>Ganti Gbr</td>    <td>  <input class=tabelgaya type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
		  <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='editdata'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
    	
                             </div>";	
			break;
							}





	if(isset($_POST['simpan'])){
	
	$cek=mysqli_query($con,"select *from operator  where username='$_POST[username]'");
	$h=mysqli_num_rows($cek);
	if($h>0){
		
		
		 ?>
  <script type="application/javascript">
  alert("Usernama Sudah ada , Silahkan Gunakan Username Yang Lain ! ");
  document.location='?module=operator&act=tambahoperator';
  </script>
  <?php 
  
		}else{
			
			
			
	$pass=md5($_POST['password']);
  mysqli_query($con,"INSERT INTO operator(username,
                                 password,
								 bidang,
								 bagian,
                                 nama_lengkap,
								 jabatan,
                                 atasan, 
								 level,
								 blokir) 
	                       VALUES('$_POST[username]',
                                '$pass',
								'$_POST[bidang]',
								'$_POST[bagian]',
                                '$_POST[nama_lengkap]',
								'$_POST[jabatan]',
                                '$_POST[atasan]',
								'$_POST[level]',
								'N')");
    ?>
  <script type="application/javascript">
  
  alert("Data Operator Berhasil Ditambah ! ");
  document.location='?module=operator';
  </script>
  <?php 
			
			}
	
	}
	
	elseif(isset($_POST[editdata])){
	$passaa= md5($_POST[password]);
  if (empty($_POST['password'])) {
	    $lokasi_file    = $_FILES['fupload']['tmp_name'];
  		$tipe_file      = $_FILES['fupload']['type'];
  		$nama_file      = $_FILES['fupload']['name'];
  		$acak           = $_POST[username];
  		$nama_file_unik = $acak.$nama_file; 

  		$judul_seo = seo_title($_POST['judul']);

  		// Apabila gambar tidak diganti
  		if (empty($lokasi_file)){
	  
     $update=mysqli_query($con,"UPDATE operator SET nama_lengkap   = '$_POST[nama_lengkap]',
								  bidang			='$_POST[bidang]',
								  bagian			='$_POST[bagian]',
								  username			='$_POST[username]',
                                  atasan          = '$_POST[atasan]',
                                  blokir         = '$_POST[blokir]',
								  jabatan		='$_POST[jabatan]',   
                                  level        = '$_POST[level]'  
                           WHERE  username     = '$_POST[username]'");
		}else{
		   	if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    		echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        	window.location=('?module=operator&act=editoperator&id=$_POST[username]')</script>";
    		}
    		else{
			$cari=mysqli_query("select*from operator where  username     = '$_POST[username]'");
			$del=mysqli_fetch_array($cari);
			unlink("profil/$del[profil]");
			unlink("profil/sedang_$del[profil]");
			UploadProfil($nama_file_unik);	
			$update=mysqli_query($con,"UPDATE operator SET nama_lengkap   = '$_POST[nama_lengkap]',
								  bidang			='$_POST[bidang]',
								  bagian			='$_POST[bagian]',
								  username			='$_POST[username]',
                                  atasan          = '$_POST[atasan]',
                                  blokir         = '$_POST[blokir]',
								  jabatan		='$_POST[jabatan]',   
                                  level        = '$_POST[level]',
								  profil		= '$nama_file_unik' 
                           WHERE  username     = '$_POST[username]'");
				
			}
			}
  }
  // Apabila password diubah
  else{
    	$lokasi_file    = $_FILES['fupload']['tmp_name'];
  		$tipe_file      = $_FILES['fupload']['type'];
  		$nama_file      = $_FILES['fupload']['name'];
  		$acak           = $_POST[username];
  		$nama_file_unik = $acak.$nama_file; 

  		$judul_seo = seo_title($_POST['judul']);


  		// Apabila gambar tidak diganti
  		if (empty($lokasi_file)){
			$update=mysqli_query($con,"UPDATE operator SET password        = '$passaa',
                                 nama_lengkap    = '$_POST[nama_lengkap]',
								  bidang			='$_POST[bidang]',
								  bagian			='$_POST[bagian]',
                                 atasan           = '$_POST[atasan]', 
								  username			='$_POST[username]', 
                                 blokir          = '$_POST[blokir]', 
								  jabatan		='$_POST[jabatan]', 
                                  level        = '$_POST[level]'
                           WHERE username    = '$_POST[username]'");
		}else{
			 if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('?module=operator&act=editoperator&id=$_POST[username]')</script>";
    }
    else{
			$cari=mysqli_query($con,"select*from operator where  username     = '$_POST[username]'");
			$del=mysqli_fetch_array($cari);
			unlink("profil/$del[profil]");
			unlink("profil/sedang_$del[profil]");
			UploadProfil($nama_file_unik);
					$update=mysql_query("UPDATE operator SET password        = '$passaa',
                                 nama_lengkap    = '$_POST[nama_lengkap]',
								  bidang			='$_POST[bidang]',
								  bagian			='$_POST[bagian]',
                                 atasan           = '$_POST[atasan]', 
								  username			='$_POST[username]', 
                                 blokir          = '$_POST[blokir]', 
								  jabatan		='$_POST[jabatan]', 
                                  level        = '$_POST[level]' ,
								  profil		= '$nama_file_unik' 
                           WHERE username    = '$_POST[username]'");
			}
		}
		
		}
    if($update>0){
	?>
    
  <script type="application/javascript">
  alert("Data Operator Berhasil Diedit! ");
  document.location='?module=operator';
  </script>
  <?php 
}else{
	?>
    
  <script type="application/javascript">
  alert("Data Operator Gagal Diedit! ");
  document.location='?module=operator';
  </script>
    <?php
	}

		}
		
		
		$module=$_GET['module'];
		$submenu=$_GET['submenu'];
		$act=$_GET['act'];
		if ($module=='operator'  AND $act=='hapus'){
  mysqli_query($con,"DELETE FROM operator WHERE username='$_GET[id]'");
    ?>
  <script type="application/javascript">
  alert("Data Operator Berhasil Dihapus ! ");
  document.location='?module=operator';
  </script>
  <?php 
}
	
				?>