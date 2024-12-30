<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-size: 12px;
        }

        .container {
            width: 21cm;
            margin: 50px auto;
        }

        .letterhead {
            text-align: center;
            margin-bottom: 20px;
        }

        .letterhead img {
            max-width: 400px; /* Adjust the width of the logo as needed */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn-primary {
            margin-top: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .signature {
            float: right;
            margin-top: 75px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="letterhead">
            <img src="{{ asset('img/logo-black-01.png') }}" alt="Logo">
        </div>

        <div class="header">
            <h2 class="mt-2 mb-3">Detail Pinjaman {{ $pinjamans->anggotas->nama }}</h2>
        </div>
        <table class="table table-bordered table-hover mt-2">
            <tr>
                <th>ID Pinjaman</th>
                <td>{{ $pinjamans->id }}</td>
            </tr>
            <tr>
                <th>Tanggal Pinjaman</th>
                <td>{{ \Carbon\Carbon::parse($pinjamans->tgl_pinjaman )->locale('id')->isoFormat('D MMMM YYYY') }}</td>
            </tr>
            <tr>
                <th>Nama Anggota</th>
                <td>{{ $pinjamans->anggotas->nama }}</td>
            </tr>
            <tr>
                <th>Jumlah Peminjaman</th>
                <td>Rp. {{ number_format($pinjamans->besar_pinjaman, 0, '.', '.') }},-</td>
            </tr>
            <tr>
                <th>Pokok</th>
                <td>Rp. {{ number_format($pinjamans->bayar_pokok, 0, '.', '.') }},-</td>
            </tr>
            <tr>
                <th>Jangka Waktu</th>
                <td>{{ $pinjamans->jangka_waktu }} Bulan</td>
            </tr>
            <tr>
                <th>Bagi Hasil</th>
                <td>{{ $pinjamans->bagi_hasil }} %</td>
            </tr>
            <tr>
                <th>Per-Bulan</th>
                <td>Rp. {{ number_format($pinjamans->bayar_perbulan, 0, '.', '.') }},-</td>
            </tr>
            <tr>
                <th>Total</th>
                <td>Rp. {{ number_format($pinjamans->total, 0, '.', '.') }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $pinjamans->keterangan }}</td>
            </tr>
        </table>

        <div class="signature">
            <p>Chairman's Signature: ____________________</p>
        </div>
    </div>
</body>

</html>
