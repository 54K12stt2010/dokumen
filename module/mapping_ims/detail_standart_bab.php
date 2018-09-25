<?php 
$id_standart1="$_GET[standart]";
$cari1=mysqli_query($con,"select * from standart where  id_standart = '$id_standart1'");
$h_cari=mysqli_fetch_array($cari1);
?>

<div class="row">

    <div class="col-md-3">
        <div class="x_panel">
            <div class="x_title">
                <h2><b>DAFTAR ISI IMS </b></h2>

                            
                                <!-- perhatikan pada atribut class dan id, ini atribut yang berisi data yang akan dipanggil ketika tombol di klik -->
                                
                            
                <div class="clearfix"></div>
            </div>
            <div class="x_content"> 

            <div class="thum-cover2">
                <?PHP 
                    include('daftar-isi_matrik_user.php');
                ?>
     
            
            
            </div>
            </div>                                    
        </div>                                 
    </div>
    <div class="col-md-9">
        <div class="x_panel">
    <div class="">
    <?php
    $cari_s=mysqli_query($con,"select * from daftar_isi where  id_menu = '$_GET[id_menu]'");
    $find_s=mysqli_fetch_array($cari_s);
    ?>
                <h2><b>DETAIL BAB</b></h2>
                
    </div>
    </div>
    </div>
    <?php
     $tampil = mysqlI_query($con,"SELECT * FROM standart    ");
     $no=1;
     while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
    $cari1=mysqli_query($con,"select * from standart where  id_standart = '$r[id_standart]'");
    $h_cari=mysqli_fetch_array($cari1);
        ?>
    <div class="col-md-9">
        <div class="x_panel">
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
    </div>
   
<?php
 $no++;
}
?>
</div>

<!-- memulai modal nya. pada id="$myModal" harus sama dengan data-target="#myModal" pada tombol di atas -->
    <div class="modal fade" id="myModalmatrik" tabindex="-1" role="dialog" aria-labelledby="myModalmatrik">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Detail Informasi BAB </h4>
                </div>
                <!-- memulai untuk konten dinamis -->
                <!-- lihat id="data_siswa", ini yang di pangging pada ajax di bawah -->
                <div class="modal-body" id="data_matrik">
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
        $('.view_data_matrik').click(function(){
            // membuat variabel id, nilainya dari attribut id pada button
            // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
            var id = $(this).attr("id");
            
            // memulai ajax
            $.ajax({
                url: 'view/view_matrik.php',    // set url -> ini file yang menyimpan query tampil detail data siswa
                method: 'post',     // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
                data: {id:id},      // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
                success:function(data){     // kode dibawah ini jalan kalau sukses
                    $('#data_matrik').html(data);    // mengisi konten dari -> <div class="modal-body" id="data_siswa">
                    $('#myModalmatrik').modal("show");    // menampilkan dialog modal nya
                }
            });
        });
    });

    </script>


    </div>

    <?php
     if(isset($_POST["simpandata"])){
         $id_menu="$_POST[menu_isi]";
         $id_daftar_isi_ims="$_POST[id_daftar_isi_ims]";
         $id_standart="$_POST[id_standart]";
         
         mysqli_query($con,"INSERT INTO tb_matrik_ims(id_matrik_ims,
                                 id_daftar_isi_ims,id_standart,id_menu) 
                           VALUES('',
                                '$id_daftar_isi_ims','$id_standart','$id_menu')");

          ?>
  <script type="application/javascript">
  
  alert("Matrik IMS Berhasil Ditambah  ! ");
  document.location='?module=master&menu=m_matrik_ims&standart=4&id_menu=<?php echo"$id_menu";?>';
  </script>
  <?php
     }

     if($_GET[act]=="hapus"){
         $id_menu="$_GET[menu_isi]";
        mysqli_query($con,"Delete  from tb_matrik_ims 
                                                where id_matrik_ims='$_GET[id]' ");
         ?>
  <script type="application/javascript">
  
  alert("Matrik IMS Berhasil Dihapus  ! ");
  document.location='?module=master&menu=m_matrik_ims&standart=4&id_menu=<?php echo"$id_menu";?>';
  </script>
  <?php
     }
    ?>

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


