@extends("layouts.master")

@section('title','Setting Toko')


@section('breadcrumb')


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setting Toko</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Setting</a></li>
              <li class="breadcrumb-item"><a href="#">Markup</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

@endsection

@section('content')
    <div class="container-fluid">
      <a href="{{route('pricesemas.index')}}" class="btn btn-primary">Back</a>
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
              <form role="form" id="form" method="post" enctype="multipart/form-data" @if(@$pricesemas)  action="{{route('pricesemas.update',@$pricesemas->id)}}"  @else action="{{route('pricesemas.store')}}" @endif>
                @csrf
                @if(@$pricesemas)
                    <input name="_method" type="hidden" value="PUT">
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label>Markup By %</label>
                    <input name="persen" value="{{@$pricesemas->persen}}" type="text" class="form-control" id="persen" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
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