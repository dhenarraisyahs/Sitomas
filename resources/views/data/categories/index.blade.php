@extends("layouts.master")

@section('title','Mahkota Management')


@section('breadcrumb')


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Management Categories</li>
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
      <a href="{{route('categories.create')}}" class="btn btn-primary">Nambah Data</a>
      <br/>
      <br/>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0" style="height: 700px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Lokasi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $row)
                      <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->name}}</td>
                        <td>
                          <a href="{{route('categories.edit',$row->id)}}" class="btn btn-warning">Edit</a><br/><br/>
                          <form action="{{route('categories.destroy',$row->id)}}" method="post">
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