@extends('backend.layouts.app')
@section('content')
<div class="col-xl-12">
    <div class="breadcrumb-holder">
        <h2 class="main-title float-left">
            Manage Partner
        </h2>
        <ol class="breadcrumb float-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>Home</strong></a></li>
            <li class="breadcrumb-item active">Partner</li>
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
                    Update Partner
                    @else
                    Add Partner
                    @endif
                    <a class="btn btn-sm btn-success float-right" href="{{route('homepages.partner.view')}}"><i class="fa fa-list"></i> Partner List</a></h5>
            </div>
            <!-- Form Start-->
            <form method="post" action="{{!empty($editData->id) ? route('homepages.partner.update',$editData->id) : route('homepages.partner.store')}}" enctype="multipart/form-data" id="myForm">
                @csrf
                <div class="card-body">
                    <div class="add_item">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label class="control-label">Website Link</label>
                                <input type="text" name="site_link" class="form-control form-control-sm" value="{{@$editData->site_link}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Image <span style="color: red">(170px X 50px)</span></label>
                                <input type="file" name="image" id="image" class="form-control form-control-sm" autocomplete="off">
                            </div>
                            <div class="form-group col-md-2">
                                <img id="show_image" src="{{(!empty(@$editData->image))?url('public/upload/images/'.@$editData->image):url('public/upload/no_image.png')}}" style="width: 150px;height: 100px;border:1px solid #000;">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">
                        @if(isset($editData))
                        Update
                        @else
                        Submit
                        @endif
                    </button>
                </div>
            </form>
            <!--Form End-->
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
          site_link: {
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