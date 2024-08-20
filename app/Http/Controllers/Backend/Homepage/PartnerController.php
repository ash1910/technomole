<?php

namespace App\Http\Controllers\Backend\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Partner;
use App\Model\HowWork;
use App\Model\AboutStep;
use App\Model\Performance;
use Auth;
use Image;
use DB;

class PartnerController extends Controller
{
    public function partnerView()
    {
        $data['allData'] = Partner::where('status','1')->get();
        return view('backend.homepage.partner.partner_view',$data);
    }

    public function partnerAdd()
    {
        return view('backend.homepage.partner.partner_add');
    }

    public function partnerStore(Request $request)
    {
        $data = new Partner();
        $data->site_link = $request->site_link;
        $data->created_by = Auth::user()->id;
        $img = $request->file('image');
        if ($img) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/images/', $imgName);
            $img = Image::make(public_path('upload/images/').$imgName);
            $img->resize(170,50)->save(public_path('upload/images/').$imgName);
            $data['image'] = $imgName;
        }
        $data->save();
        return redirect()->route('homepages.partner.view')->with('success','Data Saved successfully');
    }

    public function partnerEdit($id)
    {
        $data['editData'] = Partner::find($id);
        return view('backend.homepage.partner.partner_add',$data);
    }

    public function partnerUpdate(Request $request,$id)
    {
        $data = Partner::find($id);
        $data->site_link = $request->site_link;
        $data->updated_by = Auth::user()->id;
        $img = $request->file('image');
        if ($img) {
            @unlink(public_path('upload/images/'.$data->image));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/images/', $imgName);
            $img = Image::make(public_path('upload/images/').$imgName);
            $img->resize(170,50)->save(public_path('upload/images/').$imgName);
            $data['image'] = $imgName;
        }
        $data->save();
        return redirect()->route('homepages.partner.view')->with('success','Data Updated successfully');
    }

    public function partnerDelete(Request $request)
    {
        $data = Partner::find($request->id);
        if (file_exists('public/upload/images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/images/' . $data->image);
        }
        $data->delete();
        return redirect()->route('homepages.partner.view')->with('success','Data Deleted successfully');
    }

    // How We Work

    public function howWorkView()
    {
        $data['allData'] = HowWork::where('status','1')->get();
        return view('backend.homepage.partner.work_view',$data);
    }

    public function howWorkAdd()
    {
        return view('backend.homepage.partner.work_add');
    }

    public function howWorkStore(Request $request)
    {
        $data = new HowWork();
        $data->description = $request->description;
        $data->created_by = Auth::user()->id;
        // $img = $request->file('image');
        // if ($img) {
        //     $imgName = date('YmdHi').$img->getClientOriginalName();
        //     $img->move('public/upload/images/', $imgName);
        //     $img = Image::make(public_path('upload/images/').$imgName);
        //     $img->resize(100,105)->save(public_path('upload/images/').$imgName);
        //     $data['image'] = $imgName;
        // }
        $data->save();
        return redirect()->route('homepages.how-work.view')->with('success','Data Saved successfully');
    }

    public function howWorkEdit($id)
    {
        $data['editData'] = HowWork::find($id);
        return view('backend.homepage.partner.work_add',$data);
    }

    public function howWorkUpdate(Request $request,$id)
    {
        $data = HowWork::find($id);
        $data->description = $request->description;
        $data->updated_by = Auth::user()->id;
        // $img = $request->file('image');
        // if ($img) {
        //     @unlink(public_path('upload/images/'.$data->image));
        //     $imgName = date('YmdHi').$img->getClientOriginalName();
        //     $img->move('public/upload/images/', $imgName);
        //     $img = Image::make(public_path('upload/images/').$imgName);
        //     $img->resize(100,105)->save(public_path('upload/images/').$imgName);
        //     $data['image'] = $imgName;
        // }
        $data->save();
        return redirect()->route('homepages.how-work.view')->with('success','Data Updated successfully');
    }

    public function howWorkDelete(Request $request)
    {
        $data = HowWork::find($request->id);
        // if (file_exists('public/upload/images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('public/upload/images/' . $data->image);
        // }
        $data->delete();
        return redirect()->route('homepages.how-work.view')->with('success','Data Deleted successfully');
    }

    // Performance

    public function performanceView()
    {
        $data['count'] = Performance::count();
        $data['allData'] = Performance::where('status','1')->get();
        return view('backend.homepage.partner.performance_view',$data);
    }

    public function performanceAdd()
    {
        return view('backend.homepage.partner.performance_add');
    }

    public function performanceStore(Request $request)
    {
        $data = new Performance();
        $data->experts = $request->experts;
        $data->partners = $request->partners;
        $data->it_experience = $request->it_experience;
        $data->happy_clients = $request->happy_clients;
        $data->open_source_stack = $request->open_source_stack;
        $data->dot_net_stack = $request->dot_net_stack;
        $data->database_stack = $request->database_stack;
        $data->frontend_stack = $request->frontend_stack;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('homepages.performance.view')->with('success','Data Saved successfully');
    }

    public function performanceEdit($id)
    {
        $data['editData'] = Performance::find($id);
        return view('backend.homepage.partner.performance_add',$data);
    }

    public function performanceUpdate(Request $request,$id)
    {
        $data = Performance::find($id);
        $data->experts = $request->experts;
        $data->partners = $request->partners;
        $data->it_experience = $request->it_experience;
        $data->happy_clients = $request->happy_clients;
        $data->open_source_stack = $request->open_source_stack;
        $data->dot_net_stack = $request->dot_net_stack;
        $data->database_stack = $request->database_stack;
        $data->frontend_stack = $request->frontend_stack;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('homepages.performance.view')->with('success','Data Updated successfully');
    }

    public function performanceDelete(Request $request)
    {
        $data = Performance::find($request->id);
        $data->delete();
        return redirect()->route('homepages.performance.view')->with('success','Data Deleted successfully');
    }
}
