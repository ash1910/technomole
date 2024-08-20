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
			Manage Contact
		</h2>
		<ol class="breadcrumb float-right">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>Home</strong></a></li>
			<li class="breadcrumb-item active">Contact</li>
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
					Update Contact
					@else
					Add Contact
					@endif
					<a class="btn btn-sm btn-success float-right" href="{{route('homepages.contact.view')}}"><i class="fa fa-list"></i> Contact List</a></h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{!empty($editData->id) ? route('homepages.contact.update',$editData->id) : route('homepages.contact.store')}}" enctype="multipart/form-data" id="myForm">
				@csrf
				<div class="card-body">
					<div class="show_module_more_event">
						<div class="form-row">
							<div class="form-group col-md-3">
								<label class="control-label">Company Name</label>
								<input type="text" name="name" class="form-control form-control-sm" value="{{@$editData->name}}">
							</div>
							<div class="form-group col-md-3">
								<label class="control-label">Mobile No</label>
								<input type="text" name="mobile" class="form-control form-control-sm" value="{{@$editData->mobile}}">
							</div>
							<div class="form-group col-md-3">
								<label class="control-label">Telephone</label>
								<input type="text" name="telephone" class="form-control form-control-sm" value="{{@$editData->telephone}}">
							</div>
							<div class="form-group col-md-3">
								<label class="control-label">Email</label>
								<input type="text" name="email" class="form-control form-control-sm" value="{{@$editData->email}}">
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">Registered Address</label>
								<input type="text" name="registered_address" class="form-control form-control-sm" value="{{@$editData->registered_address}}">
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">Corporate Address</label>
								<input type="text" name="corporate_address" class="form-control form-control-sm" value="{{@$editData->corporate_address}}">
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">Facebook Page</label>
								<input type="text" name="facebook" class="form-control form-control-sm" value="{{@$editData->facebook}}">
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">Youtube Video Link</label>
								<input type="text" name="youtube" class="form-control form-control-sm" value="{{@$editData->youtube}}">
							</div>
							<div class="form-group col-md-4">
								<label class="control-label">Logo <span style="color: red">(487px X 114px)</span></label>
								<input type="file" name="image" id="image" class="form-control form-control-sm" autocomplete="off">
							</div>
							<div class="form-group col-md-2">
              	<img id="show_image" src="{{(!empty(@$editData->image))?url('public/upload/logos/'.@$editData->image):url('public/upload/no_image.png')}}" style="width: 150px;height: 100px;border:1px solid #000;">
              </div>
		           <div class="form-group col-md-2" style="padding-top:30px">
		              <button type="submit" class="btn btn-success btn-sm">
									@if(isset($editData))
									Update
									@else
									Save
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
          mobile: {
            required: true,
          },
          telephone: {
            required: true,
          },
          registered_address: {
            required: true,
          },
          corporate_address: {
            required: true,
          },
          facebook: {
            required: true,
          },
          youtube: {
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