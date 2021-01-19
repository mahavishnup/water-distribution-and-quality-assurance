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
}
