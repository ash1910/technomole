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
			Manage About Us
		</h2>
		<ol class="breadcrumb float-right">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>Home</strong></a></li>
			<li class="breadcrumb-item active">About us</li>
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
					Update About Us
					@else
					Add About Us
					@endif
					<a class="btn btn-sm btn-success float-right" href="{{route('homepages.about.view')}}"><i class="fa fa-list"></i> About Us</a></h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{!empty($editData->id) ? route('homepages.about.update',$editData->id) : route('homepages.about.store')}}" enctype="multipart/form-data" id="myForm">
				@csrf
				<div class="card-body">
					<div class="show_module_more_event">
						<div class="form-row">
							<div class="form-group col-md-12">
								<label class="control-label">About Us Title</label>
								<input type="text" name="title" class="form-control form-control-sm" value="{{@$editData->title}}">
							</div>
							<div class="form-group col-md-12">
								<label class="control-label">About Description</label>
								<textarea name="description" class="form-control form-control-sm" rows="7">{{@$editData->description}}</textarea>
							</div>
							<div class="form-group col-md-12">
								<label class="control-label">What We Offer</label>
								<textarea name="offer" class="form-control form-control-sm" rows="5">{{@$editData->offer}}</textarea>
							</div>
							<div class="form-group col-md-4">
								<label class="control-label">About Us Image <span style="color: red">(780px X 851px)</span></label>
								<input type="file" name="about_image" id="image" class="form-control form-control-sm" autocomplete="off">
							</div>
							<div class="form-group col-md-2">
              	<img id="show_image" src="{{(!empty(@$editData->about_image))?url('public/upload/about_images/'.@$editData->about_image):url('public/upload/no_image.png')}}" style="width: 150px;height: 100px;border:1px solid #000;">
              </div>
              <div class="form-group col-md-4">
								<label class="control-label">How Work Image <span style="color: red">(780px X 586px)</span></label>
								<input type="file" name="how_work_image" id="how_work_image" class="form-control form-control-sm" autocomplete="off">
							</div>
							<div class="form-group col-md-2">
              	<img id="show_how_work_image" src="{{(!empty(@$editData->how_work_image))?url('public/upload/images/'.@$editData->how_work_image):url('public/upload/no_image.png')}}" style="width: 150px;height: 100px;border:1px solid #000;">
              </div>
              <div class="form-group col-md-2" style="padding-top: 30px;">
              	<button type="submit" class="btn btn-success btn-sm">
									@if(isset($editData))
									Update
									@else
									Submit
									@endif
								</button>
		          </div>
						</div>
					</div>
				</div>
			</form>
			<!--Form End-->
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#how_work_image').change(function (e) { //show Image before upload
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#show_how_work_image').attr('src', e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
      var a1 = CKEDITOR.replace('description');
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
        	title: {
            required: true,
          },
          offer: {
            required: true,
          },
          description: {
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

@endsection