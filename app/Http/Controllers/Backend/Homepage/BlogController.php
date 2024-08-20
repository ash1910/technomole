<?php

namespace App\Http\Controllers\Backend\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Blog;
use App\Model\BlogFile;
use Auth;
use Image;
use DB;

class BlogController extends Controller
{
    public function blogView(){
        $data['allData'] = Blog::orderBy('id','desc')->get();
        return view('backend.homepage.blog.blog_view', $data);
    }

    public function blogAdd(){
        return view('backend.homepage.blog.blog_add');
    }

    public function blogStore(Request $request){
        // $this->validate($request,[
        //     'file' => 'mimes:pdf',
        // ]);

        $data = new Blog();
        $data->date = $request->date ? date('Y-m-d',strtotime($request->date)) : null;
        $data->title_en = strip_tags($request->title_en);
        $data->title_bn = $request->title_bn;
        $data->description_en = $request->description_en;
        $data->description_bn = $request->description_bn;
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

                    $subimage = new BlogFile();
                    $subimage->blog_id = $data->id;
                    $subimage->file = $projectImgName;
                    $subimage->save();
                }
            }
        }

        return redirect()->route('homepages.blog.view')->with('success','Data! successfully inserted');
    }

    public function blogEdit($id){
        $data['editData'] = Blog::with(['blog_file'])->find($id);
        return view('backend.homepage.blog.blog_add', $data);
    }

    public function blogUpdate(Request $request ,$id){
        // $this->validate($request,[
        //     'file' => 'mimes:pdf'
        // ]);
        $data = Blog::find($id);
        $data->date = $request->date ? date('Y-m-d',strtotime($request->date)) : null;
        $data->title_en = $request->title_en;
        $data->title_bn = $request->title_bn;
        $data->description_en = $request->description_en;
        $data->description_bn = $request->description_bn;
        $img = $request->file('image');
        if ($img) {
            @unlink(public_path('upload/'.$data->image));
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

                    $subimage = new BlogFile();
                    $subimage->blog_id = $data->id;
                    $subimage->file = $projectImgName;
                    $subimage->save();
                }
            }
        }

        return redirect()->route('homepages.blog.view')->with('success','Data! successfully updated');
    }

    public function blogFileDelete(Request $request){
        $data = BlogFile::find($request->id);
        if (file_exists('public/upload/pdf_files/' . $data->file) AND ! empty($data->file)) {
            unlink('public/upload/pdf_files/' . $data->file);
        }
        $data->delete();
        return redirect()->route('homepages.blog.view')->with('success','Data Deleted successfully');
    }
    
    public function blogDelete(Request $request){ 
        $data = Blog::find($request->id);
        if (file_exists('public/upload/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/' . $data->image);
        }
        $subImage = BlogFile::where('blog_id',$data->id)->get()->toArray();
        if(!empty($subImage)){
            foreach ($subImage as $value) {
                if(!empty($value)){
                    unlink('public/upload/pdf_files/'.$value['file']);
                }
            }
        }
        BlogFile::where('blog_id',$data->id)->delete();
        $data->delete();
        return redirect()->route('homepages.blog.view')->with('success','Data Deleted successfully');
    }
}
