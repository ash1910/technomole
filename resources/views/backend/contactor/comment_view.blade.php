@extends('backend.layouts.app')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h2 class="main-title float-left">@lang('Comment') @lang('Manage')</h2>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
      <li class="breadcrumb-item active">@lang('Comment')</li>
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
        <h5>@lang('Comment') @lang('List')
        </h5>
      </div>
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>@lang('SL')</th>
                <th>@lang('Blog') @lang('Title')</th>
                <th>@lang('Name')</th>
                <th>@lang('Email')</th>
                <th>@lang('Mobile')</th>
                <th>@lang('Subject')</th>
                <th>@lang('Message')</th>
                <th>@lang('Status')</th>
                <th style="width:12%">@lang('Action')</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allData as $data)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{@$data['blog']['title_en']}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->mobile}}</td>
                <td>{{$data->subject}}</td>
                <td>{{$data->message}}</td>
                <td>
                  @if($data->status=="0")
                  @lang('Pending')
                  @elseif($data->status=="1")
                  @lang('Approved')
                  @endif
                </td>
                <td>
                  <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$data->id}}"  data-route="{{route('communicates.comment.delete')}}"><i class="fa fa-trash"></i></a>
                  @if($data->status=="0")
                  <a class="btn btn-sm btn-success" title="Approve" href="{{route('communicates.comment.approve',$data->id)}}"><i class="fa fa-check"></i></a>
                  @endif
                  <a class="btn btn-sm btn-primary" title="Reply" href="{{route('communicates.comment.reply',$data->id)}}"><i class="fa fa-reply"></i></a>
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
