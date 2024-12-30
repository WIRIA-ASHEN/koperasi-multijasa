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

    <h2 style="text-align: center">Laporan Simpanan</h2>
    <div class="container mt-3">
        <h3>Simpanan Transaksi</h3>
        <table>
            <table class="table">
                <thead>
                    <tr>
                        @foreach(['No', 'ID Anggota', 'Nama', 'NIK', 'Jenis Simpanan', 'Tanggal Simpanan', 'Besar Simpanan'] as $heading)
                        <th scope="col">{{ $heading }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                    $count = 1;
                    @endphp
                    @foreach ($simpanans as $simpanan)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $simpanan->id_anggota }}</td>
                        <td>{{ $simpanan->anggotas->nama }}</td>
                        <td>{{ $simpanan->anggotas->nik }}</td>
                        <td>{{ $simpanan->jenissimpanans->nama_simpanan }}</td>
                        <td>{{ $simpanan->tgl_simpanan }}</td>
                        <td>Rp. {{ number_format($simpanan->besar_simpanan, 0, '.', '.') }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Jumlah Simpanan :</td>
                        <td>Rp. {{ number_format($totalSimpanan, 0, '.', '.') }}</td>
                    </tr>
                </tbody>
            </table>

        </table>
    </div>

</body>

</html>
