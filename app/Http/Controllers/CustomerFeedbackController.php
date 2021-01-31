<?php

namespace App\Http\Controllers;

use App\Models\CustomerFeedback;
use Illuminate\Http\Request;

class CustomerFeedbackController extends Controller
{
    public function index() {

        $customerfeedback =  CustomerFeedback::orderBy("id", "desc")->paginate(4);

        return view("admin.customer.feedback", compact("customerfeedback"));
    }

    public function show($id)
    {
        $customerfeedback = CustomerFeedback::findOrFail($id);

        return view("customer.feedback", compact('customerfeedback'));
    }

    public function destroy(Request $request, $id)
    {
        $deleted_at = $request->deleted_at;

        CustomerFeedback::where('id', $id)->update(['deleted_at' => $deleted_at]);

        return back()->withStatus(__('Delete successfully.'));
    }
}
