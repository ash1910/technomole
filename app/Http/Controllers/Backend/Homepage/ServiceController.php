<?php

namespace App\Http\Controllers\Backend\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Service;
use Auth;
use Image;

class ServiceController extends Controller
{
    public function serviceView()
    {
    	$data['allData'] = Service::where('status','1')->get();
    	return view('backend.homepage.service.service_view',$data);
    }

    public function serviceAdd()
    {
    	return view('backend.homepage.service.service_add');
    }

    public function serviceStore(Request $request)
    {
    	$data = new Service();
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
    	return redirect()->route('homepages.service.view')->with('success','Data Saved successfully');
    }

    public function serviceEdit($id)
    {
    	$data['editData'] = Service::find($id);
    	return view('backend.homepage.service.service_add',$data);
    }

    public function serviceUpdate(Request $request,$id)
    {
    	$data = Service::find($id);
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
    	return redirect()->route('homepages.service.view')->with('success','Data Updated successfully');
    }

    public function serviceDelete(Request $request)
    {
    	$data = Service::find($request->id);
    	if (file_exists('public/upload/images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/images/' . $data->image);
        }
        $data->delete();
        return redirect()->route('homepages.service.view')->with('success','Data Deleted successfully');
    }
}
