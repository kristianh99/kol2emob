<?php
include 'phpqrcode/qrlib.php';


$tempDir = 'code/';
$number=mt_rand(100,200);


$url = 'https://e448-62-182-152-24.ngrok.io/emob2/vezba/kol2/site.php?number='.$number;

$codeContents = 'url:'.$url;

// generating
QRcode::png($codeContents, $tempDir.'1.png', QR_ECLEVEL_L);

// displaying
echo '<img src="'.$tempDir.'1.png" alt="qr code">';
echo '<p>'.date('d.m.Y.').'</p>';
?>

