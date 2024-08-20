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

class AudioGalleryController extends Controller
{
    public function audioView()
    {
        $data['allData'] = AudioGallery::orderBy('id','desc')->get();
        return view('backend.gallery.audio.audio_gallery_view',$data);
    }

    public function audioAdd()
    {
    	$data['categories'] = AudioCategory::all();
        return view('backend.gallery.audio.audio_gallery_add',$data);
    }

    public function audioStore(Request $request)
    {
        $data = new AudioGallery();
        $data->audio_category_id = $request->audio_category_id;
        $data->created_by = Auth::user()->id;
        $img = $request->file('file');
        if ($img) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/audio_files/', $imgName);
            $data['file'] = $imgName;
        }
        $data->save();
        return redirect()->route('galleries.audio.view')->with('success','Data Saved successfully');
    }

    public function audioEdit($id)
    {
        $data['editData'] = AudioGallery::find($id);
        $data['categories'] = AudioCategory::all();
        return view('backend.gallery.audio.audio_gallery_add',$data);
    }

    public function audioUpdate(Request $request,$id)
    {
        $data = AudioGallery::find($id);
        $data->audio_category_id = $request->audio_category_id;
        $data->updated_by = Auth::user()->id;
        $img = $request->file('file');
        if ($img) {
            @unlink(public_path('upload/'.$data->file));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/audio_files/', $imgName);
            $data['file'] = $imgName;
        }
        $data->save();
        return redirect()->route('galleries.audio.view')->with('success','Data Updated successfully');
    }

    public function audioDelete(Request $request)
    {
        $data = AudioGallery::find($request->id);
        if (file_exists('public/upload/audio_files/' . $data->file) AND ! empty($data->file)) {
            unlink('public/upload/audio_files/' . $data->file);
        }
        $data->delete();
        return redirect()->route('galleries.audio.view')->with('success','Data Deleted successfully');
    }
}
