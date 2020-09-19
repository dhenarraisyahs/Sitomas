@extends("layouts.master")

@section('title','Balance Management')


@section('breadcrumb')


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Balance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Management Balance</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

@endsection

@section('content')
    <div class="container-fluid">
      @if(session('error'))
      <div class="callout callout-primary">
        <h5>Test Echo data</h5>

        <p>{{session('error')}}</p>
    </div><br/>
      <br/>
    @endif
      <a href="{{route('balance.create')}}" class="btn btn-primary">Buka Balance</a>
      <br/>
      <br/>
        <div class="card-body table-responsive p-1" style="height: 700px;">
        @foreach($balance as $row)
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-credit-card"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{$row->name}}</span>
                        <span class="info-box-number">Rp. {{number_format($row->nominal, 2, ',', '.')}}</span>
                     </div>
            </div>
        @endforeach
          </div>
        </div>
    </div>

@endsection