<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Simpanan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <style>
      html, body {
           height: 100%;
           margin: 0;
           padding: 0;
           font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
       }

       .container-fluid {
           height: 100%;
       }
       .row {
           height: 100%;
       }

       .sidebar {
           border-right: 1px solid #ddd;
           height: 100%;
           color: white;
       }

       .nav-link {
           color: black;
           text-decoration: none;
       }

       .nav-link:hover {
           background-color: black;
           color: #fff;
       }

       .nav-item {
           list-style: none;
       }

       .sidebar-heading {
           color: white;
           font-size: 15px;
       }
       
       .logout {
          
          color: green; /* Adding a smooth transition effect */
          background-color: white;
          transition: color 0.3s ease;
          width: 100px;
          border-radius: 12px;
          height: 35px;
        }

        .logout:hover {
          background-color: green; /* Green */
          color: white; /* Change the background color on hover */
        }
   </style>
 </head>
 <body>


  <div class="navbar sticky-top flex-md-nowrap p-0 " style="background-color: green">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#"><img src="/img/logo-01.png" alt="" style="width:150px;"></a>
    
    
      <div style="color: white;">
        @auth
          Selamat Datang {{ auth()->user()->name }} sebagai {{ auth()->user()->role }}
        @endauth
      </div>
    <form action="/logout" method="post" style="margin-right: 50px">
      @csrf
      <button type="submit" class="logout" style="">
          <i class="bi bi-box-arrow-left"></i>
          Logout
      </button>
  </form>
  </div>
<div class="container-fluid">
  <div class="row">
    <div class="sidebar col-md-3 col-lg-2 p-0 h-100">
      <div class="" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="off-canvas flex-column p-0 pt-lg-3 overflow-y-auto" >
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active " aria-current="page" href="/dashboard" >
                <i class="bi bi-grid-1x2-fill"></i> 
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/anggota">
                <i class="bi bi-person-video2"></i>
                Anggota
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/simpanan"> 
                <i class="bi bi-clipboard-check"></i>
                Simpanan
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="/pinjaman">
                <i class="bi bi-envelope-paper"></i>
                Pinjaman
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/bayar-pinjaman">
                <i class="bi bi-cash-coin"></i>
                Angsuran
              </a>
            </li>
          

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span style=" font-size: 15px">Saved reports</span>
          </h6>
          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
                <a class="nav-link" href="/laporan">
                    <i class="bi bi-journal"></i>
                    Laporan Transaksi Simpanan
                </a>
                <!-- Sub-menu -->
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/laporan-pinjamans">
                            <i class="bi bi-calendar"></i>
                            Laporan Transaksi Pinjaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/laporan-angsurans">
                            <i class="bi bi-calendar2"></i>
                            Laporan  Transaksi angsuran
                        </a>
                    </li>
                    <!-- Tambahkan sub-menu lainnya sesuai kebutuhan -->
                </ul>
            </li>
        </ul>

          </ul>
        </div>
      </div>
    </div>

    <main class="col-md-9  col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Simpanan</h1>
      </div>
      
      <form action="/simpanan-update/{{ $simpanans->id }}" method="post">
        {{ csrf_field() }}

        {{-- <input type="hidden" class="form-control" name="id" id="id" required value="{{ $simpanans->id }}"> --}}
        {{-- <input type="hidden" class="form-control" name="id_anggota" id="id_anggota" required value="{{ $simpanans->id }}"> --}}
        <div class="mb-3">
            <label for="id_anggota">NIK</label>
            <input type="text" class="form-control" id="id_anggota" name="id_anggota" value="{{ $simpanans->anggotas->nik }}" readonly disabled>
        </div>
        <div class="mb-3">
            <label for="nama">Nama Anggota</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $simpanans->anggotas->nama }}" readonly disabled>
        </div>       
        <div class="mb-3">
            <label for="id_jenis_simpanan">Jenis Simpanan</label>
            <select class="form-select" name="id_jenis_simpanan" id="id_jenis_simpanan">
                <option value="{{ $simpanans->jenissimpanans->id }}">{{ $simpanans->jenissimpanans->nama_simpanan }}</option>
                @foreach ($jenissimpanans as $jensim)
                <option value="{{ $jensim->id }}">{{ $jensim->nama_simpanan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
          <label for="tgl_simpanan" class="form-label">Tanggal Simpanan</label>
          <input type="date" class="form-control" name="tgl_simpanan" id="tgl_simpanan" required value="{{ $simpanans->tgl_simpanan }}">
      </div>
      <div class="mb-3">
          <label for="no_telp" class="form-label">Besar Simpanan</label>
          <input type="number" class="form-control" name="besar_simpanan" id="besar_simpanan" required value="{{ $simpanans->besar_simpanan }}">
      </div>

        <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin ingin di ubah?');">Submit</button>
      </form>
      
    </main>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="/js/dashboard.js"></script></body>
</html>