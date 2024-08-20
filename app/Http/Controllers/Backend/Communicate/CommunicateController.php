<?php

namespace App\Http\Controllers\Backend\Communicate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NewsLetter;
use App\Model\comment;
use App\Model\SubComment;
use App\Model\Communicate;
use Auth;
use Image;

class CommunicateController extends Controller
{
    public function communicateView()
    {
        $data['allData'] = Communicate::orderBy('id','desc')->get();
        return view('backend.contactor.contactor_view',$data);
    }

    public function communicateEdit($id)
    {
        $data['editData'] = Communicate::find($id);
        return view('backend.contactor.contactor_edit',$data);
    }

    public function communicateUpdate(Request $request,$id)
    {
        $data = Communicate::find($id);
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->email = $request->email;
        $data->save();
        return redirect()->route('communicates.communicate.view')->with('success','Data Updated successfully');
    }

    public function commentView()
    {
        $data['allData'] = comment::orderBy('id','desc')->get();
        return view('backend.contactor.comment_view',$data);
    }

    public function commentApprove($id)
    {
        $data['data'] = comment::find($id);
        return view('backend.contactor.comment_approval',$data);
    }

    public function commentStore(Request $request,$id)
    {
        $data = comment::find($id);
        $data->status = $request->status;
        $data->save();
        return redirect()->route('communicates.comment.view')->with('success','Comment Approved successfully');
    }

    public function commentDelete(Request $request)
    {
        // dd('ok');
        $data = comment::find($request->id);
        SubComment::where('comment_id',$data->id)->delete();
        $data->delete();
        return redirect()->route('communicates.comment.view')->with('success','Data Deleted successfully');
    }

    public function commentReply($id)
    {
        $data['data'] = comment::with(['sub_comment'])->find($id);
        return view('backend.contactor.comment_reply',$data);
    }


    public function replyStore(Request $request,$id)
    {
        $data = comment::find($id);
        $data->reply = $request->reply;
        $data->reply_by = Auth::user()->id;
        $data->reply_date = date('Y-m-d');
        $data->save();
        return redirect()->back()->with('success','Reply saved successfully');
    }

    public function subCommentStore(Request $request,$id)
    {
        $img = SubComment::find($id);
        if ($request->status==null) {
            $status = '0';
        }else{
            $status = $request->status;
        }

        $img->status = $status;
        $img->approved_by = Auth::user()->id;
        $img->save();
        return redirect()->back()->with('success','Comment approved successfully');
    }

    public function subCommentDelete(Request $request)
    {
        // dd('ok');
        $data = SubComment::find($request->id);
        $data->delete();
        return redirect()->back()->with('success','Data Deleted successfully');
    }

    public function letterView()
    {
        $data['allData'] = NewsLetter::orderBy('id','desc')->get();
        return view('backend.contactor.letter_view',$data);
    }

    public function letterDelete(Request $request)
    {
        // dd('ok');
        $data = NewsLetter::find($request->id);
        $data->delete();
        return redirect()->route('communicates.letter.view')->with('success','Data Deleted successfully');
    }
}
