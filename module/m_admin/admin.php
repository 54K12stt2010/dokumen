

<?php 
if($_GET[menu]=="m_admin"){
	$set1="active";
}elseif($_GET[menu]=="m_bidang"){
	$set2="active";
}elseif($_GET[menu]=="m_bagian"){
	$set3="active";
}elseif($_GET[menu]=="m_jabatan"){
	$set4="active";
}elseif($_GET[menu]=="m_standart"){
	$set5="active";
}elseif($_GET[menu]=="m_daftar_isi"){
	$set6="active";
}elseif($_GET[menu]=="m_nilai_iso"){
	$set7="active";
}elseif($_GET[menu]=="m_matrik_ims"){
	$set8="active";
}

 ?>

<div class="row">

	<div class="col-md-12">
		<div class="" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab1" class="nav nav-tabs bar_tabs right" role="tablist">
				<li role="presentation" class="<?php echo"$set1";?>"><a href="?module=master&menu=m_admin">Data User</a>
				</li>
				<li role="presentation" class="<?php echo"$set2";?>"><a href="?module=master&menu=m_bidang">Data Bidang</a>
				</li>
				<li role="presentation" class="<?php echo"$set3";?>"><a href="?module=master&menu=m_bagian" >Data Bagian</a>
				</li>
				<li role="presentation" class="<?php echo"$set4";?>"><a href="?module=master&menu=m_jabatan" >Data Jabatan</a>
				</li>
				<li role="presentation" class="<?php echo"$set5";?>"><a href="?module=master&menu=m_standart" >Data Standart</a>
				</li>
				<!-- <li role="presentation" class="<?php echo"$set6";?>"><a href="?module=master&menu=m_menu_buku" >Daftar Isi</a>
				</li> -->
				<li role="presentation" class="<?php echo"$set6";?>"><a href="?module=master&menu=m_daftar_isi" >Buku Standart</a>
				</li>
				<li role="presentation" class="<?php echo"$set7";?>"><a href="?module=master&menu=m_nilai_iso" >Nilai Standart ISO</a>
				</li>
				<li role="presentation" class="<?php echo"$set8";?>"><a href="?module=master&menu=m_matrik_ims&standart=4&id_menu=1" >Matrik IMS</a>
				</li>

			</ul>
		</div>

		<div class="x_panel">
		<?php
		if(($_GET['module']=="master")&&($_GET['menu']=="m_admin")){
			include('m_admin_user.php');
		}elseif(($_GET['module']=="master")&&($_GET['menu']=="m_bidang")){
			include('m_bidang_user.php');
		}elseif(($_GET['module']=="master")&&($_GET['menu']=="m_bagian")){
			include('m_bagian_user.php');
		}elseif(($_GET['module']=="master")&&($_GET['menu']=="m_jabatan")){
			include('m_jabatan_user.php');
		}elseif(($_GET['module']=="master")&&($_GET['menu']=="m_standart")){
			include('m_standart_user.php');
		}elseif(($_GET['module']=="master")&&($_GET['menu']=="m_daftar_isi")){
			include('m_daftarisi_user.php');
		}elseif(($_GET['module']=="master")&&($_GET['menu']=="m_nilai_iso")){
			include('m_nilai_user.php');
		}elseif(($_GET['module']=="master")&&($_GET['menu']=="m_matrik_ims")){
			include('m_matrik_ims.php');
		}elseif(($_GET['module']=="master")&&($_GET['menu']=="m_matrik_ims_detail")){
			include('m_matrik_ims_detail.php');
		}
		?>	


