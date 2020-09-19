@extends("layouts.master")

@section('title','Product Management')


@section('breadcrumb')


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Product Management</a></li>
              <li class="breadcrumb-item active">Create</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

@endsection

@section('content')
    <div class="container-fluid">
      <a href="{{route('product.index')}}" class="btn btn-primary">Back</a>
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
              <form role="form" id="form" method="post" enctype="multipart/form-data" @if(@$product)  action="{{route('product.update',@$product->id)}}"  @else action="{{route('product.store')}}" @endif>
                @csrf
                @if(@$product)
                    <input name="_method" type="hidden" value="PUT">
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label>Kode</label>
                    <input name="kode" value="{{@$product->kode}}" type="text" class="form-control" id="kode" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                  </div>
                  <div class="form-group">
                    <label>Select Kategori</label>
                    <select name="categories_id" class="form-control">
                        @foreach($categories as $row)
                        <option value="{{$row->id}}" @if(@$product->categories_id === $row->id) selected @endif>{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
                  <div class="form-group">
                    <label>Select Emas</label>
                    <select name="emas_id" class="form-control">
                        @foreach($emas as $row)
                        <option value="{{$row->id}}" @if(@$product->emas_id === $row->id) selected @endif>{{$row->name }} - {{$row->kadar}}</option>
                        @endforeach
                    </select>
                </div>
                  <div class="form-group">
                    <label>Select Mahkota</label>
                    <select name="mahkota_id" class="form-control">
                        @foreach($mahkota as $row)
                        <option value="{{$row->id}}" @if(@$product->mahkota_id === $row->id) selected @endif>{{$row->name }}</option>
                        @endforeach
                    </select>
                </div>
                  <div class="form-group">
                    <label>Select Cabinet</label>
                    <select name="cabinet_id" class="form-control">
                        @foreach($cabinet as $row)
                        <option value="{{$row->id}}" @if(@$product->cabinet_id === $row->id) selected @endif>{{$row->name }}</option>
                        @endforeach
                    </select>
                </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input name="name" value="{{@$product->name}}" type="text" class="form-control" id="kode" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                  </div>
                  <div class="form-group">
                    <label>Weight</label>
                    <input name="weight" value="{{@$product->weight}}" type="text" class="form-control" id="kode" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                  </div>
                  <div class="form-group">
                    <label>Nominal</label>
                    <input name="nominal" value="{{@$product->nominal}}" type="text" class="form-control" id="kode" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                  </div>
                  <div class="form-group">
                    <label>RFID</label>
                    <input name="rfid" value="{{@$product->rfid}}" type="text" class="form-control" id="kode" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                  </div>
                  <div class="form-group">
                    <label>Details</label>
                    <input name="detail" value="{{@$product->detail}}" type="text" class="form-control" id="detail" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                  </div>
                  <input type="file" name="file" id="upload" value="Choose a file">
                  <div class="upload-msg">
                    Upload a file to start cropping
                  </div>
                  <div id="upload-demo"></div>
                  <input type="hidden" id="imagebase64" name="gambare" value="">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" id="upload-result" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>    
          </div>
        </div>
    </div>

@endsection


@section('script')

<script type="text/javascript">
$( document ).ready(function() {
    var $uploadCrop;


    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();          
            reader.onload = function (e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                });
                $('.upload-demo').addClass('ready');
            }           
            reader.readAsDataURL(input.files[0]);
        }
    }

    $uploadCrop = $('#upload-demo').croppie({
        viewport: {
            width: 200,
            height: 200,
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        },
    @if(@$product)
        url: '{{asset("storage/product/".@$product->gambar)}}',
    @endif
    });

    $('#upload').on('change', function () { readFile(this); });

    $('#upload-result').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'original'
        }).then(function (resp) {
            $('#imagebase64').val(resp);
            $('#form').submit();
        });
    });

});
</script>

@endsection