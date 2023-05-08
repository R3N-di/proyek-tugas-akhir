<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
    </style>
  </head>
  <body>
      <div class="container">
        <h3>Daftar Mengajar</h3>
        <table class="table" id="customers">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">JK</th>
                    <th scope="col">Status</th>
                  </tr>
            </thead>
            <tbody>
                @foreach ($dataSiswa as $data)
                    <tr>
                        <td scope="row">{{ $no++ }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->jk }}</td>
                        @foreach ($dataAbsen as $data2) 
                            @if ($data->idsiswa == $data2->idsiswa)
                                <td>{{ $data2->status }}</td>
                            @else
                                
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
  </body>
</html>
