<?php
require('fpdf/fpdf.php');
include"config.php";


try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM candidate;");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

   $data=$stmt->fetchAll();
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

 class PDF extends FPDF
{

  function Header()
    {

      $this->SetFont('Helvetica','B',15);
      $this->SetXY(85, 20);
       $this->Cell(100,100,'Cadangan Pelantikan, Pergerakan Dan Penempatan Semula',0,1);

       $this->SetFillColor(220,220,220);
        $this->SetDrawColor(50,50,100);
        // $this->cell(10,5,'Id',1,0,'',true);
         $this->SetY(35);
        $this->cell(20,10,'ID',1,0,'',true);
         $this->cell(47,10,'Pegawai',1,0,'',true);
        //$this->cell(47,10,'No. I/C',1,0,'',true);

      //$this->cell(35,10,'Jawatan',1,0,'',true);
        //$this->cell(35,10,'Jawatan Lain-lain',1,0,'',true);
        //$this->cell(40,10,'Tempat Bertugas',1,1,'',true);
				//$this->cell(40,10,'Gred Hakiki',1,1,'',true);
				//$this->cell(40,10,'Gred Semasa',1,1,'',true);
				//$this->cell(40,10,'Tarikh Bersara',1,1,'',true);
				//$this->cell(40,10,'Alamat Rumah',1,1,'',true);
				//$this->cell(40,10,'Tarikh Khidmat Dekolah Semasa',1,1,'',true);
				//$this->cell(40,10,'Tarikh Lantikan Jawatan Semasa',1,1,'',true);
				//$this->cell(40,10,'Pergerakan',1,1,'',true);
				//$this->cell(40,10,'Jarak Sekolah Asal',1,1,'',true);
			  //$this->cell(40,10,'Jarak Sekolah Baru',1,1,'',true);
				//$this->cell(40,10,'Justifikasi',1,1,'',true);


     }

  function Footer()
    {
      $this->SetXY(100,-15);
      $this->SetFont('Arial','I',10);
      $this->Write (5, 'This is a footer');
    }
}

$pdf=new FPDF();
$pdf->AliasNbPages('{pages}');
$pdf->AddPage();
$pdf->SetFont('Arial','', 9);
$pdf->SetDrawColor(50,50,100);

    foreach ($data as $value) {


		$stmt4 = $conn->prepare("SELECT * FROM candidate");
		$stmt4->execute();

		$result = $stmt4->setFetchMode(PDO::FETCH_ASSOC);
		$data=$stmt4->fetchAll();

      // $payment=$stmt->fetchAll();
          // $pdf->cell(10,5,$value['id'],1,0);
          $pdf->cell(20,10,$value['id'],1,0);
          $pdf->cell(47,10,$value['name'],1,0);
          $pdf->cell(47,10,$value['icno'],1,0);
          $pdf->cell(35,10,$value['position'],1,0);
          $pdf->cell(35,10,$value['others'],1,0);
          $pdf->cell(40,10,$value['workplace'],1,1);
          $pdf->cell(30,5,$value['gred'],1,0);
          $pdf->cell(25,5,$value['actgred'],1,1);




  }

$pdf->Output();
?>
