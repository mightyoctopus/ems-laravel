<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeDetail;
use App\Http\Requests\EmployeeDetailRequest;

class EmployeeDetailController extends Controller
{

    public function index() 
    {
        return view('employee_details');
    }
    public function store(EmployeeDetailRequest $request)
    {  /* Upon a submission from the Add-Details page(form page), it redirects to
        the Employee Details page */
        EmployeeDetail:: create($request->validated());
        return redirect()->route('employee_details')->with('success', 'New Employee created successfully!');
    }
}
