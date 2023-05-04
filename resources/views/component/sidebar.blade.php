<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark sticky-top" style="width: 250px; max-height: 100%; position: fixed; top: 0; bottom: 0;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Web Absen</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        @if (Auth::guard('siswa')->check())
            @php
                $user = Auth::guard('siswa')->user();
            @endphp

            <li class="nav-item">
            <a href="absen/siswa" class="nav-link" aria-current="page">Absen Siswa</a>
            </li>
        @endif

        @if (Auth::guard('guru')->check())
            @php
                $user = Auth::guard('guru')->user();
            @endphp

            <li class="nav-item">
            <a href="/absen/guru" class="nav-link" aria-current="page">Absen Guru</a>
            </li>
        @endif

        @if (Auth::guard('web')->check())
            @php
                $user = Auth::guard('web')->user();
            @endphp

            <li class="nav-item">
            <a href="/siswa" class="nav-link" aria-current="page">CRUD Siswa</a>
            </li>
            <li class="nav-item">
            <a href="/guru" class="nav-link" aria-current="page">CRUD Guru</a>
            </li>
            <li class="nav-item">
            <a href="/mengajar" class="nav-link" aria-current="page">CRUD Mengajar</a>
            </li>
        @endif
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ url('gambar/' . $user->gambar) }}" alt="" width="48" height="48" class="rounded-circle me-2">
        @if (Auth::guard('web')->check())
          <strong class="text-truncate" style="max-width: 150px;">{{ $user->name }}</strong>
        @else
          <strong class="text-truncate" style="max-width: 150px;">{{ $user->nama }}</strong>
        @endif
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        @if (Auth::guard('siswa')->check())
          <li class="ms-3">Nama : {{ $user->nama }}</li>
          <li class="ms-3">Kelas : {{ $user->idkelas }}</li>
          <li class="ms-3">Jurusan : {{ $user->idjurusan }}</li>
        @endif
        @if (Auth::guard('guru')->check())
          <li class="ms-3">Nama : {{ $user->nama }}</li>
          <li class="ms-3">Mapel : {{ $user->idmapel }}</li>
        @endif
        @if (Auth::guard('web')->check())
        <li class="ms-3">Nama : {{ $user->name }}</li>
        <li class="ms-3">Email : {{ $user->email }}</li>
        @endif
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="/logout">Log out</a></li>
      </ul>
    </div>
  </div>
