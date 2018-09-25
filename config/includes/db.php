<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$foo_host2 = "192.168.40.7";
$foo_database2 = "ubjomptn";
$foo_user2 = "admin";
$foo_pasword2 = "admin@root9";
$config2 = pg_connect("host=$foo_host2 dbname=$foo_database2 user=$foo_user2 password=$foo_pasword2")
or die("Gagal pada koneksi database server"); 

$host_gallery="http://ubjptn.ptpjb.com";
$link="http://ubjptn.ptpjb.com";
#mysql_select_db($database_config, $config);





$tgl_sekarang=date("d");

$hari_sekarang=date("D");
$hari_sekarang=date("D");
if($hari_sekarang=="Sun"){$hari_sekarang2="Minggu";}
if($hari_sekarang=="Mon"){$hari_sekarang2="Sennin";}
if($hari_sekarang=="Tue"){$hari_sekarang2="Selasa";}
if($hari_sekarang=="Wed"){$hari_sekarang2="Rabu";}
if($hari_sekarang=="Thu"){$hari_sekarang2="Kamis";}
if($hari_sekarang=="Fri"){$hari_sekarang2="Juma'at";}
if($hari_sekarang=="Sat"){$hari_sekarang2="Sabtu";}


$bln_sekarang=date("m");
if ($bln_sekarang==1)
{
$bln_sekarang=12;
$thn_sekarang=date("Y");
$thn_sekarang=$thn_sekarang-1;
//$hh_sekarang=date("H");
//$hh_sekarang=$hh_sekarang-1;
}
else
{
//$hh_sekarang=date("H");
$thn_sekarang=date("Y");
$bln_sekarang=$bln_sekarang-1;
}

$bln_sekarang2;
if($bln_sekarang=="01"){$bln_sekarang2="Januari";}
if($bln_sekarang=="02"){$bln_sekarang2="Februari";}
if($bln_sekarang=="03"){$bln_sekarang2="Maret";}
if($bln_sekarang=="04"){$bln_sekarang2="April";}
if($bln_sekarang=="05"){$bln_sekarang2="Mei";}
if($bln_sekarang=="06"){$bln_sekarang2="Juni";}
if($bln_sekarang=="07"){$bln_sekarang2="Juli";}
if($bln_sekarang=="08"){$bln_sekarang2="Agustus";}
if($bln_sekarang=="09"){$bln_sekarang2="September";}
if($bln_sekarang=="10"){$bln_sekarang2="Oktober";}
if($bln_sekarang=="11"){$bln_sekarang2="November";}
if($bln_sekarang=="12"){$bln_sekarang2="Desember";}
//$thn_sekarang=date("Y");

$mm_sekarang=date("i");



















$qrm_audit="select a.kode,a.urut,a.jenis,b.ket as jenis_ket,a.noref,a.originator,a.prioritas,a.uraian,a.tanggapan,a.tl,a.extensi,to_char(a.terbit,'dd-MON-yyyy') as terbit,to_char(a.target,'dd-MON-yyyy') as target,a.pic,c.jabatan as pic_ket,a.ket,a.monitor||' %' as monitor,a.close||' %' as close from dokumen.qrm_audit a inner join dokumen.qrm_jenis b on a.jenis=b.kode inner join sdm.tjabatan c on a.pic=c.jkode ";

$kinerja_hasil="
select 'target' as tr,a.tahun,a.kode,b.ket,b.ket2,a.bobot,b.urut
,(select case when nilai is null then 0 else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=1 and tr=0) as x1
,(select case when nilai is null then 0 else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=2 and tr=0) as x2
,(select case when nilai is null then 0 else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=3 and tr=0) as x3
,(select case when nilai is null then 0 else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=4 and tr=0) as x4
,(select case when nilai is null then 0 else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=5 and tr=0) as x5
,(select case when nilai is null then 0 else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=6 and tr=0) as x6
,(select case when nilai is null then 0 else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=7 and tr=0) as x7
,(select case when nilai is null then 0 else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=8 and tr=0) as x8
,(select case when nilai is null then 0 else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=9 and tr=0) as x9
,(select case when nilai is null then 0 else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=10 and tr=0) as x10
,(select case when nilai is null then 0 else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=11 and tr=0) as x11
,(select case when nilai is null then 0 else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=12 and tr=0) as x12
 ,0 as pencapaian,0 as nilai from dokumen.vkonkin_bobot a inner join dokumen.vkonkin b on a.kode=b.kode
union all
select 'realisasi' as tr,a.tahun,a.kode,b.ket,b.ket2,a.bobot,b.urut
,(select case when nilai is null then case when $bln_sekarang < 1 then null else 0 end else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=1 and tr=1) as x1
,(select case when nilai is null then case when $bln_sekarang < 2 then null else 0 end else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=2 and tr=1) as x2
,(select case when nilai is null then case when $bln_sekarang < 3 then null else 0 end else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=3 and tr=1) as x3
,(select case when nilai is null then case when $bln_sekarang < 4 then null else 0 end else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=4 and tr=1) as x4
,(select case when nilai is null then case when $bln_sekarang < 5 then null else 0 end else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=5 and tr=1) as x5
,(select case when nilai is null then case when $bln_sekarang < 6 then null else 0 end else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=6 and tr=1) as x6
,(select case when nilai is null then case when $bln_sekarang < 7 then null else 0 end else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=7 and tr=1) as x7
,(select case when nilai is null then case when $bln_sekarang < 8 then null else 0 end else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=8 and tr=1) as x8
,(select case when nilai is null then case when $bln_sekarang < 9 then null else 0 end else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=9 and tr=1) as x9
,(select case when nilai is null then case when $bln_sekarang < 10 then null else 0 end else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=10 and tr=1) as x10
,(select case when nilai is null then case when $bln_sekarang < 11 then null else 0 end else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=11 and tr=1) as x11
,(select case when nilai is null then case when $bln_sekarang < 12 then null else 0 end else nilai end from dokumen.vkonkin_kinerjahasil where tahun=a.tahun and konkin=a.kode and bulan=12 and tr=1) as x12
,a.pencapaian,a.nilai
 from dokumen.vkonkin_bobot a inner join dokumen.vkonkin b on a.kode=b.kode where a.mk=-1

";

$konkin="select x.tahun,x.konkin,case when x.mk=0 then z.ket||' (ML)' else z.ket||' (KPI)' end as ket,v.bobot,max(x.target) as target,max(x.realisasi) as realisasi,
(case when max(x.realisasi) is null then 0 else max(x.realisasi) end / case when max(x.target) is null then 0 else max(x.target) end )*100 as pencapaian,
x.mk from(
select a.tahun,a.konkin,nilai as target,0 as realisasi,a.mk from dokumen.vkonkin_mk a 
where tr=0
union all
select a.tahun,a.konkin,0 as target,nilai as realisasi,a.mk from dokumen.vkonkin_mk a 
where tr=1
) as x inner join dokumen.vkonkin z on x.konkin=z.kode  inner join dokumen.vkonkin_bobot v on x.konkin=v.kode group by z.ket,x.tahun,x.konkin,x.mk,v.bobot order by x.konkin,x.mk";





$kinerja_hasil2="
select kode,ket2,bobot,pencapaian,case when pencapaian >= 100 then to_number(bobot,'999d99') else (to_number(bobot,'999d99'))*(pencapaian/100) end as nilai from(
select kode,ket2,to_char(bobot,'99D99') as bobot,
(
select (sum(realisasi)/sum(target) )*100
from(
select nilai as target,0 as realisasi from dokumen.vkonkin_kinerjahasil where konkin=ok1.kode and bulan=8 and tr=0 
union all
select 0 as target,nilai as realisasi from dokumen.vkonkin_kinerjahasil where konkin=ok1.kode and bulan=8 and tr=1
)as a1
)
pencapaian 

from (
select 'target' as tr,a.tahun,a.kode,b.ket,b.ket2,a.bobot,b.urut, 0 as pencapaian,0 as nilai from dokumen.vkonkin_bobot a inner join dokumen.vkonkin b on a.kode=b.kode
union all
select 'realisasi' as tr,a.tahun,a.kode,b.ket,b.ket2,a.bobot,b.urut,a.pencapaian,a.nilai
 from dokumen.vkonkin_bobot a inner join dokumen.vkonkin b on a.kode=b.kode where a.mk=-1

) as ok1 where tr='realisasi' )
as ok3";


?>