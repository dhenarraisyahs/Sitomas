@extends('layouts.master')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<form action="{{route('transaksi.store')}}" method="POST">
<div class="card">
    <div class="card-header">
        <strong>Buat Transaksi Baru</strong>
    </div>
    <div class="card-body card-block">
            @csrf
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <div class="col-6">
                            <label for="kode_trx" class="form-control-label">Kode Transaksi</label>
                        </div>
                        <div class="col-12">
                            <input readonly type="text" name="kode_trx" value="{{ $kode_trx ?? ''}}"
                                class="form-control @error('kode_trx') is-invalid @enderror" />
                            @error('kode_trx') <div class="text-muted">{{$message}}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <div class="col-6">
                            <label for="created_at" class="form-control-label">Tgl. Transaksi</label>
                        </div>
                        <div class="col-12">
                            <input readonly type="text" name="created_at" value="{{ $ldate }}"
                                class="form-control @error('created_at') is-invalid @enderror" />
                            @error('created_at') <div class="text-muted">{{$message}}</div> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <div class="col-3">
                            <label class="form-control-label">Customer</label>
                        </div>
                        <div class="col-12">
                            <select class="form-control js-example-basic-single js-states cariCustomer"
                                id="cariCustomer" name="customer_id">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <div class="col-3">
                            <label class="form-control-label">Balance</label>
                        </div>
                        <div class="col-12">
                            <select class="form-control js-example-basic-single js-states cariBalance"
                                id="cariBalance" name="balance_id">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<div class="card">
    <div class="card-body card-block">
        <table class="table" id="tab_logic">
            <thead>
                <tr>
                    <td><label class="form-control-label">Produk</label></td>
                    <td><label class="form-control-label">Harga</label></td>
                    <td>
                        <button id="add_row" class="btn btn-info btn-sm px-4" type="button">
                            <i class="fa fa-plus"></i>
                        </button>
                    </td>
                </tr>
            </thead>
            <tbody id="tab_logic_body">
                <tr id="addr0" class="addr" row="0">
                    <td class="w-50">
                        <select id="cari0" row="0" class="cari form-control mt-1"
                            name="TransactionDetails[0][product_id]" onchange="changeHarga(this)">
                        </select>
                    </td>

                    <td><input readonly row="0" type="text" name='TransactionDetails[0][product_price]'
                            id="product_price0"
                            class="form-control text-right @error('product_price0') is-invalid @enderror" />
                        @error('product_price0') <div class="text-muted">{{$message}}</div> @enderror
                    </td>
                    <td>
                        <button id="del-row0" row="0" class="btn btn-danger btn-sm px-4 del-row0" type="button"
                            onclick="deleteRow(this)">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
            <tr>
                <td></td>
                <td>
                    <label for="subtotal_trx" class="form-control-label">SubTotal</label>
                    <input type="text" name="subtotal_trx" id="subtotal_trx"
                        class="form-control text-right @error('subtotal_trx') is-invalid @enderror" readonly />
                    @error('subtotal_trx') <div class="text-muted">{{$message}}</div> @enderror</td>
                </td>
            </tr>
            <tr>
                <td class="float-right">
                    <label for="discount" class="form-control-label">Diskon (%)</label>
                    <input type="number" name="percent_discount" id="discount" onkeyup="addDiscount()"
                        class="form-control  @error('discount') is-invalid @enderror" />
                    @error('discount') <div class="text-muted">{{$message}}</div> @enderror
                </td>
                <td>
                    <label for="n_discount" class="form-control-label">Nominal Discount</label>
                    <input readonly type="text" name="n_discount" id="n_discount"
                        class="form-control text-right @error('n_discount') is-invalid @enderror" />
                    @error('n_discount') <div class="text-muted">{{$message}}</div> @enderror</td>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <label for="total_trx" class="form-control-label">Total</label>
                    <input type="text" name="total_trx" id="total_trx"
                        class="form-control text-right @error('total_trx') is-invalid @enderror" readonly />
                    @error('total_trx') <div class="text-muted">{{$message}}</div> @enderror</td>
                </td>
            </tr>
        </table>
        <div class="form-group">
            <button class="btn btn-info btn-block" type="submit">
                Submit
            </button>
        </div>
        </form>
    </div>
</div>



@endsection
@push('script')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        // console.log('heloo');
        var i = $('#addr tr').length +1 ;
        // var i=0;
        $("#add_row").click(function(){
            // console.log('clicked');
            // console.log(i);
            $('#tab_logic').append('<tr id="addr'+i+'" row="'+i+'"></tr>');
            $('#addr'+i)
            .html("<td class='w-50'><select id='cari"+i+"' row='"+i+"' class='form-control' name='TransactionDetails["+i+"][product_id]' onchange='changeHarga(this)'></select></td>"
            +"<td><input type='text' name='TransactionDetails["+i+"][product_price]' id='product_price"+i+"' row='"+i+"' class='form-control text-right  @error('product_price"+i+"') is-invalid @enderror' readonly />@error('product_price"+i+"') <div class='text-muted'>{{$message}}</div> @enderror</td>"
            +"<td><button class='btn btn-danger btn-sm px-4' id='del-row"+i+"' onclick='deleteRow(this)' type='button'><i class='fa fa-trash'></i> </button></td>"
            );
            
            $("#cari"+i).select2({
            placeholder: 'Pilih Produk',
                ajax: {
                url: '{{ url("/get_data") }}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                // console.log('DATA::',data);
                    return {
                        results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
            });
            i++;
            // console.log(i); 
        });
       
    });
    function deleteRow(row) {
        var id = row.value;
        var i = $(row).attr("row");
        // console.log(i);
        // var sub = $("#subtotal_trx"+i).val();
        // var bus = convertToAngka(sub);
        // console.log(bus);

        var i = row.parentNode.parentNode.rowIndex;
        document.getElementById('tab_logic').deleteRow(i);
    }
    $("#cari0").select2({
        placeholder: 'Pilih Produk',
        ajax: {
                url: '{{ url("/get_data") }}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                // console.log('DATA::',data);
                    return {
                        results:  $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                            }
                        })
                    };
                },
        cache: true
        }
    });
    $('.cariCustomer').select2({
        placeholder: 'Pilih Customer',
        ajax: {
                url: '{{ url("/get_customer") }}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    // console.log('DATA::',data);
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
                }
    });
    $('.cariBalance').select2({
        placeholder: 'Pilih Balance',
        ajax: {
                url: '{{ url("/get_balance") }}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    // console.log('DATA::',data);
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
                }
    });
    function changeHarga(input1) {
        var id = input1.value;
        var i = $(input1).attr("row");
        // console.log(i);
        $.ajax({
         url: '{{ url("/get_product") }}/'+id,
         type: 'get',
         dataType: 'json',
         success: function(data){
            //  alert('successful');
                var oPrice = Math.round(data.price);
                var gPrice = convertToRupiah(oPrice);
                // console.log(gPrice);
                $("#product_price"+i).val(gPrice);
                count();
            }
       });
    }
    function count(){
        var len = $("#tab_logic_body > tr").length;
        var total = 0;
        for(var i = 0; i < len; i++){
            if(typeof $("#product_price"+i) === 'undefined'){
                // console.log("a");
            }else{
                // var sub = isNaN(parseInt($("#product_price"+i).val())) ? 0 : parseInt($("#product_price"+i).val());
                var sub = convertToAngka($("#product_price"+i).val());
                // console.log("SUB::", i, sub);
                total += sub;
                $("#subtotal_trx").val(convertToRupiah(total));
                $("#total_trx").val(convertToRupiah(total));
            }
        } 
    }
    function addDiscount(diskon){
        var dis = isNaN(parseInt($("#discount").val())) ? 0 : parseInt($("#discount").val());
        var total = convertToAngka($("#subtotal_trx").val());
        // console.log("a", a);
        var nominalDis  = 0;
        var final = total;
        if(isNaN(parseInt($("#discount").val()))){
            // console.log("a", final);
            $("#n_discount").val(convertToRupiah(nominalDis));
            $("#total_trx").val(convertToRupiah(final));
        }else{
            nominalDis = Math.round((dis * total) / 100);
            final = total - nominalDis;
            $("#n_discount").val(convertToRupiah(nominalDis));
            $("#total_trx").val(convertToRupiah(final));
        }

    }
</script>

@endpush