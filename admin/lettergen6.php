<?php
require('force_justify.php');

//db connection
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'tour1');

//get invoices data
$query = mysqli_query($con,"select * from candidate
	where
	id = '".$_GET['id']."' and positionof = 'Guru Besar (Lantikan Baharu)'");
	$query1 = mysqli_query($con,"select * from datepbsm");
$candidate = mysqli_fetch_array($query);
$candidate1 = mysqli_fetch_array($query1);

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');
$name=$candidate['name'];
$ppd=$candidate['ppd'];
$gred=$candidate['gred'];
$position=$candidate['position'];
$positionof=$candidate['positionof'];
$workplace=$candidate['workplace'];
$others=$candidate['others'];
$othersnewpost=$candidate['othersnewpost'];
$newplace=$candidate['newplace'];
$actgred=$candidate['actgred'];
$postcode=$candidate['postcode'];
$startdate=$candidate['startdate'];
$date=$candidate1['date'];
$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','',11);

//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(130	,5,'',0,1);
$pdf->Cell(130	,5,'',0,1);
$pdf->Cell(130	,1,'',0,1);
$pdf->Cell(130	,5,'',0,1);
$pdf->Cell(130	,2,'',0,1);
$pdf->Cell(100	,5,'',0,1);
$pdf->Cell(100	,5,'',0,1);
$pdf->Cell(100	,1,'',0,1);
$pdf->Cell(100	,1,'',0,1);
$pdf->Cell(100	,2,'',0,1);
$pdf->Cell(130	,5,'',0,1);
$pdf->Cell(130	,5,'',0,1);
$pdf->Cell(100	,4,'',0,0);
$pdf->Cell(23	,4,'Ruj.Kami : ',0,1);

$pdf->Cell(100	,4,'',0,0);
$pdf->Cell(19	,4,'Tarikh      :',0,0);
$pdf->Cell(60	,4,$candidate['letterdate1'],0,1);

$pdf->SetFont('Arial','B',11);

$pdf->Cell(15	,3,'',0,0);
//$pdf->Cell(23,5,'Tuan/Puan :',0,0);

$pdf->Cell(31,5,$candidate['name'],0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(15,5,'No.KP :  ',0,0);

$pdf->Cell(59,5,$candidate['icno'],0,1);

$pdf->SetFont('Arial','',11);
$pdf->Cell(110	,2.5,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(30,5,'Melalui dan salinan:  ',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(110	,3,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,5,'Guru Besar  ',0,1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,4,$candidate['workplace'],0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,4,"$postcode.",0,1);

//set font to arial, regular, 11pt
$pdf->SetFont('Arial','',11);
$pdf->Cell(110	,3.5,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,5,'Tuan,  ',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,4,'ARAHAN PENEMPATAN /PERTUKARAN',0,1);

$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,4,'PEGAWAI PERKHIDMATAN PENDIDKAN(PPP)',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,4,'NEGERI SEMBILAN DARUL KHUSUS',0,1);




$pdf->SetFont('Arial','',11);
$pdf->Cell(110	,3,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,4,'Adalah dimaklumkan bahawa:  ',0,1);

$pdf->Cell(110	,3,'',0,1);
$pdf->Cell(29	,3,'',0,0);
$pdf->MultiCell(149,4.5,"$name, Pegawai Perkhidmatan Pendidikan (PPP) Gred $gred, $position$others, $workplace, Negeri Sembilan, ditempatkan sebagai $positionof$othersnewpost, $newplace, Negeri Sembilan. Pegawai Perkhidmatan Pendidikan (PPP), Gred $gred. Gred hakiki jawatan adalah Gred $actgred. ",0,'J');

//$pdf->MultiCell(130,5,', Pegawai Perkhidmatan Pendidikan (PPP) Gred Perkhidmatan  Pendidikan  Gred  DG48  ',1,'J');
//$pdf->Cell(130,5,'Perkhidmatan  Pendidikan  Gred  DG48  ke  Gred  DG52  Khas  Untuk  Penyandang  (KUP)  secara  ',0,1);
//$pdf->Cell(130,5,'Time- Based  Berasaskan  Kecemerlangan di  Kementerian  Pendidikan  Malaysia  dengan  rujukan  ',0,1);
//$pdf->Cell(11	,5,'surat  ',0,0);
//$pdf->Cell(59,5,$candidate['ref2'],0,0);
//$pdf->Cell(22	,5,'   bertarikh  ',0,0);
//$pdf->Cell(59,5,$candidate['letterdate2'],0,1);

$pdf->Cell(110	,2.5,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->MultiCell(164,4.5,"2.      Tarikh  berkuatkuasa penempatan ini ialah mulai $date$startdate. Tuan perlu melalui tempoh percubaan selama enam (6) bulan untuk terus dikekalkan di jawatan tersebut. Sekiranya tuan gagal menunjukkan prestasi dan pencapaian yang baik, tuan akan diberikan penempatan semula ke mana-mana jawatan yang sesuai dengan gred penyandang.    ",0,'J');


$pdf->SetFont('Arial','B',11);
//$pdf->Cell(56,5,"$startdate.",0,1);
$pdf->Cell(110	,2.5,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(1,5,'3.',0,0);
$pdf->SetFont('Arial','B',11);
$pdf->MultiCell(163,4.5,'             Kegagalan tuan mematuhi arahan  penempatan/pertukaran  ini boleh menyebab',0,'J');
$pdf->Cell(15	,3,'',0,0);
$pdf->MultiCell(164,4.5,'tuan dikenakan tindakan tatatertib berdasarkan kepada Peraturan 4(2)(i), Peraturan-Peraturan Pegawai Awam (Kelakuan dan Tatatertib) PU (A) 395/1993 yang menyatakan, "Seseorang pegawai tidak boleh ingkar perintah atau berkelakuan dengan apa-apa cara boleh ditafsirkan sebagai ingkar perintah".',0,'J');



$pdf->SetFont('Arial','',11);
$pdf->Cell(110	,2.5,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->MultiCell(164,4.5,'4.       Ketua  Jabatan  dikehendaki  menyediakan  Penyata  Perubahan  (KEW. 8), mengemukakan Sijil Gaji Akhir, Buku Perkhidmatan Kerajaan kepada Ketua Jabatan yang baharu serta meminta pegawai berkenaan menyediakan Nota Serah Tugas. Ketua Jabatan yang berkenaan juga hendaklah mengemaskini data pegawai di dalam Sistem HRMIS, eOperasi dan ePangkat dalam tempoh tiga puluh 30 hari.  ',0,'J');

$pdf->Cell(110	,2.5,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->MultiCell(164,4.5,'5.             Tuan WAJIB mengikuti Program Residency and Immersion (PRIme) anjuran Institut Aminuddin Baki (IAB) apabila menerima surat panggilan daripada pihak IAB.',0,'J');




$pdf->Cell(110	,3,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,4,'Sekian, terima kasih.',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(110	,3,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,3,'"WAWASAN KEMAKMURAN BERSAMA 2030"',0,1);
$pdf->Cell(110	,3,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,3,'"BERKHIDMAT UNTUK NEGARA"',0,1);
$pdf->Cell(110	,3,'',0,1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,4,'Saya yang menjalankan amanah,',0,1);
$pdf->Cell(110	,5,'',0,1);
$pdf->Cell(110	,5,'',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,3,"(DATO' HAJI MD FIAH BIN MD JAMIN)",0,1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,5,'Pengarah Pendidikan',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(110,4,'Jabatan Pendidikan Negeri Sembilan',0,1);

$pdf->Cell(130	,5,'',0,1);
$pdf->Cell(130	,5,'',0,1);
$pdf->Cell(100	,4,'',0,0);
$pdf->Cell(23	,4,'Ruj.Kami : ',0,1);
$pdf->Cell(110	,4,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(23,5,'s.k:     i.   ',0,0);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(50,5,'KPPK,PPP',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(23,5,'',0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(50,5,'Unit Pra Sekolah & Rendah',0,1);
$pdf->Cell(110	,4,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(23,5,'          ii.   ',0,0);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(50,5,'Pegawai Pendidikan Daerah',0,1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(23,5,'',0,0);
$pdf->Cell(50,5,"Pegawai Pendidikan Daerah $ppd",0,1);
$pdf->Cell(110	,4,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(23,5,'          iii.   ',0,0);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(50,5,'Guru Besar',0,1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(23,5,'',0,0);
$pdf->Cell(50,5,"$newplace",0,1);

//$pdf->Cell(59	,5,'',0,1);//end of line

//$pdf->Cell(130	,5,'[City, Country, ZIP]',0,0);
//$pdf->Cell(25	,5,'Date',0,0);
//$pdf->Cell(34	,5,$candidate['name'],0,1);//end of line

//$pdf->Cell(130	,5,'Phone [+11345678]',0,0);
//$pdf->Cell(25	,5,'Invoice #',0,0);
//$pdf->Cell(34	,5,$candidate['position'],0,1);//end of line


//make a dummy empty cell as a vertical spacer
//$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
//$pdf->SetFont('Arial','B',11);

//$pdf->Cell(130	,5,'Description',1,0);
//$pdf->Cell(25	,5,'Taxable',1,0);
//$pdf->Cell(34	,5,'Amount',1,1);//end of line

//$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
$query = mysqli_query($con,"select * from candidate where id = '".$candidate['id']."'");
$tax = 0; //total tax
$amount = 0; //total amount

//display the items
while($item = mysqli_fetch_array($query)){
	//$pdf->Cell(130	,5,$candidate['unit'],1,0);
	//add thousand separator using number_format function

}

//summary





















$pdf->Output();
?>
