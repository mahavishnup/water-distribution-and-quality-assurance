<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quality;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QualityController extends Controller
{
    public function index() {

        $qualities =  Quality::orderBy("id", "desc")->paginate(4);

        return view("admin.quality.index", compact("qualities"));
    }

    public function create() {

        return view("admin.quality.create");

    }

    public function show($slug)
    {
        return $Quality = Quality::findBySlugOrFail($slug);

//        return view("quality.show", compact('Quality'));
    }

    public function edit($slug)
    {
        $Quality = Quality::findOrFail($slug);

        return view("admin.quality.edit", compact('Quality'));
    }

    public function update(Request $request)
    {
        Quality::where('id', $request->id)
            ->update([
                'slug' => SlugService::createSlug(Quality::class, 'slug', $request->title),
                'title' => $request->title,
                'body' => $request->body,
            ]);

        return back()->with("success", "Quality Assurance has been Updated");
    }

    public function store(Request $request) {

        $quality = [
            'slug' => SlugService::createSlug(Quality::class, 'slug', $request->title),
            'title' => $request->title,
            'body' => $request->body,
        ];

        Quality::create($quality);

        return back()->with("success", "Quality Assurance has been created");

    }

    public function destroy(Request $request, $id)
    {
        $deleted_at = $request->deleted_at;

        Quality::where('id', $id)->update(['deleted_at' => $deleted_at]);

        return back()->withStatus(__('Delete successfully.'));
    }
}
