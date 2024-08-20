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
			@lang('Photo') @lang('Gallery') @lang('Manage')
		</h2>
		<ol class="breadcrumb float-right">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
			<li class="breadcrumb-item active">@lang('Photo') @lang('Gallery')</li>
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
					@lang('Photo') @lang('Gallery') @lang('Update')
					@else
					@lang('Photo') @lang('Gallery') @lang('Add')
					@endif
					<a class="btn btn-sm btn-success float-right" href="{{route('galleries.photo.view')}}"><i class="fa fa-list"></i> @lang('Photo') @lang('Gallery') @lang('List')</a></h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{!empty($editData->id) ? route('galleries.photo.update',$editData->id) : route('galleries.photo.store')}}" enctype="multipart/form-data" id="myForm">
				@csrf
				<div class="card-body">
					<div class="add_item">
						<div class="form-row">
							<div class="form-group col-md-4">
								<label class="control-label">@lang('Category')</label>
								<select name="photo_category_id" id="photo_category_id" class="form-control form-control-sm select2">
									<option value="">@lang('Select')</option>
									@foreach($categories as $category)
									<option value="{{$category->id}}" {{(@$editData->photo_category_id==$category->id)?'selected':''}}>
										@if(session()->get('language') =='en')
										{{$category->title_en}}
										@else
										{{$category->title_bn}}
										@endif
									</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-4">
								<label class="control-label">@lang('Folder') @lang('Name')</label>
								<select name="photo_folder_id" id="photo_folder_id" class="form-control form-control-sm select2">
									<option value="">@lang('Select')</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label class="control-label">@lang('Image') <span style="color: red">(626px X 417px)</span></label>
								<input type="file" name="image[]" class="form-control form-control-sm" autocomplete="off" multiple>
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
            <h4>Current images</h4>
							<div class="row">
                @if (isset($editData['photo_Gallery_details']) && count($editData['photo_Gallery_details']) > 0)
                @foreach ($editData['photo_Gallery_details'] as $image)
                <div class="col-sm-2">
	                <img src="{{asset('public/upload/'.$image->image)}}" class="p-2" width="200px">
	                <a title="Delete" class="btn btn-sm btn-danger" id="delete" data-route="{{route('galleries.photo.details.delete')}}" data-id="{{ $image->id }}" style="margin: -80px 0px 0px 10px;"><i class="fa fa-backspace"></i></a>            
                </div>
                @endforeach
                @endif
            </div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
      $('#myForm').validate({
        rules: {
        	photo_category_id: {
	            required: true,
	        },
	        photo_folder_id: {
	            required: true,
	        },
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

  <script type="text/javascript">
    $(function(){
      $(document).on('change','#photo_category_id',function(){
        var photo_category_id = $(this).val();
        $.ajax({
          type:"GET",
          url :"{{route('get-photo-folder')}}",
          data:{photo_category_id:photo_category_id},
          success:function(data){
            var html = '<option value="">@lang("Select")</option>';
            $.each(data,function(key,v){
	              	html += '<option value="'+v.id+'">'+v.title_en+'</option>';
            });
            $('#photo_folder_id').html(html);
            var photo_folder_id = "{{@$editData->photo_folder_id}}";
            if(photo_folder_id !=''){
              $('#photo_folder_id').val(photo_folder_id);
            }
          }
        });
      });
    });
  </script>

  <script type="text/javascript">
    $(function(){
      var photo_category_id = "{{@$editData->photo_category_id}}";
      if(photo_category_id){
        $('#photo_category_id').val(photo_category_id).trigger('change');
      }
    });
  </script>

@endsection