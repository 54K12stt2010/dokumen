<?php
function UploadProfil($fupload_name){
  //direktori gambar
  $vdir_upload = "profil/";
if (($_FILES['fupload']['type']=="image/jpeg") || ($_FILES['fupload']['type']=="image/jpg")){
 $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 220;
  $dst_height = 220;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagejpeg($im,$vdir_upload . "sedang_" . $fupload_name);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}  
if (($_FILES['fupload']['type']=="image/gif")){
 $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromgif($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 300;
  $dst_height = 300;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagegif($im,$vdir_upload . "sedang_" . $fupload_name);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}  
if (($_FILES['fupload']['type']=="image/png")){
 $vfile_upload = $vdir_upload . $fupload_name;
  
  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefrompng($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 300;
  $dst_height = 300;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagepng($im,$vdir_upload . "sedang_" . $fupload_name);
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}  
}

function UploadFile($fupload_name){
  //direktori file
  $vdir_upload = "dokument/ipm/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}


function UploadFileik($fupload_name){
  //direktori file
  $vdir_upload = "dokument/ik/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}


function UploadFileevident($fupload_name){
  //direktori file
  $vdir_upload = "dokument/evident/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadFileDeskripsi($fupload_name){
  //direktori file
  $vdir_upload = "dokument/deskripsi/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function UploadFilenilai($fupload_name){
  //direktori file
  $vdir_upload = "dokument/nilai/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}



// function UploadBerita($fupload_name){
//   //direktori gambar
//   $vdir_upload = "../../../foto_berita/";
// if (($_FILES['fupload']['type']=="image/jpeg") || ($_FILES['fupload']['type']=="image/jpg")){
//  $vfile_upload = $vdir_upload . $fupload_name;

//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefromjpeg($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   $dst_width4 = 520;
//   $dst_height4 = 346;
//   $im4 = imagecreatetruecolor($dst_width4,$dst_height4);
//   imagecopyresampled($im4, $im_src, 0, 0, 0, 0, $dst_width4, $dst_height4, $src_width, $src_height);

//   //Simpan gambar
//   imagejpeg($im4,$vdir_upload . "big_" . $fupload_name);
//   $dst_width3 = 250;
//   $dst_height3 = 190;
//   $im3 = imagecreatetruecolor($dst_width3,$dst_height3);
//   imagecopyresampled($im3, $im_src, 0, 0, 0, 0, $dst_width3, $dst_height3, $src_width, $src_height);

//   //Simpan gambar
//   imagejpeg($im3,$vdir_upload . "besar_" . $fupload_name);
 
//    $dst_width2 = 100;
//   $dst_height2 = 75;
//   $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
//   imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

//   //Simpan gambar
//   imagejpeg($im2,$vdir_upload . "sedang_" . $fupload_name);

//  $dst_width = 75;
//   $dst_height = 50;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);

//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
//   imagedestroy($im2);
//   imagedestroy($im3);
//   imagedestroy($im4);
// }  
// if (($_FILES['fupload']['type']=="image/gif")){
//  $vfile_upload = $vdir_upload . $fupload_name;

//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefromgif($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   //Simpan dalam versi small 110 pixel
//   //Set ukuran gambar hasil perubahan
//   //Set ukuran gambar hasil perubahan
//   $dst_width4 = 520;
//   $dst_height4 = 346;
//   $im4 = imagecreatetruecolor($dst_width4,$dst_height4);
//   imagecopyresampled($im4, $im_src, 0, 0, 0, 0, $dst_width4, $dst_height4, $src_width, $src_height);

//   //Simpan gambar
//   imagegif($im4,$vdir_upload . "big_" . $fupload_name);
//   $dst_width = 75;
//   $dst_height = 50;
//   $dst_width2 = 100;
//   $dst_height2 = 75;
//   $dst_width3 = 250;
//   $dst_height3 = 190;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagegif($im,$vdir_upload . "kecil_" . $fupload_name);
  
//   $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
//   imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

//   //Simpan gambar
//   imagegif($im2,$vdir_upload . "sedang_" . $fupload_name);
//   $im3 = imagecreatetruecolor($dst_width3,$dst_height3);
//   imagecopyresampled($im3, $im_src, 0, 0, 0, 0, $dst_width3, $dst_height3, $src_width, $src_height);

//   //Simpan gambar
//   imagegif($im3,$vdir_upload . "besar_" . $fupload_name);

//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
//   imagedestroy($im2);
//   imagedestroy($im3);
//   imagedestroy($im4);
// }  
// if (($_FILES['fupload']['type']=="image/png")){
//  $vfile_upload = $vdir_upload . $fupload_name;
  
//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefrompng($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   //Simpan dalam versi small 110 pixel
//   //Set ukuran gambar hasil perubahan
//   //Set ukuran gambar hasil perubahan
//   $dst_width4 = 520;
//   $dst_height4 = 346;
//   $im4 = imagecreatetruecolor($dst_width4,$dst_height4);
//   imagecopyresampled($im4, $im_src, 0, 0, 0, 0, $dst_width4, $dst_height4, $src_width, $src_height);

//   //Simpan gambar
//   imagepng($im4,$vdir_upload . "big_" . $fupload_name);
//   $dst_width = 75;
//   $dst_height = 50;
//   $dst_width2 = 100;
//   $dst_height2 = 75;
//   $dst_width3 = 250;
//   $dst_height3 = 190;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagepng($im,$vdir_upload . "kecil_" . $fupload_name);
  
//   $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
//   imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

//   //Simpan gambar
//   imagepng($im2,$vdir_upload . "sedang_" . $fupload_name);
//   $im3 = imagecreatetruecolor($dst_width3,$dst_height3);
//   imagecopyresampled($im3, $im_src, 0, 0, 0, 0, $dst_width3, $dst_height3, $src_width, $src_height);

//   //Simpan gambar
//   imagepng($im3,$vdir_upload . "besar_" . $fupload_name);

//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
//   imagedestroy($im2);
//   imagedestroy($im3);
//   imagedestroy($im4);
// }  
// }
// function UploadFile($fupload_name){
//   //direktori file
//   $vdir_upload = "../../../files/";
//   $vfile_upload = $vdir_upload . $fupload_name;

//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
// }
// function UploadGallery($fupload_name){
//   //direktori gambar
//   $vdir_upload = "../../../img_galeri/";
// if (($_FILES['fupload']['type']=="image/jpeg") || ($_FILES['fupload']['type']=="image/jpg")){
//  $vfile_upload = $vdir_upload . $fupload_name;

//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefromjpeg($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   //Simpan dalam versi small 110 pixel
//   //Set ukuran gambar hasil perubahan
//   $dst_width = 200;
//   $dst_height = 150;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
  
//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
// }  
// if (($_FILES['fupload']['type']=="image/gif")){
//  $vfile_upload = $vdir_upload . $fupload_name;

//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefromgif($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   //Simpan dalam versi small 110 pixel
//   //Set ukuran gambar hasil perubahan
//   $dst_width = 200;
//   $dst_height = 150;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagegif($im,$vdir_upload . "kecil_" . $fupload_name);
  
//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
// }  
// if (($_FILES['fupload']['type']=="image/png")){
//  $vfile_upload = $vdir_upload . $fupload_name;
  
//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefrompng($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   //Simpan dalam versi small 110 pixel
//   //Set ukuran gambar hasil perubahan
//   $dst_width = 200;
//   $dst_height = 150;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagepng($im,$vdir_upload . "kecil_" . $fupload_name);
  
//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
// }  
// }
// function UploadStruktur($fupload_name){
//   //direktori gambar
//   $vdir_upload = "../../../fotoprofil/";
// if (($_FILES['fupload']['type']=="image/jpeg") || ($_FILES['fupload']['type']=="image/jpg")){
//  $vfile_upload = $vdir_upload . $fupload_name;

//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefromjpeg($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   //Simpan dalam versi small 110 pixel
//   //Set ukuran gambar hasil perubahan
//   $dst_width = 460;
//   $dst_height = 300;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagejpeg($im,$vdir_upload . "sedang_" . $fupload_name);
  
//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
// }  
// if (($_FILES['fupload']['type']=="image/gif")){
//  $vfile_upload = $vdir_upload . $fupload_name;

//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefromgif($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   //Simpan dalam versi small 110 pixel
//   //Set ukuran gambar hasil perubahan
//   $dst_width = 460;
//   $dst_height = 300;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagegif($im,$vdir_upload . "sedang_" . $fupload_name);
  
//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
// }  
// if (($_FILES['fupload']['type']=="image/png")){
//  $vfile_upload = $vdir_upload . $fupload_name;
  
//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefrompng($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   //Simpan dalam versi small 110 pixel
//   //Set ukuran gambar hasil perubahan
//   $dst_width = 460;
//   $dst_height = 300;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagepng($im,$vdir_upload . "sedang_" . $fupload_name);
  
//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
// }  
// }
// function UploadPejabat($fupload_name){
//   //direktori gambar
//   $vdir_upload = "../../../fotopejabat/";
// if (($_FILES['fupload']['type']=="image/jpeg") || ($_FILES['fupload']['type']=="image/jpg")){
//  $vfile_upload = $vdir_upload . $fupload_name;

//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefromjpeg($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   $dst_width3 = 100;
//   $dst_height3 = 120;
//   $im3 = imagecreatetruecolor($dst_width3,$dst_height3);
//   imagecopyresampled($im3, $im_src, 0, 0, 0, 0, $dst_width3, $dst_height3, $src_width, $src_height);

//   //Simpan gambar
//   imagejpeg($im3,$vdir_upload . "sedang_" . $fupload_name);
 

//  $dst_width = 70;
//   $dst_height = 60;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);

//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
//   imagedestroy($im3);
// }  
// if (($_FILES['fupload']['type']=="image/gif")){
//  $vfile_upload = $vdir_upload . $fupload_name;

//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefromgif($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   //Simpan dalam versi small 110 pixel
//   //Set ukuran gambar hasil perubahan
//   //Set ukuran gambar hasil perubahan
//   $dst_width3 = 100;
//   $dst_height3 = 120;
//   $im3 = imagecreatetruecolor($dst_width3,$dst_height3);
//   imagecopyresampled($im3, $im_src, 0, 0, 0, 0, $dst_width3, $dst_height3, $src_width, $src_height);

//   //Simpan gambar
//   imagejpeg($im3,$vdir_upload . "sedang_" . $fupload_name);
 

//  $dst_width = 70;
//   $dst_height = 60;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagegif($im,$vdir_upload . "kecil_" . $fupload_name);

//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
//   imagedestroy($im3);
// }  
// if (($_FILES['fupload']['type']=="image/png")){
//  $vfile_upload = $vdir_upload . $fupload_name;
  
//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefrompng($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   //Simpan dalam versi small 110 pixel
//   //Set ukuran gambar hasil perubahan
//   //Set ukuran gambar hasil perubahan
//   $dst_width3 = 100;
//   $dst_height3 = 120;
//   $im3 = imagecreatetruecolor($dst_width3,$dst_height3);
//   imagecopyresampled($im3, $im_src, 0, 0, 0, 0, $dst_width3, $dst_height3, $src_width, $src_height);

//   //Simpan gambar
//   imagejpeg($im3,$vdir_upload . "sedang_" . $fupload_name);
 

//  $dst_width = 70;
//   $dst_height = 60;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagepng($im,$vdir_upload . "kecil_" . $fupload_name);

//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
//   imagedestroy($im3);
// }  
// }
// function UploadBiodata($fupload_name){
//   //direktori gambar
//   $vdir_upload = "../../../fotoprofil/";
// if (($_FILES['fupload']['type']=="image/jpeg") || ($_FILES['fupload']['type']=="image/jpg")){
//  $vfile_upload = $vdir_upload . $fupload_name;

//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefromjpeg($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   $dst_width = 95;
//   $dst_height = 112;
//   $dst_width2 = 140;
//   $dst_height2 = 160;
//   $dst_width3 = 200;
//   $dst_height3 = 220;
//   $im3 = imagecreatetruecolor($dst_width3,$dst_height3);
//   imagecopyresampled($im3, $im_src, 0, 0, 0, 0, $dst_width3, $dst_height3, $src_width, $src_height);

//   //Simpan gambar
//   imagejpeg($im3,$vdir_upload . "besar_" . $fupload_name);
 
//   $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
//   imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

//   //Simpan gambar
//   imagejpeg($im2,$vdir_upload . "sedang_" . $fupload_name);


//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);

//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
//   imagedestroy($im2);
//   imagedestroy($im3);
// }  
// if (($_FILES['fupload']['type']=="image/gif")){
//  $vfile_upload = $vdir_upload . $fupload_name;

//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefromgif($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   //Simpan dalam versi small 110 pixel
//   //Set ukuran gambar hasil perubahan
//   //Set ukuran gambar hasil perubahan
//   $dst_width = 95;
//   $dst_height = 112;
//   $dst_width2 = 140;
//   $dst_height2 = 160;
//   $dst_width3 = 200;
//   $dst_height3 = 220;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagegif($im,$vdir_upload . "kecil_" . $fupload_name);
  
//   $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
//   imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

//   //Simpan gambar
//   imagegif($im2,$vdir_upload . "sedang_" . $fupload_name);
//   $im3 = imagecreatetruecolor($dst_width3,$dst_height3);
//   imagecopyresampled($im3, $im_src, 0, 0, 0, 0, $dst_width3, $dst_height3, $src_width, $src_height);

//   //Simpan gambar
//   imagegif($im3,$vdir_upload . "besar_" . $fupload_name);

//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
//   imagedestroy($im2);
//   imagedestroy($im3);
// }  
// if (($_FILES['fupload']['type']=="image/png")){
//  $vfile_upload = $vdir_upload . $fupload_name;
  
//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefrompng($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   //Simpan dalam versi small 110 pixel
//   //Set ukuran gambar hasil perubahan
//   //Set ukuran gambar hasil perubahan
//   $dst_width = 95;
//   $dst_height = 112;
//   $dst_width2 = 140;
//   $dst_height2 = 160;
//   $dst_width3 = 200;
//   $dst_height3 = 220;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagepng($im,$vdir_upload . "kecil_" . $fupload_name);
  
//   $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
//   imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

//   //Simpan gambar
//   imagepng($im2,$vdir_upload . "sedang_" . $fupload_name);
//   $im3 = imagecreatetruecolor($dst_width3,$dst_height3);
//   imagecopyresampled($im3, $im_src, 0, 0, 0, 0, $dst_width3, $dst_height3, $src_width, $src_height);

//   //Simpan gambar
//   imagepng($im3,$vdir_upload . "besar_" . $fupload_name);

//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
//   imagedestroy($im2);
//   imagedestroy($im3);
// }  
// }
// function UploadSambutan($fupload_name){
//   //direktori gambar
//   $vdir_upload = "../../../fotoprofil/";
// if (($_FILES['fupload']['type']=="image/jpeg") || ($_FILES['fupload']['type']=="image/jpg")){
//  $vfile_upload = $vdir_upload . $fupload_name;

//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefromjpeg($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   //Simpan dalam versi small 110 pixel
//   //Set ukuran gambar hasil perubahan
//   $dst_width = 190;
//   $dst_height = 235;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagejpeg($im,$vdir_upload . "sedang_" . $fupload_name);
  
//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
// }  
// if (($_FILES['fupload']['type']=="image/gif")){
//  $vfile_upload = $vdir_upload . $fupload_name;

//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefromgif($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   //Simpan dalam versi small 110 pixel
//   //Set ukuran gambar hasil perubahan
//   $dst_width = 190;
//   $dst_height = 235;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagegif($im,$vdir_upload . "sedang_" . $fupload_name);
  
//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
// }  
// if (($_FILES['fupload']['type']=="image/png")){
//  $vfile_upload = $vdir_upload . $fupload_name;
  
//   //Simpan gambar dalam ukuran sebenarnya
//   move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

//   //identitas file asli
//   $im_src = imagecreatefrompng($vfile_upload);
//   $src_width = imageSX($im_src);
//   $src_height = imageSY($im_src);

//   //Simpan dalam versi small 110 pixel
//   //Set ukuran gambar hasil perubahan
//   $dst_width = 190;
//   $dst_height = 235;

//   //proses perubahan ukuran
//   $im = imagecreatetruecolor($dst_width,$dst_height);
//   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//   //Simpan gambar
//   imagepng($im,$vdir_upload . "sedang_" . $fupload_name);
  
//   //Hapus gambar di memori komputer
//   imagedestroy($im_src);
//   imagedestroy($im);
// }  
// }

?>
