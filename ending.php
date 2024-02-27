<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Tes</title>
    <meta name="description" content="Tes Kraepelin">
    <meta name="author" content="Clarymond Simbolon" />
    <link rel="shortcut icon" type="image/png" href="logo2.svg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://belajarbro.id/tes-koran/css/gaya-tes-koran-biner.css">
</head>
<style>
        body {
            background-color: #f0f0f0;
        }

        .container {
            margin-top: 100px;
            background-color: #d4edda;
            /* Bootstrap Success Color */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Adding Box Shadow */
        }
    </style>
</head>
<body>
  <div class="container text-center">
        <h1 class="mb-4">Terima Kasih telah mengerjakan Tes Kraepelin</h1>
        <p class="lead">Jawaban tes anda telah terkirim. <br> Silahkan menunggu informasi HR selanjutnya</p>
  </div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script>
       $(document).ready(function () {
        
        let nomorSub = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 1275];

        let jBenarArray = [];

        // Loop dari jBenar1 hingga jBenar50
        for (let i = 1; i <= 50; i++) {
            // Membaca nilai dari localStorage
            let key = 'jBenar' + i;
            let value = localStorage.getItem(key);

            // Memastikan nilai tidak null sebelum ditambahkan ke array
            if (value !== null) {
                jBenarArray.push(parseInt(value) || 0);
            }
        }

        let ditambah = jBenarArray.reduce(function (accumulator, currentValue) {
            return accumulator + currentValue;
        }, 0);

        // Push the ditambah into the array
        jBenarArray.push(ditambah);

        let jSalahArray = [];

        // Loop dari jSalah1 hingga jSalah50
        for (let i = 1; i <= 50; i++) {
            // Membaca nilai dari localStorage
            let key = 'jSalah' + i;
            let value = localStorage.getItem(key);

            // Memastikan nilai tidak null sebelum ditambahkan ke array
            if (value !== null) {

                jSalahArray.push(parseInt(value) || 0);
            }
        }

        let jumlah = jSalahArray.reduce(function (accumulator, currentValue) {
            return accumulator + currentValue;
        }, 0);

        // Push the jumlah into the array
        jSalahArray.push(jumlah);

        let hasilArray = [];
        let maxValue = Number.MIN_VALUE;
        let minValue = Number.MAX_VALUE;
        // Loop dari 1 hingga 50
        for (let i = 1; i <= 50; i++) {
            let jBenarKey = 'jBenar' + i;
            let jBenarValue = parseInt(localStorage.getItem(jBenarKey)) || 0; // Set to 0 if null or NaN

            let jSalahKey = 'jSalah' + i;
            let jSalahValue = parseInt(localStorage.getItem(jSalahKey)) || 0; // Set to 0 if null or NaN

            let hasil = jBenarValue + jSalahValue;
            hasilArray.push(hasil);

            // Memperbarui nilai minimum dan maksimum
            maxValue = Math.max(maxValue, hasil);
            minValue = Math.min(minValue, hasil);
            
        }
        let tambah = hasilArray.reduce(function (accumulator, currentValue) {
            return accumulator + currentValue;
        }, 0);
        
        // Push the sum into the array
        hasilArray.push(tambah);

        let hasilKaliArray = [];

        for (let i = 0; i < 50; i++) {
            hasilKaliArray.push(hasilArray[i] * nomorSub[i] || 0); // Set to 0 if null or NaN
        }

        let sum = hasilKaliArray.reduce(function (accumulator, currentValue) {
            return accumulator + currentValue;
        }, 0);

        // Push the sum into the array
        hasilKaliArray.push(sum);

        let nomorPangkatArray = [1, 4, 9, 16, 25, 36, 49, 64, 81, 100, 121, 144, 169, 196, 225, 256, 289, 324, 361, 400, 441, 484, 529, 576, 625, 676, 729, 784, 841, 900, 961, 1024, 1089, 1156, 1225, 1296, 1369, 1444, 1521, 1600, 1681, 1764, 1849, 1936, 2025, 2116, 2209, 2304, 2401, 2500, 42925];


        var panker = tambah/50;
        pankeri = panker.toFixed(2);
        var tianker = jumlah + 0;
        var janker =  maxValue - minValue;
        
        let meanY = panker;
        let meanX = nomorSub[50]/nomorSub[49];

        let btotal = ((50*sum)-(nomorSub[50]-tambah)) / ((50*nomorPangkatArray[50])- (nomorSub[50]*nomorSub[50]));

        let atotal = meanY - (-btotal)*meanX;

        let x50 = atotal + (btotal*50);
        let x0 = atotal + (btotal*0);

        let xtotal = x50 - x0;
        xhasil = xtotal.toFixed(2);

        var hasilpankeri;
          if (pankeri < 8.257) {
              hasilpankeri = 'Kurang Sekali';
          } else if (pankeri <= 10.367) {
              hasilpankeri = 'Kurang';
          } else if (pankeri <= 12.483) {
              hasilpankeri = 'Sedang';
          } else if (pankeri <= 14.592) {
              hasilpankeri = 'Baik';
          } else if (pankeri >= 14.593) {
              hasilpankeri = 'Baik Sekali';
          } 

        var hasilTianker;
          if (tianker <= 4) {
              hasilTianker = 'Baik Sekali';
          } else if (tianker <= 9) {
              hasilTianker = 'Baik';
          } else if (tianker <= 14) {
              hasilTianker = 'Sedang';
          } else if (tianker <= 24) {
              hasilTianker = 'Kurang';
          } else if (tianker > 25) {
              hasilTianker = 'Kurang Sekali';
          } 

        var hasilJanker;
          if (janker <= 3) {
              hasilJanker = 'Baik Sekali';
          } else if (janker <= 7) {
              hasilJanker = 'Baik';
          } else if (janker <= 10) {
              hasilJanker = 'Sedang';
          } else if (janker <= 14) {
              hasilJanker = 'Kurang';
          } else if (janker >= 15) {
              hasilJanker = 'Kurang Sekali';
          } 

          var hasilxhasil;
          if (xhasil < -2.094) {
              hasilxhasil = 'Kurang Sekali';
          } else if (xhasil <= 0.698) {
              hasilxhasil = 'Kurang';
          } else if (xhasil <= 3.491) {
              hasilxhasil = 'Sedang';
          } else if (xhasil <= 6.283) {
              hasilxhasil = 'Baik';
          } else if (xhasil >= 6.284) {
              hasilxhasil = 'Sangat Baik';
          } 

    
        

        var data = localStorage.getItem('key');

      
        if (data) {
            var parsedData = JSON.parse(data);
            if (parsedData && parsedData.nik) {
                var nik = parsedData.nik;
            } else {
                console.error("Properti 'nik' tidak ditemukan dalam struktur data.");
            }
        } else {
            console.error("Data tidak ditemukan di localStorage.");
        }
        // var nama = parsedData.data.nama;
        // var jabatan_id = parsedData.data.jabatan_id;

        
        $.ajax({
            type: "POST",
            url: "api/api_kraepelin_kirim.php",
            data: {
                nik: nik,
                nomorSub: nomorSub,
                hasilArray: hasilArray,
                hasilKaliArray: hasilKaliArray,
                nomorPangkatArray: nomorPangkatArray,
                jBenarArray: jBenarArray,
                jSalahArray: jSalahArray,
                pankeri: pankeri,
                hasilpankeri: hasilpankeri,
                tianker: tianker,
                hasilTianker: hasilTianker,
                janker: janker,
                hasilJanker: hasilJanker,
                xhasil: xhasil,
                hasilxhasil: hasilxhasil
            },
            success: function (response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Your test answers have been successfully sent',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed || result.isDismissed) {
                    // window.location.href = 'index.php';
                    }
                });
            },
                error: function (response) {
                    Swal.fire({
                    title: 'Error!',
                    text: 'Failed to send data to the server. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                    });
                }
        });
    });
    </script>
</body>
</html>