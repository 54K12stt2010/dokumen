<?php
$act_data=$_GET['act'];
if($act_data=="editequipment_maximo"){
	$sh_act="EDIT EQUIPMENT MAXIMO";
	}elseif($act_data=="tambahequipment_maximo"){
	$sh_act="TAMBAH EQUIPMENT MAXIMO";
	}else{
	$sh_act=" MENAMPILKAN FTP ";
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


                                <iframe src="ftp://192.168.1.190" scrolling="auto" width="100%" height="500px" frameborder="0">dd</iframe>



