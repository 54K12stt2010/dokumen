<?php


$bulan=$_GET[bulan];
$tahun=$_GET[tahun];
if($bulan=="01"){
  $nama_bulan="JANUARI";
}elseif($bulan=="02"){
  $nama_bulan="FEBRUARI";
}elseif($bulan=="03"){
  $nama_bulan="MARET";
}elseif($bulan=="04"){
  $nama_bulan="APRIL";
}elseif($bulan=="05"){
  $nama_bulan="MEI";
}elseif($bulan=="06"){
  $nama_bulan="JUNI";
}elseif($bulan=="07"){
  $nama_bulan="JULI";
}elseif($bulan=="08"){
  $nama_bulan="AGUSTUS";
}elseif($bulan=="09"){
  $nama_bulan="SEPTEMBER";
}elseif($bulan=="10"){
  $nama_bulan="OKTOBER";
}elseif($bulan=="11"){
  $nama_bulan="NOVEMBER";
}elseif($bulan=="12"){
  $nama_bulan="DESEMBER";
}
?>
 <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>DATA REAP PADA  <?php echo" $nama_bulan $tahun";?> </h2> 
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <p></p>

 <form method="post" action='cetak/excel_reap.php'>
 
 <input type=hidden name='tahun' size=30 value='<?php echo"$tahun";?>' >
          <input type=hidden name='bulan' size=30 value='<?php echo"$bulan";?>' >
          <input type=hidden name='kks' size=30 value='<?php echo"$_GET[kks_data]";?>' >
          <input type=button class='btn btn-small btn-danger'  value=Batal onclick=self.history.back()>
          <input type=submit class='btn btn-small btn-primary' value=' Export Excel ' name='editdata'>
<div style="border: 1px solid rgb(204, 204, 204); padding: 5px; overflow: auto; width: 100%; height:500px; background-color: rgb(255, 255, 255);">
 

    <table id="example" class="table  jambo_table data" >
    <thead>
      <tr>
        <th>NO</th>
        <th>ASSET</th>
        <th>NAMA SYSTEM</th>
        <th>DESKRIPSI</th>
        <th>SF</th>
        <th>RC</th>
        <th>DEMAGE</th>
        <th>RECOVERY TIME</th>
        <th>DERATING (MW)</th>
        <th>LOSS EAF</th>
        <th>LOP</th>
        <th>MTBF</th>
        <th>F(T)</th>
        <th>RISK</th>
        <th>ACTION PLAN</th>
        <th>BIAYA</th>
        <th>RESIDUAL LOSS</th>
        <th>RESIDUAL F(T)</th>
        <th>RESIDUAL RISK</th>
        <th>BENEFIT</th>
        <th>B/C Ratio</th>
        <th>AKSI</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $p      = new Paging_reap;
      $batas  = 100;
      $posisi = $p->cariPosisi($batas);
      $tampil = mysqlI_query($con,"SELECT * FROM sinkronisasi_data where kks like '%$_GET[kks_data]%'  ");
      $no=1;
      while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){
        $show_m=mysqli_fetch_array(mysqli_query($con,"select *from equipment_maximo where kks='$r[kks]'"));
        $sep=mysqli_fetch_array(mysqli_query($con,"select *from serp where kks='$show_m[kks]' and tahun='$tahun'"));

       
        
       // Cek Data Maximo

      if($show_m[UNIT]=="#1"){
          $awal_data="2013-07-10";
      }elseif($show_m[UNIT]=="#2"){
          $awal_data="2013-07-10";
      }elseif($show_m[UNIT]=="#3"){
          $awal_data="2013-07-10";
      }
         $sampai_data="$tahun-$bulan-31";

       $hasil_n_sh=mysqli_num_rows(mysqli_query($con,"
                    SELECT 
                      kode_rcc,count(kode_rcc) as banyak ,
                      month(`tgl_awal`) as bulan, 
                      year(tgl_awal) as tahun,
                      avg(`selisih_jam`) as jam,
                      avg(`selisih_menit`) as menit ,
                      avg(`derating`) as derating
                    FROM `log_navitas`
                  where 
                    tgl_awal>='$awal_data' and tgl_awal<='$sampai_data'  and kode_rcc = '$r[cause_code]' 
                    group by
                     `kode_rcc`"));

        if($hasil_n_sh>0){

          // menampilkan data navitas 
        $hasil_n=mysqli_fetch_array(mysqli_query($con,"
                    SELECT 
                      kode_rcc,count(kode_rcc) as banyak ,
                      month(`tgl_awal`) as bulan, 
                      year(tgl_awal) as tahun,
                      avg(`selisih_jam`) as jam,
                      avg(`selisih_menit`) as menit ,
                      avg(`derating`) as derating
                    FROM `log_navitas`
                  where 
                    tgl_awal>='$awal_data' and tgl_awal<='$sampai_data' and kode_rcc = '$r[cause_code]' 
                    group by
                     `kode_rcc`"));
        
         $derating_show=number_format($hasil_n[derating],2); 
         $derating_show_demage="$hasil_n[derating]";        
        $jam_data_tampil=$hasil_n[jam]+($hasil_n[menit]/60);
         $jam_data=number_format($jam_data_tampil,2);

         if($derating_show_demage<330){
          $demage="DERATING";
         }elseif($derating_show_demage=330){
          $demage="OUTAGE";
         }

         $Loss_eaf_data_sh=($jam_data_tampil*$hasil_n[derating])/(8760*323) *100;
         $Loss_eaf_data=number_format($Loss_eaf_data_sh,2);
         $Loss_eaf="$Loss_eaf_data %";
         // nilai HPP
         $hasil_loop=mysqli_fetch_array(mysqli_query($con,"
                    SELECT *
                    FROM `setting_hpp`
                  where 
                    bulan='$bulan' and tahun='$tahun' "));

         $lop_data=$jam_data_tampil*$hasil_n[derating]*$hasil_loop[nominal];
         $loop_sh_show=number_format($lop_data,2);
         $loop_sh="Rp. $loop_sh_show";

        }else{
          $derating_show="-";
          $jam_data="-";
          $Loss_eaf="-";
          $loop_sh="-";
          $demage="-";    
        }

        

         // tarik data Maximo - Menampilkan data Maximo
         $hasil_max=mysqli_fetch_array(mysqli_query($con,"
                  SELECT 
                    `kks`,
                    avg(`selisih_jam`) as selisih_jam,
                    avg(`selisih_menit`) as selisih_menit,
                    `report_date`,`report_time` 
                  FROM `log_maximo` 
                  where 
                      (`selisih_jam`<>'0' or `selisih_menit`<>'0' ) and
                       report_date>='$awal_data' and report_date<='$sampai_data'  and
                      kks='$r[kks]'
                    group by `kks`"));

         $mtbf_dt=$hasil_max[selisih_jam]+($hasil_max[selisih_menit]);
         

         if($mtbf_dt<1){
          $mtbf="0";
           $ft_sh="0";
           $risk_maximo="0";
         }else{
          $mtbf=number_format($mtbf_dt,2);
         $laju_dt=1/$mtbf;
         $laju=number_format($laju_dt,2);
         $kali_jam=24*30;
         $ft_data=($laju_dt*pow(2.78,(-$laju_dt)) * $kali_jam)/100 ;
         $ft_sh_show=number_format($ft_data,2);
         $ft_sh="$ft_sh_show %";
         $data2=$ft_data/100;
         $risk_maximo_sh=$lop_data * $data2 ;
         $risk_maximo=number_format($risk_maximo_sh,2);

       }

       // manampilkan data action plan
       $cek_act=mysqlI_fetch_array(mysqli_query($con,"select *from action_plan where kks='$r[kks]' and bulan='$bulan' and tahun='$tahun'"));
                $ratio=$ft_data*$cek_act[residual_risk];
                $ratio_data=number_format($ratio,2);


        echo "<tr><td>$no</td>
        <td>$show_m[kks]</td>
        <td>$show_m[nama_system]</td>
        <td>$show_m[deskripsi]</td>
        <td>$sep[sf]</td>
        <td>$sep[rc]</td>
        <td>$demage</td>
        <td>$jam_data</td>
        <td>$derating_show</td>
        <td >$Loss_eaf</td>
        <td>$loop_sh</td>
        <td>$mtbf</td>
        <td>$ft_sh</td>
        <td>$risk_maximo</td>
        <td>$cek_act[action_plan]</td>
        <td>$cek_act[biaya]</td>
        <td>$cek_act[residual_loss]</td>
        <td>$cek_act[residual_ft]</td>
        <td>$cek_act[residual_risk]</td>
        <td>$cek_act[benefit]</td>
        <td>$ratio_data</td>";

        ?>
        <td class="td-actions">
          <a href="?module=action_plan&act=edit_actionplan&bulan=<?php echo"$bulan";?>&tahun=<?php echo"$tahun";?>&kks=<?php echo"$r[kks]";?>"; class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
        </td>
        <?php
        echo"</tr>";
        $no++;
      }
      ?>  
    </tbody>
  </table>
 <?php
            
    ?>
  </div>

    