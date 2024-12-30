<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pengurus</title>

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

       .pagination {
      display: flex;
      list-style: none;
      padding: 0;
      margin-top: 20px;
    }

    .pagination li {
      margin-right: 5px;
    }

    .pagination a {
      text-decoration: none;
      padding: 5px 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      color: #333;
    }

    .pagination a.active {
      background-color: green;
      color: #fff;
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
            @if (auth()->user()->role == 'ketua')
            <li class="nav-item">
              <a class="nav-link active " aria-current="page" href="/user" >
                <i class="bi bi-person-circle"></i>
                User
              </a>
            </li>
            @endif

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
        <h1 class="h2">User</h1>
      </div>
      
      <a href="/tambah-user" class="btn btn-success mb-2">Tambah Pengurus</a>
      <form action="/user" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Nama Pengurus">
            <button type="submit" class="btn btn-outline-secondary">Cari</button>
        </div>
      </form>

      <table class="table">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">email</th>
            <th scope="col">Role</th>
            <th scope="col"></th>

          </tr>
        </thead>
        
        <tbody>
            @foreach ($users as $user)    
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                  <a href="/user-edit/{{ $user->id }}" style="color: black;" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a> 
                  @if (auth()->user()->role == 'ketua')
                  |
                  <a href="/user-hapus/{{ $user->id }}" style="color: black;" onclick="return confirm('Anda yakin ingin menghapus?');" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                  @endif
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      </table>  
      <ul class="pagination" id="pagination">
        <!-- Pagination links will be added dynamically using JavaScript/jQuery -->
      </ul>
    </main>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="/js/dashboard.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $(document).ready(function () {
      var rowsShown = 8; // Number of rows to show per page
      var rowsTotal = $('table tbody tr').length; // Total number of rows
      var numPages = Math.ceil(rowsTotal / rowsShown); // Calculate the number of pages

      for (var i = 0; i < numPages; i++) {
        var pageNum = i + 1;
        $('#pagination').append('<li><a href="#" rel="' + i + '">' + pageNum + '</a></li>');
      }

      // Show the first page by default
      $('table tbody tr').hide();
      $('table tbody tr').slice(0, rowsShown).show();
      $('#pagination li:first-child a').addClass('active');

      // Pagination click event
      $('#pagination li a').click(function () {
        var pageNum = $(this).attr('rel');
        var startFrom = pageNum * rowsShown;
        var endOn = startFrom + rowsShown;

        // Hide and show rows
        $('table tbody tr').hide().slice(startFrom, endOn).show();

        // Update active class for pagination
        $('#pagination li a').removeClass('active');
        $(this).addClass('active');
      });
    });
  </script>
  </body>
</html>