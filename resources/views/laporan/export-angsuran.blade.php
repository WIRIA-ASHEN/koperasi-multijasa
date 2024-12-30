<!-- resources/views/export.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Data</title>
    <!-- Include the Bootstrap CSS if needed -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>

    <h2 style="text-align: center">Laporan Angsuran</h2>
    <div class="container mt-3">
        <h3>Pinjaman Transaksi</h3>
        <table>
            <table class="table">
                <thead>
                    <tr>
                        @foreach(['No', 'Nama Anggota', 'Tanggal Jatuh Tempo', 'Tanggal Bayar', 'Nominal', 'Denda', 'Status'] as $heading)
                        <th scope="col">{{ $heading }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                  $count = 1; 
                @endphp
                @foreach ($bayar_pinjaman as $data)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $data->pinjamans->anggotas->nama }}</td>
                    <td>{{ $data->jatuh_tempo }}</td>
                    <td>{{ $data->tanggal_bayar }}</td>
                    <td>{{ $data->nominal }}</td>
                    <td>{{ $data->denda }}</td>
                    <td>{{ $data->status }}</td>
                </tr>
                @endforeach
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Jumlah angsuran  :</td>
                  <td>Rp. {{number_format($totalAngsuran, 0, '.', '.')}}</td>
                  <td></td>
                  <td></td>
                </tr>
                </tbody>
            </table>

        </table>
    </div>

</body>

</html>
