<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index() {

        $locations =  Location::orderBy("id", "desc")->paginate(4);

        return view("admin.location.index", compact("locations"));
    }

    public function create() {

        return view("admin.location.create");

    }

    public function show($id)
    {
        $location = Location::findOrFail($id);

        return view("location.show", compact('location'));
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);

        return view("admin.location.edit", compact('location'));
    }

    public function update(Request $request)
    {
        Location::where('id', $request->id)
            ->update([
                'city' => $request->city,
                'post' => $request->post,
                'street' => $request->street,
            ]);

        return back()->with("success", "Location has been Updated");
    }

    public function store(Request $request) {

        $quality = [
            'city' => $request->city,
            'post' => $request->post,
            'street' => $request->street,
        ];

        Location::create($quality);

        return back()->with("success", "Location has been created");

    }

    public function destroy(Request $request, $id)
    {
        $deleted_at = $request->deleted_at;

        Location::where('id', $id)->update(['deleted_at' => $deleted_at]);

        return back()->withStatus(__('Delete successfully.'));
    }
}
