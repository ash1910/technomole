<?php

namespace App\Http\Controllers\Backend\Gallery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\PhotoCategory;
use App\Model\PhotoFolder;
use App\Model\PhotoGallery;
use App\Model\VideoCategory;
use App\Model\VideoGallery;
use App\Model\AudioCategory;
use App\Model\AudioGallery;
use Auth;
use Image;
use DB;

class PhotoFolderController extends Controller
{
    public function folderView()
    {
        $data['allData'] = PhotoFolder::orderBy('id','desc')->get();
        return view('backend.gallery.folder.photo_folder_view',$data);
    }

    public function folderAdd()
    {

    	$data['categories'] = PhotoCategory::all();
        return view('backend.gallery.folder.photo_folder_add',$data);
    }

    public function folderStore(Request $request)
    {
        $data = new PhotoFolder();
        $data->photo_category_id = $request->photo_category_id;
        $data->title_en = $request->title_en;
        $data->title_bn = $request->title_bn;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('galleries.folder.view')->with('success','Data Saved successfully');
    }

    public function folderEdit($id)
    {
        $data['editData'] = PhotoFolder::find($id);
        $data['categories'] = PhotoCategory::all();
        return view('backend.gallery.folder.photo_folder_add',$data);
    }

    public function folderUpdate(Request $request,$id)
    {
        $data = PhotoFolder::find($id);
        $data->photo_category_id = $request->photo_category_id;
        $data->title_en = $request->title_en;
        $data->title_bn = $request->title_bn;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('galleries.folder.view')->with('success','Data Updated successfully');
    }

    public function folderDelete(Request $request)
    {
        $data = PhotoGallery::find($request->id);
        $data->delete();
        return redirect()->back();
    }
}
