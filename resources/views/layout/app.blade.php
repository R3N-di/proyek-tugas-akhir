<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Section - @yield('title')</title>
    </head>

    <body>
        <div class="container-fluid p-0">
            <div class="d-flex h-5">
                <div class="">
                    @include('component.sidebar')
                </div>
                <div class="d-flex flex-column flex-fill ps-5 pt-4 pe-5">
                    <div>
                        @include('component.pesan')
                        @yield('konten')
                    </div>
                    <div class="">
                        <div class="container">
                            <footer class="py-3 my-4">
                              {{-- <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
                              </ul> --}}
                              <p class="text-center text-muted border-top">&copy; 2022 Company, Inc</p>
                            </footer>
                          </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
