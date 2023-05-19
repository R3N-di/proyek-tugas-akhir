<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="bootstrap-5.3.0/css/bootstrap.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body{
            /* background: url(image/background2.png); */
            background: url('fileWeb/background2.png');
            background-size: auto;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <nav class="navbar bg-body-tertiary mb-5">
        <div class="container">
            <a class="navbar-brand" href="#">
            <img src="{{ url('fileWeb/logo2.png') }}" alt="Bootstrap" height="35">
            </a>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 pt-5 mt-5">
                <h1 class="text-white fw-bold">Selamat Datang Web Absensi</h1>
                <p class="text-white fs-3">Ingin Masuk Sebagai Apa?</p>
                <div class="">
                    <a href="login_siswa" class="btn btn-light fw-semibold text-primary px-3 me-3">Siswa</a>
                    <a href="login_guru" class="btn btn-light fw-semibold text-primary px-3 me-3">Guru</a>
                    <a href="login_admin" class="btn btn-light fw-semibold text-primary px-3">Admin</a>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    {{-- <script src="bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script> --}}
</body>
</html>
