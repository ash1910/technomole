<?php

namespace App\Http\Controllers\Backend\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\MediaPublication;
use Auth;
use Image;
use DB;

class MediaController extends Controller
{
    public function mediaView()
    {
        $data['allData'] = MediaPublication::where('status','1')->get();
        return view('backend.homepage.media.media_view',$data);
    }

    public function mediaAdd()
    {
        return view('backend.homepage.media.media_add');
    }

    public function mediaStore(Request $request)
    {
        $data = new MediaPublication();
        $data->date = date('Y-m-d',strtotime($request->date));
        $data->title_en = $request->title_en;
        $data->title_bn = $request->title_bn;
        $data->description_en = $request->description_en;
        $data->description_bn = $request->description_bn;
        $data->created_by = Auth::user()->id;
        $img = $request->file('image');
        if ($img) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/media_images/', $imgName);
            $img = Image::make(public_path('upload/media_images/').$imgName);
            $img->resize(625,364)->save(public_path('upload/media_images/').$imgName);
            $data['image'] = $imgName;
        }
        $data->save();
        return redirect()->route('homepages.media.view')->with('success','Data Saved successfully');
    }

    public function mediaEdit($id)
    {
        $data['editData'] = MediaPublication::find($id);
        return view('backend.homepage.media.media_add',$data);
    }

    public function mediaUpdate(Request $request,$id)
    {
        $data = MediaPublication::find($id);
        $data->date = date('Y-m-d',strtotime($request->date));
        $data->title_en = $request->title_en;
        $data->title_bn = $request->title_bn;
        $data->description_en = $request->description_en;
        $data->description_bn = $request->description_bn;
        $data->updated_by = Auth::user()->id;
        $img = $request->file('image');
        if ($img) {
            @unlink(public_path('upload/media_images/'.$data->image));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/media_images/', $imgName);
            $img = Image::make(public_path('upload/media_images/').$imgName);
            $img->resize(625,364)->save(public_path('upload/media_images/').$imgName);
            $data['image'] = $imgName;
        }
        $data->save();
        return redirect()->route('homepages.media.view')->with('success','Data Updated successfully');
    }

    public function mediaDelete(Request $request)
    {
        $data = MediaPublication::find($request->id);
        if (file_exists('public/upload/media_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/media_images/' . $data->image);
        }
        $data->delete();
        return redirect()->route('homepages.media.view')->with('success','Data Deleted successfully');
    }
}
