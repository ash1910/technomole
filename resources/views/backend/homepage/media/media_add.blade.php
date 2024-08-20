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
			@lang('Media') @lang('And') @lang('Publication') @lang('Manage')
		</h2>
		<ol class="breadcrumb float-right">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
			<li class="breadcrumb-item active">@lang('Media') @lang('And') @lang('Publication')</li>
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
					@lang('Media') @lang('And') @lang('Publication') @lang('Update')
					@else
					@lang('Media') @lang('And') @lang('Publication') @lang('Add')
					@endif
					<a class="btn btn-sm btn-success float-right" href="{{route('homepages.media.view')}}"><i class="fa fa-list"></i> @lang('Media') @lang('And') @lang('Publication') @lang('List')</a></h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{!empty($editData->id) ? route('homepages.media.update',$editData->id) : route('homepages.media.store')}}" enctype="multipart/form-data" id="myForm">
				@csrf
				<div class="card-body">
					<div class="add_item">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="control-label">@lang('Title') (@lang('English'))</label>
								<input type="text" name="title_en" class="form-control form-control-sm" value="{{@$editData->title_en}}">
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">@lang('Title') (@lang('Bangla'))</label>
								<input type="text" name="title_bn" class="form-control form-control-sm" value="{{@$editData->title_bn}}">
							</div>
							<div class="form-group col-md-12">
								<label class="control-label">@lang('Description') (@lang('English'))</label>
								<textarea name="description_en" class="form-control form-control-sm" rows="7">{{@$editData->description_en}}</textarea>
							</div>
							<div class="form-group col-md-12">
								<label class="control-label">@lang('Description') (@lang('Bangla'))</label>
								<textarea name="description_bn" class="form-control form-control-sm" rows="7">{{@$editData->description_bn}}</textarea>
							</div>
							<div class="form-group col-md-4">
								<label class="control-label">@lang('Date') </label>
								<input type="text" name="date" value="{{@$editData->date}}" class="form-control form-control-sm singledatepicker" placeholder="@lang('Date')" autocomplete="off" readonly>
							</div>
							<div class="form-group col-md-4">
								<label class="control-label">@lang('Image') <span style="color: red">(625px X 364px)</span></label>
								<input type="file" name="image" id="image" class="form-control form-control-sm" autocomplete="off">
							</div>
							<div class="form-group col-md-2">
		                    	<img id="show_image" src="{{(!empty(@$editData->image))?url('public/upload/media_images/'.@$editData->image):url('public/upload/no_image.png')}}" style="width: 150px;height: 100px;border:1px solid #000;">
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
    $(document).ready(function(){
      var a1 = CKEDITOR.replace('description_en');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
      var a1 = CKEDITOR.replace('description_bn');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
    });
  </script>

<script type="text/javascript">
    $(document).ready(function () {
      $('textarea').each(function(){
        $(this).val($(this).val().trim());
      });
      $('#myForm').validate({
        rules: {
        	title_en: {
            required: true,
          },
          title_bn: {
            required: true,
          },
          date: {
            required: true,
          },
          description_en: {
            required: true,
          },
          description_bn: {
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