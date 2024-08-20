@extends('backend.layouts.app')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h2 class="main-title float-left">Mange Contact</h2>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Contact</li>
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
        <h5>Contact List
          @if($count<1)
          <a class="btn btn-sm btn-success float-right" href="{{route('homepages.contact.add')}}"><i class="fa fa-plus-circle"></i> Add Contact</a>
          @endif
        </h5>
      </div>
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>SL</th>
                <th>Logo</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Tele</th>
                <th style="width:10%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allData as $data)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                  <img id="show_image" src="{{(!empty(@$data->image))?url('public/upload/logos/'.@$data->image):url('public/upload/no_image.png')}}" style="width: 150px;height: 100px;border:1px solid #000;">
                </td>
                <td>{{$data->email}}</td>
                <td>{{$data->mobile}}</td>
                <td>{{$data->mobile}}</td>
                <td>
                  <a class="btn btn-sm btn-success" title="Edit" href="{{route('homepages.contact.edit',$data->id)}}"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$data->id}}"  data-route="{{route('homepages.contact.delete')}}"><i class="fa fa-trash"></i></a>
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
