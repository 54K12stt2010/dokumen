<?php
$act_data=$_GET['act'];
if($act_data=="editbidang"){
	$sh_act="EDIT DATA BIDANG";
	}elseif($act_data=="tambahbidang"){
	$sh_act="TAMBAH DATA BIDANG";
	}else{
	$sh_act=" DATA BIDANG";
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
                             
                               
                               <a href="?module=master&menu=m_bidang&act=tambahbidang" class="btn btn-info  btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data </a>

                                    <!-- start project list -->
                                    <table class="table table-striped responsive-utilities jambo_table data">
                                        <thead>
                                            <tr>
                                            <th>NO</th>
                                            <th>NAMA BIDANG</th>
                                            <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
      										$tampil = mysqlI_query($con,"SELECT * FROM bidang  ORDER BY   nama_bidang  ");
									   $no=1;
	 									while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
		 								echo "<tr><td>$no</td>
             							<td>$r[nama_bidang]</td>";
             							?>
                                        <td class="td-actions">
                                            <a href="?module=master&menu=m_bidang&act=editbidang&id=<?php echo"$r[id_bidang]";?>"; class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a <?php echo"onClick=\"return confirm ('Apakah Anda Yakin ingin Menghapus  $r[nama_bidang]')\"    href=?module=master&menu=m_bidang&act=hapus&id=$r[id_bidang]"; ?> class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
							case "tambahbidang":
							echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasi(this)' method=POST >
          <table id='sample-table' class='table table-hover  tablesorter'>
          <tr><td > <div style='float:left; width:90px;' >Nama Bidang </div></td>     <td> <input type=text name='namabidang' size=30 >  </td></tr>
          <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value=Simpan name='simpan'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
		  <br>
    	
                             </div>";	
			break;
			
			
			case "editbidang":
			$show=mysqlI_fetch_array(mysqlI_query($con,"select *from bidang where id_bidang='$_GET[id]'"));

			echo"<div class='box-hide-me box-content'>
          <form onSubmit='return validasiedit(this)' method=POST >
          <table id='sample-table' class='table table-hover  tablesorter'>
		  <input type=hidden name='idbidang' size=30 value='$show[id_bidang]' >
          <tr><td><div style='float:left; width:90px;' > Nama Bidang </div></td>     <td>  <input type=text name='namabidang' size=30 value='$show[nama_bidang]' ></td></tr>
		  <tr><td></td><td colspan=2><div id='paddingsaja' ><input type=submit class='btn btn-medium btn-primary' value='Edit' name='editdata'>
                            <input type=button class='btn btn-danger'  value=Batal onclick=self.history.back()></div></td></tr>
          </table></form>
    	
                             </div>";	
			break;
							}





		if(isset($_POST['simpan'])){
	
	$cek=mysqli_query($con,"select *from bidang  where nama_bidang='$_POST[namabidang]'");
	$h=mysqli_num_rows($cek);
	if($h>0){
		
		 ?>
  <script type="application/javascript">
  alert("Nama Bidang Sudah ada , Silahkan Gunakan nama bidang Yang Lain ! ");
  document.location='?module=masterdata&submenu=bidang&act=tambahbidang';
  </script>
  <?php 
  
		}else{
			
			
	$pass=md5($_POST['password']);
  mysqli_query($con,"INSERT INTO bidang(id_bidang,
                                 nama_bidang) 
	                       VALUES('',
								'$_POST[namabidang]')");
    ?>
  <script type="application/javascript">
  
  alert("Data bidang Berhasil Ditambah ! ");
  document.location='?module=master&menu=m_bidang';
  </script>
  <?php 
			
			}
	
	}
	
	elseif(isset($_POST[editdata])){
		
    $update=mysqli_query($con,"UPDATE bidang SET nama_bidang   = '$_POST[namabidang]'
                           WHERE  id_bidang     = '$_POST[idbidang]'");
 
    if($update>0){
	?>
    
  <script type="application/javascript">
  alert("Data bidang Berhasil Diedit! ");
  document.location='?module=master&menu=m_bidang';
  </script>
  <?php 
}else{
	?>
    
  <script type="application/javascript">
  alert("Data bidang Gagal Diedit! ");
  document.location='?module=master&menu=m_bidang';
  </script>
    <?php
	}

		}
		
		
		$module=$_GET['module'];
		$menu=$_GET['menu'];
		$act=$_GET['act'];
		if ($menu=='m_bidang'  AND $act=='hapus'){
  mysqli_query($con,"DELETE FROM bidang WHERE id_bidang='$_GET[id]'");
    ?>
  <script type="application/javascript">
  alert("Data bidang Berhasil Dihapusdd ! ");
  document.location='?module=master&menu=m_bidang';
  </script>
  <?php 
}
	
				?>
