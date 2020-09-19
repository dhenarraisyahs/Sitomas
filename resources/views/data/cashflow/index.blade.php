@extends('dashLayout')

@section('title','Dashboard')

@section('style')
<style>
    .select2-container .select2-selection--single{height:38px !important;border-radius:2px;}
    .datepicker{z-index:1151 !important;}
</style>
@endsection
@section('pageTitle')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Cashflow Page</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Cashflow</li>
                </ol>
            </div>
            
        </div>
    </div>
</div>     

@endsection

@section('topNavbar')
<form class="app-search d-none d-lg-block mr-2">
    <div class="position-relative">
        <input type="text" class="form-control" placeholder="Search...">
        <span class="bx bx-search-alt"></span>
    </div>
</form>

<button type="button" class="btn header-item waves-effect" data-toggle="modal" data-target="#TambahModal" >
    <i class="bx bx-plus-medical font-size-11 align-middle mr-2"></i> 
    Tambah Transaction
</button>
@endsection

@section('pageContent')
<div class="row">
    <div class="col-12 page-title-box">
        {{-- FORM CREATE --}}
        <form method="post" action="{{route('cashflow.store')}}" id="Create">
        <div class="modal fade bs-example-modal-center" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0">Tambah Data Cashflow</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! csrf_field() !!}
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nominal</label>
                            <div class="col-md-10">
                                <input class="form-control resetForm rupiah" name="nominal" autofocus type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Balances</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="fund_id" required>
                                    <option>Please choose option</option>
                                    @foreach($balance as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Tipe</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="type" required>
                                    <option>Please choose option</option>
                                    <option value="1">Pemasukan</option>
                                    <option value="0">Pengeluaran</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Tipe</label>
                            <div class="col-md-10">
                                <input  data-provide="datepicker" type="text" class="form-control" placeholder="Date" name="date">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Catatan</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Catatan" name="catatan">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        </form>
        {{-- FORM CREATE --}}

    </div>
</div>
<section id="dataWrapper">
    <div class="row" id="dataReload">
        <div class="col-lg-8">
            @foreach($balance as $row)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">
                            <a href="javascript: void(0);" class="team-member d-inline-block mr-3">
                                <div class="avatar-sm">
                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        B
                                    </span>
                                </div>
                            </a> 
                            {{$row->name}} #{{$row->no_account}}
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-nowrap table-centered mb-0">
                                <tbody>
                                    @if($row->cashflow->count())
                                        @foreach($row->cashflow as $cashflow)
                                        <tr>
                                            <td style="width:50%;">
                                                <h5 class="text-truncate font-size-14 m-0">
                                                    {{$cashflow->catatan}}
                                                </h5>
                                            </td>
                                            <td style="width:10%;">
                                                {{ \Carbon\Carbon::parse($cashflow->date)->format('d M,Y')}}
                                            </td>
                                            <td style="width:10%;">
                                                <div class="text-center">
                                                    <span class="badge badge-pill @if($cashflow->type) badge-soft-primary @else badge-soft-secondary @endif font-size-11">@if($cashflow->type) Pemasukan @else Pengeluaran @endif</span>
                                                </div>
                                            </td>
                                            <td style="width:30%;" class="text-right">
                                                <span class="float-left">Rp.</span>
                                                {{number_format($cashflow->nominal)}}
                                            </td>
                                            <td>
                                                <a href="#" class="deleteData" data-toggle="tooltip" data-placement="right" title data-original-title="Delete Data?"
                                            data-url="{{route('cashflow.destroy',$cashflow->id)}}" data-token="{{csrf_token()}}" data-id="{{$cashflow->id}}">
                                                    <i class="bx bx-trash-alt font-size-16 align-middle text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center">Didn't have any cashflow right now.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- end col -->

        <div class="col-lg-4">
            @foreach($balance as $row)
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted font-weight-medium">{{$row->name}} #{{$row->no_account}}</p>
                            <h4 class="mb-0">Rp. {{number_format($row->nominal)}}</h4>
                        </div>

                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                            <span class="avatar-title">
                                <i class="bx bx-credit-card font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
            
        </div>
    </div>
</section>







@endsection

@section('script')
<script src="{{asset('libs/inputmask/jquery.inputmask.bundle.js')}}"></script>
<script>
    $('.rupiah').inputmask({
        removeMaskOnSubmit: true,
        alias:'currency',
        digits: false,
        prefix:' Rp '
    })
    $(".deleteData").on('click',function(e){
        url = $(this).data('url');
        id = $(this).data('id');
        token = $(this).data('token');
        Swal.fire({
            title: "Confirm Delete?",
            text: "You weren't able to recover this record!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete data!",
            confirmButtonColor: '#f46a6a',
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
            }).then((confirm) => {
            if (confirm.value) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_method": "delete",
                        "_token": token,
                    },
                    success: function (results){
                        if(results.success === true){
                            Swal.fire("Done!", results.message, "success").then(function(){
                                location.reload(false);
                            });
                        }else{
                            Swal.fire("Error!", results.message, "error");
                        }
                    }
                });
            }
        })
    });
    $(".summernote").summernote( {
        height: 300, minHeight: null, maxHeight: null, focus: !0
    });
    $(".editModal").on('click',function(e){
        $('#editTitle').text('Edit Data '+$(this).data('name'));
        $('#Edit').attr("action",$(this).data('url'));
        $('#editName').attr('value',$(this).data('name'));
        $('#editClient option[value='+$(this).data('client')+']').attr('selected','selected');
        $('#editPayment option[value='+$(this).data('payment')+']').attr('selected','selected');
        $('#editPrice').attr('value',$(this).data('price'));
        $('#editStatus option[value='+$(this).data('status')+']').attr('selected','selected');
        $('#editDescription').summernote("code",$(this).data('description'));
    });
    $('#Edit').submit(function(e){
        e.preventDefault();
        var form    = $(this);
        var url     = form.attr('action');

        Swal.fire({
            title: "Confirm Submit?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, save data!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (isConfirm) {
            if (isConfirm.value) {
                $.ajax({
                    type    : "POST",
                    url     : url,
                    data    : form.serialize(),
                    dataType: 'JSON',
                    success : function(results){
                        if(results.success === true){
                            Swal.fire("Done!", results.message, "success").then(function(){
                                location.reload(false);
                            });
                        }else{
                            Swal.fire("Error!", results.message, "error");
                        }
                    }
                });
            }
        });
    });
    $('#Create').submit(function(e){
        e.preventDefault();
        var form    = $(this);
        var url     = form.attr('action');
        $('.rupiah').inputmask('remove');

        Swal.fire({
            title: "Confirm Submit?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, save data!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (isConfirm) {
            if (isConfirm.value) {
                $.ajax({
                    type    : "POST",
                    url     : url,
                    data    : form.serialize(),
                    dataType: 'JSON',
                    success : function(results){
                        if(results.success === true){
                            Swal.fire("Done!", results.message, "success").then(function(){
                                location.reload(false);
                            });
                        }else{
                            Swal.fire("Error!", results.message, "error");
                        }
                    }
                });
            }
        });
    });
</script>

@endsection