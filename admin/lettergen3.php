
<?php

require('force_justify.php');


//db connection
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'tour1');

//get invoices data
$query = mysqli_query($con,"select * from candidate2
	where
	id = '".$_GET['id']."'");
	$query1 = mysqli_query($con,"select * from datepbsm");
$candidate = mysqli_fetch_array($query);
$candidate1 = mysqli_fetch_array($query1);

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal:265mm

$pdf = new FPDF('P','mm','A4');
$name=$candidate['name'];
$gred=$candidate['gred'];
//$position=$candidate['position'];
//$positionof=$candidate['positionof'];
$workplace=$candidate['workplace'];
$newplace=$candidate['newplace'];
$others=$candidate['others'];
$othersnewpost=$candidate['othersnewpost'];
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
$pdf->Cell(110	,3,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(30,5,'Melalui dan salinan:  ',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(110	,3,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,5,'Ketua Pengawai Pendidikan Daerah  ',0,1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,5,$candidate['workplace'],0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,5,"$postcode.",0,1);

//set font to arial, regular, 11pt
$pdf->SetFont('Arial','',11);
$pdf->Cell(110	,3,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,5,'Tuan,  ',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,5,'ARAHAN PENEMPATAN /PERTUKARAN',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,5,'PEGAWAI PERKHIDMATAN PENDIDKAN(PPP)',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,5,'NEGERI SEMBILAN DARUL KHUSUS',0,1);


$pdf->SetFont('Arial','',11);
$pdf->Cell(110	,3,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,5,'Adalah dimaklumkan bahawa:  ',0,1);
$pdf->Cell(110	,3,'',0,1);
$pdf->Cell(29	,3,'',0,0);
$pdf->MultiCell(149,5,"$name, Pegawai Perkhidmatan Pendidikan (PPP) Gred $gred, $others, $workplace, Negeri Sembilan, ditempatkan sebagai $othersnewpost, $newplace, Negeri Sembilan. Pegawai Perkhidmatan Pendidikan (PPP), Gred $gred. Gred hakiki jawatan adalah Gred $actgred. ",0,'J');

//$pdf->MultiCell(130,5,', Pegawai Perkhidmatan Pendidikan (PPP) Gred Perkhidmatan  Pendidikan  Gred  DG48  ',1,'J');
//$pdf->Cell(130,5,'Perkhidmatan  Pendidikan  Gred  DG48  ke  Gred  DG52  Khas  Untuk  Penyandang  (KUP)  secara  ',0,1);
//$pdf->Cell(130,5,'Time- Based  Berasaskan  Kecemerlangan di  Kementerian  Pendidikan  Malaysia  dengan  rujukan  ',0,1);
//$pdf->Cell(11	,5,'surat  ',0,0);
//$pdf->Cell(59,5,$candidate['ref2'],0,0);
//$pdf->Cell(22	,5,'   bertarikh  ',0,0);
//$pdf->Cell(59,5,$candidate['letterdate2'],0,1);

$pdf->Cell(110	,3,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(98,5,"2.          Tarikh berkuatkuasa penempatan ini ialah mulai $date$startdate.   ",0,'J');
$pdf->SetFont('Arial','B',11);
//$pdf->Cell(56,5,"$startdate.",0,1);
$pdf->Cell(110	,3,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(1,5,'3.',0,0);
$pdf->SetFont('Arial','B',11);
$pdf->MultiCell(163,5,'             Kegagalan tuan mematuhi arahan  penempatan/pertukaran  ini boleh menyebab',0,'J');
$pdf->Cell(15	,3,'',0,0);
$pdf->MultiCell(164,5,'tuan dikenakan tindakan tatatertib berdasarkan kepada Peraturan 4(2)(i), Peraturan-Peraturan Pegawai Awam (Kelakuan dan Tatatertib) PU (A) 395/1993 yang menyatakan, "Seseorang pegawai tidak boleh ingkar perintah atau berkelakuan dengan apa-apa cara boleh ditafsirkan sebagai ingkar perintah".',0,'J');



$pdf->SetFont('Arial','',11);
$pdf->Cell(110	,3,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->MultiCell(164,5,'4.       Ketua  Jabatan  dikehendaki menyediakan  Penyata  Perubahan (KEW. 8), mengemukakan Sijil Gaji Akhir dan Buku Perkhidmatan Kerajaan kepada Ketua Jabatan yang baru serta meminta pegawai berkenaan menyediakan Nota Serah Tugas.  ',0,'J');

$pdf->Cell(110	,3,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->MultiCell(164,5,'5.          Ketua Jabatan yang berkenaan juga dikehendaki mengemaskini data pegawai di dalam Sistem HRMIS, e-Operasi dan e-Pangkat dalam tempoh tiga puluh (30) hari.',0,'J');




$pdf->Cell(110	,3,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,4,'Sekian, terima kasih.',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(110	,4,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,4,'"WAWASAN KEMAKMURAN BERSAMA 2030"',0,1);
$pdf->Cell(110	,4,'',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,4,'"BERKHIDMAT UNTUK NEGARA"',0,1);
$pdf->Cell(110	,4,'',0,1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,4,'Saya yang menjalankan amanah,',0,1);
$pdf->Cell(110	,5,'',0,1);
$pdf->Cell(110	,5,'',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(130,4,"(DATO' HAJI MD FIAH BIN MD JAMIN)",0,1);
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
$pdf->Cell(50,5,'Pegawai Pendidikan Daerah',0,1);
$pdf->Cell(15	,3,'',0,0);
$pdf->Cell(23,5,'',0,0);
$pdf->SetFont('Arial','',11);
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

//$pdf->SetFont('Arial','',11);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
$query = mysqli_query($con,"select * from candidate2 where id = '".$candidate['id']."' ");
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
