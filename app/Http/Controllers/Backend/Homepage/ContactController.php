<?php

namespace App\Http\Controllers\Backend\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Contact;
use Auth;
use Image;

class ContactController extends Controller
{
    public function contactView()
    {
        $data['count'] = Contact::count();
        $data['allData'] = Contact::where('status','1')->get();
        return view('backend.homepage.contact.contact_view',$data);
    }

    public function contactAdd()
    {
        return view('backend.homepage.contact.contact_add');
    }

    public function contactStore(Request $request)
    {
        $data = new Contact();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->telephone = $request->telephone;
        $data->registered_address = $request->registered_address;
        $data->corporate_address = $request->corporate_address;
        $data->facebook = $request->facebook;
        $data->youtube = $request->youtube;
        $img = $request->file('image');
        if ($img) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/logos/', $imgName);
            $img = Image::make(public_path('upload/logos/').$imgName);
            $img->resize(487,114)->save(public_path('upload/logos/').$imgName);
            $data['image'] = $imgName;
        }
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('homepages.contact.view')->with('success','Data Saved successfully');
    }

    public function contactEdit($id)
    {
        $data['editData'] = Contact::find($id);
        return view('backend.homepage.contact.contact_add',$data);
    }

    public function contactUpdate(Request $request,$id)
    {
        $data = Contact::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->telephone = $request->telephone;
        $data->registered_address = $request->registered_address;
        $data->corporate_address = $request->corporate_address;
        $data->facebook = $request->facebook;
        $data->youtube = $request->youtube;
        $img = $request->file('image');
        if ($img) {
        	@unlink(public_path('upload/logos/'.$data->image));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/logos/', $imgName);
            $img = Image::make(public_path('upload/logos/').$imgName);
            $img->resize(487,114)->save(public_path('upload/logos/').$imgName);
            $data['image'] = $imgName;
        }
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('homepages.contact.view')->with('success','Data Updated successfully');
    }

    public function contactDelete(Request $request)
    {
        $data = Contact::find($request->id);
        if (file_exists('public/upload/logos/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/logos/' . $data->image);
        }
        $data->delete();
        return redirect()->route('homepages.contact.view')->with('success','Data Deleted successfully');
    }
}
