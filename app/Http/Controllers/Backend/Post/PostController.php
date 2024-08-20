<?php

namespace App\Http\Controllers\Backend\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\MenuPost;
use App\Model\MenuPostFile;
use Image;

class PostController extends Controller
{
    public function view(){
        $data['allData'] = MenuPost::orderBy('id','desc')->get();
        return view('backend.post.post-view', $data);
    }

    public function add(){
    	return view('backend.post.post-add');
    }

    public function store(Request $request){
        // $this->validate($request,[
        //     'file' => 'mimes:pdf',
        // ]);
        $data = new MenuPost();
        $data->date = $request->date ? date('Y-m-d',strtotime($request->date)) : null;
        $data->title_en = $request->title_en;
        $data->title_bn = $request->title_bn;
        $data->description_en = $request->description_en;
        $data->description_bn = $request->description_bn;
        $data->post_type = $request->post_type;
        $img = $request->file('image');
        if ($img) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/', $imgName);
            $img = Image::make(public_path('upload/').$imgName);
            $img->resize(625,364)->save(public_path('upload/').$imgName);
            $data['image'] = $imgName;
        }
        $data->created_by = Auth::user()->id;
        if($data->save()){
            $files = $request->file;
            if(!empty($files)){
               foreach ($files as $file) {
                    $projectImgName = date('YmdHi').$file->getClientOriginalName();
                    $file->move('public/upload/pdf_files/', $projectImgName);
                    $subimage['file'] = $projectImgName;

                    $subimage = new MenuPostFile();
                    $subimage->menu_post_id = $data->id;
                    $subimage->file = $projectImgName;
                    $subimage->save();
                }
            }
        }

        return redirect()->route('frontend-menu.post.view')->with('success','Data! successfully inserted');
    }

    public function edit($id){
        $data['editData'] = MenuPost::with(['post_file'])->find($id);
        return view('backend.post.post-add', $data);
    }

    public function update(Request $request ,$id){
        // $this->validate($request,[
        //     'file' => 'mimes:pdf',
        // ]);
    	$data = MenuPost::find($id);
        $data->date = $request->date ? date('Y-m-d',strtotime($request->date)) : null;
        $data->title_en = $request->title_en;
        $data->title_bn = $request->title_bn;
        $data->description_en = $request->description_en;
        $data->description_bn = $request->description_bn;
        $data->post_type = $request->post_type;
        $img = $request->file('image');
        if ($img) {
            @unlink(public_path('upload/'.$data->image));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/', $imgName);
            $img = Image::make(public_path('upload/').$imgName);
            $img->resize(625,364)->save(public_path('upload/').$imgName);
            $data['image'] = $imgName;
        }
        $data->updated_by = Auth::user()->id;
        if($data->save()){
            $files = $request->file;
            if(!empty($files)){
               foreach ($files as $file) {
                    $projectImgName = date('YmdHi').$file->getClientOriginalName();
                    $file->move('public/upload/pdf_files/', $projectImgName);
                    $subimage['file'] = $projectImgName;

                    $subimage = new MenuPostFile();
                    $subimage->menu_post_id = $data->id;
                    $subimage->file = $projectImgName;
                    $subimage->save();
                }
            }
        }

        return redirect()->route('frontend-menu.post.view')->with('success','Data! successfully updated');
    }

    public function fileDelete(Request $request){
        $data = MenuPostFile::find($request->id);
        if (file_exists('public/upload/pdf_files/' . $data->file) AND ! empty($data->file)) {
            unlink('public/upload/pdf_files/' . $data->file);
        }
        $data->delete();
        return redirect()->route('frontend-menu.post.view')->with('success','Data Deleted successfully');
    }
    
    public function delete(Request $request){ 
        $data = MenuPost::find($request->id);
        if (file_exists('public/upload/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/' . $data->image);
        }
        $subImage = MenuPostFile::where('menu_post_id',$data->id)->get()->toArray();
        if(!empty($subImage)){
            foreach ($subImage as $value) {
                if(!empty($value)){
                    unlink('public/upload/pdf_files/'.$value['file']);
                }
            }
        }
        MenuPostFile::where('menu_post_id',$data->id)->delete();
        $data->delete();
        return redirect()->route('frontend-menu.post.view')->with('success','Data Deleted successfully');
    }
}
