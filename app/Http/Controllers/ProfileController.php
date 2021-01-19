<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Photos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function adminedit()
    {
        return view('admin.profile.edit');
    }

    public function update(ProfileRequest $request)
    {
        if($file = $request->file('img')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images/uploads', $name);

            Photos::where('id', $request->phid)
                ->update([
                    'file'=>$name,
                    'url' => 0
                ]);

            $input = Photos::where('id', $request->phid)->first();

            User::where('id', $request->usid)
                ->update(['photo_id'=>$input->id]);

        }

        User::where('id', $request->usid)
            ->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);

        return back()->withStatus(__('Profile successfully updated.'));
    }

    public function password(PasswordRequest $request)
    {

        Auth::user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
