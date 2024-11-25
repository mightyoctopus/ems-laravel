<?php
// Code made with a reference from 
// https://www.digitalocean.com/community/tutorials/simple-laravel-crud-with-resource-controllers 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Http\Requests\EmployeeDetailUpdateRequest;

class EmployeeController extends Controller
{
    public function create() {
        return view('add_employee');
    }

    //Validation logic was pasted inside the rules of EmployeeRequest.php:
    //Reference Source: https://www.youtube.com/watch?v=ddWAmMf5hEU 
    public function store(EmployeeStoreRequest $request) {
        Employee::create($request->validated());
        return redirect()->route('home')->with('success', 'New Employee created successfully!');
    }

    public function edit($id) {
        $employee = Employee::with('details')->findOrFail($id); //with the details function from Employee model class as the edit page handles both details and employee models

        return view('edit_employee', compact('employee'));
    }

    public function update(EmployeeUpdateRequest $basicRequest, EmployeeDetailUpdateRequest $detailRequest,  $id) {

        $employee = Employee::findOrFail($id);
        $employee->update($basicRequest->validated());

        $detailsData = $detailRequest->validated();
    
        // Create details data if not previously created. Once details data has been filled in, it can be edtiable in the same form. 
        if ($employee->details) {
            $employee->details->update($detailsData);
        } else {
            $employee->details()->create($detailsData);
        }

        return redirect()->route('home')->with('success', 'Employee updated successfully!');
    }

    public function delete($id) {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('home')->with('success', 'Employee deleted successfully!');
    }

    // Employee Overview Page
    public function show($id) 
    {
        $employee = Employee::with('details')->findOrFail($id);
        return view('employee_overview', compact('employee'));
    }
}
