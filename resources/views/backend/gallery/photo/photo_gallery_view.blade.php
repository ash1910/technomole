@extends('backend.layouts.app')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h2 class="main-title float-left">@lang('Photo') @lang('Gallery') @lang('Manage')</h2>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
      <li class="breadcrumb-item active">@lang('Photo') @lang('Gallery')</li>
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
        <h5>@lang('Photo') @lang('Gallery') @lang('List')
          <a class="btn btn-sm btn-success float-right" href="{{route('galleries.photo.add')}}"><i class="fa fa-plus-circle"></i> @lang('Photo') @lang('Gallery') @lang('Add')</a>
        </h5>
      </div>
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>@lang('SL')</th>
                <th>@lang('Category')</th>
                <th>@lang('Folder') @lang('Name')</th>
                <th style="width:15%">@lang('Action')</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allData as $data)
              <tr>
                <td>{{$loop->iteration}}</td>
                @if(session()->get('language') =='en')
                <td>{{@$data['photo_category']['title_en']}}</td>
                <td>{{@$data['photo_folder']['title_en']}}</td>
                @else
                <td>{{@$data['photo_category']['title_bn']}}</td>
                <td>{{@$data['photo_folder']['title_bn']}}</td>
                @endif
                <td class="text-center">
                  <a class="btn btn-sm btn-success" title="Edit" href="{{route('galleries.photo.edit',$data->id)}}"><i class="fa fa-edit"></i></a>
                  <a class="delete btn btn-sm btn-danger" id="delete" title="Delete" data-route="{{ route('galleries.photo.delete') }}" data-id="{{ $data->id }}"><i class="fa fa-trash"></i></a>
                  <a class="btn btn-sm btn-primary" title="Details" href="{{route('galleries.photo.details',$data->id)}}"><i class="fa fa-eye"></i></a>
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
