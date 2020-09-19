@extends("layouts.master")

@section('title','penjualan Management')


@section('breadcrumb')


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penjualan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Penjualan Management</a></li>
              <li class="breadcrumb-item active">Create</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

@endsection

@section('content')
    <div class="container-fluid">
      <a href="{{route('penjualan.index')}}" class="btn btn-primary">Back</a>
      <br/>
      <br/>
      @if(session('error'))
      <div class="callout callout-primary">
        <h5>Data Send!</h5>

        <p>{{session('error')}}</p>
    </div><br/>
      <br/>
    @endif
        <div class="row">
          <div class="col-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" @if(@$penjualan)  action="{{route('penjualan.update',@$penjualan->id)}}"  @else action="{{route('penjualan.store')}}" @endif>
                @csrf
                @if(@$penjualan)
                    <input name="_method" type="hidden" value="PUT">
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label>Kode Transaksi</label>
                    <input name="kode" value="{{@$penjualan->name}}" type="text" class="form-control" id="kode" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Transaksi</label>
                    <input name="alamat" value="{{@$penjualan->tanggal}}" type="text" class="form-control" id="kode" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                  </div>
                  <div class="form-group">
                    <label>Pilih Customer</label>
                    <select name="categories_id" class="form-control">
                        @foreach($customer as $row)
                        <option value="{{$row->id}}" @if(@$penjualan->customer_id === $row->id) selected @endif>{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label>Pilih Product</label>
                  <select name="categories_id" class="form-control">
                      @foreach($product as $row)
                      <option value="{{$row->id}}" @if(@$penjualan->product_id === $row->id) selected @endif>{{$row->name}} | {{$row->rfid}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label>Total Nominal</label>
                <input name="total_nominal" value="{{@$penjualan->total_nominal}}" type="text" class="form-control" id="kode" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;" disabled>
              </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>    
          </div>
        </div>
    </div>

@endsection