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
			Manage Backend Email
		</h2>
		<ol class="breadcrumb float-right">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>Home</strong></a></li>
			<li class="breadcrumb-item active">Backend Email</li>
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
					Update Backend Email
					@else
					Add Backend Email
					@endif
					<a class="btn btn-sm btn-success float-right" href="{{route('communicates.communicate.view')}}"><i class="fa fa-list"></i> Backend Email List</a></h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{route('communicates.communicate.update',$editData->id)}}" enctype="multipart/form-data" id="myForm">
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
								<label class="control-label">Backend Email</label>
								<input type="text" name="email" class="form-control form-control-sm" value="{{@$editData->email}}">
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
    $(document).ready(function () {
      $('#myForm').validate({
        rules: {
        	name: {
            required: true,
          },
          email: {
            required: true,
          },
          designation: {
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