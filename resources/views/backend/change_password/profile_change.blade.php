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
		<h1 class="main-title float-left">
			Profile Change
		</h1>
		<ol class="breadcrumb float-right">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>Home</strong></a></li>
			<li class="breadcrumb-item active">Profile</li>
		</ol>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container fullbody">
	<div class="col-md-12">
		<div class="card">
			<!-- Form Start-->
			<form method="post" action="{{route('profile-management.store.profile')}}" enctype="multipart/form-data" id="myForm">
				{{csrf_field()}}
				<div class="card-body">
					<div class="show_module_more_event">
						<div class="form-row">
							<div class="form-group col-md-4">
								<label class="control-label">Full Name</label>
								<input type="text" name="name" id="name" class="form-control form-control-sm" value="{{@$auth_info->name}}">
							</div>
							<div class="form-group col-md-4">
								<label class="control-label">Email</label>
								<input type="email" name="email" id="email" class="form-control form-control-sm" value="{{@$auth_info->email}}" autocomplete="off">
								<font color="red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
							</div>
							<div class="form-group col-md-4">
								<label class="control-label">Image</label>
								<input type="file" name="image" id="image" class="form-control form-control-sm" autocomplete="off">
							</div>
							<div class="form-group col-md-2">
		                    	<img id="show_image" src="{{(!empty(@$auth_info->image))?url('public/upload/user_images/'.@$auth_info->image):url('public/upload/no_image.png')}}" style="width: 150px;height: 100px;border:1px solid #000;">
		                    </div>
		                    <div class="form-group col-md-2" style="padding-top: 30px;">
		                    	<button type="submit" class="btn btn-success btn-sm">Update</button>
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
    $(document).ready(function () {
      $('#myForm').validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            email:true
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