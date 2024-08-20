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
			Manage Team
		</h2>
		<ol class="breadcrumb float-right">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>Home</strong></a></li>
			<li class="breadcrumb-item active">Team List</li>
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
					Update Team
					@else
					Add Team
					@endif
					<a class="btn btn-sm btn-success float-right" href="{{route('homepages.team.view')}}"><i class="fa fa-list"></i> Team List</a></h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{!empty($editData->id) ? route('homepages.team.update',$editData->id) : route('homepages.team.store')}}" enctype="multipart/form-data" id="myForm">
				@csrf
				<div class="card-body">
					<div class="show_module_more_event">
						<div class="form-row">
							<div class="form-group col-md-4">
								<label class="control-label">Name</label>
								<input type="text" name="name" class="form-control form-control-sm" value="{{@$editData->name}}">
							</div>
							<div class="form-group col-md-4">
								<label class="control-label">Designation</label>
								<input type="text" name="designation" class="form-control form-control-sm" value="{{@$editData->designation}}">
							</div>
							<div class="form-group col-md-4">
								<label class="control-label">Facebook</label>
								<input type="text" name="facebook" class="form-control form-control-sm" value="{{@$editData->facebook}}">
							</div>
							<div class="form-group col-md-4">
								<label class="control-label">Twitter</label>
								<input type="text" name="twitter" class="form-control form-control-sm" value="{{@$editData->twitter}}">
							</div>
							<div class="form-group col-md-4">
								<label class="control-label">Linkedin</label>
								<input type="text" name="viber" class="form-control form-control-sm" value="{{@$editData->viber}}">
							</div>
							<div class="form-group col-md-2">
								<label class="control-label">Image <span style="color: red">(200px X 210px)</span></label>
								<input type="file" name="image" id="image" class="form-control form-control-sm" autocomplete="off">
							</div>
							<div class="form-group col-md-2">
              	<img id="show_image" src="{{(!empty(@$editData->image))?url('public/upload/images/'.@$editData->image):url('public/upload/no_image.png')}}" style="width: 150px;height: 100px;border:1px solid #000;">
              </div>
							<div class="form-group col-md-12">
								<label class="control-label">Description</label>
								<textarea name="description" class="form-control form-control-sm" rows="7">{{@$editData->description}}</textarea>
							</div>
                <div class="form-group col-md-2">
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
        	name: {
            required: true,
          },
          designation: {
            required: true,
          },
          facebook: {
            required: true,
          },
          description: {
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