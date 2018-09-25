 <!-- start project list -->
 <table class="table table-striped responsive-utilities jambo_table data">
  <thead>
    <tr>
      <th>NO</th>
      <th>KKS</th>
      <th>NAMA SYSTEM</th>
      <th>DESKRIPSI</th>
      <th>UNIT</th>
      <th>ACTION</th>
    </tr>
  </thead>
  <tbody>

    <?php

    $tampil = mysqlI_query($con,"SELECT * FROM equipment_maximo  ORDER BY   unit asc   ");
    $no=1;
    while ($r=mysqli_fetch_array($tampil,MYSQLI_ASSOC)){

      $cek_da=mysqli_num_rows(mysqlI_query($con,"select *from sinkronisasi_data where kks='$r[kks]'"));
      if($cek_da>0){}else{

     echo "<tr><td>$no</td>
     <td>$r[kks]</td>
     <td>$r[nama_system]</td>
     <td>$r[deskripsi]</td>
     <td>$r[unit]</td>";
     ?>
     <td class="td-actions">
      <a href="?module=edit_sinkronisasi_data&act=editsinkronisasi&id=<?php echo"$r[kks]";?>"; class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
      
    </td>
    <?php
    echo"</tr>";
    $no++;
  }
  }
  ?>  
</tbody>
</table>
<!-- end project list -->



