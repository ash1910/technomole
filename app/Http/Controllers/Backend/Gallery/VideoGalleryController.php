<?php

namespace App\Http\Controllers\Backend\Gallery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\PhotoCategory;
use App\Model\PhotoGallery;
use App\Model\VideoCategory;
use App\Model\VideoGallery;
use App\Model\AudioCategory;
use App\Model\AudioGallery;
use Auth;
use Image;
use DB;

class VideoGalleryController extends Controller
{
    public function videoView()
    {
        $data['allData'] = VideoGallery::orderBy('id','desc')->get();
        return view('backend.gallery.video.video_gallery_view',$data);
    }

    public function videoAdd()
    {
    	$data['categories'] = VideoCategory::all();
        return view('backend.gallery.video.video_gallery_add',$data);
    }

    public function videoStore(Request $request)
    {
        $data = new VideoGallery();
        $data->video_category_id = $request->video_category_id;
        $data->url = $request->url;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('galleries.video.view')->with('success','Data Saved successfully');
    }

    public function videoEdit($id)
    {
        $data['editData'] = VideoGallery::find($id);
        $data['categories'] = VideoCategory::all();
        return view('backend.gallery.video.video_gallery_add',$data);
    }

    public function videoUpdate(Request $request,$id)
    {
        $data = VideoGallery::find($id);
        $data->video_category_id = $request->video_category_id;
        $data->url = $request->url;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('galleries.video.view')->with('success','Data Updated successfully');
    }

    public function videoDelete(Request $request)
    {
        $data = VideoGallery::find($request->id);
        $data->delete();
        return redirect()->route('galleries.video.view')->with('success','Data Deleted successfully');
    }
}
