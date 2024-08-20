<?php

namespace App\Http\Controllers\Backend\Gallery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\PhotoCategory;
use App\Model\PhotoFolder;
use App\Model\PhotoGallery;
use App\Model\PhotoGalleryDetail;
use App\Model\VideoCategory;
use App\Model\VideoGallery;
use App\Model\AudioCategory;
use App\Model\AudioGallery;
use Auth;
use Image;
use DB;

class PhotoGalleryController extends Controller
{
    public function photoView()
    {
        $data['allData'] = PhotoGallery::orderBy('id','desc')->get();
        return view('backend.gallery.photo.photo_gallery_view',$data);
    }

    public function photoAdd()
    {
    	$data['categories'] = PhotoCategory::all();
        return view('backend.gallery.photo.photo_gallery_add',$data);
    }

    public function photoStore(Request $request)
    {
        $data = new PhotoGallery();
        $data->photo_category_id = $request->photo_category_id;
        $data->photo_folder_id = $request->photo_folder_id;
        $data->created_by = Auth::user()->id;

        if($data->save()){
            $images = $request->image;
            if(!empty($images)){
               foreach ($images as $img) {
                    $imgName = date('YmdHi').$img->getClientOriginalName();
                    $img->move('public/upload/', $imgName);
                    $img = Image::make(public_path('upload/').$imgName);
                    $img->resize(626,417)->save(public_path('upload/').$imgName);
                    $subimage['image'] = $imgName;

                    $subimage = new PhotoGalleryDetail();
                    $subimage->photo_gallery_id = $data->id;
                    $subimage->image = $imgName;
                    $subimage->save();
                }
            }
        }

        return redirect()->route('galleries.photo.view')->with('success','Data Saved successfully');
    }

    public function photoEdit($id)
    {
        $data['editData'] = PhotoGallery::with(['photo_Gallery_details'])->find($id);
        // dd($data['editData']->toArray());
        $data['categories'] = PhotoCategory::all();
        return view('backend.gallery.photo.photo_gallery_add',$data);
    }

    public function photoDetails($id)
    {
        $data['editData'] = PhotoGallery::with(['photo_Gallery_details'])->find($id);
        return view('backend.gallery.photo.photo_gallery_details',$data);
    }

    public function photoUpdate(Request $request,$id)
    {
        $data = PhotoGallery::find($id);
        $data->photo_category_id = $request->photo_category_id;
        $data->photo_folder_id = $request->photo_folder_id;
        $data->updated_by = Auth::user()->id;

        if($data->save()){
            $images = $request->image;
            if(!empty($images)){
               foreach ($images as $img) {
                    $imgName = date('YmdHi').$img->getClientOriginalName();
                    $img->move('public/upload/', $imgName);
                    $img = Image::make(public_path('upload/').$imgName);
                    $img->resize(626,417)->save(public_path('upload/').$imgName);
                    $subimage['image'] = $imgName;

                    $subimage = new PhotoGalleryDetail();
                    $subimage->photo_gallery_id = $data->id;
                    $subimage->image = $imgName;
                    $subimage->save();
                }
            }
        }

        return redirect()->route('galleries.photo.view')->with('success','Data Updated successfully');
    }

    public function photoStatus(Request $request,$id)
    {
        $img = PhotoGalleryDetail::find($id);
        if ($request->status==null) {
            $status = '0';
        }else{
            $status = $request->status;
        }

        $img->status = $status;
        $img->save();
        return redirect()->back()->with('success','Image selected successfully');
    }

    public function photoDelete(Request $request)
    {
        $data = PhotoGallery::find($request->id);
        $subImage = PhotoGalleryDetail::where('photo_gallery_id',$data->id)->get()->toArray();
        if(!empty($subImage)){
            foreach ($subImage as $value) {
                if(!empty($value)){
                    unlink('public/upload/'.$value['image']);
                }
            }
        }
        PhotoGalleryDetail::where('photo_gallery_id',$data->id)->delete();
        $data->delete();
        return redirect()->route('galleries.photo.view')->with('success','Data Deleted successfully');
    }

    public function photoDetailsDelete(Request $request)
    {
        $data = PhotoGalleryDetail::find($request->id);
        if (file_exists('public/upload/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/' . $data->image);
        }
        $data->delete();
        return redirect()->back();
    }
}
