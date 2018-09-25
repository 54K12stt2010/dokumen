<?php


  if($_GET['module']=="beranda"){
    include('module/beranda/beranda.php');
  }elseif($_GET['module']=="mapping"){
        include('module/mapping_ims/ims.php');
  }elseif($_GET['module']=="mappingdetail"){
        include('module/mapping_ims/detail_standart_bab.php');
  }elseif($_GET['module']=="dokumen"){
        include('module/dokumen_all/dokumen.php');
  }elseif($_GET['module']=="master_data"){
        include('module/mapping_ims/view_ftp.php');
  }elseif($_GET['module']=="detail_dokument"){
        include('module/dokumen_all/detail_dok.php');
  }elseif($_GET['module']=="detail_standart_ims"){
        include('module/mapping_ims/detail_standart.php');
  }elseif($_GET['module']=="standart"){
    include('module/dokumen_all/dokumen.php');
  }elseif($_GET['module']=="master"){
    include('module/m_admin/admin.php');
  }elseif($_GET['module']=="files"){
    include('module/m_dokumen/m_dokumen_user.php');
  }elseif($_GET['module']=="detail_daftarisi"){
    include('module/m_admin/m_daftarisi_detail.php');
  }
  // }


  // elseif($_GET['module']=="operator"){
  //       include('module/operator/operator.php');
  // }elseif($_GET['module']=="bidang"){
  //       include('module/bidang/bidang.php');
  // }elseif($_GET['module']=="bagian"){
  //       include('module/bagian/bagian.php');
  // }elseif($_GET['module']=="jabatan"){
  //       include('module/jabatan/jabatan.php');
  // }elseif($_GET['module']=="equipment_maximo"){
  //       include('module/equip_maximo/equipment_maximo.php');
  // }elseif($_GET['module']=="equipment_navitas"){
  //       include('module/equip_navitas/equipment_navitas.php');
  // }elseif($_GET['module']=="reap"){
  //       include('module/reap/reap.php');
  // }elseif($_GET['module']=="serp"){
  //       include('module/serp/serp.php');
  // }elseif($_GET['module']=="sinkronisasi_data"){
  //       include('module/sinkronisasi_data/sinkronisasi_data.php');
  // }elseif($_GET['module']=="tarik_maximo"){
  //       include('module/tarik_maximo/tarik_maximo.php');
  // }elseif($_GET['module']=="tarik_navitas"){
  //       include('module/tarik_navitas/tarik_navitas.php');
  // }elseif($_GET['module']=="lap_reap"){
  //       include('module/lap_reap/lap_reap.php');
  // }elseif($_GET['module']=="edit_sinkronisasi_data"){
  //       include('module/sinkronisasi_data/edit_belum_sinkron.php');
  // }elseif($_GET['module']=="edit_sudah_sinkronisasi"){
  //       include('module/sinkronisasi_data/edit_sudah_sinkron.php');
  // }elseif($_GET['module']=="dataserp"){
  //       include('module/serp/edit_serp.php');
  // }elseif($_GET['module']=="tampil_reap"){
  //       include('module/reap/view_reap.php');
  // }elseif($_GET['module']=="tarik_maximo_bulan"){
  //       include('module/tarik_maximo/tarik_maximo.php');
  // }elseif($_GET['module']=="import_maximo"){
  //       include('module/tarik/maximo_manual.php');
  // }elseif($_GET['module']=="tarik_navitas_bulan"){
  //       include('module/tarik_navitas/tarik_navitas.php');
  // }elseif($_GET['module']=="import_navitas"){
  //       include('module/tarik/navitas_manual.php');
  // }elseif($_GET['module']=="status"){
  //       include('module/status/status.php');
  // }elseif($_GET['module']=="action_plan"){
  //       include('module/action_plan/action.php');
  // }elseif($_GET['module']=="setting_hpp"){
  //       include('module/setting/hpp.php');
  // }elseif($_GET['module']=="sethpp"){
  //       include('module/setting/edit_hpp.php');
  // }elseif($_GET['module']=="lap_navitas"){
  //       include('module/laporan/lap_navitas.php');
  // }elseif($_GET['module']=="lap_maximo"){
  //       include('module/laporan/lap_maximo.php');
  // }elseif($_GET['module']=="lap_equip_max"){
  //       include('module/laporan/lap_equip_maximo.php');
  // }elseif($_GET['module']=="lap_equip_nav"){
  //       include('module/laporan/lap_equip_navitas.php');
  // }elseif($_GET['module']=="ganti_password"){
  //       include('module/setting/gantipw.php');
  // }elseif($_GET['module']=="serp_view"){
  //       include('module/serp/serp_view.php');
  // }
