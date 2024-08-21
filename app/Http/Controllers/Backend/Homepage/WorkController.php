<?php

namespace App\Http\Controllers\Backend\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Work;
use Auth;
use Image;

class WorkController extends Controller
{
    public function workView()
    {
    	$data['allData'] = Work::where('status','1')->get();
    	return view('backend.homepage.work.work_view',$data);
    }

    public function workAdd()
    {
    	return view('backend.homepage.work.work_add');
    }

    public function workStore(Request $request)
    {
    	$data = new Work();
    	$data->title = $request->title;
    	$data->description = $request->description;
    	$img = $request->file('image');
        if ($img) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/images/', $imgName);
            $img = Image::make(public_path('upload/images/').$imgName);
            $img->resize(780,822)->save(public_path('upload/images/').$imgName);
            $data['image'] = $imgName;
        }
        $data->created_by = Auth::user()->id;
        $data->save();
    	return redirect()->route('homepages.work.view')->with('success','Data Saved successfully');
    }

    public function workEdit($id)
    {
    	$data['editData'] = Work::find($id);
    	return view('backend.homepage.work.work_add',$data);
    }

    public function workUpdate(Request $request,$id)
    {
    	$data = Work::find($id);
    	$data->title = $request->title;
        $data->description = $request->description;
    	$img = $request->file('image');
        if ($img) {
            @unlink(public_path('upload/images/'.$data->image));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/images/', $imgName);
            $img = Image::make(public_path('upload/images/').$imgName);
            $img->resize(780,822)->save(public_path('upload/images/').$imgName);
            $data['image'] = $imgName;
        }
        $data->updated_by = Auth::user()->id;
        $data->save();
    	return redirect()->route('homepages.work.view')->with('success','Data Updated successfully');
    }

    public function workDelete(Request $request)
    {
    	$data = Work::find($request->id);
    	if (file_exists('public/upload/images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/images/' . $data->image);
        }
        $data->delete();
        return redirect()->route('homepages.work.view')->with('success','Data Deleted successfully');
    }
}
