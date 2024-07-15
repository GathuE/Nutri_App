<?php 

$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'app');
// Include the main TCPDF library (search for installation path).
include('tcpdf/tcpdf.php');

// create new PDF document
ob_start();
$pdf = new TCPDF('P','mm','A4');
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->SetMargins(10, -5, 10, true);
$pdf->AddPage();

//Logo Part
$html .='<table cellspacing="0" style=" fontweight:bold;font-size:9px;color:#085314; line-height:15px; width:100%;">
        <tr style="margin-bottom:30px;">
            <td style="text-align:left;"><img src="img/logo.png" style="padding:30px;border-radius:10px;height:125px;"></td>
            <td style="text-align:right;"><b style="font-size:10px;">Home Dietetics</b> <br> Tel : 0728011509 <br> Website : www.homedietetics.co.ke</td>
        </tr>';
$html .='</table>';




$html .= '<p style="text-align:center; font-size:8px; color:#085314;"> Info Here .... </p>
			';
$pdf->Ln(12);
$pdf->writeHTML($html);
$title = "Diet Plan Description";
 $pdf->SetTitle($title);
ob_end_clean();
$pdf->Output("Diet-Plan-Description.pdf"); //File Name
?>