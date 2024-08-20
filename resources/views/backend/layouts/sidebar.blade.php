<style type="text/css">
  .elevation-3 {
    /* box-shadow: 0 10px 20px rgba(0,0,0,.19),0 6px 6px rgba(0,0,0,.23)!important; */
  }
  .img-circle {
      /* border-radius: 50%; */
  }
  .brand-image {
      float: left;
      line-height: .8;
      margin-left: 0.8rem;
      margin-right: 0.5rem;
      margin-top: -3px;
      max-height: 50px;
      width: auto;
      margin-bottom: -5px;
  }
</style>
@php
$prefix=Request::route()->getPrefix();
$route=Route::current()->getName();
$user_role_array=Auth::user()->user_role;
if(count($user_role_array)==0){
  $user_role = [];
}else{
  foreach($user_role_array as $rolee){
    $user_role[] = $rolee->role_id;
  }
}
$parentroutearray = explode('.',$route);
$parentroute = $parentroutearray[0];
$childroute = $parentroute.'.'.@$parentroutearray[1];
$nav_menu=[];
@endphp

@if(Auth::user()->id=='1')
@php           
$grand_parents = App\Model\Menu::where('parent', 0)->where('status',1)->orderBy('sort', 'asc')->get();
foreach ($grand_parents as  $grand_parent){ 
  $nav_menu[$grand_parent->id]['grand_parent']=$grand_parent->name;
  $nav_menu[$grand_parent->id]['grand_parent_route']=$grand_parent->route;            
  $nav_menu[$grand_parent->id]['grand_parent_icon']=$grand_parent->icon;       
  $parents=App\Model\Menu::where('parent', $grand_parent->id)->where('status',1)->orderBy('sort', 'asc')->get();
  foreach($parents as $parent){
    $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_id']=$parent->id;
    $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_name']=$parent->name;
    $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_route']=$parent->route;
    $childs=App\Model\Menu::where('parent', $parent->id)->where('status',1)->orderBy('sort', 'asc')->get();
    foreach($childs as $child){                               
      $nav_menu[$grand_parent->id]['is_child']='yes';
      $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_id']=$child->id;
      $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_name']=$child->name;
      $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_route']=$child->route;            
    }
  }
}       
@endphp 
@else
@php
$grand_parents = App\Model\Menu::where('parent', 0)->where('status',1)->where('id','!=',1)->orderBy('sort', 'asc')->get();
foreach ($grand_parents as  $grand_parent){        
  $parents=App\Model\Menu::where('parent', $grand_parent->id)->where('status',1)->orderBy('sort', 'asc')->get();
  foreach($parents as $parent){ 
    $check_parent=App\Model\MenuPermission::where('menu_id',$parent->id)->whereIn('role_id',@$user_role)->first();
    if($check_parent){           
      $permission=App\Model\MenuPermission::where('permitted_route',$parent->route)->whereIn('role_id', @$user_role)->first();
      if($permission){
        $nav_menu[$grand_parent->id]['grand_parent']=$grand_parent->name;
        $nav_menu[$grand_parent->id]['grand_parent_route']=$grand_parent->route;            
        $nav_menu[$grand_parent->id]['grand_parent_icon']=$grand_parent->icon;
        $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_id']=$parent->id;
        $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_name']=$parent->name;
        $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_route']=$parent->route;
      }            
    }     

    $childs=App\Model\Menu::where('parent', $parent->id)->where('status',1)->orderBy('sort', 'asc')->get();
    if(count($childs)>0){                      
      foreach($childs as $child){
        $permission=App\Model\MenuPermission::where('permitted_route',$child->route)->whereIn('role_id', @$user_role)->first(); 
        if($permission){ 
          $nav_menu[$grand_parent->id]['is_child']='yes';
          $nav_menu[$grand_parent->id]['grand_parent']=$grand_parent->name;
          $nav_menu[$grand_parent->id]['grand_parent_route']=$grand_parent->route;
          $nav_menu[$grand_parent->id]['grand_parent_icon']=$grand_parent->icon;
          $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_name']=$parent->name;
          $nav_menu[$grand_parent->id]['parent'][$parent->id]['parent_route']=$parent->route;              
          $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_id']=$child->id;
          $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_name']=$child->name;
          $nav_menu[$grand_parent->id]['parent'][$parent->id]['child'][$child->id]['child_route']=$child->route;
        }
      }
    }
  }                  
}
@endphp
@endif
{{-- Menu Initialized from $nav_menu Array --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{route('dashboard')}}" class="brand-link">
    <img src="{{asset('public/frontend/techno')}}/wp-content/uploads/2022/01/LOGO____TMC.png" alt="Admin Dashboard" class="brand-image">
    <!-- <span class="brand-text font-weight-light">TechnoMole</span> -->
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{(!empty(Auth::user()->image))?url('public/upload/user_images/'.Auth::user()->image):url('public/upload/no_image.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{auth()->user()->name}}</a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{route('dashboard')}}" class="nav-link {{$route == 'dashboard'?'active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        @foreach($nav_menu as $grand_menu)
        <li class="nav-item has-treeview {{$parentroute==$grand_menu['grand_parent_route'] ? 'menu-open' :''}}">
          <a href="#" class="nav-link {{$parentroute==$grand_menu['grand_parent_route'] ? 'active' :''}}">
            <i class="fa {{$grand_menu['grand_parent_icon'] ? $grand_menu['grand_parent_icon'] :'fas fa-tools'}}"></i>
            <p>
              {{$grand_menu['grand_parent']}}
              <i class="fas fa-angle-left right"></i>                
            </p>
          </a>
          <ul class="nav nav-treeview" style="{{$parentroute==$grand_menu['grand_parent_route'] ? 'display:block' :'display:none'}}">
            @foreach($grand_menu['parent'] as $parent_menu) 
            @if(!empty($parent_menu['child']))
            @else
            <li class="nav-item">
              <a href="{{route($parent_menu['parent_route'])}}" class="nav-link {{$route==$parent_menu['parent_route'] ? 'active' : ''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>{{$parent_menu['parent_name']}}</p>
              </a>
            </li>
            @endif      
            @endforeach 
          </ul>
        </li>
        @endforeach         
      </ul>
    </nav>
  </div>
</aside>








