<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pdf_absen {



function Header(){   
  $pdf->image('assets/img/logo.png',40,3,-200);
        $pdf->cell(80);
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(60,10,"Absensi Peserta Tes Calon Karyawan Baru",0,0,'C');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(12);
        $pdf->Text(70,15,"PT. Lion Metal Works Tbk Purwakarta");
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(11);
        
       
        
        $pdf->ln(12);
        $pdf->cell(190,1,'','B',1,'L');
        $pdf->cell(190,1,'','B',0,'L');
        $pdf->ln(4);
        $pdf->SetFont('Arial','B','C');
        $pdf->setx(40);
        
        $pdf->Cell('10','9','No',1,0,'C');
        $pdf->Cell('30','9','Nama',1,0,'C');
        $pdf->Cell('20','9','Umur',1,0,'C');
        $pdf->Cell('50','9','Pendidikan Terakhir',1,0,'C');
        $pdf->Cell('20','9','TTD',1,1,'C');
        
}                


function Footer() {               
      
  }               


} 