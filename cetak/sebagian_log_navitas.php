<?php
date_default_timezone_set('Europe/London');
 
/** Include PHPExcel */
require_once 'Classes/PHPExcel.php';
 
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();



// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
 ->setLastModifiedBy("LAPORAN DATA REAP ")
 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
 ->setKeywords("office 2007 openxml php")
 ->setCategory("Test result file");
 
// Create the worksheet
$objPHPExcel->setActiveSheetIndex(0);


$objPHPExcel->getActiveSheet()
 ->setCellValue('A8', "NO")
 ->setCellValue('B8', "ASSET")
 ->setCellValue('C8', "NAMA SYSTEM")
 ->setCellValue('D8', "DESKRIPSI")
 ->setCellValue('E8', "SF")
 ->setCellValue('F8', "RC")
 ->setCellValue('G8', "DEMAGE")
 ->setCellValue('H8', "RECOVERY TIME")
 ->setCellValue('I8', "DERATING (MW)")
 ->setCellValue('J8', "LOSS EAF")
 ->setCellValue('K8', "LOP")
 ->setCellValue('L8', "MTBF")
 ->setCellValue('M8', "F(T)")
 ->setCellValue('N8', "RISK")
 ->setCellValue('O8', "ACTION PLAN")
 ->setCellValue('P8', "BIAYA")
 ->setCellValue('Q8', "RESIDUAL LOSS")
 ->setCellValue('R8', "RESIDUAL F(T)")
 ->setCellValue('S8', "RESIDUAL RISK")
 ->setCellValue('T8', "BENEFIT")
 ->setCellValue('U8', "B/C RATIO");
 
 
$SQL = mysqli_query($con,"SELECT *from  sinkronisasi_data where kks like '%$kks%'  ");
 
$totJML = mysqli_num_rows($SQL);
 
$dataArray= array();
$dataaa_no=0;
while($r = mysqli_fetch_array($SQL, MYSQLI_ASSOC)){
  $dataaa_no++;

$r_kk="$r[kks]";
$show_m=mysqli_fetch_array(mysqli_query($con,"select *from equipment_maximo where kks='$r_kk'"));
        $dt_kks="$show_m[kks]";
        $sep=mysqli_fetch_array(mysqli_query($con,"select *from serp where kks='$dt_kks' and tahun='$tahun'"));

        
        
       // Cek Data Maximo

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
                    month(`tgl_awal`)='$bulan' and year(tgl_awal)='$tahun' and kode_rcc = '$r[cause_code]' 
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
                    month(`tgl_awal`)='$bulan' and year(tgl_awal)='$tahun' and kode_rcc = '$r[cause_code]' 
                    group by
                     `kode_rcc`"));
        
        $jjam="$hasil_n[jam]";
        $mmenit_shh="$hasil_n[menit]";
        $mmenit=$mmenit_shh/60;
        $jam_data_tampil=$jjam+$mmenit;
         $jjam_data=$jjam+$mmenit;
         $jam_data=number_format($jjam_data,2);

         $dderating="$hasil_n[derating]";
         if($dderating=330){
          $demage="OUTAGE";
         }elseif($dderating<330){
          $demage="DERATING";
         }

         $Loss_eaf_data_sh=($jam_data_tampil*$dderating)/(8760*323) *100;
         $Loss_eaf_data=number_format($Loss_eaf_data_sh,2);
         $Loss_eaf="$Loss_eaf_data %";
         $derating_show=$dderating;
         // nilai HPP
         $hasil_loop=mysqli_fetch_array(mysqli_query($con,"
                    SELECT *
                    FROM `setting_hpp`
                  where 
                    bulan='$bulan' and tahun='$tahun' "));

         $nnominal="$hasil_loop[nominal]";
         $lop_data=$jam_data_tampil*$dderating*$nnominal;
         $loop_sh_show=number_format($lop_data,2);
         $loop_sh="Rp. $loop_sh_show";

        }else{
          $derating_show="0";
          $jam_data="0";
          $Loss_eaf="0";
          $loop_sh="0";
          $demage="0";
          $lop_data="0";    
        }

        
        $hasil_max_find=mysqli_num_rows(mysqli_query($con,"
                  SELECT 
                    `kks`,
                    avg(`selisih_jam`) as selisih_jam,
                    avg(`selisih_menit`) as selisih_menit,
                    `report_date`,`report_time` 
                  FROM `log_maximo` 
                  where 
                      (`selisih_jam`<>'0' or `selisih_menit`<>'0' ) and 
                      month( `report_date` ) = '$bulan'and
                      year( report_date ) = '$tahun' and 
                      kks='$r[kks]'
                    group by `kks`"));

         if($hasil_max_find>0){
         
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
                      month( `report_date` ) = '$bulan'and
                      year( report_date ) = '$tahun' and 
                      kks='$r[kks]'
                    group by `kks`"));
         $maxjam="$hasil_max[selisih_jam]";
         $maxmenit="$hasil_max[selisih_menit]/60";
         $mtbf_dt=$maxjam+$maxmenit;
         
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

         }else{

          $mtbf="0";
           $ft_sh="0";
           $risk_maximo="0";
           $ft_data="0";
       }

       // manampilkan data action plan
       $cek_act=mysqlI_fetch_array(mysqli_query($con,"select *from action_plan where kks='$r[kks]' and bulan='$bulan' and tahun='$tahun'"));



$no_kks="$show_m[kks]";
$nama_system="$show_m[nama_system]";
$deskripsi="$show_m[deskripsi]";
$sf="$sep[sf]";
$rc="$sep[rc]";
$act_plan="$cek_act[action_plan]";
$biaya="$cek_act[biaya]";
$residual_loss="$cek_act[residual_loss]";
$residual_ft="$cek_act[residual_ft]";
$residual_risk="$cek_act[residual_risk]";
$cresidual_risk="$cek_act[residual_risk]";
$ratio=$ft_data*$cresidual_risk;
$ratio_data=number_format($ratio,2);
$benefit="$cek_act[benefit]";

 $row_array['no'] = $dataaa_no;
  $row_array['kks'] = $no_kks;
  $row_array['nama_system'] = $nama_system;
  $row_array['deskripsi'] = $deskripsi;
  $row_array['sf'] = $sf;
  $row_array['rc'] = $rc;
  $row_array['demage'] = $demage;
  $row_array['jam_data'] = $jam_data;
  $row_array['derating_show'] = $derating_show;
  $row_array['loss_eaf'] = $Loss_eaf;
  $row_array['loop_sh'] = $loop_sh;
  $row_array['mtbf'] = $mtbf;
  $row_array['ft_sh'] = $ft_sh;
  $row_array['risk_maximo'] = $risk_maximo;
  $row_array['act_plan'] = $act_plan;
  $row_array['biaya'] = $biaya;
  $row_array['residual_loss'] = $residual_loss;
  $row_array['residual_ft'] = $residual_ft;
  $row_array['residual_risk'] = $residual_risk;
  $row_array['benefit'] = $benefit;
  $row_array['ratio_data'] = $ratio_data;
 array_push($dataArray,$row_array);
$dataaa_no++;
}
$nox=$dataaa_no+8;
$objPHPExcel->getActiveSheet()->fromArray($dataArray, NULL, 'A9');
 
// Set page orientation and size
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LEGAL);
$objPHPExcel->getActiveSheet()->getPageMargins()->setTop(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0.75);
$objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(0.75);
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
 
// Set title row bold;
$objPHPExcel->getActiveSheet()->getStyle('A8:U8')->getFont()->setBold(true);
// Set fills
$objPHPExcel->getActiveSheet()->getStyle('A8:U8')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('A8:U8')->getFill()->getStartColor()->setARGB('FF808080');
 
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4.43);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(18);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(100);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(100);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(11);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(14);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(14);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(60);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(17);
 
// Set autofilter
 // Always include the complete filter range!
 // Excel does support setting only the caption
 // row, but that's not a best practise...
$objPHPExcel->getActiveSheet()->setAutoFilter($objPHPExcel->getActiveSheet()->calculateWorksheetDimension());
 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
 
$sharedStyle1 = new PHPExcel_Style();
$sharedStyle2 = new PHPExcel_Style();
 
$sharedStyle1->applyFromArray(
 array('borders' => array(
 'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
 'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
 'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
 'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
 ),
 ));
 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A8:U$nox");
 
// Set style for header row using alternative method
$objPHPExcel->getActiveSheet()->getStyle('A8:u8')->applyFromArray(
 array(
 'font' => array(
 'bold' => true
 ),
 'alignment' => array(
 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
 ),
 'borders' => array(
 'top' => array(
 'style' => PHPExcel_Style_Border::BORDER_THIN
 )
 ),
 'fill' => array(
 'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
 'rotation' => 90,
 'startcolor' => array(
 'argb' => 'FFA0A0A0'
 ),
 'endcolor' => array(
 'argb' => 'FFFFFFFF'
 )
 )
 )
);
 
// Add a drawing to the worksheet
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Logo');
$objDrawing->setDescription('Logo');
$objDrawing->setPath('pjb.png');
$objDrawing->setCoordinates('B2');
$objDrawing->setHeight(120);
$objDrawing->setWidth(120);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
 
$objPHPExcel->getActiveSheet()->getStyle('A25:P1000')->getFont()->setName('Times New Roman');
$objPHPExcel->getActiveSheet()->getStyle('A25:P1000')->getFont()->setSize(12);
 
// Merge cells
$objPHPExcel->getActiveSheet()->mergeCells('C2:U2');
$objPHPExcel->getActiveSheet()->setCellValue('C2', "LAPORAN DATA REAP BULAN $tampilkan ");
$objPHPExcel->getActiveSheet()->mergeCells('C3:U3');
$objPHPExcel->getActiveSheet()->setCellValue('C3', "PT PJB UBJOM TANJUNG AWAR - AWAR");
$objPHPExcel->getActiveSheet()->mergeCells('C4:U4');
$objPHPExcel->getActiveSheet()->setCellValue('C4', "Jln.Tanjung Awar-Awar, Desa Wadung, Kec.Jenu, Kab.Tuban");
$objPHPExcel->getActiveSheet()->mergeCells('C5:U5');
$objPHPExcel->getActiveSheet()->setCellValue('C5', "Jawa Timur, Telp.0356320320- Fax. 0356329090");




$objPHPExcel->getActiveSheet()->getStyle('C2:U5')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('C2:U2')->getFont()->setSize(16);
$objPHPExcel->getActiveSheet()->getStyle('C3')->getFont()->setSize(14);
$objPHPExcel->getActiveSheet()->getStyle('C4')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('C5')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('C2:U5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A2:U5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A8:U8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
// Redirect output to a client's web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Laporan Data Reap UJTA"'.date("d-F-Y").'".xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
 
// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));