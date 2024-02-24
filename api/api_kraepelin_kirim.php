<?php
require 'url_api.php';

$url = $url_api . 'api/Kraepelin/Store';

$data = array(
    'nik' => $_POST['nik'],
    'nomor' => json_encode($_POST['nomorSub']),
    'hasil' => json_encode($_POST['hasilArray']),
    'hasil_kali' => json_encode($_POST['hasilKaliArray']),
    'nomor_pangkat' => json_encode($_POST['nomorPangkatArray']),
    'benar' => json_encode($_POST['jBenarArray']),
    'salah' => json_encode($_POST['jSalahArray']),
    'panker' => $_POST['pankeri'],
    'hasil_panker' => $_POST['hasilpankeri'],
    'tianker' => $_POST['tianker'],
    'hasil_tianker' => $_POST['hasilTianker'],
    'janker' => $_POST['janker'],
    'hasil_janker' => $_POST['hasilJanker'],
    'total' => $_POST['xhasil'],
    'hasil_total' => $_POST['hasilxhasil'],
    
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($httpCode != 200) {
    echo 'HTTP Error: ' . $httpCode;
}

curl_close($ch);

// Proses respons
echo $response;
?>