<?php 
// add this at the start of the script
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// Database Connection 
$conn = new mysqli('localhost', 'root', '', 'app');
//Check for connection error
if($conn->connect_error){
  die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);    
}

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

$html .='<table cellspacing="0" style="font-size:9px; width:100%;">
        <tr style="margin-bottom:30px;">
            <td style="text-align:left;"><img src="img/logo.png" style="padding:20px;border-radius:20px;height:75px;"></td>
            <td style="text-align:center;margin-top:20px;"> MEAL PLAN </td>
            <td style="text-align:right;"><b style="font-size:10px;">Nutri App</b> <br> Tel : 0711530740 <br> Website : www.yoururl.com</td>
        </tr>';
$html .='</table>';

$html .='<hr>';

//Show User Details
 // Generate from database

 
 $query = "SELECT * from users 
 inner join eer_data on eer_data.clientref=users.ID  
 inner join goal_guide on goal_guide.client_ID=users.ID
 inner join bmi_data on bmi_data.user_ID=users.ID
 inner join feeding_habits on feeding_habits.client_id=users.ID
 inner join allergies on allergies.clientid=users.ID
 inner join reference_data on reference_data.client_ref=users.ID
 WHERE ID='$id'";
 $result = $conn->query($query);
 while($row = $result->fetch_object())
 {

 $html .= '<table cellspacing="0" style="font-size:9px; width:100%;">
 <tr><td style="width:40%;text-align:left;">';
    //BIO DATA TABLE
    $html .= '
                    <tr>
                            <td><b> Name : </b>'.$row->username.'</td> 
                    </tr>
                    <tr>
                            <td><b> Age : </b>'.$row->age.' yrs</td>
                    </tr>
                    <tr>
                            <td><b> Current Weight : </b>'.$row->weight.' kgs</td>
                    </tr>
                    <tr>
                            <td><b> Height : </b>'.$row->height.' cms</td>
                    </tr>
                    <tr>
                            <td><b> P.A.L : </b>'.$row->pal.'</td>
                    </tr>';
    
    $html .= '</td>';


    //TARGET DATA TABLE
    $html .= '<td style="width:60%;text-align:left;">
                    <tr>
                            <td><b> Goal : </b>'.$row->goal.'</td> 
                    </tr>
                    <tr>
                            <td><b> Target Weight : </b>'.$row->targetweight.' kgs</td>
                    </tr>
                    <tr>
                            <td><b> BMI : </b>'.$row->bmiclass.' ('.$row->bmivalue.')</td>
                    </tr>
                    <tr>
                            <td><b> Ideal Weight : </b>'.$row->lowerweightrange.' - '.$row->upperweightrange.'</td>
                    </tr>
                    <tr>
                            <td><b> Time : </b>'.$row->lowertimerange.' - '.$row->uppertimerange.'</td>
                    </tr>';
    
    $html .= '</td>';

 $html .= '</td></tr></table>';
 $html .='<hr>';

 //Monday
 $html .='<h6>Monday</h6>';
 $html .='<table border="1" style="width:100%;">
            <tr>
                <td style="width:16.67%;font-size:8px;text-align:left;">Breakfast</td>
                <td style="width:16.67%;font-size:8px;text-align:left;">MidMorning</td>
                <td style="width:16.67%;font-size:8px;text-align:left;">Lunch</td>
                <td style="width:16.67%;font-size:8px;text-align:left;">Mid Afternoon</td>
                <td style="width:16.67%;font-size:8px;text-align:left;">Supper</td>
                <td style="width:16.67%;font-size:8px;text-align:left;">Late Supper</td>
            </tr>';

 // Generate Brakfast Meals From database
 $query2 = "SELECT * from meal_plans WHERE user_id='$id' AND day='Monday'
 ORDER BY
 CASE meal
   WHEN 'Breakfast' THEN 1
   WHEN 'Midmorning' THEN 2
   WHEN 'Lunch' THEN 3
   WHEN 'Midafternoon' THEN 4
   WHEN 'Supper' THEN 5
   WHEN 'Latesupper' THEN 6
 END,
 meal";
 $result = $conn->query($query2);
 while($row = $result->fetch_object())
 {
    if($row->meal =='Breakfast'){
                                    $html .= '<tr>
                                        <td style="width:10.33%;font-size:6px;text-align:left;">'.$row->name.'</td>
                                        <td style="width:6.33%;font-size:6px;text-align:left;"> '.$row->amount.' '.$row->servingitem.'</td>
                                    ';
                                }
    if($row->meal =='Midmorning'){
                                        $html .= '
                                        <td style="width:10.33%;font-size:6px;text-align:left;">'.$row->name.'</td>
                                        <td style="width:6.33%;font-size:6px;text-align:left;"> '.$row->amount.' '.$row->servingitem.'</td>
                                    ';
                                }
    if($row->meal =='Lunch'){
                                        $html .= '
                                        <td style="width:10.33%;font-size:6px;text-align:left;">'.$row->name.'</td>
                                        <td style="width:6.33%;font-size:6px;text-align:left;"> '.$row->amount.' '.$row->servingitem.'</td>
                                    ';
                                }
    if($row->meal =='Midafternoon'){
                                        $html .= '
                                        <td style="width:10.33%;font-size:6px;text-align:left;">'.$row->name.'</td>
                                        <td style="width:6.33%;font-size:6px;text-align:left;"> '.$row->amount.' '.$row->servingitem.'</td>
                                    ';
                                }
    if($row->meal =='Supper'){
                                        $html .= '
                                        <td style="width:10.33%;font-size:6px;text-align:left;">'.$row->name.'</td>
                                        <td style="width:6.33%;font-size:6px;text-align:left;"> '.$row->amount.' '.$row->servingitem.'</td>
                                    ';
                                }
    if($row->meal =='Latesupper'){
                                        $html .= '
                                        <td style="width:10.33%;font-size:6px;text-align:left;">'.$row->name.'</td>
                                        <td style="width:6.33%;font-size:6px;text-align:left;"> '.$row->amount.' '.$row->servingitem.'</td>
                                    </tr>';
                                }
   // $counter++; //increment counter by 1 on every pass // <td style="width:5%;">'.$counter.'</td>
}


 $html .='</table>';

 

 //$html .='';

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