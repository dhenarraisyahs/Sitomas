@extends('layouts.master')

@section('title','Manajemen Transaksi')

@section('content')

<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <span class="h3">
                        Transaction List
                    </span>
                    <a href="{{ route('transaksi.create') }}" class="btn btn-info btn-sm float-right">
                        Add New Transaction
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tgl. Transaksi</th>
                                    <th>Kode Transaksi</th>
                                    <th>Customer</th>
                                    <th>Total Transaksi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->kode_trx}}</td>
                                    <td>{{$item->customer->name}}</td>
                                    <td class="text-right">Rp{{ number_format($item->total_trx) }}</td>
                                    <td>
                                        <a target="_blank" href="{{ route('transaksi.print', $item->id) }}"
                                            class="btn btn-secondary btn-sm">
                                            <i class="fa fa-arrow-down"></i>
                                        </a>
                                        <a href="#" value="{{ route('transaksi.show',$item->id) }}"
                                            class="btn btn-sm btn-info modalMd" data-toggle="modal"
                                            data-target="#modalMd"><i class="fa fa-eye"></i>
                                        </a>
                                        <form action="{{ route('transaksi.destroy',$item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="alert alert-secondary" role="alert">
                                            Data Tidak Ditemukan!
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>
    $(document).on('ajaxComplete ready', function () {
        $('.modalMd').off('click').on('click', function () {
            $('#modalMdContent').load($(this).attr('value'));
            $('#modalMdTitle').html($(this).attr('title'));
        });
    })
</script>
{{-- <script>
    jQuery(document).ready(function($){
      $('#mymodal').on('show.bs.modal', function(e){
        //   console.log("data");
          var button = $(e.relatedTarget);
          var modal = $(this);
          modal.find('.modal-body').load(button.data("remote"));
          modal.find('.modal-title').html(button.data("title"));
      });
    });
</script> --}}

<div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalMdTitle"></h4>
            </div>
            <div class="modal-body">
                <div class="modalError"></div>
                <div id="modalMdContent"></div>
            </div>
        </div>
    </div>
  </div>
  
@endpush