<?php
function __construct(){
	parent::__construct();
$this->load->library('c
	fpdf.php');

}
class PDF extends FPDF

{
//Page header
function Header(){

// Logo
$this->Image(base_url().'asset/images/logo.png',30,20,100);
// Arial bold 15
$this->SetFillColor(232, 232, 232);
$this->SetFont('Arial','B',14);
// Move to the right
$this->SetY(20);
$this->SetX(80);
$this->Cell(30,10,'KOPERASI GUNUNG MADU PLANTATION',0,0,'C');

$this->SetFont('Arial','',10);
$this->SetY(30);
$this->SetX(80);
$this->Cell(30,5,'KM 90 Gunung Batin Lampung Tengah',0,0,'C');
// Line break
$this->Ln(20);
}

function Footer(){
//Position at 1.5 cm from bottom
$this->SetY(-25);
//Arial italic 8
$this->SetFont('Arial','I',8);
//Page number
$this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
}
}

