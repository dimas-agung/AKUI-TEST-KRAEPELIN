<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kraepelin Test</title>
  <link rel="shortcut icon" type="image/png" href="logo2.svg" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap");

    * {
      margin: 0px;
      padding: 0px;
      font-family: "poppins", sans-serif;
    }

    section {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      width: 100%;
      background-image: url("psy.jpg");
      background-size: cover;
    }


    @media only screen and (max-width: 768px) {
      section {
        background-position: center;
      }
    }

    .wrapper {
      border: 2px solid rgb(255, 255, 255);
      border-radius: 5%;
      position: relative;
      height: 250px;
      width: 400px;
      background-color: rgba(255, 255, 255, 0);
      backdrop-filter: blur(20px);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    h2 {
      margin-top: 1em;
      font-size: 2em;
      color: #000000;
      text-align: center;
    }

    .inputbox {
      position: relative;
      margin-bottom: 30px;
      width: 310px;
      border-bottom: 2px solid #000000;
    }

    .inputbox label {
      position: absolute;
      top: 50%;
      left: 5px;
      transform: translateY(-50%);
      color: #000000;
      font-size: 1em;
      pointer-events: none;
      transition: 0.1s;
    }

    input:focus~label,
    input:valid~label {
      top: 5px;
    }

    .inputbox input {
      width: 100%;
      height: 50px;
      background: transparent;
      border: none;
      outline: none;
      font-size: 1em;
      padding: 0 35px 0 5px;
      color: #000000;
      font-size: medium;
      user-select: none;
    }

    button {
      width: 100%;
      height: 40px;
      border-radius: 40px;
      border: none;
      outline: none;
      cursor: pointer;
      font-size: 1rem;
      font-weight: 600;
      color: white;
      background-color: rgb(0, 0, 0);
      transition: 100ms;
    }

    button:hover {
      background-color: #ffffff;
      color: #000000;
    }
  </style>
</head>

<body>
  <section>
    <div class="wrapper">
      <form action="" method="post">
        <h2>Kraepelin Test</h2>
        <div class="inputbox" id="nik">
          <input type="text" id="ussr" required class="input" name="nik" />
          <label for="ussr">NIK </label>
        </div>
        <button type="button" class="btn" id="submitBtn">Submit</button>
        <!-- Display error message -->
        <div class="error-message" id="errorMessage"></div>
      </form>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    localStorage.clear();
    $(document).ready(function () {
      $("#submitBtn").on("click", function () {
        var nik = $("#ussr").val();
        if (nik.trim() !== "") {
          $.ajax({
            url: "api/api_kraepelin_login.php",
            type: "GET",
            data: { nik: nik },
            dataType: "json",
            success: function (data) {
              if (data.status === 'success' && data.data && data.data.nama) {
                var nama = data.data.nama;
                localStorage.setItem('nama', nama);
                $.ajax({
                  url: "api/api_undangan_psikotes.php",
                  type: "GET",
                  data: { nik: nik },
                  dataType: "json",
                  success: function (data) {
                    if (data && Array.isArray(data) && data.length > 0) {
                      var dataItem = data[0]; 
                      if (dataItem && dataItem.tanggal && dataItem.jam_mulai && dataItem.jam_selesai) {
                          var tanggalData = dataItem.tanggal;
                          var jamMulaiParts = dataItem.jam_mulai.split(":");
                          var jamSelesaiParts = dataItem.jam_selesai.split(":");
                          if (jamMulaiParts.length === 3 && jamSelesaiParts.length === 3) {
                              var startHour = parseInt(jamMulaiParts[0]);
                              var startMinute = parseInt(jamMulaiParts[1]);
                              var endHour = parseInt(jamSelesaiParts[0]);
                              var endMinute = parseInt(jamSelesaiParts[1]);
                              var currentDate = new Date();
                              var currentDateFormatted = currentDate.toISOString().slice(0, 10);
                              var currentTime = currentDate.getHours();
                              var tolerance = 0; 
                              if (currentDateFormatted === tanggalData && currentTime >= startHour - tolerance && currentTime < endHour + tolerance) {
                                  localStorage.setItem('key', JSON.stringify(dataItem)); 
                                  window.location.href = "instruksi.php";
                              } else {
                                  var formattedStartTime = ("0" + startHour).slice(-2) + ":" + ("0" + startMinute).slice(-2);
                                  var formattedEndTime = ("0" + endHour).slice(-2) + ":" + ("0" + endMinute).slice(-2);
                                  Swal.fire({
                                      icon: 'warning',
                                      title: 'Oops...',
                                      text: 'Tes ini hanya bisa dilakukan pada ' + tanggalData + ', mulai pukul ' + formattedStartTime + ' sampai ' + formattedEndTime + '.',
                                  });
                              }
                          } else {
                              Swal.fire({
                                  icon: 'error',
                                  title: 'Format jam tidak valid',
                                  text: 'Format jam mulai atau jam selesai tidak valid. Pastikan formatnya adalah jam:menit:detik.',
                                  confirmButtonText: 'OK'
                              });
                          }
                      } else {
                          Swal.fire({
                              icon: 'error',
                              title: 'Data tidak lengkap',
                              text: 'Data tidak lengkap untuk tanggal, jam mulai, atau jam selesai.',
                              confirmButtonText: 'OK'
                          });
                      }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Data tidak valid',
                            text: 'Data tidak valid atau tidak ada data yang tersedia.',
                            confirmButtonText: 'OK'
                        });
                    }
                  },
                  error: function (error) {
                    Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Terjadi kesalahan saat memuat data',
                    });
                  }
                });
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'NIK yang kamu masukkan mungkin tidak terdaftar atau salah',
                });
              }
            },
            error: function (error) {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terjadi kesalahan saat memuat data',
              });
            }
          });
        } else {
          $("#errorMessage").text("NIK Tidak Boleh Kosong");
        }
      });
    });
  </script>
</body>
</html>