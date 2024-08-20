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
  #Iframe-Master-CC-and-Rs {
        max-width: 100%;
        max-height: 400px; 
        overflow: hidden;
    }

    /* inner wrapper: make responsive */
    .responsive-wrapper {
        position: relative;
        height: 0;    /* gets height from padding-bottom */ 
    }

    .responsive-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;

        margin: 0;
        padding: 0;
        border: none;
    }

    /* padding-bottom = h/w as % -- sets aspect ratio */
    /* YouTube video aspect ratio */
    .responsive-wrapper-wxh-572x612 {
        padding-bottom: 107%;
    }

    /* general styles */
    /* ============== */
    .set-border {
        border: 5px inset #4f4f4f;
    }
    .set-box-shadow { 
        -webkit-box-shadow: 4px 4px 14px #4f4f4f;
        -moz-box-shadow: 4px 4px 14px #4f4f4f;
        box-shadow: 4px 4px 14px #4f4f4f;
    }
    .set-padding {
        padding: 10px;
    }
    /*.set-margin {
        margin: 30px;
    }*/
    .center-block-horiz {
        margin-left: auto !important;
        margin-right: auto !important;
    }
</style>
<div class="col-xl-12">
    <div class="breadcrumb-holder">
        <h2 class="main-title float-left">
            @lang('Post') @lang('Manage')
        </h2>
        <ol class="breadcrumb float-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
            <li class="breadcrumb-item active">@lang('Post')</li>
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
                    @lang('Post') @lang('Update')
                    @else
                    @lang('Post') @lang('Add')
                    @endif
                    <a class="btn btn-sm btn-success float-right" href="{{route('frontend-menu.post.view')}}"><i class="fa fa-list"></i> @lang('Post') @lang('List')</a></h5>
            </div>
            <!-- Form Start-->
            <form method="post" action="{{!empty($editData->id) ? route('frontend-menu.post.update',$editData->id) : route('frontend-menu.post.store')}}" enctype="multipart/form-data" id="myForm">
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
                            <div class="form-group col-md-2">
                                <label class="control-label">@lang('Date') </label>
                                <input type="text" name="date" value="{{@$editData->date}}" class="form-control form-control-sm singledatepicker" placeholder="@lang('Date')" autocomplete="off" readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label">@lang('Post') @lang('Type') </label>
                                <select name="post_type" class="form-control form-control-sm select2">
                                    <option value="">@lang('Select')</option>
                                    <option value="1" {{(@$editData->post_type=='1')?'selected':''}}>@lang('Advocacy & Campaign')</option>
                                    <option value="2" {{(@$editData->post_type=='2')?'selected':''}}>@lang('Media & Publications')</option>
                                    <option value="3" {{(@$editData->post_type=='3')?'selected':''}}>@lang('Campaign materials')</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">@lang('Image') <span style="color: red">(625px X 364px)</span></label>
                                <input type="file" name="image" id="image" class="form-control form-control-sm" autocomplete="off">
                            </div>
                            <div class="form-group col-md-2">
                                <img id="show_image" src="{{(!empty(@$editData->image))?url('public/upload/'.@$editData->image):url('public/upload/no_image.png')}}" style="width: 150px;height: 100px;border:1px solid #000;">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">@lang('PDF File')</label>
                                <input type="file" name="file[]" class="form-control form-control-sm" autocomplete="off" multiple>
                                <font color="red">{{($errors->has('file'))?($errors->first('file')):''}}</font>
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

            <div class="form-row">
                @if (isset($editData['post_file']) && count($editData['post_file']) > 0)
                <h4>Current Files</h4>
                @foreach ($editData['post_file'] as $image)
                <div class="form-group col-md-12">
                    <a title="Delete" id="delete" class="btn btn-sm btn-danger" data-route="{{route('frontend-menu.post.file.delete')}}" data-id="{{$image->id}}"><i class="fa fa-backspace"></i></a>
                    <div id="Iframe-Master-CC-and-Rs" class="set-margin set-padding set-border set-box-shadow center-block-horiz">
                        <div class="responsive-wrapper responsive-wrapper-wxh-572x612" style="-webkit-overflow-scrolling: touch; overflow: auto;">
                            <iframe class="p-2" id="show_image" src="{{ url('public/upload/pdf_files',$image->file) }}"> 
                            </iframe>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
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