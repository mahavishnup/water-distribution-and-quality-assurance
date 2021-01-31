<?php

namespace App\Http\Controllers;

use App\Models\Harvest;
use App\Models\User;
use Illuminate\Http\Request;

class HarvestController extends Controller
{
    public function index() {

        $harvests =  Harvest::orderBy("id", "desc")->paginate(4);

        return view("harvest.index", compact('harvests'));
    }

    public function show($id)
    {
        $harvest = User::findOrFail($id);

        $harvests =  Harvest::where("user_id", $harvest->id)->paginate(4);

        return view("harvest.show", compact('harvests'));
    }

    public function destroy(Request $request, $id)
    {
        $deleted_at = $request->deleted_at;

        Harvest::where('id', $id)->update(['deleted_at' => $deleted_at]);

        return back()->withStatus(__('Delete successfully.'));
    }
}
