@extends('backend.layouts.app')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h2 class="main-title float-left">@lang('Post') @lang('Manage')</h2>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
      <li class="breadcrumb-item active">@lang('Post')</li>
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
        <h5>@lang('Post') @lang('List')
          <a class="btn btn-sm btn-success float-right" href="{{route('frontend-menu.post.add')}}"><i class="fa fa-plus-circle"></i> @lang('Post') @lang('Add')</a>
        </h5>
      </div>
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th width="5%">@lang('SL')</th>
                <th>@lang('Image')</th>
                <th>@lang('Post') @lang('Type')</th>
                @if(session()->get('language') =='en')
                <th>@lang('Title') (@lang('English'))</th>
                @else
                <th>@lang('Title') (@lang('Bangla'))</th>
                @endif
                <th style="width:10%">@lang('Action')</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allData as $data)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                  <img id="show_image" src="{{(!empty(@$data->image))?url('public/upload/'.@$data->image):url('public/upload/no_image.png')}}" style="width: 150px;height: 100px;border:1px solid #000;">
                </td>
                <td>
                  @if($data->post_type=='1')
                  @lang('Advocacy & Campaign')
                  @elseif($data->post_type=='2')
                  @lang('Media & Publications')
                  @elseif($data->post_type=='3')
                  @lang('Campaign materials')
                  @endif
                </td>
                @if(session()->get('language') =='en')
                <td>{{$data->title_en}}</td>
                @else
                <td>{{$data->title_bn}}</td>
                @endif
                <td>
                  <a class="btn btn-sm btn-success" title="Edit" href="{{route('frontend-menu.post.edit',$data->id)}}"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$data->id}}"  data-route="{{route('frontend-menu.post.delete')}}"><i class="fa fa-trash"></i></a>
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
