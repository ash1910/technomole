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
					<a class="btn btn-sm btn-success float-right" href="{{route('galleries.photo.view')}}"><i class="fa fa-list"></i> @lang('Photo') @lang('Gallery') @lang('List')</a></h5>
			</div>

			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<strong>@lang('Category') :</strong> 
						@if(session()->get('language') =='en')
							{{@$editData['photo_category']['title_en']}}
                		@else
                			{{@$editData['photo_category']['title_bn']}}
                		@endif
					</div>
					<div class="col-md-6">
						<strong>@lang('Folder') @lang('Name') :</strong> 
						@if(session()->get('language') =='en')
							{{@$editData['photo_folder']['title_en']}}
                		@else
                			{{@$editData['photo_folder']['title_bn']}}
                		@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="40%">@lang('Image')</th>
									<th>Open in Folder</th>
								</tr>
							</thead>
								<tbody>
									@if (isset($editData['photo_Gallery_details']) && count($editData['photo_Gallery_details']) > 0)
	            					@foreach ($editData['photo_Gallery_details'] as $image)
									<tr>
										<td>
											<img src="{{ url('public/upload',$image->image) }}" width="200px">
										</td>
										<td>
											<form method="POST" action="{{route('galleries.photo.status',$image->id)}}">
											@csrf
											<input type="hidden" name="id" value="{{$image->id}}">
											<input type="checkbox" name="status" value="1" {{(@$image->status=="1")?"checked":""}}> &nbsp;&nbsp;
											<button type="submit" class="btn btn-success btn-sm">save</button>
											</form>
										</td>
									</tr>
									@endforeach
	            					@endif
								</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection