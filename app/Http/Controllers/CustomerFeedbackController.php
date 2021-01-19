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
}
