<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {

        $services =  service::orderBy("id", "desc")->paginate(4);

        return view("admin.service.index", compact("services"));
    }

    public function create() {

        return view("admin.service.create");

    }

    public function show($id)
    {
        $service = service::findOrFail($id);

        return view("service.show", compact('service'));
    }

    public function edit($id)
    {
        $service = service::findOrFail($id);

        return view("admin.service.edit", compact('service'));
    }

    public function update(Request $request)
    {
        service::where('id', $request->id)
            ->update([
                'tanker' => $request->tanker,
                'harvest' => $request->harvest,
            ]);

        return back()->with("success", "Service has been Updated");
    }

    public function store(Request $request) {

        $quality = [
            'tanker' => $request->tanker,
            'harvest' => $request->harvest,
        ];

        service::create($quality);

        return back()->with("success", "Service has been created");

    }

    public function destroy(Request $request, $id)
    {
        $deleted_at = $request->deleted_at;

        service::where('id', $id)->update(['deleted_at' => $deleted_at]);

        return back()->withStatus(__('Delete successfully.'));
    }
}
