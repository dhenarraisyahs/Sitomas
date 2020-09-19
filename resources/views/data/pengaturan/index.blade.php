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
              <li class="breadcrumb-item active">Setting Toko</li>
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
      <br/>
      <br/>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0" style="height: 150px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>No Telepon</th>
                      <th>Logo</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $row)
                      <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->alamat}}</td>
                        <td>{{$row->notel}}</td>
                        <td>@if($row->gambar) <img width="75px" src="{{asset('storage/product/'.$row->gambar)}}"> @endif</td>
                        <td>
                          <a href="{{route('pengaturan.edit',$row->id)}}" class="btn btn-warning">Edit</a><br/><br/>
                            @csrf
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