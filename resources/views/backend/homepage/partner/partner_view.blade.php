@extends('backend.layouts.app')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h2 class="main-title float-left">Manage Partner</h2>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Partner</li>
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
        <h5>Partner List
          <a class="btn btn-sm btn-success float-right" href="{{route('homepages.partner.add')}}"><i class="fa fa-plus-circle"></i> Add Partner</a>
        </h5>
      </div>
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th width="5%">SL</th>
                <th>Image</th>
                <th>Site Link</th>
                <th style="width:10%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allData as $data)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                  <img src="{{(!empty(@$data->image))?url('public/upload/images/'.$data->image):url('public/upload/no_image.png')}}">
                </td>
                <td>{{$data->site_link}}</td>
                <td>
                  <a class="btn btn-sm btn-success" title="Edit" href="{{route('homepages.partner.edit',$data->id)}}"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$data->id}}"  data-route="{{route('homepages.partner.delete')}}"><i class="fa fa-trash"></i></a>
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
