
<?php
require 'url_api.php';

$nik = $_GET['nik'];
$url = $url_api . 'api/Undangan-Psikotest?nik=' . $nik;

$data = @file_get_contents($url);

if ($data === false) {
    echo "Gagal mengambil data dari URL: $url";
} else {
    echo $data;
}
?>
