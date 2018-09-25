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
                <h2><b>BAB IMS : <?php echo"$find_s[title]";?></b></h2>
                
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
                <h2><b><?php echo"$h_cari[nama_standart]";?></b></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                
                <table class="table table-striped responsive-utilities jambo_table data">
                                        <thead>
                                            <tr>
                                            <th  text-align="center" width="10px">NO</th>
                                            <th  align="center" width="560px">BAB STANDART</th>
                                            <th  align="center" width="60px">AKSI </th>
                                            </tr>
                                        </thead>
                                        <tbopdy>
                                        <?php
                                        $menu = mysqli_query($con,"SELECT * FROM tb_matrik_ims where 
                                        id_standart='$r[id_standart]' and id_menu='$_GET[id_menu]'");
                                        $noa=1;
                                        while ($rs=mysqli_fetch_array($menu,MYSQLI_ASSOC)){
                                        $cari_menu=mysqli_query($con,"select * from daftar_isi where  
                                            id_menu = '$rs[id_daftar_isi_ims]'");
                                        $del_f=mysqli_fetch_array($cari_menu);
                                        ?>
                                        <tr>
                                            <td><?php echo"$noa";?></td>
                                            <td><?php echo"$del_f[title]";?></td>
                                            <td>
                                                
                                                
                                                <a href="?module=mappingdetail&standart=<?php echo"$r[id_standart]";?>&daftar_isi=<?php echo"$rs[id_daftar_isi_ims]";?>"; class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Detail </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $noa++;
                                        }
                                        ?>
                                        </tbody>
                                    </table> 
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