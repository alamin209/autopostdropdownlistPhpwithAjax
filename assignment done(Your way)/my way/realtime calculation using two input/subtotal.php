<?php
session_start();
$total="";
$total1="";
if (isset($_POST['rate'])) {
    $rate = $_POST['rate'];
}
if (isset($_POST['servicecahrege'])) {
    $servicecahrege = $_POST['servicecahrege'];
    $result = ($rate / 100) * $servicecahrege;
}
if(isset($_POST['vat'])) {
    $vat = $_POST['vat'];
    $vat = ($rate / 100) * $vat;
}

if (isset($_POST['discount'])) {
    $discount = $_POST['discount'];
    $total = $rate + $vat + $result - $discount;
    echo $total;

}

if (isset($_POST['rate1'])) {
$rate1 = $_POST['rate1'];
}


if (isset($_POST['servicecahrege1'])) {
$servicecahrege1 = $_POST['servicecahrege1'];
//$result1 = ($rate1 / 100) * $servicecahrege1;
}
if(isset($_POST['vat1'])) {
$vat1 = $_POST['vat1'];
}

if (isset($_POST['discount1'])) {
$discount1 = $_POST['discount1'];
$total = $rate1 + $vat1 + $servicecahrege1 - $discount1;
  $total;

}


?>