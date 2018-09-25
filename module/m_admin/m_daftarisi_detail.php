<?php 
$id_standart1="$_GET[standart]";
$cari1=mysqli_query($con,"select * from standart where  id_standart = '$id_standart1'");
$h_cari=mysqli_fetch_array($cari1);
?>

<div class="row">

    <div class="col-md-3">
        <div class="x_panel">
            <div class="x_title">
                <h2><b>DAFTAR ISI :  <?php echo"$h_cari[nama_standart] ";?> </b></h2>

                            
                                <!-- perhatikan pada atribut class dan id, ini atribut yang berisi data yang akan dipanggil ketika tombol di klik -->
                                
                            
                <div class="clearfix"></div>
            </div>
            <div class="x_content"> 

            <div class="thum-cover">
                <?PHP 
                    include('daftar-isi.php');
                ?>
     
            
            <br>
            <br>
            <div class="x_title">
                <h2><b>HISTORY HASIL AUDIT </b></h2>
                <div class="clearfix"></div>
            </div>

                <div class="">
                        
                         
                                <ul class='to_do'>
                                    <?php 
                                    $tampil = mysqli_query($con,"SELECT * FROM nilai_standart where id_standart='$id_standart1' ORDER BY   tahun  ");
                                    $no=1;
                                    while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
                                        echo"
                                        <li>
                                            <a href='?module=detail_daftarisi&standart=$id_standart1&daftar_isi=nilai&id=$r[id_nilai_standart]'>
                                            <div class='fa fa-forward'></div> 
                                            Audit Tahun $r[tahun] 
                                            </a>
                                        </li>";
                                    }
                                    ?> 
                                </ul>
                          
                        
                </div>
            </div>
            </div>                                    
        </div>                                 
    </div>

    <div class="col-md-9">
        <div class="x_panel">
        <?php 
        if($_GET[daftar_isi]=="nilai"){
            $show=mysqlI_fetch_array(mysqlI_query($con,"select *from nilai_standart  where id_nilai_standart='$_GET[id]'"));

            echo"
            <div class='x_title'>
                <h2><b>HISTORY HASIL PENILAIAN</b></h2><br>
                <div class='box-hide-me box-content'>
          <form onSubmit='return validasiedit(this)' method=POST enctype='multipart/form-data' >
          <table id='sample-table' class='table table-hover  tablesorter'>
          <input type=hidden name='id_nilai_standart' size=30 value='$show[id_nilai_standart]' >
          <tr><td>STANDART </td><td align='left'>";  

          
          $c_bidang=mysqli_fetch_array(mysqli_query($con,"select *from standart where id_standart='$show[id_standart]' "));

          echo"<input type=text name='tahun' size=30 value='$c_bidang[nama_standart]' readonly > </td></tr><tr>
          <tr><td > <div style='float:left; width:130px;' >TAHUN </div></td>     <td> <input type=text name='tahun' size=30 value='$show[tahun]' readonly >  </td></tr>
          <tr><td > <div style='float:left; width:130px;' >NILAI </div></td>     <td> <input type=text readonly name='nilai' size=30 value='$show[nilai]'>  </td></tr>
          <tr><td > <div style='float:left; width:130px;' >CATATAN </div></td>     <td> <textarea name='catatan' readonly >$show[catatan]</textarea></</td></tr>
          

          </table></form>";
        }else{

        ?>
            <!-- <div class="x_title">
                <h2><b> 
                ROOT DIRECTORY : SCROPE/General Instruction/Manajemen data.. </b></h2>
                <div class="clearfix"></div>
            </div> -->
            <div class="x_title">
                <h2><b>DESCRIPTION</b></h2>
                <form onSubmit='return validasiedit(this)' method=POST enctype='multipart/form-data' >
                    <table id='sample-table' class='table table-hover  tablesorter'>
                        <tr>
                            <td  width=100px;> 
                                <input type="text" name="standart_di" value="<?php echo"$_GET[standart]";?>" hidden >
                                <input type="text" name="daftar_isi" value="<?php echo"$_GET[daftar_isi]";?>" hidden>
                                <div style='float:left; width:90px;' >File Description </div>
                            </td>     
                            <td> 
                                <input class=tabelgaya type=file name='fupload' >  
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2>
                             *) File yang diupload harus dengan format PDF
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                <div id='paddingsaja' ><input type=submit class='btn btn-xs btn-warning' value=Simpan name='simpan_desc'></div>
                            </td>
                        </tr>
                    </table>
                    </form>
                <div class="clearfix"></div>
            </div>
            <?PHP
            $id_standart="$_GET[standart]";
            $id_menu="$_GET[daftar_isi]";
            $cari=mysqli_query($con,"select * from tb_description_di where  id_daftar_isi = '$id_menu' and  id_standart = '$id_standart' ");
            $del=mysqli_fetch_array($cari);
            ?>
            <div class="x_content"> 
                <embed src="Dokument/Deskripsi/<?php echo"$del[files]";?>#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />                                                
            </div>                                    
        </div>                                 
    </div>

    <div class="col-md-9">
        <div class="x_panel">
            <div class="x_title">
                <h2><b>DOKUMENT IPM</b></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    
                    <?php 
                    // form tambah baru
                    $swap_act = isset($_GET['act']) ? $_GET['act'] : '';
                    switch($swap_act){
                    default:
                    ?>
                    <h2><b>Tambah Data</b></h2>
                    <form onSubmit='return validasiedit(this)' method=POST >
                    <input type="text" name="standart_di" value="<?php echo"$_GET[standart]";?>" hidden >
                    <input type="text" name="daftar_isi" value="<?php echo"$_GET[daftar_isi]";?>" hidden>
                    <table id='sample-table' class='table table-hover  tablesorter'>
                        <tr>
                            <td  width=100px;> 
                                <div style='float:left; width:70px;' >Dokument IPM </div>
                            </td>     
                            <td> 
                                <?PHP
                                echo "<select name='ipm_dok' id='ipm_dok'>";
                                $bag=mysqli_query($con,"select *from dokumentipm   order by id_dokumentipm");
                                while($databag=mysqli_fetch_array($bag,MYSQLI_ASSOC)){
                                    echo"<option value=\"$databag[id_dokumentipm]\" >$databag[nomor_dokumentipm]. $databag[nama_dokumentipm]</option>";
                                }
                                echo"</select>";
                                ?>  
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                <div id='paddingsaja' ><input type=submit class='btn btn-xs btn-warning' value=Simpan name='simpanipm'></div>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                    break;
                    case "editipm";
                    ?>
                    <h2><b>Edit Data</b></h2>
                    <form onSubmit='return validasiedit(this)' method=POST >
                    <input type="text" name="id_ipm_di" value="<?php echo"$_GET[id_ipm_di]";?>" hidden >
                    <table id='sample-table' class='table table-hover  tablesorter'>
                        <tr>
                            <td  width=100px;> 
                                <div style='float:left; width:70px;' >Dokument IPM </div>
                            </td>     
                            <td> 
                                <?PHP
                                echo "<select name='ipm_dok' id='ipm_dok'>";
                                $bag=mysqli_query($con,"select *from dokumentipm where 
                                id_dokumentipm <>'$_GET[id_ipm]'  order by id_dokumentipm");
                                 $find1=mysqli_query($con,"SELECT * FROM dokumentipm  where  id_dokumentipm ='$_GET[id_ipm]' ");
                                 $fi1=mysqli_fetch_array($find1,MYSQLI_ASSOC);
                                 echo"<option value=\"$fi1[id_dokumentipm]\" >$fi1[nomor_dokumentipm]. $fi1[nama_dokumentipm]</option>";
                                while($databag=mysqli_fetch_array($bag,MYSQLI_ASSOC)){
                                    

                                    
                                    echo"<option value=\"$databag[id_dokumentipm]\" >$databag[nomor_dokumentipm]. $databag[nama_dokumentipm]</option>";
                                }
                                echo"</select>";
                                ?>  
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                <div id='paddingsaja' ><input type=submit class='btn btn-xs btn-warning' value=Edit name='editipm'></div>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php    
                    break;
                    }
                    ?>
                                    <table class="table table-striped responsive-utilities jambo_table data">
                                        <thead>
                                            <tr>
                                            <th  text-align="center" width="10px">NO</th>
                                            <th  align="center" width="160px">NO IPM</th>
                                            <th  align="center" width="260px">NAMA DOKUMENT</th>
                                            <th  align="center">FILES </th>
                                            <th  align="center" width="60px">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $tampil = mysqli_query($con,"SELECT * FROM tb_ipm_di where id_standart='$_GET[standart]' and id_daftar_isi='$_GET[daftar_isi]'  ");
                                        $no=1;
                                        while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
                                        $tujjjuan=$r['id_ipm'];
                                        $find=mysqli_query($con,"SELECT * FROM dokumentipm  where id_dokumentipm='$tujjjuan' ");
                                        $fi=mysqli_fetch_array($find,MYSQLI_ASSOC);
                                        ?>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo"$fi[nomor_dokumentipm]";?></td>
                                            <td><?php echo"$fi[nama_dokumentipm]";?></td>
                                            <td><?php echo"$fi[files]";?></td>
                                            <td>
                                                <!-- perhatikan pada atribut class dan id, ini atribut yang berisi data yang akan dipanggil ketika tombol di klik -->
                                                <a href="?module=detail_daftarisi&standart=<?php echo"$_GET[standart]";?>&daftar_isi=<?php echo"$_GET[daftar_isi]&id_ipm_di=$r[id_ipm_di]&id_ipm=$r[id_ipm]&act=editipm";?>"; class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
                                                <a <?php echo"onClick=\"return confirm ('Apakah Anda Yakin ingin Menghapus  Data IPM ini ?')\"    href=?module=detail_daftarisi&standart=$_GET[standart]&daftar_isi=$_GET[daftar_isi]&id_ipm_di=$r[id_ipm_di]&act=hapusipm"; ?> class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus </a>
                                                <button type="button" class="view_data_ipm btn btn-primary btn-xs" data-toggle="modal" id="<?php echo"$r[id_ipm]";?>"  data-target="#myModalipm">Detail</button>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>                                 
            </div>                                    
        </div>                                 
    </div>
    <div class="col-md-9">
        <div class="x_panel">
            <div class="x_title">
                <h2><b>DOKUMENT SOP & IK</b></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                    <?php 
                    // form tambah baru
                    if($_GET[act]==""){
                    ?>
                    <h2><b>Tambah Data</b></h2>
                    <form onSubmit='return validasiedit(this)' method=POST >
                    <input type="text" name="standart_di" value="<?php echo"$_GET[standart]";?>" hidden >
                    <input type="text" name="daftar_isi" value="<?php echo"$_GET[daftar_isi]";?>" hidden>
                    <table id='sample-table' class='table table-hover  tablesorter'>
                        <tr>
                            <td  width=100px;> 
                                <div style='float:left; width:70px;' >Dokument IK & SOP </div>
                            </td>     
                            <td> 
                                <?PHP
                                echo "<select name='ik_dok' id='ik_dok'>";
                                $bag=mysqli_query($con,"select *from dokumentik   order by id_dokumentik");
                                while($databag=mysqli_fetch_array($bag,MYSQLI_ASSOC)){
                                    echo"<option value=\"$databag[id_dokumentik]\" >$databag[nomor_dokumentik]. $databag[nama_dokumentik]</option>";
                                }
                                echo"</select>";
                                ?>  
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                <div id='paddingsaja' ><input type=submit class='btn btn-xs btn-warning' value=Simpan name='simpanik'></div>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                    }elseif($_GET[act]=="editik"){
                    ?>
                    <h2><b>Edit Data</b></h2>
                    <form onSubmit='return validasiedit(this)' method=POST >
                    <input type="text" name="id_ik_di" value="<?php echo"$_GET[id_ik_di]";?>" hidden >
                    <table id='sample-table' class='table table-hover  tablesorter'>
                        <tr>
                            <td  width=100px;> 
                                <div style='float:left; width:70px;' >Dokument IK & IPM </div>
                            </td>     
                            <td> 
                                <?PHP
                                echo "<select name='ik_dok' id='ik_dok'>";
                                $bag=mysqli_query($con,"select *from dokumentik where 
                                id_dokumentik <>'$_GET[id_ik]'  order by id_dokumentik");
                                 $find1=mysqli_query($con,"SELECT * FROM dokumentik  where  id_dokumentik ='$_GET[id_ik]' ");
                                 $fi1=mysqli_fetch_array($find1,MYSQLI_ASSOC);
                                 echo"<option value=\"$fi1[id_dokumentik]\" >$fi1[nomor_dokumentik]. $fi1[nama_dokumentik]</option>";

                                while($databag=mysqli_fetch_array($bag,MYSQLI_ASSOC)){
                                    echo"<option value=\"$databag[id_dokumentik]\" >$databag[nomor_dokumentik]. $databag[nama_dokumentik]</option>";
                                }
                                echo"</select>";
                                ?>  
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                <div id='paddingsaja' ><input type=submit class='btn btn-xs btn-warning' value=Edit name='editik'></div>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php    
                    }
                    ?>

                                     <table class="table table-striped responsive-utilities jambo_table data">
                                        <thead>
                                            <tr>
                                            <th  text-align="center" width="10px">NO</th>
                                            <th  align="center" width="160px">NO IK & SOP</th>
                                            <th  align="center" width="260px">NAMA DOKUMENT</th>
                                            <th  align="center">FILES </th>
                                            <th  align="center" width="60px">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $tampil = mysqli_query($con,"SELECT * FROM tb_ik_di  where id_standart='$_GET[standart]' and id_daftar_isi='$_GET[daftar_isi]' ");
                                        $no=1;
                                        while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
                                        $tujjjuan=$r['id_ik'];
                                        $find=mysqli_query($con,"SELECT * FROM dokumentik  where id_dokumentik='$tujjjuan' ");
                                        $fi=mysqli_fetch_array($find,MYSQLI_ASSOC);
                                        ?>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo"$fi[nomor_dokumentik]";?></td>
                                            <td><?php echo"$fi[nama_dokumentik]";?></td>
                                            <td><?php echo"$fi[files]";?></td>
                                            <td>
                                                <!-- perhatikan pada atribut class dan id, ini atribut yang berisi data yang akan dipanggil ketika tombol di klik -->
                                                <a href="?module=detail_daftarisi&standart=<?php echo"$_GET[standart]";?>&daftar_isi=<?php echo"$_GET[daftar_isi]&id_ik_di=$r[id_ik_di]&id_ik=$r[id_ik]&act=editik";?>"; class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
                                                <a <?php echo"onClick=\"return confirm ('Apakah Anda Yakin ingin Menghapus  Data IK ini ?')\"    href=?module=detail_daftarisi&standart=$_GET[standart]&daftar_isi=$_GET[daftar_isi]&id_ik_di=$r[id_ik_di]&act=hapusik"; ?> class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus </a>
                                                <button type="button" class="view_data_sop btn btn-primary btn-xs" data-toggle="modal" id="<?php echo"$r[id_ik]";?>"  data-target="#myModalsop">Detail</button>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>                                 
            </div>                                    
        </div>                                 
    </div>
    <div class="col-md-9">
        <div class="x_panel">
            <div class="x_title">
                <h2><b>EVIDENT</b></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">  
                    <?php 
                    // form tambah baru
                    $swap_act = isset($_GET['act']) ? $_GET['act'] : '';
                    switch($swap_act){
                    default:
                    ?>
                    <h2><b>Tambah Data</b></h2>
                    <form onSubmit='return validasiedit(this)' method=POST >
                    <input type="text" name="standart_di" value="<?php echo"$_GET[standart]";?>" hidden >
                    <input type="text" name="daftar_isi" value="<?php echo"$_GET[daftar_isi]";?>" hidden>
                    <table id='sample-table' class='table table-hover  tablesorter'>
                        <tr>
                            <td  width=100px;> 
                                <div style='float:left; width:70px;' >Dokument evident </div>
                            </td>     
                            <td> 
                                <?PHP
                                echo "<select name='evident_dok' id='evident_dok'>";
                                $bag=mysqli_query($con,"select *from dokumentevident   order by id_dokumentevident");
                                while($databag=mysqli_fetch_array($bag,MYSQLI_ASSOC)){
                                    echo"<option value=\"$databag[id_dokumentevident]\" >$databag[nama_dokumentevident]</option>";
                                }
                                echo"</select>";
                                ?>  
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                <div id='paddingsaja' ><input type=submit class='btn btn-xs btn-warning' value=Simpan name='simpanevident'></div>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                    break;
                    case "editevident";
                    ?>
                    <h2><b>Edit Data</b></h2>
                    <form onSubmit='return validasiedit(this)' method=POST >
                    <input type="text" name="id_evident_di" value="<?php echo"$_GET[id_evident_di]";?>" hidden >
                    <table id='sample-table' class='table table-hover  tablesorter'>
                        <tr>
                            <td  width=100px;> 
                                <div style='float:left; width:70px;' >Dokument evident </div>
                            </td>     
                            <td> 
                                <?PHP
                                echo "<select name='evident_dok' id='evident_dok'>";
                                $bag=mysqli_query($con,"select *from dokumentevident where 
                                id_dokumentevident <>'$_GET[id_evident]'  order by id_dokumentevident");
                                 $find1=mysqli_query($con,"SELECT * FROM dokumentevident  where  id_dokumentevident ='$_GET[id_evident]' ");
                                 $fi1=mysqli_fetch_array($find1,MYSQLI_ASSOC);
                                 echo"<option value=\"$fi1[id_dokumentevident]\" >$fi1[nama_dokumentevident]</option>";
                                while($databag=mysqli_fetch_array($bag,MYSQLI_ASSOC)){
                                    

                                    
                                    echo"<option value=\"$databag[id_dokumentevident]\" >$databag[nama_dokumentevident]</option>";
                                }
                                echo"</select>";
                                ?>  
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                <div id='paddingsaja' ><input type=submit class='btn btn-xs btn-warning' value=Edit name='editevident'></div>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php    
                    break;
                    }
                    ?>
                                 <table class="table table-striped responsive-utilities jambo_table data">
                                        <thead>
                                            <tr>
                                            <th  text-align="center" width="10px">NO</th>
                                            <th  align="center" width="260px">NAMA EVIDENT</th>
                                            <th  align="center">FILES</th>
                                            <th  align="center" width="60px">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $tampil = mysqli_query($con,"SELECT * FROM tb_evident_di  where id_standart='$_GET[standart]' and id_daftar_isi='$_GET[daftar_isi]' ");
                                        $no=1;
                                        while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
                                        $tujjjuan=$r['id_evident'];
                                        $find=mysqli_query($con,"SELECT * FROM dokumentevident  where id_dokumentevident='$tujjjuan' ");
                                        $fi=mysqli_fetch_array($find,MYSQLI_ASSOC);
                                        ?>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo"$fi[nama_dokumentevident]";?></td>
                                            <td><?php echo"$fi[files]";?></td>
                                            <td>
                                                <!-- perhatikan pada atribut class dan id, ini atribut yang berisi data yang akan dipanggil ketika tombol di klik -->
                                                <a href="?module=detail_daftarisi&standart=<?php echo"$_GET[standart]";?>&daftar_isi=<?php echo"$_GET[daftar_isi]&id_evident_di=$r[id_evident_di]&id_evident=$r[id_evident]&act=editevident";?>"; class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </a>
                                                <a <?php echo"onClick=\"return confirm ('Apakah Anda Yakin ingin Menghapus  Data evident ini ?')\"    href=?module=detail_daftarisi&standart=$_GET[standart]&daftar_isi=$_GET[daftar_isi]&id_evident_di=$r[id_evident_di]&act=hapusevident"; ?> class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus </a>
                                                <button type="button" class="view_data_evident btn btn-primary btn-xs" data-toggle="modal" id="<?php echo"$r[id_evident]";?>"  data-target="#myModalevident">Detail</button>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>                               
            </div>                                    
        </div> 
        <?php 
}
    ?>                                
    </div>


</div>

<!-- memulai modal nya. pada id="$myModal" harus sama dengan data-target="#myModal" pada tombol di atas -->
    <div class="modal fade" id="myModalipm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Data IPM</h4>
                </div>
                <!-- memulai untuk konten dinamis -->
                <!-- lihat id="data_siswa", ini yang di pangging pada ajax di bawah -->
                <div class="modal-body" id="data_ipm">
                </div>
                <!-- selesai konten dinamis -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<!-- memulai modal nya. pada id="$myModal" harus sama dengan data-target="#myModal" pada tombol di atas -->
    <div class="modal fade" id="myModalsop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Data SOP & IK</h4>
                </div>
                <!-- memulai untuk konten dinamis -->
                <!-- lihat id="data_siswa", ini yang di pangging pada ajax di bawah -->
                <div class="modal-body" id="data_sop">
                </div>
                <!-- selesai konten dinamis -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<!-- memulai modal nya. pada id="$myModal" harus sama dengan data-target="#myModal" pada tombol di atas -->
    <div class="modal fade" id="myModalevident" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Data Evident</h4>
                </div>
                <!-- memulai untuk konten dinamis -->
                <!-- lihat id="data_siswa", ini yang di pangging pada ajax di bawah -->
                <div class="modal-body" id="data_evident">
                </div>
                <!-- selesai konten dinamis -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    

     <script>
    // ini menyiapkan dokumen agar siap grak :)
    $(document).ready(function(){
        // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
        $('.view_data_ipm').click(function(){
            // membuat variabel id, nilainya dari attribut id pada button
            // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
            var id = $(this).attr("id");
            
            // memulai ajax
            $.ajax({
                url: 'view/view_ipm.php',    // set url -> ini file yang menyimpan query tampil detail data siswa
                method: 'post',     // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
                data: {id:id},      // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
                success:function(data){     // kode dibawah ini jalan kalau sukses
                    $('#data_ipm').html(data);    // mengisi konten dari -> <div class="modal-body" id="data_siswa">
                    $('#myModalipm').modal("show");    // menampilkan dialog modal nya
                }
            });
        });
    });

    // ini menyiapkan dokumen agar siap grak :)
    $(document).ready(function(){
        // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
        $('.view_data_sop').click(function(){
            // membuat variabel id, nilainya dari attribut id pada button
            // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
            var id = $(this).attr("id");
            
            // memulai ajax
            $.ajax({
                url: 'view/view_sop.php',    // set url -> ini file yang menyimpan query tampil detail data siswa
                method: 'post',     // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
                data: {id:id},      // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
                success:function(data){     // kode dibawah ini jalan kalau sukses
                    $('#data_sop').html(data);    // mengisi konten dari -> <div class="modal-body" id="data_siswa">
                    $('#myModalsop').modal("show");    // menampilkan dialog modal nya
                }
            });
        });
    });

    // ini menyiapkan dokumen agar siap grak :)
    $(document).ready(function(){
        // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
        $('.view_data_evident').click(function(){
            // membuat variabel id, nilainya dari attribut id pada button
            // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
            var id = $(this).attr("id");
            
            // memulai ajax
            $.ajax({
                url: 'view/view_evident.php',    // set url -> ini file yang menyimpan query tampil detail data siswa
                method: 'post',     // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
                data: {id:id},      // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
                success:function(data){     // kode dibawah ini jalan kalau sukses
                    $('#data_evident').html(data);    // mengisi konten dari -> <div class="modal-body" id="data_siswa">
                    $('#myModalevident').modal("show");    // menampilkan dialog modal nya
                }
            });
        });
    });
    </script>


    <?php 
    if(isset($_POST["simpan_desc"])){

        $id_standart=$_POST["standart_di"];
        $id_menu=$_POST["daftar_isi"];
        $lokasi_file    = $_FILES['fupload']['tmp_name'];
        $tipe_file      = $_FILES['fupload']['type'];
        $nama_file      = $_FILES['fupload']['name'];
        $acak           = $id_menu;
        $nama_file_unik = $acak.$nama_file; 
        if($nama_file==""){
            ?>
            <script type="application/javascript">
                alert("Anda Belum Memilih Dokument Yang Akan Diupload ! ");
                document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
            </script>
            <?php
        }else{
            UploadFileDeskripsi($nama_file_unik);
            $cari=mysqli_query($con,"select * from tb_description_di where  id_daftar_isi = '$id_menu' and  id_standart = '$id_standart' ");
            $del=mysqli_fetch_array($cari);
            if($del[id_description]==""){
                $simpan=mysqli_query($con,"INSERT INTO tb_description_di(id_description,
                                                                  id_daftar_isi ,
                                                                  id_standart ,
                                                                  files ) 
                                                                  VALUES('',
                                                                  '$id_menu',
                                                                  '$id_standart',
                                                                  '$nama_file_unik')");
                  if($simpan>0){
                  ?>
                  <script type="application/javascript">
                        alert("Data Deskripsi Berhasil Disimpan  ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php
                  }else{

                  ?>
                  <script type="application/javascript">
                        alert("Data Deskripsi Gagal Disimpan ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php  
                  }
            }else{

                UploadFileDeskripsi($nama_file_unik);
                //unlink("Dokument/Deskripsi/$del[files]");
                $update=mysqli_query($con,"Update  tb_description_di 
                                                        set files ='$nama_file_unik'
                                                    Where  
                                                        id_daftar_isi='$id_menu'and  
                                                        id_standart = '$id_standart' ");
                  if($update>0){
                  ?>
                  <script type="application/javascript">
                        alert("Data Deskripsi Berhasil Diedit  ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php
                  }else{

                  ?>
                  <script type="application/javascript">
                        alert("Data Deskripsi Gagal Diedit ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php  
                  }
            }
        }

    }
    if(isset($_POST["simpanipm"])){
         $id_standart=$_POST["standart_di"];
        $id_menu=$_POST["daftar_isi"];
        $cari=mysqli_query($con,"select * from tb_ipm_di where  id_daftar_isi = '$id_menu' and  id_standart = '$id_standart' and id_ipm='$_POST[ipm_dok]' ");
            $del=mysqli_fetch_array($cari);
            if($del[id_ipm_di]==""){
                $simpan=mysqli_query($con,"INSERT INTO tb_ipm_di(id_ipm_di ,
                                                                  id_daftar_isi  ,
                                                                  id_standart ,
                                                                  id_ipm ) 
                                                                  VALUES('',
                                                                  '$id_menu',
                                                                  '$id_standart',
                                                                  '$_POST[ipm_dok]')");
                  if($simpan>0){
                  ?>
                  <script type="application/javascript">
                        alert("Data IPM Berhasil Disimpan  ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php
                  }else{

                  ?>
                  <script type="application/javascript">
                        alert("Data IPM Gagal Disimpan ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php  
                  }
            }else{
                ?>
                  <script type="application/javascript">
                        alert("Data IPM Sudah Ada  ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php
            }
    }
    if(isset($_POST["editipm"])){
        
                $edit=mysqli_query($con,"Update  tb_ipm_di set id_ipm ='$_POST[ipm_dok]'
                                                where id_ipm_di='$_POST[id_ipm_di]' ");
                  if($edit>0){
                  ?>
                  <script type="application/javascript">
                        alert("Data IPM Berhasil Diedit  ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php
                  }else{

                  ?>
                  <script type="application/javascript">
                        alert("Data IPM Gagal Diedit ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php  
                  }
            
    }

    if($_GET[act]=="hapusipm"){
        $edit=mysqli_query($con,"Delete  from tb_ipm_di 
                                                where id_ipm_di='$_GET[id_ipm_di]' ");
                  if($edit>0){
                  ?>
                  <script type="application/javascript">
                        alert("Data IPM Berhasil Dihapus  ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php
                  }else{

                  ?>
                  <script type="application/javascript">
                        alert("Data IPM Gagal Dihapus ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php  
                  }
    }


    if(isset($_POST["simpanik"])){
         $id_standart=$_POST["standart_di"];
        $id_menu=$_POST["daftar_isi"];
        $cari=mysqli_query($con,"select * from tb_ik_di where  id_daftar_isi = '$id_menu' and  id_standart = '$id_standart' and id_ik='$_POST[ik_dok]' ");
            $del=mysqli_fetch_array($cari);
            if($del[id_ik_di]==""){
                $simpan=mysqli_query($con,"INSERT INTO tb_ik_di(id_ik_di ,
                                                                  id_daftar_isi  ,
                                                                  id_standart ,
                                                                  id_ik ) 
                                                                  VALUES('',
                                                                  '$id_menu',
                                                                  '$id_standart',
                                                                  '$_POST[ik_dok]')");
                  if($simpan>0){
                  ?>
                  <script type="application/javascript">
                        alert("Data IK Berhasil Disimpan  ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php
                  }else{

                  ?>
                  <script type="application/javascript">
                        alert("Data IK Gagal Disimpan ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php  
                  }
            }else{
                ?>
                  <script type="application/javascript">
                        alert("Data IK Sudah Ada  ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php
            }
    }
    if(isset($_POST["editik"])){
        
                $edit=mysqli_query($con,"Update  tb_ik_di set id_ik ='$_POST[ik_dok]'
                                                where id_ik_di='$_POST[id_ik_di]' ");
                  if($edit>0){
                  ?>
                  <script type="application/javascript">
                        alert("Data IK Berhasil Diedit  ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php
                  }else{

                  ?>
                  <script type="application/javascript">
                        alert("Data IK Gagal Diedit ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php  
                  }
            
    }

    if($_GET[act]=="hapusik"){
        $edit=mysqli_query($con,"Delete  from tb_ik_di 
                                                where id_ik_di='$_GET[id_ik_di]' ");
                  if($edit>0){
                  ?>
                  <script type="application/javascript">
                        alert("Data IKdd Berhasil Dihapus  ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php
                  }else{

                  ?>
                  <script type="application/javascript">
                        alert("Data IK Gagal Dihapus ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php  
                  }
    }

     if(isset($_POST["simpanevident"])){
         $id_standart=$_POST["standart_di"];
        $id_menu=$_POST["daftar_isi"];
        $cari=mysqli_query($con,"select * from tb_evident_di where  id_daftar_isi = '$id_menu' and  id_standart = '$id_standart' and id_evident='$_POST[evident_dok]' ");
            $del=mysqli_fetch_array($cari);
            if($del[id_evident_di]==""){
                $simpan=mysqli_query($con,"INSERT INTO tb_evident_di(id_evident_di ,
                                                                  id_daftar_isi  ,
                                                                  id_standart ,
                                                                  id_evident ) 
                                                                  VALUES('',
                                                                  '$id_menu',
                                                                  '$id_standart',
                                                                  '$_POST[evident_dok]')");
                  if($simpan>0){
                  ?>
                  <script type="application/javascript">
                        alert("Data evident Berhasil Disimpan  ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php
                  }else{

                  ?>
                  <script type="application/javascript">
                        alert("Data evident Gagal Disimpan ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php  
                  }
            }else{
                ?>
                  <script type="application/javascript">
                        alert("Data evident Sudah Ada  ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php
            }
    }
    if(isset($_POST["editevident"])){
        
                $edit=mysqli_query($con,"Update  tb_evident_di set id_evident ='$_POST[evident_dok]'
                                                where id_evident_di='$_POST[id_evident_di]' ");
                  if($edit>0){
                  ?>
                  <script type="application/javascript">
                        alert("Data evident Berhasil Diedit  ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php
                  }else{

                  ?>
                  <script type="application/javascript">
                        alert("Data evident Gagal Diedit ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php  
                  }
            
    }

    if($_GET[act]=="hapusevident"){
        $edit=mysqli_query($con,"Delete  from tb_evident_di 
                                                where id_evident_di='$_GET[id_evident_di]' ");
                  if($edit>0){
                  ?>
                  <script type="application/javascript">
                        alert("Data evidentdd Berhasil Dihapus  ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php
                  }else{

                  ?>
                  <script type="application/javascript">
                        alert("Data evident Gagal Dihapus ! ");
                        document.location='?module=detail_daftarisi&standart=<?php echo"$id_standart";?>&daftar_isi=<?php echo"$id_menu";?>';
                  </script>
                  <?php  
                  }
    }
    ?>