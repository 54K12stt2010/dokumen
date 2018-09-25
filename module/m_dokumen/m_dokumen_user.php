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
                                

                                <div class="x_content">
                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab1" class="nav nav-tabs bar_tabs right" role="tablist">
                                            <li role="presentation" class="<?php echo"$set1";?>"><a href="?module=files&menu=m_dokipm_user">Dokument IPM</a>
                                            </li>
                                            <li role="presentation" class="<?php echo"$set1";?>"><a href="?module=files&menu=m_dokik_user">Dokument SOP & IK </a>
                                            </li>
                                            <li role="presentation" class="<?php echo"$set1";?>"><a href="?module=files&menu=m_dokevident_user">Dokument Evident </a>
                                            </li>
                                        </ul>
                                    </div>

        <div class="x_panel">
		<?php
		if(($_GET['module']=="files")&&($_GET['menu']=="m_dokipm_user")){
			include('m_dokipm_user.php');
		}elseif(($_GET['module']=="files")&&($_GET['menu']=="m_dokik_user")){
			include('m_dokik_user.php');
		}elseif(($_GET['module']=="files")&&($_GET['menu']=="m_dokevident_user")){
			include('m_dokevident_user.php');
		}
		?>	