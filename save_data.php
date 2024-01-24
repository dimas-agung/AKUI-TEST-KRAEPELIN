<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kraepelinn";

$conn = new mysqli($servername, $username, $password, $dbname);

$nama = $_POST['nama'];
$posisi = $_POST['posisi'];
$tgl_test = $_POST['tgl_test'];
$tgl_lahir = $_POST['tgl_lahir'];
$usia = $_POST['usia'];
$jBenarJSON = $_POST['jBenar'];
$jSalahJSON = $_POST['jSalah'];
$totalBenar = $_POST['totalBenar'];
$totalSalah = $_POST['totalSalah'];

// mendekkode json string menjadi array
$jBenar = json_decode($jBenarJSON);
$jSalah = json_decode($jSalahJSON);

// Convert arrays 
$jBenarString = implode(',', $jBenar);
$jSalahString = implode(',', $jSalah);


$sql = "INSERT INTO test_results (name, position, tgl_test, tgl_lahir, usia, jBenar, jSalah, totalBenar, totalSalah) 
        VALUES ('$nama', '$posisi', '$tgl_test', '$tgl_lahir', '$usia', '$jBenarString', '$jSalahString', '$totalBenar', '$totalSalah')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
