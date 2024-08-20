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
			Manage Performance
		</h2>
		<ol class="breadcrumb float-right">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>Home</strong></a></li>
			<li class="breadcrumb-item active">Performance</li>
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
					Update Performance
					@else
					Add Performance
					@endif
					<a class="btn btn-sm btn-success float-right" href="{{route('homepages.performance.view')}}"><i class="fa fa-list"></i> Performance List</a></h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{!empty($editData->id) ? route('homepages.performance.update',$editData->id) : route('homepages.performance.store')}}" enctype="multipart/form-data" id="myForm">
				@csrf
				<div class="card-body">
					<div class="show_module_more_event">
						<div class="form-row">
							<div class="form-group col-md-3">
								<label class="control-label">Experts</label>
								<input type="number" name="experts" class="form-control form-control-sm" value="{{@$editData->experts}}">
							</div>
							<div class="form-group col-md-3">
								<label class="control-label">Partners</label>
								<input type="number" name="partners" class="form-control form-control-sm" value="{{@$editData->partners}}">
							</div>
							<div class="form-group col-md-3">
								<label class="control-label">IT Experience</label>
								<input type="number" name="it_experience" class="form-control form-control-sm" value="{{@$editData->it_experience}}">
							</div>
							<div class="form-group col-md-3">
								<label class="control-label">Happy Clients</label>
								<input type="number" name="happy_clients" class="form-control form-control-sm" value="{{@$editData->happy_clients}}">
							</div>
							<div class="form-group col-md-3">
								<label class="control-label">Open Source Stack</label>
								<input type="number" name="open_source_stack" class="form-control form-control-sm" value="{{@$editData->open_source_stack}}">
							</div>
							<div class="form-group col-md-3">
								<label class="control-label">.NET Stack</label>
								<input type="number" name="dot_net_stack" class="form-control form-control-sm" value="{{@$editData->dot_net_stack}}">
							</div>
							<div class="form-group col-md-3">
								<label class="control-label">Database Stack</label>
								<input type="number" name="database_stack" class="form-control form-control-sm" value="{{@$editData->database_stack}}">
							</div>
							<div class="form-group col-md-3">
								<label class="control-label">Frontend Stack</label>
								<input type="number" name="frontend_stack" class="form-control form-control-sm" value="{{@$editData->frontend_stack}}">
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
        	experts: {
            required: true,
          },
          partners: {
            required: true,
          },
          it_experience: {
            required: true,
          },
          happy_clients: {
            required: true,
          },
          open_source_stack: {
            required: true,
          },
          dot_net_stack: {
            required: true,
          },
          database_stack: {
            required: true,
          },
          frontend_stack: {
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