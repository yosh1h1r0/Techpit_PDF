<?php
//phpcreater上での読み込みなので、tfpdfディレクトリ内のtfpdf.phpファイルを読み込む
require("tfpdf/tfpdf.php"); 
$pdf = new tFPDF;
//Addpage()とOutput()中間にPDF出力する文字を入れる

$pdf->AddPage();

//AddFontのttfファイルを読み込むと接続できる
$pdf->AddFont('ShipporiMincho','','ShipporiMincho-Regular.ttf',true);
$pdf->SetFont('ShipporiMincho','',20);
//$pdf->cell(40,10,'6 + 7 ='); (横幅,縦幅,'出力する文字')
//$pdf->Ln(20); 改行()数字で改行スペースが広がる
$pdf->cell(0,20,'今日の課題');
$pdf->Ln(20);

$pdf->Cell(100);
$pdf->cell(90,10,'名前','B');
$pdf->Ln(30); //下へ改行し、SetFontを設定すると別フォントサイズの文字を出力できる

$Y = $pdf->getY(); //段落を作る定義

$pdf->SetFont('ShipporiMincho','',20);
$pdf->Cell(20,10,'(1)'); //横に並べると先に入れた横幅の範囲が広がり、隣の文字が動く
$pdf->SetFont('ShipporiMincho','',30);
$pdf->Cell(0,10,'Hello World');
$pdf->Ln(50);

$pdf->SetXY(110,$Y); 
//初めのみY座標がある
//Xは座標 今回はA4なので横210mm,297mm 半分の数値にするとこにお数値になる

$pdf->SetFont('ShipporiMincho','',20);
$pdf->Cell(20,10,'(2)'); 
$pdf->SetFont('ShipporiMincho','',30);
$pdf->Cell(0,10,'Hello World');
$pdf->Ln(30);


$pdf->SetFont('ShipporiMincho','',20);
$pdf->Cell(20,10,'(3)'); 
$pdf->SetFont('ShipporiMincho','',30);
$pdf->Cell(0,10,'Hello World');


$pdf->SetX(110);

$pdf->SetFont('ShipporiMincho','',20);
$pdf->Cell(20,10,'(4)'); 
$pdf->SetFont('ShipporiMincho','',30);
$pdf->Cell(0,10,'Hello World');
$pdf->Ln(30);

$pdf->SetFont('ShipporiMincho','',20);
$pdf->Cell(20,10,'(5)'); 
$pdf->SetFont('ShipporiMincho','',30);
$pdf->Cell(0,10,'Hello World');

















$pdf->Output();