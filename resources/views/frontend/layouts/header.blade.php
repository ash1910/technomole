<div id="social_fix_link">
  <ul>
    @if(session()->get('language') =='bn')
    <li><a href="{{route('language','en')}}" class="entypo-self">
      <img src="{{asset('public/frontend')}}/img/logos/english.png" style="width: 35px;margin: -7px;"><span style="color: #fff;">English</span></a>
    </li>
    @else
    <li><a href="{{route('language','bn')}}" class="entypo-self">
      <img src="{{asset('public/frontend')}}/img/logos/bangla.png" style="width: 35px;margin: -7px;"><span style="color: #fff;">বাংলা</span></a>
    </li>
    @endif

    <li><a href="{{route('frontend.contact-us')}}" class="entypo-self">
      <img src="{{asset('public/frontend')}}/img/logos/contacts.png" style="width: 35px;margin: -7px;"><span style="color: #fff;">@lang('Contact Us')</span></a>
    </li>
    <li>
      <a href="{{@$contact->facebook}}" target="_blank" class="entypo-self">
        <img src="{{asset('public/frontend')}}/img/logos/fb.jpg"  style="width: 35px;margin: -7px;"><span style="color: #fff;">@lang('Facebook')</span>
      </a>
    </li>
    <li>
      <a href="{{@$contact->twitter}}" target="_blank" class="entypo-self">
        <img src="{{asset('public/frontend')}}/img/logos/tweet.jpg"  style="width: 35px;margin: -7px;"><span style="color: #fff;">@lang('Twitter')</span>
      </a>
    </li>
    <li>
      <a href="{{@$contact->linkedin}}" target="_blank" class="entypo-self">
        <img src="{{asset('public/frontend')}}/img/logos/edin.png"  style="width: 35px;margin: -7px;"><span style="color: #fff;">@lang('Instagram')</span>
      </a>
    </li>
    <li>
      <a href="{{@$contact->youtube}}" target="_blank" class="entypo-self">
        <img src="{{asset('public/frontend')}}/img/logos/youtub.jpg"  style="width: 35px;margin: -7px;"><span style="color: #fff;">@lang('Youtube')</span>
      </a>
    </li>
  </ul>
</div>
<!-- Top header start -->
<header class="top-header top-header-3 hidden-xs" id="top">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
        <div class="list-inline">
          @if(session()->get('language') =='bn')
          <a href=""><i class="fa fa-phone"></i>
            {{@$contact->mobile_bn}}
          </a>
          @else
          <a href=""><i class="fa fa-phone"></i>
            {{@$contact->mobile_en}}
          </a>
          @endif
          <a href=""><i class="fa fa-envelope"></i> 
            {{@$contact->email}}
          </a>
        </div>
      </div>
      <!-- <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
        <ul class="social-list clearfix pull-right">
          <li>
            @if(session()->get('language') =='bn')
            <a href="{{route('language','en')}}">English </a> <span style="color: #fff"></span>
            @else
            <a href="{{route('language','bn')}}">বাংলা </a> <span style="color: #fff"></span>
            @endif
          </li>
        </ul>
      </div> -->
    </div>
  </div>
</header>
<!-- Top header end -->

<!-- Main header start -->
<header class="main-header main-header-4">
  <a href="http://www.manusherjonno.org" target="_blank"><img src="{{asset('public/frontend')}}/img/logos/logo2.png" style="float: left;"></a>
  <div class="container">
    <nav class="navbar navbar-default">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navigation" aria-expanded="false" style="background: #9A28B3">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="{{url('')}}" class="logo">
          <img src="{{asset('public/upload/logos/'.@$contact->logo_first)}}" alt="logo">
        </a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="navbar-collapse collapse" role="navigation" aria-expanded="true" id="app-navigation">
        <ul class="nav navbar-nav">
          <?php $parents = DB::table('frontend_menus')->where('parent_id','0')->orderBy('sort_order','asc')->get();?>
          @if(count($parents) != 0)
          @foreach($parents as $parent)
          <?php $parents = DB::table('frontend_menus')->where('parent_id',$parent->rand_id)->orderBy('sort_order','asc')->get();?>
          <li class="dropdown">
            <a target="{{($parent->target == '1')?('_blank'):''}}" href="{{($parent->url_link)?(route('menu_url',$parent->url_link)):'#'}}" data-toggle="{{(count($parents) != 0)?('dropdown'):''}}">
              {{(session()->get('language')=='en')?$parent->title_en:$parent->title_bn}}<span class="{{(count($parents) != 0)?('caret'):''}}"></span>
            </a>
            @if(count($parents) != 0)
            <ul class="dropdown-menu">
              @foreach($parents as $parent)
              <?php $parents = DB::table('frontend_menus')->where('parent_id',$parent->rand_id)->orderBy('sort_order','asc')->get();?>
              <li class="{{(count($parents) != 0)?('dropdown-submenu'):''}}">
                <a target="{{($parent->target == '1')?('_blank'):''}}" href="{{($parent->url_link)?(route('menu_url',$parent->url_link)):'#'}}" {{(count($parents) != 0)?('tabindex="0"'):''}}>{{(session()->get('language')=='en')?$parent->title_en:$parent->title_bn}} </a>
                <ul class="dropdown-menu">
                  @if(count($parents) != 0)
                  @foreach($parents as $parent)
                  <?php $parents = DB::table('frontend_menus')->where('parent_id',$parent->rand_id)->orderBy('sort_order','asc')->get();?>
                  <li><a target="{{($parent->target == '1')?('_blank'):''}}" href="{{($parent->url_link)?(route('menu_url',$parent->url_link)):'#'}}">{{(session()->get('language')=='en')?$parent->title_en:$parent->title_bn}} </a></li>
                  @endforeach
                  @endif
                </ul>
              </li>
              @endforeach
            </ul>
            @endif
          </li>
          @endforeach
          @endif
        </ul>
        <ul class="nav navbar-nav navbar-right hidden-sm hidden-xs">
          <li>
            <a id="header-search-btn" class="btn-navbar search-icon"><i class="fa fa-search"></i></a>
          </li>
        </ul>
      </div>

      <!-- /.navbar-collapse -->
      <!-- /.container -->
    </nav>

    <div class="header-search animated fadeInDown">
      <form class="form-inline" method="GET" action="{{route('frontend.search')}}">
        <input type="text" name="search" class="form-control" id="searchKey" placeholder="@lang('Search')...">
        <div class="search-btns">
          <button type="submit" class="btn btn-default">@lang('Search')</button>
        </div>
      </form>
    </div>
  </div>
</header>
<!-- Main header end -->