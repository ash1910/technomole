<?php

namespace App\Http\Controllers\Backend\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Team;
use Auth;
use Image;
use DB;

class TeamController extends Controller
{
    public function teamView()
    {
        $data['allData'] = Team::where('status','1')->get();
        return view('backend.homepage.team.team_view',$data);
    }

    public function teamAdd()
    {
        return view('backend.homepage.team.team_add');
    }

    public function teamStore(Request $request)
    {
        $data = new Team();
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->description = $request->description;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->viber = $request->viber;
        $data->created_by = Auth::user()->id;
        $img = $request->file('image');
        if ($img) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/images/', $imgName);
            $img = Image::make(public_path('upload/images/').$imgName);
            $img->resize(200,210)->save(public_path('upload/images/').$imgName);
            $data['image'] = $imgName;
        }
        $data->save();
        return redirect()->route('homepages.team.view')->with('success','Data Saved successfully');
    }

    public function teamEdit($id)
    {
        $data['editData'] = Team::find($id);
        return view('backend.homepage.team.team_add',$data);
    }

    public function teamUpdate(Request $request,$id)
    {
        $data = Team::find($id);
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->description = $request->description;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->viber = $request->viber;
        $data->updated_by = Auth::user()->id;
        $img = $request->file('image');
        if ($img) {
            @unlink(public_path('upload/images/'.$data->image));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/images/', $imgName);
            $img = Image::make(public_path('upload/images/').$imgName);
            $img->resize(200,210)->save(public_path('upload/images/').$imgName);
            $data['image'] = $imgName;
        }
        $data->save();
        return redirect()->route('homepages.team.view')->with('success','Data Updated successfully');
    }

    public function teamDelete(Request $request)
    {
        $data = Team::find($request->id);
        if (file_exists('public/upload/image/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/image/' . $data->image);
        }
        $data->delete();
        return redirect()->route('homepages.team.view')->with('success','Data Deleted successfully');
    }
}
