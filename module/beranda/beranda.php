
<div class="row">





 <?php
 $tampil = mysqlI_query($con,"SELECT * FROM standart   where nama_standart<>'-' ");
 $no=1;
 while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
    $cari1=mysqli_query($con,"select * from standart where  id_standart = '$r[id_standart]'");
$h_cari=mysqli_fetch_array($cari1);
    ?> 

    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo"$h_cari[nama_standart]";?></h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">

            <div id="echart_guage<?php echo"$no";?>" style="height:280px;"></div>

            </div>
        </div>
    </div>

    <?php
    $no++;
}

?>





</div>


