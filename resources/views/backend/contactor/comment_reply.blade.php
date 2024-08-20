@extends('backend.layouts.app')
@section('content')
<style type="text/css">
  .comments {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  .sub_comments{
    list-style: none;
    margin: 0;
    padding: 0;
  }
  .comment {
    margin: 0;
    position: relative;
  }
  .comment-author {
    background-color: #DDDDDD;
    border-radius: 50%;
    height: 60px;
    left: 0;
    position: absolute;
    top: 0;
    transition: background-color .15s linear;
    width: 60px;
  }
  .comment-content {
    margin: 0 0 50px 100px;
  }
</style>
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
          @lang('Comment') @lang('Reply')
          <a class="btn btn-sm btn-success float-right" href="{{route('communicates.comment.view')}}"><i class="fa fa-list"></i> @lang('Comment') @lang('List')</a></h5>
      </div>
      <div class="card-body">
        <div class="comments-section">
          <ul class="comments">
              <li>
                  <div class="comment">
                      <div class="comment-author">
                          <a href="#">
                              <img src="{{asset('public/frontend')}}/img/avatar/avatar-5.png" alt="avatar-5" class="img-circle">
                          </a>
                      </div>
                      <div class="comment-content">
                          <div class="comment-meta">
                              <div class="comment-meta-author">
                                  {{$data->name}}
                              </div>
                              <div class="comment-meta-date">
                                  <span class="hidden-xs">{{date('d-m-Y',strtotime($data->created_at))}}</span>
                              </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="comment-body">
                              <p style="text-align: justify;">{{$data->message}}</p>
                              <form method="POST" action="{{route('communicates.comment.reply.store',$data->id)}}">
                                @csrf
                                <textarea name="reply" class="form-control" rows="5" required>{{$data->reply}}</textarea><br/>
                                <button type="submit" class="btn btn-success btn-sm">@lang('Reply')</button>
                              </form>
                          </div>
                      </div>
                  </div>
                  <ul style="list-style-type: none">
                      @if (isset($data['sub_comment']) && count($data['sub_comment']) > 0)
                      @foreach($data['sub_comment'] as $v)
                      <li>
                          <div class="comment">
                              <div class="comment-author">
                                  <a href="#">
                                      <img src="{{asset('public/frontend')}}/img/avatar/avatar-5.png" alt="avatar-5" class="img-circle">
                                  </a>
                              </div>

                              <div class="comment-content">
                                  <div class="comment-meta">
                                      <div class="comment-meta-author">
                                          {{$v->name}}
                                      </div>

                                      <div class="comment-meta-date">
                                          <span class="hidden-xs">{{date('d-m-Y',strtotime($v->created_at))}}</span>
                                      </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="comment-body">
                                      <p style="text-align: justify;">{{$v->message}}</p>
                                      <form method="POST" action="{{route('communicates.sub.comment.store',$v->id)}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$v->id}}">
                                        <input type="checkbox" name="status" value="1" {{($v->status=="1")?"checked":""}}> &nbsp;&nbsp;
                                        <button type="submit" class="btn btn-primary btn-sm">@lang('Approve')</button> &nbsp;&nbsp;
                                        <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$v->id}}"  data-route="{{route('communicates.sub.comment.detele')}}"><i class="fa fa-trash"></i></a>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </li>
                      @endforeach
                      @endif
                  </ul>
              </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
