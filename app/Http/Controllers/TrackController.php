<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\User;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function show($id)
    {
        $track = User::findOrFail($id);

        $tracks =  Track::where("user_id", $track->id)->paginate(4);

        return view("track.show", compact('tracks'));
    }

    public function destroy(Request $request, $id)
    {
        $deleted_at = $request->deleted_at;

        Track::where('id', $id)->update(['deleted_at' => $deleted_at]);

        return back()->withStatus(__('Delete successfully.'));
    }
}
