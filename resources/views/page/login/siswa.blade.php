<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>
        body{
            background-image: url("fileWeb/background2.png");
            background-size: 150%;
            background-position: 40%;
            background-repeat: no-repeat;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar bg-light mb-5">
        <div class="container">
            <a class="navbar-brand" href="#">
            <img src="{{ url('fileWeb/logo2.png') }}" alt="Bootstrap" height="35">
            </a>
        </div>
    </nav>
    <div class="container p-5">
        <!-- @include('component.pesan') -->
        <div class="card bg-transparent bg-gradient ms-4 me-4">
            <div class="card-header bg-light">
                <h2 class="card-tittle" align="center">Login Siswa</h2>
            </div>
            <div class="card-body text-light">
                <form action="/login" method="post">
                    <!-- @csrf -->
                    <div class="mb-3">
                        <label for="nis" class="form-label">Nis</label>
                        <input type="text" class="form-control" name="nis" placeholder="Masukan Nis...">
                    </div>
                    <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Masukan Password...">
                    </div>
                    <div class="direction row position-relative pt-5">
                        <div class="col-6 mb-2">
                            <button type="submit" class="btn btn-primary bg-gradient float-end">Login</button>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-warning bg-gradient" href="beranda" role="button">Kembali</a> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>