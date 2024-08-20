 @extends('backend.layouts.app')
@section('content')
<style type="text/css">
  .i-style{
        display: inline-block;
        padding: 10px;
        width: 2em;
        text-align: center;
        font-size: 2em;
        vertical-align: middle;
        color: #444;
  }
  .demo-icon{cursor: pointer; }
</style>
<div class="col-xl-12">
	<div class="breadcrumb-holder">
		<h2 class="main-title float-left">
			@lang('Audio') @lang('Gallery') @lang('Manage')
		</h2>
		<ol class="breadcrumb float-right">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
			<li class="breadcrumb-item active">@lang('Audio') @lang('Gallery')</li>
		</ol>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container fullbody">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5>
					@if(isset($editData))
					@lang('Audio') @lang('Gallery') @lang('Update')
					@else
					@lang('Audio') @lang('Gallery') @lang('Add')
					@endif
					<a class="btn btn-sm btn-success float-right" href="{{route('galleries.audio.view')}}"><i class="fa fa-list"></i> @lang('Audio') @lang('Gallery') @lang('List')</a></h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{!empty($editData->id) ? route('galleries.audio.update',$editData->id) : route('galleries.audio.store')}}" enctype="multipart/form-data" id="myForm">
				@csrf
				<div class="card-body">
					<div class="add_item">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="control-label">@lang('Category')</label>
								<select name="audio_category_id" class="form-control form-control-sm select2">
									<option value="">@lang('Select')</option>
									@foreach($categories as $category)
									<option value="{{$category->id}}" {{(@$editData->audio_category_id==$category->id)?'selected':''}}>
										@if(session()->get('language') =='en')
										{{$category->title_en}}
										@else
										{{$category->title_bn}}
										@endif
									</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">@lang('Audio') @lang('File') <span style="color: red">(MP3)</span></label>
								<input type="file" name="file" id="image" class="form-control form-control-sm" autocomplete="off">
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-success btn-sm">
						@if(isset($editData))
						@lang('Update')
						@else
						@lang('Save')
						@endif
					</button>
				</div>
			</form>
			<!--Form End-->
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
      $('#myForm').validate({
        rules: {
        	audio_category_id: {
            required: true,
          }
        },
        messages: {
          
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>

@endsection