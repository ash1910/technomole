<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Role;
use App\Model\UserRole;
use Auth;
use DB;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
	public function getUserRole(Request $request){
		$user_role_type_id = $request->user_role_type_id;
		$allRole = Role::where('user_role_type_id',$user_role_type_id)->get();
		return response()->json($allRole);
	}

    public function index(){
    	$data['user'] = User::with(['user_roles'])->get();
        $data['role'] = Role::all();
        // dd($data['user']);
    	return view('backend.user.view-user',$data);
    }

    public function userAdd()
    {
    	$data['roles'] = Role::all();
    	return view('backend.user.add-user',$data);
    }

    public function userStore(Request $request)
    {
    	// dd($request->all());
    	// $this->validate($request,[
    	// 	'email' => ['required', Rule::unique('users')->whereNull('deleted_at')]
    	// ]);

        $this->validate($request,[
            'email'=>'required|unique:users,email'
        ]);

    	$data              = new User();
        $data->name        = $request->name;
    	$data->username    = $request->username;
    	$data->email       = $request->email;
    	$data->password    = bcrypt($request->password);
    	$data->save();
        if ($request->role_id) {
            $user_data           = new UserRole();
            $user_data->user_id  = $data->id;
            $user_data->role_id  = $request->role_id;
            $user_data->save();
        }
    	return redirect()->route('user')->with('success','Data Saved successfully');
    }

    public function userEdit($id)
    {
        $data['editData']   = User::with(['user_roles'])->find($id);
        // dd($data['editData']->toArray());
        $data['roles']      = Role::where('status','1')->get();
        return view('backend.user.add-user',$data);
    }

    public function updateUser(Request $request,$id)
    {
        // dd($request->role_id);
        $data              = User::find($id);
        $this->validate($request,[
            'email'=>'required|unique:users,email,'.$data->id
        ]);
    	$data->name        = $request->name;
        $data->username    = $request->username;
        $data->email       = $request->email;
    	$data->save();
        if ($request->role_id) {
            $user_data           = UserRole::where('user_id', $id)->first();
            $user_data->role_id  = $request->role_id;
            $user_data->save();
        }
        return redirect()->route('user')->with('success','Data Updated successfully');
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect()->route('user')->with('success','Data Deleted successfully');
    }

}
