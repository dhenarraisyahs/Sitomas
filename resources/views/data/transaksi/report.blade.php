@extends('layouts.master')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<div class="card">
    <div class="card-header">
        <strong>Laporan Penjualan</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{route('transaksi.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group mt-1 mr-3">
                    <label>Periode : </label><br>
                </div>
                <div class="form-group mr-3">
                    <input type="text" name="periode" id="periode"
                        class="form-control w-100 @error('periode') is-invalid @enderror" />
                    @error('periode') <div class="text-muted">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <a target="_blank" class="btn btn-info btn-block" id="exportpdf">Export PDF</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@push('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /><script>
    $(document).ready(function() {
        let start = moment().startOf('month');
        let end = moment().endOf('month');

        $('#exportpdf').attr('href', 'return/pdf/' + start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD'))
        
        $('#periode').daterangepicker({
            startDate: start,
            endDate: end
        }, function(first, last) {
            // console.log("clicked");
            $('#exportpdf').attr('href', 'return/pdf/' + first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD'))
        })
    })
</script>
@endpush