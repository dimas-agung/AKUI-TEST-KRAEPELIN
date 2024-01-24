<?php
session_start();
// if (!$_SESSION['nama']) {
//     header("Location: index.php");
//     exit;
//   }
// $nama = $_SESSION['nama'];
// $posisi = $_SESSION['posisi'];
// $tgl = $_SESSION['tanggal_tes'];
// $tgl_lahir = $_SESSION['tanggal_lahir'];
// $usia = $_SESSION['usia'];
?>

<!DOCTYPE html>
<html lang="id-ID">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Kraepelin</title>
        <meta name="description" content="Tes Kraepelin">
    <meta name="author" content="Clarymond Simbolon" />
    <link rel="shortcut icon" type="image/png" href="logo2.svg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121206783-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-121206783-1');
    </script>
</head>

<body>
<div style="display: flex; flex-direction: column; height: 90vh;">
        <div class="container-fluid" style="flex-grow: 1;">
            <div class="bungkus" style="height: 100%;">
                <div class="card shadow-sm" style="height: 100%;">
                    <div class="card-body">
                        <img id="logo" class="logo-non-tes"
                            src="akui.png"
                             />
                        <div id="petunjuk" class="kelompok kelompok-non-tes d-none">
                            <h2 class="judul">Tes Koran</h2>
                            <p>Petunjuk</p>
                            <p class="aturan" style="margin-top: 30px; margin-bottom: 25px">Tentukan angka satuan dari
                                hasil penjumlahan 2 buah angka yang diberikan.</p>
                            <div style="display: flex;">
                                <div id="operasi" style="margin-right: 10px;">
                                    <div class="judul-tabel-contoh">operasi</div>
                                    <div>
                                        <table class="table" style="font-size: 23px;">
                                            <tbody>
                                                <tr>
                                                    <td width=35>1</td>
                                                    <td width=35>+</td>
                                                    <td width=35>7</td>
                                                    <td width=20>=</td>
                                                    <td width=60 style="text-align: right"><span
                                                            style="background: rgba(255, 118, 117, 0.3); display: inline-block; padding: 0px 3px; border-radius: 5px">8</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>+</td>
                                                    <td>4</td>
                                                    <td>=</td>
                                                    <td style="text-align: right">1<span
                                                            style="background: rgba(255, 118, 117, 0.3); display: inline-block; border-radius: 5px; padding: 0px 3px">0</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>+</td>
                                                    <td>9</td>
                                                    <td>=</td>
                                                    <td style="text-align: right">1<span
                                                            style="background: rgba(255, 118, 117, 0.3); display: inline-block; border-radius: 5px; padding: 0px 3px">7</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="hasil-operasi" style="flex-grow: 1;">
                                    <div class="judul-tabel-contoh">hasil</div>
                                    <div>
                                        <table class="table" style="font-size: 23px; text-align: center">
                                            <tbody>
                                                <tr>
                                                    <td>8</td>
                                                </tr>
                                                <tr>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center">
                                <button id="selesai-petunjuk" class="lanjut text-center mt-4">Lanjut</button>
                            </div>
                        </div>
                        <div id="waktu" class="kelompok d-none kelompok-non-tes">
                            <h2 class="judul">Tes Koran</h2>
                            <p>Pilih Waktu</p>
                            <div id="pilihan-waktu" style="margin-top: 35px;">
                                <!-- <button data-waktu=10>10 detik</button> -->
                                <button data-waktu=15 class="waktu-dipilih">15 detik</button>
                                <!-- <button data-waktu=120>2 menit</button>
                                <button data-waktu=300>5 menit</button>
                                <button data-waktu=600>10 menit</button>
                                <button data-waktu=900>15 menit</button>
                                <button data-waktu=1800>30 menit</button>
                                <button data-waktu=3600>60 menit</button> -->
                            </div>
                            <div class="mt-5" style="text-align: center">
                                <svg id="kembali-waktu" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                                    <line x1="19" y1="12" x2="5" y2="12"></line>
                                    <polyline points="12 19 5 12 12 5"></polyline>
                                </svg>
                                <button id="selesai-waktu" class="lanjut">Lanjut</button>
                            </div>
                        </div>
                        <div id="hitung-mundur" class="kelompok  kelompok-non-tes"
                            style="position: relative; height: 100%;">
                            <h2 class="judul text-center" style="margin-top: 10px;">Anda diarahkan ke halaman selanjutnya....</h2>
                            <p id="mundur">3</p>
                        </div>
                        <div id="tes" class="kelompok  d-none"
                            style="display: flex; flex-direction: column; height: 100%">
                            <div style="position:relative">
                                <h1 class="judul">Tes Kraepelin</h1>
                                <div style="position: absolute; right: 0; top: 50px">
                                    <div style="vertical-align: top">
                                        <div style="display: inline-block;">
                                            <!-- <div
                                                style="display: block; background-color: #1dd1a1; color: #ffffff; padding: 5px 10px; margin-bottom: 5px; border: 1px solid #57606f; border-radius: 10px; font-weight: bold; min-width: 70px; text-align: center">
                                                <i class="lni lni-checkmark"
                                                    style="font-size: 20px; display:inline-block;margin-right: 3px"></i> -->
                                                <span id="jumlah-benar" class="d-none"></span>
                                            <!-- </div> -->
                                            <!-- <div
                                                style="display: block; background-color: #ff6b6b; color: #ffffff;  padding: 5px 10px; border: 1px solid #57606f; border-radius: 10px; font-weight: bold; margin-bottom: 5px; text-align: center">
                                                <i class="lni lni-close"
                                                    style="display:inline-block;margin-right: 3px"></i> -->
                                                <span id="jumlah-salah" class="d-none"></span>
                                            <!-- </div> -->
                                            <div id="demo"
                                                style="display: block; background-color: #57606f; color: #f5f6fa;  padding: 5px 10px; border: 1px solid #57606f; border-radius: 10px; font-weight: bold; text-align: center;  margin-top:15px;">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tampil-nomor">
                                <div><i class="lni lni-plus"></i></div>
                                <div><i class="lni lni-plus"></i></div>
                                <p></p>
                                <p></p>
                                <p></p>
                                <p></p>
                                <p></p>
                            </div>
                            <div id="tombol-nomor">
                                <div onclick="buttonClicked(0)">1</div>
                                <div onclick="buttonClicked(1)">2</div>
                                <div onclick="buttonClicked(2)">3</div>
                                <div onclick="buttonClicked(3)">4</div>
                                <div onclick="buttonClicked(4)">5</div>
                                <div onclick="buttonClicked(5)">6</div>
                                <div onclick="buttonClicked(6)">7</div>
                                <div onclick="buttonClicked(7)">8</div>
                                <div onclick="buttonClicked(8)">9</div>
                                <p ><i class="lni lni-line-dotted"></i></p>
                                <div onclick="buttonClicked(-1)">0</div>
                                <p ><i class="lni lni-line-dotted"></i></p>
                            </div>
                        </div>
                        <div id="hasil" class="kelompok kelompok-non-tes d-none">
                            <h2 class="judul" style="position: relative">Tes Koran<span id="hasil-waktu-tes"
                                    style="display: inline-block; position: absolute; bottom: -18px; left: 0;font-size: 14px; opacity: 0.5; font-weight: normal"></span>
                            </h2>
                            <p style="margin-top: 35px; margin-bottom: 10px">Hasil (<span
                                    id="hasil-waktu-tes-selesai">-</span>)</p>
                            <div class="row">
                                <div class="col" style="padding-right: 0">
                                    <div
                                        style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100%;">
                                        <p id="hasil-persen-benar">-</p>
                                        <p style="font-size: 13px; text-align: right; opacity: 0.5; margin-bottom: 0;">
                                            jawaban benar</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div id="tabel-hasil">
                                        <div style="display: flex; margin-bottom: 3px">
                                            <div style="flex-grow: 1;">
                                                <div style="display: flex; align-items: center; height: 100%;">
                                                    <p>Benar</p>
                                                </div>
                                            </div>
                                            <p id="hasil-benar" class="hasil-poin"
                                                style="background: rgba(29, 209, 161, 0.3);">-</p>
                                        </div>
                                        <div style="display: flex; margin-bottom: 3px">
                                            <div style="flex-grow: 1;">
                                                <div style="display: flex; align-items: center; height: 100%;">
                                                    <p>Salah</p>
                                                </div>
                                            </div>
                                            <p id="hasil-salah" class="hasil-poin"
                                                style="background: rgba(255, 107, 107, 0.3);">-</p>
                                        </div>
                                        <div style="display: flex;">
                                            <div style="flex-grow: 1;">
                                                <div style="display: flex; align-items: center; height: 100%;">
                                                    <p>Total</p>
                                                </div>
                                            </div>
                                            <p id="hasil-total" class="hasil-poin"
                                                style="background: rgba(84, 160, 255, 0.3);">-</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p style="margin-top: 15px;">Grafik</p>
                            <div id="hasil-pilihan-waktu" style="margin-bottom: 15px;">
                                <button data-waktu-hasil=5>5 detik</button>
                                <button data-waktu-hasil=30 class="waktu-dipilih">30 detik</button>
                                <button data-waktu-hasil=45>45 detik</button>
                                <button data-waktu-hasil=60>1 menit</button>
                                <button data-waktu-hasil=75>75 detik</button>
                                <button data-waktu-hasil=90>90 detik</button>

                            </div>
                            <div id="wr-chart">
                                <canvas id="c-hasil"></canvas>
                            </div>
                            <div style="text-align: center; margin-top: 15px">
                                <button id="tombol-ulangi-tes" class="btn btn-primary">Ulangi Tes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-batal-tes" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 30px; padding: 10px;">
                    <div class="modal-body">
                        <p class="fw-bold" style="font-size: 20px;">Apakah kamu ingin keluar?</p>
                        <p>Jika kamu keluar sekarang, data yang ada pada saat ini akan hilang.</p>
                        <div style="text-align: right; margin-top: 30px">
                            <button class="btn btn-primary tombol-tes" id="tombol-tes-tidak-batal"
                                data-bs-dismiss="modal">Tidak jadi</button>
                            <button class="btn btn-danger tombol-tes" id="tombol-tes-batal"
                                data-bs-dismiss="modal">Keluar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.umd.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            let kelompok = document.getElementsByClassName("kelompok");
            let logo = document.getElementById("logo");
            let pilihanWaktu = document.querySelectorAll("#pilihan-waktu button");
            let mundur = document.getElementById("mundur");
            let timer = document.getElementById("timer");
            // let waktu = 60;
            let waktu = 19;
            let waktuJalan = 0;
            // let riwayat = [
            //     [1, "b"],
            //     [2, "s"],
            //     [2, "b"],
            //     [1, "b"],
            //     [2, "b"],
            //     [3, "b"],
            //     [5, "b"],
            //     [5, "b"],
            //     [5, "b"],
            //     [6, "b"],
            //     [6, "b"],
            //     [8, "b"],
            //     [10, "s"],
            //     [11, "s"],
            // ];
            let riwayat = [];
            let riwayatLabel = [];
            let riwayatBenar = [];
            let riwayatSalah = [];
            // const jBenar = document.getElementById("jumlah-benar");
            // const jSalah = document.getElementById("jumlah-salah");

            document.getElementById("selesai-petunjuk").addEventListener("click", () => {
                pindah('waktu');
            });
            document.getElementById("selesai-waktu").addEventListener("click", () => {
                pindahMundur();
            });
            // document.getElementById("kembali-waktu").addEventListener("click", () => {
            //     pindah("petunjuk");
            // });
            // document.getElementById("tombol-tes-batal").addEventListener("click", () => {
            //     pindah("petunjuk");
            //     keluar();
            // });
            // document.getElementById("tombol-selesai").addEventListener("click", () => {
            //     kirim();
            // });
            document.getElementById("tombol-ulangi-tes").addEventListener("click", () => {
                pindah("petunjuk");
            });

            document.querySelector("#tampil-nomor p:nth-of-type(1)").innerHTML = 8; // Replace 5 with your desired number
            document.querySelector("#tampil-nomor p:nth-of-type(2)").innerHTML = 8; // Replace 3 with your desired number
            document.querySelector("#tampil-nomor p:nth-of-type(3)").innerHTML = 6; // Replace 7 with your desired number
            document.querySelector("#tampil-nomor p:nth-of-type(4)").innerHTML = 2; // Replace 2 with your desired number
            document.querySelector("#tampil-nomor p:nth-of-type(5)").innerHTML = 7; // Replace 9 with your desired number

            // Variable jBenar dan jSalah
            // let jBenarPretes1 = 0;
            // let jSalahPretes1 = 0;

            // Fungsi untuk update tampilan jumlah benar dan salah
            // function updateTampilanJumlah() {
            //     document.getElementById("jumlah-benar").innerHTML = jBenarPretes1;
            //     document.getElementById("jumlah-salah").innerHTML = jSalahPretes1;
            // }

            // Fungsi untuk menyimpan data ke localStorage
            // function simpanKeLocalStorage() {
            //     localStorage.setItem('jBenarPretes1', jBenarPretes1);
            //     localStorage.setItem('jSalahPretes1', jSalahPretes1);
            // }

            // Fungsi untuk mengambil data dari localStorage
            // function ambilDariLocalStorage() {
            //     const jBenarLocal = localStorage.getItem('jBenarPretes1');
            //     const jSalahLocal = localStorage.getItem('jSalahPretes1');

            //     // Periksa apakah data tersedia di localStorage
            //     if (jBenarLocal !== null && jSalahLocal !== null) {
            //        pretes1 = parseInt(Local);
            //         pretes1 = parseInt(Local);
            //         updateTampilanJumlah();
            //     }
            // }

            // Panggil fungsi untuk mengambil data dari localStorage
            // ambilDariLocalStorage();

            document.getElementById("selesai-petunjuk").addEventListener("click", () => {
                pindah('waktu');
            });

            document.getElementById("selesai-waktu").addEventListener("click", () => {
                pindahMundur();
            });
            //akhirLocalStorage
            function pindah(jenis) {
                for (let i = 0; i < kelompok.length; i++) {
                    kelompok[i].classList.add("d-none");
                }
                document.getElementById(jenis).classList.remove("d-none");
                if (jenis == "tes") {
                    logo.classList.remove("logo-non-tes");
                    logo.classList.add("logo-tes");
                } else {
                    logo.classList.remove("logo-tes");
                    logo.classList.add("logo-non-tes");
                }
            }

            document.querySelectorAll("#pilihan-waktu button").forEach((btn) => {
                btn.addEventListener("click", (e) => {
                    for (let i = 0; i < pilihanWaktu.length; i++) {
                        pilihanWaktu[i].classList.remove("waktu-dipilih");
                    }
                    e.target.classList.add("waktu-dipilih");
                    waktu = e.target.getAttribute("data-waktu");
                });
            });

            function pindahMundur() {
                mundur.innerHTML = 3;
                hitungMundur(2);
            }

            function pindahTes() {
                waktuJalan = 0;
                riwayat = [];

                pindah("tes");
                // timer.innerHTML = (`0${waktu / 60}`).slice(-2) + ":00";
                sisaWaktu(waktu - 1);
            }

            function hitungMundur(x) {
                pindah("hitung-mundur");
                let countDown = x;
                mundur.innerHTML = countDown;

                let go = setInterval(() => {
                    countDown--;
                    mundur.innerHTML = countDown;

                    if (countDown < 0) {
                        clearInterval(go);
                        pindahTes();
                    }
                }, 1000);
            }
            hitungMundur(3);
            var count = 19;

            function decrement() {
                document.getElementById('demo').innerHTML = count;
                count--;

                if (count < 0) {
                    document.location.href = 'pretes3.php'
                } else {
                    setTimeout(decrement, 1000); // Call the function every second (1000 milliseconds) until count reaches 0
                }
            }

            // Call the function to start the countdown


            decrement();
            function sisaWaktu(x) {
                goSisaWaktu = setInterval(() => {
                    waktuJalan++;
                    // console.log(waktuJalan);
                    let menit = (`0${Math.floor(x / 60)}`).slice(-2);
                    let detik = (`0${x - (Math.floor(x / 60) * 60)}`).slice(-2);
            //        timer.innerHTML = `${menit}:${detik}`;
                    x--;
                    if (x < 0) {
                        clearInterval(goSisaWaktu);
                        kirim();
                    }
                }, 1000);
            }

            function keluar() {
                clearInterval(goSisaWaktu);
                pindah("petunjuk");
            }

            function kirim() {
                clearInterval(goSisaWaktu);
                pindah("hasil");
                tampilHasil();
            }

            function tampilHasil() {
                let total = riwayat.length;
                let benar = 0;
                let salah = 0;
                for (const r of riwayat) {
                    if (r[1] == "b") {
                        benar++;
                    } else {
                        salah++;
                    }
                }
                document.getElementById("hasil-waktu-tes").innerHTML = (waktu / 60) + " menit";
                document.getElementById("hasil-benar").innerHTML = benar;
                document.getElementById("hasil-salah").innerHTML = salah;
                document.getElementById("hasil-total").innerHTML = total;
                document.getElementById("hasil-persen-benar").innerHTML = (isNaN(((benar / total) * 100).toFixed(2)) ? 0 : (((benar / total) * 100).toFixed(2))) + "%";
                let waktuSelesai = "";
                if (waktuJalan > 59) {
                    document.getElementById("hasil-waktu-tes-selesai").innerHTML = Math.floor(waktuJalan / 60) + " menit " + (waktuJalan - (Math.floor(waktuJalan / 60) * 60)) + " detik";
                } else {
                    document.getElementById("hasil-waktu-tes-selesai").innerHTML = waktuJalan + " detik";
                }
                document.querySelectorAll("#hasil-pilihan-waktu button").forEach(hpwb => {
                    hpwb.classList.remove("d-none");
                    hpwb.classList.remove("waktu-dipilih");
                    if (hpwb.getAttribute("data-waktu-hasil") == "5") {
                        hpwb.classList.add("waktu-dipilih");
                    }
                });
                if (waktu > 60) {
                    document.querySelector("#hasil-pilihan-waktu button[data-waktu-hasil='1']").classList.add("d-none");
                } else {
                    document.querySelector("#hasil-pilihan-waktu button[data-waktu-hasil='60']").classList.add("d-none");
                }
                tampilChart(5, "waktu");
            }
            tampilHasil();

            function tampilChart(x, w) {
                riwayatLabel = [];
                riwayatBenar = [];
                riwayatSalah = [];
                if (w == "waktu") {
                    for (let i = 0; i < (waktu / x); i++) {
                        if (x == 60) {
                            riwayatLabel[i] = "1 menit ke-" + (i + 1);
                        } else {
                            if (x == 1) {
                                riwayatLabel[i] = "Detik ke-" + (i + 1);
                            } else {
                                riwayatLabel[i] = x + " detik ke-" + (i + 1);
                            }
                        }
                        riwayatBenar[i] = 0;
                        riwayatSalah[i] = 0;
                    }
                    for (const r of riwayat) {
                        if (r[1] == "b") {
                            riwayatBenar[Math.floor(r[0] / x)]++;
                        } else {
                            riwayatSalah[Math.floor(r[0] / x)]++;
                        }
                    }
                }
                // console.log(riwayatBenar);
                // console.log(riwayatSalah);

                const dataChartRiwayat = {
                    labels: riwayatLabel,
                    datasets: [{
                        label: "Benar",
                        backgroundColor: '#00a8ff',
                        borderColor: '#00a8ff',
                        borderCapStyle: 'round',
                        data: riwayatBenar,
                        tension: 0.3,
                        borderWidth: 4,
                        pointRadius: 0,
                        pointHoverRadius: 6,
                        pointHoverBackgroundColor: '#ffffff',
                        pointHoverBorderWidth: 3
                    }, {
                        label: "Salah",
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        borderCapStyle: 'round',
                        data: riwayatSalah,
                        tension: 0.3,
                        borderWidth: 4,
                        pointRadius: 0,
                        pointHoverRadius: 6,
                        pointHoverBackgroundColor: '#ffffff',
                        pointHoverBorderWidth: 3
                    }]
                };
                document.getElementById("wr-chart").innerHTML = `<canvas id="c-hasil"></canvas>`;
                const myChart = new Chart(
                    document.getElementById('c-hasil').getContext("2d"), {
                    type: 'line',
                    data: dataChartRiwayat,
                    options: {
                        responsive: true,
                        interaction: {
                            mode: 'index',
                            intersect: false,
                        },
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom',
                                labels: {
                                    boxWidth: 10,
                                    usePointStyle: true,
                                    pointStyle: 'line',
                                    padding: 15,
                                }
                            },
                            tooltip: {
                                boxWidth: 8,
                                boxHeight: 8,
                                boxPadding: 5,
                                padding: {
                                    x: 15,
                                    y: 8
                                },
                                callbacks: {
                                    label: function (tooltipItem) {
                                        return tooltipItem.dataset.label + " : " + tooltipItem.raw.toLocaleString("id-ID");
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                ticks: {
                                    display: false
                                },
                                grid: {
                                    display: false,
                                    drawBorder: false,
                                }
                            },
                            y: {
                                ticks: {
                                    display: false
                                },
                                grid: {
                                    display: false,
                                    drawBorder: false
                                }
                            }
                        },
                        layout: {
                            padding: {
                                top: 5,
                                bottom: 20,
                                left: -3,
                                right: 3
                            }
                        }
                    }
                }
                );
            }

            document.querySelectorAll("#hasil-pilihan-waktu button").forEach(hpw => {
                hpw.addEventListener("click", () => {
                    document.querySelectorAll("#hasil-pilihan-waktu button").forEach(hpwb => {
                        hpwb.classList.remove("waktu-dipilih");
                    });
                    hpw.classList.add("waktu-dipilih");
                    tampilChart(hpw.getAttribute("data-waktu-hasil"), "waktu");
                });
            });
            //localstorage            
            document.querySelectorAll("#tombol-nomor div").forEach((tn) => {
                    

                    
                tn.addEventListener("click", async () => {
                    //akhirlLocalStrorage                    
                    const no1 = document.querySelector("#tampil-nomor p:nth-of-type(1)");
                    const no2 = document.querySelector("#tampil-nomor p:nth-of-type(2)");
                    const no3 = document.querySelector("#tampil-nomor p:nth-of-type(3)");
                    const add1 = document.querySelector("#tampil-nomor div:nth-of-type(1)");
                    //localstorage                   
                    // if (parseInt(no2.innerHTML) + parseInt(no3.innerHTML) > 9) {
                    //     if (((parseInt(no2.innerHTML) + parseInt(no3.innerHTML)) - 10) == parseInt(tn.innerHTML)) {
                    //         pretes1++;
                    //         riwayat.push([waktuJalan, "b"]);
                    //     } else {
                    //        pretes1++;
                    //         riwayat.push([waktuJalan, "s"]);
                    //     }
                    // } else {
                    //     if ((parseInt(no2.innerHTML) + parseInt(no3.innerHTML)) == parseInt(tn.innerHTML)) {
                    //         pretes1++;
                    //         riwayat.push([waktuJalan, "b"]);
                    //     } else {
                    //        pretes1++;
                    //         riwayat.push([waktuJalan, "s"]);
                    //     }
                    // }
                    //akhirLocalstorage
                    // console.log(riwayat);
                    if (no1) {
                        no1.remove();
                    }
                    add1.remove();
                    let nodes = await document.createElement("p");
                    // let textnodes = await document.createTextNode(Math.floor(Math.random() * 10));
                    // let textnodes = document.createTextNode(9, 4, 2, 4, 6, 2, 4, 5, 9, 4, 2, 4, 6, 5, 2, 8, 6, 4, 3, 7, 5, 1, 2, 2, 8, 3, 0);
                    // Buat array dengan angka yang diinginkan
                    const angkaArray = [9, 9, 8, 5, 1, 9, 5, 5, 1, 6, 5];

                    // Dapatkan elemen #tampil-nomor
                    const tampilNomorElement = document.getElementById("tampil-nomor");

                    // Iterasi melalui array dan buat elemen <p> untuk setiap angka
                    angkaArray.forEach(angka => {
                        let pElement = document.createElement("p");
                        pElement.textContent = angka;
                        tampilNomorElement.appendChild(pElement);
                    });

                    let buttonArrays = [];
                    function buttonClicked(index) {
                    buttonArrays.push(index + 1);
                    localStorage.setItem('pretes2', buttonArrays);
                    }

                    document.getElementById("tampil-nomor").appendChild(nodes);
                    document.getElementById("tampil-nomor").appendChild(add1);
                    //LocalStorage
                    // updateTampilanJumlah();

                    // // Simpan data ke localStorage setiap kali ada perubahan
                    // simpanKeLocalStorage();
                    //akhirLocalstorage  

                });
            });
        });
    
        
       
    </script>
  <script src="scrippt.js"></script>
</body>

</html>