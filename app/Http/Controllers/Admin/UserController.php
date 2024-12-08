<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Role_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datalist = User::all();

        return view('admin.users', compact('datalist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user,$id)
    {
        $data=User::find($id);
        $roldatalist= Role::all()->sortBy('name');

        return view('admin.user_show',compact('data','roldatalist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $id)
    {

        $data = User::find($id);

        return view('admin.user_update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, $id)
    {

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        if ($request->hasFile('profile_photo_path')) {
            $user->profile_photo_path = Storage::putFile("profile-photos", $request->file('profile_photo_path'));
        }
        $user->save();

        return redirect()->route('adminusers')->with('success', 'Kullanıcı Güncelleme Başarılı');
    }


    public function userroles($id)
    {

        $data = User::find($id);

        $roldatalist= Role::all()->sortBy('name');


        return view('admin.user_role', compact('data', 'roldatalist'));
    }


    public function userrolesstore(Request $request, $id)
    {

        $user= User::find($id);
        $roleid=$request->input('roleid');
        $user->roles()->attach($roleid);
        return redirect()->back()->with("success","Rol Eklendi");
    }

    public function userrolesdelete(Request $request, $userid,$roleid){

        $user= User::find($userid);
        $user->roles()->detach($roleid);
        return redirect()->back()->with("success","Rol Silindi");


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
