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

    <h2 style="text-align: center">Laporan Pinjaman</h2>
    <div class="container mt-3">
        <h3>Pinjaman Transaksi</h3>
        <table>
            <table class="table">
                <thead>
                    <tr>
                        @foreach(['No', 'Tanggal Pinjaman', 'Nama Anggota', 'Bagi Hasil', 'Jangka Waktu', 'Keterangan', 'Jumlah'] as $heading)
                        <th scope="col">{{ $heading }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count = 1;
                    @endphp
                    @foreach ($pinjamans as $pinjaman)    
                    <tr>
                      <td>{{ $count++ }}</td>
                      <td>{{ $pinjaman->tgl_pinjaman }}</td>
                      <td>{{ $pinjaman->anggotas->nama }}</td>
                      <td>{{ $pinjaman->bagi_hasil }} %</td>
                      <td>{{ $pinjaman->jangka_waktu }} bulan </td>
                      <td>{{ $pinjaman->keterangan }} </td>
                      <td>Rp. {{ number_format($pinjaman->besar_pinjaman, 0, '.', '.') }}</td>
                    </tr>
                  @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Jumlah Pinjaman :</td>
                        <td>Rp. {{ number_format($totalPinjaman, 0, '.', '.') }}</td>
                    </tr>
                </tbody>
            </table>

        </table>
    </div>

</body>

</html>
