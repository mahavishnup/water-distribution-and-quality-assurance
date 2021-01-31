<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index() {

        $packages =  package::orderBy("id", "desc")->paginate(4);

        return view("admin.package.index", compact("packages"));
    }

    public function create() {

        return view("admin.package.create");

    }

    public function show($id)
    {
        $package = package::findOrFail($id);

        return view("package.show", compact('package'));
    }

    public function edit($id)
    {
        $package = package::findOrFail($id);

        return view("admin.package.edit", compact('package'));
    }

    public function update(Request $request)
    {
        package::where('id', $request->id)
            ->update([
                'weekly' => $request->weekly,
                'monthly' => $request->monthly,
                'yearly' => $request->yearly,
                'service' => $request->service,
            ]);

        return back()->with("success", "Package has been Updated");
    }

    public function store(Request $request) {

        $quality = [
            'weekly' => $request->weekly,
            'monthly' => $request->monthly,
            'yearly' => $request->yearly,
            'service' => $request->service,
        ];

        package::create($quality);

        return back()->with("success", "Package has been created");

    }

    public function destroy(Request $request, $id)
    {
        $deleted_at = $request->deleted_at;

        package::where('id', $id)->update(['deleted_at' => $deleted_at]);

        return back()->withStatus(__('Delete successfully.'));
    }
}
