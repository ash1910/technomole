<?php

namespace App\Http\Controllers\Backend\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\About;
use Auth;
use Image;

class AboutController extends Controller
{
    public function aboutView()
    {
        $data['count'] = About::count();
        $data['allData'] = About::where('status','1')->get();
        return view('backend.homepage.about.about_view',$data);
    }

    public function aboutAdd()
    {
        return view('backend.homepage.about.about_add');
    }

    public function aboutStore(Request $request)
    {
        $data = new About();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->offer = $request->offer;
        $img = $request->file('about_image');
        if ($img) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/about_images/', $imgName);
            $img = Image::make(public_path('upload/about_images/').$imgName);
            $img->resize(780,851)->save(public_path('upload/about_images/').$imgName);
            $data['about_image'] = $imgName;
        }
        $img2 = $request->file('how_work_image');
        if ($img2) {
            $img2Name = date('YmdHi').$img2->getClientOriginalName();
            $img2->move('public/upload/images/', $img2Name);
            $img2 = Image::make(public_path('upload/images/').$img2Name);
            $img2->resize(780,586)->save(public_path('upload/images/').$img2Name);
            $data['how_work_image'] = $img2Name;
        }
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('homepages.about.view')->with('success','Data Saved successfully');
    }

    public function aboutEdit($id)
    {
        $data['editData'] = About::find($id);
        return view('backend.homepage.about.about_add',$data);
    }

    public function aboutUpdate(Request $request,$id)
    {
        $data = About::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->offer = $request->offer;
        $img = $request->file('about_image');
        if ($img) {
            @unlink(public_path('upload/about_images/'.$data->about_image));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/about_images/', $imgName);
            $img = Image::make(public_path('upload/about_images/').$imgName);
            $img->resize(780,851)->save(public_path('upload/about_images/').$imgName);
            $data['about_image'] = $imgName;
        }
        $img2 = $request->file('how_work_image');
        if ($img2) {
            @unlink(public_path('upload/images/'.$data->how_work_image));
            $img2Name = date('YmdHi').$img2->getClientOriginalName();
            $img2->move('public/upload/images/', $img2Name);
            $img2 = Image::make(public_path('upload/images/').$img2Name);
            $img2->resize(780,586)->save(public_path('upload/images/').$img2Name);
            $data['how_work_image'] = $img2Name;
        }
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('homepages.about.view')->with('success','Data Updated successfully');
    }

    public function aboutDelete(Request $request)
    {
        $data = About::find($request->id);
        if (file_exists('public/upload/about_images/' . $data->about_image) AND ! empty($data->about_image)) {
            unlink('public/upload/about_images/' . $data->about_image);
        }
        if (file_exists('public/upload/images/' . $data->how_work_image) AND ! empty($data->how_work_image)) {
            unlink('public/upload/images/' . $data->how_work_image);
        }
        $data->delete();
        return redirect()->route('homepages.about.view')->with('success','Data Deleted successfully');
    }
}
