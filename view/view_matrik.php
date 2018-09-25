 

<?php
 include('../config/koneksi.php');
 $tujjjuan=$_POST['id'];
 $find=mysqli_query($con,"SELECT * FROM dokumentipm  where id_dokumentipm='$tujjjuan' ");
 $fi=mysqli_fetch_array($find,MYSQLI_ASSOC);

?>

<embed src="dokument/ipm/<?php echo"IPM-244DOK IK1.pdf ";?>#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="400px" /> 

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
            <div class="x_title">
                <h2><b>DESCRIPTION</b></h2>
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
    </div>
      <?php 
}
    ?>     
</div>

