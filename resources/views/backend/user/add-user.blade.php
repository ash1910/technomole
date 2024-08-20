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
			User Information
		</h1>
		<ol class="breadcrumb float-right">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>Home</strong></a></li>
			<li class="breadcrumb-item active">User</li>
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
					User Update
					@else
					User Add
					@endif
					<a class="btn btn-sm btn-success float-right" href="{{route('user')}}"><i class="fa fa-list"></i> User List</a></h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{!empty($editData->id) ? route('user.update',$editData->id) : route('user.store')}}" id="myForm">
				{{csrf_field()}}
				<div class="card-body">
					<div class="show_module_more_event">
						<div class="form-row">
							<div class="form-group col-md-4">
								<label class="control-label">Full Name</label>
								<input type="text" name="name" id="name" class="form-control form-control-sm" value="{{@$editData->name}}">
							</div>
							<div class="form-group col-md-4">
								<label class="control-label">Email</label>
								<input type="email" name="email" id="email" class="form-control form-control-sm" value="{{@$editData->email}}" autocomplete="off">
								<font color="red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
							</div>
							<!-- <div class="form-group col-md-4">
								<label class="control-label">Designation</label>
								<input type="text" name="designation" id="designation" class="form-control form-control-sm" value="{{@$editData->designation}}" placeholder="Write User Designation">
							</div>

							<div class="form-group col-md-4">
								<label class="control-label">Mobile No</label>
								<input type="number" name="mobile" id="mobile" class="form-control form-control-sm" value="{{@$editData->mobile}}" placeholder="Write Mobile No" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
							    maxlength = "11">
							</div> -->
							<div class="form-group col-md-4">
								<label class="control-label">User Role</label>
								<select name="role_id" id="role_id" class="form-control form-control-sm">
					                <option value="">Select Role</option>
									@foreach($roles as $role)
					                <option value="{{ $role->id }}" {{(@$editData['user_roles']['role_id']==$role->id)?"selected":""}}>{{ $role->name }}</option>
					                @endforeach
								</select>
							</div>
							@if(!isset($editData))
							<div class="form-group col-md-4">
								<label class="control-label">Password</label>
								<input type="password" name="password" id="password" class="form-control form-control-sm" autocomplete="off">
							</div>
							<div class="form-group col-md-4">
								<label class="control-label">Confirm Password</label>
								<input type="password" name="password2" class="form-control form-control-sm">
							</div>
							@endif
						</div>
					</div>

					<button type="submit" class="btn btn-success btn-sm">
						@if(isset($editData))
						Update
						@else
						Save
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
          name: {
            required: true,
          },
          email: {
            required: true,
            email:true
          },
          role_id: {
            required: true,
          },
          password : {
            required : true,
          },
          password2 : {
            required : true,
            equalTo : '#password'
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