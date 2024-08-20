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
        <h5>
          @lang('Comment') @lang('Approved')
          <a class="btn btn-sm btn-success float-right" href="{{route('communicates.comment.view')}}"><i class="fa fa-list"></i> @lang('Comment') @lang('List')</a></h5>
      </div>
        <div class="card-body">
          <form method="POST" action="{{route('communicates.comment.approve.store',$data->id)}}">
            @csrf
            <table class="table table-sm table-bordered table-striped">
              <tbody>
                <tr>
                  <td>@lang('blog')</td>
                  <td>{{@$data['blog']['title_en']}}</td>
                </tr>
                <tr>
                  <td>@lang('Name')</td>
                  <td>{{$data->name}}</td>
                </tr>
                <tr>
                  <td>@lang('Email')</td>
                  <td>{{$data->email}}</td>
                </tr>
                <tr>
                  <td>@lang('Phone') @lang('Number')</td>
                  <td>{{$data->mobile}}</td>
                </tr>
                <tr>
                  <td>@lang('Subject')</td>
                  <td>{{$data->subject}}</td>
                </tr>
                <tr>
                  <td>@lang('Message')</td>
                  <td>{{$data->message}}</td>
                </tr>
                  <td>@lang('Status')</td>
                  <td>
                    <select name="status" class="form-control">
                      <option value="0" {{($data->status=="0")?"selected":""}}>@lang('Pending')</option>
                      <option value="1" {{($data->status=="1")?"selected":""}}>@lang('Approved')</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <button type="submit" class="btn btn-success">Approve</button>
                  </td>
                </tr>
            </tbody>
          </form>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
