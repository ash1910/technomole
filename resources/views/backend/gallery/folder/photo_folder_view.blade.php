@extends('backend.layouts.app')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h2 class="main-title float-left">@lang('Photo') @lang('Folder') @lang('Manage')</h2>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
      <li class="breadcrumb-item active">@lang('Photo') @lang('Folder')</li>
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
        <h5>@lang('Photo') @lang('Folder') @lang('List')
          <a class="btn btn-sm btn-success float-right" href="{{route('galleries.folder.add')}}"><i class="fa fa-plus-circle"></i> @lang('Photo') @lang('Folder') @lang('Add')</a>
        </h5>
      </div>
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>@lang('SL')</th>
                <th>@lang('Category')</th>
                <th>@lang('Folder') @lang('Name')</th>
                <th style="width:10%">@lang('Action')</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allData as $data)
              <tr>
                <td>{{$loop->iteration}}</td>
                @if(session()->get('language') =='en')
                <td>{{@$data['photo_category']['title_en']}}</td>
                <td>{{$data->title_en}}</td>
                @else
                <td>{{@$data['photo_category']['title_bn']}}</td>
                <td>{{$data->title_bn}}</td>
                @endif
                <td>
                  <a class="btn btn-sm btn-success" title="Edit" href="{{route('galleries.folder.edit',$data->id)}}"><i class="fa fa-edit"></i></a>
                  <!-- <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$data->id}}" data-token="{{csrf_token()}}" href="{{route('galleries.folder.delete')}}"><i class="fa fa-trash"></i></a> -->
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
