@extends('backend.layouts.app')
@section('content')
<style type="text/css">
  <style type="text/css">
    .aligned { 
        text-align: center; 
        padding-bottom:28%; 
    }
    .aligned_input { 
        text-align: center; 
        padding-bottom:-10%; 
    }
    .aligned_text { 
        text-align: center; 
        font-size: 88%;
    }
    .no:hover {
        background:none;
    } .no:active {
        background: none;
    }
    #seconds {
        font-size:10px;
    }
    .btn-custom {
        background-color: black;
        color:white;
        transition-property: background, opacity;
        transition-duration: 0.5s;
    } .btn-custom:hover, .btn-custom:active, .btn-custom:focus {
        cursor: pointer;
        opacity:0.5;
        color:white;
        //background-color:white;
    } 
</style>
</style>
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h2 class="main-title float-left">@lang('Audio') @lang('Gallery') @lang('Manage')</h2>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
      <li class="breadcrumb-item active">@lang('Audio') @lang('Gallery')</li>
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
        <h5>@lang('Audio') @lang('Gallery') @lang('List')
          <a class="btn btn-sm btn-success float-right" href="{{route('galleries.audio.add')}}"><i class="fa fa-plus-circle"></i> @lang('Audio') @lang('Gallery') @lang('Add')</a>
        </h5>
      </div>
        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>@lang('SL')</th>
                <th>@lang('Category')</th>
                <th>@lang('Audio') @lang('File')</th>
                <th style="width:10%">@lang('Action')</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allData as $data)
              <tr>
                <td>{{$loop->iteration}}</td>
                @if(session()->get('language') =='en')
                <td>{{@$data['audio_category']['title_en']}}</td>
                @else
                <td>{{@$data['audio_category']['title_bn']}}</td>
                @endif
                <td>
                  <div id="audio_gallery">
                    <div class="panel-div">
                        <audio id="audio" preload="auto"></audio>
                        <div class="btn-group">
                            <button onclick="Play('{{asset('public/upload/audio_files/'.$data->file)}}','audio');" class="btn btn-custom"><span title="Play" id="play" class="glyphicon glyphicon-play aligned"></span></button>
                            <button onclick="Stop('{{asset('public/upload/audio_files/'.$data->file)}}','audio');" class="btn btn-custom"><span title="Stop" id="stop" class="glyphicon glyphicon-stop aligned"></span></button>
                            <button onclick="Restart('{{asset('public/upload/audio_files/'.$data->file)}}','audio');" class="btn btn-custom"><span title="Restart" id="restart" class="glyphicon glyphicon-step-backward aligned"></span></button>
                            <button onclick="Backward5('{{asset('public/upload/audio_files/'.$data->file)}}','audio');" class="btn btn-custom"><span title="-5 seconds" id="play" class="glyphicon glyphicon-fast-backward aligned"></span></button>
                            <button onclick="Forward5('{{asset('public/upload/audio_files/'.$data->file)}}','audio');" class="btn btn-custom"><span title="+5 seconds" id="play" class="glyphicon glyphicon-fast-forward aligned"></span></button>
                            <button onclick="Backward1('{{asset('public/upload/audio_files/'.$data->file)}}','audio');" class="btn btn-custom"><span title="-1 second" id="play" class="glyphicon glyphicon-chevron-left aligned"></span></button>
                            <button onclick="Forward1('{{asset('public/upload/audio_files/'.$data->file)}}','audio');" class="btn btn-custom"><span title="+1 second" id="play" class="glyphicon glyphicon-chevron-right aligned"></span></button>
                            <button onclick="VolumeUp('{{asset('public/upload/audio_files/'.$data->file)}}','audio');" class="btn btn-custom"><span title="Volume Up" id="volumeup" class="glyphicon glyphicon-plus aligned"></span></button>
                            <button onclick="VolumeDown('{{asset('public/upload/audio_files/'.$data->file)}}','audio');" class="btn btn-custom"><span title="Volume Down" id="volumedown" class="glyphicon glyphicon-minus aligned"></span></button>
                        </div>
                    </div>
                  </div>
                </td>
                <td>
                  <a class="btn btn-sm btn-success" title="Edit" href="{{route('galleries.audio.edit',$data->id)}}"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$data->id}}"  data-route="{{route('galleries.audio.delete')}}"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    var status = 0;
    function Play(music,id) {
        var audio = $("#"+id); 
        if(status == 0 || status == 2)
        {     
            if(status == 0) audio.attr("src", music);
            audio[0].play();
            $("#play").attr("class","glyphicon glyphicon-pause aligned")
            status = 1;
        } else if(status == 1) {    
            audio[0].pause();
            $("#play").attr("class","glyphicon glyphicon-play aligned")
            status = 2;
        }
    }
    function Stop(music,id) {
        var audio = $("#"+id);
        audio.attr("src", '');
        $("#play").attr("class","glyphicon glyphicon-play aligned")
        status = 0;
    }
    function Restart(music,id) {
        var audio = $("#"+id);
        audio.prop("currentTime",0)
    }
    function VolumeUp(music,id) {
        var audio = $("#"+id);
        var volume = $("#"+id).prop("volume")+0.1;
        if(volume > 1) volume = 1;
        $("#"+id).prop("volume",volume);
    }
    function VolumeDown(music,id) {
        var audio = $("#"+id);
        var volume = $("#"+id).prop("volume")-0.1;
        if(volume < 0) volume = 0;
        $("#"+id).prop("volume",volume);
    }
    function Forward5(music,id) {
        var audio = $("#"+id);
        audio.prop("currentTime",audio.prop("currentTime")+5);
    }
    function Backward5(music,id) {
        var audio = $("#"+id);
        audio.prop("currentTime",audio.prop("currentTime")-5);
    }
    function Forward1(music,id) {
        var audio = $("#"+id);
        audio.prop("currentTime",audio.prop("currentTime")+1);
    }
    function Backward1(music,id) {
        var audio = $("#"+id);
        audio.prop("currentTime",audio.prop("currentTime")-1);
    }
</script>
@endsection
