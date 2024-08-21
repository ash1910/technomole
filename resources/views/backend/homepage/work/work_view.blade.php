@extends('backend.layouts.app')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h2 class="main-title float-left">Manage Work</h2>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Work</li>
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
        <h5>Work List
          <a class="btn btn-sm btn-success float-right" href="{{route('homepages.work.add')}}"><i class="fa fa-plus-circle"></i> Add Work</a>
        </h5>
      </div>
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>SL</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th style="width:10%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allData as $data)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                  <img id="show_image" src="{{(!empty(@$data->image))?url('public/upload/images/'.@$data->image):url('public/upload/no_image.png')}}" style="width: 40%;"></td>
                <td>{{$data->title}}</td>
                <td><?php echo $data->description ?></td>
                <td>
                  <a class="btn btn-sm btn-success" title="Edit" href="{{route('homepages.work.edit',$data->id)}}"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$data->id}}"  data-route="{{route('homepages.work.delete')}}"><i class="fa fa-trash"></i></a>
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
