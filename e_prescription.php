<?php 
// add this at the start of the script
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'app');
 $id = $_GET['id'];
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

$html .='<table cellspacing="0" style=" fontweight:bold;font-size:9px;color:#1a4f1f; line-height:15px; width:100%;">
        <tr style="margin-bottom:30px;">
            <td style="text-align:left;"><img src="img/logo.png" style="padding:20px;border-radius:20px;height:75px;"></td>
            <td style="text-align:right;"><b style="font-size:10px;">Nutri App</b> <br> Tel : 0711530740 <br> Website : www.yoururl.com</td>
        </tr>';
$html .='</table>';

$html .='<hr>';

//Show User Details
 // Generate from database

 
 $query = mysqli_query($conn,"SELECT * from users 
 join eer_data on eer_data.clientref=users.ID  
 join goal_guide on goal_guide.client_ID=users.ID
 join bmi_data on bmi_data.user_ID=users.ID
 join feeding_habits on feeding_habits.client_id=users.ID
 join allergies on allergies.clientid=users.ID
 join reference_data on reference_data.client_ref=users.ID
 WHERE ID='$id'");
 while($row = mysqli_fetch_assoc($query))
 {

 $html .= '<table cellspacing="0" style=" fontweight:bold;font-size:9px;color:#1a4f1f; line-height:15px; width:100%;">
 <tr><td style="width:40%;text-align:left;">';
    //BIO DATA TABLE
    $html .= '
                    <tr>
                            <td><b style="color:#1a4f1f;"> Name : </b>'.$row["username"].'</td> 
                    </tr>
                    <tr>
                            <td><b style="color:#1a4f1f;"> Age : </b>'.$row["age"].' yrs</td>
                    </tr>
                    <tr>
                            <td><b style="color:#1a4f1f;"> Current Weight : </b>'.$row["weight"].' kgs</td>
                    </tr>
                    <tr>
                            <td><b style="color:#1a4f1f;"> Height : </b>'.$row["height"].' cms</td>
                    </tr>
                    <tr>
                            <td><b style="color:#1a4f1f;"> P.A.L : </b>'.$row["pal"].'</td>
                    </tr>';
    
    $html .= '</td>';


    //TARGET DATA TABLE
    $html .= '<td style="width:60%;text-align:left;">
                    <tr>
                            <td><b style="color:#1a4f1f;"> Goal : </b>'.$row["goal"].'</td> 
                    </tr>
                    <tr>
                            <td><b style="color:#1a4f1f;"> Target Weight : </b>'.$row["targetweight"].' kgs</td>
                    </tr>
                    <tr>
                            <td><b style="color:#1a4f1f;"> BMI : </b>'.$row["bmiclass"].' ('.$row["bmivalue"].')</td>
                    </tr>
                    <tr>
                            <td><b style="color:#1a4f1f;"> Ideal Weight : </b>'.$row["lowerweightrange"].' - '.$row["upperweightrange"].'</td>
                    </tr>
                    <tr>
                            <td><b style="color:#1a4f1f;"> Time : </b>'.$row["lowertimerange"].' - '.$row["uppertimerange"].'</td>
                    </tr>';
    
    $html .= '</td>';


 $html .= '</td></tr></table>';

}


$html .= '<p style="text-align:center; font-size:8px; color:#1a4f1f;"> Info Here ....</p>
			';
$pdf->Ln(12);
$pdf->writeHTML($html);
$title = "E-Prescription";
 $pdf->SetTitle($title);
ob_end_clean();
$pdf->Output("E-Prescription.pdf"); //File Name
?>