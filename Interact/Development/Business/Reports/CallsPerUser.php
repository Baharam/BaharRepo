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
	$result = sqlsrv_query( $conn, "select * from callsperuser order by [name]");
	While($row = sqlsrv_fetch_array($result)) {

        	$data[] = array($row[0], $row[1], $row[2]);

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
    $w = array(40, 25, 25);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR', 0, 'C');
        $this->Cell($w[2],6,$row[2],'LR', 0, 'C');
        $this->Ln();
    }
    // Closing line
        $this->Cell(array_sum($w),0,'','T');
        $this->Ln();

}
}

// Instanciation of inherited class
$pdf = new PDF();
$data = $pdf->LoadData();

foreach($data as $row)
    {
	$StatCode = $row[0];
	$Desc = $row[1];
	$Num = $row[2];
	$Total = $Total + $Num;
}

$pdf->AliasNbPages();
$pdf->AddPage();

// Column headings
$header = array('User', 'Id', 'Calls');

$pdf->SetFont('Times','',12);
$pdf->ImprovedTable($header,$data);
        
$pdf->Cell(40,6,'','LR', 0, 'C');
$pdf->Cell(25,6,'Total','LR', 0, 'R');
$pdf->Cell(25,6,$Total,'LR', 0, 'C');
$pdf->Ln();
$pdf->Cell(90,0,'','T');

$pdf->Output();

?>
