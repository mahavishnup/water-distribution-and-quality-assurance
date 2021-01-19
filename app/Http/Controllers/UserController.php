<?php

namespace App\Http\Controllers;

use App\Models\Photos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(User $model)
    {
        $users =  User::orderBy("id", "asc")->paginate(4);

        return view('admin.users.index', compact('users',));
    }

    public function create()
    {
        return view('admin.users.create');
    }


    public function show($id)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        $status = $request->status;
        User::where('id', $id)->update(['is_admin' => $status]);

        return back()->withStatus(__('Role successfully updated.'));
    }


    public function store(Request $request)
    {
        if($file = $request['email']){

            $hash = md5(strtolower(trim($file))) . "?d=mm&s=";
            $name =  "http://www.gravatar.com/avatar/$hash";

            $photo = Photos::create(['file'=>$name, 'url'=>1]);

            $input = $photo->id;

        }

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'address' => $request['address'],
            'password' => Hash::make($request['password']),
            'photo_id' => $input,
        ]);

        return back()->withStatus(__('User Created successfully.'));
    }

    public function update(Request $request, $id)
    {
        $status = $request->status;
        User::where('id', $id)->update(['is_active' => $status]);

        return back()->withStatus(__('Status successfully updated.'));
    }

    public function destroy(Request $request, $id)
    {
        $deleted_at = $request->deleted_at;
        User::where('id', $id)->update(['deleted_at' => $deleted_at]);

        return back()->withStatus(__('Delete successfully.'));
    }
}
