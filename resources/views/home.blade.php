@extends('layouts.master')

@section('title','Dashboard')

@section('breadcrumb')


      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

@endsection


@section('content')
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$countproduct}}</h3>
                <p>Jumlah Perhiasan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Rp {{number_format($goldprice, 0, ',', '.')}}/gr<sup style="font-size: 10px"></sup></h3>
                <p>Harga Emas LIVE</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-fail">
              <div class="inner">
                <h3>Rp {{number_format($goldprice + $markupprice, 0, ',', '.')}}/gr<sup style="font-size: 10px"></sup></h3>
                <p>Harga Emas Markup</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 class="text-white">Rp {{number_format($usd, 0, ',', '.')}}</h3>
                <p>Kurs USD</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
        </div>
@endsection