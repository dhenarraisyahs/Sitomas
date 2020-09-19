@extends("layouts.master")

@section('title','Product Management')


@section('breadcrumb')


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perhiasan Jadi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Perhiasan Jadi</li>
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
      <a href="{{route('product.create')}}" class="btn btn-primary">Nambah Data</a>
      <br/>
      <br/>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0" style="height: 700px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Gambar</th>
                      <th>Kategori</th>
                      <th>Kode</th>
                      <th>Emas</th>
                      <th>Gemstone</th>
                      <th>Cabinet</th>
                      <th>Name</th>
                      <th>Weight</th>
                      <th>Harga LIVE</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $row)
                      <tr>
                        <td>@if($row->gambar) <img width="75px" src="{{asset('storage/product/'.$row->gambar)}}"> @endif</td>
                        <td>{{$row->categories->name}}</td>
                        <td>{{$row->kode}}</td>
                        <td>{{$row->emas->name}}</td>
                        <td>{{$row->mahkota->name}}</td>
                        <td>{{$row->cabinet->name}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->weight}} gr</td> <!-- Weight e string -->
                        <td>Rp. {{number_format($row->weight * $markupgoldprice, 2, ',', '.')}}</td> <!-- $row->weight * $harga emas -->
                        <td>
                          <a href="{{route('product.edit',$row->id)}}" class="btn btn-warning">Edit</a><br/><br/>
                          <form action="{{route('product.destroy',$row->id)}}" method="post">
                            @csrf
                              <input name="_method" type="hidden" value="DELETE">
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>

@endsection