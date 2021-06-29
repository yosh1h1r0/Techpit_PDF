<?php
//phpcreater上での読み込みなので、tfpdfディレクトリ内のtfpdf.phpファイルを読み込む
require("tfpdf/tfpdf.php"); 
$pdf = new tFPDF;
//Addpage()とOutput()中間にPDF出力する文字を入れる



//AddFontのttfファイルを読み込むと接続できる
$pdf->AddFont('ShipporiMincho','','ShipporiMincho-Regular.ttf',true);

$names = explode(",", $_GET['names']);
foreach($names as $name){
    $pdf->SetFont('ShipporiMincho','',20);
    $pdf->AddPage();

//$pdf->cell(40,10,'6 + 7 ='); (横幅,縦幅,'出力する文字')
//$pdf->Ln(20); 改行()数字で改行スペースが広がる
$pdf->cell(0,20,'今日の課題');
$pdf->Ln(20);

$pdf->Cell(100);
$pdf->cell(90,10,"名前: $name",'B');
$pdf->Ln(30); //下へ改行し、SetFontを設定すると別フォントサイズの文字を出力できる

make_contents();
}

$pdf->Output();

function make_contents(){
        global $pdf;

        $contents = explode(",",$_GET['contents']);
        $count = 0;


$Y = $pdf->getY(); //段落を作る定義

////$pdf->SetFont('ShipporiMincho','',20);
//$pdf->Cell(20,10,'(1)'); //横に並べると先に入れた横幅の範囲が広がり、隣の文字が動く
//$pdf->SetFont('ShipporiMincho','',30);
//$pdf->Cell(0,10,'Hello World');
//$pdf->Ln(50);

//$pdf->SetXY(110,$Y);
//初めのみY座標がある
//Xは座標 今回はA4なので横210mm,297mm 半分の数値にするとこにお数値になる

foreach($contents as $content)
{
    $count++;
    if($count == 10){
        $pdf->setY($Y);
    }
    if($count >= 10){
        $pdf->setX(110);
    }
        $pdf->SetFont('ShipporiMincho','',25);
        $pdf->cell(20,10,"({$count})");
        $pdf->SetFont('ShipporiMincho','',30);
        $pdf->Cell(80,10,$content);
        $pdf->Ln(25);
    }













}

