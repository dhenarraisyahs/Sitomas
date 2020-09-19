<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: 'Verdana Pro Light''Gill Sans', 'Gill Sans MT', Calibri, Trebuchet MS, sans-serif, ;
            color: #333;
            text-align: left;
            font-size: 18px;
        }

        caption {
            font-size: 28px;
            margin-bottom: 15px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        tr,
        th {
            padding: 12px;
            width: 185px;
        }

        h4,
        p {
            margin: 0px;
        }

        .detail {
            border-collapse: collapse;
            border-bottom: 1px solid #757575;
        }

        .item {
            border-spacing: 10px;
            -webkit-border-horizontal-spacing: 10px;
            -webkit-border-vertical-spacing: 10px;
        }
    </style>
</head>

<body>
    <div>
        <table>
            <tr style="background-color: #1976d2;">
                <td>
                    <h1 style="color:#ffff">INVOICE</h1>
                    <h4 style="color:#ffff">#{{ $item->kode_trx }}</h4>
                </td>
                <td style="text-align:right; color:#ffff">
                    <h2>{{ $toko['name'] }}</h2>
                    <p>
                        {{ $toko['alamat'] }}<br>
                        {{ $toko['notel'] }}<br>
                        {{ $toko['email'] }}
                    </p>
                </td>
            </tr>
            <tr>
                <td style="padding:50px 5px">
                    <h4 style="color:#757575">Bill to : </h4>
                    <p>{{ $item->customer->name }}<br>
                        {{ $item->customer->nohp }}<br>
                        {{ $item->customer->alamat }} <br>
                    </p>
                </td>
                <td style="text-align:right">
                    <h4 style="color:#757575">Invoice Total</h4>
                    <h1 style="color:#1976D2">Rp{{ number_format($item->total_trx) }}</h1>
                </td>
            </tr>
            <tr>
                <table class="detail">
                    <tr class="detail" style="background-color: #1976D2;">
                        <th class="detail item" style="width: 350px; color:#ffff">Produk</th>
                        <th class="detail item" style="color:#ffff"">Harga</th>
                    </tr>
                    @foreach ($item->details as $row)
                    <tr class="detail" style="margin-bot,tom: 20px">
                        <td class="detail item">{{ $row->product->name }}</td>
                        <td class="detail item" style="text-align: right">Rp{{ number_format($row->product_price) }}
                        </td>
                    </tr>
                    @endforeach
                    <tr style="margin-top: 25px">
                        <th style="text-align: right; color: #1976D2; border-spacing">Sub Total</th>
                        <td style="text-align: right">Rp{{ number_format($item->subtotal_trx) }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: right; color: #1976D2">Diskon</th>
                        <td style="text-align: right">Rp{{ number_format($item->discount) }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: right; color: #1976D2">Total</th>
                        <td style="text-align: right">Rp{{ number_format($item->total_trx) }}</td>
                    </tr>
                </table>
            </tr>
            
        </table>
    </div>
</body>

</html>