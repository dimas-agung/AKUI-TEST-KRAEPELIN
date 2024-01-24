<?php 
require 'function.php';

$conn = query("SELECT * FROM test_results");
$i =1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <meta name="description" content="Tes Kraepelin">
    <meta name="author" content="Clarymond Simbolon" />
    <link rel="shortcut icon" type="image/png" href="akui.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">
    <script src="table2excel.js"></script>
    <style>
        *{
            margin:0;
            padding:0;
            font-family:'Poppins';
        }
        h2{
            text-align: center;
        }
        .alert {
            padding: 20px;
            background-color: #f44336;
            color: white;
            opacity: 1;
            transition: opacity 0.6s;
            margin-bottom: 15px;
        }

            .alert.success {background-color: #04AA6D;}

            .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
            }

            .closebtn:hover {
            color: black;
            }
            
    </style>
</head>
<body>

    <div >
        <h2>INI ADALAH HALAMAN ADMIN</h2>
    <table border="1" id="example-table" class="table table-dark  table-striped table-bordered table-hover ">
    <thead>
            <tr>
                <th>No</th>
              <th>Nama</th>
              <th>Posisi</th>
              <th>Tanggal tes</th>
              <th>Tanggal lahir</th>
              <th>Usia</th>
              <th>Detail benar dan salah</th>
              
              <th>Total benar</th>
              <th>Total salah</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($conn as $row ) :?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $row['name']?></td>
                <td><?= $row['position']?></td>
                <td><?= $row['tgl_test']?></td>
                <td><?= $row['tgl_lahir']?></td>
                <td><?= $row['usia']?></td>
                <td><a href="detail.php?id=<?= $row['id'] ?>">Detail</a></td>
                
                <td><?= $row['totalBenar']?></td>
                <td><?= $row['totalSalah']?></td>
            </tr>
            <?php $i++ ?>
    <?php endforeach; ?>
    
        </tbody>   
       
</div>
<button id="download" class="btn btn-success mb-3" >export to excel</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
document.getElementById('download').addEventListener('click', function () {
            var table2excel = new Table2Excel();
            table2excel.export(document.querySelectorAll("#example-table"));
        });</script>
        <script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
</body>
</html>