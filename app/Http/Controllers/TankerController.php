<?php

namespace App\Http\Controllers;

use App\Models\Tanker;
use App\Models\User;
use Illuminate\Http\Request;

class TankerController extends Controller
{
    public function index() {

        $tankers =  Tanker::orderBy("id", "desc")->paginate(4);

        return view("tanker.index", compact("tankers"));
    }

    public function show($id)
    {
        $tanker = User::findOrFail($id);

        $tankers =  Tanker::where("user_id", $tanker->id)->paginate(4);

        return view("tanker.show", compact('tankers'));
    }

    public function destroy(Request $request, $id)
    {
        $deleted_at = $request->deleted_at;

        Tanker::where('id', $id)->update(['deleted_at' => $deleted_at]);

        return back()->withStatus(__('Delete successfully.'));
    }
}
