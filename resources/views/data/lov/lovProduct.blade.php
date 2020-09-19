{{-- <form class="form-horizontal" data-parsley-validate>
    @method('PUT')
    @csrf --}}
<table class="table table-bordered">
    <tr>
        <th>No. Transaksi</th>
        <td>{{$item->kode_trx}}</td>
    </tr>
    <tr>
        <th>Tgl. Transaksi</th>
        <td>{{$item->created_at}}</td>
    </tr>
    <tr>
        <th>Customer</th>
        <td>{{$item->customer->name}}</td>
    </tr>
    <tr>
        <th>Item Details</th>
        <td>
            <table class="table">
                <thead>
                    <tr>
                        <th>RFID</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($item->details as $detail)
                    <tr>
                        <td>{{ $detail->product->rfid }}</td>
                        <td>{{ $detail->product->name }}</td>
                        <td class="text-right">Rp {{ number_format($detail->product_price)}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" class="text-right"> Sub Total</td>
                        <td class="text-right">Rp {{ number_format($item->subtotal_trx) }}</td>
                    </tr>
                    <tr>
                        <td>Diskon</td>
                        <td>{{ $item->percent_discount }}%</td>
                        <td class="text-right">Rp {{ number_format($item->discount)}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-right">Total</td>
                        <td class="text-right">Rp {{ number_format($item->total_trx) }}</td>
                    <tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
{{-- </form> --}}