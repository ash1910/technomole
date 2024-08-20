@extends('backend.layouts.app')

@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card-body text-white bg-info p-0 mb-0 card_body" style="height: 180px;">
                    <h4 style="font-size: 30px; padding-top: 80px;text-align: center;">{{date('l d F, Y')}}</h4>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card-body text-white bg-warning p-0 mb-0 card_body" style="height: 180px;background-color: #fff !important;text-align: center;"> 
                    <h4 style="font-size: 30px; height: 100px;">
                    <canvas id="canvas" width="180" height="180"
                      style="background-color:#fff; border-radius: 15px">
                      </canvas>
                    </h4>
                </div>
            </div>
        </div><br/>
        <!-- /.row -->

        <div class="row mb-3">
        </div>
        <!-- end row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script type="text/javascript" src="{{asset('public/backend/js/clock.js')}}"></script>

@endsection

