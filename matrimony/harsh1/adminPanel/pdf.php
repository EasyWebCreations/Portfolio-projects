<?php

session_start();
require "fpdf/fpdf.php";
include "conn.php";

$id = mysqli_real_escape_string($conn, $_GET['id']);

$sqlpdf = "SELECT * FROM per_details WHERE id = {$id}";
$querypdf = mysqli_query($conn,$sqlpdf);

if($querypdf){
        $row = mysqli_fetch_assoc($querypdf);
}else{
        echo "Please try again later!";
}
class PDF extends fpdf
{
	/* Page header */
	function Header()
	{
        
        $this->Image('../../backend/hr.png',20,75,170,0.5,'','');
        $this->Image('../../backend/hr.png',20,147,170,0.5,'','');
        $this->Image('../../backend/hr.png',20,162,170,0.5,'','');
        $this->Image('../../backend/hr.png',20,202,170,0.5,'','');
        $this->Image('../../backend/hr.png',20,240,170,0.5,'','');

        $this->Image('../../backend/border.png',10,0,2,400,'','');
        $this->Image('../../backend/border.png',0,11,210,3,'','');
        $this->Image('../../backend/border.png',197,0,5,400,'','');
        $this->Image('../../backend/border.png',0,283,210,3,'','');
        $this->Image('../../backend/bgh1.png',0,0,10,500,'','');
        $this->Image('../../backend/bgh1.png',200,0,10,500,'','');
        $this->Image('../../backend/youthLogo.png', 11, 11, 30,25,'','https://event.akshadaa.com/');
        $this->Image('../../backend/bgh1.png',0,0,210,12,'','');
        $this->Image('../../backend/bgh1.png',0,285,210,12,'','');
        // GFG logo image
        $this->Image('../../images/logo.png', 160, 2, 35,35,'','https://akshadaa.com/');
          
        // Set font-family and font-size
        $this->SetFont("Helvetica",'B',25);
          
        // Move to the right
        $this->Cell(80);
        $this->SetTextColor(250,40,50);
        // Set the title of pages.
        $this->Cell(30, 20, 'Bio Data', 0, 2, 'C');
          
        // Break line with given space
        $this->Ln(5);
	}
}
$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTextColor(167,4,39);
$pdf->SetFont("Helvetica",'B',18);
$pdf->SetMargins(15,10,0);
$pdf->Cell(0,2,"AKSHADAA ID:- ". $row['id'],0,2,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
// $pdf->Cell(0,8,$row['fname']." ".$row['lname']." "."(ID: ". $row['id'] . ")",1,1,'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(50,8,"Name: ",0,0,'B');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(0,8,$row['fname']." ".$row['lname'],0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(50,8,"Date of Birth: ",0,0,'B');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(0,8,$row['dob']."  (" . $row['age']  . " yrs)",0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(50,8,"Occupation: ",0,0,'B');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(0,8,$row['occupation'],0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(50,8,"About Me(Hobbies):",0,0,'B');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Multicell(0,8,$row['about_me'],0,1,'');
$cell_width = 8;

$pdf->Image($row['profile_img'],160,38,30,30,'','');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',15);
$pdf->SetTextColor(167,4,39);



$pdf->Cell(0,8,"::  Personal Info  ::",0,2,'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Marital status : ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(65,8,$row['martial_status'],0,0,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Height: ",0,0,'B');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(0,8,$row['height'] . " (in inches)",0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"First Gotra: ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(65,8,$row['gotra1'],0,0,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Blood Group: ",0,0,'B');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(0,8,$row['blood'],0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Second Gotra: ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(65,8,$row['gotra2'],0,0,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Complexion: ",0,0,'B');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(0,8,$row['complexion'],0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Email Id: ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(65,8,$row['email'],0,0,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Education: ",0,0,'B');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(0,8,$row['education']."( ".$row['det_education']." )",0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Occupation: ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(65,8, $row['occupation'] ,0,0,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Occupation Details: ",0,0,'B');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(0,8, $row['det_occupation'] ,0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Mother Tongue: ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(65,8, $row['mother_tongue'] ,0,0,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Annual Income: ",0,0,'B');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(0,8, $row['income']." in LPA" ,0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Res. Address: ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Multicell(0,8,$row['c_locality'].", ".$row['c_landmark'].",". $row['c_city']. ", ". $row['c_district'].", ". $row['c_state'] .", ".$row['c_country'].".",0,1,'');
// $pdf->SetTextColor(0,0,0);
// $pdf->SetFont("Helvetica",'B',12);
// $pdf->Cell(40,8,"Per. Address: ",0,0,'B');
// $pdf->SetTextColor(106,36,69);
// $pdf->SetFont("Helvetica",'',12);
// $pdf->Multicell(0,8,$row['p_locality'].", ".$row['p_landmark'].",". $row['p_city']. ", ". $row['p_state'] .", ".$row['p_country'].".",0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Calling No.: ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(65,8,$row['callno'],0,0,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Whatsapp No.: ",0,0,'B');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(0,8,$row['mobile'],0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',15);
$pdf->SetTextColor(167,4,39);


$pdf->Cell(0,8,"::  Kundali Details  ::",0,2,'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Birth Name: ",0,0,'');
$pdf->SetFont("Helvetica",'',12);
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(30,8,$row['birth_name'],0,0,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(30,8,"Birth Time: ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(30,8,$row['birth_time'],0,0,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(30,8,"Birth Place: ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(30,8,$row['birth_place'],0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->SetTextColor(167,4,39);
$pdf->SetFont("Helvetica",'B',15);


$pdf->Cell(0,8,"::  Family Details  ::",0,2,'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Father: ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(65,8,$row['mname'],0,0,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Occupation : ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(65,8,$row['father_occupation'],0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Mother: ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(65,8,$row['mother_name'],0,0,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Occupation : ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(65,8,$row['mother_occupation'],0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);

$pdf->Cell(40,8,"No. of brothers:",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(65,8,$row['no_of_brothers'],0,0,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Details : ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(0,8,$row['brother_details'],0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"No. of sisters: ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(65,8,$row['no_of_sisters'],0,0,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Details : ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(0,8,$row['sister_details'],0,1,'');

$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->SetTextColor(167,4,39);
$pdf->SetFont("Helvetica",'B',15);
$pdf->Cell(0,8,"::  Partner Expectation  ::",0,2,'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Qualification:",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(65,8,$row['pe_education'],0,0,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Annual Income:",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(0,8,$row['pe_income'],0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Age Range:",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(65,8,$row['pe_age']." years" ,0,0,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Height:",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(0,8,$row['pe_height']." inches",0,1,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"Occupation : ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(65,8,$row['pe_occupation'],0,0,'');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(40,8,"City: ",0,0,'');
$pdf->SetTextColor(106,36,69);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(0,8,$row['pe_city'],0,1,'');

$pdf->Ln();
$pdf->SetFont("Helvetica",'B',18);
$pdf->SetTextColor(167,4,39);
$pdf->Cell(0,8,"Enquiry Us",0,2,'C');
$pdf->SetTextColor(255,0,102);
$pdf->Cell(0,8,"Arya Vaishya Youth Akshdaa India",0,2,'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(50,8,"Email: ",0,0,'');
$pdf->SetTextColor(0, 102, 204);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(100,8,"contact@akshadaa.com",0,0,'');
$pdf->Ln();
$pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'B',12);
$pdf->Cell(50,8,"Contact No.: ",0,0,'');
$pdf->SetTextColor(0, 102, 204);
$pdf->SetFont("Helvetica",'',12);
$pdf->Cell(0,8,"9766557385, 9307983280, 7066354777",0,0,'');
$pdf->Image('../../images/wa1.png',160,265,10,10,'','https://wa.me/+919766557385');

$pdfName = $row['fname']."_".$row['lname']."_Akshadaa_Biodata".".pdf";
$pdf->Output('D',$pdfName,true);
?>