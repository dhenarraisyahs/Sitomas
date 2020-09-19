<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: 'Verdana Pro Light''Gill Sans', 'Gill Sans MT', Calibri, Trebuchet MS, sans-serif, ;
            color: #333;
            text-align: left;
            font-size: 18px;
        }

        .table-bordered {
            border-top: 0.5px solid #757575;
            border-collapse: collapse;
        }

        th,
        tfoot {
            padding: 13px 0px;
            color: #ffff;
            background-color: #1976d2;
        }

        td {
            padding: 10px 0px;
            border-top: 0.5px solid #757575;
            border-collapse: collapse;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <h2>Laporan Transaksi {{ $toko['name'] }}</h2>
    <h3>Periode {{ $startDate }} s/d {{ $endDate }} </h3>
    <hr>
    <p>
        {{ $toko['alamat'] }}<br>
        {{ $toko['notel'] }}<br>
        {{ $toko['email'] }}
    </p>
    <table width="100%" class="table-bordered">
        <thead>
            <tr style="background-color:#1976d2">
                <th>No.Transaksi</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Subtotal</th>
                <th>Diskon</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total1 = 0;
            $total2 = 0; //dd($orders);
            @endphp
            @forelse ($orders as $row)
            <tr class="table-bordered">
                <td>{{ $row->kode_trx }}</td>
                <td>{{ $row->created_at->format('d M Y') }}</td>
                <td>{{ $row->customer->name }}</td>
                <td class="text-right">Rp {{ number_format($row->subtotal_trx) }}</td>
                <td class="text-right">Rp {{ number_format($row->discount) }}</td>
                <td class="text-right">Rp {{ number_format($row->total_trx) }}</td>
            </tr>

            @php
            $total1 += $row->discount;
            $total2 += $row->total_trx;
            @endphp
            @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr class="table-bordered">
                <td colspan="4"><strong>Total</strong></td>
                <td class="text-right">Rp {{ number_format($total1) }}</td>
                <td class="text-right">Rp {{ number_format($total2) }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>