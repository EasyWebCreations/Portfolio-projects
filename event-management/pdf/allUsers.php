<?php

session_start();
require "fpdf/fpdf.php";
include "conn.php";
// include "connect1.php";

// $id = mysqli_real_escape_string($conn, $_GET['id']);
$planstatus = 'success';
// $sqlpdf = "SELECT * FROM users WHERE id <> '0' ";
$sqlpdf = "SELECT * FROM users WHERE payment_Status = '{$planstatus}'";
$querypdf = mysqli_query($conn,$sqlpdf);

$num = mysqli_num_rows($querypdf);

if(mysqli_num_rows($querypdf) == 0){
        echo "No one registered for event!";
    }elseif(mysqli_num_rows($querypdf) > 0){
        class PDF extends fpdf
        {

                protected $B = 0;
    protected $I = 0;
    protected $U = 0;
    protected $HREF = '';

    function WriteHTML($html)
    {
        // HTML parser
        $html = str_replace("\n",' ',$html);
        $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                // Text
                if($this->HREF)
                    $this->PutLink($this->HREF,$e);
                else
                    $this->Write(5,$e);
            }
            else
            {
                // Tag
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    // Extract attributes
                    $a2 = explode(' ',$e);
                    $tag = strtoupper(array_shift($a2));
                    $attr = array();
                    foreach($a2 as $v)
                    {
                        if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                            $attr[strtoupper($a3[1])] = $a3[2];
                    }
                    $this->OpenTag($tag,$attr);
                }
            }
        }
    }

    function OpenTag($tag, $attr)
    {
        // Opening tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,true);
        if($tag=='A')
            $this->HREF = $attr['HREF'];
        if($tag=='BR')
            $this->Ln(5);
    }

    function CloseTag($tag)
    {
        // Closing tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF = '';
    }

    function SetStyle($tag, $enable)
    {
        // Modify style and select corresponding font
        $this->$tag += ($enable ? 1 : -1);
        $style = '';
        foreach(array('B', 'I', 'U') as $s)
        {
            if($this->$s>0)
                $style .= $s;
        }
        $this->SetFont('',$style);
    }

    function PutLink($URL, $txt)
    {
        // Put a hyperlink
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
    }

                /* Page header */
                function Header()
                {
                        $this->Image('bgh1.png',0,0,210,17,'','');
                 $this->Image('man.png', 15, 2, 10);
                $this->Image('../images/youthLogo.png', 25, 2, 20);
                  
                // GFG logo image
                $this->Image('logo.png', 165, 1, 15);
                $this->Image('devi.png', 185, 1, 10);
                // $image1 = 'bg.png';
                // $this->Image($image1, 0, 0, 200);
                // Set font-family and font-size
                $this->SetFont("Helvetica",'B',20);
                  
                // Move to the right
                $this->Cell(80);
                $this->SetTextColor(230,20,20);
                // Set the title of pages.
//                 $img = Image.new('RGB', 210,297, "#afeafe" );
// $img.save('blue_colored.png');

# adding image to pdf page that e created using fpdf


# setting font and size and writing text to cell
// pdf.set_font("Arial", size=12)
// pdf.cell(ln=200, h=40, align='L', w=0, txt="Hello World", border=0,fill = False)
                $this->Cell(35, 5, 'Arya Vaishya Akshadaa Maharashtra ', 0, 2, 'C',FALSE);
                $this->SetFillColor(248,50,60);
                // Break line with given space
                $this->Ln(5);
                }

                function Footer()
                {
                    // Position at 1.5 cm from bottom
                    $this->SetY(-15);
            
                    // Arial italic 8
                    $this->SetFont('Arial','I',8);
                    $this->SetTextColor(0,0,0);
                    // Page number
                    $this->Cell(50,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
                    $this->Cell(70,10,'www.akshadaa.com ',0,0,'C');
                    $this->SetTextColor(250,0,0);
                    $this->Cell(90,10,'Shodh Jivansathicha...',0,0,'C');
                }
                function Transform($tm){
                        $this->_out(sprintf('%.3F %.3F %.3F %.3F %.3F %.3F cm', $tm[0],$tm[1],$tm[2],$tm[3],$tm[4],$tm[5]));
                    }
                
                    function StopTransform(){
                        //restore previous graphic state
                        $this->_out('Q');
                    }
                    function TranslateX($t_x){
                        $this->Translate($t_x, 0, $x, $y);
                    }
                    function TranslateY($t_y){
                        $this->Translate(0, $t_y, $x, $y);
                    }
                    function Translate($t_x, $t_y){
                        //calculate elements of transformation matrix
                        $tm[0]=1;
                        $tm[1]=0;
                        $tm[2]=0;
                        $tm[3]=1;
                        $tm[4]=$t_x*$this->k;
                        $tm[5]=-$t_y*$this->k;
                        //translate the coordinate system
                        $this->Transform($tm);
                    }
                    function StartTransform(){
                        //save the current graphic state
                        $this->_out('q');
                    }
                

        }
        $pdf = new PDF('P','mm',array(210,1000));
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetTextColor(0,0,0);
$pdf->SetFont("Helvetica",'',12);

$i = 0;
$max = 4;

while($row = mysqli_fetch_assoc($querypdf)){
        if($i%$max == 0 && $i > 4){
                $pdf->AddPage();
        }
                $ty = (-60) * $i;
        
$pdf->StartTransform();
                if($i == 0){

                }
                else if ($i % 2==0 ){
                $ty1 = (-60) * intdiv($i,2);
                $pdf->Translate(0, $ty1);
                }else{
                $ty2 = (-60) * intdiv($i+1,2);
                $pdf->Translate(100, $ty2);
                }
$pdf->SetFillColor(224,235,255);

$image1 = 'man.png';
// $image1 = $row['biodata'];
$pdf->Image($image1,50, $pdf->GetY()+2, 15);
$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->ln();

$pdf->SetTextColor(0,0,0);

$pdf->Cell(35,5,"Name: ",0,0,'B',true);
$pdf->SetTextColor(106,36,69);
$pdf->Cell(60,5,$row['firstname']." ".$row['middlename']." ".$row['lastname'],0,1,'',true);

$pdf->SetTextColor(0,0,0);
$pdf->Cell(35,5,"Anubandh ID:",0,0,'B',true);
$pdf->SetTextColor(106,36,69);
$pdf->Cell(60,5,$row['anubandhaId'],0,1,'',true);

$pdf->SetTextColor(0,0,0);
$pdf->Cell(35,5,"Date of Birth: ",0,0,'B',true);
$pdf->SetTextColor(106,36,69);
$dob = date_create($row['DOB']);
$newDob = date_format($dob,'d M Y');
$pdf->Cell(60,5,$newDob,0,1,'',true);

$pdf->SetTextColor(0,0,0);
$pdf->Cell(35,5,"Education: ",0,0,'B',true);
$pdf->SetTextColor(106,36,69);
$pdf->Cell(60,5,$row['education'],0,1,'',true);

$pdf->SetTextColor(0,0,0);
$pdf->Cell(35,5,"First Gotram: ",0,0,'B',true);
$pdf->SetTextColor(106,36,69);
$pdf->Cell(60,5,$row['firstGotram'],0,1,'',true);

$pdf->SetTextColor(0,0,0);
$pdf->Cell(35,5,"Second Gotram: ",0,0,'B',true);
$pdf->SetTextColor(106,36,69);
$pdf->Cell(60,5,$row['secondGotram'],0,1,'',true);

$pdf->SetTextColor(0,0,0);
$pdf->Cell(35,5,"Contact No: ",0,0,'B',true);
$pdf->SetTextColor(106,36,69);
$pdf->Cell(60,5,$row['whatsappnumber'],0,1,'',true);
// $pdf->ln();
$pdf->StopTransform();
$i = $i + 1;
}
$pdf->Output();
}