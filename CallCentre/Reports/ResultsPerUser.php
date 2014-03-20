<?php
require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Title
	$this->Cell(0,0,'ProcActive Training',0,0,'L');
	// Line break
	$this->Ln(15);
}

function LoadData()
{
	$connectionInfo = array("Database"=>"Bluestone", "UID"=>"sa", "PWD"=>"Password13");
	$conn = sqlsrv_connect( '192.168.2.202', $connectionInfo);
	$result = sqlsrv_query( $conn, "select * from ResultsPerUser order by [Name], [Result]");
	While($row = sqlsrv_fetch_array($result)) {

        	$data[] = array($row[0], $row[1], $row[2], $row[3]);

	}
	return $data;
}

// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->SetY(-15);
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}



function ImprovedTable($header, $data)
{
    // Column widths
    $w = array(40, 25, 50, 25);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
	$currentrow = $row[0];
 	$CoTotal = $CoTotal + $row[3];
	if ($lastrow != $currentrow){
		if ($lastrow != ''){
	  	$this->Cell(40,6,'','LRTB', 0, 'C');
	  	$this->Cell(25,6,'','LRTB', 0, 'C');
	  	$this->Cell(50,6,'Total','LRTB', 0, 'R');
	  	$this->Cell(25,6,$CoTotal - $row[3],'LRTB', 0, 'C');
	  	$this->Ln(15);
    	  	for($i=0;$i<count($header);$i++)
        		$this->Cell($w[$i],7,$header[$i],1,0,'C');
    	  	$this->Ln();
	  	$CoTotal =  $row[3];
		}
	  $this->Cell($w[0],6,$row[0],'LRT', 0);
          $this->Cell($w[1],6,$row[1],'LRT', 0, 'C');
          $this->Cell($w[2],6,$row[2],'LRT');
          $this->Cell($w[3],6,$row[3],'LRT', 0, 'C');
          $this->Ln();
	}
	else {
	  $this->Cell($w[0],6,'','LR', 0);
          $this->Cell($w[1],6,$row[1],'LR', 0, 'C');
          $this->Cell($w[2],6,$row[2],'LR');
          $this->Cell($w[3],6,$row[3],'LR', 0, 'C');
          $this->Ln();
	}
	$lastrow = $row[0];
    }
    // Closing line
	$this->Cell(40,6,'','LRTB', 0, 'C');
	$this->Cell(25,6,'','LRTB', 0, 'C');
	$this->Cell(50,6,'Total','LRTB', 0, 'R');
	$this->Cell(25,6,$CoTotal,'LRTB', 0, 'C');
        $this->Ln(15);

}
}

// Instanciation of inherited class
$pdf = new PDF();
$data = $pdf->LoadData();

foreach($data as $row)
    {
	$Comp = $row[0];
	$StatCode = $row[1];
	$Desc = $row[2];
	$Num = $row[3];
	$Total = $Total + $Num;
}

$pdf->AliasNbPages();
$pdf->AddPage();

// Column headings
$header = array('User', 'Result', 'Description', 'Total');

$pdf->SetFont('Times','',12);
$pdf->ImprovedTable($header,$data);
        
$pdf->Cell(40,6,'','LRTB', 0, 'C');
$pdf->Cell(25,6,'','LRTB', 0, 'C');
$pdf->Cell(50,6,'Grand Total','LRTB', 0, 'R');
$pdf->Cell(25,6,$Total,'LRTB', 0, 'C');

$pdf->Output();

?>
