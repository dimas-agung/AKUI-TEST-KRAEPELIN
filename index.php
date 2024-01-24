<?php
session_start();
if(isset($_POST['submit'])){
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['posisi'] = $_POST['posisi'];
    $_SESSION['tanggal_tes'] = $_POST['tanggal_tes'];
    $_SESSION['tanggal_lahir'] = $_POST['tanggal_lahir'];
    $_SESSION['usia'] = $_POST['usia'];
    

    header("Location: instruksi.php");
    exit;
}

date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- <link rel="stylesheet" href="style.css" /> -->
  <!-- Add this in the <head> section of your HTML -->

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <title>Login</title>
</head>
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
    background-image: url("5767946.jpg");
    background-size: cover;
  }

  .wrapper {
    border: 2px solid rgb(255, 255, 255);
    border-radius: 5%;
    position: relative;
    height: 250px;
    width: 400px;
    background-color: rgb(255, 255, 255, 0);
    backdrop-filter: blur(20px);
    display: flex;
    justify-content: center;
    align-items: center;
  }

  h2 {
    margin-top: 1em;
    font-size: 2em;
    color: rgb(0, 0, 0);
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

  #pendidikan {
    top: -60%;
  }

  #tgl {
    top: -0%;
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

  .inputbox ion-icon {
    position: absolute;
    right: 5px;
    font-size: 1.2em;
    top: 20px;
    color: #000000;
  }

  .forget {
    margin: -15px 0 15px;
    font-size: 0.9em;
    color: #000000;
    display: flex;
    justify-content: center;
  }

  .forget label input {
    margin-right: 3px;
  }

  .forget label a {
    color: #ffffff;
    text-decoration: none;
  }

  .forget label a:hover {
    text-decoration: underline;
    color: #000000;
  }

  button {
    text-anchor: middle;
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

  .register {
    font-size: 0.9em;
    color: #000000;
    text-align: center;
    margin: 25px 0 10px;
  }

  .register p a {
    color: #ffffff;
    text-decoration: none;
  }

  .register p a:hover {
    color: #000000;
    text-decoration: underline;
  }

  .loginwith {
    text-align: center;
    margin: 10px 5px;
  }

  .loginwith ion-icon {
    font-size: 2em;
    color: #000000;
    margin: 5px 5px;
    padding-left: 10px;
    padding-right: 10px;
  }

  .loginwith ion-icon:hover {
    font-size: 2.2em;
    transition: 0.1s;
  }

  footer {
    display: flex;
    justify-content: center;
    margin-top: 20px;
  }

  select {
    background-color: transparent;
    outline: none;
    border: none;
    font-size: medium;
  }
</style>

<body>
  <section>
    <div class="wrapper">
      <form action="" method="post">
        <h2>KRAEPELIN Test</h2>
        <div class="inputbox" id="nik">
          <input type="text" id="ussr" required class="input" name="nik" />
          <label for="ussr">NIK </label>
        </div>
        <button type="button" class="btn" id="submitBtn">submit</button>
        <!-- Display error message -->
        <div class="error-message" id="errorMessage"></div>
      </form>
    </div>
  </section>
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <script>
    localStorage.clear();
    $(document).ready(function () {
      // Button click event
      $("#submitBtn").on("click", function () {
        // Get the value from the input field
        var nik = $("#ussr").val();

        // Check if NIK i
        if (nik.trim() !== "") {
          $.ajax({
            url: "api/api_kraepelin_login.php",
            type: "GET",
            data: { nik: nik },
            dataType: "json",
            success: function (data) {
              console.log(data);
              // Store the data in local storage
              localStorage.setItem('key', JSON.stringify(data));

              // Redirect or perform other actions if needed
              window.location.href = "instruksi.php";
            },
            error: function (error) {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'NIK yang kamu masukkan mungkin tidak terdaftar atau salah',
                // footer: '<a href="#">Why do I have this issue?</a>'
              });
            }
          });
        } else {
          $("#errorMessage").text("NIK cannot be empty");
        }
      });
    });
  </script>
  <script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>