<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index() {

        $tracking =  tracking::orderBy("id", "desc")->paginate(4);

        return view("admin.tracking.index", compact("tracking"));
    }

    public function create() {

        return view("admin.tracking.create");

    }

    public function show($id)
    {
        $tracking = tracking::findOrFail($id);

        return view("tracking.show", compact('tracking'));
    }

    public function edit($id)
    {
        $tracking = tracking::findOrFail($id);

        return view("admin.tracking.edit", compact('tracking'));
    }

    public function update(Request $request)
    {
        tracking::where('id', $request->id)
            ->update([
                'from' => $request->from,
                'current' => $request->current,
                'to' => $request->to,
            ]);

        return back()->with("success", "Tracking has been Updated");
    }

    public function store(Request $request) {

        $quality = [
            'from' => $request->from,
            'current' => $request->current,
            'to' => $request->to,
        ];

        tracking::create($quality);

        return back()->with("success", "Tracking has been created");

    }

    public function destroy(Request $request, $id)
    {
        $deleted_at = $request->deleted_at;

        tracking::where('id', $id)->update(['deleted_at' => $deleted_at]);

        return back()->withStatus(__('Delete successfully.'));
    }
}
