<?php

namespace App\Http\Controllers\Backend\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\FrontendMenu;

class FrontendMenuController extends Controller
{
    public function view(){
        $menus = FrontendMenu::orderBy('id','desc')->get();
        return view('backend.post.menu-view', compact('menus'));
    }

    public function add(){
        return view('backend.post.menu-add');
    }

    private function getToken($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); 

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
        return $token;
    }

    public function singleStore(Request $request){
        if($request->edit_rand_id != null){
            $service = FrontendMenu::where('rand_id',$request->edit_rand_id)->first();
            if($service == null){
                return redirect()->route('frontend-menu.menu.view')->with('error','Sorry never insert menu. Please try again.');
            }
        }else{
            $service = new FrontendMenu();
            $service->parent_id = 0;
            $service->rand_id = $this->getToken(10);
        }

        $service->title_en = $request->title_en;
        $service->title_bn = $request->title_bn;

        if($request->url_link =='#'){
            $service->url_link = null;
        }else if($request->get('url_link_file') != null){
            $imgName = date('YmdHi').'_'.$request->url_link;
            $file_link_decode = @base64_decode(@explode(',', @$request->url_link_file)[1]);
            if(!file_exists(public_path('backend/menu_fle'))){
                mkdir(public_path('backend/menu_fle'), 0777, true);
            }
            file_put_contents('public/backend/menu_fle/'.$imgName, @$file_link_decode);
            $service['url_link'] = $imgName;
        }else{
            $service->url_link = $request->url_link;
        }
        $service->url_link_type = $request->url_link_type;
        $service->status = $request->status;
        $service->target = $request->target;
        $service->save();
        return redirect()->route('frontend-menu.menu.view')->with('success','Well done! successfully inserted');
    }

    public function store(Request $request){
        DB::transaction(function() use($request){
            $data = json_decode(urldecode($request->nestableoutput));
            FrontendMenu::truncate();
            if(count($data)){
                foreach ($data as $key1 => $datum){
                    $service1 = new FrontendMenu();
                    if($datum->rand_id){
                        $service1->rand_id = $datum->rand_id;
                    }else{
                        $service1->rand_id = $this->getToken(20);
                    }
                    $service1->parent_id = '0';
                    $service1->sort_order = $key1;

                    $service1->title_en = $datum->title_en;
                    $service1->title_bn = $datum->title_bn;
                    $service1->url_link_type = $datum->url_link_type;
                    $service1->status = $datum->status;
                    $service1->target = $datum->target;
                    if($datum->url_link =='#'){
                        $service1->url_link = null;
                    }else if($datum->url_link_file != null){
                        $imgName = date('YmdHi').'_'.$datum->url_link;
                        $file_link_decode = @base64_decode(@explode(',', @$datum->url_link_file)[1]);
                        if(!file_exists(public_path('backend/menu_fle'))){
                            mkdir(public_path('backend/menu_fle'), 0777, true);
                        }
                        file_put_contents('public/backend/menu_fle/'.$imgName, @$file_link_decode);
                        $service1->url_link = $imgName;
                    }else{
                        $service1->url_link = $datum->url_link;
                    }
                    $service1->save();
                    if(@$datum->children){
                        $data = $datum->children;
                        foreach ($data as $key2 => $datum){
                            $service2 = new FrontendMenu();
                            if($datum->rand_id){
                                $service2->rand_id = $datum->rand_id;
                            }else{
                                $service2->rand_id = $this->getToken(10);
                            }
                            $service2->parent_id = $service1->rand_id;
                            $service2->sort_order = $key2;

                            $service2->title_en = $datum->title_en;
                            $service2->title_bn = $datum->title_bn;
                            $service2->url_link_type = $datum->url_link_type;
                            $service2->status = $datum->status;
                            $service2->target = $datum->target;
                            if($datum->url_link =='#'){
                                $service2->url_link = null;
                            }else if($datum->url_link_file != null){
                                $imgName = date('YmdHi').'_'.$datum->url_link;
                                $file_link_decode = @base64_decode(@explode(',', @$datum->url_link_file)[1]);
                                if(!file_exists(public_path('backend/menu_fle'))){
                                    mkdir(public_path('backend/menu_fle'), 0777, true);
                                }
                                file_put_contents('public/backend/menu_fle/'.$imgName, @$file_link_decode);
                                $service2->url_link = $imgName;
                            }else{
                                $service2->url_link = $datum->url_link;
                            }
                            $service2->save();
                            if(@$datum->children){
                                $data = $datum->children;
                                foreach ($data as $key3 => $datum){
                                    $service3 = new FrontendMenu();
                                    if($datum->rand_id){
                                        $service3->rand_id = $datum->rand_id;
                                    }else{
                                        $service3->rand_id = $this->getToken(10);
                                    }
                                    $service3->parent_id = $service2->rand_id;
                                    $service3->sort_order = $key3;

                                    $service3->title_en = $datum->title_en;
                                    $service3->title_bn = $datum->title_bn;
                                    $service3->url_link_type = $datum->url_link_type;
                                    $service3->status = $datum->status;
                                    $service3->target = $datum->target;
                                    if($datum->url_link =='#'){
                                        $service3->url_link = null;
                                    }else if($datum->url_link_file != null){
                                        $imgName = date('YmdHi').'_'.$datum->url_link;
                                        $file_link_decode = @base64_decode(@explode(',', @$datum->url_link_file)[1]);
                                        if(!file_exists(public_path('backend/menu_fle'))){
                                            mkdir(public_path('backend/menu_fle'), 0777, true);
                                        }
                                        file_put_contents('public/backend/menu_fle/'.$imgName, @$file_link_decode);
                                        $service3->url_link = $imgName;
                                    }else{
                                        $service3->url_link = $datum->url_link;
                                    }
                                    $service3->save();
                                    if(@$datum->children){
                                        $data = $datum->children;
                                        foreach ($data as $key4 => $datum){
                                            $service4 = new FrontendMenu();
                                            if($datum->rand_id){
                                                $service4->rand_id = $datum->rand_id;
                                            }else{
                                                $service4->rand_id = $this->getToken(10);
                                            }
                                            $service4->parent_id = $service3->rand_id;
                                            $service4->sort_order = $key4;

                                            $service4->title_en = $datum->title_en;
                                            $service4->title_bn = $datum->title_bn;
                                            $service4->url_link_type = $datum->url_link_type;
                                            $service4->status = $datum->status;
                                            $service4->target = $datum->target;
                                            if($datum->url_link =='#'){
                                                $service4->url_link = null;
                                            }else if($datum->url_link_file != null){
                                                $imgName = date('YmdHi').'_'.$datum->url_link;
                                                $file_link_decode = @base64_decode(@explode(',', @$datum->url_link_file)[1]);
                                                if(!file_exists(public_path('backend/menu_fle'))){
                                                    mkdir(public_path('backend/menu_fle'), 0777, true);
                                                }
                                                file_put_contents('public/backend/menu_fle/'.$imgName, @$file_link_decode);
                                                $service4->url_link = $imgName;
                                            }else{
                                                $service4->url_link = $datum->url_link;
                                            }
                                            $service4->save();
                                            if(@$datum->children){
                                                $data = $datum->children;
                                                foreach ($data as $key5 => $datum){
                                                    $service5 = new FrontendMenu();
                                                    if($datum->rand_id){
                                                        $service5->rand_id = $datum->rand_id;
                                                    }else{
                                                        $service5->rand_id = $this->getToken(10);
                                                    }
                                                    $service5->parent_id = $service4->rand_id;
                                                    $service1->sort_order = $key5;

                                                    $service5->title_en = $datum->title_en;
                                                    $service5->title_bn = $datum->title_bn;
                                                    $service5->url_link_type = $datum->url_link_type;
                                                    $service5->status = $datum->status;
                                                    $service5->target = $datum->target;
                                                    if($datum->url_link =='#'){
                                                        $service5->url_link = null;
                                                    }else if($datum->url_link_file != null){
                                                        $imgName = date('YmdHi').'_'.$datum->url_link;
                                                        $file_link_decode = @base64_decode(@explode(',', @$datum->url_link_file)[1]);
                                                        if(!file_exists(public_path('backend/menu_fle'))){
                                                            mkdir(public_path('backend/menu_fle'), 0777, true);
                                                        }
                                                        file_put_contents('public/backend/menu_fle/'.$imgName, @$file_link_decode);
                                                        $service5->url_link = $imgName;
                                                    }else{
                                                        $service5->url_link = $datum->url_link;
                                                    }
                                                    $service5->save();
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        });

return redirect()->route('frontend-menu.menu.view')->with('success','Well done! successfully inserted');
}

public function edit($id){
    $editData = FrontendMenu::find($id);
    $countmenu = FrontendMenu::where('rand_id',$editData->parent_id)->first();
    if($countmenu == null){
        $menu_number['access_id'] = '1';
        $menu_number['parent_id'] = $editData->parent_id;
        $menu_number['sub_parent_id'] = '';
    }else{
        $countsubmenu = FrontendMenu::where('rand_id',$countmenu->parent_id)->first();
        if($countsubmenu == null){
            $menu_number['access_id'] = '2';
            $menu_number['parent_id'] = $editData->parent_id;
            $menu_number['sub_parent_id'] = '0';
        }else{
            $menu_number['access_id'] = '3';
            $menu_number['parent_id'] = $countmenu->parent_id;
            $menu_number['sub_parent_id'] = $editData->parent_id;
        }
    }

    return view('backend.post.menu-add', compact('editData','menu_number'));
}






}
