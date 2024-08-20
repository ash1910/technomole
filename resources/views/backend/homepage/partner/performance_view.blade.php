@extends('backend.layouts.app')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h2 class="main-title float-left">Mange Performance</h2>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Performance</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
@if ($errors->any())
  @foreach ($errors->all() as $error)
  <script type="text/javascript">
    $(function () {
      $.notify("{{$error}}", {globalPosition: 'top right', className: 'error'});
    });
  </script>
  @endforeach
  @endif
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5>Performance List
          @if($count<1)
          <a class="btn btn-sm btn-success float-right" href="{{route('homepages.performance.add')}}"><i class="fa fa-plus-circle"></i> Add Performance</a>
          @endif
        </h5>
      </div>
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>SL</th>
                <th>Experts</th>
                <th>Partners</th>
                <th>IT Experience</th>
                <th>Happy Clients</th>
                <th>Open Source</th>
                <th>.NET</th>
                <th>Database</th>
                <th>Frontend</th>
                <th style="width:10%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allData as $data)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->experts}}</td>
                <td>{{$data->partners}}</td>
                <td>{{$data->it_experience}}</td>
                <td>{{$data->happy_clients}}</td>
                <td>{{$data->open_source_stack}}</td>
                <td>{{$data->dot_net_stack}}</td>
                <td>{{$data->database_stack}}</td>
                <td>{{$data->frontend_stack}}</td>
                <td>
                  <a class="btn btn-sm btn-success" title="Edit" href="{{route('homepages.performance.edit',$data->id)}}"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$data->id}}"  data-route="{{route('homepages.performance.delete')}}"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
