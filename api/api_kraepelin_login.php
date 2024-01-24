<?php
require 'url_api.php';
$nik = $_GET['nik'];

$url = $url_api . 'api/Pelamar?nik=' . $nik;
// $result
$data = file_get_contents($url);

echo $data;
?>