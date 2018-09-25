<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2012 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @category PHPExcel
 * @package PHPExcel
 * @copyright Copyright (c) 2006 - 2012 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt LGPL
 * @version 1.7.7, 2012-05-19
 */

/** Error reporting */
error_reporting(E_ALL);


$con=mysqli_connect("localhost","root","ujta9119","db_reap");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$dari = "$_POST[tgl_awal]";
$sampai = "$_POST[tgl_akhir]"; 

$thndari=substr($dari,6,4);
$tanggaldari=substr($dari,3,2);
$bulandari=substr($dari,0,2);
$tangal_dari="$thndari-$bulandari-$tanggaldari";

$thnsampai=substr($sampai,6,4);
$tanggalsampai=substr($sampai,3,2);
$bulansampai=substr($sampai,0,2);
$tangal_sampai="$thnsampai-$bulansampai-$tanggalsampai";


// $cek_jum=mysqli_fetch_array(mysqli_query($con,"SELECT count(*) as data_all FROM `log_navitas` WHERE tgl_awal>='$tangal_dari' and tgl_awal<='$tangal_sampai'"));date_default_timezone_set('Europe/London');
 
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
 ->setCellValue('B8', "NO TIKET")
 ->setCellValue('C8', "KKS")
 ->setCellValue('D8', "DESKRIPSI")
 ->setCellValue('E8', "STATUS")
 ->setCellValue('F8', "PELAPOR")
 ->setCellValue('G8', "FAULT PRIORITY")
 ->setCellValue('H8', "FAULT TYPE")
 ->setCellValue('I8', "REPORT DATE")
 ->setCellValue('J8', "REPORT TIME")
 ->setCellValue('K8', "SELISIH JAM")
 ->setCellValue('L8', "SELISIH MENIT")
 ->setCellValue('M8', "STATUS DATE")
 ->setCellValue('N8', "TARGET FINISH")
 ->setCellValue('O8', "ACTUAL FINISH")
 ->setCellValue('P8', "TARGET FINISH");
 
 
$SQL = mysqli_query($con,"SELECT * FROM `log_maximo` WHERE report_date>='$tangal_dari' and report_date<='$tangal_sampai' ");
 
$totJML = mysqli_num_rows($SQL);
 
$dataArray= array();
$dataaa_no=0;
while($r = mysqli_fetch_array($SQL, MYSQLI_ASSOC)){
  $dataaa_no++;


 $no_tiket="$r[no_tiket]";
 $kks="$r[kks]";
 $deskripsi="$r[deskripsi]";
 $status="$r[status]";
 $pelapor="$r[pelapor]";
 $fault_priority="$r[fault_priority]";
 $fault_type="$r[fault_type]";
 $report_date="$r[report_date]";
 $report_time="$r[report_time]";
 $selisih_jam="$r[selisih_jam]";
 $selisih_menit="$r[selisih_menit]";
 $status_date="$r[status_date]";
 $target_finish="$r[target_finish]";
 $act_finish="$r[act_finish]";
 $target_start="$r[target_start]";

 $row_array['no'] = $dataaa_no;
 $row_array['no_tiket'] = $no_tiket;
 $row_array['kks'] = $kks;
 $row_array['deskripsi'] = $deskripsi;
 $row_array['status'] = $status;
 $row_array['pelapor'] = $pelapor;
 $row_array['fault_priority'] = $fault_priority;
 $row_array['fault_type'] = $fault_type;
 $row_array['report_date'] = $report_date;
 $row_array['report_time'] = $report_time;
 $row_array['selisih_jam'] = $selisih_jam;
 $row_array['selisih_menit'] = $selisih_menit;
 $row_array['status_date'] = $status_date;
 $row_array['target_finish'] = $target_finish;
 $row_array['act_finish'] = $act_finish;
 $row_array['target_start'] = $target_start;
 array_push($dataArray,$row_array);
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
$objPHPExcel->getActiveSheet()->getStyle('A8:P8')->getFont()->setBold(true);
// Set fills
$objPHPExcel->getActiveSheet()->getStyle('A8:P8')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('A8:P8')->getFill()->getStartColor()->setARGB('FF808080');
 
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4.43);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(14);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(80);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
 
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
 
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A8:P$nox");
 
// Set style for header row using alternative method
$objPHPExcel->getActiveSheet()->getStyle('A8:P8')->applyFromArray(
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
 
$objPHPExcel->getActiveSheet()->getStyle('A8:P1000')->getFont()->setName('Times New Roman');
$objPHPExcel->getActiveSheet()->getStyle('A8:P1000')->getFont()->setSize(12);
 
// Merge cells
$objPHPExcel->getActiveSheet()->mergeCells('C2:P2');
$objPHPExcel->getActiveSheet()->setCellValue('C2', "LAPORAN DATA LOG MAXIMO [$dari -$sampai] ");
$objPHPExcel->getActiveSheet()->mergeCells('C3:P3');
$objPHPExcel->getActiveSheet()->setCellValue('C3', "PT PJB UBJOM TANJUNG AWAR - AWAR");
$objPHPExcel->getActiveSheet()->mergeCells('C4:P4');
$objPHPExcel->getActiveSheet()->setCellValue('C4', "Jln.Tanjung Awar-Awar, Desa Wadung, Kec.Jenu, Kab.Tuban");
$objPHPExcel->getActiveSheet()->mergeCells('C5:P5');
$objPHPExcel->getActiveSheet()->setCellValue('C5', "Jawa Timur, Telp.0356320320- Fax. 0356329090");




$objPHPExcel->getActiveSheet()->getStyle('C2:P5')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('C2:P2')->getFont()->setSize(16);
$objPHPExcel->getActiveSheet()->getStyle('C3')->getFont()->setSize(14);
$objPHPExcel->getActiveSheet()->getStyle('C4')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('C5')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('C2:P5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A2:P5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A8:P8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
// Redirect output to a client's web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Laporan Data Tarikan Database Maximo"'.date("d-F-Y").'".xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
 
// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));