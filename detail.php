<?php 
require 'function.php';

$koneksi = mysqli_connect("localhost", "root", "", "kraepelinn");
$id = $_GET['id'];
$i = 1;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Jawaban</title>
    <meta name="description" content="Tes Kraepelin">
    <meta name="author" content="Clarymond Simbolon" />
    <link rel="shortcut icon" type="image/png" href="akui.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php 
     // Fetch biodata
     $biodataQuery = "SELECT * FROM test_results WHERE id = $id";
     $biodataResult = mysqli_query($koneksi, $biodataQuery);
 
     if (!$biodataResult) {
         die("Error in the query: " . mysqli_error($koneksi));
     }
 
     // Display biodata
     while ($row = mysqli_fetch_assoc($biodataResult)) {
        echo'<div class="container">';
        echo '<div class="card " style="width: 18rem;">
            <div class="card-body">';
        echo "Nama : " . $row['name'] . "<br>";
        echo "Posisi : " . $row['position'] . "<br>";
        echo "Tanggal test : " . $row['tgl_test'];
        echo '</div>
        </div></div>';
    }
    
    ?>
<div class="container"><div class="row"><div class="col-12"><div class="chart">
        <canvas id="myChart"></canvas>
    </div></div></div></div>

    <?php
    

    if (mysqli_connect_error()) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

   

    // Fetch test results
    $testResultsQuery = "SELECT jBenar, jSalah FROM test_results WHERE id = $id";
    $testResultsResult = mysqli_query($koneksi, $testResultsQuery);

    if (!$testResultsResult) {
        die("Error in the query: " . mysqli_error($koneksi));
    }

    $labels = [];
    $data = [];

    echo "<div class='container'>
            <div class='row'>
                <div class='col-12'>";
    echo "<table border='1' id='example-table' class='table table-dark table-striped table-bordered table-hover'>
            <thead>
                <tr>
                    <th>X</th>
                    <th>Y</th>
                    <th>Jumlah benar tiap sub</th>
                    <th>Jumlah salah tiap sub</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = mysqli_fetch_assoc($testResultsResult)) {
        $jBenarArray = explode(',', $row['jBenar']);
        $jSalahArray = explode(',', $row['jSalah']);

        foreach ($jBenarArray as $index => $nilai) {
            $totalJawab = $nilai + $jSalahArray[$index];

            $labels[] = "Sub " . $i;
            $data[] = $totalJawab;

            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $totalJawab . "</td>";
            echo "<td>" . $nilai . "</td>";
            echo "<td>" . $jSalahArray[$index] . "</td>";
            
            echo "</tr>";
            $i++;
            
        }
    }
echo"<tr><td>";
    echo "</tbody></table>";
    echo "</div></div></div>";

    mysqli_close($koneksi);
    ?>
 
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('myChart');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        label: 'Jumlah Jawab',
                        data: <?php echo json_encode($data); ?>,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    }
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
