<?php

namespace App\Http\Controllers;

use App\Models\CustomerRequest;
use Illuminate\Http\Request;

class CustomerRequestController extends Controller
{
    public function index() {

        $customerrequest =  CustomerRequest::orderBy("id", "desc")->paginate(4);

        return view("admin.customer.request", compact("customerrequest"));
    }

    public function show($id)
    {
        $CustomerRequest = CustomerRequest::findOrFail($id);

        return view("customer.request", compact('CustomerRequest'));
    }

    public function destroy(Request $request, $id)
    {
        $deleted_at = $request->deleted_at;

        CustomerRequest::where('id', $id)->update(['deleted_at' => $deleted_at]);

        return back()->withStatus(__('Delete successfully.'));
    }
}
